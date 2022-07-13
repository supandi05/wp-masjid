<?php get_header(); ?>

   <div class="contents">
	    <div class="clear">
	        <div class="post-meta">
		    	<h1><?php echo (get_option('berita')) ? get_option('berita') : 'BERITA TERBARU' ?></h1>
			</div>
			
			<?php get_template_part('loop/loop'); ?>
			<?php wp_reset_query(); ?>
			<?php get_template_part('pagination'); ?>
   
   		</div>
	</div>

<?php get_footer(); ?>
