<div class="card card-warning">
    <div class="card-header">
        Important info
    </div>
    {{-- @dump($sdata) --}}
    <!-- /.card-header -->
    <!-- form start -->

    <div class="card-body">
        <div class="form-group">
            {{ Form::label('category', 'Categories') }}
            {{ Form::select('category[]', getCategoryArr(), $fdata && $fdata->categories ? $fdata->categories->pluck('id')->toArray() : null, ['class' => $errors->has('categories') ? 'form-control myselect2  is-invalid' : 'form-control myselect2', 'multiple' => 'multiple']) }}
            @error('category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::label('tag', 'Tags') }}
            {{ Form::select('tag[]', getTagArr(), $fdata && $fdata->tags ? $fdata->tags->pluck('id')->toArray() : null, ['class' => $errors->has('tags') ? 'form-control myselect2  is-invalid' : 'form-control myselect2', 'multiple' => 'multiple']) }}
            @error('tag')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::label('genres', 'Genres') }}
            {{ Form::select('genre[]', getGenreArr(), $fdata && $fdata->genres ? $fdata->genres->pluck('id')->toArray() : null, ['class' => $errors->has('genre') ? 'form-control myselect2  is-invalid' : 'form-control myselect2', 'multiple' => 'multiple']) }}
            @error('genre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">

            {{ Form::label('Media Artist') }}
                {{ Form::select('artists[]',getArtistArr(), isset($fdata->artists) ? $fdata->artists->pluck('id')->toArray() : null, array('class' => $errors->has('artists') ? 'form-control myselect2  is-invalid' : 'form-control myselect2', 'multiple' => 'multiple')) 
            }}
            @error('artists')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
    <!-- /.card-body -->
</div>

<br>

<div class="card card-warning">
    <div class="card-header">
        Thumbnil (Portrait)  <small>size 1020x1560</small>
    </div>

    <div class="card-body">
        @include('media::part.dropzone', ['fdata' =>$fdata,'name' => 'featured', 'size' => 'Portrait', 'type' => 1])

    </div>
    <!-- /.card-body -->
</div>

<div class="card card-warning">
    <div class="card-header">
        Thumbnil (Landscape) <small>size 1672X940</small>
    </div>
    {{-- @dump($sdata) --}}
    <!-- /.card-header -->
    <!-- form start -->

    <div class="card-body">
        @include('media::part.dropzone', ['fdata' =>$fdata,'name' => 'featuredL', 'size' => 'Landscape', 'type' => 2])
    </div>
    <!-- /.card-body -->
</div>

<div class="card card-warning">
    <div class="card-header">
        Movie Logo <small></small>
    </div>
    {{-- @dump($sdata) --}}
    <!-- /.card-header -->
    <!-- form start -->

    <div class="card-body">
        @include('media::part.dropzone', ['fdata' =>$fdata,'name' => 'logo', 'size' => 'square', 'type' => 3])
    </div>
    <!-- /.card-body -->
</div>

<div class="card card-warning">
    <div class="card-header">
        Sensor Certificate (Landscape) <small>size 1672X940</small>
    </div>
    {{-- @dump($sdata) --}}
    <!-- /.card-header -->
    <!-- form start -->

    <div class="card-body">
        @include('media::part.dropzone', ['fdata' =>$fdata,'name' => 'certificate', 'size' => 'Landscape', 'type' => 4])
    </div>
    <!-- /.card-body -->
</div>


@push('scripts')

    <script>
        $(document).ready(function() {
            $('.myselect2').select2();
        });

    </script>


@endpush
