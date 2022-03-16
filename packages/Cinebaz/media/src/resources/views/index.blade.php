@extends('layouts.app')

@section('content')

<!-- Main content -->

<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a  class="btn btn-sm btn-success" data-toggle="modal" data-target="#title_modal">
                            <i class="las la-plus-circle"></i> Media
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        {!! $dataTable->table([], false) !!}


                    </div>
                </div>
                <!-- /.card -->

                <!-- Modal -->
                <div class="modal fade" id="title_modal" tabindex="-1" role="dialog" aria-labelledby="title_modal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title_modal">Add Media Title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-12">
                                    {{ Form::open(['method' => 'POST', 'route' => 'admin.media.title.store']) }}
                                    <div class="row">
                                        <div class="iq-card">
                                            <div class="form-group">
                                                {{ Form::label('Title', 'Title') }}
                                                {{ Form::text('title', !empty($fdata->title) ? $fdata->title : null, ['id' => 'title', 'class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Title']) }}
                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('slug', 'Slug') }}
                                                {{ Form::text('slug', !empty($fdata->slug) ? $fdata->slug : null, ['id' => 'slug', 'class' => $errors->has('slug') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Slug']) }}
                                                @error('slug')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="iq-card text-center mb-1 mt-1">
                                        <button type="submit" class="btn btn-primary btn-lg">{{ __('Submit') }}</button>
                                    </div>
                                    {{ Form::close() }}
                                    <!-- /.row -->
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->

            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {

        $(document).on("change", '#title', function(e) {
            let slug = $(this).val();
            let route = "{{ route('getslug') }}";
            let table = 'pages';
            let column = 'slug';
            let id = "{{ !empty($fdata->id) ? $fdata->id : null }}";

            $.ajax({
                type: 'GET',
                url: route,
                data: {
                    slug: slug,
                    id: id,
                    table: table,
                    column: column
                },
                success: function(data) {

                    $('#slug').val(data.slug);
                }
            });


        });
    });

</script>
@include('layouts.essential.datatable')

{!! $dataTable->scripts() !!}


@endpush
