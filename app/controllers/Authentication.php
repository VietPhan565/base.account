<?php
session_start();
class Authentication extends Controller
{
	public function __construct()
	{
		$this->user_model = $this->model('User');
		$this->account_model = $this->model('Account');
	}

	public function index()
	{
		$data = [
			'title' => 'Home page'
		];

		$this->view('index', $data);
	}

	/**
	 * login
	 *
	 * @return void
	 */
	public function login()
	{
		$data = [
			'username' => '',
			'password' => '',
			'username_error' => '',
			'password_error' => ''
		];

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
				'username' => trim($_POST['username']),
				'password' => trim($_POST['password']),
				'username_error' => '',
				'password_error' => ''
			];

			//Validate username 
			if (empty($data['username'])) {
				$data['username_error'] = 'Tài khoản không được để trống';
			} elseif(!$this->account_model->checkUserExist($data['username'])){
				$data['username_error'] = 'Tài khoản không tồn tại';
			}

			if (empty($data['password'])) {
				$data['password_error'] = 'Mật khẩu không được để trống';
			}

			if (empty($data['username_error']) && empty($data['password_error'])) {
				$logged_in_user = $this->account_model->logIn($data['username'], $data['password']);
				if ($logged_in_user != null) {
					$this->createUserSession($logged_in_user);
					header('location: ' . URLROOT . '/information/userinfo');
				} else {
					$data['password_error'] = 'Thông tin không đúng, vui lòng nhập lại.';
					$this->view('authentication/login', $data);
				}
			}
		}

		$this->view('authentication/login', $data);
	}

	public function logout(){
		session_destroy();
		header('location: ' . URLROOT . '/authentication/login');
	}

	public function createUserSession($account)
	{
		session_start();
		$_SESSION['account_id'] = $account->account_id;
		$_SESSION['username'] = $account->username;
	}

}
