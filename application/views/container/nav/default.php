<!-- nav principale -->
<nav class="navbar navbar-static-top navbar-default navbar-header-full" role="navigation" id="header">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<i class="fa fa-bars"></i>
			</button>
			<a class="navbar-brand hidden-lg hidden-md hidden-sm" href="index.html">Artificial <span>Reason</span></a>
		</div> <!-- navbar-header -->

		<!-- Collect the nav links, forms, and other content for toggling -->
<!--		<div class="pull-right">-->
<!--			<a href="javascript:void(0);" class="sb-icon-navbar sb-toggle-right"><i class="fa fa-search"></i></a>-->
<!--		</div>-->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li>
					<a href="<?PHP echo base_url() ?>" >Home</a>
				</li>
				<?php
				$categories = $this->m_category->select( '*' );
				$size = count($categories);
				for ($i = 0; $i < 7; $i++)
				{
					?>
					<li class="dropdown dropdown-menu-custom">
						<a href="<?PHP echo base_url() ?>" class="has_children" ><?php echo $categories[$i]->name; ?></a>
						<ul class="dropdown-menu">
							<li><a href="#">Banzaie</a></li>
							<li><a href="#">Banzaie</a></li>
							<li><a href="#">Banzaie</a></li>
							<li><a href="#">Banzaie</a></li>
						</ul>
					</li>
					<?php
				}
				?>
				<li class="dropdown dropdown-menu-custom">
						<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">More</a>
						<ul class="dropdown-menu">
							<?php
							while ($i < $size)
							{
								?>
									<li><a href="index.html"><?php echo $categories[$i]->name; ?></a></li>
								<?php
								$i++;
							}
							?>
						</ul>
				</li>

			</ul>
		</div><!-- navbar-collapse -->

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- Header RandomGame -->
		<ins class="adsbygoogle"
			 style="display:inline-block;width:728px;height:90px"
			 data-ad-client="ca-pub-5323499119495562"
			 data-ad-slot="4545884533"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div><!-- container -->
</nav>