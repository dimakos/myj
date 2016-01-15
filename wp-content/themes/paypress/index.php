<?php
/**
 * Главная страница (index.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?> 
<section>
	<div class="container">
		<div class="row">
		<div class="breadcrumbs">
			<?php if ( function_exists( 'bread_crumb' ) ) bread_crumb( 'type=string' ); ?>
		</div>		
			<div class="blog-wrapper">
				<div class="col-md-3">
					<?php wp_nav_menu( array('menu' => 'sidebar-blog' )); ?>
					<img src="/images/happymuj2.png" alt="">
				</div>				
				<div class="col-md-9">
				<h1>Наш блог</h1>
					<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
						<?php get_template_part('loop'); // для отображения каждой записи берем шаблон loop.php ?>
					<?php endwhile; // конец цикла
					else: echo '<h2>Нет записей.</h2>'; endif; // если записей нет, напишим "простите" ?>	 
					<?php pagination(); // пагинация, функция нах-ся в function.php ?>
				</div>				
			</div>
		</div>
	</div>	
</section>
<?php get_footer(); // подключаем footer.php ?>