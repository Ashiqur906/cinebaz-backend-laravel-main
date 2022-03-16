@extends('layouts.app')

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    {{ Form::open(['method' => 'POST', 'route' => 'admin.subscription.assign_save']) }}
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card card-primary">
                                <div class="card-header">
                                    Panel Head
                                </div>
                                <!-- @dump($fdata) -->
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="form-group">
                                        {{ Form::label('sub_head_id', 'Subscription Head') }}
                                        {{ Form::select('sub_head_id', allSubHead(), null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) 
                                        }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('type', 'Plan Head') }}
                                        {{ Form::select('plan_head_id', allPlanHead(), null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) 
                                        }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('type', 'Video Quality') }}
                                        {{ Form::select('quality_id', allVideoQuality(), null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) 
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
