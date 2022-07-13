<?php if (have_posts()): ?>

<div class="post-content">
	<div class="lap-infaq">
		<table class="infaq">
			<tr><td><strong>JUMLAH</strong></td><td><strong>TGL</strong></td><td><strong>DARI</strong></td></tr>

        	<?php while (have_posts()): the_post(); ?>
                <?php global $post;
          			$tanginfaq = get_post_meta($post->ID, '_tanginfaq', true);
	                $juminfaq = get_post_meta($post->ID, '_juminfaq', true);
        	    	$asalinfaq = get_post_meta($post->ID, '_asalinfaq', true);
		     	?>
				
			            <tr>
				    		<td><strong><?php echo 'Rp. '.get_post_meta($post->ID, '_juminfaq', true); ?></strong></td>
							<td><em><?php echo get_post_meta($post->ID, '_tanginfaq', true); ?></em></td>
							<td><?php the_title(); ?></td>
						</tr>
			
        	<?php endwhile; ?>
        </table>
	</div>
</div>

<?php endif; ?>
