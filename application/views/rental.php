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
	<link rel="stylesheet" type="text/css" href="<?=base_url("css/select2.min.css");?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url("css/jquery-ui.css");?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url("css/jquery-ui-slider-pips.css");?>">
	<style>
	#steps-fivepercent-slider .ui-slider-tip {
	    visibility: visible;
	    opacity: 1;
	    top: -30px;
    }
	</style>
	<?php include APPPATH.'views/header.php';?>
	<link rel="stylesheet" type="text/css" href="<?=base_url("css/bootstrap-multiselect.css");?>"/>
	<div class="blanktop"></div>
	<center>
		<h3>Rental Property</h3>
	</center>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row form-group">
					<div class="col-sm-2 col-md-1"><label>City</label></div>
					<div class="col-sm-4 col-md-2">
						<select class="form-control" name="city" id="city" onchange="changeCity(this.value);">
							<?	
								for($i = 0; $i < sizeof($cityList); $i++){
							?>
							<option value="<?=$cityList[$i];?>"><?=$cityList[$i];?></option>
							<? } ?>
						</select>
					</div>
					<div class="col-sm-2 col-md-1"><label>Districts</label></div>
					<div class="col-sm-4 col-md-2">
						<select class="form-control" name="districts" id="districts" onchange="changeDistricts(this.value);">
							<option value="All">All</option>
							<?	
								for($i = 0; $i < sizeof($districtsList); $i++){
							?>
							<option value="<?=$districtsList[$i];?>"><?=$districtsList[$i];?></option>
							<? } ?>
						</select>
					</div>
					<div class="col-sm-2 col-md-1"><label>Suburbs</label></div>
					<div class="col-sm-4 col-md-2">
						<select class="form-control" name="suburbs" id="suburbs" multiple="multiple">
							<?	
								for($i = 0; $i < sizeof($suburbList); $i++){
							?>
							<option value="<?=$suburbList[$i];?>"><?=$suburbList[$i];?></option>
							<? } ?>
						</select>
					</div>
					<div class="col-sm-2 col-md-1"><label>Available</label></div>
					<div class="col-sm-4 col-md-2">
						<input type="text" class="form-control" id="datepicker" name="available" value="<?=date("m/d/Y");?>" />
					</div>
					<div class="col-sm-2 col-md-1"><label>Bedroom</label></div>
					<div class="col-sm-4 col-md-2">
						<select class="form-control" name="bedroom" id="bedroom">
							<option value="Any">Any</option>
		            		<option value="0">0</option>
		            		<option value="1">1</option>
		            		<option value="2">2</option>
		            		<option value="3">3</option>
		            		<option value="4">4</option>
		            		<option value="5">5</option>
		            		<option value="6">6</option>
		            		<option value="7">7</option>
		            		<option value="8">8</option>
		            		<option value="9">9</option>
		            		<option value="10">10+</option>
		            	</select>
					</div>
					<div class="col-sm-2 col-md-1"><label>Bathroom</label></div>
					<div class="col-sm-4 col-md-2">
						<select class="form-control" name="bathroom" id="bathroom">
							<option value="Any">Any</option>
		            		<option value="0">0</option>
		            		<option value="1">1</option>
		            		<option value="2">2</option>
		            		<option value="3">3</option>
		            		<option value="4">4</option>
		            		<option value="5">5+</option>
		            	</select>
					</div>
					<div class="col-sm-2 col-md-1"><label>Parking</label></div>
					<div class="col-sm-4 col-md-2">
						<select class="form-control" name="parking" id="parking">
							<option value="Any">Any</option>
		            		<option value="0">0</option>
		            		<option value="1">1</option>
		            		<option value="2">2</option>
		            		<option value="3">3</option>
		            		<option value="4">4</option>
		            		<option value="5">5+</option>
		            	</select>
					</div>
					<div class="col-sm-2 col-md-1"><label>Type</label></div>
					<div class="col-sm-4 col-md-2">
						<select class="form-control" name="type" id="type">
							<option value="Any">Any</option>
							<option value="Apartment">Apartment</option>
							<option value="House">House</option>
							<option value="Studio">Studio</option>
							<option value="Unit">Unit</option>
						</select>
					</div>
					<div class="col-sm-2 col-md-1"><label>Optional</label></div>
					<div class="col-sm-10 col-md-11">
						<select class="form-control js-example-basic-multiple" multiple="multiple" name="optional" id="optional">
						  <option value="Entire">Entire Rent</option>
						  <option value="Kitchen">Kitchen</option>
						  <option value="Balcony">Balcony</option>
						  <option value="Gym">Gym</option>
						  <option value="Pets OK">Pets OK</option>
						  <option value="TV">TV</option>
						  <option value="Microwave">Microwave</option>
						  <option value="Hob">Hob</option>
						  <option value="Oven">Oven</option>
						  <option value="Fridge">Fridge</option>
						  <option value="Washing Machine">Washing Machine</option>
						  <option value="Dryer">Dryer</option>
						  <option value="Dishwasher">Dishwasher</option>
						  <option value="Heater">Heater</option>
						  <option value="Table">Table</option>
						  <option value="Bed">Bed</option>
						  <option value="Chairs">Chairs</option>
						</select>
					</div>
					<div class="col-sm-2 col-md-1"><label>Price</label></div>
					<div class="col-sm-10 col-md-11">
						<input type="text" id="price" name="price" readonly style="display:inline;border:0; color:#f6931f; font-weight:bold;">
						<div class="slider"></div>
					</div>
				</div>
				<button type="button" id="search" class="btn btn-success" style="float:right;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
			</div>
		</div>
	</div>
	<br>
	<div class="container">
		<select class="form-control" name="order" id="order" style="max-width:180px;float:right">
			<option value="latest">By Latest Listing</option>
			<option value="available">By Available Time</option>
			<option value="low">By Lowest Price</option>
			<option value="high">By Highest Price</option>
		</select>
		<br><br><br>
		<div class="row" id="searchList">
			<? for($i=0;$i<sizeof($defaultList);$i++){ ?>
		  <div class="col-sm-6 col-md-4 col-lg-3">
		    <div class="thumbnail">
		      <div class="caption">
		      	<h5><?=$defaultList[$i]['suburbs'];?></h5>
		      	<h5><?=$defaultList[$i]['districts'];?></h5>
		        <h5><?=$defaultList[$i]['city'];?></h5>
		        <p class="text-success"><i class="fa fa-usd" aria-hidden="true"></i> <?=$defaultList[$i]['price'];?></p>
		        <p><?=$defaultList[$i]['type'];?></p>
		        <p><img src="<?=base_url('img/icons/bed-icon.png');?>"> <?=$defaultList[$i]['bedroom'];?>&nbsp;<img src="<?=base_url('img/icons/bath-icon.png');?>"> <?=$defaultList[$i]['bathroom'];?>&nbsp;<img src="<?=base_url('img/icons/parking-icon.png');?>"> <?=$defaultList[$i]['parking'];?></p>
		        <p class="text-danger">Available: <?=$defaultList[$i]['available'];?></p>
		        <p class="text-right"><a href="<?=base_url('rentalDetail?id='.$defaultList[$i]['id']);?>" class="btn btn-primary" role="button" target="_blank">Detail <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		      </div>
		    </div>
		  </div>
		  <? } ?>
		</div>
		<br><br>
		<select class="form-control" style="float:right;max-width:100px;" id="pagenum">
            <? 
            	for($i=1;$i<=$page;$i++){
            ?>
            <option value="<?=$i?>"><?=$i;?></option>
            <?
            	}
            ?>
       </select>
       <br><br><br><br><br>
	</div>
	<script src="<?=base_url("js/rent.js");?>"></script>
	<script src="<?=base_url("js/select2.min.js");?>"></script>
	<script src="<?=base_url("js/jquery-ui.js");?>"></script>
	<script src="<?=base_url("js/jquery-ui-slider-pips.js");?>"></script>
	<script src="<?=base_url("js/bootstrap-multiselect.js");?>"></script>
	<script type="text/javascript">
		$('#suburbs').multiselect({includeSelectAllOption: true, maxHeight: 200});
		$(".js-example-basic-multiple").select2();
		$( "#datepicker" ).datepicker();
		$(".slider").slider({ 
	        min: 100, 
	        max: 1000, 
	        range: true, 
	        step: 100,
	        values: [200, 600],
	        slide: function( event, ui ) {
		        $( "#price" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		    }
	    }).slider("pips", {
        	rest: "label"
        }).slider("float");
	    $( "#price" ).val( "$" + $( ".slider" ).slider( "values", 0 ) +
	      " - $" + $( ".slider" ).slider( "values", 1 ) );
	</script>
	<?php include APPPATH.'views/footer.php';?>