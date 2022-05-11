<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Tài khoản - <?php echo SITENAME; ?></title>
	<link rel="shortcut icon" href="https://share-gcdn.basecdn.net/apps/account.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:500,400,300,400italic,700,700italic,400italic,300italic&amp;subset=vietnamese,latin" />
	<link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/infomation.css" />
</head>

<body>
	<?php
	$user = $data['user'];
	$account = $data['account'];
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
			<div class="item" id="item-logout">
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
										<?php
										if (empty($user->fullname)) {
										?>
											<div class="name">&nbsp;</div>
										<?php
										} else {
										?>
											<div class="name"><?php echo $user->fullname; ?></div>
										<?php
										}
										?>
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

									<div id="edit-account" class="li">
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

									<div id="div-changepass" class="li">
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
							<div id="edit-user-info" class="cta url">Chỉnh sửa tài khoản</div>
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
									<?php
									if (empty($user->fullname)) {
									?>
										<div class="title">Chưa nhập họ tên</div>
									<?php
									} else {
									?>
										<div class="title"><?php echo $user->fullname; ?></div>
									<?php
									}
									?>
									<?php
									if (empty($user->position)) {
									?>
										<div class="subtitle">Chưa nhập chức danh</div>
									<?php
									} else {
									?>
										<div class="subtitle"><?php echo $user->position; ?></div>
									<?php
									}
									?>
									<div class="info"><b>Địa chỉ email</b><?php echo $user->email ?></div>
									<?php
									if (!empty($user->phone)) {
									?>
										<div class="info"><b>Số điện thoại</b><?php echo $user->phone ?></div>
									<?php
									} else {
									?>
										<div class="info"><b>Số điện thoại</b>Chưa nhập số điện thoại</div>
									<?php
									}
									?>
									<div class="info" style="display:none;"></div>
								</div>
							</div>
							<?php
							if (!empty($user->address)) {
							?>
								<div class="list">
									<div class="title">Thông tin liên hệ</div>
									<div class="contact-info"><b>Địa chỉ</b><span><?php echo $user->address; ?></span></div>
								</div>
							<?php
							}
							?>

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

	<div id="dialog" style="width:100%;display:none;">
		<div class="info-dialog">
			<div class="fdialogwrapper scroll-y">
				<div class="dialogwrapper" style="top:10%;left:30%">
					<div class="dialogwrapper-inner">
						<div class="dialogmain">
							<div class="dialogtitle">
								<div class="title relative">Chỉnh sửa thông tin cá nhân</div>
								<div class="clear"></div>
							</div>
							<div class="dialogclose">
								<span class="icon-close"></span>
							</div>
							<div class="dialogcontent">
								<div id="edit" class="appdialogedit" style="width:720px;">
									<form id="edit-profile" method="POST" action="" >
										<div class="form-rows">
											<div class="row">
												<div class="label">
													Họ tên của bạn
													<div class="sublabel">Họ tên của bạn</div>
												</div>
												<div class="input data">
													<input type="text" name="fullname" placeholder="Họ tên của bạn" autocomplete="off" value="<?php echo $user->fullname; ?>">
												</div>
												<div class="clear"></div>
											</div>

											<div class="row">
												<div class="label">
													Email
													<div class="sublabel">Email của bạn</div>
												</div>
												<div class="input data">
													<input id="email" type="text" name="email" placeholder="<?php echo $user->email; ?>" disabled>
												</div>
												<div class="clear"></div>
											</div>

											<div class="row">
												<div class="label">
													Username
													<div class="sublabel">Username của bạn</div>
												</div>
												<div class="input data">
													<input disabled type="text" name="username" placeholder="<?php echo $account->username; ?>">
												</div>
												<div class="clear"></div>
											</div>

											<div class="row">
												<div class="label">
													Vị trí công việc
													<div class="sublabel">Vị trí công việc</div>
												</div>
												<div class="input data">
													<input id="position" type="text" name="position" placeholder="Vị trí công việc" value="<?php echo $user->position; ?>">
												</div>
												<div class="clear"></div>
											</div>

											<div class="row">
												<div class="label">
													Ảnh đại diện
													<div class="sublabel">Ảnh đại diện</div>
												</div>
												<div class="input data">
													<input id="avatar" type="file" name="image">
												</div>
												<div class="clear"></div>
											</div>
											<?php
											$date = $user->dob;
											$date = explode('-', $date);
											$year = $date[0];
											$month = $date[1];
											$day = $date[2];

											$date_now = date('Y') - 10;
											?>
											<div class="row">
												<div class="label">
													Ngày tháng năm sinh
													<div class="sublabel">Ngày tháng năm sinh</div>
												</div>
												<div class="input data">
													<div class="gi" style="width:33.33%;">
														<div class="select-data">
															<select name="dob_day" id="dob_day">
																<option value="0" <?php echo ($day == 0 ? 'selected' : ''); ?>>-- Chọn ngày --</option>
																<?php
																for ($i = 1; $i <= 31; $i++) {
																?>
																	<option value="<?php echo $i; ?>" <?php echo ($i == $day ? 'selected' : ''); ?>><?php echo $i ?></option>
																<?php
																}
																?>
															</select>
														</div>
													</div>
													<div class="gi" style="width:33.33%;">
														<div class="select-data">
															<select name="dob_month" id="dob_month">
																<option value="0" <?php echo ($month == 0 ? 'selected' : ''); ?>>-- Chọn tháng --</option>
																<?php
																for ($i = 1; $i <= 12; $i++) {
																?>
																	<option value="<?php echo $i; ?>" <?php echo ($i == $month ? 'selected' : ''); ?>><?php echo $i; ?></option>
																<?php
																}
																?>
															</select>
														</div>
													</div>

													<div class="gi" style="width:33.33%;">
														<div class="select-data">
															<select name="dob_year" id="dob_year">
																<option value="0" <?php echo ($year == 0 ? 'selected' : ''); ?>>-- Chọn năm --</option>
																<?php
																for ($i = $date_now; $i >= 1930; $i--) {
																?>
																	<option value="<?php echo $i; ?>" <?php echo ($i == $year ? 'selected' : ''); ?>><?php echo $i; ?></option>
																<?php
																}
																?>
															</select>
														</div>
													</div>
												</div>
												<div class="clear"></div>
											</div>

											<div class="row">
												<div class="label">
													Số điện thoại
													<div class="sublabel">Số điện thoại</div>
												</div>
												<div class="input data">
													<input id="phone" type="text" name="phone" placeholder="Số điện thoại" value="<?php echo $user->phone; ?>">
												</div>
												<div class="clear"></div>
											</div>

											<div class="row">
												<div class="label">
													Chỗ ở hiện nay
													<div class="sublabel">Chỗ ở hiện nay</div>
												</div>
												<div class="input data">
													<textarea name="address" id="address" placeholder="Chỗ ở hiện nay" style="overflow: hidden;overflow-wrap: break-word; height: 50px;"><?php echo $user->address; ?></textarea>
												</div>
												<div class="clear"></div>
											</div>
										</div>
										<div class="form-buttons">
											<div id="update-user-profile" class="button ok -success">Cập nhật</div>
											<div class="button cancel -secondary">Bỏ qua</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="appdialog">
		<div class="dialog-top">
			<div class="dialog-error" style="top: 33%;left: 40%">
				<div class="dialog-inner">
					<div class="dialog-main">
						<div class="dialog-close">
							<span class="icon-close"></span>
						</div>
						<div class="dialog-content">
							<div id="alert" class="errdialog">
								<table>
									<tbody>
										<tr>
											<td id="icon-change" class="icon">
												<span class="icon-help-circle" style="color:#666;"></span>
											</td>
											<td class="err-message">
												Bạn có muốn đăng xuất khỏi hệ thống ngay bây giờ?
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="dialog-button">
							<div class="button er confirm-button">Close</div>
							<div class="button ss confirm-button">OK</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="appdialog-error">
		<div class="dialog-top">
			<div class="dialog-error" style="top: 33%;left: 40%">
				<div class="dialog-inner">
					<div class="dialog-main">
						<div class="dialog-close">
							<span class="icon-close"></span>
						</div>
						<div class="dialog-content">
							<div id="alert" class="errdialog">
								<table>
									<tbody>
										<tr>
											<td id="icon-change" class="icon">
												<span class="icon-help-circle" style="color:#666;"></span>
											</td>
											<td class="err-message">
												Bạn có muốn đăng xuất khỏi hệ thống ngay bây giờ?
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="dialog-button">
							<div class="submit">OK</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="changepass" style="display: none;">
		<div class="info-dialog">
			<div class="fdialogwrapper scroll-y">
				<div class="dialogwrapper" style="top:10%;left:30%">
					<div class="dialogwrapper-inner">
						<div class="dialogmain">
							<div class="dialogtitle">
								<div class="title relative">Đổi mật khẩu</div>
								<div class="clear"></div>
							</div>
							<div class="dialogclose">
								<span class="icon-close"></span>
							</div>
							<div class="dialogcontent">
								<div id="change-pass" class="appdialogedit" style="width:720px;">
									<form action="" method="post" id="change-password">
										<div class="form-rows">
											<div class="row">
												<div class="label">
													Mật khẩu hiện tại
													<div class="sublabel">Mật khẩu hiện tại</div>
												</div>
												<div class="input data">
													<input id="old_password" type="password" name="old_password" placeholder="Mật khẩu hiện tại" autocomplete="off">
												</div>
												<div class="clear"></div>
											</div>

											<div class="row">
												<div class="label">
													Mật khẩu mới
													<div class="sublabel">Mật khẩu mới</div>
												</div>
												<div class="input data">
													<input id="new_password" type="password" name="new_password" placeholder="Mật khẩu mới" autocomplete="off">
												</div>
												<div class="clear"></div>
											</div>

											<div class="row">
												<div class="label">
													Nhập lại mật khẩu mới
													<div class="sublabel">Nhập lại mật khẩu mới</div>
												</div>
												<div class="input data">
													<input id="conf_new_password" type="password" name="conf_new_password" placeholder="Nhập lại mật khẩu mới" autocomplete="off">
												</div>
												<div class="clear"></div>
											</div>

											<div class="row">
												<div class="label">
													Force logout
													<div class="sublabel">Tự động logout từ tất cả thiết bị</div>
												</div>
												<div class="input data">
													<div class="gi" style="width: 100%;">
														<div class="select-data">
															<select name="force-logout" id="force-logout">
																<option value="0">Không</option>
																<option value="1" selected>Có</option>
															</select>
														</div>
													</div>
												</div>
												<div class="clear"></div>
											</div>

											<div class="row note">
												Thay đổi mật khẩu có thể bắt buộc yêu cầu bạn phải đăng nhập lại trên tất cả các thiết bị mobiles
											</div>
										</div>
										<div class="form-buttons">
											<div id="update-new-pass" class="button ok -success">Cập nhật</div>
											<div class="button cancel -secondary">Bỏ qua</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="module" src="<?php echo URLROOT; ?>/public/js/information.js"></script>
</body>

</html>