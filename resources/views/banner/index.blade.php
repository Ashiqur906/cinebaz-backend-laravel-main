@extends('layouts.app')

@section('content')

  <div id="content-page" class="content-page">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              Banner List
            </div>
            <div class="card-body">
              <table class="table table-responsive table-bordered">
                <thead>
                  <tr>
                    <th>SL No</th>
                    <th>Heading</th>
                    <th>Title</th>
                    <th>Age Limit</th>
                    <th>Duration</th>
                    <th>Image</th>
                    <th>Play Button</th>
                    <th>Button Url</th>
                    <th>More Button</th>
                    <th>Button Url</th>
                    <th>Trailer Button</th>
                    <th>Button Url</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($banners as $banner)
                  <tr class="{{ $banner->read_status == 2 ? "bg-danger" : "" }}">
                      <td>{{ $loop->index +1 }}</td>
                      <td>{{ $banner->banner_title }}</td>
                      <td style="font-size:5px;">{{ $banner->banner_description }}</td>
                      <td>{{ $banner->age_limit }}</td>
                      <td>{{ $banner->duration }}</td>
                      <td>
                        <img width="100px" src="{!! asset('uploads/banner_image') !!}/{{ $banner->banner_image }}" alt="">
                      </td>
                      <td>{{ $banner->play_button_text }}</td>
                      <td>{{ $banner->play_button_url }}</td>
                      <td>{{ $banner->details_button_text }}</td>
                      <td>{{ $banner->details_button_url }}</td>
                      <td>{{ $banner->trailler_button_text }}</td>
                      <td>{{ $banner->trailler_button_url }}</td>
                      <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                          <a href="{{ url('banner/edit') }}/{{ $banner->id }}" type="button" class="btn btn-danger"><i class="las la-edit"></i></a>
                          @if ($banner->read_status == 1)
                            <a href="{{ url('banner/active') }}/{{ $banner->id }}" type="button" class="btn btn-warning"><i class="las la-eye"></i></a>
                          @else
                              <a href="{{ url('banner/deactive') }}/{{ $banner->id }}" type="button" class="btn btn-warning"><i class="las la-eye-slash"></i></a>
                          @endif
                          <button value="{{ url('banner/trashed') }}/{{ $banner->id }}" type="button" class="btn btn-success delete_btn"><i class="las la-trash"></i></button>
                        </div>

                      </td>
                  </tr>
                @empty
                @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>



        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              Home Banner Insert
            </div>
            <div class="card-body">
              <form action="{!! route('homebannersliderform') !!}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label>Title</label>
                  <input type="text" class="form-control" name="banner_title" value="{{ old('banner_title') }}">
                  @error('banner_title')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label>Description</label>
                  <input type="text" class="form-control" name="banner_description" value="{{ old('banner_description') }}">
                  @error('banner_description')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label>Age Limit</label>
                  <input type="number" class="form-control" name="age_limit" value="{{ old('age_limit') }}">
                  @error('age_limit')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label>Duration</label>
                  <input type="text" class="form-control" name="duration" value="{{ old('duration') }}">
                  @error('duration')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label>Play Now Banner Button</label>
                  <input type="text" class="form-control" name="play_button_text" value="{{ old('play_button_text') }}">
                  @error('play_button_text')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label>Play Now Banner Button URL</label>
                  <input type="text" class="form-control" name="play_button_url" value="{{ old('play_button_url') }}">
                  @error('play_button_url')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label>More Details Banner Button</label>
                  <input type="text" class="form-control" name="details_button_text" value="{{ old('details_button_text') }}">
                  @error('details_button_text')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label>More Details Banner Button URL</label>
                  <input type="text" class="form-control" name="details_button_url" value="{{ old('details_button_url') }}">
                  @error('details_button_url')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label>Trailler Banner Button</label>
                  <input type="text" class="form-control" name="trailler_button_text" value="{{ old('trailler_button_text') }}">
                  @error('trailler_button_text')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label>Trailler Banner Button URL</label>
                  <input type="text" class="form-control" name="trailler_button_url" value="{{ old('trailler_button_url') }}">
                  @error('trailler_button_url')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label>Images</label>
                  <input type="file" class="form-control" name="banner_image">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
{{-- status popup message --}}
@section('script_content')
  @if (Session::has('status'))
    <script type="text/javascript">
    Swal.fire(
      'Good job!',
      'Banner Inserted Successfully!',
      'success'
      )
    </script>
  @endif
  {{-- update status popup message --}}
  @if (Session::has('updatestatus'))
    <script type="text/javascript">
    Swal.fire(
      'Good job!',
      'Banner Edited Successfully!',
      'success'
      )
    </script>
  @endif
  {{-- deactive status popup message --}}
  @if (Session::has('deactivestatus'))
    <script type="text/javascript">
    Swal.fire(
      'Good job!',
      'Deactive Successfully!',
      'success'
      )
    </script>
  @endif
  {{-- ctive status popup message --}}
  @if (Session::has('activestatus'))
    <script type="text/javascript">
    Swal.fire(
      'Good job!',
      'Active Successfully!',
      'success'
      )
    </script>
  @endif
  <script type="text/javascript">
  $(document).ready(function() {
  // $('#product_table').DataTable();
  // delete btn
  $('.delete_btn').click(function(){
     var link_to_go = $(this).val();

             Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
            window.location.href = link_to_go;
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            );
        }
      });
   });
});
  </script>
@endsection
