@extends('layouts.app')
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Admin Lists</h4>
                   </div>
                   <div class="iq-card-header-toolbar d-flex align-items-center">
                      <a href="{{ route('admin.add') }}" class="btn btn-primary">Add Admin</a>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div class="table-view">
                      <table class="data-tables table movie_table " style="width:100%">
                         <thead>
                            <tr>
                               <th style="width:10%;">No</th>
                               <th style="width:20%;">Image</th>
                               <th style="width:20%;">Name</th>
                               <th style="width:20%;">Email</th>
                               <th style="width:20%;">Action</th>
                            </tr>
                         </thead>
                         <tbody>                          
                         
                        @foreach ($getUser as $admin)
                          
                        <tr>
                           <td>#{{$loop->index+1}}</td>
                           @if(count($admin->images)>0)
                           <td><img src="{{asset($admin->images[0]->small)}}" height="70px;"></td>
                           @else 
                           <td>
                              <img src="https://visualpharm.com/assets/30/User-595b40b85ba036ed117da56f.svg" alt="{{$admin->name}}" height="70px;">
                           </td>
                           @endif
                           <td>{{$admin->name}}</td>
                           <td>{{$admin->email}}</td>
                           <td>
                              <div class="flex align-items-center list-user-action">
                                <a class="iq-bg-info" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="View" href="{{route('admin.view',$admin->id)}}"><i class="lar la-eye"></i></a>
                                  
                                <a class="iq-bg-warning" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="restore" href="{{route('admin.trash_restore',$admin->id)}}" 
                                    onclick="return confirm('Are you sure you want to restor this Admin ?');"><i
                                       class="ri-restart-line"></i></a>
                                <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Delete" href="{{route('admin.trash_delete',$admin->id)}}" 
                                    onclick="return confirm('Are you sure you want to Permanently delete this Admin ?');"><i
                                       class="ri-delete-bin-line"></i></a>
                              </div>
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
