@extends('layouts.app')
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Plan Assign to Subscription</h4>
                   </div>
                   <div class="iq-card-header-toolbar d-flex align-items-center">
                      <a href="{{route('admin.subscription.add_assign') }}" class="btn btn-primary">Assign</a>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div class="table-view">
                      <table class="data-tables table movie_table " style="width:100%">
                         <thead>
                            <tr>
                               <th style="width:10%;"> No </th>
                               <th style="width:20%;"> Sebscription Head </th>
                               <th style="width:20%;"> Plean Head </th>
                               <th style="width:20%;">Action</th>
                            </tr>
                         </thead>
                         <tbody>                          
                          @foreach($assignData as $sub)
                            <tr>
                              <td style="width:10%;">{{$loop->index+1}}</td>
                              <td style="width:20%;">{{$sub->SubHead->title}}</td>
                              <td style="width:20%;">{{$sub->PlanHead->title}}</td>
                              <td style="width:20%;">
                                 <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Delete" href="{{route('admin.subscription.dlt_assign',$sub->id)}}" onclick="return confirm('Are you sure you want to delete ?');"><i class="ri-delete-bin-line"></i></a>
                              </td>
                            </tr>
                          @endforeach
                         </tbody>
                      </table>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
</div>
@endsection
