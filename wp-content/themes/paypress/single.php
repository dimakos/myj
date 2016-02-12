<?php
/**
 * Шаблон отдельной записи (single.php)
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
		<div class="post-wrapper">
			<div class="col-md-9">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php // контэйнер с классами и id ?>
					<h1><?php the_title(); // заголовок поста ?></h1>
					<?php the_content(); // контент ?>
					<div class="meta">
						<p>Опубликовано: <?php the_time('F j, Y'); ?></p> <?php // дата и время создания ?>
						<?php the_tags('<p>Тэги: ', ',', '</p>'); // ссылки на тэги поста ?>
					</div>					
				</article>
			<?php endwhile; // конец цикла ?>
			<?php //previous_post_link('%link', '<- Предидущий пост: %title', TRUE); // ссылка на предидущий пост ?> 
			<?php //next_post_link('%link', 'Следующий пост: %title ->', TRUE); // ссылка на следующий пост ?> 
			<?php //if (comments_open() || get_comments_number()) comments_template('', true); // если комментирование открыто - мы покажем список комментариев и форму, если закрыто, но кол-во комментов > 0 - покажем только список комментариев ?>
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