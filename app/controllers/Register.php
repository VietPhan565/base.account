<?php

class Register extends Controller
{
    public function __construct()
    {
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
        $response = '';
        $data = [
            'fullname' => '',
            'username' => '',
            'password' => '',
            'confirm_pass' => '',
            'email' => '',
            'fullname_error' => '',
            'user_error' => '',
            'pass_error' => '',
            'confirm_pass_error' => '',
            'email_error' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Santize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'fullname' => trim($_POST['fullname']),
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'confirm_pass' => trim($_POST['confirm_pass']),
                'email' => trim($_POST['email']),
                'fullname_error' => '',
                'user_error' => '',
                'pass_error' => '',
                'confirm_pass_error' => '',
                'email_error' => ''
            ];

            //Validate fullname
            if (empty($data['fullname'])) {
                $data['fullname_error'] = 'Xin vui lòng nhập tên của bạn';
            }

            //Validate username
            if (empty($data['username'])) {
                $data['user_error'] = 'Tên tài khoản không được để trống.';
            } elseif (!preg_match(name_validation, $data['username'])) {
                $data['user_error'] = 'Tên tài khoản chỉ có thể chứa kí tự hoặc số.';
            } elseif ($this->account_model->getAccountByUser($data['username']) != null) {
                $data['user_error'] = 'Tên tài khoản đã tồn tại';
            }

            //Validate email
            if (empty($data['email'])) {
                $data['email_error'] = 'Email không được để trống.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_error'] = 'Email phải đúng format.';
            } else {
                if ($this->user_model->findUserByEmail($data['email'])) {
                    $data['email_error'] = 'Email đã tồn tại.';
                }
            }

            //Validate password
            if (empty($data['password'])) {
                $data['pass_error'] = 'Mật khẩu không được để trống.';
            } elseif (!preg_match(pass_validation, $data['password'])) {
                $data['pass_error'] = "Mật khẩu phải chứa ít nhất 8 kí tự, có ít nhất
				1 chữ cái in hoa và 1 số";
            }

            //Validate confirm password
            if (empty($data['confirm_pass'])) {
                $data['confirm_pass_error'] = 'Mật khẩu xác thực không được để trống.';
            } elseif ($data['password'] !== $data['confirm_pass']) {
                $data['confirm_pass_error'] = "Mật khẩu xác thực và mật khẩu không trùng khớp";
            }

            //Check if all error are empty
            if (
                empty($data['fullname_error']) &&
                empty($data['user_error']) && empty($data['pass_error']) &&
                empty($data['email_error']) && empty($data['confirm_pass_error'])
            ) {
                //Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register
                if ($this->account_model->register($data)) {
                    $account = $this->account_model->getAccountByUser($data['username']);
                    if (!is_null($account)) {
                        $response = $this->user_model->register($data, $account->account_id);
                        // header('location: ' . URLROOT . '/authentication/login');
                    }
                }
            }

            $output_error = '';
            $output_success = '';

            if (!empty($data['fullname_error'])) {
                $output_error .= $data['fullname_error'] . '<br/>';
            } elseif (!empty($data['user_error'])) {
                $output_error .= $data['user_error'] . '<br/>';
            } elseif (!empty($data['pass_error'])) {
                $output_error .= $data['pass_error'] . '<br/>';
            } elseif (!empty($data['confirm_pass_error'])) {
                $output_error .= $data['confirm_pass_error'] . '<br/>';
            } elseif (!empty($data['email_error'])) {
                $output_error .= $data['email_error'] . '<br/>';
            }

            if ($response) {
                $output_success = 'Tạo tài khoản thành công';
            }

            die(json_encode([
                'success' => false,
                'msg' => $output_error,
                'msg_ok' => $output_success
            ]));
        }

        $this->view('authentication/register', $data);
    }
}
