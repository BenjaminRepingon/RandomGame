<!-- Main -->
<section id="main">

	<div>
		<h2>Register</h2>
		<?php
		//class and id of <form>
		$form_attributes = array( 'class' => 'register', 'id' => 'register' );

		//data requiered for form || array (input_name, id_input)
		$email = array( 'name' => 'email', 'id' => 'email' );
		$password = array( 'name' => 'password', 'id' => 'password' );
		$namespace = array( 'name' => 'namespace', 'id' => 'namespace' );

		//form
		echo form_open( '/register', $form_attributes );
		?>

		<label for="email">Email:</label>
		<input id="email" type="email" name="email" values="<?php echo set_value( 'email' ); ?>">
		<?php echo form_error( 'email', '<span class=error"error">', "</span>" ); ?>
		<br/>

		<label for="password">Password</label>
		<input id="password" type="password" name="password" values="<?php echo set_value( 'password' ); ?>">
		<?php echo form_error( 'pass', '<span class=error"error">', "</span>" ); ?>
		<br/>

		<label for="namespace">http://typedef.com/</label>
		<input id="namespace" type="text" name="namespace" values="<?php echo set_value( 'namespace' ); ?>">
		<?php echo form_error( 'namespace', '<span class=error"error">', "</span>" ); ?>
		<br/>

		<?php
		echo form_submit( 'submit', 'Valider' );
		echo form_close();
		?>
	</div>

</section>