@extends('layouts.app')

@section('content')

    <!-- Main content -->

    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-primary pull-right">
                                <i class="las la-plus-circle"></i> Add Top Ten
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered" id="media_table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Title</th>
                                        <th>Thumbnil</th>
                                        <th>Placement</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th style="width: 185px; text-align:center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($fdata) > 0)
                                    @foreach($fdata as $top)
                                    <tr>
                                        <td style="width: 10px">#{{$loop->index+1}}</td>
                                        <td>{{$top->media ? $top->media->title_en : null}}</td>
                                        <td><img src="{{asset($top->media && $top->media->featured ? 'storage/'.$top->media->featured->small : null)}}" style="width:30px;"></td>
                                        <td>{{$top->placement}}</td>
                                        <td>{{$top->start_date}}</td>
                                        <td>{{$top->deadline}}</td>
                                        @if($top->status == 1)
                                        <td><button type="button" class="edit btn btn-success btn-sm">Active</button></td>
                                        @else
                                        <td><button type="button" class="edit btn btn-danger btn-sm">Inactive</button></td>
                                        @endif
                                        <td style="width: 185px; text-align:center">
                                            <a class="btn iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('admin.media.dlt.top',$top->id)}}" onclick="return confirm('Are you sure you want to delete ?');">
                                                <i class="ri-delete-bin-line"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Top Ten Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['method' => 'POST', 'route' => 'admin.media.top.store']) }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Video</label>
                                <select class="form-control" name="video_id">
                                    <option value="">Select Video</option>
                                    @foreach($mdata as $video)
                                    <option value="{{$video->id}}">{{$video->title_en}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Placement</label>
                                <select class="form-control" name="placement">
                                    <option value="">Select Placement</option>
                                    @for($i=1; $i<=10; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="date" name="start_date" class="form-control" placeholder="Start Date">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>End Date</label>
                                <input type="date" name="deadline" class="form-control" placeholder="End Date">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
@push('scripts')

    <script>
        $(document).ready(function() {

            $('#media_table').DataTable();
        });

    </script>


@endpush
