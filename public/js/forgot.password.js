import { URLROOT } from './script.js';

$(document).ready(function () {
    $('#submit').click(function (e) {
        e.preventDefault();
        var email = $('input[name=email]').val();
        if (email.trim() != '') {
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
                    location.href = URLROOT + 'authentication/login'
                }, error: function (data) {
                    alert('Bye')
                }
            });
        } else {
            $('#appdialog').show();
            $('.err-message').html('Email không được để trống');
        }
    });
});