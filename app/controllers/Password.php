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
		$this->reset_pass_model = $this->model('ResetPassword');
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
			$check = true;
			$response = '';
			if (empty($data['email'])) {
				$data['email_error'] = 'Email không được để trống';
			} elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
				$data['email_error'] = 'Email không đúng format';
			} elseif (!$this->user_model->findUserByEmail($data['email'])) {
				$data['email_error'] = 'Email không tồn tại';
			}

			if (empty($data['email_error'])) {

				//Query user from the db
				$selector = bin2hex(random_bytes(8));

				//Confirm once the db entry has been matched
				$token = random_bytes(32);

				$url = URLROOT . '/password/change_password?selector=' . $selector . '&validator=' . bin2hex($token);

				$expires = date('U') + 1800;
				if (!$this->reset_pass_model->deleteResetEmail($data['email'])) {
					die('Oops, có lỗi gì đó ở đây');
				}

				$hashed_token = password_hash($token, PASSWORD_DEFAULT);

				if (!$this->reset_pass_model->insertToken($data['email'], $selector, $hashed_token, $expires)) {
					die('Oops, có lỗi gì đó ở đây');
				}

				$subject = 'Thay đổi mật khẩu của bạn';
				$message = '<p>Chúng tôi nhận được yêu cầu thay đổi mật khẩu của bạn</p>';
				$message .= '<p>Click vào link này để thay đổi mật khẩu mới: <a href=\'' . $url . '\'>Đổi mật khẩu</a></p>';

				$mail = new PHPMailer();
				try {
					$mail->isSMTP();
					$mail->Host = 'smtp.gmail.com';
					$mail->SMTPAuth = 'true';
					$mail->SMTPSecure = 'tls';
					$mail->Port = '587';
					$mail->Username = 'vietpthe150767@fpt.edu.vn';
					$mail->Password = 'Viet07062001';
					$mail->CharSet = 'UTF-8';

					$mail->isHTML();
					$mail->Subject = $subject;
					$mail->setFrom('vietpthe150767@fpt.edu.vn');
					$mail->Body = $message;

					$mail->addAddress($data['email']);
					$check = $mail->send();
					$mail->smtpClose();
				} catch (Exception $e) {
					echo $e->getMessage();
				}
			} else {
				$response .= $data['email_error'] . '<br/>';
			}

			die(json_encode([
				'check' => $check,
				'msg' => $response
			]));
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
			'selector' => '',
			'validator' => '',
			'password' => '',
			'confirm_password' => '',
			'password_error' => '',
			'confirm_pass_error' => '',
			'error' => ''
		];

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data = [
				'selector' => trim($_POST['selector']),
				'validator' => trim($_POST['validator']),
				'password' => trim($_POST['password']),
				'confirm_password' => trim($_POST['confirm_password']),
				'password_error' => '',
				'confirm_pass_error' => '',
				'error' => ''
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
				$current_date = date('U');

				$row = $this->reset_pass_model->checkExpire($data['selector'], $current_date);
				if (!$row) {
					$data['error'] = 'Xin lỗi, đường dẫn đã hết hiệu lực.';
				} else {
					$token_bin = hex2bin($data['validator']);
					$token_check = password_verify($token_bin, $row->reset_token);

					if (!$token_check) {
						$data['error'] = 'Bạn cần gửi lại yêu cầu đổi mật khẩu.';
					} else {
						$token_email = $row->reset_email;
						$user_row = $this->user_model->findUserByEmail($token_email);
						if (!$user_row) {
							$data['error'] = 'Có lỗi đã xảy ra';
						} else {
							$account = $this->account_model->getAccountByID($user_row->account_id);
							$pass_hash = password_hash($data['password'], PASSWORD_DEFAULT);
							$id = $account->account_id;
							if (!$this->account_model->changePassword($id, $pass_hash)) {
								$data['error'] = 'Có lỗi đã xảy ra';
							}
							if (!$this->reset_pass_model->deleteResetEmail($token_email)) {
								$data['error'] = 'Có lỗi đã xảy ra';
							}
						}
					}
				}
			}
			$response_data_err = '';
			$response_page_err = '';
			if (!empty($data['password_error'])) {
				$response_data_err .= $data['password_error'] . '<br/>';
			} elseif (!empty($data['confirm_pass_error'])) {
				$response_data_err .= $data['confirm_pass_error'] . '<br/>';
			}

			if (!empty($data['error'])) {
				$response_page_err .= $data['error'] . '<br/>';
			}

			die(json_encode([
				'data_err' => $response_data_err,
				'page_err' => $response_page_err,
			]));
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
