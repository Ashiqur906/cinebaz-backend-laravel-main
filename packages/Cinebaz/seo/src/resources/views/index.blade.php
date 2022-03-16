@extends('layouts.app')
@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">




                    <div class="iq-card">

                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">SEO Lists</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <a href="{{ route('admin.seo.add') }}" class="btn btn-primary">Add SEO</a>
                            </div>
                        </div>

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
