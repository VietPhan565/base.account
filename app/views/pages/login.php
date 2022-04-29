<!DOCTYPE html>
<html lang="en">

<head>
	<?php require_once APPROOT . '/views/includes/head.php'; ?>
	<title>Login - <?php echo SITENAME; ?></title>
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/login.css">
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
					<div class="form-login">
						<h1>Login</h1>
						<div class="sub-title">Welcome back. Login to start working.</div>
						<form class="form" action="<?php echo URLROOT; ?>/pages/login" method="POST">
							<div class="row">
								<div class="label">Username</div>
								<div class="input">
									<input type="text" name="username" placeholder="Your username" />
								</div>
								<div class="err">
									<span class="invalid_res">
										<?php echo $data['username_error']; ?>
									</span>
								</div>
							</div>
							<div class="row">
								<div class="label">
									<span class="forgot-pass" onclick="forgotPassword()">Forget your password?</span>
									Password
								</div>
								<div class="input">
									<input type="password" name="password" placeholder="Your password" />
								</div>
								<div class="err">
									<span class="invalid_res">
										<?php echo $data['password_error']; ?>
									</span>
								</div>
							</div>
							<div class="row">
								<input type="hidden" />
							</div>
							<div class="row">
								<input type="hidden" />
							</div>
							<div class="row relative">
								<div class="checkbox">
									<input type="checkbox" name="checkbox" />&nbsp;Keep me
									logged in
								</div>
								<button id="submit" type="submit" value="submit">Login to start working</button>
								<div class="oauth">
									<div class="label">
										<span>Or, login via single sign-on</span>
									</div>
									<a class="oauth-login left" href="#"> Login with Google </a>
									<a class="oauth-login left" href="#">
										Login with Microsoft
									</a>
									<a class="oauth-login right" href="#"> Login with SAML </a>
								</div>
							</div>
						</form>
					</div>
					<div class="register">
						<div class="sign-up">
							<a class="new-acc" href="<?php echo URLROOT; ?>/pages/register">
								Don't have an account, <strong>Sign up</strong> to login
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		function forgotPassword() {
			window.location = '<?php echo URLROOT; ?>/pages/forgot_password';
		}
	</script>
	<!-- <script src="<?php echo URLROOT; ?>/public/js/login.js>"></script> -->
</body>

</html>