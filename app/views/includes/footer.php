<!-- Dialog for error message -->
<div id="appdialog">
		<div class="dialog-top">
			<div class="dialog" style="top: 33%;left: 40%">
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
												Invalid email
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="dialog-button">
							<div class="button alert-button">OK</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>

<!-- Dialog for success message -->
<div id="dialog-success">
		<div class="dialog-top">
			<div class="dialog" style="top: 33%;left: 40%">
				<div class="dialog-inner">
					<div class="dialog-main">
						<div class="dialog-close">
							<span class="icon-close"></span>
						</div>
						<div class="dialog-content">
							<div id="success" class="errdialog">
								<table>
									<tbody>
										<tr>
											<td id="icon-changed" class="icon">
												<span class="icon-help-circle" style="color:#666;"></span>
											</td>
											<td class="msg-success">
												Invalid email
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="dialog-button" id="button-click">
							<div class="button alert-button">OK</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="module" src="<?php echo URLROOT; ?>/public/js/script.js"></script>