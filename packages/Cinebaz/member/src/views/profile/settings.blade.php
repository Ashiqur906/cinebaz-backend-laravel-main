@extends('frontend::layouts.master')
@section('content')
<!-- MainContent -->
<section class="m-profile setting-wrapper">        
    <div class="container">
        <h4 class="main-title mb-4">My Account</h4>
        <form action="{{ route('member.auth.update') }}" method="POST" enctype="multipart/form-data">
            @csrf()
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div class="sign-user_card text-center">
                        @if(count($user->images)>0)
                        <img src="{{asset($user->images[0]->small)}}" class="img-fluid d-block mx-auto mb-3" alt="{{$user->name}}" id="image">
                        @else
                        <img src="https://visualpharm.com/assets/30/User-595b40b85ba036ed117da56f.svg" class="img-fluid d-block mx-auto mb-3" alt="{{$user->name}}" id="image">
                        @endif
                        <h4 class="mb-3">{{$user->name}}</h4>
                        <input name="image"class="form_gallery-upload" type="file" accept=".png, .jpg, .jpeg" value="{{ old('image') }}" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" >
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="sign-user_card">
                        <h5 class="mb-3 pb-3 a-border">Personal Details</h5>
                        <div class="row align-items-center justify-content-between mb-3">
                            <div class="col-md-12">
                                <span class="text-light font-size-13">Name</span>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control">
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-between mb-3">
                            <div class="col-md-12">
                                <span class="text-light font-size-13">Email</span>
                                <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="email (EX: member@domain.com)">
                                <input type="hidden" name="id" value="{{$user->id}}">
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-between mb-3">
                            <div class="col-md-12">
                                <span class="text-light font-size-13">Phone</span>
                                <input type="type" name="phone" value="{{$user->phone}}" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-between mb-3">
                            <div class="col-md-12">
                                <label class="">Gender</label>
                                <select name="gender" class="form-select text-light bg-dark" style="height: 40px;">
                                    <option value="">Select Gender</option>
                                    <option value="Male" @if($user->gender == 'Male') selected="" @endif>Male</option>
                                    <option value="Female" @if($user->gender == 'Female') selected="" @endif>Female</option>
                                    <option value="Others" @if($user->gender == 'Others') selected="" @endif>Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-between mb-3">
                            <div class="col-md-12">
                                <span class="text-light font-size-13">Address</span>
                                <textarea class="form-control" name="address" placeholder="Address">{{$user->address}}</textarea>
                            </div>
                        </div>
                        <h5 class="mb-3 mt-4 pb-3 a-border">Plan Details</h5>
                        <div class="row justify-content-between mb-3">
                            <div class="col-md-8">
                                <p>Premium</p>                                
                            </div>
                            <div class="col-md-4 text-md-right text-left">
                                <a href="{{ route('frontend.plan') }}" class="text-primary">Change Plan</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-hover">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- MainContent End-->
@endsection
@push('scripts')
<style>
.makeupinstation {
display: block;
}
.makeupinstation small {
color: #9E9E9E;
font-weight: 200;
}
</style>
@endpush