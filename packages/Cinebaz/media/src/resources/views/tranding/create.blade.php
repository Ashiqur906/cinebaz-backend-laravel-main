@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <!-- Main content -->
    @if (Session::has('myexcep'))
        @dump(Session::get('myexcep'));
    @endif
    @php
    $files = false;
    @endphp
    
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        {{ Form::open(['method' => 'POST', 'route' => 'admin.media.store']) }}
                            <table class="table table-bordered" id="media_table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Thumbnil</th>
                                        <th>Status</th>
                                        <th style="width: 185px; text-align:center">Actions</th>

                                    </tr>
                                </thead>

                            </table>
                        {{ Form::close() }}
                    <!-- /.row -->
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>

@endsection
@push('scripts')
<script>
        $(document).ready(function() {
            $('#media_table').DataTable({
                processing: true,
                serverSide: true,
                dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-4'B><'col-sm-12 col-md-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ],
                ajax: {
                    url: "{{ route('admin.media.tranding.add') }}",
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    }, {
                        data: 'title_en',
                        name: 'title_en'
                    },
                    {
                        data: 'slug',
                        name: 'slug'
                    },
                    {
                        data: 'thumbnil',
                        name: 'thumbnil'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]

            });

        });

    </script>
@endpush
@push('headcss')
<style>
    .dataTables_filter input{
        background-color:black !important;
    }
</style>
@endpush
