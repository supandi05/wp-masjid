<?php get_header(); ?>

    <div class="contents">
	<?php if (have_posts()): ?>
		<?php while (have_posts()): the_post(); ?>
		<?php global $post;
			$ramadhan_fields = get_post_meta($post->ID, 'ramadhan_fields', true);
			?>
	        
			<div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
			
				<div class="post-meta">
					<h1><?php the_title(); ?></h1>
				</div>
				
				<div class="post-content">
			        	<div class="jadwal clear">
							<table>
							    <tr>
								    <td class="tops">TGL</td>
									<td class="tops jleft">MASEHI</td>
									<td class="tops">IMSYAK</td>
									<td class="tops">SUBUH</td>
									<td class="tops">DZUHUR</td>
									<td class="tops">ASHAR</td>
									<td class="tops">MAGHRIB</td>
									<td class="tops">ISYA</td>
								</tr>
							<?php if (is_array($ramadhan_fields)) { ?>
			             	<?php $count = 0;
							      foreach ( $ramadhan_fields as $field ) {
								  $count++; ?>
								<tr>
						    		<td><?php echo $count; ?></td>
									<td class="jleft"><strong><?php echo esc_attr( $field['tanggalr'] ); ?></strong></td>
									<td><?php echo esc_attr( $field['imsyakr'] ); ?></td>
									<td><?php echo esc_attr( $field['subuhr'] ); ?></td>
									<td><?php echo esc_attr( $field['dzuhurr'] ); ?></td>
									<td><?php echo esc_attr( $field['asharr'] ); ?></td>
									<td><?php echo esc_attr( $field['maghribr'] ); ?></td>
									<td><?php echo esc_attr( $field['isyar'] ); ?></td>
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
