<?php
session_start();

class Information extends Controller
{
    public function __construct()
    {
        $this->user_model = $this->model('User');
        $this->account_model = $this->model('Account');
    }

    public function userinfo()
    {
        if (isset($_SESSION['username'])) {
            $id = $_SESSION['account_id'];
            $account = $this->account_model->getAccountByID($id);
            $user = $this->user_model->findUserById($id);
            $data = [
                'user' => $user,
                'account' => $account
            ];

            $this->view('authentication/infomation', $data);
        } else {
            header('location: ' . URLROOT . '/authentication/login');
        }
    }

    public function editinfo()
    {
        $data = [
            'fullname' => '',
            'position' => '',
            'dob' => '',
            'phone_number' => '',
            'addr' => '',
            'fullname_error' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'fullname' => trim($_POST['fullname']),
                'position' => trim($_POST['position']),
                'dob' => trim($_POST['dob']),
                'phone_number' => trim($_POST['phone']),
                'addr' => trim($_POST['address']),
                'fullname_error' => ''
            ];

            // Validate fullname
            if (empty($data['fullname'])) {
                $data['fullname_error'] = 'Họ tên không được để trống';
            }

            if (empty($data['fullname_error'])) {
                $id = $_SESSION['account_id'];
                $user = $this->user_model->findUserById($id);
                $array = explode('-', $data['dob']);
                $day = $array[2];
                $month = $array[1];
                $year = $array[0];
                if (!checkdate($month, $day, $year)) {
                    $data['dob'] = '0000-00-00';
                }
                if (!$this->user_model->updateInfo($data, $user->user_id)) {
                    die('Something went wrong');
                }
            }

            $response = '';
            if (!empty($data['fullname_error'])) {
                $response .= $data['fullname_error'] . '<br/>';
            }

            die(json_encode([
                'msg' => $response
            ]));
        }
    }
}
