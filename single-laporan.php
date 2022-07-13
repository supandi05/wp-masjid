<?php get_header(); ?>

    <div class="contents">
	<?php if (have_posts()): ?>
		<?php while (have_posts()): the_post(); ?>
		<?php global $post;
			$keuangan_fields = get_post_meta($post->ID, 'keuangan_fields', true);
			?>
	        
			<div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
			
				<div class="post-meta">
					<h1><?php the_title(); ?></h1>
				</div>
				
				<div class="post-content">
			        	<div class="jadwal clear">
							<table>
							    <tr>
								    <td class="tops">NO</td>
									<td class="tops jleft">TANGGAL</td>
									<td class="tops">KEGUNAAN</td>
									<td class="tops">JUMLAH</td>
								</tr>
							<?php if (is_array($keuangan_fields)) { ?>
			             	<?php $count = 0;
							      foreach ( $keuangan_fields as $field ) {
								  $count++; ?>
								<tr>
						    		<td><?php echo $count; ?></td>
									<td class="jleft"><?php echo esc_attr( $field['tanglapo'] ); ?></td>
									<td><strong><?php echo esc_attr( $field['kegunaan'] ); ?></strong></td>
									<td><?php echo esc_attr( $field['jumlah'] ); ?></td>
								</tr>
							<?php } ?>
							<?php } ?>
					    	</table>
				    	</div>
				</div>
				
			</div>
			
		
		<?php endwhile; ?>
	<?php endif; ?>
	
	</div>

<?php get_footer(); ?>
