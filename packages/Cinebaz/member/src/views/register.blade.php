@extends('layouts.security')
@section('seq_content')
<!-- Sign in Start -->
<section class="sign-in-page" style="padding-top:60px;height:auto;background-image:url('https://pbblogassets.s3.amazonaws.com/uploads/2015/09/Film-Lingo.jpg');background-attachment: fixed;">
    <div class="container">
        <div class="row justify-content-center align-items-center height-self-center">
            <div class="col-lg-8 col-md-12 align-self-center">
                <div class="sign-user_card ">
                    <div class="sign-in-page-data">
                        <div class="sign-in-from w-100 m-auto">
                            <h3 class="mb-6 text-center">Sign Up</h3>
                            <p class="d-flex justify-content-center links" style="width: 100%;">
                                Already have an account? <a href="{{ route('member.auth.showlogin') }}"
                                    class="text-primary ml-2">Sign In</a>
                            </p>
                            <form class="mt-4" method="POST" action="{{ route('member.auth.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control mb-0 @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" required autocomplete="name"
                                                autofocus id="exampleInputText" placeholder="Enter Full Name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control mb-0 @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" autocomplete="email"
                                                id="exampleInputEmail2" placeholder="Enter email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="number"
                                                class="form-control mb-0 @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ old('phone') }}" autocomplete="phone"
                                                id="exampleInputPhone2" placeholder="Enter Phone Number">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" id="exampleInputPassword2"
                                                class="form-control mb-0 @error('password') is-invalid @enderror"
                                                placeholder="Password" name="password" required
                                                autocomplete="new-password" id="customCheck">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="password-confirm" type="password"
                                                class="form-control mb-0 @error('password') is-invalid @enderror"
                                                name="password_confirmation" placeholder="Confirm Password" required
                                                autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row" style="padding-left: 15px;">
                                            <div class="form-check col-4">
                                                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male" checked="">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check col-4">
                                                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Female">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Female
                                                </label>
                                            </div>
                                            <div class="form-check col-4">
                                                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Others">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Others
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row" style="text-align: center;margin-top:20px;">
                                            <div class="col-md-12">
                                                <p class="d-flex justify-content-center links" style="width: 100%;">
                                                    Login with
                                                </p>
                                                <a href="{{ route('login.facebook') }}" class="btn btn-info btn-block">
                                                    <i class="fa fa-facebook"></i> Facebook
                                                </a>
                                                <a href="{{ route('login.google') }}" class="btn btn-primary btn-block">
                                                    <i class="fa fa-google"></i> Google
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-6">
                                        <center><button type="submit" class="btn btn-primary">Sign Up</button></center>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign in END -->
        <!-- color-customizer -->
    </div>
</section>
<!-- Sign in END -->

@endsection
@push('scripts')
    <style>


    </style>

@endpush
