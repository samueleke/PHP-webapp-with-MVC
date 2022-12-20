$(document).ready(function () {
    $('#reset-password').submit(function (event) {
        event.preventDefault();
        var form = $(this).serializeArray();
        const obj = {};
        for (let i = 0; i < form.length; i++) {
            obj[form[i].name] = form[i].value;
        }
        $.post('/reset-password', obj, function (data) {
            if(data ==""){
                $("#form-message").html("Sikeres email küldés!");
                $("#form-message").css("color", "green");
                
            }
            else{
                $("#form-message").html(data);
                $("#form-message").css("color", "red");

            }
        })
    });
});