import { URLROOT } from './script.js';

$(document).ready(function () {

    // Dialog for edit info

    $('#update-user-profile').click(function (e) {
        e.preventDefault();
        var fullname = $('input[name=fullname]').val();
        var position = $('#position').val();
        var img_url = $('#avatar').get(0).files[0]
        var dob_year = $('#dob_year').val()
        var dob_month = $('#dob_month').val()
        var dob_day = $('#dob_day').val()
        var phone = $('#phone').val();
        var addr = $('#address').val();

        var form_data = new FormData();
        form_data.append('fullname', fullname)
        form_data.append('position', position)
        form_data.append('dob', dob_year + '-' + dob_month + '-' + dob_day)
        form_data.append('image', img_url)
        form_data.append('phone', phone)
        form_data.append('address', addr)

        if (!(fullname.trim() != '')) {
            $('#appdialog-error').show();
            $('#appdialog-error .err-message').html('Không được để trống tên')
            return;
        }
        $.ajax({
            url: URLROOT + 'information/editinfo',
            method: 'POST',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                if (data.msg != '') {
                    $('#appdialog-error').show();
                    $('#appdialog-error .err-message').html(data.msg)
                    return;
                }
                location.reload();
            }
        });
    });

    $('#user-avatar').change(function (e) {
        e.preventDefault();
        var file = this.files[0];
        let form = new FormData();
        form.append('image', file);
        $.ajax({
            url: URLROOT + 'information/upload_image',
            type: 'POST',
            data: form,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                location.reload();

            },
            error: function () {
                return alert('Nothing change! Please try again...');
            }
        });
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

    //Dialog for logout
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

    // Dialog for change password
    $('#update-new-pass').click(function (e) {
        e.preventDefault();
        var old_password = $('#old_password').val();
        var new_password = $('#new_password').val();
        var confirm_new_password = $('#conf_new_password').val();
        if (!(old_password.trim() != '' && new_password.trim() != ''
            && confirm_new_password.trim() != '')) {
            $('#appdialog-error').show();
            $('#appdialog-error .err-message').html('Thông tin không được để trống');
            return;
        }
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

    // Error dialog
    $('#appdialog-error .dialog-close .icon-close').click(function (e) {
        e.preventDefault();
        $('#appdialog-error').hide();
    });

    $('#appdialog-error .dialog-button .submit').click(function (e) {
        e.preventDefault();
        $('#appdialog-error').hide();
    });
});