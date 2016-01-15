<?php get_header(); ?>



<?php  
	global $p;
	$p = 'profile';
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
		header("Location: profile");
	}
	if($_GET["from"] == 'signin') {
		$email = htmlspecialchars($_POST['email']);
		$login = get_user_by_email( $email );
		$login = $login->user_login;
		$password = htmlspecialchars($_POST['password']);
		wp_login($login, $password, true);
        wp_setcookie($login, $password, true); 
		header("Location: profile");
		 ?>
		<script>jQuery("#bottom-nav").append('<li id="menu-item-profile" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-profile"><a href="http://paypress.sites.org.ua/profile/">Profile</a></li>');</script>
<?php			
	}
?> 
<?php
	$current_user = wp_get_current_user(); 
	$user_id = $current_user->ID;
?>
<?php if($_GET["allowiploc"] == 'true') { 
	require_once("ipgeobase/ipgeobase.php");
	$gb = new IPGeoBase();
	$data = $gb->getRecord($_SERVER["REMOTE_ADDR"]);
}?>
<div class="container mt20 profilecontainer">
	<div class="profilehead">
		<div class="ava">
			<!--<img src="/images/LKava.png">-->
			<?php echo get_avatar($user_id, 150); ?>
			<!--<a href="">-->
		</div>
		<h2><?php echo $current_user->first_name; ?> <?php echo $current_user->last_name; ?></h2>
		<?php $city = get_user_meta($user_id, 'city', true);
		if ($city  != '') {
			echo('<p>город ' . $city . '</p>');
		}
		?>
		<p>Пользуется сайтом с <?php echo do_shortcode('[membersince]') ?></p>
	</div>

<ul class="nav nav-tabs nav-justified">
  <li class="active"><a data-toggle="tab" href="#myprofile"><img class="profileicons" src="/images/profile.png">профиль</a></li>
  <li><a data-toggle="tab" href="#mymessages"><img class="profileicons" src="/images/messages.png">сообщения<span class="mymessagenumbermain">4</span></a></li>
  <li><a data-toggle="tab" href="#mytestimonials"><img class="profileicons" src="/images/testimonials.png">отзывы</a></li>
  <li><a data-toggle="tab" href="#myfavourites"><img class="profileicons" src="/images/favourites.png">избранное</a></li>
  <li><a data-toggle="tab" href="#becomemaster"><img class="profileicons" src="/images/becomeamaster.png">стать мастером</a></li>
