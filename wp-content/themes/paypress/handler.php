<?php get_header(); ?>
<?php  global $p;
	$p = 'profile';
	if($_GET["from"] == 'registration') {
		$email = htmlspecialchars($_POST['email']);
		$user_name = $email;
		$user_id = username_exists( $user_name );
		if ( !$user_id and email_exists($email) == false ) {
			$random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
			$user_id = wp_create_user( $user_name, $random_password, $email );
			
			// ----------------------------конфигурация-------------------------- //  
			$backuser_name = str_replace('@' , '' , $user_name);
			$backuser_name = str_replace('.' , '-' , $backuser_name);
			$backurl="/users/" . $backuser_name . "/profile/";  // На какую страничку переходит после отправки письма 
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
			Поздравляем с регистрацией на сайте Муж на час
			Ваш логин: $user_name
			Ваш пароль: $random_password
			Поменять личные данные вы сможете в настройках профиля

			"; 

			  // Отправляем письмо  
				mail("$email", "Муж на час: регистрация", "$msg");  
			 
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
			//exit; 
			} 
		} 
		else {
			$random_password = __('User already exists.  Password inherited.');
		}
		$backuser_name = str_replace('@' , '' , $user_name);
		$backuser_name = str_replace('.' , '-' , $backuser_name);
		//echo $backuser_name;
		//echo('1'); 
		header("Location: /users/" . $backuser_name . "/profile/");
	}
	if($_GET["from"] == 'signin') {
		$email = htmlspecialchars($_POST['email']);
		$login = get_user_by_email( $email );
		$login = $login->user_login;
		$password = htmlspecialchars($_POST['password']);
		wp_login($login, $password, true);
        wp_setcookie($login, $password, true); 
		$backuser_name = str_replace('@' , '' , $login);
		$backuser_name = str_replace('.' , '-' , $backuser_name);
		header("Location: /users/" . $backuser_name . "/profile/");	
	}
?> 
<?php
	$current_user = wp_get_current_user(); 
	$user_id = $current_user->ID;
	$user_login = $current_user->user_login;
	$backuser_name = str_replace('@' , '' , $user_login);
	$backuser_name = str_replace('.' , '-' , $backuser_name);
	if($_GET["from"] == 'userdata') {
		$firstname = htmlspecialchars($_POST['firstnameinput']);
		$lastname = htmlspecialchars($_POST['lastnameinput']);
		$email = htmlspecialchars($_POST['emailinput']);
		$password = htmlspecialchars($_POST['passwordinput']);
		$user_data = wp_update_user( array( 'ID' => $user_id, 'first_name' => $firstname, 'last_name' => $lastname, 'user_email' => $email, 'user_pass' => $password ) );
		if ( is_wp_error( $user_data ) ) {
			echo 'Error.';
		} else {
			echo 'User profile updated.';
		}
		$region = htmlspecialchars($_POST['regioninput']);
		$city = htmlspecialchars($_POST['cityinput']);
		$district = htmlspecialchars($_POST['districtinput']);
		$street = htmlspecialchars($_POST['streetinput']);
		$house = htmlspecialchars($_POST['houseinput']);
		$coordinates = htmlspecialchars($_POST['coordinatesinput']);
		$aboutme = htmlspecialchars($_POST['aboutmeinput']);
		update_user_meta( $user_id, 'region', $region );
		update_user_meta( $user_id, 'city', $city );
		update_user_meta( $user_id, 'district', $district );
		update_user_meta( $user_id, 'street', $street );
		update_user_meta( $user_id, 'house', $house );
		update_user_meta( $user_id, 'coordinates', $coordinates );
		update_user_meta( $user_id, 'aboutme', $aboutme );
		header("Location: /users/" . $backuser_name . "/profile");
	}
	
	if($_GET["from"] == 'becomeamaster') {
		update_user_meta( $user_id, 'ismaster', 'yes' );
		header("Location: /users/" . $backuser_name . "/master");
	}
	
	if($_GET["from"] == 'notamaster') {
		update_user_meta( $user_id, 'ismaster', 'no' );
		header("Location: /users/" . $backuser_name . "/profile");
	}
	
	if($_GET["from"] == 'rabtel') {
		$rabtel = htmlspecialchars($_POST['rabtel']);
		update_user_meta( $user_id, 'rabtel', $rabtel );
		header("Location: /users/" . $backuser_name . "/master");
	}
	
	if($_GET["from"] == 'newservice') {
		$serviceid = htmlspecialchars($_POST['serviceid']);
		$servicecatid = htmlspecialchars($_POST['servicecatid']);
		$servicemidcatid = htmlspecialchars($_POST['servicemidcatid']);
		$kolservs = get_user_meta($user_id, 'kolservs', true);
		if($kolservs == '') {
			$kolservs = 0;
		}
		$kolservs++;
		update_user_meta( $user_id, 'kolservs', $kolservs );
		$pricefrom = htmlspecialchars($_POST['pricefrom']);
		$priceto = htmlspecialchars($_POST['priceto']);
		$servicedesc = htmlspecialchars($_POST['servicedesc']);
		update_user_meta( $user_id, 'serviceid' . $kolservs, $serviceid );
		update_user_meta( $user_id, 'servicecatid' . $kolservs, $servicecatid );
		update_user_meta( $user_id, 'servicemidcatid' . $kolservs, $servicemidcatid );
		update_user_meta( $user_id, 'pricefrom' . $kolservs, $pricefrom );
		update_user_meta( $user_id, 'priceto' . $kolservs, $priceto );
		update_user_meta( $user_id, 'servicedesc' . $kolservs, $servicedesc );
		header("Location: /users/" . $backuser_name . "/master");
	}
	
	if($_GET["from"] == 'delserv') {
		$servnum = $_GET["servnum"];
		delete_user_meta ($user_id, 'serviceid' . $servnum);
		delete_user_meta ($user_id, 'servicecatid' . $servnum);
		delete_user_meta ($user_id, 'servicemidcatid' . $servnum);
		delete_user_meta ($user_id, 'pricefrom' . $servnum);
		delete_user_meta ($user_id, 'priceto' . $servnum);
		delete_user_meta ($user_id, 'servicedesc' . $servnum);
		header("Location: /users/" . $backuser_name . "/master");
	}
	
	if($_GET["from"] == 'vkentry') { 
		header("Location: /users/" . $backuser_name . "/profile");
	}
?> 

<?php get_footer(); // подключаем footer.php ?>