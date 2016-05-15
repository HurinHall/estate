<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<link rel="stylesheet" type="text/css" href="<?=base_url("css/jquery-ui.css");?>">
	<?php include APPPATH.'views/header.php';?>
	<div class="blanktop"></div>
	<div class="register">
		<center>
			<h3>Register</h3>
		</center>
		<?php echo validation_errors(); ?>
		<?php echo form_open('/register'); ?>
			<br>
			<div class="row form-group">
				<div class="col-sm-4 col-md-4"><label for="email">Email</label></div>
				<div class="col-sm-8 col-md-8"><input type="email" class="form-control" name="email" id="email" value="<?php echo set_value('email'); ?>" maxlength="50" placeholder="Email" /></div>
			</div>
			<div class="row form-group">
				<div class="col-sm-4 col-md-4"><label for="password">Password</label></div>
				<div class="col-sm-8 col-md-8"><input type="password" class="form-control" name="password" id="password" value="<?php echo set_value('password'); ?>" maxlength="50" placeholder="Password" /></div>
			</div>
			<div class="row form-group">
				<div class="col-sm-4 col-md-4"><label for="cpassword">Confirm Password</label></div>
				<div class="col-sm-8 col-md-8"><input type="password" class="form-control" name="cpassword" id="cpassword" value="<?php echo set_value('cpassword'); ?>" maxlength="50" placeholder="Password" /></div>
			</div>
			<div class="row form-group">
				<div class="col-sm-4 col-md-4"><label for="username">Username</label></div>
				<div class="col-sm-8 col-md-8"><input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username'); ?>" maxlength="50" placeholder="Username" /></div>
			</div>
			<div class="row form-group">
				<div class="col-sm-4 col-md-4"><label for="phone">Phone</label></div>
				<div class="col-sm-8 col-md-8">
					<table style="width:100%;">
						<tr>
							<td>
								<select class="form-control" name="country_code">
									<?
										for($i = 0; $i < sizeof($countryCode); $i++){
									?>
										<option value="<?=$countryCode[$i];?>"><?=$countryCode[$i];?></option>
									<? } ?>
								</select>
							</td>
							<td><input type="text" class="form-control" name="phone" id="phone" value="<?php echo set_value('phone'); ?>" maxlength="20" placeholder="Phone" /></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-sm-4 col-md-4"><label for="nationality">Nationality</label></div>
				<div class="col-sm-8 col-md-8">
					<select class="form-control" name="nationality" id="nationality">
						<?	
							for($i = 0; $i < sizeof($nationalityList); $i++){
						?>
							<option value="<?=$nationalityList[$i];?>"><?=$nationalityList[$i];?></option>
						<? } ?>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-sm-4 col-md-4"><label>Birthday</label></div>
				<div class="col-sm-8 col-md-8">
					<input type="text" class="form-control" id="datepicker" name="birth" value="<?php echo set_value('birth'); ?>" />
				</div>
			</div>
			<div class="row form-group">
				<div class="col-sm-4 col-md-4"><label for="location">Location</label></div>
				<div class="col-sm-8 col-md-8">
					<select class="form-control" name="country" id="country" onchange="changeCountry(this.value);">
						<?	
							for($i = 0; $i < sizeof($countryList); $i++){
						?>
							<option value="<?=$countryList[$i];?>"><?=$countryList[$i];?></option>
						<? } ?>
					</select>
					<select class="form-control" name="city" id="city" onchange="changeCity($('select#country').val(),this.value);">
						<?	
							for($i = 0; $i < sizeof($cityList); $i++){
						?>
							<option value="<?=$cityList[$i];?>"><?=$cityList[$i];?></option>
						<? } ?>
					</select>
					<select class="form-control" name="county" id="county">
						<?	
							for($i = 0; $i < sizeof($districtsList); $i++){
						?>
							<option value="<?=$districtsList[$i];?>"><?=$districtsList[$i];?></option>
						<? } ?>
					</select>
				</div>
			</div>
			<center>
				<button type="submit" class="btn btn-primary">Register</button>
			</center>
			<br>
		</form>
	</div>
	<script src="<?=base_url("js/register.js");?>"></script>
	<script src="<?=base_url("js/jquery-ui.js");?>"></script>
	<script type="text/javascript">
		$( "#datepicker" ).datepicker();
	</script>
	<?php include APPPATH.'views/footer.php';?>