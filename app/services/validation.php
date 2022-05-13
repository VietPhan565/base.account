<?php

define('name_validation', '/^[a-zA-Z0-9]*$/');
define('pass_validation', '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/');
require_once '../app/models/Account.php';
require_once '../app/models/User.php';

class validation
{

    public function __construct()
    {
        $this->account_model = new Account();
        $this->user_model = new User();
    }

    /**
     * validateUsername
     *
     * @param  mixed $username
     * @return void
     */
    public function validateUsernameNotExist($username)
    {
        if (empty($username)) {
            return 'Tên tài khoản không được để trống.';
        }
        if (!preg_match(name_validation, $username)) {
            return 'Tên tài khoản chỉ có thể chứa kí tự hoặc số.';
        }
        if ($this->account_model->getAccountByUser($username) != null) {
            return 'Tên tài khoản đã tồn tại';
        }
        return true;
    }

    /**
     * validatePassword
     *
     * @param  mixed $password
     * @return void
     */
    public function validatePassword($password)
    {
        if (empty($password)) {
            return 'Mật khẩu không được để trống.';
        }
        if (!preg_match(pass_validation, $password)) {
            return "Mật khẩu phải chứa ít nhất 8 kí tự, có ít nhất
            1 chữ cái in hoa và 1 số";
        }
        return true;
    }
    
    /**
     * validateConfirmPass
     *
     * @param  mixed $pass
     * @param  mixed $confirm_pass
     * @return void
     */
    public function validateConfirmPass($pass, $confirm_pass)
    {
        if (empty($confirm_pass)) {
            return 'Mật khẩu xác thực không được để trống.';
        }
        if ($pass !== $confirm_pass) {
            return "Mật khẩu xác thực và mật khẩu không trùng khớp";
        }
        return true;
    }
    
    /**
     * validateEmail
     *
     * @param  mixed $email
     * @return void
     */
    public function validateEmailNotExist($email)
    {
        if (empty($email)) {
            return 'Email không được để trống.';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'Email phải đúng format.';
        }
        if ($this->user_model->findUserByEmail($email)) {
            return 'Email đã tồn tại.';
        }
        return true;
    }

    public function validateEmailExist($email)
    {
        if (empty($email)) {
            return 'Email không được để trống';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'Email không đúng format';
        }
        if (!$this->user_model->findUserByEmail($email)) {
            return 'Email không tồn tại';
        }
        return true;
    }


    public function validateFullname($fullname)
    {
        if (empty($fullname)) {
            return 'Xin vui lòng nhập tên của bạn';
        }
        return true;
    }
}
