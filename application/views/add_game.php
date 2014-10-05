
<header class="main-header">
	<div class="container">
		<h1 class="page-title">Add game</h1>

		<ol class="breadcrumb pull-right">
			<li><a href="#">Game</a></li>
			<li class="active">add</li>
		</ol>
	</div>
</header>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<section>
				<?php echo form_open_multipart('game/upload', array('role'=>'form', 'method'=>'POST'));?>
					<div class="form-group">
						<label for="InputTitle">Title</label>
						<input name="title" class="form-control" id="InputTitle">
					</div>
					<div class="form-group">
						<label for="InputAuthor">Author</label>
						<input name="author" class="form-control" id="InputAuthor">
					</div>
					<div class="form-group">
						<label for="InputIframe">Iframe</label>
						<input name="iframe" class="form-control" id="InputIframe">
					</div>
					<div class="form-group">
						<label for="InputDescription">Description</label>
						<textarea name="description" class="form-control" id="InputDescription" rows="8"></textarea>
					</div>
					<div class="form-group">
						<label for="InputInstructions">Instructions</label>
						<textarea name="instructions" class="form-control" id="InputInstructions" rows="8"></textarea>
					</div>
					<div class="form-group">
						<label for="InputCategory">Category</label>
						<select name="categoryId" id="InputCategory" class="form-control">
							<?PHP
							foreach ($categories as $category)
								echo "<option value=".$category->id.">".$category->name."</option>";
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="InputImage">Image</label>
						<input id="InputImage" type="file" name="img" class="form-control" style="padding-bottom: 42px"/>
					</div>
					<button type="submit" class="btn btn-ar btn-primary">Submit</button>
					<div class="clearfix"></div>
				<?PHP echo form_close()?>
			</section>
		</div>

<!--		<div class="col-md-4">-->
<!--			<section>-->
<!--				<div class="panel panel-primary">-->
<!--					<div class="panel-heading"><i class="fa fa-envelope-o"></i> Additional Information</div>-->
<!--					<div class="panel-body">-->
<!--						<h4 class="section-title no-margin-top">Contacts</h4>-->
<!--						<address>-->
<!--							<strong>Open Mind, Inc.</strong><br>-->
<!--							795 Folsom Ave, Suite 600<br>-->
<!--							San Francisco, CA 94107<br>-->
<!--							<abbr title="Phone">P:</abbr> (123) 456-7890 <br>-->
<!--							Mail: <a href="#">support@openmid.com</a>-->
<!--						</address>-->
<!---->
<!--						<!-- Business Hours -->
<!--						<h4 class="section-title no-margin-top">Business Hours</h4>-->
<!--						<ul class="list-unstyled">-->
<!--							<li><strong>Monday-Friday:</strong> 9am to 7pm</li>-->
<!--							<li><strong>Saturday:</strong> 9am to 2pm</li>-->
<!--							<li><strong>Sunday:</strong> Closed</li>-->
<!--						</ul>-->
<!--					</div>-->
<!--				</div>-->
<!--			</section>-->
<!--		</div>-->
	</div>

	<hr class="dotted">

</div> <!-- container -->