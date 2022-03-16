@extends('layouts.app')

@section('content')

    <!-- Main content -->
    @if (Session::has('myexcep'))
        @dump(Session::get('myexcep'));
    @endif

    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">


                    {{ Form::open(['method' => 'POST', 'route' => 'admin.seo.store']) }}
                    <div class="row">


                        <div class="col-md-9">

                            <div class="card card-warning">
                                <div class="card-header">
                                    SEO Information
                                </div>
                                {{-- @dump($fdata) --}}
                                <!-- /.card-header -->
                                <!-- form start -->

                                <div class="card-body">
                                    {{ Form::hidden('id', !empty($fdata->id) ? $fdata->id : null) }}
                                    <div class="form-group">
                                        {{ Form::label('title', 'Title') }}
                                        {{ Form::text('title', !empty($fdata->title) ? $fdata->title : null, ['class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Title']) }}
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('meta_title', 'Meta Title') }}
                                        {{ Form::text('meta_title', !empty($fdata->meta_title) ? $fdata->meta_title : null, ['class' => $errors->has('meta_title') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'meta title']) }}
                                        @error('meta_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        {{ Form::label('meta_description', 'Meta Description') }}
                                        {{ Form::text('meta_description', !empty($fdata->meta_description) ? $fdata->meta_description : null, ['class' => $errors->has('meta_description') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'meta Description']) }}
                                        @error('meta_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('meta_keywords', 'Meta Keywords') }}
                                        {{ Form::text('meta_keywords', !empty($fdata->meta_keywords) ? $fdata->meta_keywords : null, ['class' => $errors->has('meta_keywords') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'meta Keywords']) }}
                                        @error('meta_keywords')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('canonical_tag', 'Canonical URL') }}
                                        {{ Form::text('canonical_tag', !empty($fdata->canonical_tag) ? $fdata->canonical_tag : null, ['class' => $errors->has('canonical_tag') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Canonical url']) }}
                                        @error('canonical_tag')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('meta_type', 'Meta Type') }}
                                        {{ Form::text('meta_type', !empty($fdata->meta_type) ? $fdata->meta_type : null, ['class' => $errors->has('meta_type') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Meta Type']) }}
                                        @error('meta_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>


                                    <div class="form-group">
                                        {{ Form::label('meta_image', 'Meta Image link') }}
                                        {{ Form::text('meta_image', !empty($fdata->meta_image) ? $fdata->meta_image : null, ['class' => $errors->has('meta_image') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Meta Image link']) }}
                                        @error('meta_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>




                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </div>


                            </div>
                        </div>

                    </div>
                    {{ Form::close() }}
                    <!-- /.row -->

                </div>
            </div>
            <br>
        </div>
    </div>

@endsection


@push('scripts')



    <script>
        $(document).ready(function() {
            $(document).on("change", '#title_en', function(e) {
                let slug = $(this).val();
                let route = "{{ route('getslug') }}";
                let table = 'genres';
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


@endpush
