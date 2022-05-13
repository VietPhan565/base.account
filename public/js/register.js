import { URLROOT } from './script.js'

$(document).ready(function () {

    // Register
    $('#submit').click(function (e) {
        e.preventDefault();
        var fullname = $('#fullname').val();
        var username = $('#username').val();
        var password = $('#password').val();
        var confirm_password = $('#confirm_pass').val();
        var email = $('#email').val();
        if (!(fullname.trim() != '' && username.trim() != '' && password.trim() != ''
            && confirm_password.trim() != '' && email.trim() != '')) {
            $('#appdialog').show();
            $('.err-message').html("Thông tin không được để trống");
            return;
        }
        $.ajax({
            url: URLROOT + 'register/registration',
            method: 'POST',
            data: {
                fullname: fullname,
                username: username, password: password,
                confirm_pass: confirm_password, email: email
            },
            dataType: "json",
            success: function (data) {
                if (data.msg != '') {
                    $('#appdialog').show()
                    $('.err-message').html(data.msg)
                    return
                }
                if (data.msg_ok != '') {
                    $('#dialog-success').show()
                    $('.msg-success').html(data.msg_ok)
                }

                $('#button-click').click(function (e) {
                    e.preventDefault();
                    window.location = URLROOT + "authentication/login";
                });
            }
        });
    });


    // Show password
    $(".toggle-password").click(function () {

        $(this).toggleClass('toggle-password-invi');
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password" || input.attr("type") == "confirm_pass") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }

    });
});