<?php 

/**
 * Template Name: Pengurus Masjid
 */
?>

<?php get_header(); ?>

    <div class="contents">
	<?php if (have_posts()): ?>
		<?php while (have_posts()): the_post(); ?>

			<div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
				<div class="post-meta">
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="post-content">
			     	<section id="agendamasjid">
			        		     	<div class="penglist">
				        				<div class="labels">
											<img src="<?php echo (get_option('pketua')) ? get_option('pketua') : get_template_directory_uri().'/images/avatar.png' ?>"/>
								            
						        			<p>
										    	<strong><?php echo (get_option('naketua')) ? get_option('naketua') : '' ?></strong><br/>
							        	    	<em>Ketua</em>
							        		</p>
										</div>
							        </div>
			        		     	<div class="penglist">
				        				<div class="labels">
										    <img src="<?php echo (get_option('pwakil')) ? get_option('pwakil') : get_template_directory_uri().'/images/avatar.png' ?>"/>
								            
						        			<p>
										    	<strong><?php echo (get_option('nawakil')) ? get_option('nawakil') : '' ?></strong><br/>
							        	    	<em>Wakil Ketua</em>
							        		</p>
							         	</div>
									</div>
			        		     	<div class="penglist">
				        				<div class="labels">
											<img src="<?php echo (get_option('pseke')) ? get_option('pseke') : get_template_directory_uri().'/images/avatar.png' ?>"/>
								            
						        			<p>
										    	<strong><?php echo (get_option('naseke')) ? get_option('naseke') : '' ?></strong><br/>
							        	    	<em>Sekretaris</em>
							        		</p>
							         	</div>
									</div>
									<div class="penglist">
				        				<div class="labels">
											<img src="<?php echo (get_option('pbenda')) ? get_option('pbenda') : get_template_directory_uri().'/images/avatar.png' ?>"/>
								            
						        			<p>
										    	<strong><?php echo (get_option('nabenda')) ? get_option('nabenda') : '' ?></strong><br/>
							        	    	<em>Bendahara</em>
							        		</p>
							         	</div>
									</div>
                    </section>
					<?php the_content(); ?>
				</div>
			</div>

		<?php endwhile; ?>
	<?php endif; ?>
    </div>

<?php get_footer(); ?>