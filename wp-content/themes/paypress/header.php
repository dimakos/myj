<?php
/**
 * Шаблон шапки (header.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); // вывод атрибутов языка ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); // кодировка ?>">
	<?php /* RSS и всякое */ ?>
	<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/style.css">
	<link rel="stylesheet" type="text/css" href="http://sources.sites.org.ua/bootstrap/bootstrap.css" />
	<!--<link rel="stylesheet" type="text/css" href="<?php /*echo get_template_directory_uri(); // абсолютный путь до темы*/ ?>/font-awesome/css/font-awesome.css" />--> 
	 <!--[if lt IE 9]>
	 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	 <![endif]-->
	<title><?php typical_title(); // выводи тайтл, функция лежит в function.php ?></title>
	<?php wp_head(); // необходимо для работы плагинов и функционала ?>
</head>
<body <?php body_class(); // все классы для body ?>>
	<header>
		<div class="header-line">
			<a href="http://myj.sites.org.ua/"><img class="logosmall" src="/images/logosmall.png" alt="mujnachas"></a>	
				<?php
				 $args = array( // опции для вывода верхнего меню, чтобы они работали, меню должно быть создано в админке
					'theme_location' => 'top', // идентификатор меню, определен в register_nav_menus() в function.php
					'container'=> 'nav', // обертка списка
					'menu_class' => 'bottom-menu', // класс для ul
					'menu_id' => 'bottom-nav', // id для ul
					);
					wp_nav_menu($args); // выводим верхнее меню ?>
				<?php if ( is_user_logged_in() ) { ?>
					<script>jQuery("#bottom-nav").append('<li id="menu-item-profile" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-profile"><a href="/profile/">Profile</a></li>');</script>
				<?php }
				else {?>
					<script>jQuery("#bottom-nav").append('<li id="menu-item-registration" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-registration"><a href="#" data-toggle="modal" data-target="#registrationmodal">Регистрация</a></li>');</script>
					<script>jQuery("#bottom-nav").append('<li id="menu-item-entry" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-entry"><a href="#" data-toggle="modal" data-target="#entrymodal">Войти</a></li>');</script>					
				<?php
				//echo class_exists('VK_api') ? VK_api::get_vk_login() : null;
				} ?> 
				

		</div>		
	</header>
	<center>
		<div class="modal fade" id="entrymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
			    <img src="/images/logosmall2.png">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel2">Войти</h4>
			  </div>			  
				<div class="modal-body">
					<form action="/profile?from=signin" method="post">
					  <div class="form-group">
						<!--<label for="Email">Email address</label>-->
						<input type="email" class="form-control" name="email" placeholder="Email">
						<!--<label for="Password">Password</label>-->
						<input type="password" class="form-control" name="password" placeholder="Password">
						<input type="submit" class="regbtn btn" value="Войти">
					  </div>
					</form>
					или <?php echo class_exists('VK_api') ? VK_api::get_vk_login() : null; ?>
				  </div>			  
				</div>
		  </div>
		</div>
		
		<div class="modal fade" id="registrationmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<img src="/images/logosmall2.png">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Регистрация</h4>
			  </div>
			  
			  <div class="modal-body">
				<form action="/profile?from=registration" method="post">
				  <div class="form-group">
					<label for="Email">Напишите ваш Email</label>
					<input type="email" class="form-control" name="email" placeholder="Email">
					<img src="/images/forreg.jpg"><br>
				    <input type="submit" class="regbtn btn" value="Зарегистрироваться">
				  </div>
				</form> 
					или <?php echo class_exists('VK_api') ? VK_api::get_vk_login() : null; ?>				
			  </div>			  
			</div>
		  </div>
		</div>	
	</center>	