<?php
/**
 * Шаблон рубрики (category.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?> 
<div class="container">
	<div class="row">
		<div class="breadcrumbs">
			<?php if ( function_exists( 'bread_crumb' ) ) bread_crumb( 'type=string' ); ?>
		</div>	
		<section class="blog-wrapper">
			<h1><?php wp_title(''); // Заголовок категории ?></h1>
			<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
				<?php get_template_part('loop'); // для отображения каждой записи берем шаблон loop.php ?>
			<?php endwhile; // конец цикла
			else: echo '<h2>Нет записей.</h2>'; endif; // если записей нет, напишим "простите" ?>	 
			<?php pagination(); // пагинация, функция нах-ся в function.php ?>
		</section>
	</div>
</div>
<?php get_footer(); // подключаем footer.php ?>