<div class="form-group">
    <div class="upload-img-box">
       
        <img src="{{asset(isset($preview_image) ? 'storage/'.$preview_image : '')}}">
      
        <input type="file" name="{{ $input_name }}" id="{{$input_name}}" accept="image/*" onchange="previewFile(this)">

        <div class="upload-img-box-icon">
            <i class="fa fa-camera"></i>
            <p class="m-0">@if(isset($label)) {{$label}} @else {{$input_name}} @endif</p>
        </div>
    </div>
</div>
