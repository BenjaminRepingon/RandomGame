<article>
	<header>
		<h2 class="title">
			<a rel="bookmark"
			   href="<?PHP // @TODO link to article ?>"><?PHP echo $game->title ?></a>
		</h2>

		<p>Poster par
			<span class="author">
				<a rel="author"
				   title="Voir les articles de <?PHP echo $game->author ?>"
				   href="<?PHP echo base_url() . $game->author ?>"><?PHP echo $game->author ?></a>
			</span>
			le
			<span class="date">
				<time datetime="<?PHP echo date( DATE_W3C, strtotime( $game->date ) ) ?>"><?PHP
					echo dateFR( "l j F Y \a G\h m", strtotime( $game->date ) ) ?></time>
			</span>
			dans
			<span class="categories-links">
				<a rel="category tag"
				   title="Voir les articles dans <?PHP echo $game->category_name ?>"
				   href="<?PHP echo base_url() . "category/" . $game->category_name ?>"><?PHP echo $game->category_name ?></a>
			</span>
		</p>
	</header>
	<div class="article-content">
		<p>
<!--			--><?PHP //echo $game->content; ?>
		</p>
	</div>
	<footer>
		<a rel="tag"
		   title="Voir les articles ayant le tag <?PHP // @TODO tag name ?>"
		   href="<?PHP // @TODO link to tag ?>">Tag1</a>
	</footer>
</article>