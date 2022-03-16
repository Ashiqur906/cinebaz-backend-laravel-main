function previewFile(input) {
    var preview = input.previousElementSibling;
    var file = input.files[0];
    var reader = new FileReader();


    if (input.files[0].size > 2000000) {
        alert("Maximum file size is 2MB!");

    } else {
        reader.onloadend = function () {
            preview.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
}



