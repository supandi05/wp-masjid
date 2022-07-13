<?php if (have_posts()): ?>

	<div id="loop" class="list archives clear">

	<?php while (have_posts()): the_post(); ?>

		<div class="loop-block">
    		<div class="inblock">
	    		<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			</div>
		</div>

	<?php endwhile; ?>

	</div>

<?php endif; ?>
