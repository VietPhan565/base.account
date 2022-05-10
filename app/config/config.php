<?php

    //Database params
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'base_account');

    define('name_validation', '/^[a-zA-Z0-9]*$/');
    define('pass_validation', '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/');

    //APPROOT
    define('APPROOT', dirname(dirname(__FILE__)));

    //URLROOT
    define('URLROOT', 'http://'. $_SERVER['HTTP_HOST'] .'/base.account');

    define('SITENAME', 'Base Account');

?>