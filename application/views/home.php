
<section class="carousel-section-e">
	<div id="carousel-example-generic" class="carousel carousel-e slide" data-ride="carousel" data-interval="50000">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?PHP $i = 0;foreach($top5 as $elem) : ?>
			<li data-target="#carousel-example-generic" data-slide-to="<?PHP echo $i ?>" <?PHP if ($i == 0) : ?>class="active"><?PHP endif ?></li>
			<?PHP $i++; endforeach ?>
		</ol>


		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<?PHP $i = 0;foreach($top5 as $elem) : ?>
			<div class="item<?PHP if ($i++ == 0) : ?> active<?PHP endif ?>">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-5 hidden-xs carousel-img-wrap">
							<div class="carousel-img">
								<img src="<?PHP echo base_url()."uploads/img/big/".$elem->img ?>" class="img-responsive img-post animated bounceInUp animation-delay-3" style="margin: 7px auto;" alt="Image">
							</div>
						</div>
						<div class="col-md-6 col-sm-7">
							<div class="carousel-caption">
								<div class="carousel-text">
									<a href="<?PHP echo base_url()."game/".$elem->title ?>">
										<h1 class="animated fadeInDownBig animation-delay-7 carousel-title"><?PHP echo $elem->title ?></h1>
									</a>
									<a href="<?PHP echo base_url()."category/".$elem->category ?>">
										<h2 class="animated fadeInDownBig animation-delay-5  crousel-subtitle"><?PHP echo $elem->category ?></h2>
									</a>
<!--									<p class="animated bounceInLeft animation-delay-11">--><?PHP //echo $elem->description ?><!--</p>-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?PHP endforeach ?>
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</a>
	</div>
</section> <!-- carousel -->

<div class="container">
<div class="row">
<div class="col-md-3 hidden-sm hidden-xs">
	<div class="ec-filters-menu">
		<h3 class="section-title no-margin-top">Filters</h3>
		<h4>Select Category</h4>
		<ul>
			<li><a href="javascript:void(0);" class="filter" data-filter="all">All</a></li>
			<?PHP foreach( $categories as $category ) : ?>
			<li><a href="javascript:void(0);" class="filter" data-filter=".category-<?PHP echo $category->name ?>"><?PHP echo $category->name ?></a></li>
			<?PHP endforeach ?>
		</ul>
		<h4>Order by</h4>
		<ul>
<!--			<li><a href="javascript:void(0);" class="sort" data-sort="price:asc">Price: Low to High</a></li>-->
<!--			<li><a href="javascript:void(0);" class="sort" data-sort="price:desc">Price: High to Lo</a></li>-->
			<li><a href="javascript:void(0);" class="sort" data-sort="popularity:desc">Most Popular</a></li>
			<li><a href="javascript:void(0);" class="sort" data-sort="date:desc">Release Date</a></li>
		</ul>
	</div>
</div>
<div class="col-md-9">
	<div class="row" id="Container">

		<?PHP foreach( $games as $game ) : ?>
		<div class="col-sm-4 mix category-<?PHP echo $game->category ?>" data-date="<?PHP echo $game->date ?>" data-rating="<?PHP echo $game->rating ?>" data-popularity="<?PHP echo $game->plays ?>">
			<div class="ec-box">
				<div class="ec-box-header"><a href="<?PHP echo base_url()."game/".$game->link_name ?>"><?PHP echo $game->title ?></a></div>
				<a class="category-img" href="<?PHP echo base_url()."game/".$game->link_name ?>"><img src="<?PHP echo base_url()."uploads/img/small/".$game->img ?>" alt=""></a>
				<div class="ec-box-footer">
					<a href="<?PHP echo base_url()."game/".$game->category ?>"><?PHP echo $game->category ?></a><br/>
					<?PHP $i = 0; while($i++ < $game->rating) : ?>
						<i class="fa fa-star"></i>
					<?PHP endwhile ?>
					<a href="<?PHP echo base_url()."game/".$game->link_name ?>" class="btn btn-ar btn-success btn-sm pull-right"><i class="fa fa-play"></i> Play</a>
				</div>
			</div>
		</div>
		<?PHP endforeach ?>
	</div>
</div>
</div>
</div> <!-- container -->