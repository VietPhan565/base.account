import { URLROOT } from './script.js';

//Dialog for edit info
$(document).ready(function () {
    $('#edit-user-info').click(function (e) { 
        e.preventDefault();
        $('#dialog').show();
    });

    $('.dialogclose').click(function(e){
        e.preventDefault();
        $('#dialog').hide();
    });

    $('.button.cancel').click(function(e){
        e.preventDefault();
        $('#dialog').hide();
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
        window.location = URLROOT + '/authentication/logout'
    });

    $('#item-logout').click(function (e) { 
        e.preventDefault();
        $('#appdialog').show();
    });

    $('.dialog-close').click(function(e){
        e.preventDefault();
        $('#appdialog').hide();
    });
});