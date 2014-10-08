
<header class="main-header">
	<div class="container">
		<h1 class="page-title">Add game</h1>

		<ol class="breadcrumb pull-right">
			<li><a href="#">Game</a></li>
			<li class="active">add</li>
		</ol>
	</div>
</header>

<?PHP

	function bs_form_error( $field )
	{
		$error = form_error( $field );
		$res = '';
		if ( $error != '' )
		{
			$res =
			'<div class="alert alert-danger">' .
				'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' .
				$error .
			'</div>';
		}
		return $res;
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<section>
				<?PHP
					if ( isset($error) )
					{
						echo '<div class="alert alert-danger">' .
						'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' .
						$error .
						'</div>';
					}
					else if ( isset($success) )
					{
						echo '<div class="alert alert-success">' .
							'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' .
							$success .
							'</div>';
					}
				?>
				<?php echo form_open_multipart('game/add', array('role'=>'form', 'method'=>'POST'));?>
					<div class="form-group">
						<label for="InputTitle">Title</label>
                        <?php echo bs_form_error( 'title' ); ?>
						<input name="title" class="form-control" id="InputTitle" value="<?PHP if (isset($post)) echo $post['title']?>">
					</div>
					<div class="form-group">
						<label for="InputAuthor">Author</label>
						<?php echo bs_form_error( 'author' ); ?>
						<input name="author" class="form-control" id="InputAuthor" value="<?PHP if (isset($post)) echo $post['author']?>">
					</div>
					<div class="form-group">
						<label for="InputIframe">Iframe</label>
						<?php echo bs_form_error( 'iframe' ); ?>
						<input name="iframe" class="form-control" id="InputIframe">
					</div>
					<div class="form-group">
						<label for="InputDescription">Description</label>
						<?php echo bs_form_error( 'description' ); ?>
						<textarea name="description" class="form-control" id="InputDescription" rows="8"><?PHP if (isset($post)) echo $post['description']?></textarea>
					</div>
					<div class="form-group">
						<label for="InputInstructions">Instructions</label>
						<?php echo bs_form_error( 'instructions' ); ?>
						<textarea name="instructions" class="form-control" id="InputInstructions" rows="8"><?PHP if (isset($post)) echo $post['instructions']?></textarea>
					</div>
					<div class="form-group">
						<label for="InputCategory">Category</label>
						<?php echo bs_form_error( 'categoryId' ); ?>
						<select name="categoryId" id="InputCategory" class="form-control">
							<?PHP
							foreach ($categories as $category)
								echo "<option value=".$category->id.">".$category->name."</option>";
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="InputImage">Image</label>
						<?php echo bs_form_error( 'img' ); ?>
						<input id="InputImage" type="file" name="img" class="form-control" style="padding-bottom: 42px"/>
					</div>
					<button type="submit" class="btn btn-ar btn-primary">Submit</button>
					<div class="clearfix"></div>
				<?PHP echo form_close()?>
			</section>
		</div>
	</div>

	<hr class="dotted">

</div> <!-- container -->