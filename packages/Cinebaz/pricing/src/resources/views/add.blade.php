@extends('layouts.app')

@section('content')


    <!-- Main content -->

    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    {{ Form::open(['method' => 'POST', 'route' => 'admin.subscription.add_sub_save']) }}
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card card-primary">
                                <div class="card-header">
                                    Subscription Head
                                </div>
                                <!-- @dump($fdata) -->
                                <!-- /.card-header -->
                                <!-- form start -->

                                {{ Form::hidden('id', !empty($fdata->id) ? $fdata->id : null) }}

                                <div class="card-body">
                                    <div class="form-group">
                                        {{ Form::label('title', 'Subscription Head Title') }}
                                        {{ Form::text('title', !empty($fdata->title) ? $fdata->title : null, ['id' => 'title', 'class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Subscription Head Title']) }}
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('price', 'Subscription Price') }}
                                        {{ Form::text('price', !empty($fdata->price) ? $fdata->price : null, ['id' => 'price', 'class' => $errors->has('price') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Subscription Price']) }}
                                        @error('title_en')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('duration', 'Duration') }}
                                        {{ Form::select('duration', [
                                            '' => 'Select Duration', 
                                            'Monthly' => 'Monthly', 
                                            'Yearly' => 'Yearly'
                                            ], null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) 
                                        }}
                                    </div>
                                    <div class="form-group">
                                        <div
                                            class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            {{ Form::checkbox('is_active', 'Yes', false, ['class' => 'custom-control-input', 'id' => 'is_active', 'checked' => !empty($fdata->is_active) && $fdata->is_active == 'Yes' ? true : false]) }}
                                            <label class="custom-control-label" for="is_active"> Is Active ?</label>
                                        </div>
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
