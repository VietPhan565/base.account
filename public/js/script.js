$(document).ready(function () {
    $('dialog-close').click(function (e) {
        e.preventDefault();
        $('#appdialog').hide();
    });

    $('.dialog-button').click(function (e) {
        e.preventDefault();
        $('#appdialog').hide();
    })

    $('dialog-close').click(function (e) {
        e.preventDefault();
        $('#dialog-success').hide();
    });

    $('.dialog-button').click(function (e) {
        e.preventDefault();
        $('#dialog-success').hide();
    })
});

export const URLROOT = 'http://localhost/base.account/'