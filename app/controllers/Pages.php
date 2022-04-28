<?php
class Pages extends Controller{
    public function __construct()
    {
        $this->user_model = $this->model('User');
    }

    public function index(){
        $users = $this->user_model->getUsers();
        $data = [
            'users' => $users
        ];
        $this->view('pages/index', $data);
    }

    public function about(){
        $this->view('pages/about');
    }
}