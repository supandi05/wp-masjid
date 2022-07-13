<?php if (get_option('paging_mode') == 'default'): ?>
	<div class="pagination">
		<?php previous_posts_link(__('Selanjutnya', 'wpmasjid')); ?>
		<?php next_posts_link(__('Sebelumnya', 'wpmasjid')); ?>
		<?php if (function_exists('wp_pagenavi')) wp_pagenavi(); ?>
	</div>
	<?php else: ?>
	<div id="pagination"><?php next_posts_link(__('Lihat lebih banyak', 'wpmasjid')); ?></div>
<?php endif; ?>