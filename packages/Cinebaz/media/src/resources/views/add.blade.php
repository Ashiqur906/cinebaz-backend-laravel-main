@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <!-- Main content -->
    @if (Session::has('myexcep'))
        @dump(Session::get('myexcep'));
    @endif

    @php
    $files = false;

    @endphp
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    {{ Form::open(['method' => 'POST', 'route' => 'admin.media.store']) }}
                    {{ Form::hidden('id', !empty($fdata->id) ? $fdata->id : null) }}
                    <div class="row">
                        <div class="col-md-9">
                            <div class="iq-card">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        {{ __('test.Media Information') }}
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        @foreach (config('cz_media.lang') as $key => $list)
                                            <li class="nav-item">
                                                <a class="nav-link {{ $key == 'en' ? 'active' : null }}"
                                                    data-toggle="pill" href="{{ '#pills-media-' . $key }}" role="tab"
                                                    aria-controls="{{ 'pills-media-' . $key }}">
                                                    {{ $list }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent-2">
                                        @foreach (config('cz_media.lang') as $key => $list)
                                            <div class="tab-pane fade {{ $key == 'en' ? 'show active' : null }}"
                                                id="{{ 'pills-media-' . $key }}" role="tabpanel"
                                                aria-labelledby="{{ 'pills-media-tab' . $key }}">
                                                @include('media::part.form', ['fdata' => ($fdata)?$fdata:null, 'lang' =>
                                                $key])
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="tab-content" id="pills-tabContent-3">
                                        <div class="row">
                                            <div class="col-lg-12">

                                                {{ Form::label('Video Nature') }}
                                                {{ Form::select(
    'video_nature',
    [
        '' => 'Select Video Nature',
        '1' => 'Movie',
        '2' => 'TV Show',
    ],
    $fdata && $fdata->video_nature_id ? $fdata->video_nature_id : null,
    ['class' => 'form-control', 'placeholder' => 'Please select ...', 'id' => 'video_nature'],
) }}

                                            </div>

                                        </div>
                                        <div class="row" id="series">
                                            <div class="col-lg-6">
                                                <lebel>Series</lebel>
                                                <select class="form-control" name="series_id" id="series_id">

                                                    @isset($fdata)
                                                        @if ($fdata::getSeries($fdata->series_id)))
                                                            <option value="{{ $fdata->series_id }}">
                                                                {{ $fdata::getSeries($fdata->series_id)->title_en }}</option>
                                                        @endif
                                                    @endisset
                                                    <option value="">Select Series</option>
                                                    @foreach ($getSeries as $series)
                                                        <option value="{{ $series->id }}">{{ $series->title_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <lebel>Session</lebel>
                                                <select class="form-control" name="session_id" id="session_id">
                                                    @isset($fdata)
                                                        @if ($fdata::getSession($fdata->session_id))
                                                            <option value="{{ $fdata->session_id }}">
                                                                {{ $fdata::getSession($fdata->session_id)->title_en }}
                                                            </option>
                                                        @endif
                                                    @endisset
                                                    <option value="">Select Session</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    {{ Form::label('similar', 'Similar Videos') }}
                                                    {{ Form::select('media_id[]', getMovieArr(), $fdata && $fdata->id ? $fdata->similars->pluck('similar_id')->toArray() : null, ['class' => $errors->has('similar_videos') ? 'form-control myselect2  is-invalid' : 'form-control myselect2', 'multiple' => 'multiple']) }}
                                                    @error('similar')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="iq-card-footer text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">{{ __('Submit') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            @include('media::part.links', ['sdata' => ($fdata && $fdata->seo)?$fdata->seo:null])
                            <br>
                            @include('seo::wedget', ['sdata' => ($fdata && $fdata->seo)?$fdata->seo:null])
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
            $('.datepicker').flatpickr({
                enableTime: true,
            });

            $(document).on("change", '#title_en', function(e) {
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
    <script>
        if ($('#video_nature').find(' :selected').val() == '2') {
            $('#series').show();
        } else {
            $('#series').hide();
        }

        $('#video_nature').change(function() {
            var nature_id = $('#video_nature').find(' :selected').val();
            if (nature_id == 2) {
                $('#series').show();
            }
        });
        $('#series_id').change(function() {
            var series_id = $('#series_id').find(' :selected').val();

            $.ajax({
                url: "{{ url('admin/series/get_session') }}" + '/' + series_id,
                method: "get",
                success: function(result) {

                    if (result) {
                        $('#session_id')
                            .find('option')
                            .remove()
                            .end()
                            .append('<option value="">Select Session</option>');
                        for (var i = 0; i < result.length; i++) {
                            $('#session_id').append(new Option(result[i].title_en, result[i].id));
                        }

                    }
                }
            });
        });
    </script>

@endpush
@push('headcss')
    <style>
        .select2-container--default .select2-selection--multiple {
            background-color: #444444;
            border: 1px solid #121b26;
        }

        .select2-container {
            display: block;
            max-width: 100%;
        }

    </style>
@endpush
