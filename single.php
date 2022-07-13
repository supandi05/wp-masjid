<?php get_header(); ?>

    <div class="contents">
	<?php if (have_posts()): ?>
		<?php while (have_posts()): the_post(); ?>

			<div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
				<div class="post-meta">
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="post-content">
				    <?php printf(__('<strong>Diterbitkan</strong> : <span class="post-date">%s</span>', 'wpmasjid'),
						get_the_time('l, j M Y')
					); ?><br/>
					<strong>Kategori</strong> : <?php the_category(' / '); ?><br/>
					<?php if (comments_open()): ?>
						<strong>Komentar</strong> : <a href="#comments"><?php comments_number(__('0 komentar', 'wpmasjid'), __('1 komentar', 'wpmasjid'), __('% komentar', 'wpmasjid'), '', __('komentar ditutup', 'wpmasjid') ); ?></a>
					<?php endif; ?>
			    	<?php the_content(); ?>
				</div>
				<div class="post-footer"><?php the_tags(''.__('', 'wpmasjid').'', ' '); ?></div>
				<?php wp_link_pages(array(
					'before' => '<p class="page-links"><span class="page-links-title">'.__('Pages:', 'wpmasjid').'</span>',
					'after' => '</p>',
					'link_before' => '<span>',
					'link_after' => '</span>',
				)); ?>
			</div>
			<div class="post-navigation clear">
				<?php
					$prev_post = get_adjacent_post(false, '', true);
					$next_post = get_adjacent_post(false, '', false); ?>
					<?php if ($prev_post): $prev_post_url = get_permalink($prev_post->ID); $prev_post_title = $prev_post->post_title; ?>
						<a class="post-prev" href="<?php echo $prev_post_url; ?>"><em><?php _e('Sebelumnya', 'wpmasjid'); ?></em><span><?php echo $prev_post_title; ?></span></a>
					<?php endif; ?>
					<?php if ($next_post): $next_post_url = get_permalink($next_post->ID); $next_post_title = $next_post->post_title; ?>
						<a class="post-next" href="<?php echo $next_post_url; ?>"><em><?php _e('Sesudahnya', 'wpmasjid'); ?></em><span><?php echo $next_post_title; ?></span></a>
					<?php endif; ?>
			</div>
		
		<?php endwhile; ?>
	<?php endif; ?>
	
	<?php query_posts('post_type=post&showposts=6'); ?>
	        <div class="single clear">
		    	<div class="post-meta">
			 		<h1>Berita Lainnya</h1>
		    	</div>
			</div>
	<?php if (have_posts()): ?>
		<?php while (have_posts()): the_post(); ?>

			<div class="single clear">
				<div class="post-content">
				    <strong><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></strong><br/>
			    	<?php if (function_exists('smart_excerpt')) smart_excerpt(get_the_excerpt(), 30); ?>
				</div>
			</div>
			
		<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_query(); ?>
	<br/><br/>
	<?php comments_template(); ?>
	</div>

<?php get_footer(); ?>
