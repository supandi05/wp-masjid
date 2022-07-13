<?php if (have_posts()): ?>

<div class="post-content">
	<div class="lap-infaq">
		<table class="infaq">
			<tr>
			    <td><strong>BUKU</strong></td>
				<td><strong>PENULIS</strong></td>
				<td><strong>PENERBIT</strong></td>
				<td><strong>HAL</strong></td>
				<td><strong>JML</strong></td>
			</tr>

        	<?php while (have_posts()): the_post(); ?>
                <?php global $post;
          			$penulis = get_post_meta($post->ID, '_penulis', true);
					$penerbit = get_post_meta($post->ID, '_penerbit', true);
					$halaman = get_post_meta($post->ID, '_halaman', true);
					$jumlahbuku = get_post_meta($post->ID, '_jumlahbuku', true);
		     	?>
				
			            <tr> 
						    <td><?php the_title(); ?></td>
				    		<td><strong><?php echo $penulis; ?></strong></td>
							<td><em><?php echo $penerbit; ?></em></td>
							<td><?php echo $halaman; ?></td>
							<td><?php echo $jumlahbuku; ?></td>
						</tr>
			
        	<?php endwhile; ?>
        </table>
	</div>
</div>

<?php endif; ?>
