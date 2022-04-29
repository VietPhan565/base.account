<!DOCTYPE html>
<html lang="en">

<head>
	<?php require_once APPROOT . '/views/includes/head.php' ?>
	<title>Reset Password - <?php echo SITENAME; ?></title>
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/change.password.css" />
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
					<form class="form-change-pass" action="<?php echo URLROOT; ?>/pages/change_password" method="POST">
						<h1>Account password recovery</h1>
						<div class="change-password">
							<div class="row">
								<div class="label">New password</div>
								<div class="input">
									<input type="password" name="password" placeholder="Your new password" />
								</div>
							</div>

							<div class="row">
								<div class="label">Confirm password</div>
								<div class="input">
									<input type="password" name="confirm_password" placeholder="Your confirm password" />
								</div>
							</div>
							<div class="row relative">
								<button id="submit" type="submit" value="submit">Reset Password</button>
							</div>
						</div>
					</form>
					<div class="extra">
						<div class="login">
							<a href="<?php echo URLROOT; ?>/pages/login">Login now</a> if your company was
							already on <strong>Base Account</strong>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>