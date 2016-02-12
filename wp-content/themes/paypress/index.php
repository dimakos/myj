<?php
/**
 * Главная страница (index.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?> 
<div class="background">
	<div class="container">
		<div class="floatright">
			<p>"Муж на Час" поможет найти надежного исполнителя<br> для решения любых задач!</p>
			<a href="http://muj.com.ua" target="blank"><button class="searchbtn">Найти мастера</button></a>
		</div>
	</div>		
</div>
<section>
	<div class="container">
		<div class="row">
			<div class="blog-wrapper">
				<h1>Наш блог</h1>
				<div class="col-md-9">				
					<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
						<?php get_template_part('loop'); // для отображения каждой записи берем шаблон loop.php ?>
					<?php endwhile; // конец цикла
					else: echo '<h2>Нет записей.</h2>'; endif; // если записей нет, напишим "простите" ?>	 
					<?php pagination(); // пагинация, функция нах-ся в function.php ?>
				</div>	

				<div class="col-md-3">
					<!--<img src="/images/happymuj2.png" alt="">-->
					<p class="blog-category">Категории статей</p>
					<?php wp_nav_menu( array('menu' => 'sidebar-blog' )); ?>
					<div class="phone-calls">
						<center>
						<div class="call-center-img">
							<img src="/images/call-center.jpg">
						</div>
						<p>Телефон гарячей линии:</p>
						<p style="font-weight: 800;">(093) 212 3368</p>
						<p id="time-selector">Пн-Пт с 9:00 до 20:00</p>
						</center>
					</div>
				</div>
				
			</div>
		</div>
	</div>	
</section>
<?php get_footer(); // подключаем footer.php ?>