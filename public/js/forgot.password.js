import { URLROOT } from './script.js';

$(document).ready(function () {

    // Validate and send email
    $('#submit').click(function (e) {
        e.preventDefault();
        var email = $('input[name=email]').val();
        if (!(email.trim() != '')) {
            $('#appdialog').show();
            $('.err-message').html('Email không được để trống');
            return;
        }

        $.ajax({
            url: URLROOT + 'password/forgot_password',
            method: "POST",
            data: {
                email: email
            },
            dataType: "json",
            success: function (data) {
                e.preventDefault();
                if (data.msg != '') {
                    $('#appdialog').show();
                    $('.err-message').html(data.msg);
                    return
                }
                $('#dialog-success').show();
                $('.msg-success').html('Xin vui lòng kiểm tra email của bạn để lấy đường dẫn đổi mật khẩu. Chúc bạn có một ngày tốt lành!');
                $('#button-click').click(function (e) { 
                    e.preventDefault();
                    location.href = URLROOT + 'authentication/login'
                });
            }, error: function (data) {
                alert('Bye')
            }
        });
    });
});