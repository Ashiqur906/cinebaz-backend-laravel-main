@extends('layouts.app')

@section('content')

    <!-- Main content -->

    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    {!! Menu::render() !!}



                </div>
            </div>
        </div>
    </div>



    <!-- /.content -->



@endsection





@push('scripts')
    {!! Menu::scripts() !!}

@endpush
