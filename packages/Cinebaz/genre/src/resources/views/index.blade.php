@extends('layouts.app')

@section('content')

    <!-- Main content -->

    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.genre.add') }}" class="btn btn-sm btn-success">
                                <i class="las la-plus-circle"></i> Genre
                            </a>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered" id="genre_table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th style="width: 185px; text-align:center">Actions</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
   @include('layouts.essential.datatable')


    <script>
        $(document).ready(function() {
            $('#genre_table').DataTable({
                processing: true,
                serverSide: true,
                dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-4'B><'col-sm-12 col-md-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ],
                ajax: {
                    url: "{{ route('admin.genre.all') }}",
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
