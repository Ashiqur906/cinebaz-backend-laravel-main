@extends('layouts.app')
@section('content')
<div id="content-page" class="content-page">
   <div class="container-fluid">
         <div class="row">
               <div class="col-sm-12">
                    <form class="mt-4" method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 mb-3">
                            <img src="https://visualpharm.com/assets/30/User-595b40b85ba036ed117da56f.svg" class="img-fluid d-block mx-auto mb-3" alt="{{auth('web')->user()->name}}" id="p_image">
                                <h4 class="mb-3" id="userName"></h4>
                                <input name="image"class="form_gallery-upload" type="file" accept=".png, .jpg, .jpeg" value="{{ old('image') }}" onchange="document.getElementById('p_image').src = window.URL.createObjectURL(this.files[0])" >
                            </div>
                            <div class="col-lg-8">
                                <div class="sign-user_card">
                                    <h5 class="mb-3 pb-3 a-border">Personal Details</h5>
                                    <div class="row align-items-center justify-content-between mb-3">
                                        <div class="col-md-12">
                                            <span class="text-light font-size-13">Name</span>
                                            {{ Form::text('name', null,['id' => 'name','class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Your Name']) }}
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row align-items-center justify-content-between mb-3">
                                        <div class="col-md-12">
                                            <span class="text-light font-size-13">Email</span></p>
                                            {{ Form::text('email',null, ['id' => 'email', 'class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Your Email']) }}
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row align-items-center justify-content-between mb-3">
                                        <div class="col-md-12">
                                            <span class="text-light font-size-13">Password</span>
                                            {{ Form::password('password', ['class' => $errors->has('password') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Your Password']) }}
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row align-items-center justify-content-between mb-3">
                                        <div class="col-md-12">
                                            <span class="text-light font-size-13">Re-Password</span>
                                            {{ Form::password('re-password', ['class' => $errors->has('re-password') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Re-Type Your Password']) }}
                                            @error('re-password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <center>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
               </div>
         </div>
      <br>
   </div>
</div>
@endsection
