<?php

namespace Cinebaz\Member\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Cinebaz\Member\Models\Order;
use Cinebaz\Member\Models\OrderDetails;
use Cinebaz\Media\Models\Media;
use Cinebaz\Member\Http\Requests\MemberFV;
use Laravel\Socialite\Facades\Socialite;
use Cinebaz\Member\Traits\TPicture;
use Cinebaz\Media\Models\MediaFavorite;
use Cinebaz\Media\Models\MediaListing;
use Cinebaz\Media\Models\PlayListLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Cinebaz\Member\DataTables\MemberDT;
use Validator;
use Session;
use DataTables;

class MemberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    use TPicture;
    public function __construct()
    {
        $this->redirectTo = url()->previous();
        $this->middleware('auth:web', ['except' => ['store', 'register', 'login', 'showlogin', 'redirectToGoogle', 'handleGoogleCallback', 'redirectToFacebook', 'handleFacebookCallback', '_registerOrLoginUser', 'changePassword']]);
    }
    public function index(MemberDT $dataTable)
    {
        $mdata = null;
        $fdata = null;
        //dd($dataTable->request()->all());

        return $dataTable->render('member::index', compact('fdata', 'mdata'));
    }



    public function profile(Request $request)
    {
        $data['member']         = $request->member_id;
        $data['user']           = Member::where('id', $request->member_id)->first();
        $data['get_bill']       = Order::where('member_id', $request->member_id)
            ->where('status', 'Processing')
            ->get();
        $data['get_ticket']     = OrderDetails::where('member_id', $request->member_id)
            ->get();
        $data['get_watchlist']  = PlayListLog::where('member_id', $request->member_id)->get()->unique('video_id');
        $data['get_fevlist']    = MediaFavorite::where('member_id', $request->member_id)
            ->get();
        return view('member::profile.index')->with($data);
    }
    public function settings()
    {
        $data['user'] = auth()->user();

        return view('member::profile.settings')->with($data);
    }
    public function library()
    {
        // $data['movielist']= Media::get();
        // $data['favorites']= Media::get();

        $member = auth('member')->user();
        if ($member) {
            $mdata['favorites']['name'] = 'My Favourite Videos';
            $mdata['favorites']['data'] = MediaFavorite::where(['member_id' => $member->id])->get();
            $mdata['member']['favorites'] = $mdata['favorites']['data']->pluck('media_id')->toArray();
        } else {
            $mdata['favorites']['name'] = null;
            $mdata['favorites']['data'] = null;
            $mdata['member']['favorites'] = [];
        }

        if ($member) {
            $mdata['listing']['name'] = 'Listed Videos';
            $mdata['listing']['data'] = MediaListing::where(['member_id' => $member->id])->get();
            $mdata['member']['listing'] = $mdata['favorites']['data']->pluck('media_id')->toArray();
        } else {
            $mdata['listing']['name'] = null;
            $mdata['listing']['data'] = null;
            $mdata['member']['listing'] = [];
        }
        if ($member) {
            $mdata['lastWatch']['name'] = 'Watch history';
            $mdata['lastWatch']['data'] = PlayListLog::where(['member_id' => $member->id])
                ->orderBy('created_at', 'desc')
                ->get()
                ->unique('video_id');
            // $mdata['member']['lastWatch'] = $mdata['favorites']['data']->pluck('media_id')->toArray();
        } else {
            $mdata['lastWatch']['name'] = null;
            $mdata['lastWatch']['data'] = null;
            $mdata['member']['listing'] = [];
        }

        return view('member::profile.library')->with($mdata);
    }
    public function plan()
    {
        $data['user'] = auth()->user();

        return view('member::profile.my_plan')->with($data);
    }

    public function register()
    {
        return view('member::register');
    }
    public function showlogin()
    {
        if (auth('member')->user()) {
            return redirect()->back();
        } else {
            return view('member::member_login');
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            //'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);

        // Attempt to log the user in
        if (Auth::guard('member')->attempt($credentials)) {
            // if successful, then redirect to their intended location
            return redirect()->intended('home');
            //return redirect()->route('member.auth.profile');
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    public function logout()
    {
        Auth::guard('member')->logout();
        return redirect('/');
    }

    public function store(Request $request)
    {
        $rules = array(
            'name'           => 'required',
            'phone'           => 'required',
            'password'      => 'required',
            'email'         => 'required'
        );

        $this->validate($request, $rules);

        $attributes = [
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'phone'     => $request->get('phone'),
            'password'  => Hash::make($request->get('password')),
            'gender'    => $request->get('gender'),
        ];
        try {
            Member::create($attributes);
            return redirect()->route('member.auth.profile')->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
    }
    public function update(Request $request)
    {

        $rules = array(
            'name'           => 'required',
            'phone'           => 'required',
            'email'         => 'required'
        );

        $this->validate($request, $rules);

        $id = $request->get('id');
        $attributes = [
            'name'          => $request->get('name'),
            'email'         => $request->get('email'),
            'phone'         => $request->get('phone'),
            'gender'        => $request->get('gender'),
            'address'       => $request->get('address')
        ];
        try {
            $existing       =  Member::findOrFail($id);
            $sumbit         =  Member::where('id', $id)->update($attributes);
            $existing->save();

            $abledata = [
                'data'          => $request,
                'able_id'       => $id,
                'able_type'     => Member::class,
            ];
            $this->imgUpload($abledata);
            return redirect()->back()->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
    }
    // Google login
    public function redirectToGoogle()
    {

        return Socialite::driver('google')->redirect();
    }
    // Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginUser($user);
        // Return home after login
        //return redirect()->intended(route('member.auth.profile'));
        $dastination = Session::get('redirectUrl');
        if ($dastination) {
            return redirect()->to($dastination);
        } else {
            return redirect()->intended('home');
        }
    }
    // facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    // facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $this->_registerOrLoginUser($user);

        // Return home after login
        $dastination = Session::get('redirectUrl');
        if ($dastination) {
            return redirect()->to($dastination);
        } else {
            return redirect()->intended('/');
        }
    }
    protected function _registerOrLoginUser($data)
    {

        $Member = Member::where('email', $data->email)->first();
        if (!$Member) {
            $Member = new Member();
            $Member->name           = $data->name;
            $Member->email          = $data->email;
            $Member->phone          = $data->id;
            $Member->password       = Hash::make('123456');
            $Member->gender         = 'Others';
            $Member->role           = 2;
            // $Member->provider_id    = $data->id;
            // $Member->avatar         = $data->avatar;
            $Member->save();

            $Member = Member::where('email', $data->email)->first();
        }

        $credentials = [
            'email' => $Member->email,
            'password' => '123456'
        ];
        // Attempt to log the user in
        if (Auth::guard('member')->attempt($credentials)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('member.auth.profile'));
        }
    }
    public function changePassword()
    {
        return View('member::change_pass');
    }
    public function updatePassword(Request $request)
    {
        if (auth()->user()) {
            $hashedPassword = auth()->user()->password;

            if (\Hash::check($request->old_password, $hashedPassword)) {
                if ($request->new_password == $request->re_password) {
                    $update_user = Member::where('id', auth()->user()->id)
                        ->update([
                            'password'     => bcrypt($request->new_password),
                        ]);
                    Auth::guard('member')->logout();
                    return redirect('/');
                } else {
                    return 'Password doesn`t match !';
                }
            } else {
                return 'Password error !!';
            }
        }
        return $request;
    }
}
