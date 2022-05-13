<!-- Dialog for change user's password -->
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