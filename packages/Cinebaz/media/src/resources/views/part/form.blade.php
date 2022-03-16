<div class="form-group">
    @php
        $title = 'title_' . $lang;
        $short_description = 'short_description_' . $lang;
        $description = 'description_' . $lang;
    @endphp
    {{ Form::label('title_' . $lang, 'Title ') }}
    {{ Form::text('title_' . $lang, !empty($fdata->$title) ? $fdata->$title : null, ['id' => 'title_' . $lang, 'class' => $errors->has('title_' . $lang) ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Title ']) }}
    @error('title_' . $lang)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>
<div class="form-group">

    {{ Form::label($short_description, 'Short Description') }}
    {{ Form::text($short_description, !empty($fdata->$short_description) ? $fdata->$short_description : null, ['class' => $errors->has('short_description_' . $lang) ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Short description']) }}
    @error('short_description_' . $lang)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>
@if ($lang == 'en')
    <div class="form-group">
        {{ Form::label('slug', 'Slug') }}
        {{ Form::text('slug', !empty($fdata->slug) ? $fdata->slug : null, ['id' => 'slug', 'class' => $errors->has('slug') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Slug']) }}
        @error('slug')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    </div>
@endif
@if ($lang == 'en')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('regular_price', 'Regular Price') }}
                {{ Form::number('regular_price', !empty($fdata->regular_price) ? $fdata->regular_price : null, ['class' => $errors->has('regular_price') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Regular Price']) }}
                @error('regular_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('discumt_price', 'Discount Price') }}
                {{ Form::number('discount_price', !empty($fdata->discount_price) ? $fdata->discount_price : null, ['class' => $errors->has('discount_price') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Discount Price']) }}
                @error('discount_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
@endif
<div class="form-group">
    {{ Form::label('description_' . $lang, 'Description') }}
    {{ Form::textarea('description_' . $lang, !empty($fdata->$description) ? $fdata->$description : null, ['rows' => 3, 'placeholder' => 'Description..', 'class' => 'htmltexteditor form-control ' . ($errors->has('description_' . $lang) ? ' is-invalid' : '')]) }}
    @error('description_' . $lang)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>
@if ($lang == 'en')
    <div class="row">
        <div class="col-md-12">

            <div class="form-group">
                <div class="card card-warning">

                    <div class="card-header">
                        Images (Landscape) <small>size 1672X940</small>
                    </div>
                    <div class="card-body">
                        @include('media::part.dropzone', ['fdata' =>$fdata,'name' => 'post_file', 'size' => 'Landscape',
                        'type' => 0])

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">

            <div class="form-group">
                {{ Form::label('release_year', 'Release year') }}
                {{ Form::text('release_year', !empty($fdata->release_year) ? $fdata->release_year : null, ['class' => $errors->has('release_year') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Release year']) }}
                @error('release_year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                {{ Form::label('video_type', 'Video Type') }}
                {{ Form::text('video_type', !empty($fdata->video_type) ? $fdata->video_type : null, ['class' => $errors->has('video_type') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Video Type']) }}
                @error('video_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{ Form::label('trailer_url', 'Trailer Video ID') }}
                {{ Form::text('trailer_url', !empty($fdata->trailer_url) ? $fdata->trailer_url : null, ['class' => $errors->has('trailer_url') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Trailer Video ID']) }}
                @error('trailer_url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{ Form::label('video_url', 'Video ID') }}
                {{ Form::text('video_url', !empty($fdata->video_url) ? $fdata->video_url : null, ['class' => $errors->has('video_url') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Video ID']) }}
                @error('video_url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{ Form::label('youtube_url', 'Youtube Url') }}
                {{ Form::text('youtube_url', !empty($fdata->youtube_url) ? $fdata->youtube_url : null, ['class' => $errors->has('youtube_url') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Youtube Url']) }}
                @error('youtube_url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{ Form::label('remarks', 'Remarks') }}
                {{ Form::text('remarks', !empty($fdata->remarks) ? $fdata->remarks : null, ['class' => $errors->has('remarks') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Remarks']) }}
                @error('remarks')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>


        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('age_limit', 'Age limit') }}
                {{ Form::text('age_limit', !empty($fdata->age_limit) ? $fdata->age_limit : null, ['class' => $errors->has('age_limit') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Age limit']) }}
                @error('age_limit')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group">
                {{ Form::label('duration', 'Duration') }}
                {{ Form::text('duration', !empty($fdata->duration) ? $fdata->duration : null, ['class' => $errors->has('duration') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Duration']) }}
                @error('duration')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{ Form::label('starring', 'Starring') }}
                {{ Form::text('starring', !empty($fdata->starring) ? $fdata->starring : null, ['class' => $errors->has('starring') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Starring']) }}
                @error('starring')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{ Form::label('published_at', 'Published status') }}
                {{ Form::text('published_at', !empty($fdata->published_at) ? $fdata->published_at : null, ['class' => $errors->has('published_at') ? 'form-control  is-invalid datepicker' : 'form-control datepicker']) }}
                @error('published_at')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <div class="form-group">
                {{ Form::label('premium', 'Is Premium?') }}
                {{ Form::select('premium', boolPremiumArr(), !empty($fdata->premium) ? $fdata->premium : 0, ['class' => $errors->has('premium') ? 'form-control  is-invalid' : 'form-control']) }}
                @error('premium')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <div class="form-group">
                {{ Form::label('is_active', 'Status') }}<br>
                <div
                    class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success custom-switch-color custom-control-inline">
                    {{ Form::checkbox('is_active', 'Yes', false, ['class' => 'custom-control-input bg-success', 'id' => 'is_active', 'checked' => !empty($fdata->is_active) && $fdata->is_active == 'Yes' ? true : false]) }}
                    <label class="custom-control-label" for="is_active"> Is Active ?</label>
                </div>
            </div>

        </div>
    </div>



@endif
