<div class="form-group">
    <label for="{{$input_name}}">
        @if(isset($label)) {{$label }} @else {{ $input_name }} @endif

        @if(isset($required))
            @if($required == 'true')
                <span class="text-danger">*</span>
            @endif
        @else
            <span class="text-danger">*</span>
        @endif
    </label>

    <textarea style="border-top:3px solid #591818" name="{{ $input_name }}"
              id="{{ $input_name }}"
              rows="14"
              placeholder="{{ isset($placeholder) == null ? $input_name  : $placeholder}}"
              class="form-control {{ $errors->first($input_name) ? 'is-invalid' : '' }} {{ isset($additional_class) ? $additional_class : '' }}"
              aria-describedby="emailHelp"
              {{ isset($custom_string) ? $custom_string : '' }}>{{ isset($value) ? $value : old($input_name)}}</textarea>

    @if ($errors->has($input_name))
        <div class="error">{{ $errors->first($input_name) }}</div>
    @endif
</div>
