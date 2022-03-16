@extends('layouts.app')

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Permission Lists</h4>
                   </div>
                   <div class="iq-card-header-toolbar d-flex align-items-center">
                      <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPermission">Add Permission</a>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div class="table-view">
                      <table class="data-tables table movie_table " style="width:100%">
                         <thead>
                            <tr>
                               <th>No</th>
                               <th>Title</th>
                               <th>Action</th>
                            </tr>
                         </thead>
                         <tbody>
                           @foreach($getPermission as $permission)
                           <tr>
                              <td>{{ $loop->index+1 }}</td>
                              <td>{{ $permission->name }}</td>
                              <td></td>
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
 
<div id="createPermission" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    <form method="POST" action="{{route('admin.permission.save')}}" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center">Create Permission</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-2">
                                    <label for="field-1" class="form-label">Name</label>
                                    <input type="text" name="title" class="form-control" placeholder="Permission Name">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary waves-effect" onclick="AddNew()"><i class="fa fa-plus"></i> Add New Head</button> -->
                <button type="submit" class="btn btn-info waves-effect waves-light">Save </button>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection
