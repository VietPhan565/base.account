import { URLROOT } from './script.js'

$(document).ready(function () {

    // Login
    $('#submit').click(function (e) {
        e.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();
        if (!(username.trim() != '' && password.trim() != '')) {
            $('#appdialog').show();
            $('.err-message').html("Thông tin không được để trống");
            return;
        }
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
                location.href = URLROOT + "information/userinfo";
            },
        });
    });

    // Show password
    $(".toggle-password").click(function () {

        $(this).toggleClass('toggle-password-invi');
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }

    });
});
