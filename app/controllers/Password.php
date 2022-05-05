<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once APPROOT . '/config/config.php';
require_once APPROOT . '/plugins/PHPMailer/src/Exception.php';
require_once APPROOT . '/plugins/PHPMailer/src/PHPMailer.php';
require_once APPROOT . '/plugins/PHPMailer/src/SMTP.php';

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
				$data['email_error'] = 'Email không đúng format';
			} elseif (!$this->user_model->findUserByEmail($data['email'])) {
				$data['email_error'] = 'Email không tồn tại';
			}

			if (empty($data['email_error'])) {
				$mail = new PHPMailer();
				try {
					$mail->isSMTP();
					$mail->Host = 'smtp.gmail.com';
					$mail->SMTPAuth = 'true';
					$mail->SMTPSecure = 'tls';
					$mail->Port = '587';
					$mail->Username = 'vietpthe150767@fpt.edu.vn';
					$mail->Password = 'muadonglanh123';
					$mail->CharSet = 'UTF-8';

					$mail->isHTML();
					$mail->Subject = "Đổi mật khẩu";
					$mail->setFrom('vietpthe150767@fpt.edu.vn');
					$mail->Body = 'Click vào link này để thay đổi mật khẩu của bạn: <a href="http://localhost/base.account/password/change_password">Đổi mật khẩu</a>
					';

					$mail->addAddress($data['email']);
					$mail->send();
					$mail->smtpClose();
					echo "Success";
				} catch (Exception $e) {
					echo $e->getMessage();
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
			'email' => ''
		];
		$this->view('authentication/change.password', $data);
	}
}
