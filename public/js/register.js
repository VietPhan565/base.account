import { URLROOT } from './script.js'

$(document).ready(function () {
    $('#submit').click(function (e) {
        e.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();
        var confirm_password = $('#confirm_pass').val();
        var email = $('#email').val();
        if (username.trim() != '' && password.trim() != ''
            && confirm_password.trim() != '' && email.trim() != '') {
            $.ajax({
                url: URLROOT + 'register/registration',
                method: 'POST',
                data: {
                    username: username, password: password,
                    confirm_pass: confirm_password, email: email
                },
                dataType: "json",
                success: function (data) {
                    if (data.msg != '') {
                        $('#appdialog').show()
                        $('.err-message').html(data.msg)
                    }
                    if (data.msg_ok != '') {
                        // e.preventDefault();
                        $('#dialog-success').show()
                        $('.err-success').html(data.msg_ok)
                    }

                    $('#button-click').click(function (e) {
                        e.preventDefault();
                        window.location = URLROOT + "authentication/login";
                    });
                }
            });
            // alert('ok')
        } else {
            $('#appdialog').show();
            $('.err-message').html("Thông tin không được để trống");
        }
    });
});