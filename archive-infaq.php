<?php get_header(); ?>

    <div class="contents">
	    <div class="clear">
	        <div class="post-meta">
		    	<h1><?php echo (get_option('lapin')) ? get_option('lapin') : 'LAPORAN INFAQ' ?></h1>
			</div>
			
			<?php get_template_part('loop/infaq'); ?>
			<?php get_template_part('pagination'); ?>
			
		</div>
	</div>
	
<?php get_footer(); ?>
