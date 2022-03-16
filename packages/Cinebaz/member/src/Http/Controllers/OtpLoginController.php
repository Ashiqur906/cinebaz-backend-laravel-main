<?php

namespace Cinebaz\Member\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Cinebaz\Member\Models\Member;
use Cinebaz\Member\Models\TempUser;
use App\Models\User;
use Auth;

class OtpLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:member', ['except' => []]);
    }

    public function Index(){
      return view('member::otplogin');
    }
    public function SendOTPCode(Request $request){
      $phone = explode('+',$request->phone);
  
      $checkPhone = Member::where('phone',$phone[1])->first();
      if($checkPhone){
        return 1;
      }else{
        $checkTemp = TempUser::where('phone',$phone[1])->first();
        if($checkTemp){
          $update_user = TempUser::where('phone',$phone[1])
            ->update([
               'ip'         => $request->ip(),
               'atmp_try'   => $checkTemp->atmp_try+1,
            ]);
          return 1;
        }else{
          $user = new TempUser;

          $user->phone    = $phone[1];
          $user->ip       = $request->ip();
          $user->atmp_try = 1;

          $user->save();
          return 1;
        }
        return 1;
      }
      return 1;
    }
    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:8'
      ]);
        
      // Attempt to log the user in
      if (Auth::guard('member')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        //dd('muaz');
        return redirect()->intended(route('member.auth.profile'));
      }

      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    public function SaveOTPCode($phone){
      $checkUser = Member::where('phone',$phone)->first();
      
      if($checkUser){
        Auth::guard('member')->login($checkUser);
        return redirect()->route('frontend.index');
      }else{
        $attributes = [
          'name'      => Null,
          'email'     => Null,
          'phone'     => $phone,
          'password'  => Null,
          'gender'    => Null,
        ];
        try {
          $create     = Member::create($attributes);
          $checkUser  = Member::where('phone',$phone)->first();
          if($checkUser){
            Auth::guard('member')->login($checkUser);
          }
          return redirect()->route('frontend.index');
        }catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
      }
      return $phone;
    }
    
}
