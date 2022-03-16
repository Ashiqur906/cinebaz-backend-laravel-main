@extends('layouts.security')

@section('seq_content')

  <!-- Sign in Start -->
        <section class="sign-in-page" style="height:auto;background-image:url('https://pbblogassets.s3.amazonaws.com/uploads/2015/09/Film-Lingo.jpg');background-attachment: fixed;">
          <div class="container">
            <div class="row justify-content-center align-items-center height-self-center">
               <div class="col-lg-5 col-md-12 align-self-center">
                  <div class="sign-user_card ">
                     <div class="sign-in-page-data">
                        <div class="sign-in-from w-100 m-auto">
                           <h3 class="mb-3 text-center">Sign in</h3>
                           <form class="mt-4" method="POST" action="{{ route('admin.login.try') }}">
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
                                    <!-- <div class="custom-control custom-checkbox d-inline-block">
                                       <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                       <label class="custom-control-label" for="customCheck">Remember Me</label>
                                    </div> -->
                                 </div>
                           </form>
                        </div>
                     </div>
                     <!-- <div class="mt-3">
                        <div class="d-flex justify-content-center links">
                            @if (Route::has('password.request'))
                           Don't have an account? <a href="{{ route('register') }}" class="text-primary ml-2">Sign Up</a>
                           @endif
                        </div>
                        <div class="d-flex justify-content-center links">
                          @if (Route::has('password.request'))
                           <a href="{{ route('password.request') }}" class="f-link">Forgot your password?</a>
                           @endif
                        </div>
                     </div> -->
                  </div>
               </div>
            </div>
            <!-- Sign in END -->

@endsection
