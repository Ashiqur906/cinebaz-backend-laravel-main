@extends('layouts.app')

@section('content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
   @if (Session::has('myexcep'))
        @dump(Session::get('myexcep'));
    @endif
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Add Banner</h4>
                   </div>

                   <!-- Button trigger modal -->
                   <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

                  </div>





                </div>
                <div class="iq-card-body">

                  @if (session('status'))
                     <div class="alert alert-success">
                        {{ session('status') }}
                     </div>
                  @endif
                  {{ Form::open(['method' => 'POST', 'route' => 'admin.slider.details.save', 'enctype'=>'multipart/form-data']) }}
                  {{ Form::hidden('id', !empty($fdata->id) ? $fdata->id : null) }}
                  {{ Form::hidden('slider_id', $mdata->id) }}
                      <div class="row">


                         <div class="col-lg-8">

                            <div class="form-group">
                                {{ Form::label('slider_id', 'Slider') }}
                                {{ Form::text(null,  $mdata->title, [ 'class' => $errors->has('slider_id') ? 'form-control is-invalid' : 'form-control', 'readonly' => true]) }}
                                @error('slider_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                {{ Form::label('media_id', 'Media') }}
                                {{ Form::select('media_id', getMeidaArr(),  !empty($fdata->media_id) ? $fdata->media_id : null, ['placeholder' => '--Select--','class' => $errors->has('media_id') ? 'form-control  is-invalid' : 'form-control ']) }}
                                @error('media_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                              <div class="form-group">
                                 {{ Form::label('title', 'Title') }}
                                 {{ Form::text('title', !empty($fdata->title) ? $fdata->title : null, ['id' => 'title', 'class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Title EN']) }}
                                 @error('title')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>

                              <div class="form-group">
                                 {{ Form::label('description', 'Description') }}
                                 {{ Form::textarea('description', !empty($fdata->description) ? $fdata->description : null, ['class' => $errors->has('description') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Description EN']) }}
                                 @error('description')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>
                         <div class="col-lg-4">
                            <div class="form-group">
                                {{ Form::label('status', 'Status') }}<br>
                                <div
                                    class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success custom-switch-color custom-control-inline">
                                    {{ Form::checkbox('is_active', 'Yes', !empty($fdata->is_active) && $fdata->is_active == 'Yes' ? true : false, ['class' => 'custom-control-input bg-success', 'id' => 'is_active']) }}
                                    <label class="custom-control-label" for="is_active"> Is Active ?</label>
                                </div>
                            </div>

                           {{-- thum --}}
                           <div class="card card-warning">
                              <div class="card-header">
                                  Thumbnil Image
                              </div>
                              {{-- @dump($sdata) --}}
                              <!-- /.card-header -->
                              <!-- form start -->



                              <div class="card-body">
                                  @isset($fdata->getImage->small)
                                  <img src="{{ asset('storage/'.$fdata->getImage->small) }}">
                                  @endisset

                                <div class="col-12 form_gallery form-group image-upload">
                                    <label id="gallery2" for="form_gallery-upload">Upload Image</label>
                                    {{-- <input name="image" data-name="#gallery2" id="form_gallery-upload" class="form_gallery-upload"
                                    type="file" accept=".png, .jpg, .jpeg" value="{{ old('image') }}"> --}}
                                    {{-- <input name="image" data-name="#gallery2" id="form_gallery-upload" class="form_gallery-upload"
                                    type="file" accept=".png, .jpg, .jpeg" value="{{ old('image') }}" oninput="pic.src=window.URL.createObjectURL(this.files[0])"> --}}
                                    {{-- <img id="pic" /> --}}
                                    {{--  --}}
                                    <div class="card-body">
                                        <div id="load_featured">
                                            <img id="pic" class="img-fluid" style="width: 100px;"/>
                                        </div>

                                        <div id="up_featured">
                                            <input name="image" data-name="#gallery2" id="form_gallery-upload" class="form_gallery-upload"
                                    type="file" accept=".png, .jpg, .jpeg" value="{{ old('image') }}" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                        </div>

                                    </div>
                                    {{--  --}}
                                  </div>

                              </div>
                              <!-- /.card-body -->
                          </div>
                           {{-- thumend  --}}


                           <div class="col-sm-12 form-group">
                              {{ Form::label('button', 'Button Name') }}
                              {{ Form::text('button', !empty($fdata->button) ? $fdata->button : null, ['class' => $errors->has('button') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Details Button URL']) }}
                              @error('button')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                           </div>

                           <div class="col-sm-12 form-group">
                              {{ Form::label('button_link', 'Link') }}
                              {{ Form::text('button_link', !empty($fdata->button_link) ? $fdata->button_link : null, ['class' => $errors->has('button_link') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Trailler Button URL']) }}
                              @error('button_link')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                           </div>


                         </div>
                      </div>
                      <div class="row">
                        <div class="col-12 form-group ">
                           <button type="submit" class="btn btn-primary float-right">{{ __('Submit') }}</button>
                        </div>
                      </div>

                   {{ Form::close() }}
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
</div>

<!-- Wrapper END -->
@endsection


@section('cusjs')
<style>

</style>


<script>

</script>


@endsection
@push('scripts')



    <script type="text/javascript">
        Dropzone.autoDiscover = false;






    </script>


@endpush
