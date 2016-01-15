<?php get_header(); ?>
<div class="container blogcontainer mt20 mb20">
	<div class="row">
		<div class="col-md-12">
			<article>
				<?php // Display blog posts on any page @ http://m0n.co/l
				$temp = $wp_query; $wp_query= null;
				$predver = '';
				$wp_query = new WP_Query(); $wp_query->query('showposts=10' . '&paged='.$paged);
				while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<?php $title = get_the_title(); 
					$title = mb_strtolower(str_replace(" ","", $title)); 
					$title = str_replace(".","-", $title); 
					$title = 'blog-' . $title;
					$fullversion = str_replace("blog-version","", $title);
					$fullversionpieces = explode("-", $fullversion);
					$fullversion = $fullversionpieces[0] . '-' . $fullversionpieces[1];
					if ($fullversion != $predver) {
						if($fullversion == '1-0') { ?> <h2 class="versionh2">PayPress Start</h2> <?php }
						if($fullversion == '1-1') { ?> <h2 class="versionh2">PayPress Locations</h2> <?php }
						if($fullversion == '1-2') { ?> <h2 class="versionh2">PayPress Social</h2> <?php }
					}
					$predver = $fullversion;
					?>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<div class="meta">
						<p>Published: <?php the_time('d.m.Y'); ?> <?php the_time('G:i'); ?></p> <?php // дата и время создания ?>
					</div>
					<?php
					get_template_part($title); 
					?>
				<?php endwhile; ?>
		 
				<?php if ($paged > 1) { ?>
		 
				<nav id="nav-posts">
					<div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
					<div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
				</nav>
		 
				<?php } else { ?>
		 
				<nav id="nav-posts">
					<div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
				</nav>
		 
				<?php } ?>
		 
				<?php wp_reset_postdata(); ?>
			</article>
		</div>
	</div>
</div>
<?php get_footer(); // подключаем footer.php ?>