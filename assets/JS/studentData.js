$(document).ready(function(){
    $('#student-form').submit(function (e) { 
        e.preventDefault();
        var form = $(this).serializeArray();
        const obj = {};
        for (let i = 0; i < form.length; i++) {
            obj[form[i].name] = form[i].value;
        }
        $.post("/student/add-student", obj,
            function (data,stat,request) {
                console.log(data);
                if (data == "" || data.startsWith("<!DOCTYPE html>")){
                    $("#form-message").html("Sikeres diák regisztració!");

                }else{
                    $("#form-message").html(data);
                }
            }
        );
    })
});