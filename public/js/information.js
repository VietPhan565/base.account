import { URLROOT } from './script.js';

//Dialog for edit info
$(document).ready(function () {

    $('#update-user-profile').click(function (e) {
        e.preventDefault();
        var fullname = $('input[name=fullname]').val();
        var position = $('#position').val();
        // var img_url = $('')
        // var dob = $('#dob_year').val() + '-' + $('#dob_month').val() + '-' + $('#dob_day').val();
        var dob_year = $('#dob_year').val()
        var dob_month = $('#dob_month').val()
        var dob_day = $('#dob_day').val()
        var phone = $('#phone').val();
        var addr = $('#address').val();
        if (fullname.trim() != '') {
            $.ajax({
                url: URLROOT + 'information/editinfo',
                method: 'POST',
                data: {
                    fullname: fullname,
                    position: position,
                    dob: dob_year + '-' +dob_month + '-'+dob_day, 
                    phone: phone, 
                    address: addr
                },
                dataType: "json",
                success: function (data) {
                    location.reload();
                }, error: function (data) {
                }
            });
        } else {
            $('#appdialog-error').show();
            $('#appdialog-error .err-message').html('Không được để trống tên')
        }
    });

    $('#edit-user-info').click(function (e) {
        e.preventDefault();
        $('#dialog').show();
    });

    $('.dialogclose').click(function (e) {
        e.preventDefault();
        $('#dialog').hide();
    });

    $('.button.cancel').click(function (e) {
        e.preventDefault();
        $('#dialog').hide();
    });

    $('#edit-account').click(function (e) {
        e.preventDefault();
        $('#dialog').show();
    });
});

//Dialog for logout
$(document).ready(function () {
    $('.button.er.confirm-button').click(function (e) {
        e.preventDefault();
        $('#appdialog').hide();
    });

    $('.button.ss.confirm-button').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: URLROOT + '/authentication/logout',
            method: "POST",
            success: function (response) {
                location.reload();
            }
        });
    });

    $('#item-logout').click(function (e) {
        e.preventDefault();
        $('#appdialog').show();
    });

    $('.dialog-close').click(function (e) {
        e.preventDefault();
        $('#appdialog').hide();
    });
});

// Dialog for change password
$(document).ready(function () {

    $('#update-new-pass').click(function (e) {
        e.preventDefault();
        var old_password = $('#old_password').val();
        var new_password = $('#new_password').val();
        var confirm_new_password = $('#conf_new_password').val();
        if (old_password.trim() != '' && new_password.trim() != ''
            && confirm_new_password.trim() != '') {
            $.ajax({
                url: URLROOT + 'password/update_password',
                method: "POST",
                dataType: "json",
                data: {
                    old_password: old_password, new_password: new_password,
                    conf_new_password: confirm_new_password
                },
                success: function (data) {
                    if (data.msg != '') {
                        $('#appdialog-error').show();
                        $('#appdialog-error .err-message').html(data.msg)
                        return;
                    }
                    location.reload();
                }
            });
        } else {
            $('#appdialog-error').show();
            $('#appdialog-error .err-message').html('Thông tin không được để trống');
        }
    });

    $('#div-changepass').click(function (e) {
        e.preventDefault();
        $('#changepass').show();
    });

    $('#changepass .dialogclose').click(function (e) {
        e.preventDefault();
        $('#changepass').hide();
    })

    $('#changepass .button.cancel').click(function (e) {
        e.preventDefault();
        $('#changepass').hide();
    });
});

// Error dialog
$(document).ready(function () {
    $('#appdialog-error .dialog-close .icon-close').click(function (e) {
        e.preventDefault();
        $('#appdialog-error').hide();
    });

    $('#appdialog-error .dialog-button .submit').click(function (e) {
        e.preventDefault();
        $('#appdialog-error').hide();
    });
});