<?php
	if($_GET["from"] == 'userdata') {
		$login = htmlspecialchars($_POST['logininput']);
		$email = htmlspecialchars($_POST['emailinput']);
		$password = htmlspecialchars($_POST['passwordinput']);
		$current_user = wp_get_current_user(); 
		$userdata = array(
			'ID' => $current_user->user_id
			,'user_pass' => $password //обязательно
			,'user_login' => $login //обязательно
			,'user_email' => $email
		);
		$user_id = wp_update_user($userdata);
	}
?>