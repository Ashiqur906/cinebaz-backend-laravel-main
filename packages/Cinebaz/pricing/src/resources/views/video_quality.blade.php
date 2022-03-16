@extends('layouts.app')
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Video Quality</h4>
                   </div>
                   <div class="iq-card-header-toolbar d-flex align-items-center">
                      <a href="{{route('admin.videoquality.add') }}" class="btn btn-primary">Add Video Quality</a>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div class="table-view">
                      <table class="data-tables table movie_table " style="width:100%">
                         <thead>
                            <tr>
                               <th style="width:10%;">No</th>
                               <th style="width:20%;">Title</th>
                               <th style="width:20%;"> Quality </th>
                               <th style="width:20%;"> Full Name </th>
                               <th style="width:20%;"> Short Name </th>
                               <th style="width:20%;"> Remarks </th>
                               <th style="width:20%;">Action</th>
                            </tr>
                         </thead>
                         <tbody>                          
                          @foreach($fdata as $v_quality)
                            <tr>
                              <td style="width:10%;">{{$loop->index+1}}</td>
                              <td style="width:20%;">{{$v_quality->title_en}}</td>
                              <td style="width:20%;">{{$v_quality->quality}}</td>
                              <td style="width:20%;">{{$v_quality->fullname}}</td>
                              <td style="width:20%;">{{$v_quality->shortname}}</td>
                              <td style="width:20%;">{{$v_quality->remarks}}</td>
                              <td style="width:20%;">
                                 <!-- <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a> -->
                                  
                                 <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Delete" href="{{route('admin.videoquality.delete',$v_quality->id)}}" onclick="return confirm('Are you sure you want to delete ?');"><i class="ri-delete-bin-line"></i></a>
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
