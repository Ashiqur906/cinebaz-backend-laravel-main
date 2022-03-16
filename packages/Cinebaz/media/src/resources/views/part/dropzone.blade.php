@if($name != 'post_file')
    @php 
        $model = $name;
    @endphp
    <div id="{{ $name }}">
        
        @isset($fdata->$model->small)
            <div class="drop_img">
                <img src="{{ asset('storage/'.$fdata->$model->small) }}" class="img-thumbnail">
                <input name="{{ $name.'[]' }}" type="hidden" value="{{ $fdata->$model->id }}">

                <button type="button" class="btn btn-danger remove_image"
                    data-name="{{ $fdata->$model->id }}">Remove</button>
            </div>
        @endisset
    </div>
    <div id="{{ 'up_'.$name }}" style=" {{ !empty($fdata->$model) ? 'display: none;' : '' }} ">
        <div class="dropzone dz-clickable" id="{{ 'drp_'.$name }}">
            <div class="dz-default dz-message" data-dz-message="">
                <span>Drop files here to upload</span>
            </div>
        </div>
        <div align="center">
            <button type="button" class="btn btn-info mt-2" id="{{ 'submit_'.$name }}">Upload</button>
        </div>
    </div>

@else 

@php 
    $hasFile = ($fdata && $fdata->images && count($fdata->images) > 0)? true : false;

@endphp
<div id="{{ $name }}">

    @if ($hasFile)
        @foreach ($fdata->images as $file)
        <div class="drop_img multi">
            <img src="{{ asset('storage/'.$file->small) }}" class="img-thumbnail">
            <input name="{{ $name.'[]' }}" type="hidden" value="{{ $file->id }}">

            <button type="button" class="btn btn-danger remove_image"
                data-name="{{ $file->id }}">Remove</button>
        </div>
        @endforeach
    @endif

</div>

<div id="{{ 'up_'.$name }}" >
    <div class="dropzone dz-clickable" id="{{ 'drp_'.$name }}"  >
        <div class="dz-default dz-message" data-dz-message="">
            <span>Drop files here to upload</span>
        </div>
    </div>
    <div align="center">
        <button type="button" class="btn btn-info mt-2" id="{{ 'submit_'.$name }}">Upload</button>
    </div>
</div>
@endif

@push('scripts')

    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        var {{ 'drp_'.$name }} = new Dropzone("div#{{ 'drp_'.$name }}", {
            autoProcessQueue: false,

            url: "{{ route('dropzone.upload') }}",
            headers: {
                'x-csrf-token': $('meta[name="csrf-token"]').attr('content'),
            },
            method: "post",
            acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
         
            maxFiles: {{ ($type)? 1:10}},
    
            init: function() {
                var type = "{{ $type }}";
                var submitButton = document.querySelector("{{ '#submit_'.$name }}");
                {{ 'drp_'.$name }} = this;
                submitButton.addEventListener('click', function() {
                    {{ 'drp_'.$name }}.processQueue();
                });
                this.on("sending", function(file, xhr, formData) {
                    formData.append("name", "{{ $name }}");
                    formData.append("class", "{{ $name }}");
                    formData.append("size", "{{ $size }}");
                    formData.append("type", "{{ $type }}");
                    formData.append("id", "{{ $fdata->id }}");
                });
                this.on("complete", function(file, response) {
                    console.log(response);
                    if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                        var _this = this;
                        _this.removeAllFiles();
                        if(type != 0){
                            $("{{ '#up_'.$name }}").hide();
                        }
                      
                    }

                });
                this.on("success", function(file, response) {
                    // console.log(response);

                    if (response.img) {
                        $("{{ '#'.$name }}").append(response.img);

                    }

                });
                this.on("error", function(file, message, xhr) {
                    if (xhr == null) this.removeFile(file); // perhaps not remove on xhr errors
                    // alert(message);
                });

            }
        });

        $(document).on("click", "{{ '#'.$name }} .remove_image", function() {
            var name = $(this).data('name');
            $.ajax({
                url: "{{ route('dropzone.delete') }}",
                    headers: {
                    'x-csrf-token': $('meta[name="csrf-token"]').attr('content'),
                },
                method: "post",
                data: {
                    name: name
                },
                success: function(data) {
                    $("{{ '#up_'.$name }}").show();
                }
            });
            $(this).closest('.drop_img').remove();
        });


    </script>


@endpush