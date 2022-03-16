@extends('layouts.app')
@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">

                            Member Lists
                        </div>

                        <div class="card-body">
                            {{ Form::open(['method' => 'GET', 'route' => 'admin.member.index']) }}
                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text">From</span>
                                        <input type="text" class="form-control date-input basicFlatpickr flatpickr-input"
                                            name="from_date"
                                            value="{{ Request::get('from_date') ? Request::get('from_date') : null }}">
                                        <span class="input-group-text">To</span>
                                        <input type="text" class="form-control date-input basicFlatpickr flatpickr-input"
                                            name="to_date"
                                            value="{{ Request::get('to_date') ? Request::get('to_date') : null }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </div>
                            {{ Form::close() }}
                        </div>
                        <!-- /.card-body -->


                    </div>


                    <div class="iq-card">

                        <div class="iq-card-body">
                            {!! $dataTable->table([], false) !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
   @include('layouts.essential.datatable')



    {!! $dataTable->scripts() !!}


@endpush
