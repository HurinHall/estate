	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="<?=base_url("css/bootstrap.css");?>">
	<!-- Owl -->
	<link rel="stylesheet" type="text/css" href="<?=base_url("css/owl.css");?>">
	<!-- Animate.css -->
	<link rel="stylesheet" type="text/css" href="<?=base_url("css/animate.css");?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="<?=base_url("fonts/font-awesome-4.1.0/css/font-awesome.min.css");?>">
	<!-- Elegant Icons -->
	<link rel="stylesheet" type="text/css" href="<?=base_url("fonts/eleganticons/et-icons.css");?>">
	<!-- Main style -->
	<link rel="stylesheet" type="text/css" href="<?=base_url("css/cardio.css");?>">
	<script src="<?=base_url("js/jquery-1.11.1.min.js");?>"></script>
</head>
<body>
	<div class="preloader">
		<img src="img/loader.gif" alt="Preloader image">
	</div>
	<nav class="navbar">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right main-nav">
					<li><a href="/rental">Rental</a></li>
					<li><a href="/forsale">For Sale</a></li>
					<li><a href="/about">About</a></li>
					<?
						if(!$this->user_session->checklogin()){
					?>
					<li><a href="#" data-toggle="modal" data-target="#modal1" class="btn1 btn1-blue">Login</a></li>
					<?
						}else{
					?>
					<li><a href="<?=base_url("/user");?>">Welcome <?=$this->user_session->getusername();?><? if($this->user_session->notification()!=0){echo "(".$this->user_session->notification().")";}?></a></li>
					<li><a href="<?=base_url("/user/logout");?>" class="btn1 btn1-blue">Logout</a></li>
					<?
						}
					?>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>