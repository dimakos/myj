<?php
	if($_GET["from"] == 'registration') {
		$email = htmlspecialchars($_POST['email']);
		$user_name = $email;
		$user_id = username_exists( $user_name );
		if ( !$user_id and email_exists($email) == false ) {
			?> 
			<script>jQuery("#bottom-nav").append('<li id="menu-item-profile" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-profile"><a href="http://paypress.sites.org.ua/profile/">Profile</a></li>');</script>
			<?php
			$random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
			$user_id = wp_create_user( $user_name, $random_password, $email );
			
			// ----------------------------конфигурация-------------------------- //  
			$backurl="/profile";  // На какую страничку переходит после отправки письма 
			// Проверяем валидность e-mail 
			 
			if (!preg_match("|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is", 
			strtolower($email))) 
			 
			 { 
			 
			  echo 
			"<center>Вернитесь <a 
			href='javascript:history.back(1)'><B>назад</B></a>. Вы 
			указали неверные данные!"; 
			 
			  } 
			 
			 else 
			 
			 { 
			 
			$msg=" 
			Поздравляем с регистрацией на сайте PayPress.
			Ваш логин: $user_name
			Ваш пароль: $random_password
			Поменять личные данные вы сможете в настройках профиля

			"; 

			  // Отправляем письмо  
				mail("$email", "PayPress registration", "$msg");  
			 
			auto_login($user_name);
			if ( is_user_logged_in() ) { 
			echo('You are logged in.');
			$current_user = wp_get_current_user();
			echo 'Your username: ' . $current_user->user_login . '<br />';
			}
			else {
				echo('You are not logged in'); 
			}
			// Выводим сообщение пользователю  
			/*print "<script language='Javascript'><!-- 
			function reload() {location = \"$backurl\"}; setTimeout('reload()', 5000); 
			//--></script> 
			<p style='font-size: 24px; text-align:center;'>Your message was sent!</p>";  */
			exit; 
			} 
		} 
		else {
			$random_password = __('User already exists.  Password inherited.');
		}
	}
	if($_GET["from"] == 'signin') {
		$email = htmlspecialchars($_POST['email']);
		$login = get_user_by_email( $email );
		$login = $login->user_login;
		$password = htmlspecialchars($_POST['password']);
		wp_login($login, $password, true);
        wp_setcookie($login, $password, true); 
		 ?>
		<script>jQuery("#bottom-nav").append('<li id="menu-item-profile" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-profile"><a href="http://paypress.sites.org.ua/profile/">Profile</a></li>');</script>
<?php			
	}
?>
<?php
	$current_user = wp_get_current_user(); 
?>
<div class="container mt20">
	<div class="row">
		<div class="col-md-4">
			<form action="/handler?from=userdata" method="post" autocomplete="off">
			  <div class="form-group">
				<label for="logininput">Login</label>
				<input type="text" class="form-control" id="logininput" name="logininput" value="<?php echo $current_user->user_login ?>">
			  </div>
			  <div class="form-group">
				<label for="emailinput">Email address</label>
				<input type="email" class="form-control" id="emailinput" name="emailinput" value="<?php echo $current_user->user_email ?>">
			  </div>
			  <div class="form-group">
				<label for="passwordinput">Password</label>
				<input type="password" class="form-control" id="passwordinput" name="passwordinput" value="<?php echo $current_user->user_password ?>">
			  </div> 
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
</div> 