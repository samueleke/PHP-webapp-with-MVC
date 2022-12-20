$(document).ready(function () {
    $('#fileUpload').submit(function (event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            method: 'post',
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',
            url:'/student/altalanos-informaciok', 
            data: formData, 
            success: function(data) {
                if (data == 'invalid') {
                    // invalid file format.
                    // $("#form-message").html("Invalid File !");
                    $("#form-message").css("color", "red");

                }
                else {
                    // view uploaded file.
                    // $("#form-message").html("File Uploaded");
                    $("#form-message").css("color", "green");

                    $("#fileUpload")[0].reset();
                }
            }
        })
    });
});