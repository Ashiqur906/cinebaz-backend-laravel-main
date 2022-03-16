@extends('layouts.app')

@section('content')
    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">


                                Slider Details  <small><i class="fa fa-long-arrow-right"></i> {{$mdata->title}}</small>

                            </h4>
                            </div>
                            <div>


                                <a class="btn btn-success btn-sm" href="{{ route('admin.slider.details.add', $mdata->id) }}" class="iq-waves-effect">
                                    <i class="fa fa-plus-circle"></i><span>Add</span>
                                </a>
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.slider.index') }}" class="iq-waves-effect">
                                    <i class="fa fa-long-arrow-left"></i><span>Back</span>
                                </a>
                            </div>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('deletestatus'))
                            <div class="alert alert-danger">
                                {{ session('deletestatus') }}
                            </div>
                        @endif
                        <div class="iq-card-body">
                            <div class="table-view">
                            {!! $dataTable->table([], false) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Wrapper END -->
@endsection


@push('scripts')
@include('layouts.essential.datatable')

{!! $dataTable->scripts() !!}


@endpush

