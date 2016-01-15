<?php get_header(); ?>
<?php
	if($_GET["from"] == 'userdata') {
		$current_user = wp_get_current_user(); 
		$user_id = $current_user->ID;
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
		header("Location: profile");
	}
	
	if($_GET["from"] == 'addressdata') {
		$current_user = wp_get_current_user(); 
		$user_id = $current_user->ID;
		$region = htmlspecialchars($_POST['regioninput']);
		$city = htmlspecialchars($_POST['cityinput']);
		$district = htmlspecialchars($_POST['districtinput']);
		$street = htmlspecialchars($_POST['streetinput']);
		$house = htmlspecialchars($_POST['houseinput']);
		$coordinates = htmlspecialchars($_POST['coordinatesinput']);
		$ip = htmlspecialchars($_POST['ipinput']);
		update_user_meta( $user_id, 'region', $region );
		update_user_meta( $user_id, 'city', $city );
		update_user_meta( $user_id, 'district', $district );
		update_user_meta( $user_id, 'street', $street );
		update_user_meta( $user_id, 'house', $house );
		update_user_meta( $user_id, 'coordinates', $coordinates );
		header("Location: profile");
	}
?> 

<?php get_footer(); // подключаем footer.php ?>