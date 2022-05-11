<!DOCTYPE html>
<html lang="en">

<head>
	<?php require_once APPROOT . '/views/includes/head.php'; ?>
	<title>Forgot Password - <?php echo SITENAME; ?></title>
	<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/forgot.password.css" />
</head>

<body>
	<div id="master">
		<div id="page">
			<div class="auth">
				<div class="box-wrap">
					<div class="logo-base">
						<a href="https://base.vn">
							<img src="https://share-gcdn.basecdn.net/brand/logo.full.png" alt="Logo base" />
						</a>
					</div>
					<div class="form-forgot-pass">
						<h1>Password Recovery</h1>
						<div class="sub-title">
							Please enter your information. A password recovery hint will be
							sent to your email.
						</div>

						<form class="forgot-password" action="<?php echo URLROOT; ?>/password/forgot_password" method="POST">
							<div class="row">
								<div class="label">Email*</div>
								<div class="input">
									<input type="email" name="email" placeholder="Your email" />
								</div>
								<!-- <div class="err">
									<span class="input_err">
										<?php echo $data['email_error']; ?>
									</span>
								</div> -->
							</div>
							<div class="row relative">
								<button id="submit" type="submit" value="submit">Recover Password</button>
							</div>

							<div class="sub-title2">
								Email will be sent via
								<a href="https://sendgrid.com"> SendGrid </a>. Click to select
								another sender.
							</div>
						</form>
					</div>
					<div class="extra">
						<div class="login">
							<a href="<?php echo URLROOT; ?>/authentication/login">Login now</a> if your company was
							already on <strong>Base Account</strong>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require_once APPROOT . '/views/includes/footer.php'; ?>

	<script src="<?php echo URLROOT; ?>/public/js/login.js"></script>
</body>

</html>