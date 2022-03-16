@extends('layouts.app')
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                        <h4 class="card-title">Assign Permission Lists</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <a href="#" class="btn btn-warning mr-1" data-bs-toggle="modal" data-bs-target="#assignRole">Assign Role</a>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignPermission">Assign Permission</a>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-view">
                            <table class="data-tables table movie_table " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>User</th>
                                        <th>Role</th>
                                        <th>Permission</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($getUser as $user)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            @foreach($user->roles as $Role)
                                            <span style="padding:5px 7px;background-color:#ff4700;"> {{ $Role->name }} <a href="{{route('admin.permission.assignRoleDelete',['user_id'=>$user->id,'role'=>$Role->name])}}"><i class="fa fa-cut" style="padding:5px;background-color:white;"></i></a></span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($user->getAllPermissions() as $Permission)
                                            <span style="padding:5px 7px;background-color:#1e83b9;color:white;"> {{ $Permission->name }} <a href="{{route('admin.permission.assignPermissionDelete',['user_id'=>$user->id,'permission'=>$Permission->name])}}"><i class="fa fa-cut" style="padding:5px;background-color:white;color:gray;"></i></a></span>
                                            @endforeach
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
<div id="assignRole" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    <form method="POST" action="{{ route('admin.permission.saveAssignRole') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center">Assign Role</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="field-1" class="form-label">Users</label>
                            <select name="user" class="form-control">
                                <option value="">Select User</option>
                                @foreach($getUser as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="field-1" class="form-label">Assign User Role</label>
                            <select name="role" class="form-control">
                                <option value="">Assign User Role</option>
                                @foreach($getRole as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary waves-effect" onclick="AddNew()"><i class="fa fa-plus"></i> Add New Head</button> -->
                <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
            </div>
        </div>
    </form>
    </div>
</div>
<div id="assignPermission" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('admin.permission.saveAssignPermission') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Assign Permission</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="field-1" class="form-label">Users</label>
                                <select name="user" class="form-control">
                                    <option value="">Select User</option>
                                    @foreach($getUser as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="field-1" class="form-label">Assign User Permissin</label>
                                <select name="permission" class="form-control">
                                    <option value="">Assign User Permissin</option>
                                    @foreach($getPermission as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary waves-effect" onclick="AddNew()"><i class="fa fa-plus"></i> Add New Head</button> -->
                    <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
