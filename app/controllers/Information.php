<?php

class Information extends Controller
{
    public function __construct()
    {
        $this->user_model = $this->model('User');
        $this->account_model = $this->model('Account');
    }

    public function userinfo()
    {
        if (!isset($_SESSION['username'])) {
            $this->redirect(URLROOT . '/authentication/login');
            exit();
        }

        $id = $_SESSION['account_id'];
        $account = $this->account_model->getAccountByID($id);
        $user = $this->user_model->findUserById($id);

        $this->view('authentication/infomation', [
            'user' => $user,
            'account' => $account
        ]);
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
                $username = $_SESSION['username'];
                $user = $this->user_model->findUserById($id);
                $array = explode('-', $data['dob']);
                for ($i = 0; $i < count($array); $i++) {
                    if (empty($array[$i])) {
                        $array[$i] = 0;
                    }
                }
                $day = $array[2];
                $month = $array[1];
                $year = $array[0];
                if (!checkdate($month, $day, $year)) {
                    $data['dob'] = '0000-00-00';
                }

                if (isset($_FILES['image'])) {
                    if (0 < $_FILES['image']['error']) {
                        $this->close([
                            'msg' => 'Error: ' . $_FILES['image']['error']
                        ]);
                    }
                    $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    $array_file_extension = array('png', 'jpeg', 'jpg');
                    if (!in_array($file_extension, $array_file_extension)) {
                        $this->close([
                            'msg' => 'Ảnh không đúng định dạng'
                        ]);
                    }

                    if ($_FILES['image']['size'] > 2000000) {
                        $this->close([
                            'msg' => 'Ảnh có kích thước quá lớn'
                        ]);
                    }

                    $url = $username . '.png';
                    move_uploaded_file($_FILES['image']['tmp_name'], 'src/' . $url);
                    $this->user_model->updateUserImg($url, $_SESSION['account_id']);
                }

                if (!$this->user_model->updateInfo($data, $user->user_id)) {
                    $this->close('Something went wrong');
                }
            }

            $response = '';
            if (!empty($data['fullname_error'])) {
                $response .= $data['fullname_error'] . '<br/>';
            }

            $this->close([
                'msg' => $response,
            ]);
        }
    }

    public function upload_image()
    {
        $username = $_SESSION['username'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!isset($_FILES['image'])) {
                $this->close([
                    'msg' => 'File ảnh không tồn tại'
                ]);
            }
            if (0 < $_FILES['image']['error']) {
                $this->close([
                    'msg' => 'Error: ' . $_FILES['image']['error']
                ]);
            }
            $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $array_file_extension = array('png', 'jpeg', 'jpg');
            if (!in_array($file_extension, $array_file_extension)) {
                $this->close([
                    'msg' => 'Ảnh không đúng định dạng'
                ]);
            }

            if ($_FILES['image']['size'] > 2000000) {
                $this->close([
                    'msg' => 'Ảnh có kích thước quá lớn'
                ]);
            }

            $url = $username . '.png';
            move_uploaded_file($_FILES['image']['tmp_name'], 'src/' . $url);
            $this->user_model->updateUserImg($url, $_SESSION['account_id']);
            $this->close([
                'msg' => "Update avatar thành công!"
            ]);
        }
    }
}
