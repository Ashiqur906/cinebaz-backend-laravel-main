<?php

namespace Cinebaz\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Cinebaz\Seo\Traits\TSeo;
use Cinebaz\Admin\Http\Requests\AdminFV;
use Cinebaz\Admin\Traits\TPicture;
use Cinebaz\Tag\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;use Auth;use DB;
use App\Models\User;
class AdminController extends Controller
{
    use TSeo;
    use TPicture;
    public function __construct()
    {
        //$this->middleware('auth:web');
    }

    public function index()
    {
        return view('admin::index');
    }
    public function edit()
    {
        return view('admin::add');
    }
    public function admin_edit(Request $request)
    {
        $admin = User::find($request->user_id);
        return view('admin::admin.edit',compact('admin'));
    }

    public function update(Request $request)
    {
        // return $request;
        $rules = array(
            'name'       	=> 'required',
            'email'         => 'required'
        );
        
        $this->validate($request, $rules);

        $id = $request->id;
        if($request->get('password')){
            $rules = array(
                'name'       	=> 'required',
                'email'         => 'required',
                'password'      => 'required|required_with:re-password|same:re-password',
            );
            $this->validate($request, $rules);
            $attributes = [
                'name'          => $request->get('name'),
                'email'         => $request->get('email'),
                'password'      => Hash::make($request->get('password')),
            ];

            $ch = 1;
        }else{
            $attributes = [
                'name'          => $request->get('name'),
                'email'         => $request->get('email'),
            ];
            $ch = '';
        }
        
        try {
            $existing           =  User::findOrFail($id);
            $submit             =  User::where('id', $id)->update($attributes);
            $existing->save();

            $abledata = [
                'data'          => $request,
                'able_id'       => $id,
                'able_type'     => User::class,
            ];
            $this->imgUpload($abledata);
            if(auth('web')->user()->id == $id && $request->get('password')){
                Auth::guard('web')->logout();
            }
            return redirect()->back()->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {

            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
    }

    // Register
    public function list()
    {
        $getUser = User::get();
        return view('admin::admin.list',compact('getUser'));
    }
    public function create()
    {
        //$mdata = Category::where('is_active', 'yes')->get();
        return view('admin::admin.add');
    }
    public function store(Request $request)
    {
        
        $rules = array(
            'name'       	=> 'required',
            'email'         => 'required',
            'password'      => 'required|required_with:re-password|same:re-password',
        );
        
        $this->validate($request, $rules);

        $attributes = [
            'name'          => $request->get('name'),
            'email'         => $request->get('email'),
            'password'      => Hash::make($request->get('password')),
        ];
        try {

            $submit         =  User::create($attributes);
            $abledata = [
                'data'          => $request,
                'able_id'       => $submit->id,
                'able_type'     => User::class,
            ];
            $this->imgUpload($abledata);
        
            return redirect()->route('admin.register')->with('success', 'Successfully saved');
        } catch (\Illuminate\Database\QueryException $ex) {

            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
    }
    public function view($id){
        $getUser = User::where('id',$id)->first();
        return view('admin::admin.view',compact('getUser'));
    }
    public function destroy($id)
    {
        //dd($id);
        $delete = User::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'This request has been deleted');
    }
    public function trash(){
        $getUser = User::onlyTrashed()->get();
        return view('admin::admin.trash',compact('getUser'));
    }
    public function trash_restore($id)
    {
        $restore = User::onlyTrashed()->find($id);
        $restore->restore();
        return redirect()->back()->with('success', 'This request has been restored');
    }
    public function trash_destroy($id)
    {
        // $delete = User::onlyTrashed()->find($id);
        

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $delete = User::onlyTrashed()->find($id)->forceDelete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        return redirect()->back()->with('success', 'This request has been deleted');
    }
}
