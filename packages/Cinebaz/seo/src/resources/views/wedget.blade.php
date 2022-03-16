<div class="card card-warning">
    <div class="card-header">
        SEO Information
    </div>
    {{-- @dump($sdata) --}}
    <!-- /.card-header -->
    <!-- form start -->

    <div class="card-body">
        {{ Form::hidden('seo_id', !empty($sdata->id) ? $sdata->id : null) }}
        <div class="form-group">
            {{ Form::label('meta_title', 'Meta Title') }}
            {{ Form::text('meta_title', !empty($sdata->meta_title) ? $sdata->meta_title : null, ['class' => $errors->has('meta_title') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'meta title']) }}
            @error('meta_title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="form-group">
            {{ Form::label('meta_description', 'Meta Description') }}
            {{ Form::text('meta_description', !empty($sdata->meta_description) ? $sdata->meta_description : null, ['class' => $errors->has('meta_description') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'meta Description']) }}
            @error('meta_description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            {{ Form::label('meta_keywords', 'Meta Keywords') }}
            {{ Form::text('meta_keywords', !empty($sdata->meta_keywords) ? $sdata->meta_keywords : null, ['class' => $errors->has('meta_keywords') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'meta Keywords']) }}
            @error('meta_keywords')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="form-group">
            {{ Form::label('canonical_tag', 'Canonical URL') }}
            {{ Form::text('canonical_tag', !empty($sdata->canonical_tag) ? $sdata->canonical_tag : null, ['class' => $errors->has('canonical_tag') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Canonical url']) }}
            @error('canonical_tag')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="form-group">
            {{ Form::label('meta_type', 'Meta Type') }}
            {{ Form::text('meta_type', !empty($sdata->meta_type) ? $sdata->meta_type : null, ['class' => $errors->has('meta_type') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Meta Type']) }}
            @error('meta_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>


        <div class="form-group">
            {{ Form::label('meta_image', 'Meta Image link') }}
            {{ Form::text('meta_image', !empty($sdata->meta_image) ? $sdata->meta_image : null, ['class' => $errors->has('meta_image') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Meta Image link']) }}
            @error('meta_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>




    </div>
    <!-- /.card-body -->



</div>
