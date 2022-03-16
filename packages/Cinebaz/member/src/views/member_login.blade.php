@extends('layouts.security')

@section('seq_content')
  <!-- Sign in Start -->
   <section class="sign-in-page" style="height:auto;background-image:url('https://pbblogassets.s3.amazonaws.com/uploads/2015/09/Film-Lingo.jpg');background-attachment: fixed;">
      <div class="container">
         <div class="row justify-content-center align-items-center height-self-center">
            <div class="col-lg-5 col-md-12 align-self-center">
               @if (session('fail_mail'))
               <div class="alert alert-danger">
                  {{ session('fail_mail') }}
               </div>
               @endif
               @if (session('fail'))
               <div class="alert alert-danger">
                  {{ session('fail') }}
               </div>
               @endif
               <div class="sign-user_card ">
                  
                  <div class="sign-in-page-data">
                     <div class="sign-in-from w-100 m-auto">
                        <h3 class="mb-3 text-center">Sign in</h3>
                        <form class="mt-4" method="POST" action="{{ route('member.auth.login') }}">
                           @csrf
                           <div class="form-group">
                              <input type="email" class="form-control mb-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="exampleInputEmail2" placeholder="Enter email">
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                           </div>
                           <div class="form-group">
                              <input type="password" class="form-control mb-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="exampleInputPassword2" placeholder="Password">
                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                           </div>
                              <div class="sign-info">
                                 <button type="submit" class="btn btn-primary">Sign in</button>
                                 <div class="custom-control custom-checkbox d-inline-block">
                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                                 </div>
                              </div>
                        </form>
                     </div>
                  </div>
                  <div class="mt-3">
                     <h4 class="text-center mb-3">Login with </h4>
                     <a href="{{ route('login.otp') }}" class="btn btn-warning btn-block">
                           <i class="fa fa-key"></i> OTP
                     </a>
                     <a href="{{ route('login.facebook') }}" class="btn btn-info btn-block">
                           <i class="fa fa-facebook"></i> Facebook
                     </a>
                     <a href="{{ route('login.google') }}" class="btn btn-primary btn-block">
                           <i class="fa fa-google"></i> Google
                     </a>
                  </div>
                  <div class="mt-3">
                     <div class="d-flex justify-content-center links">
                        Don't have an account? <a href="{{ route('member.auth.register') }}" class="text-primary ml-2">Sign Up</a>
                     </div>
                     <div class="d-flex justify-content-center links">
                        <a href="#" class="f-link" style="color:#2e46ed">Forgot your password?</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      <!-- Sign in END -->
      </div>
   </section>
@endsection
