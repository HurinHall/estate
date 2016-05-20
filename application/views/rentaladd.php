<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url("css/jquery-ui.css");?>">
    <!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="<?=base_url("css/bootstrap.css");?>">
    <!-- MetisMenu CSS -->
    <link href="<?=base_url("css/metisMenu.min.css");?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url("css/sb-admin-2.css");?>" rel="stylesheet">
    <!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="<?=base_url("fonts/font-awesome-4.1.0/css/font-awesome.min.css");?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?=base_url("js/jquery-1.11.1.min.js");?>"></script>
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=base_url("/user");?>">Dashboard</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-right navbar-top-links">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> New Message
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?=base_url("/user/logout");?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?=base_url("/user");?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
						<li>
                            <a href="<?=base_url("/user/rental");?>"><i class="fa fa-building fa-fw"></i> Estate Rental</a>
                        </li>
                        <!--
						<li>
                            <a href="<?=base_url("/user/sale");?>"><i class="fa fa-home fa-fw"></i> Estate Sale</a>
                        </li>         
                        -->               
                    </ul>
                    <br>
                    <center>
                    	<a href="<?=base_url();?>">Back to Website</a>
                    </center>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Estate Rental</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <center>
            	<p class="text-danger"><?=$error;?></p>
            	<?php echo validation_errors(); ?>
            </center>
            <?php echo form_open('/user/rentalAdd'); ?>
	            <div class="row form-group" style="max-width:768px;margin:auto;">
	            	<div class="col-md-3 col-sm-3"><label>Title</label></div>
	            	<div class="col-md-9 col-sm-9"><input type="text" class="form-control" name="title" maxlength="50" value="<?php echo set_value('title'); ?>" /></div>
	            	<div class="col-md-3 col-sm-3"><label>Phone</label></div>
	            	<div class="col-md-9 col-sm-9"><input type="text" class="form-control" name="phone" maxlength="50" value="<?php echo set_value('phone'); ?>" /></div>
	            	<div class="col-md-3 col-sm-3"><label>Email</label></div>
	            	<div class="col-md-9 col-sm-9"><input type="email" class="form-control" name="email" maxlength="50" value="<?php echo set_value('email'); ?>" /></div>
	            	<div class="col-md-3 col-sm-3"><label>City</label></div>
	            	<div class="col-md-9 col-sm-9">
	            		<select class="form-control" name="city" id="city" onchange="changeCity(this.value);">
						<?	
							for($i = 0; $i < sizeof($cityList); $i++){
						?>
							<option value="<?=$cityList[$i];?>"><?=$cityList[$i];?></option>
						<? } ?>
						</select>
					</div>
	            	<div class="col-md-3 col-sm-3"><label>Districts</label></div>
	            	<div class="col-md-9 col-sm-9">
		            	<select class="form-control" name="districts" id="districts" onchange="changeDistricts(this.value);">
						<?	
							for($i = 0; $i < sizeof($districtsList); $i++){
						?>
							<option value="<?=$districtsList[$i];?>"><?=$districtsList[$i];?></option>
						<? } ?>
						</select>
	            	</div>
	            	<div class="col-md-3 col-sm-3"><label>Suburbs</label></div>
	            	<div class="col-md-9 col-sm-9">
		            	<select class="form-control" name="suburbs" id="suburbs">
						<?	
							for($i = 0; $i < sizeof($suburbList); $i++){
						?>
							<option value="<?=$suburbList[$i];?>"><?=$suburbList[$i];?></option>
						<? } ?>
						</select>
	            	</div>
	            	<div class="col-md-3 col-sm-3"><label>Address</label></div>
	            	<div class="col-md-9 col-sm-9"><input type="text" class="form-control" name="address" maxlength="100" value="<?php echo set_value('address'); ?>" /></div>
	            	<div class="col-md-3 col-sm-3"><label>Price</label></div>
	            	<div class="col-md-9 col-sm-9"><input type="number" class="form-control" name="price" maxlength="50" <?php echo set_value('price'); ?> /></div>
	            	<div class="col-md-3 col-sm-3"><label>Available</label></div>
	            	<div class="col-md-9 col-sm-9"><input type="text" class="form-control" id="datepicker" name="available" value="<?php echo set_value('available'); ?>" /></div>
	            	<div class="col-md-3 col-sm-3"><label>Bedroom</label></div>
	            	<div class="col-md-9 col-sm-9">
		            	<select class="form-control" name="bedroom" id="bedroom">
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
	            	<div class="col-md-3 col-sm-3"><label>Bathroom</label></div>
	            	<div class="col-md-9 col-sm-9">
		            	<select class="form-control" name="bathroom" id="bathroom">
		            		<option value="0">0</option>
		            		<option value="1">1</option>
		            		<option value="2">2</option>
		            		<option value="3">3</option>
		            		<option value="4">4</option>
		            		<option value="5">5+</option>
		            	</select>
	            	</div>
	            	<div class="col-md-3 col-sm-3"><label>Parking</label></div>
	            	<div class="col-md-9 col-sm-9">
		            	<select class="form-control" name="parking" id="parking">
		            		<option value="0">0</option>
		            		<option value="1">1</option>
		            		<option value="2">2</option>
		            		<option value="3">3</option>
		            		<option value="4">4</option>
		            		<option value="5">5+</option>
		            	</select>
	            	</div>
	            	<div class="col-md-3 col-sm-3"><label>Type</label></div>
	            	<div class="col-md-9 col-sm-9">
		            	<select class="form-control" name="type" id="type">
		            		<option value="Apartment">Apartment</option>
		            		<option value="House">House</option>
		            		<option value="Studio">Studio</option>
		            		<option value="Unit">Unit</option>
		            	</select>
	            	</div>
	            	<div class="col-md-3 col-sm-3"><label>Optional</label></div>
	            	<div class="col-md-9 col-sm-9">
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="entire" > Entire</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="kitchen" > Kitchen</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="balcony" > Balcony</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="gym" > Gym</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="pets" > Pets-OK</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="tv" > TV</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="microware" > Microware</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="hob" > Hob</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="oven" > Oven</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="fridge" > Fridge</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="washmachine" > Wash&nbsp;Machine</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="dryer" > Dryer</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="dishwasher" > Dishwasher</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="heater" > Heater</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="tables" > Tables</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="beds" > Beds</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="chairs" > Chairs</label></div></div>
	            	</div>
	            	<div class="col-md-3 col-sm-3"><label>Introduction</label></div>
	            	<div class="col-md-9 col-sm-9">
		            	<textarea class="form-control" rows="3" name="introduction"><?php echo set_value('introduction'); ?></textarea>
	            	</div>
	            	<div class="col-md-3 col-sm-3"></div>
	            	<div class="col-md-9 col-sm-9">
	            		<br><br>
		            	<button type="submit" class="btn btn-primary" style="float:right;">Submit</button>
	            	</div>
	            </div>
	            <br><br>
            </form>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="<?=base_url("js/jquery-ui.js");?>"></script>
	<script src="<?=base_url("js/rental.js");?>"></script>
    <script src="<?=base_url("js/bootstrap.min.js");?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url("js/metisMenu.min.js");?>"></script>


    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url("js/sb-admin-2.js");?>"></script>

</body>

</html>
