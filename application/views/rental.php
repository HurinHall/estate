<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
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
	<div class="blanktop"></div>
	<center>
		<h3>Rental Property</h3>
	</center>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-body">
				<?php echo form_open('/rental'); ?>
					<div class="row form-group">
						<div class="col-sm-2 col-md-1"><label>City</label></div>
						<div class="col-sm-4 col-md-2">
							<select class="form-control" name="city">
								<option value="Auckland">Auckland</option>
							</select>
						</div>
						<div class="col-sm-2 col-md-1"><label>Districts</label></div>
						<div class="col-sm-4 col-md-2">
							<select class="form-control" name="districts">
								<option value="Auckland City">Auckland City</option>
							</select>
						</div>
						<div class="col-sm-2 col-md-1"><label>Suburbs</label></div>
						<div class="col-sm-4 col-md-2">
							<select class="form-control" name="suburbs">
								<option value="All">All</option>
							</select>
						</div>
						<div class="col-sm-2 col-md-1"><label>Available</label></div>
						<div class="col-sm-4 col-md-2">
							<input type="text" class="form-control" id="datepicker" name="available" />
						</div>
						<div class="col-sm-2 col-md-1"><label>Bedroom</label></div>
						<div class="col-sm-4 col-md-2">
							<select class="form-control" name="bedroom">
								<option value="1">1+</option>
							</select>
						</div>
						<div class="col-sm-2 col-md-1"><label>Bathroom</label></div>
						<div class="col-sm-4 col-md-2">
							<select class="form-control" name="bathroom">
								<option value="1">1+</option>
							</select>
						</div>
						<div class="col-sm-2 col-md-1"><label>Parking</label></div>
						<div class="col-sm-4 col-md-2">
							<select class="form-control" name="parking">
								<option value="1">1+</option>
							</select>
						</div>
						<div class="col-sm-2 col-md-1"><label>Type</label></div>
						<div class="col-sm-4 col-md-2">
							<select class="form-control" name="type">
								<option value="Apartment">Apartment</option>
								<option value="House">House</option>
							</select>
						</div>
						<div class="col-sm-2 col-md-1"><label>Optional</label></div>
						<div class="col-sm-10 col-md-11">
							<select class="form-control js-example-basic-multiple" multiple="multiple" name="optional">
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
					<button type="submit" class="btn btn-success" style="float:right;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
				</form>
			</div>
		</div>
	</div>
	<br><br>
	<div class="container">
		<div class="row">
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <img src="..." alt="...">
		      <div class="caption">
		        <h3>Thumbnail label</h3>
		        <p>...</p>
		        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <img src="..." alt="...">
		      <div class="caption">
		        <h3>Thumbnail label</h3>
		        <p>...</p>
		        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <img src="..." alt="...">
		      <div class="caption">
		        <h3>Thumbnail label</h3>
		        <p>...</p>
		        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
	<script src="<?=base_url("js/select2.min.js");?>"></script>
	<script src="<?=base_url("js/jquery-ui.js");?>"></script>
	<script src="<?=base_url("js/jquery-ui-slider-pips.js");?>"></script>
	<script type="text/javascript">
		$(".js-example-basic-multiple").select2();
		$( "#datepicker" ).datepicker();
		$(".slider").slider({ 
	        min: 100, 
	        max: 1000, 
	        range: true, 
	        step: 100,
	        values: [200, 400],
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