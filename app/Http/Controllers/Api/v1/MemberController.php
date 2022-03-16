<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Cinebaz\Member\Http\Requests\MemberFV;
use Cinebaz\Member\Models\Member;
use Illuminate\Support\Facades\Hash;
use Mail;use DB;use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class MemberController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'signup','forgate_password']]);
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');


        if ($token = $this->guard()->attempt($credentials)) {

            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }
    protected function signup(MemberFV $request)
    {


        $attributes = [
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'phone'     => $request->get('phone'),
            'password'  => Hash::make($request->get('password')),
            'gender'    => $request->get('gender'),
        ];

        Member::create($attributes);
        return response()->json([
            'success' => true,
            'message' => 'Successfully registered user'
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }

    public function forgate_password(Request $request){   
        
        $check = Member::where('email',$request->email)->first();
        if(!$check){
            return response()->json([
                'massege'       => 'email doesn`t match'
            ]);
        }else{
            $dltAttempts = DB::table('password_resets')->where('email',$request->email)->delete();
        }
        $token = Str::random(64);
        $data = [
            'subject'   => 'Password Reset',
            'email'     => $request->email,
            'content'   => config('app.web_url').'/password/reset/?token='.$token.'&&email='.$request->email
        ];
        
        try{
            Mail::send('email-template', $data, function($message) use ($data) {
                $message->to($data['email'])
                ->subject($data['subject']);
            });
            DB::table('password_resets')->insert([
                'email'         => $request->email, 
                'token'         => $token, 
                'created_at'    => Carbon::now()
            ]);
            return Redirect::to(config('app.web_url').'/password/forgot/status');

        }catch(\Exception $e) {
            return response()->json([
                'massege'       => 'Unsuccess Attempts'
            ], 401);
        }
        
        return $request;
    }
}
