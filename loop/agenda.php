<?php $paged = ( get_query_var('page') ) ? get_query_var('page') : 1; ?>
<?php query_posts('post_type=event&paged='.$paged.'&meta_key=_tevent&orderby=meta_value_num&order=ASC'); ?>
<?php if (have_posts()): ?>
	<div id="loop" class="list archives clear">
	<?php while (have_posts()): the_post(); ?>
        <?php
			global $post;
			$tevent = get_post_meta($post->ID, '_tevent', true);
			$jam = get_post_meta($post->ID, '_jam', true);
			$lokasi = get_post_meta($post->ID, '_lokasi', true);
	    	$koordinator = get_post_meta($post->ID, '_koordinator', true);
	    	$telepon = get_post_meta($post->ID, '_telepon', true);
		?>

		<div <?php post_class('post clear'); ?> id="post_<?php the_ID(); ?>">
			<?php if (has_post_thumbnail()): ?>
			<a href="<?php the_permalink() ?>" class="ndesothumb"><?php the_post_thumbnail('thumb', array(
					'alt' => trim(strip_tags($post->post_title)),
					'title' => trim(strip_tags($post->post_title)),
				)); ?></a>
			<?php endif; ?>
			<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

			<div class="post-meta">
			    <span>AGENDA : <em><?php echo date_i18n("j F Y", strtotime($tevent)); ?> - <?php echo $jam; ?></em></span><br/>
				<span>LOKASI : <?php echo $lokasi; ?></em></span><br/>
				<span>INFORMASI : <em><?php echo $koordinator; ?> - (<?php echo $telepon; ?>)</em></span>
			</div>
			<div class="post-content"><?php if (function_exists('smart_excerpt')) smart_excerpt(get_the_excerpt(), 30); ?></div>
		</div>

	<?php endwhile; ?>
	</div>
<?php endif; ?>
<?php wp_reset_query(); ?>

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