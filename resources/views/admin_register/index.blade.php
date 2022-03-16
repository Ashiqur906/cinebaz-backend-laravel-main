@extends('layouts.app')

@section('content')
  <div id="content-page" class="content-page">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              Admin Register
            </div>
            <div class="card-body">
              <form class="mt-4" method="POST" action="{{ route('admin:register') }}">
                @csrf
                 <div class="form-group">
                    <input type="text" class="form-control mb-0 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus id="exampleInputText" placeholder="Enter Full Name">
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                 </div>
                 <div class="form-group">
                    <input type="email" class="form-control mb-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="exampleInputEmail2" placeholder="Enter email">
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                 </div>
                 <div class="form-group">
                    <input type="number" class="form-control mb-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="exampleInputEmail2" placeholder="Enter number">
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                 </div>
                 <div class="form-group">
                    <input type="password" id="exampleInputPassword2" class="form-control mb-0 @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password" id="customCheck">
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                 </div>
                 <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control mb-0 @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                 </div>

                 <button type="submit" class="btn btn-primary">Sign Up</button>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
{{-- status popup message --}}
