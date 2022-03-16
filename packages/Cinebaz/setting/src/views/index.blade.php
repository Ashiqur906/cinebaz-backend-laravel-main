@extends('layouts.app')

@section('content')

    <!-- Main content -->

    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">



                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title" style="width: 100%">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title">Setting</h4>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-success pull-right" data-toggle="modal"
                                            data-target="#modal-default">
                                            Add New
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::open(['method' => 'POST', 'route' => 'admin.setting.update', 'enctype' => 'multipart/form-data']) }}
                        <div class="iq-card-body">
                            @foreach ($mdata as $setting)

                                <div class="form-group" style="margin-bottom: 50px">
                                    <label for="{{ $setting->key }}"
                                        class="makeupinstation">{{ $setting->display_name }}
                                        <small class="pull-right">{{ "cz_setting('" . $setting->key . "')" }}</small>
                                    </label>

                                    @if ($setting->type == 'text')
                                        <input type="text" class="form-control" name="{{ $setting->key }}"
                                            value="{{ $setting->value }}">
                                    @elseif($setting->type == "text_area")
                                        <textarea class="form-control"
                                            name="{{ $setting->key }}">{{ $setting->value ?? '' }}</textarea>
                                    @elseif($setting->type == "rich_text_box")
                                        <textarea class="form-control richTextBox"
                                            name="{{ $setting->key }}">{{ $setting->value ?? '' }}</textarea>
                                    @elseif($setting->type == "code_editor")
                                        <?php $options = json_decode($setting->details); ?>
                                        <div id="{{ $setting->key }}" data-theme="{{ @$options->theme }}"
                                            data-language="{{ @$options->language }}" class="ace_editor min_height_400"
                                            name="{{ $setting->key }}">{{ $setting->value ?? '' }}</div>
                                        <textarea name="{{ $setting->key }}" id="{{ $setting->key }}_textarea"
                                            class="hidden">{{ $setting->value ?? '' }}</textarea>
                                    @elseif($setting->type == "image" || $setting->type == "file")

                                        @if (isset($setting->value) && !empty($setting->value))
                                            <div class="img_settings_container">
                                                <a href="" class="voyager-x delete_value"></a>

                                                @if ($setting->type == 'image')
                                                    <img src="{{ asset($setting->value )}}"
                                                        style="width:200px; height:auto; padding:2px; border:1px solid #ddd; margin-bottom:10px;">
                                                @else
                                                    <a href="{{ $setting->value }}" target="_blank">
                                                        <i class="fa fa-file" aria-hidden="true"
                                                            style="color: red; font-size:50px"></i>
                                                        <br> <br>
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="clearfix"></div>

                                        @elseif($setting->type == "file" && isset( $setting->value ))

                                            @if (json_decode($setting->value) !== null)
                                                @foreach (json_decode($setting->value) as $file)

                                                    <div class="fileType">
                                                        <a class="fileType" target="_blank"
                                                            href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) }}">
                                                            {{ $file->original_name }}
                                                        </a>
                                                        <a href="{{ route('voyager.settings.delete_value', $setting->id) }}"
                                                            class="voyager-x delete_value"></a>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endif
                                        <input type="file" name="{{ $setting->key }}">
                                    @elseif($setting->type == "select_dropdown")
                                        <?php $options = json_decode($setting->details); ?>
                                        <?php $selected_value = isset($setting->value) &&
                                        !empty($setting->value) ? $setting->value : null; ?>
                                        <select class="form-control" name="{{ $setting->key }}">
                                            <?php $default = isset($options->default) ? $options->default :
                                            null; ?>
                                            @if (isset($options->options))
                                                @foreach ($options->options as $index => $option)
                                                    <option value="{{ $index }}" @if ($default == $index && $selected_value === null) selected="selected" @endif
                                                        @if ($selected_value == $index)
                                                        selected="selected"
                                                @endif>{{ $option }}</option>
                                            @endforeach
                                    @endif
                                    </select>

                                @elseif($setting->type == "radio_btn")
                                    <?php $options = json_decode($setting->details); ?>
                                    <?php $selected_value = isset($setting->value) && !empty($setting->value)
                                    ? $setting->value : null; ?>
                                    <?php $default = isset($options->default) ? $options->default : null; ?>
                                    <ul class="radio">
                                        @if (isset($options->options))
                                            @foreach ($options->options as $index => $option)
                                                <li>
                                                    <input type="radio" id="option-{{ $index }}"
                                                        name="{{ $setting->key }}" value="{{ $index }}" @if ($default == $index && $selected_value === null) checked @endif @if ($selected_value == $index)
                                                    checked
                                            @endif>
                                            <label for="option-{{ $index }}">{{ $option }}</label>
                                            <div class="check"></div>
                                            </li>
                                        @endforeach
                            @endif
                            </ul>
                        @elseif($setting->type == "checkbox")
                            <?php $options = json_decode($setting->details); ?>
                            <?php $checked = isset($setting->value) && $setting->value == 1 ? true : false;
                            ?>
                            @if (isset($options->on) && isset($options->off))
                                <input type="checkbox" name="{{ $setting->key }}" class="toggleswitch" @if ($checked) checked @endif
                                    data-on="{{ $options->on }}" data-off="{{ $options->off }}">
                            @else
                                <input type="checkbox" name="{{ $setting->key }}" @if ($checked) checked @endif class="toggleswitch">
                            @endif
                            @endif
                        </div>



                        @endforeach
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> {{-- Close body --}}
                    {{ Form::close() }}





                </div>


            </div>


        </div>
    </div>
    </div>



    <!-- /.content -->


    <!-- Modal -->
    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Setting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['method' => 'POST', 'route' => 'admin.setting.store']) }}
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12">


                            <div class="mb-3 {{ $errors->has('name') ? 'was-validated' : '' }}">
                                {{ Form::label('display_name', 'Name') }}
                                {{ Form::text('display_name', !empty($fdata->display_name) ? $fdata->display_name : null, ['class' => 'form-control', 'placeholder' => 'Setting Name...']) }}
                                @if ($errors->has('display_name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('display_name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('key') ? 'was-validated' : '' }}">

                                {{ Form::label('key', 'Key', ['class' => 'key']) }}
                                {{ Form::text('key', !empty($fdata->key) ? $fdata->key : null, ['class' => 'form-control', 'placeholder' => 'Setting key...']) }}

                                @if ($errors->has('key'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('key') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('name') ? 'was-validated' : '' }}">

                                {{ Form::label('type', 'Type') }}
                                {{ Form::select('type', config('cz_setting.types'), !empty($fdata->type) ? $fdata->type : null, ['class' => 'form-control', 'placeholder' => 'Setting Type...']) }}

                                @if ($errors->has('type'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('type') }}
                                    </div>
                                @endif
                            </div>



                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection





@push('scripts')
    <style>
        .makeupinstation {
            display: block;
        }

        .makeupinstation small {
            color: #9E9E9E;
            font-weight: 200;
        }

    </style>

@endpush
