<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Tài khoản - <?php echo SITENAME; ?></title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:500,400,300,400italic,700,700italic,400italic,300italic&amp;subset=vietnamese,latin" />
	<link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/infomation.css" />
</head>

<body>
	<?php
	$user = $data['user'];
	?>
	<div id="base-panel">
		<div class="items">
			<div class="item">
				<div class="image">
					<div class="inner">
						<img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="User icon" />
					</div>
				</div>
			</div>

			<div class="item active">
				<div class="icon">
					<span class="material-symbols-outlined">
						account_circle_full
					</span>
				</div>
				<div class="info">
					Cá nhân
				</div>
			</div>

			<div class="item">
				<div class="icon">
					<span class="material-symbols-outlined">
						group
					</span>
				</div>
				<div class="info">
					Thành viên
				</div>
			</div>

			<div class="item">
				<div class="icon">
					<span class="material-symbols-outlined">
						account_tree
					</span>
				</div>
				<div class="info">
					Nhóm
				</div>
			</div>

			<div class="item">
				<div class="icon">
					<span class="material-symbols-outlined">
						change_history
					</span>
				</div>
				<div class="info">
					TK Khách
				</div>
			</div>
		</div>

		<div class="item item-baseapps">
			<div class="icon">
				<span class="material-symbols-outlined">
					bookmark
				</span>
			</div>
			<div class="info">
				Ứng dụng
			</div>
		</div>

		<div class="footer">
			<div class="item" onclick="LogOut()">
				<div class="icon">
					<span class="material-symbols-outlined">
						power_settings_new
					</span>
				</div>
				<div class="info">
					Đăng xuất
				</div>
			</div>
		</div>
	</div>

	<div id="document">
		<div id="master">
			<div id="pagew">
				<div id="page">
					<div id="menuw">
						<div id="menu">
							<div class="list items">
								<div class="top">
									<div class="userinfo">
										<div class="name"><?php echo $user->fullname; ?></div>
										<div class="info">@vietphan &nbsp;.&nbsp; <?php echo $user->email; ?></div>
									</div>
								</div>

								<div class="title">Thông tin tài khoản</div>
								<div class="box">
									<div class="li active">
										<div class="icon ">
											<span class="material-symbols-outlined">
												settings
											</span>
										</div>

										<div class="text">
											Tài khoản
										</div>
									</div>

									<div class="li">
										<div class="icon">
											<span class="material-symbols-outlined">
												edit
											</span>
										</div>

										<div class="text">
											Chỉnh sửa
										</div>
									</div>

									<div class="li">
										<div class="icon">
											<span class="material-symbols-outlined">
												language
											</span>
										</div>

										<div class="text">
											Ngôn ngữ
										</div>
									</div>

									<div class="li">
										<div class="icon">
											<span class="material-symbols-outlined">
												error
											</span>
										</div>

										<div class="text">
											Đổi mật khẩu
										</div>
									</div>

									<div class="li">
										<div class="icon">
											<span class="material-symbols-outlined">
												palette
											</span>
										</div>

										<div class="text">
											Đổi màu hiển thị
										</div>
									</div>

									<div class="li">
										<div class="icon">
											<span class="material-symbols-outlined">
												timelapse
											</span>
										</div>

										<div class="text">
											Lịch làm việc
										</div>
									</div>

									<div class="li">
										<div class="icon">
											<span class="material-symbols-outlined">
												security
											</span>
										</div>

										<div class="text">
											Bảo mật hai lớp
										</div>
									</div>
								</div>

								<div class="title">Ứng dụng - Bảo mật</div>
								<div class="box">

								</div>

								<div class="title">Tùy chỉnh nâng cao</div>
								<div class="box">
									<div class="li">
										<div class="icon">
											<span class="material-symbols-outlined">
												history
											</span>
										</div>

										<div class="text">
											Lịch sử đăng nhập
										</div>
									</div>

									<div class="li">
										<div class="icon">
											<span class="material-symbols-outlined">
												desktop_windows
											</span>
										</div>

										<div class="text">
											Quản lý thiết bị
										</div>
									</div>

									<div class="li">
										<div class="icon">
											<span class="material-symbols-outlined">
												mail
											</span>
										</div>

										<div class="text">
											Tùy chỉnh email thông báo
										</div>
									</div>

									<div class="li">
										<div class="icon">
											<span class="material-symbols-outlined">
												av_timer
											</span>
										</div>

										<div class="text">
											Chỉnh sửa múi giờ
										</div>
									</div>

									<div class="li">
										<div class="icon">
											<span class="material-symbols-outlined">
												account_tree
											</span>
										</div>

										<div class="text">
											Ủy quyền tạm thời
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div id="page-main">
						<div class="apptitle" id="appheader">
							<a href="#" class="cta url">Chỉnh sửa tài khoản</a>
							<div class="back url">
								<div class="label">Tài khoản <?php echo $_SESSION['username']; ?></div>
								<div class="title"><?php echo $user->fullname; ?> . <?php echo $user->position ?></div>
							</div>
						</div>
						<div id="profile">
							<div class="main">
								<div class="image uploadable">
									<?php
									if (!empty($user->avatar)) {
									?>
										<img src="<?php echo $user->avatar; ?>">
									<?php
									} else {
									?>
										<img src="https://i.pinimg.com/originals/0c/3b/3a/0c3b3adb1a7530892e55ef36d3be6cb8.png">
									<?php
									}
									?>
								</div>

								<div class="text">
									<div class="title"><?php echo $user->fullname; ?></div>
									<div class="subtitle"><?php echo $user->position; ?></div>
									<div class="info"><b>Địa chỉ email</b><?php echo $user->email ?></div>
									<div class="info"><b>Số điện thoại</b><?php echo $user->phone ?></div>
									<div class="info" style="display:none;"></div>
								</div>
							</div>
							<div class="list">
								<div class="title">Thông tin liên hệ</div>
								<div class="contact-info"><b>Địa chỉ</b><span><?php echo $user->address; ?></span></div>
							</div>

							<div class="list">
								<div class="title">Nhóm (0)</div>
								<div class="item url"></div>
							</div>

							<div class="list">
								<div class="title">Nhân viên trực tiếp (0)</div>
								<div class="js-items"></div>
							</div>

							<div class="list">
								<div class="title">
									Học vấn
									<div class="add">
										<span class="icon">

										</span>
									</div>
								</div>
								<div class="item-none">Không có thông tin</div>
							</div>

							<div class="list">
								<div class="title">
									Kinh nghiệm làm việc
									<div class="add">
										<span class="icon">

										</span>
									</div>
								</div>
								<div class="item-none">Không có thông tin</div>
							</div>

							<div class="list">
								<div class="title">
									Giải thưởng & thành tích
									<div class="add">
										<span class="icon">

										</span>
									</div>
								</div>
								<div class="item-none">Không có thông tin</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		function LogOut() {
			window.location = '<?php echo URLROOT . '/authentication/logout'; ?>'
		}
	</script>
</body>

</html>