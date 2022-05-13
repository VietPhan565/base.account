<?php

class Register extends Controller
{
    public function __construct()
    {
        $this->validation = $this->service('validation');
        $this->user_model = $this->model('User');
        $this->account_model = $this->model('Account');
    }

    /**
     * register
     *
     * @return void
     */
    public function registration()
    {
        $data = [
            'fullname' => '',
            'username' => '',
            'password' => '',
            'confirm_pass' => '',
            'email' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'fullname' => trim($_POST['fullname']),
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'confirm_pass' => trim($_POST['confirm_pass']),
                'email' => trim($_POST['email']),
            ];

            //Validate fullname
            $validate_name = $this->validation->validateFullname($data['fullname']);
            if ($validate_name != 'true') {
                $this->close([
                    'msg' => $validate_name
                ]);
            }

            //Validate username
            $validate_user = $this->validation->validateUsernameNotExist($data['username']);
            if ($validate_user != 'true') {
                $this->close([
                    'msg' => $validate_user
                ]);
            }

            //Validate password
            $validate_password = $this->validation->validatePassword($data['password']);
            if ($validate_password != 'true') {
                $this->close([
                    'msg' => $validate_password
                ]);
            }

            //Validate confirm password
            $validate_confirm_pass = $this->validation->validateConfirmPass($data['password'], $data['confirm_pass']);
            if ($validate_confirm_pass != 'true') {
                $this->close([
                    'msg' => $validate_confirm_pass
                ]);
            }

            //Validate email
            $validate_email = $this->validation->validateEmailNotExist($data['email']);
            if ($validate_email != 'true') {
                $this->close([
                    'msg' => $validate_email
                ]);
            }

            //Check if all error are empty
            if (
                $validate_name && $validate_user && $validate_password
                && $validate_confirm_pass && $validate_email
            ) {
                //Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register
                if ($this->account_model->register($data)) {
                    $account = $this->account_model->getAccountByUser($data['username']);
                    if ($account) {
                        $this->user_model->register($data, $account->account_id);
                        $this->close([
                            'msg' => '',
                            'msg_ok' => 'Tạo tài khoản thành công'
                        ]);
                    }
                    $this->close([
                        'msg' => 'Tạo tài khoản thất bại',
                        'msg_ok' => ''
                    ]);
                }
            }
        }

        $this->view('authentication/register', $data);
    }
}
