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
        }else{
            header('location: ' . URLROOT . '/authentication/login');
        }
    }
}
