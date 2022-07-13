<?php get_header(); 
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
?>

    <div class="contents">
	    <div class="clear">
	        <div class="post-meta">
		    	<h1>
		        	<?php _e('Kategori : ', 'wpmasjid'); ?><?php echo $term->name; ?>
		    	</h1>
			</div>
			
			<?php get_template_part('loop'); ?>
			<?php get_template_part('pagination'); ?>
			
		</div>
	</div>
	
<?php get_footer(); ?>
