@extends('layouts.app')

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header ">
                            <div class="iq-header-title d-flex justify-content-between">
                                <h4 class="card-title ">Order Details</h4>
                                <a href="{{route('admin.order.report' , $order->id)}}" class="btn btn-primary btn-sm " style="color:black;font-weight:bold"><i class="fa fa-download"> PDF</i></a>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                            </div>
                        </div>
                        <div class="iq-card-body">
                        <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td style="width: 50%; vertical-align: top;" class="text-left">Order Info</td>
                                    <td style="width: 50%; vertical-align: top;" class="text-left">User Address</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-left">
                                        <b>Invoice ID :</b> {{$order->code}}<br>
                                        <b>Order date :</b> {{$order->created_at->format('d/m/Y')}}<br>
                                        <b>Order Status :</b> {{$order->status}}<br/>
                                        <b>Currency :</b> {{$order->currency}}<br/>
                                        <b>Transaction ID :</b> {{$order->transaction_id}}<br/>
                                        <b>Payment Method :</b>  
                                    </td>
                                    <td class="text-left">
                                        <span>Name :</span>  {{ $order->name}}
                                        <br><span>Email :</span>  {{ $order->email}}
                                        <br><span>Mobile No :</span> {{ $order->phone}}
                                        <br><span>Address :</span> {{ $order->address}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td colspan="2" style="vertical-align: top;" class="text-left">Order Details</td>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @php
                                            $regular_price = 0;
                                            $purchased_price = 0;
                                        @endphp
                                        @forelse($order->orderDetails as $details) 
                                            <tr>
                                                 <td width="50%" >
                                                   
                                                        @isset($details->media->featured->small)    
                                                         <img src="{{asset('storage/'.$details->media->featured->small)}}" width="80" height="80">
                                                        @endisset

                                                       <span class="pl-5"><strong>Title:</strong></span>  {{$details->media->title_en??''}}<br/>
                                                </td>
                                                <td class="text-left" >
                                                  <span><strong>Regular Price:</strong></span>  {{$details->regular_price??''}}<br/>
                                                  <span><strong>Purchased Price:</strong></span>  {{$details->discounted_price??''}}<br/>
                                                  <span><strong>Deadline:</strong></span>  {{$details->deadline??''}}<br/>
                                                </td>
                                            </tr>
                                        @php
                                            $regular_price += $details->regular_price;
                                            $purchased_price += $details->discounted_price;
                                        @endphp
                                          
                                        @empty
                                            <tr class="text-center">
                                                <td><strong>Empty</strong></td>
                                            </tr>
                                        @endforelse
    
                                        @if(!$order->orderDetails->isEmpty())
                                        <tr>
                                            <td class="text-right" width="50%"><span>Total Regular Price</span></td>
                                            <td>{{$order->currency}}. {{$regular_price}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right" width="50%"><span>Total Purchased Price</span></td>
                                            <td>{{$order->currency}}. {{$purchased_price}}</td>
                                        </tr>
                                        @endif
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection
@push('scripts')
  
@endpush