</ul>	

	<div class="tab-content">
		<div id="myprofile" class="tab-pane fade in active">
			<div class="col-md-6">
					<?php 
						if($_GET["allowiploc"] == 'true') {
							$region = $data['region'];
							$city = $data['city'];
						}
						else if ($_GET["allowgmaps"] == 'true') {
							$region = '';
							$city = '';
							$district = '';
							$street = '';
							$house = '';
						}
						else {
							$region = get_user_meta($user_id, 'region', true);
							$city = get_user_meta($user_id, 'city', true);
							$district = get_user_meta($user_id, 'district', true);
							$street = get_user_meta($user_id, 'street', true);
							$house = get_user_meta($user_id, 'house', true);
							$aboutme = get_user_meta($user_id, 'aboutme', true);
						}
					?>
					<form action="/handler?from=userdata" method="post" autocomplete="off">
						<div class="form-group">
							<label for="firstnameinput">Имя</label>
							<input type="text" class="form-control" id="firstnameinput" name="firstnameinput" value="<?php echo $current_user->first_name; ?>">
						</div>
						<div class="form-group">
							<label for="lastnameinput">Фамилия</label>
							<input type="text" class="form-control" id="lastnameinput" name="lastnameinput" value="<?php echo $current_user->last_name; ?>">
						</div>
						<div class="form-group">
							<?php 
							$showmail = $current_user->user_email;
							if (substr($showmail, 0, 5) == 'vk_id') {
								$mailorvk = 'VK id';
								$showmail = substr($showmail, 5, -7);
								$disabled = 'disabled="disabled"';
							}
							else {
								$mailorvk = 'E-mail';
								$disabled = '';
							}
							?>
							<label for="emailinput"><?php echo($mailorvk); ?></label>
							<input <?php echo($disabled); ?> type="email" class="form-control" id="emailinput" name="emailinput" value="<?php echo $showmail; ?>">
						</div>	
						<div class="form-group">
							<a href="/profile?allowgmaps=true">
								Определить адрес автоматически
							</a>
						</div>
						<div class="form-group">
							<label for="regioninput">Область</label>
							<input type="text" class="form-control" id="regioninput" name="regioninput" value="<?php echo($region); ?>">
						</div>
						<div class="form-group">
							<label for="cityinput">Город</label>
							<input type="text" class="form-control" id="cityinput" name="cityinput" value="<?php echo($city); ?>">
						</div>
						<div class="form-group">
							<label for="districtinput">Район</label>
							<input type="text" class="form-control" id="districtinput" name="districtinput" value="<?php echo($district); ?>">
						</div>					
						
						<div class="form-group">
							<label for="streetinput">Улица</label>
							<input type="text" class="form-control" id="streetinput" name="streetinput" value="<?php echo($street); ?>">
						</div>
						<div class="form-group">
							<label for="houseinput">Дом</label>
							<input type="text" class="form-control" id="houseinput" name="houseinput" value="<?php echo($house); ?>">
						</div>
						<div class="form-group">
							<label for="houseinput">О себе</label>
							<textarea type="text" class="form-control" id="aboutmeinput" name="aboutmeinput" value="<?php echo($aboutme); ?>"></textarea>
						</div>
						<?php if($_GET["allowgmaps"] == 'true') { ?>
							<div class="form-group dn">
								<label for="coordinatesinput">Координаты</label>
								<input type="text" readonly class="form-control" id="coordinatesinput" name="coordinatesinput" value="<?php //echo $current_user->last_name; ?>">
							</div>
						<?php } ?>
						<div class="form-group">
							<button type="submit" class="button">Сохранить</button>
						</div>	 
					</form>  
			</div>
				<div class="col-md-6">
					<div id="map"></div>
				</div>
		</div>
	  
		<div id="mymessages" class="tab-pane fade">
			<ol class="messages">
				<li>
					<img class="messageava" src="/images/LKava.png" alt="">
					<span class="messagename">Дмитрий Косыгин</span>
					<span class="messagecounter">02.01.2016, Среда<img src="/images/messages.png"><span class="mymessagenumber">2</span><img src="/images/close-sign.png"></span>
				</li>
				<li>
					<img class="messageava" src="/images/LKava2.png" alt="">
					<span class="messagename">Александр Хмара</span>
					<span class="messagecounter">28.12.2015, Четверг<img src="/images/messages.png"><span class="mymessagenumber">3</span><img src="/images/close-sign.png"></span>
				</li>
				<li>
					<img class="messageava" src="/images/LKava3.png" alt="">
					<span class="messagename">Анна Яковчук</span>
					<span class="messagecounter">28.12.2015, Четверг<img src="/images/messages.png"><span class="mymessagenumber">1</span><img src="/images/close-sign.png"></span>
				</li>
				<li>
					<img class="messageava" src="/images/LKava4.png" alt="">
					<span class="messagename">Таисия Яковчук</span>
					<span class="messagecounter">18.12.2015, Понедельник<img src="/images/messages.png"><span class="mymessagenumber">5</span><img src="/images/close-sign.png"></span>
				</li>				
			</ol>
		</div>
		<div id="mytestimonials" class="tab-pane fade">
			<ol class="messages">
				<li>
					<img class="messageava" src="/images/LKava.png" alt="">
					<span class="messagename">Дмитрий Косыгин</span>
					<span class="rang">Оценка: 5</span>
					<span class="testimonialseparator">
						<p>Все прошло замечательно. Ехали в Одессу втроем. Спасибо водителю за ожидание третьего пассажира! Доехали быстро, водитель очень аккуратно ехал. Также много рассказал интерсного про город Одесса. Спасибо!</p>
						<p>18.12.2015, Понедельник</p>
					</span>
				</li>	
				<li>
					<img class="messageava" src="/images/LKava2.png" alt="">
					<span class="messagename">Александр Хмара</span>
					<span class="rang">Оценка: 5</span>
					<span class="testimonialseparator">
						<p>очень хорошо сделал дизайн!</p>
						<p>18.12.2015, Понедельник</p>
					</span>
				</li>
				<li>
					<img class="messageava" src="/images/LKava3.png" alt="">
					<span class="messagename">Анна Яковчук</span>
					<span class="rang">Оценка: 4</span>
					<span class="testimonialseparator">
						<p>НЕВЕРОЯТНЫЙ ЧЕЛОВЕК! Оказал услугу так, что я на 5 лет помолодела! Короче довольна!</p>
						<p>18.12.2015, Понедельник</p>
					</span>
				</li>			
			</ol>
		</div>
		<div id="myfavourites" class="tab-pane fade">
			<ol class="messages">
				<li>
					<img class="messageava" src="/images/LKava.png" alt="">
					<span class="messagename">Дмитрий Косыгин</span>
					<button class="button">Посмотреть профиль</button>
				</li>	
				<li>
					<img class="messageava" src="/images/LKava2.png" alt="">
					<span class="messagename">Александр Хмара</span>
					<button class="button">Посмотреть профиль</button>
				</li>	
				<li>
					<img class="messageava" src="/images/LKava3.png" alt="">
					<span class="messagename">Анна Яковчук</span>
					<button class="button">Посмотреть профиль</button>
				</li>	
				<li>
					<img class="messageava" src="/images/LKava4.png" alt="">
					<span class="messagename">Таисия Яковчук</span>
					<button class="button">Посмотреть профиль</button>
				</li>				
			</ol>
		</div>
		<div id="becomemaster" class="tab-pane fade">
		<h3>Заполните поля ниже для того, стать мастером на нашем сайте и учавствовать в поисковой выдаче!</h3>

			<div class="accordion" id="accordion2">
			  <div class="accordion-group">
				<div class="accordion-heading">
					<img class="floatleft" src="/images/santehnik-1.png">
				  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
					Сантехник
				  </a>
				</div>
				<div id="collapseOne" class="accordion-body collapse in">
				  <div class="accordion-inner">
					<ul><span>Ванна</span>
						<li>монтаж ванны с установкой смесителя, сифона и душевого шланга</li>
						<li>монтаж новой ванны с демонтажем старой ванны</li>
						<li>установка экрана для ванной</li>
					</ul>
					<ul><span>Душевая кабина</span>
						<li>монтаж и подключение душевой кабинки</li>
						<li>монтаж и подключение душевого бокса</li>
						<li>замена дверок душевой кабины</li>
					</ul>
					<ul><span>Унитаз</span>
						<li>монтаж унитаза</li>
						<li>замена или ремонт бачка</li>
						<li>замена или ремонт гофры унитаза</li>
					</ul>
				  </div>
				</div>
			  </div>
			  <div class="accordion-group">
				<div class="accordion-heading">
					<img class="floatleft" src="/images/elektrik-1.png">
				  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
					Электрик
				  </a>
				</div>
				<div id="collapseTwo" class="accordion-body collapse in">
				  <div class="accordion-inner">
					<ul><span>Ванна</span>
						<li>монтаж ванны с установкой смесителя, сифона и душевого шланга</li>
						<li>монтаж новой ванны с демонтажем старой ванны</li>
						<li>установка экрана для ванной</li>
					</ul>
					<ul><span>Душевая кабина</span>
						<li>монтаж и подключение душевой кабинки</li>
						<li>монтаж и подключение душевого бокса</li>
						<li>замена дверок душевой кабины</li>
					</ul>
					<ul><span>Унитаз</span>
						<li>монтаж унитаза</li>
						<li>замена или ремонт бачка</li>
						<li>замена или ремонт гофры унитаза</li>
					</ul>
				  </div>
				  </div>
				</div>
			  </div>
			  <div class="accordion-group">
				<div class="accordion-heading">
					<img class="floatleft" src="/images/mebel-1.png">
				  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
					Столяр
				  </a>
				</div>
				<div id="collapseOne" class="accordion-body collapse in">
				  <div class="accordion-inner">
					<ul><span>Ванна</span>
						<li>монтаж ванны с установкой смесителя, сифона и душевого шланга</li>
						<li>монтаж новой ванны с демонтажем старой ванны</li>
						<li>установка экрана для ванной</li>
					</ul>
					<ul><span>Душевая кабина</span>
						<li>монтаж и подключение душевой кабинки</li>
						<li>монтаж и подключение душевого бокса</li>
						<li>замена дверок душевой кабины</li>
					</ul>
					<ul><span>Унитаз</span>
						<li>монтаж унитаза</li>
						<li>замена или ремонт бачка</li>
						<li>замена или ремонт гофры унитаза</li>
					</ul>
				  </div>
				</div>
			  </div>
			</div>
		
    </div>	
</div>
	

</div> 
<?php if($_GET["allowgmaps"] == 'true') { ?>
<script src="/wp-content/themes/paypress/js/geolocations.js" type="text/javascript"></script> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbsiIHfsaZ0nPyqGSX2vmbxxjfXibgtpI&signed_in=true&language=ru&callback=initMap" type="text/javascript"></script> 
<?php } ?>

<?php get_footer(); // подключаем footer.php ?>