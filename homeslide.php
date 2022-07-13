<?php

// Menampilkan slide berita terbaru di halaman home

?>

		<script>
            $(document).ready(function() {
              var owl = $('.latest');
              owl.owlCarousel({
                items: 1,
				dots: false,
				nav: false,
                loop: true,
                margin: 15,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
				responsive:{
        0:{
            items:1
        },
        480:{
            items:1
        },
		640:{
            items:2
        },
        1024:{
            items:1
        },
        1170:{
            items:1
        }
    }
              });
              $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [1000])
              })
              $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
              })
            })
        </script>

        <?php query_posts('post_type=slide&showposts=10'); ?>
		
	    	<div class="slideshow">
    	    	<div id="slideshow">
		    	<?php if (have_posts()) { ?>
		    		<?php while (have_posts()): the_post(); ?>
	    				<div class="slide clear">
							<div class="post">
								<?php if (has_post_thumbnail()) echo get_the_post_thumbnail($post->ID, 'slide',
									array(
										'alt' => trim(strip_tags($post->post_title)),
										'title' => trim(strip_tags($post->post_title)),
									)); 
								?>
							</div>
						</div>
   		            <?php endwhile; ?>
				<?php } ?>
		    	</div>
	    	</div>
			
		<?php wp_reset_query(); ?>
		
		<div class="address clear">
		    <div class="colover clear">
	    	<div class="colslide">
		    	<div class="cols-1">
	         	    <div class="indiv"><i class="fa fa-map-marker"></i> <strong><?php echo (get_option('nama')) ? get_option('nama') : 'MASJID AT-TAQWA WONOSARI II' ?></strong><br/>
		            <em><?php echo (get_option('alamat')) ? get_option('alamat') : 'Jalan Lintas Liwa No. 39' ?>, <?php echo (get_option('kelurahan')) ? get_option('kelurahan') : 'Simpang Sari' ?>, <?php echo (get_option('kecamatan')) ? get_option('kecamatan') : 'Sumberjaya' ?>, <?php echo (get_option('kabupaten')) ? get_option('kabupaten') : 'Lampung Barat' ?>, <?php echo (get_option('provinsi')) ? get_option('provinsi') : 'Lampung' ?> , <?php echo (get_option('kodepos')) ? get_option('kodepos') : '' ?></em></div>
	        	</div>
         	</div>
			
			<div class="callslide">
             	<div class="cols-3">
			    	<div class="tops"><?php echo (get_option('pusat')) ? get_option('pusat') : 'PUSAT INFORMASI' ?></div>
					<i class="fa fa-phone"></i> <?php echo (get_option('telepon')) ? get_option('telepon') : '083815251385' ?>
				</div>
			</div>
			
        	<div class="colspeop">
        	    <div class="cols-2">		
		
            	<!-- SLIDE RANDOM -->	  
                    <section id="agendamasjid">
                    	<div class="row">
                    		<div class="large-12 columns">
                	     		<div class="latest owl-carousel owl-theme">
		            				<div class="item">
			        		     		<div class="itover">
				        				    <div class="label">
												<img src="<?php echo (get_option('pketua')) ? get_option('pketua') : get_template_directory_uri().'/images/avatar.png' ?>"/>
								            </div>
						        			<p>
										    	<?php echo (get_option('dkm')) ? get_option('dkm') : 'PENGURUS' ?><br/>
										    	<strong><?php echo (get_option('naketua')) ? get_option('naketua') : '' ?></strong><br/>
							        	    	<em>Ketua</em>
							        		</p>
							         	</div>
						        	</div>
									<div class="item">
			        		     		<div class="itover">
				        				    <div class="label">
												<img src="<?php echo (get_option('pwakil')) ? get_option('pwakil') : get_template_directory_uri().'/images/avatar.png' ?>"/>
								            </div>
						        			<p>
										    	<?php echo (get_option('dkm')) ? get_option('dkm') : 'PENGURUS' ?><br/>
										    	<strong><?php echo (get_option('nawakil')) ? get_option('nawakil') : '' ?></strong><br/>
							        	    	<em>Wakil Ketua</em>
							        		</p>
							         	</div>
						        	</div>
									<div class="item">
			        		     		<div class="itover">
				        				    <div class="label">
												<img src="<?php echo (get_option('pseke')) ? get_option('pseke') : get_template_directory_uri().'/images/avatar.png' ?>"/>
								            </div>
						        			<p>
										    	<?php echo (get_option('dkm')) ? get_option('dkm') : 'PENGURUS' ?><br/>
										    	<strong><?php echo (get_option('naseke')) ? get_option('naseke') : '' ?></strong><br/>
							        	    	<em>Sekretaris</em>
							        		</p>
							         	</div>
						        	</div>
									<div class="item">
			        		     		<div class="itover">
				        				    <div class="label">
												<img src="<?php echo (get_option('pbenda')) ? get_option('pbenda') : get_template_directory_uri().'/images/avatar.png' ?>"/>
								            </div>
						        			<p>
										    	<?php echo (get_option('dkm')) ? get_option('dkm') : 'PENGURUS' ?><br/>
										    	<strong><?php echo (get_option('nabenda')) ? get_option('nabenda') : '' ?></strong><br/>
							        	    	<em>Bendahara</em>
							        		</p>
							         	</div>
						        	</div>
			                	</div>
		                 	</div>
	                 	</div>
                	</section>
             	<!-- SLIDE -->

	        	</div>
        	</div>
			</div>
		</div>
