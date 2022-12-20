$(document).ready(function () {
    $('#login-form').submit(function (event) {
        event.preventDefault();
        var form = $(this).serializeArray();
        const obj = {};
        for (let i = 0; i < form.length; i++) {
            obj[form[i].name] = form[i].value;
        }
        $.post('/login', obj, function (data) {
            console.log(data.toString());
            if (data.toString() == "student" ) {
                location.href = "/student";
            } else if (data.toString() == "admin") {
                location.href = "/admin";
            } else {
                $("#form-message").html("Helytelen jelszó!");
            }
        })
    });

    $('#register-form').submit(function (event) {
        event.preventDefault();
        var form = $(this).serializeArray();
        const obj = {};
        for (let i = 0; i < form.length; i++) {
            obj[form[i].name] = form[i].value;
        }
        $.post('/register', obj, function (data) {
            console.log(data);
            if (data == "" || data.startsWith("<!DOCTYPE html>")) {
                $("#form-message").html("Sikeres csapat regisztracio!");
                location.href = "/login";
            } else {
                $("#form-message").html(data);
            }
        })
    });
})