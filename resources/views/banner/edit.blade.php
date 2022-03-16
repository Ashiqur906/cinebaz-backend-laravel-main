@extends('layouts.app')
@section('content')
  <div id="content-page" class="content-page">
    <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            Banner Edit
          </div>
          <div class="card-body">
            <form action="{!! route('bannerupdate') !!}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label>Banner Title</label>
                  <input type="hidden" class="form-control" name="banner_id" value="{{ $banner_edit->id }}">
                  <input type="text" class="form-control" name="banner_title" value="{{ $banner_edit->banner_title }}">
                  @error('banner_title')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <input type="text" class="form-control" name="banner_description" value="{{ $banner_edit->banner_description }}">
                  @error('banner_description')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Age Limit</label>
                  <input type="number" class="form-control" name="age_limit" value="{{ $banner_edit->age_limit }}">
                  @error('age_limit')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Time Duration</label>
                  <input type="text" class="form-control" name="duration" value="{{ $banner_edit->duration }}">
                  @error('duration')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Play Button</label>
                  <input type="text" class="form-control" name="play_button_text" value="{{ $banner_edit->play_button_text }}">
                  @error('play_button_text')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Button URL</label>
                  <input type="text" class="form-control" name="play_button_url" value="{{ $banner_edit->play_button_url }}">
                  @error('play_button_url')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Details Button</label>
                  <input type="text" class="form-control" name="details_button_text" value="{{ $banner_edit->details_button_text }}">
                  @error('details_button_text')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Button URL</label>
                  <input type="text" class="form-control" name="details_button_url" value="{{ $banner_edit->details_button_url }}">
                  @error('details_button_url')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Trailer Button</label>
                  <input type="text" class="form-control" name="trailler_button_text" value="{{ $banner_edit->trailler_button_text }}">
                  @error('trailler_button_text')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Button URL</label>
                  <input type="text" class="form-control" name="trailler_button_url" value="{{ $banner_edit->trailler_button_url }}">
                  @error('trailler_button_url')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Banner Image</label>
                  <input type="file" class="form-control" name="banner_image_new">
                </div>
                <div class="form-group">
                  <img width="150px" src="{!! asset('uploads/banner_image') !!}/{{ $banner_edit->banner_image }}" alt="">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
