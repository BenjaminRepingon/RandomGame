
<header class="main-header">
	<div class="container">
		<h1 class="page-title"><?PHP echo $game->title ?></h1>

		<ol class="breadcrumb pull-right">
			<li><a href="#">Game</a></li>
			<li class="active">Category</li><!-- TODO: category -->
			<li class="active"><?PHP echo $game->title ?></li>
		</ol>
	</div>
</header>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<section>
				<h2 class="page-header no-margin-top">By <?PHP echo $game->author ?></h2>
				<div style="margin-left: -400px; left: 50%; position: relative;">
					<?PHP echo $game->iframe ?>
				</div>
			</section>
		</div>
	</div>
</div>
