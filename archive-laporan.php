<?php get_header(); ?>

    <div class="contents">
	    <div class="clear">
	        <div class="post-meta">
		    	<h1>
		        	<?php echo (get_option('laporan')) ? get_option('laporan') : 'LAPORAN KEUANGAN' ?>
		    	</h1>
			</div>
			
			<?php get_template_part('loop/loop-lk'); ?>
			<?php get_template_part('pagination'); ?>
			
		</div>
	</div>
	
<?php get_footer(); ?>
