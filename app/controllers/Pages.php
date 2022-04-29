<?php
class Pages extends Controller{
    public function __construct()
    {
        $this->user_model = $this->model('User');
    }

	public function index(){
		$data = [
			'title' => 'Home page'
		];

		$this->view('index', $data);
	}

    public function login(){
		$data = [
			'username_error' => '',
			'password_error' => ''
		];
		$this->view('pages/login', $data);
	}

	public function register(){
		$this->view('pages/register');
	}

	public function forgot_password(){
		$this->view('pages/forgot.password');
	}

	public function change_password(){
		$this->view('pages/change.password');
	}
}