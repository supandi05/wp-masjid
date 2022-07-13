<?php if (have_posts()): ?>
	<div id="loop" class="list archives clear">
	<?php while (have_posts()): the_post(); ?>

		<div <?php post_class('post clear'); ?> id="post_<?php the_ID(); ?>">
			<?php if (has_post_thumbnail()): ?>
			<a href="<?php the_permalink() ?>" class="ndesothumb"><?php the_post_thumbnail('thumb', array(
					'alt' => trim(strip_tags($post->post_title)),
					'title' => trim(strip_tags($post->post_title)),
				)); ?></a>
			<?php endif; ?>
			<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

			<div class="post-content">
		     	<strong>INFO HUBUNGI</strong> : <?php echo get_post_meta($post->ID, '_hubungi', true); ?> ( <?php echo get_post_meta($post->ID, '_informasi', true); ?> )<br/>
		    	<?php if (function_exists('smart_excerpt')) smart_excerpt(get_the_excerpt(), 30); ?>
			</div>
		</div>

	<?php endwhile; ?>
	</div>
<?php endif; ?>

<?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
  <nav class="prev-next-posts">
    <div class="prev-posts-link">
      <?php echo get_next_posts_link( 'Older Entries', $the_query->max_num_pages ); // display older posts link ?>
    </div>
    <div class="next-posts-link">
      <?php echo get_previous_posts_link( 'Newer Entries' ); // display newer posts link ?>
    </div>
  </nav>
<?php } ?>