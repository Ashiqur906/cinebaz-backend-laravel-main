@extends('layouts.app')

@section('content')


    <!-- Main content -->

    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    {{ Form::open(['method' => 'POST', 'route' => 'admin.videoquality.save']) }}
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card card-primary">
                                <div class="card-header">
                                    Video Quality
                                </div>
                                <!-- @dump($fdata) -->
                                <!-- /.card-header -->
                                <!-- form start -->

                                {{ Form::hidden('id', !empty($fdata->id) ? $fdata->id : null) }}

                                <div class="card-body">
                                    <div class="form-group">
                                        {{ Form::label('lbl_title', 'Video Quality Title') }}
                                        {{ Form::text('title_en', !empty($fdata->title_en) ? $fdata->title_en : null, ['id' => 'title', 'class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Video Quality Title']) }}
                                        @error('title_en')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('lbl_quality', 'Video Quality') }}
                                        {{ Form::text('quality', !empty($fdata->quality) ? $fdata->quality : null, ['id' => 'quality', 'class' => $errors->has('quality') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Video Quality']) }}
                                        @error('quality')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('lbl_fullname', 'Full Name') }}
                                        {{ Form::text('fullname', !empty($fdata->fullname) ? $fdata->fullname : null, ['id' => 'fullname', 'class' => $errors->has('fullname') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Full Name']) }}
                                        @error('fullname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('lbl_shortname', 'Short Name') }}
                                        {{ Form::text('shortname', !empty($fdata->shortname) ? $fdata->shortname : null, ['id' => 'shortname', 'class' => $errors->has('shortname') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Short Name']) }}
                                        @error('shortname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('lbl_remarks', 'Remarks') }}
                                        {{ Form::text('remarks', !empty($fdata->remarks) ? $fdata->remarks : null, ['id' => 'remarks', 'class' => $errors->has('remarks') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Remarks']) }}
                                        @error('remarks')
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

                        {{-- <div class="col-md-3">
                            @include('seo::wedget', ['sdata' => ($fdata && $fdata->seo)?$fdata->seo:null])
                        </div> --}}

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
        $('.myselect2').select2();
    });

</script>


@endpush
