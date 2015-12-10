<div class="pluginsection">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>PayPress v1.0.1 </h1>
				<p>PayPress is a WordPess assembly used like a good instrument for site developement.</p>
				<button type="button" class="btn btn-orange">Buy 15$</button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2>Payment systems</h2>
				<p><a href="https://payeer.com/" target="_blank"><img src="https://payeer.com/bitrix/templates/difiz/img/quote-logo.png" alt=""></a></p> 
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h2>WP Plugins:</h2>
				<p>GITHUB</p>
				<p>Contact Form 7</p>
				<p>Insert PHP</p>
				<p>HTML Editor Syntax Highlighter</p> 
				<p>Envira Gallery</p>
				<p>Polylang</p>
				<p>All in One Seo Pack</p>
				<p>Robo Maps</p>
				<p>Enable/Disable Auto Login when Register</p>
			</div>
			<div class="col-md-4">
				<h2>WP changes</h2>
				<p>Admin bar was removed from frontend</p>
				<p>Auto p filter was removed</p>
				<p>Includes page_name.php to every page</p>
				<p>User registration and sign in were added</p>
				<p>/wp-admin was closed</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h2>CSS preprocessors</h2>
				<p>SASS with PH<a style="color: #333;" href="/wp-content/themes/paypress/scsswithphp/php-sass-watcher/php-sass-watcher.php" target="_blank">P</a></p> 
			</div>
			<div class="col-md-4">
				<h2>CSS frameworks</h2>
				<p>Bootstrap</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2>JS Plugins</h2>
				<p>Device JS</p> 
			</div>
		</div>
	</div>
</div>
<div class="usersection">
	<div class="container">
		<?php if ( is_user_logged_in() ) { 
			echo('You are logged in.');
			$current_user = wp_get_current_user();
			echo 'Your username: ' . $current_user->user_login . '<br />'; ?>
			<a href="<?php echo wp_logout_url('/'); ?>">Logout</a>
		<?php }
		else {
			echo('<p>You are not logged in</p>'); 
		 
		echo('<button type="button" id="registrationbutton" class="btn btn-success" data-toggle="modal" data-target="#myModal">Registration</button><button type="button" id="signinbutton" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Sign in</button>');
		?>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Registration</h4>
			  </div>
			  <form action="/profile?from=registration" method="post">
				<div class="modal-body">
				  <div class="form-group">
					<label for="Email">Email address</label>
					<input type="email" class="form-control" name="email" placeholder="Email">
				    <input type="submit" class="btn btn-primary" value="Create account">
				  </div>
				</div>
			  </form>
			</div>
		  </div>
		</div>
		
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel2">Sign in</h4>
			  </div>
			  <form action="/profile?from=signin" method="post">
				<div class="modal-body">
				  <div class="form-group">
					<label for="Email">Email address</label>
					<input type="email" class="form-control" name="email" placeholder="Email">
				    <label for="Password">Password</label>
					<input type="password" class="form-control" name="password" placeholder="Password">
					<input type="submit" class="btn btn-primary" value="Sign in">
				  </div>
				</div>
			  </form>
			</div>
		  </div>
		</div>
		<?php } ?>  
	</div>
</div>