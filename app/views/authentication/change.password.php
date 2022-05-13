<!DOCTYPE html>
<html lang="en">

<head>
	<?php require_once APPROOT . '/views/includes/head.php' ?>
	<title>Reset Password - <?php echo SITENAME; ?></title>
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/change.password.css" />
</head>

<body>
	<?php
	if (empty($_GET['selector']) || empty($_GET['validator'])) {
		echo 'Không thể xử lý yêu cầu của bạn';
	} else {
		$selector = $_GET['selector'];
		$validator = $_GET['validator'];
		if (ctype_xdigit($selector) && ctype_xdigit($validator)) {
	?>
	<!-- Form change password - Forgot Password -->
			<div id="master">
				<div id="page">
					<div class="auth">
						<div class="box-wrap">
							<div class="logo-base">
								<a href="https://base.vn">
									<img src="https://share-gcdn.basecdn.net/brand/logo.full.png" alt="Logo base" />
								</a>
							</div>
							<form class="form-change-pass" action="" method="POST">
								<h1>Account password recovery</h1>
								<div class="change-password">
									<div class="row">
										<div class="label">New password</div>
										<div class="input">
											<input type="password" id="password" name="password" placeholder="Your new password" />
											<span toggle="#password" class="toggle-password">

											</span>
										</div>
									</div>

									<div class="row">
										<div class="label">Confirm password</div>
										<div class="input">
											<input type="password" id="confirm_password" name="confirm_password" placeholder="Your confirm password" />
											<span toggle="#confirm_password" class="toggle-password">

											</span>
										</div>
									</div>
									<div class="row relative">
										<button id="submit" type="submit" value="submit">Reset Password</button>
									</div>
								</div>
							</form>
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

			<script type="module" src="<?php echo URLROOT; ?>/public/js/change.password.js"></script>
	<?php
		} else {
			echo 'Không thể xử lý yêu cầu của bạn';
		}
	}
	?>
</body>

</html>