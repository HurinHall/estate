	<footer>
		<div class="container">
			<div class="row bottom-footer text-center-mobile">
				<div class="col-sm-8">
					<p>&copy; 2016 All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</footer>
	<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link" style="text-decoration: none;"><i class="icon_close_alt2"></i></a>
				<h3 class="white">Login</h3>
				<form action="/user/auth" method="post" class="popup-form">
					<input type="email" id="loginemail" class="form-control1 form-white" placeholder="Email Address" required>
					<input type="password" id="loginpassword" class="form-control1 form-white" placeholder="Password" required>
					<button type="button" class="btn1 btn1-submit" id="Login" data-loading-text="Logining ...">Login</button>
					<br><br>
					<a href="/register" style="color:white;">No account? Sign up now!</a>
				</form>
			</div>
		</div>
	</div>
	<!-- Holder for mobile navigation -->
	<div class="mobile-nav">
		<ul>
		</ul>
		<a href="#" class="close-link"><i class="arrow_up"></i></a>
	</div>
	<!-- Scripts -->
	<script src="<?=base_url("js/owl.carousel.min.js");?>"></script>
	<script src="<?=base_url("js/bootstrap.min.js");?>"></script>
	<script src="<?=base_url("js/typewriter.js");?>"></script>
	<script src="<?=base_url("js/jquery.onepagenav.js");?>"></script>
	<script src="<?=base_url("js/main.js");?>"></script>
</body>

</html>
