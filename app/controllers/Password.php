<?php
session_start();
class Password extends Controller
{
	public function __construct()
	{
		$this->user_model = $this->model('User');
		$this->account_model = $this->model('Account');
	}

	/**
	 * forgot_password
	 *
	 * @return void
	 */
	public function forgot_password()
	{
		$data = [
			'email' => '',
			'email_error' => ''
		];

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data = [
				'email' => trim($_POST['email']),
				'email_error' => ''
			];

			if (empty($data['email'])) {
				$data['email_error'] = 'Email không được để trống';
			} elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
				$data['email error'] = 'Email không đúng format';
			}

			if (empty($data['email_error'])) {
				echo __DIR__ . 'val';
			}
		}

		$this->view('authentication/forgot.password', $data);
	}

	/**
	 * change_password
	 *
	 * @return void
	 */
	public function change_password()
	{
		$this->view('authentication/change.password');
	}
}
