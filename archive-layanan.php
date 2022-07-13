<?php get_header(); ?>

    <div class="contents">
	    <div class="clear">
	        <div class="post-meta">
		    	<h1>
		        	<?php echo (get_option('layanan')) ? get_option('layanan') : 'LAYANAN' ?>
		    	</h1>
			</div>
			
			<?php get_template_part('loop/layanan'); ?>
			<?php get_template_part('pagination'); ?>
			
		</div>
	</div>
	
<?php get_footer(); ?>
