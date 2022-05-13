<!-- Dialog to edit user's profile -->
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
                                <form id="edit-profile" method="POST" action="">
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
                                                <input id="avatar" type="file" name="avatar" accept="image/*">
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