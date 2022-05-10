import { URLROOT } from './script.js'

$(document).ready(function () {
    $('#submit').click(function (e) {
        e.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();
        if (username.trim() != '' && password.trim() != '') {
            $.ajax({
                url: URLROOT + 'authentication/login',
                method: 'POST',
                data: { username: username, password: password },
                dataType: 'json',
                success: function (data) {
                    if (data.msg != '') {
                        $('#appdialog').show();
                        $('.err-message').html(data.msg);
                        return;
                    }
                    window.location = URLROOT + "information/userinfo";
                },
            });
        } else {
            $('#appdialog').show();
            $('.err-message').html("Thông tin không được để trống");
        }
    });

});

$(".toggle-password").click(function () {

    $(this).toggleClass('toggle-password-invi');
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }

});