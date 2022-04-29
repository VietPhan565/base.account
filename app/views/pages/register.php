<!DOCTYPE html>
<html lang="en">

<head>
	<?php require_once APPROOT . '/views/includes/head.php'; ?>
	<title>Register - <?php echo SITENAME; ?></title>
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/register.css" />
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
					<div class="form-register">
						<h1>Register</h1>
						<div class="sub-title">
							Sign up to have permission to access the system
						</div>
						<form class="form" action="<?php echo URLROOT; ?>/pages/register" method="POST">
							<div class="row">
								<div class="label">Username</div>
								<div class="input">
									<input type="text" name="username" placeholder="Enter username" />
								</div>
							</div>
							<div class="row">
								<div class="label">Password</div>
								<div class="input">
									<input type="password" name="password" placeholder="Your password" />
								</div>
							</div>
							<div class="row">
								<div class="label">Confirm Password</div>
								<div class="input">
									<input type="password" name="confirm_pass" placeholder="Your confirm password" />
								</div>
							</div>
							<div class="row">
								<div class="label">Email</div>
								<div class="input">
									<input type="email" name="email" placeholder="Enter email" />
								</div>
							</div>
							<div class="row">
								<div class="label">Phone number</div>
								<div class="input">
									<input type="tel" name="phone" placeholder="Enter phone number" />
								</div>
							</div>
							<div class="row relative">
								<button id="submit" type="submit" value="submit">Register</button>
								<div class="oauth">
									<div class="label">
										<span>Or, sign-up by: </span>
									</div>
									<a class="oauth-login left" href="#"> Sign up with Google </a>
									<a class="oauth-login right" href="#">
										Sign up with Microsoft
									</a>
								</div>
							</div>
						</form>
					</div>
					<div class="login">
						<div class="sign-in">
							<a class="logging-in" href="<?php echo URLROOT; ?>/pages/login">
								Already have an account, <strong>Sign in</strong> to access the system
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>