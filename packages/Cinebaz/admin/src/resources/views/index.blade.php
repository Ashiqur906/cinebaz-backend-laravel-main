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
                              @if(count(auth('web')->user()->images) > 0)
                              <img src="{{asset(auth('web')->user()->images[0]->small)}}" class="img-fluid d-block mx-auto mb-3" alt="{{auth('web')->user()->name}}" id="image">
                              @else
                              <img src="https://visualpharm.com/assets/30/User-595b40b85ba036ed117da56f.svg" class="img-fluid d-block mx-auto mb-3" alt="{{auth('web')->user()->name}}" id="image">
                              @endif
                                 <!-- <a href="#" class="btn btn-hover btn-block" style="background-color:tomato;color:white;">Change Password</a> -->
                                 <a href="{{route('admin.edit')}}" class="edit-icon text-primary"><i class="fa fa-pencil" style="background-color: white;color:red; padding:5px 7px;border-radius: 50px;"></i></a>
                           </div>
                        </div>
                        <div class="col-lg-8">
                           <div class="sign-user_card">
                              <h5 class="mb-3 pb-3 a-border">Personal Details</h5>
                              <div class="row align-items-center justify-content-between mb-3">
                                 <div class="col-md-8">
                                    <span class="text-light font-size-13">Name</span>
                                    <p class="mb-0">{{auth('web')->user()->name}}</p>
                                 </div>
                              </div>
                              <div class="row align-items-center justify-content-between mb-3">
                                 <div class="col-md-8">
                                    <span class="text-light font-size-13">Email</span>
                                    <p class="mb-0">{{auth('web')->user()->email}}</p>
                                 </div>
                              </div>
                              <div class="row align-items-center justify-content-between mb-3">
                                 <div class="col-md-8">
                                    <span class="text-light font-size-13">Phone</span>
                                    <p class="mb-0">{{auth('web')->user()->phone}}</p>
                                 </div>
                              </div>
                              <div class="row align-items-center justify-content-between mb-3">
                                 <div class="col-md-8">
                                    <span class="text-light font-size-13">Joining Date</span>
                                    <p class="mb-0">{{date('dM, Y',strtotime(auth('web')->user()->created_at))}}</p>
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
