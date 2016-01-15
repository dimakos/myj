<?php
/**
 * Запись в цикле (loop.php)
 * @package WordPress
 * @subpackage your-clean-template
 */ 
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php // контэйнер с классами и id ?>
		<?php if ( has_post_thumbnail() ) the_post_thumbnail(); // выводим миниатюру поста, если есть ?>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><?php // заголовок поста и ссылка на его полное отображение (single.php) ?>
		<?php //the_content(''); // пост превью, до more ?>
		<?php the_excerpt();  ?>
		<div class="meta">
			<p>Категории: <?php the_category(',') ?></p> <?php // ссылки на категории в которых опубликован пост, через зпт ?>
			<p>Опубликовано: <?php the_time('F j, Y'); ?></p> <?php // дата и время создания ?>
			<?php the_tags('<p>Тэги: ', ',', '</p>'); // ссылки на тэги поста ?>
		</div>
	</article>
	