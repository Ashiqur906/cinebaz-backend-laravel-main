@extends('layouts.app')

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    {{ Form::open(['method' => 'POST', 'route' => 'admin.subscription.add_panel_save']) }}
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card card-primary">
                                <div class="card-header">
                                    Panel Head
                                </div>
                                <!-- @dump($fdata) -->
                                <!-- /.card-header -->
                                <!-- form start -->

                                {{ Form::hidden('id', !empty($fdata->id) ? $fdata->id : null) }}

                                <div class="card-body">
                                    <div class="form-group">
                                        {{ Form::label('title', 'Panel Head Title') }}
                                        {{ Form::text('title', !empty($fdata->title) ? $fdata->title : null, ['id' => 'title', 'class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Panel Head Title']) }}
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('type', 'Plan type') }}
                                        {{ Form::select('plan_type', [
                                            '' => 'Select Play Type', 
                                            'Normal' => 'Normal', 
                                            'Video' => 'Video'
                                            ], null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) 
                                        }}
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
