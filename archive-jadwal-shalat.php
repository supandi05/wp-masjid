<?php get_header(); ?>

    <div class="contents">
	    <div class="clear">
	        <div class="post-meta">
		    	<h1>
		        	<?php echo (get_option('shalat')) ? get_option('shalat') : 'JADWAL SHALAT' ?>
		    	</h1>
			</div>
			
			<?php get_template_part('loop/loop-js'); ?>
			<?php get_template_part('pagination'); ?>
			
		</div>
	</div>
	
<?php get_footer(); ?>
