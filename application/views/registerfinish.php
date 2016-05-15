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
	<meta http-equiv="refresh" content="5;url=<?=base_url();?>"> 
	<?php include APPPATH.'views/header.php';?>
	<div class="blanktop"></div>
	<div class="register">
		<br><br><br>
		<center>
			<h3><?=$msg;?></h3>
			<h4>Redirecting ...</h4>
		</center>
		<br><br><br><br><br><br>
	</div>
	<script src="<?=base_url("js/register.js");?>"></script>
	<?php include APPPATH.'views/footer.php';?>