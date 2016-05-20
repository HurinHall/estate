<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rental</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<?php include APPPATH.'views/header.php';?>
	<link rel="stylesheet" type="text/css" href="<?=base_url("css/bootstrap-multiselect.css");?>"/>
	<div class="blanktop"></div>
	<center>
		<h3>Rental Property</h3>
	</center>
	<div class="container">
		<br><br><br>
		<center>
			<h4><?=$detail['title'];?></h4>
			<span>Last update: <?=$detail['date'];?></span>
		</center>
		<br><br>
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-info" style="min-height:300px;">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-3"><label>Address</label></div>
							<div class="col-xs-9"><?=$detail['address'];?></div>
						</div>
						<div class="row">
							<div class="col-xs-3"><label>Suburbs</label></div>
							<div class="col-xs-9"><?=$detail['suburbs'];?></div>
						</div>
						<div class="row">
							<div class="col-xs-3"><label>Districts</label></div>
							<div class="col-xs-9"><?=$detail['districts'];?></div>
						</div>
						<div class="row">
							<div class="col-xs-3"><label>City</label></div>
							<div class="col-xs-9"><?=$detail['city'];?></div>
						</div>
						<div class="row">
							<div class="col-xs-3"><label>Type</label></div>
							<div class="col-xs-9"><?=$detail['type'];?></div>
						</div>
						<div class="row">
							<div class="col-xs-3"><label>Rent</label></div>
							<div class="col-xs-9"><? if($detail['entire']==1){echo "Entire";}else{echo "Partial";}?></div>
						</div>
						<div class="row">
							<div class="col-xs-3"><label>Price</label></div>
							<div class="col-xs-9 text-success"><i class="fa fa-usd" aria-hidden="true"></i> <?=$detail['price'];?> per week</div>
						</div>
						<div class="row">
							<div class="col-xs-3"><label>Available</label></div>
							<div class="col-xs-9 text-danger"><i><?=$detail['available'];?></i></div>
						</div>
						<div class="row">
							<div class="col-xs-3"><label>Phone</label></div>
							<div class="col-xs-9"><?=$detail['phone'];?></div>
						</div>
						<div class="row">
							<div class="col-xs-3"><label>Email</label></div>
							<div class="col-xs-9"><?=$detail['email'];?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-success" style="min-height:300px;">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-4"><img src="<?=base_url('img/icons/bed-icon.png');?>">&nbsp;&nbsp;<?=$detail['bedroom'];?></div>
							<div class="col-xs-4"><img src="<?=base_url('img/icons/bath-icon.png');?>">&nbsp;&nbsp;<?=$detail['bathroom'];?></div>
							<div class="col-xs-4"><img src="<?=base_url('img/icons/parking-icon.png');?>">&nbsp;&nbsp;<?=$detail['parking'];?></div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-4 col-xs-6"><p><span class="<? if($detail['kitchen']==1){echo "glyphicon glyphicon-ok text-success";}else{echo "glyphicon glyphicon-remove text-danger";}?>" aria-hidden="true"></span> Kitchen</p></div>
							<div class="col-md-4 col-xs-6"><p><span class="<? if($detail['balcony']==1){echo "glyphicon glyphicon-ok text-success";}else{echo "glyphicon glyphicon-remove text-danger";}?>" aria-hidden="true"></span> Balcony</p></div>
							<div class="col-md-4 col-xs-6"><p><span class="<? if($detail['gym']==1){echo "glyphicon glyphicon-ok text-success";}else{echo "glyphicon glyphicon-remove text-danger";}?>" aria-hidden="true"></span> Gym</p></div>
							<div class="col-md-4 col-xs-6"><p><span class="<? if($detail['pets']==1){echo "glyphicon glyphicon-ok text-success";}else{echo "glyphicon glyphicon-remove text-danger";}?>" aria-hidden="true"></span> Pets-OK</p></div>
							<div class="col-md-4 col-xs-6"><p><span class="<? if($detail['tv']==1){echo "glyphicon glyphicon-ok text-success";}else{echo "glyphicon glyphicon-remove text-danger";}?>" aria-hidden="true"></span> TV</p></div>
							<div class="col-md-4 col-xs-6"><p><span class="<? if($detail['microware']==1){echo "glyphicon glyphicon-ok text-success";}else{echo "glyphicon glyphicon-remove text-danger";}?>" aria-hidden="true"></span> Microware</p></div>
		            		<div class="col-md-4 col-xs-6"><p><span class="<? if($detail['hob']==1){echo "glyphicon glyphicon-ok text-success";}else{echo "glyphicon glyphicon-remove text-danger";}?>" aria-hidden="true"></span> Hob</p></div>
			            	<div class="col-md-4 col-xs-6"><p><span class="<? if($detail['oven']==1){echo "glyphicon glyphicon-ok text-success";}else{echo "glyphicon glyphicon-remove text-danger";}?>" aria-hidden="true"></span> Oven</p></div>
			            	<div class="col-md-4 col-xs-6"><p><span class="<? if($detail['fridge']==1){echo "glyphicon glyphicon-ok text-success";}else{echo "glyphicon glyphicon-remove text-danger";}?>" aria-hidden="true"></span> Fridge</p></div>
			            	<div class="col-md-4 col-xs-6"><p><span class="<? if($detail['washmachine']==1){echo "glyphicon glyphicon-ok text-success";}else{echo "glyphicon glyphicon-remove text-danger";}?>" aria-hidden="true"></span> Wash&nbsp;Machine</p></div>
			            	<div class="col-md-4 col-xs-6"><p><span class="<? if($detail['dryer']==1){echo "glyphicon glyphicon-ok text-success";}else{echo "glyphicon glyphicon-remove text-danger";}?>" aria-hidden="true"></span> Dryer</p></div>
			            	<div class="col-md-4 col-xs-6"><p><span class="<? if($detail['dishwasher']==1){echo "glyphicon glyphicon-ok text-success";}else{echo "glyphicon glyphicon-remove text-danger";}?>" aria-hidden="true"></span> Dishwasher</p></div>
			            	<div class="col-md-4 col-xs-6"><p><span class="<? if($detail['heater']==1){echo "glyphicon glyphicon-ok text-success";}else{echo "glyphicon glyphicon-remove text-danger";}?>" aria-hidden="true"></span> Heater</p></div>
			            	<div class="col-md-4 col-xs-6"><p><span class="<? if($detail['tables']==1){echo "glyphicon glyphicon-ok text-success";}else{echo "glyphicon glyphicon-remove text-danger";}?>" aria-hidden="true"></span> Tables</p></div>
			            	<div class="col-md-4 col-xs-6"><p><span class="<? if($detail['beds']==1){echo "glyphicon glyphicon-ok text-success";}else{echo "glyphicon glyphicon-remove text-danger";}?>" aria-hidden="true"></span> Beds</p></div>
			            	<div class="col-md-4 col-xs-6"><p><span class="<? if($detail['chairs']==1){echo "glyphicon glyphicon-ok text-success";}else{echo "glyphicon glyphicon-remove text-danger";}?>" aria-hidden="true"></span> Chairs</p></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="panel panel-primary">
			<div class="panel-body">
					<p><?=$detail['introduction'];?></p>
			</div>
		</div>
		<br><br>
	</div>
	<?php include APPPATH.'views/footer.php';?>