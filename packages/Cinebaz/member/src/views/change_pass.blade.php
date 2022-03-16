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
                        <h3 class="mb-3 text-center">Change PassWord</h3>
                        <form class="mt-4" method="POST" action="{{ route('member.auth.updatePassword') }}">
                           @csrf
                            <div class="form-group">
                                <input type="password" class="form-control mb-0 @error('old_password') is-invalid @enderror" name="old_password"  required placeholder="Enter Old Password">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control mb-0 @error('password') is-invalid @enderror" name="new_password" required placeholder="New Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control mb-0 @error('re_password') is-invalid @enderror" name="re_password" required placeholder="Re-type Password">
                                @error('re_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="sign-info">
                                <button type="submit" class="btn btn-primary ">Save</button>
                            </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      <!-- Sign in END -->
      </div>
   </section>
@endsection
