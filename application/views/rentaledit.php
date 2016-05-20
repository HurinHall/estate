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
            <?php echo form_open('/user/rentalUpdate/'.$id); ?>
	            <div class="row form-group" style="max-width:768px;margin:auto;">
	            	<div class="col-md-3 col-sm-3"><label>Title</label></div>
	            	<div class="col-md-9 col-sm-9"><input type="text" class="form-control" name="title" maxlength="50" value="<?php echo set_value('title')|$detail['title']; ?>" /></div>
	            	<div class="col-md-3 col-sm-3"><label>Phone</label></div>
	            	<div class="col-md-9 col-sm-9"><input type="text" class="form-control" name="phone" maxlength="50" value="<?php echo set_value('phone')|$detail['phone']; ?>" /></div>
	            	<div class="col-md-3 col-sm-3"><label>Email</label></div>
	            	<div class="col-md-9 col-sm-9"><input type="email" class="form-control" name="email" maxlength="50" value="<?php echo set_value('email')|$detail['email']; ?>" /></div>
	            	<div class="col-md-3 col-sm-3"><label>City</label></div>
	            	<div class="col-md-9 col-sm-9">
	            		<select class="form-control" name="city" id="city" onchange="changeCity(this.value);">
						<?	
							for($i = 0; $i < sizeof($cityList); $i++){
						?>
							<option value="<?=$cityList[$i];?>" <? if($cityList[$i]==$detail['city']){echo "selected";}?>><?=$cityList[$i];?></option>
						<? } ?>
						</select>
					</div>
	            	<div class="col-md-3 col-sm-3"><label>Districts</label></div>
	            	<div class="col-md-9 col-sm-9">
		            	<select class="form-control" name="districts" id="districts" onchange="changeDistricts(this.value);">
						<?	
							for($i = 0; $i < sizeof($districtsList); $i++){
						?>
							<option value="<?=$districtsList[$i];?>" <? if($districtsList[$i]==$detail['districts']){echo "selected";}?>><?=$districtsList[$i];?></option>
						<? } ?>
						</select>
	            	</div>
	            	<div class="col-md-3 col-sm-3"><label>Suburbs</label></div>
	            	<div class="col-md-9 col-sm-9">
		            	<select class="form-control" name="suburbs" id="suburbs">
						<?	
							for($i = 0; $i < sizeof($suburbList); $i++){
						?>
							<option value="<?=$suburbList[$i];?>" <? if($suburbList[$i]==$detail['suburbs']){echo "selected";}?>><?=$suburbList[$i];?></option>
						<? } ?>
						</select>
	            	</div>
	            	<div class="col-md-3 col-sm-3"><label>Address</label></div>
	            	<div class="col-md-9 col-sm-9"><input type="text" class="form-control" name="address" maxlength="100" value="<?php echo set_value('address')|$detail['address']; ?>" /></div>
	            	<div class="col-md-3 col-sm-3"><label>Price</label></div>
	            	<div class="col-md-9 col-sm-9"><input type="number" class="form-control" name="price" maxlength="50" value="<?php echo set_value('price')|$detail['price']; ?>" /></div>
	            	<div class="col-md-3 col-sm-3"><label>Available</label></div>
	            	<div class="col-md-9 col-sm-9"><input type="text" class="form-control" id="datepicker" name="available" value="<?php echo set_value('available')|$detail['available']; ?>" /></div>
	            	<div class="col-md-3 col-sm-3"><label>Bedroom</label></div>
	            	<div class="col-md-9 col-sm-9">
		            	<select class="form-control" name="bedroom" id="bedroom">
		            		<option value="0" <? if($detail['bedroom'] == 0){echo "selected";}?>>0</option>
		            		<option value="1" <? if($detail['bedroom'] == 1){echo "selected";}?>>1</option>
		            		<option value="2" <? if($detail['bedroom'] == 2){echo "selected";}?>>2</option>
		            		<option value="3" <? if($detail['bedroom'] == 3){echo "selected";}?>>3</option>
		            		<option value="4" <? if($detail['bedroom'] == 4){echo "selected";}?>>4</option>
		            		<option value="5" <? if($detail['bedroom'] == 5){echo "selected";}?>>5</option>
		            		<option value="6" <? if($detail['bedroom'] == 6){echo "selected";}?>>6</option>
		            		<option value="7" <? if($detail['bedroom'] == 7){echo "selected";}?>>7</option>
		            		<option value="8" <? if($detail['bedroom'] == 8){echo "selected";}?>>8</option>
		            		<option value="9" <? if($detail['bedroom'] == 9){echo "selected";}?>>9</option>
		            		<option value="10" <? if($detail['bedroom'] == 10){echo "selected";}?>>10+</option>
		            	</select>
	            	</div>
	            	<div class="col-md-3 col-sm-3"><label>Bathroom</label></div>
	            	<div class="col-md-9 col-sm-9">
		            	<select class="form-control" name="bathroom" id="bathroom">
		            		<option value="0" <? if($detail['bathroom'] == 0){echo "selected";}?>>0</option>
		            		<option value="1" <? if($detail['bathroom'] == 1){echo "selected";}?>>1</option>
		            		<option value="2" <? if($detail['bathroom'] == 2){echo "selected";}?>>2</option>
		            		<option value="3" <? if($detail['bathroom'] == 3){echo "selected";}?>>3</option>
		            		<option value="4" <? if($detail['bathroom'] == 4){echo "selected";}?>>4</option>
		            		<option value="5" <? if($detail['bathroom'] == 5){echo "selected";}?>>5+</option>
		            	</select>
	            	</div>
	            	<div class="col-md-3 col-sm-3"><label>Parking</label></div>
	            	<div class="col-md-9 col-sm-9">
		            	<select class="form-control" name="parking" id="parking">
		            		<option value="0" <? if($detail['parking'] == 0){echo "selected";}?>>0</option>
		            		<option value="1" <? if($detail['parking'] == 1){echo "selected";}?>>1</option>
		            		<option value="2" <? if($detail['parking'] == 2){echo "selected";}?>>2</option>
		            		<option value="3" <? if($detail['parking'] == 3){echo "selected";}?>>3</option>
		            		<option value="4" <? if($detail['parking'] == 4){echo "selected";}?>>4</option>
		            		<option value="5" <? if($detail['parking'] == 5){echo "selected";}?>>5+</option>
		            	</select>
	            	</div>
	            	<div class="col-md-3 col-sm-3"><label>Type</label></div>
	            	<div class="col-md-9 col-sm-9">
		            	<select class="form-control" name="type" id="type">
		            		<option value="Apartment" <? if($detail['type'] == "Apartment"){echo "selected";}?>>Apartment</option>
		            		<option value="House" <? if($detail['type'] == "House"){echo "selected";}?>>House</option>
		            		<option value="Studio" <? if($detail['type'] == "Studio"){echo "selected";}?>>Studio</option>
		            		<option value="Unit" <? if($detail['type'] == "Unit"){echo "selected";}?>>Unit</option>
		            	</select>
	            	</div>
	            	<div class="col-md-3 col-sm-3"><label>Optional</label></div>
	            	<div class="col-md-9 col-sm-9">
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="entire" <? if($detail['entire'] == 1){echo "checked";}?>> Entire</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="kitchen" <? if($detail['kitchen'] == 1){echo "checked";}?>> Kitchen</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="balcony" <? if($detail['balcony'] == 1){echo "checked";}?>> Balcony</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="gym" <? if($detail['gym'] == 1){echo "checked";}?>> Gym</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="pets" <? if($detail['pets'] == 1){echo "checked";}?>> Pets-OK</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="tv" <? if($detail['tv'] == 1){echo "checked";}?>> TV</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="microware" <? if($detail['microware'] == 1){echo "checked";}?>> Microware</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="hob" <? if($detail['hob'] == 1){echo "checked";}?>> Hob</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="oven" <? if($detail['oven'] == 1){echo "checked";}?>> Oven</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="fridge" <? if($detail['fridge'] == 1){echo "checked";}?>> Fridge</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="washmachine" <? if($detail['washmachine'] == 1){echo "checked";}?>> Wash&nbsp;Machine</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="dryer" <? if($detail['dryer'] == 1){echo "checked";}?>> Dryer</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="dishwasher" <? if($detail['dishwasher'] == 1){echo "checked";}?>> Dishwasher</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="heater" <? if($detail['heater'] == 1){echo "checked";}?>> Heater</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="tables" <? if($detail['tables'] == 1){echo "checked";}?>> Tables</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="beds" <? if($detail['beds'] == 1){echo "checked";}?>> Beds</label></div></div>
		            	<div class="col-md-3 col-sm-4"><div class="checkbox"><label><input type="checkbox" name="chairs" <? if($detail['chairs'] == 1){echo "checked";}?>> Chairs</label></div></div>
	            	</div>
	            	<div class="col-md-3 col-sm-3"><label>Introduction</label></div>
	            	<div class="col-md-9 col-sm-9">
		            	<textarea class="form-control" rows="3" name="introduction"><?php echo set_value('introduction')|$detail['introduction']; ?></textarea>
	            	</div>
	            	<div class="col-md-3 col-sm-3"></div>
	            	<div class="col-md-9 col-sm-9">
	            		<br><br>
	            		<div style="float:right;">
		            		<a href="<?=base_url("/user/rentalDel/".$id);?>" class="btn btn-danger" >Delete</a>&nbsp;&nbsp;<button type="submit" class="btn btn-primary">Update</button>
	            		</div>
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
