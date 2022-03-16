@extends('layouts.app')
@section('title', ' প্রজেক্ট প্রতিষ্ঠান')
@section('sub_title', ' ')
@section('content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        @if (Session::has('myexcep'))
         @dump(Session::get('myexcep'));
        @endif
      </div>
      <div class="col-sm-12">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title_modal">Add Slider Group</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    {{ Form::open(['method' => 'POST', 'route' => 'admin.slider.save']) }}
                    <div class="row">
                        <div class="iq-card">
                            <div class="form-group">
                                    {{ Form::hidden('id', !empty($fdata->id) ? $fdata->id : null, []) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Name', 'Title') }}
                                {{ Form::text('title', !empty($fdata->title) ? $fdata->title : null, ['id' => 'title', 'class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Slider Group Name ']) }}
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {{ Form::label('slug', 'Slug') }}
                                {{ Form::text('slug', !empty($fdata->slug) ? $fdata->slug : null, ['id' => 'slug', 'class' => $errors->has('slug') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Slug']) }}
                                @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {{ Form::label('status', 'Status') }}<br>
                                <div
                                    class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success custom-switch-color custom-control-inline">
                                    {{ Form::checkbox('is_active', 'Yes', !empty($fdata->is_active) && $fdata->is_active == 'Yes' ? true : false, ['class' => 'custom-control-input bg-success', 'id' => 'is_active']) }}
                                    <label class="custom-control-label" for="is_active"> Is Active ?</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="iq-card text-center mb-1 mt-1">
                        <button type="submit" class="btn btn-primary btn-lg">{{ __('Submit') }}</button>
                    </div>
                    {{ Form::close() }}
                    <!-- /.row -->
                </div>

            </div>
        </div>
        {{--  --}}

      </div>
    </div>
  </div>
</div>
</div>
<!-- Wrapper END -->
@endsection
@push('scripts')
<script>
    $(document).ready(function() {

        $(document).on("change", '#title', function(e) {
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
@endpush
