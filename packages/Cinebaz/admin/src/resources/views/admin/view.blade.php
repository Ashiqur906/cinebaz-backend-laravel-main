@extends('layouts.app')

@section('content')
<div id="content-page" class="content-page">
   <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                <!-- <h4 class="main-title mb-4">My Account</h4> -->
                <div class="row">
                    <div class="col-lg-4 mb-3">
                        <div class="sign-user_card text-center">
                            @if(count($getUser->images) > 0)
                            <img src="{{asset($getUser->images[0]->small)}}" class="img-fluid d-block mx-auto mb-3" alt="{{$getUser->name}}">
                            @else
                            <img src="https://visualpharm.com/assets/30/User-595b40b85ba036ed117da56f.svg" class="img-fluid d-block mx-auto mb-3" alt="{{$getUser->name}}">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="sign-user_card">
                            <h5 class="mb-3 pb-3 a-border">Personal Details</h5>
                            <div class="row align-items-center justify-content-between mb-3">
                                <div class="col-md-8">
                                <span class="text-light font-size-13">Name</span>
                                <p class="mb-0">{{$getUser->name}}</p>
                                </div>
                            </div>
                            <div class="row align-items-center justify-content-between mb-3">
                                <div class="col-md-8">
                                <span class="text-light font-size-13">Email</span>
                                <p class="mb-0">{{$getUser->email}}</p>
                                </div>
                            </div>
                            <div class="row align-items-center justify-content-between mb-3">
                                <div class="col-md-8">
                                <span class="text-light font-size-13">Phone</span>
                                <p class="mb-0">{{$getUser->phone}}</p>
                                </div>
                            </div>
                            <div class="row align-items-center justify-content-between mb-3">
                                <div class="col-md-8">
                                <span class="text-light font-size-13">Joining Date</span>
                                <p class="mb-0">{{date('dM, Y',strtotime($getUser->created_at))}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
      <br>
   </div>
</div>
@endsection
