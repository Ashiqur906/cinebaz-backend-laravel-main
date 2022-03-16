@extends('layouts.app')
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="iq-card">
                <div class="row">
                    <div class="col-lg-4 mb-3">
                        <div class="sign-user_card text-center">
                            @if(count($user->images)>0)
                            @if(file_exists(public_path().'/storage/'.$user->images[0]->small))
                            <img src="{{asset('storage/'.$user->images[0]->small)}}" class="img-fluid d-block mx-auto mb-3" alt="{{$user->name}}" id="image">
                            @else
                            <img src="https://visualpharm.com/assets/30/User-595b40b85ba036ed117da56f.svg" class="img-fluid d-block mx-auto mb-3" alt="{{$user->name}}" id="image" style="height:150px;">
                            @endif
                            @else
                            <img src="https://visualpharm.com/assets/30/User-595b40b85ba036ed117da56f.svg" class="img-fluid d-block mx-auto mb-3" alt="{{$user->name}}" id="image" style="height:150px;">
                            @endif
                            <h4 class="mb-3">{{ $user->name }}</h4>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="sign-user_card">
                            <div class="show tab-1">
                                <!-- <h5 class="mb-3 pb-3 a-border">Personal Details</h5> -->
                                <div class="row align-items-center justify-content-between mb-3">
                                    <div class="col-md-8">
                                        <span class="text-light font-size-13">Email</span>
                                        <p class="mb-0">{{$user->email}}</p>
                                    </div>
                                </div>
                                <div class="row align-items-center justify-content-between mb-3">
                                    <div class="col-md-8">
                                        <span class="text-light font-size-13">Phone</span>
                                        <p class="mb-0">{{$user->phone}}</p>
                                    </div>
                                </div>
                                <div class="row align-items-center justify-content-between mb-3">
                                    <div class="col-md-8">
                                        <span class="text-light font-size-13">Joining Date</span>
                                        <p class="mb-0">{{date('dM, Y',strtotime($user->created_at))}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-xs-12 ">
                                <nav>
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-buy-tab" data-toggle="tab" href="#nav-buy" role="tab" aria-controls="nav-buy" aria-selected="true">Buy Details</a>
                                        <a class="nav-item nav-link" id="nav-watch-tab" data-toggle="tab" href="#nav-watch" role="tab" aria-controls="nav-watch" aria-selected="false">Watch Details</a>
                                        <a class="nav-item nav-link" id="nav-fevourite-tab" data-toggle="tab" href="#nav-fevourite" role="tab" aria-controls="nav-fevourite" aria-selected="false">Fevourit list</a>
                                        <!-- <a class="nav-item nav-link" id="nav-login-tab" data-toggle="tab" href="#nav-login" role="tab" aria-controls="nav-login" aria-selected="false">Login History</a> -->
                                    </div>
                                </nav>

                                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-buy" role="tabpanel" aria-labelledby="nav-buy-tab">
                                        <div class="row justify-content-between mb-3 tab-2">
                                            <table class="data-tables table">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Media</th>
                                                        <th>Amount</th>
                                                        <th>Date</th>
                                                        <th>Deadline</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($get_ticket as $ticket)
                                                    <tr>
                                                        <td>#{{ $loop->index+1 }}</td>
                                                        <td>
                                                            <img src="{{asset($ticket->medias && $ticket->medias->featured ? 'storage/'.$ticket->medias->featured->small : null )}}" style="height:70px;">
                                                        </td>
                                                        <td>{{ $ticket->medias && $ticket->medias->discount_price ? $ticket->medias->discount_price.'BDT' : null }} </td>
                                                        <td>{{ $ticket->orders ? $ticket->orders->created_at : null }}</td>
                                                        <td>{{ $ticket->deadline }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-watch" role="tabpanel" aria-labelledby="nav-watch-tab">
                                        <div class="row justify-content-between mb-3 tab-3">
                                            <table class="data-tables table">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Media</th>
                                                        <th>Media Title</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($get_watchlist as $watchlist)
                                                    <tr>
                                                        <td>#{{ $loop->index+1 }}</td>
                                                        <td>
                                                            <img src="{{asset($watchlist->media && $watchlist->media->featured ? 'storage/'.$watchlist->media->featured->small : null )}}" style="height:70px;">
                                                        </td>
                                                        <td>{{ $watchlist->media ? $watchlist->media->title_en : null }}</td>
                                                        <td>{{ $watchlist->created_at }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-fevourite" role="tabpanel" aria-labelledby="nav-fevourite-tab">
                                        <div class="row justify-content-between mb-3 tab-4">
                                            <table class="data-tables table">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Media</th>
                                                        <th>Media Title</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($get_fevlist as $fevlist)
                                                    <tr>
                                                        <td>#{{ $loop->index+1 }}</td>
                                                        <td>
                                                            <img src="{{asset($fevlist->media && $fevlist->media->featured ? 'storage/'.$fevlist->media->featured->small : null )}}" style="height:70px;">
                                                        </td>
                                                        <td>{{ $fevlist->media ? $fevlist->media->title_en : null }}</td>
                                                        <td>{{ $fevlist->created_at }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- <div class="tab-pane fade" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
                                        <div class="row justify-content-between mb-3 tab-4">
                                            <table class="data-tables table">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Media</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
</div>
<!-- MainContent -->

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
    .show{
    
    }
    nav > .nav.nav-tabs{
        border: none;
        color:#fff;
        background:#272e38;
        border-radius:0;

    }
    nav > div a.nav-item.nav-link,
    nav > div a.nav-item.nav-link.active
    {
        border: none;
        padding: 18px 25px;
        color:#fff;
        background:#272e38;
        border-radius:0;
    }

    nav > div a.nav-item.nav-link.active:after
    {
        content: "";
        position: relative;
        bottom: -56px;
        left: -23%;
        border: 15px solid transparent;
        border-top-color: #f6931d !important;
    }
    .tab-content{
        background: #fdfdfd;
        line-height: 25px;
        border: 1px solid #ddd;
        border-top:5px solid #f6931d !important;
        border-bottom:5px solid #f6931d !important;
        padding:30px 25px;
    }

    nav > div a.nav-item.nav-link:hover
    {
        border: none;
        background: #c8720c !important;
        color:#fff;
        border-radius:0;
        transition:background 0.20s linear;
    }
    nav > div a.nav-item.nav-link:focus
    {
        border: none;
        background: #f6931d !important;
        color:#fff;
        border-radius:0;
        transition:background 0.20s linear;
    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
        background: #f6931d !important;
    }
    table{
        width: 97% !important;
        margin-left: 15px;
        color : #61605f !important;
    }
    div.dataTables_wrapper div.dataTables_filter input{
        background-color : transparent;
        border : 1px solid gray;
    }
    .dataTables_filter{
        margin-right : 2%;
    }
    .dataTables_paginate{
        margin-right : 2% !important;
    }
    .dataTables_info{
        margin-left : 2% !important;
        color : gray;
    }
    div.dataTables_wrapper div.dataTables_length label{
        color: gray !important;
        padding-left:2%;
    }
    .page-item.active .page-link{
        background: #f6931d !important;
        border-color: #f6931d !important;
    }
</style>
@endpush