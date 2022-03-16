<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Packages\Cinebaz\Member\Models\Member;
use App\Models\User;
use Auth;


class MemberLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:member', ['except' => ['logout','redirectToGoogle','_registerOrLoginUser']]);
    }

    public function showlogin(){
        return view('member::login');
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

    public function logout()
    {
        Auth::guard('member')->logout();
        return redirect('/');
    }

    // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    
}
