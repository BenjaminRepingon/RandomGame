<header class="main-header">
	<div class="container">
		<h1 class="page-title"><?PHP echo $game->title ?></h1>

		<ol class="breadcrumb pull-right">
			<li><a href="#">Game</a></li>
			<li class="active"><?PHP echo $game->category ?></li>
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
				<h3 class="section-title">Name:</h3>
				<p><?PHP echo $game->title ?></p>
				<h5 class="section-title">Author:</h5>
				<p><?PHP echo $game->author ?></p>
				<h5 class="section-title">Description:</h5>
				<p><?PHP echo nl2br($game->description) ?></p>
				<h5 class="section-title">Instructions:</h5>
				<p><?PHP echo nl2br($game->instructions) ?></p>
<!--				<h5 class="section-title">Plays:</h5>-->
<!--				<p>--><?PHP //echo $game->plays ?><!--</p>-->
<!--				<h5 class="section-title">Rating:</h5>-->
<!--				<p>--><?PHP //echo $game->rating ?><!--</p>-->
				<br/>
			</section>
			<section>
				<h2 class="section-title">Comments</h2>
				<ul class="list-unstyled">
					<?PHP foreach( $comments as $comment) : ?>
					<li class="comment">
						<div class="panel panel-default">
							<div class="panel-body">
								<img src="js/holder.js/100x100/sky/text:avatar" alt="" class="imageborder alignleft">
								<p><?PHP echo $comment->content ?></p>
							</div>
							<div class="panel-footer">
								<div class="row">
									<div class="col-lg-10 col-md-9 col-sm-8">
										<i class="fa fa-user"> </i> <?PHP echo $comment->author ?> <i class="fa fa-clock-o"></i>
										<?PHP echo date("M j, Y", strtotime($comment->date)) ?>
									</div>
								</div>
							</div>
						</div>
					</li>
					<?PHP endforeach ?>
				</ul>
			</section> <!-- comments -->
			<section class="comment-form">
				<h2 class="section-title">Leave a Comment</h2>
					<div class="form-group" <?PHP if ($this->session->userdata('id') != NULL) echo 'style="display: none;"'?>>
						<label for="inputName">Name</label>
						<input class="form-control" id="inputName" placeholder="Your name" <?PHP if ($this->session->userdata('name') != NULL) echo 'value="'.$this->session->userdata('name').'"'; ?>>
					</div>
					<div class="form-group">
						<label for="inputMessage">Mesagge</label>
						<textarea class="form-control" id="inputMessage" rows="6"></textarea>
					</div>
					<button id="submit" type="submit" class="btn btn-ar pull-right btn-primary">Submit</button>
			</section> <!-- comment-form -->

			<br/>

			<!-- Comment AJAX -->
			<script>
				$(document).ready(function()
				{
					$("#submit").click(function()
					{
						var author=$("#inputName" ).val();
						var content=$("#inputMessage").val();
						if ( author.length < 3 )
						{
							console.log("Name too short");
							return;
						}
						if ( content.length < 3 )
						{
							console.log("Content too short");
							return;
						}
						$.ajax({
							type: "POST",
							url: "<?PHP echo base_url() ?>ajax/comment",
							data: "id_game=<?PHP echo $game->id ?>&author="+author+"&content="+content,
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
		</div>
	</div>
</div>
