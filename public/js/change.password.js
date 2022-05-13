import { URLROOT } from './script.js'

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) {
        return null
    }
    if (!results[2]) {
        return ''
    }
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

$(document).ready(function () {
    // Change password
    $('#submit').click(function (e) {
        e.preventDefault();
        var selector = getParameterByName('selector');
        var validator = getParameterByName('validator');
        var password = $('input[name=password]').val();
        var confirm_password = $('input[name=confirm_password]').val();
        if (!(password.trim() != '' && confirm_password.trim() != '')) {
            $('#appdialog').show();
            $('.err-message').html('Thông tin không được để trống')
            return
        }
        $.ajax({
            url: URLROOT + 'password/change_password',
            method: "POST",
            data: {
                selector: selector, validator: validator,
                password: password, confirm_password: confirm_password
            },
            dataType: "json",
            success: function (data) {
                if (data.data_err != '') {
                    $('#appdialog').show();
                    $('.err-message').html(data.data_err)
                    return
                }
                if (data.page_err != '') {
                    $('#appdialog').show();
                    $('.err-message').html(data.page_err)
                    return
                }
                $('#dialog-success').show();
                $('.msg-success').html('Đổi mật khẩu thành công')
                $('#button-click').click(function (e) {
                    e.preventDefault();
                    window.location = URLROOT + 'authentication/login'
                });
            }
            ,error: function(data){
                alert('cút')
            }
        });
    });

    // Show password
    $(".toggle-password").click(function () {

        $(this).toggleClass('toggle-password-invi');
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password" || input.attr("type") == "confirm_password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }

    });
});