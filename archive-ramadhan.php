<?php get_header(); ?>

    <div class="contents">
	    <div class="clear">
	        <div class="post-meta">
		    	<h1>
		        	<?php echo (get_option('ramadhan')) ? get_option('ramadhan') : 'JADWAL RAMADHAN' ?>
		    	</h1>
			</div>
			
			<?php get_template_part('loop/loop-jr'); ?>
			<?php get_template_part('pagination'); ?>
			
		</div>
	</div>
	
<?php get_footer(); ?>
