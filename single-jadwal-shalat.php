<?php get_header(); ?>

    <div class="contents">
	<?php if (have_posts()): ?>
		<?php while (have_posts()): the_post(); ?>
		<?php global $post;
			$repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
			?>
	        
			<div class="post-navigation clear">
				<?php
					$prev_post = get_adjacent_post(false, '', true);
					$next_post = get_adjacent_post(false, '', false); ?>
					<?php if ($prev_post): $prev_post_url = get_permalink($prev_post->ID); $prev_post_title = $prev_post->post_title; ?>
						<a class="post-prev" href="<?php echo $prev_post_url; ?>"><em><?php _e('Bulan lalu', 'wpmasjid'); ?></em><span><?php echo $prev_post_title; ?></span></a>
					<?php endif; ?>
					<?php if ($next_post): $next_post_url = get_permalink($next_post->ID); $next_post_title = $next_post->post_title; ?>
						<a class="post-next" href="<?php echo $next_post_url; ?>"><em><?php _e('Bulan depan', 'wpmasjid'); ?></em><span><?php echo $next_post_title; ?></span></a>
					<?php endif; ?>
			</div>
			
			<div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
			
				<div class="post-meta">
					<h1><?php the_title(); ?></h1>
				</div>
				
				<div class="post-content">
			        	<div class="jadwal clear">
							<table>
							    <tr>
								    <td class="tops jleft">TANGGAL</td>
									<td class="tops">IMSYAK</td>
									<td class="tops">SUBUH</td>
									<td class="tops">DZUHUR</td>
									<td class="tops">ASHAR</td>
									<td class="tops">MAGHRIB</td>
									<td class="tops">ISYA</td>
								</tr>
							<?php if (is_array($repeatable_fields)) { ?>
			             	<?php   $count = 0;
							        $tang = date_i18n("j");
								    foreach ( $repeatable_fields as $field ) {
									$count++;
							?>
							<?php if ($count == $tang) { ?>
								<tr>
						    		<td class="jleft dark"><strong><?php echo esc_attr( $field['tanggals'] ); ?></strong></td>
									<td class="dark"><?php echo esc_attr( $field['imsyaks'] ); ?></td>
									<td class="dark"><?php echo esc_attr( $field['subuhs'] ); ?></td>
									<td class="dark"><?php echo esc_attr( $field['dzuhurs'] ); ?></td>
									<td class="dark"><?php echo esc_attr( $field['ashars'] ); ?></td>
									<td class="dark"><?php echo esc_attr( $field['maghribs'] ); ?></td>
									<td class="dark"><?php echo esc_attr( $field['isyas'] ); ?></td>
								</tr>
							<?php } else { ?>
							    <tr>
						    		<td class="jleft"><strong><?php echo esc_attr( $field['tanggals'] ); ?></strong></td>
									<td><?php echo esc_attr( $field['imsyaks'] ); ?></td>
									<td><?php echo esc_attr( $field['subuhs'] ); ?></td>
									<td><?php echo esc_attr( $field['dzuhurs'] ); ?></td>
									<td><?php echo esc_attr( $field['ashars'] ); ?></td>
									<td><?php echo esc_attr( $field['maghribs'] ); ?></td>
									<td><?php echo esc_attr( $field['isyas'] ); ?></td>
								</tr>
							<?php } ?>
				        	<?php } ?>
							<?php } ?>
					    	</table>
				    	</div>
				</div>
				
			</div>
			
			<div class="post-navigation clear">
				<?php
					$prev_post = get_adjacent_post(false, '', true);
					$next_post = get_adjacent_post(false, '', false); ?>
					<?php if ($prev_post): $prev_post_url = get_permalink($prev_post->ID); $prev_post_title = $prev_post->post_title; ?>
						<a class="post-prev" href="<?php echo $prev_post_url; ?>"><em><?php _e('Bulan lalu', 'wpmasjid'); ?></em><span><?php echo $prev_post_title; ?></span></a>
					<?php endif; ?>
					<?php if ($next_post): $next_post_url = get_permalink($next_post->ID); $next_post_title = $next_post->post_title; ?>
						<a class="post-next" href="<?php echo $next_post_url; ?>"><em><?php _e('Bulan depan', 'wpmasjid'); ?></em><span><?php echo $next_post_title; ?></span></a>
					<?php endif; ?>
			</div>
		
		<?php endwhile; ?>
	<?php endif; ?>
	
	</div>

<?php get_footer(); ?>
