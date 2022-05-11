<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once APPROOT . '/config/config.php';
require_once APPROOT . '/plugins/PHPMailer/src/Exception.php';
require_once APPROOT . '/plugins/PHPMailer/src/PHPMailer.php';
require_once APPROOT . '/plugins/PHPMailer/src/SMTP.php';

class Password extends Controller
{
	// private $email;
	public function __construct()
	{
		// $this->email = $_SESSION['email'];
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
				$data['email_error'] = 'Email không đúng format';
			} elseif (!$this->user_model->findUserByEmail($data['email'])) {
				$data['email_error'] = 'Email không tồn tại';
			}

			if (empty($data['email_error'])) {
				$_SESSION['email'] = $data['email'];
				$mail = new PHPMailer();
				$check = true;
				try {
					$mail->isSMTP();
					$mail->Host = 'smtp.gmail.com';
					$mail->SMTPAuth = 'true';
					$mail->SMTPSecure = 'tls';
					$mail->Port = '587';
					$mail->Username = 'emailtestviet123@gmail.com';
					$mail->Password = 'viet123456789';
					$mail->CharSet = 'UTF-8';

					$mail->isHTML();
					$mail->Subject = "Đổi mật khẩu";
					$mail->setFrom('vietpthe150767@fpt.edu.vn');
					$mail->Body = 'Click vào link này để thay đổi mật khẩu của bạn: <a href="' . URLROOT . '/password/change_password">Đổi mật khẩu</a>
					';

					$mail->addAddress($data['email']);
					$check = $mail->send();
					$mail->smtpClose();
				} catch (Exception $e) {
					echo $e->getMessage();
				}

				if ($check) {
					header('Location: ' . URLROOT . '/authentication/login');
				}
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
		$data = [
			'password' => '',
			'confirm_password' => '',
			'password_error' => '',
			'confirm_pass_error' => ''
		];

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$email = $_SESSION['email'];
			$data = [
				'password' => $_POST['password'],
				'confirm_password' => $_POST['confirm_password'],
				'password_error' => '',
				'confirm_pass_error' => ''
			];

			if (empty($data['password'])) {
				$data['password_error'] = 'Mật khẩu không được để trống';
			} elseif (!preg_match(pass_validation, $data['password'])) {
				$data['password_error'] = 'Mật khẩu phải chứa 1 kí tự in hoa, in thường, số và phải có độ dài 8 kí tự';
			}

			if (empty($data['confirm_password'])) {
				$data['confirm_pass_error'] = 'Mật khẩu xác nhận không được để trống';
			} elseif (strcmp($data['password'], $data['confirm_password'])) {
				$data['confirm_pass_error'] = 'Mật khẩu không đồng nhất';
			}

			if (empty($data['password_error']) && empty($data['confirm_pass_error'])) {
				$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
				$user = $this->user_model->findUserByEmail($email);
				$account = $this->account_model->getAccountByID($user->account_id);
				if ($account) {
					if ($this->account_model->changePassword($account->account_id, $data['password'])) {
						unset($_SESSION['email']);
						header('Location: ' . URLROOT . '/authentication/login');
					} else {
						die('Something went wrong');
					}
				}
			}
		}
		$this->view('authentication/change.password', $data);
	}

	/**
	 * update_password
	 *
	 * @return void
	 */
	public function update_password()
	{
		$data = [
			'old_password' => '',
			'new_password' => '',
			'conf_new_password' => '',
			'old_pass_error' => '',
			'new_pass_error' => '',
			'conf_new_pass_error' => ''
		];

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$user = $_SESSION['username'];
			$data = [
				'old_password' => $_POST['old_password'],
				'new_password' => $_POST['new_password'],
				'conf_new_password' => $_POST['conf_new_password'],
				'old_pass_error' => '',
				'new_pass_error' => '',
				'conf_new_pass_error' => ''
			];
			$account = $this->account_model->getAccountByUser($user);

			// Validate old password input
			if (empty($data['old_password'])) {
				$data['old_pass_error'] = 'Xin hãy nhập mật khẩu hiện tại';
			} elseif (!password_verify($data['old_password'], $account->password)) {
				$data['old_pass_error'] = 'Sai mật khẩu hiện tại';
			}

			// Validate new password input
			if (empty($data['new_password'])) {
				$data['new_pass_error'] = 'Xin hãy nhập mật khẩu mới';
			} elseif (!preg_match(pass_validation, $data['new_password'])) {
				$data['new_pass_error'] = "Mật khẩu phải chứa ít nhất 8 kí tự, có ít nhất
				1 chữ cái in hoa và 1 số";
			}

			// Validate confirm new password input
			if (empty($data['conf_new_password'])) {
				$data['conf_new_password'] = 'Xin hãy nhập mật khẩu xác thực mới';
			} elseif (!(strcmp($data['new_password'], $data['conf_new_password']) == 0)) {
				$data['conf_new_pass_error'] = 'Mật khẩu xác thực và mật khẩu mới không trùng khớp';
			}

			// If no error, update password
			if (
				empty($data['old_pass_error']) && empty($data['new_pass_error'])
				&& empty($data['conf_new_pass_error'])
			) {
				$data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
				$this->account_model->changePassword($account->account_id, $data['new_password']);
			}

			// Send data to view
			$response = '';
			if (!empty($data['old_pass_error'])) {
				$response .= $data['old_pass_error'] . '<br/>';
			} elseif (!empty($data['new_pass_error'])) {
				$response .= $data['new_pass_error'] . '<br/>';
			} elseif (!empty($data['conf_new_pass_error'])) {
				$response .= $data['conf_new_pass_error'] . '<br/>';
			}

			die(json_encode([
				'success' => false,
				'msg' => $response
			]));
		}
	}
}
