<div class="form-group">

    <label for="{{$input_name}}">
        @if(isset($label)) {{$label}} @else {{$input_name}} @endif

        @if(isset($required)) 
            @if($required == 'true')
                <span class="text-danger">*</span>
            @endif
        @else
            <span class="text-danger">*</span>
        @endif
    </label>

    <select name="{{ $input_name }}"
            id="{{ $input_name }}"
            class="form-control {{ $errors->first($input_name) ? 'is-invalid' : '' }} {{ isset($additional_class) ? $additional_class : '' }}"
        {{ isset($custom_string) ? $custom_string : '' }}>

        <option value="">Select One</option>
        @foreach($data_set as $key => $_data)
           
            <option value="{{ isset($value) ? $value : $_data}}" @if(old($input_name)) {{old($input_name) == $_data ? 'selected' : ''}}
                @else {{ isset($value) ? $value == $_data ? 'selected' : '' : '' }} @endif>

                @if(isset($_data)) {{$_data}} @else {{$_data}} @endif
            </option>
        @endforeach
    </select>

    @if ($errors->has($input_name))
        <div class="error">{{ $errors->first($input_name) }}</div>
    @endif
</div>
