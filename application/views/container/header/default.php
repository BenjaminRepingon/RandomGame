<header id="header-full-top" class="hidden-xs header-full-dark">
	<div class="container">
		<div class="header-full-title">
			<h1 class="animated fadeInRight"><a href="<?PHP echo base_url()?>">Random Game<span> (Alpha)</span></a></h1>
			<p class="animated fadeInRight">Free online games</p>
		</div>
		<nav class="top-nav">
			<ul class="top-nav-social hidden-sm">
<!--				<li><a href="#" class="animated fadeIn animation-delay-6 rss"><i class="fa fa-rss"></i></a></li>-->
				<li><a href="#" class="animated fadeIn animation-delay-7 twitter"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#" class="animated fadeIn animation-delay-8 facebook"><i class="fa fa-facebook"></i></a></li>
<!--				<li><a href="#" class="animated fadeIn animation-delay-9 googleplus"><i class="fa fa-google-plus"></i></a></li>-->
<!--				<li><a href="#" class="animated fadeIn animation-delay-9 instagram"><i class="fa fa-instagram"></i></a></li>-->
<!--				<li><a href="#" class="animated fadeIn animation-delay-8 vine"><i class="fa fa-vine"></i></a></li>-->
<!--				<li><a href="#" class="animated fadeIn animation-delay-7 linkedin"><i class="fa fa-linkedin"></i></a></li>-->
<!--				<li><a href="#" class="animated fadeIn animation-delay-6 flickr"><i class="fa fa-flickr"></i></a></li>-->
			</ul>

			<!-- if is not logged show login and sign up menu -->
			<?PHP if ($this->session->userdata('id') == NULL) : ?>
			<!--Login form-->
			<div class="dropdown animated fadeInDown animation-delay-11">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Login</a>
				<div class="dropdown-menu dropdown-menu-right dropdown-login-box animated fadeInUp">
					<form role="form">
						<h4>Login</h4>

						<div class="form-group">
							<div class="input-group login-input">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input id="name" type="text" class="form-control" placeholder="Username">
							</div>
							<br>
							<div class="input-group login-input">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input id="password" type="password" class="form-control" placeholder="Password">
							</div>
							<button type="submit" id="login" class="btn btn-ar btn-primary pull-right">Login</button>
							<div class="clearfix"></div>
						</div>
					</form>
				</div>
			</div> <!-- dropdown -->

			<!-- Login AJAX -->
			<script>
				$(document).ready(function()
				{
					$("#login").click(function()
					{
						var username=$("#name").val();
						var password=$("#password").val();
						$.ajax({
							type: "POST",
							url: "<?PHP echo base_url() ?>ajax/login",
							data: "name="+username+"&pwd="+password,
							success: function(html)
							{
								console.log(html);
								if (html == 1)
									window.location.reload();
								else
								{
									//TODO: error login
								}
							}
						});
						return false;
					});
				});
			</script>

			<!--Sign Up form-->
			<div class="dropdown animated fadeInDown animation-delay-13">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Sign Up</a>
				<div class="dropdown-menu dropdown-menu-right dropdown-login-box animated fadeInUp">
					<form role="form">
						<h4>Sign Up</h4>

						<div class="form-group">
							<div class="input-group login-input">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="text" class="form-control" placeholder="Username">
							</div>
							<br>
							<div class="input-group login-input">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" class="form-control" placeholder="Password">
							</div>
							<br>
							<div class="input-group login-input">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" class="form-control" placeholder="Password">
							</div>
							<button type="submit" class="btn btn-ar btn-primary pull-right">Sign Up</button>
							<div class="clearfix"></div>
						</div>
					</form>
				</div>
			</div> <!-- dropdown -->

			<!-- else show profile menu -->
			<?PHP else : ?>

			<!--Profile form-->
			<div class="dropdown animated fadeInDown animation-delay-13">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Profile</a>
				<div class="dropdown-menu dropdown-menu-right dropdown-login-box animated fadeInUp">
					<h4>Profile</h4>

					<h5><?PHP echo "Username: ".$this->session->userdata('name'); ?></h5>
					<button id="logout" type="submit" class="btn btn-ar btn-primary pull-right">Logout</button>
				</div>
			</div> <!-- dropdown -->

			<!-- Logout AJAX -->
			<script>
				$(document).ready(function()
				{
					$("#logout").click(function()
					{
						$.ajax({
							type: "POST",
							url: "<?PHP echo base_url() ?>ajax/logout",
							success: function(html)
							{
								if (html == 1)
									window.location.reload();
							}
						});
						return false;
					});
				});
			</script>
			<?PHP endif ?>

<!--			<div class="dropdown animated fadeInDown animation-delay-15">-->
<!--				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search"></i></a>-->
<!--				<div class="dropdown-menu dropdown-menu-right dropdown-search-box animated fadeInUp">-->
<!--					<form role="form">-->
<!--						<div class="input-group">-->
<!--							<input type="text" class="form-control" placeholder="Search...">-->
<!--							<span class="input-group-btn">-->
<!--								<button class="btn btn-ar btn-primary" type="button">Go!</button>-->
<!--							</span>-->
<!--						</div><!-- /input-group -->
<!--					</form>-->
<!--				</div>-->
<!--			</div> <!-- dropdown -->
		</nav>
	</div> <!-- container -->
</header> <!-- header-full -->
