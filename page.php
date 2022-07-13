<?php get_header(); ?>

    <div class="contents">
	<?php if (have_posts()): ?>
		<?php while (have_posts()): the_post(); ?>

			<div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
				<div class="post-meta">
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="post-content"><?php the_content(); ?></div>
			</div>

		<?php endwhile; ?>
	<?php endif; ?>
    </div>

<?php get_footer(); ?>