<?php 

/**
 * Template Name: Tema Homepage
 */

get_header(); ?>

    <div class="ndeleft clear">
	
	    <!-- AGENDA -->
	    <h3 class="homti"><span><?php echo (get_option('agenda')) ? get_option('agenda') : 'AGENDA MASJID' ?></span> <a href="<?php echo home_url(); ?>/event/">AGENDA <i class="fa fa-angle-right"></i></a></h3>
	    <div class="agenda-mas clear">
		        	<?php 
					    $today = strtotime(date('d-m-Y'));
						query_posts( array( 
					    'post_type' => 'event', 
						'posts_per_page' => 1, 
						'meta_key' => '_minus',
						'meta_query' => array(
					    	array(
						    	'key' => '_minus',
								'value' => $today,
								'compare' => '>='
								)
							),
						'orderby' => 'meta_value',
						'order' => 'ASC'
						) 
					); ?>
			
				    <?php if (have_posts()) { ?>
					    <?php while (have_posts()): the_post(); ?>
						    <?php
							    global $post;
						     	$tevent = get_post_meta($post->ID, '_tevent', true);
								$minus = strtotime(get_post_meta($post->ID, '_tevent', true));
								$jam = get_post_meta($post->ID, '_jam', true);
								$today = strtotime(date_i18n('d-m-Y H:i'));
								$end = get_post_meta($post->ID, '_tevent', true).' '.get_post_meta($post->ID, '_jam', true);
								$exp = strtotime(date_i18n($end));
								$sisa = $exp-$today;
							?>
							
							
							<div class="homeagenda clear">
							    <!-- first post -->
						    	<div class="agenda-info">
								    <div class="imagenda">
							        <?php if (has_post_thumbnail()) { ?>
						        		<a href="<?php the_permalink() ?>">
										    <?php the_post_thumbnail('medthumb', array(
							        		'alt' => trim(strip_tags($post->post_title)),
									    	'title' => trim(strip_tags($post->post_title)),
									    	)); 
											?>
								    	</a>
							    	<?php } else { ?>
							    		<a href="<?php the_permalink() ?>" class="thumb">
							    	    	<img src="<?php echo get_template_directory_uri(); ?>/images/default.png"/>
							    		</a>
									<?php } ?>
									</div>
								</div>
								
							    <div class="meta-info">
									<span>AGENDA : <em><?php echo date_i18n("j F Y", strtotime($tevent)); ?> - <?php echo get_post_meta($post->ID, '_jam', true); ?></em></span>
									<div id="clockdiv">
									<?php if ( $sisa > 0 ) { ?>
							     		<div class="days"></div> <div class="hours"></div><div class="dots">:</div><div class="minutes"></div><div class="seconds"></div>
									<?php } else { ?>
									    <div class="hariini">HARI INI</div>
									<?php } ?>
									</div>
								    <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
							        <p><?php if (function_exists('smart_excerpt')) smart_excerpt(get_the_excerpt(), 18); ?></p>						    	
						    	</div>
							</div>
<script>

function getTimeRemaining(endtime){
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor( (t/1000) % 60 );
  var minutes = Math.floor( (t/1000/60) % 60 );
  var hours = Math.floor( (t/(1000*60*60)) % 24 );
  var days = Math.floor( t/(1000*60*60*24) );
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime){
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock(){
    var t = getTimeRemaining(endtime);

    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if(t.total<=0){
      clearInterval(timeinterval);
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock,1000);
}

var deadline = '<?php echo date("F j Y", strtotime($tevent)); ?> <?php echo get_post_meta($post->ID, '_jam', true); ?> UTC+0700';
initializeClock('clockdiv', deadline);

</script>	

				    	<?php endwhile; ?>
				
				<?php } else { ?>
				<div class="ndeleft"><span class="noagen">Belum ada Agenda</span></div>
				<?php } ?>
			<?php wp_reset_query(); ?>
		</div>
	</div>
	<!-- AGENDA -->

    <div class="ndeleft grey clear">
	
	    <!-- LAPORAN INFAQ -->
	    <div class="homhalf">
		<h3 class="homti"><span><?php echo (get_option('lapin')) ? get_option('lapin') : 'LAPORAN INFAQ' ?></span></h3>
		
	    	<?php query_posts('post_type=infaq&showposts=6'); ?>
			<div class="lap-infaq">
				<table class="infaq">
				    <tr><td><strong>JUMLAH</strong></td><td class="tglnol"><strong>TGL</strong></td><td><strong>DARI</strong></td></tr>
				    <?php if (have_posts()) { ?>
					    <?php while (have_posts()): the_post(); ?>
						<tr>
				    		<td><strong><?php echo 'Rp. '.get_post_meta($post->ID, '_juminfaq', true); ?></strong></td>
							<td class="tglnol"><em><?php echo get_post_meta($post->ID, '_tanginfaq', true); ?></em></td>
							<td><?php the_title(); ?></td>
						</tr>
						<?php endwhile; ?>
		    		<?php } ?>
				</table>
			</div>
			<div class="link-in">
		    	<a href="<?php echo home_url(); ?>/infaq/">
			    	<div class="butin">SELENGKAPNYA</div>
				</a>
			</div>
			<?php wp_reset_query(); ?>
		</div>
		<!-- LAPORAN INFAQ -->
						
		<!-- PENGUMUMAN -->
		<div class="halfleft">
	     	<h3 class="homti"><span><?php echo (get_option('umum')) ? get_option('umum') : 'PENGUMUMAN' ?></span></h3>
		    <div class="peng-text">
		    	<?php query_posts('post_type=pengumuman&showposts=10'); ?>
			        <?php if (have_posts()) { ?>
				        <?php while (have_posts()): the_post(); ?>
					    	<div class="slide-info">
					    		<div class="meta-info">
						    		<p><?php printf(__('<i class="fa fa-clock-o"></i> <em>%s</em>', 'wpmasjid'),
					                    get_the_time('l, j M Y')
				                    	); ?>
									</p>
						        	<div class="link-pe">
								    	<a href="<?php the_permalink() ?>">
									    	<strong><?php the_title(); ?></strong>
										</a>
									</div>
						        	<p><?php if (function_exists('smart_excerpt')) smart_excerpt(get_the_excerpt(), 50); ?></p>
				            	</div>
			            	</div>
						<?php endwhile; ?>
		        	<?php } ?>
					<div class="link-in">
		            	<a href="<?php the_permalink() ?>">
			            	<div class="butin">SELENGKAPNYA</div>
			        	</a>
		        	</div>
	        	<?php wp_reset_query(); ?>		
			</div>
		</div>
		<!-- PENGUMUMAN -->
		
	</div>

		<script>
            $(document).ready(function() {
              var owl = $('.berita');
              owl.owlCarousel({
                items: 1,
				dots: true,
				nav: false,
                loop: true,
                margin: 10,
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
        768:{
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
	
    <div class="ndeleft clear">
		
        <!-- BERITA -->		
		<div class="homhalf">
		    <div class="ll">
	    	<h3 class="homti"><span><?php echo (get_option('berita')) ? get_option('berita') : 'BERITA TERBARU' ?></span></h3>
	    	<?php query_posts('post_type=post&showposts=3'); ?>
				
				<?php if (have_posts()) { ?>
					<?php while (have_posts()): the_post(); ?>
			    		<div class="slide-inforight">
						    <?php if (has_post_thumbnail()) { ?>
						        <a href="<?php the_permalink() ?>" class="thumb"><?php the_post_thumbnail('thumb', array(
							        'alt' => trim(strip_tags($post->post_title)),
									'title' => trim(strip_tags($post->post_title)),
									)); ?>
								</a>
							<?php } else { ?>
								<a href="#" class="thumb">
			    	    		    <img src="<?php echo get_template_directory_uri(); ?>/images/default.png"/>
			        			</a>
							<?php } ?>
							<p>
							<?php printf(__('<i class="fa fa-clock-o"></i> <em>%s</em>', 'wpmasjid'),
					            get_the_time('l, j M Y')
				         	); ?></p>
							<h3><a href="<?php the_permalink() ?>"><strong><?php the_title(); ?></strong></a></h3>
							<p>
							<?php printf(__('Oleh : <em>%s</em>', 'wpmasjid'),
					            get_the_author()
				         	); ?>
							</p>
						</div>
					<?php endwhile; ?>
				<?php } ?>
			<?php wp_reset_query(); ?>
			</div>
		</div>
		<!-- BERITA -->

	    <!-- TAUSIYAH -->
		<div class="halfleft">
	    	<div class="lr">
	        	<h3 class="homti"><span><?php echo (get_option('tausiyah')) ? get_option('tausiyah') : 'TAUSIYAH' ?></span></h3>
            	<div class="row">
        	    	<div class="large-12 columns">
	     	        	<div class="berita owl-carousel owl-theme">
	    	
	                	<?php query_posts('post_type=tausiyah&showposts=10'); ?>
			        	<?php if (have_posts()) { ?>
				        	<?php while (have_posts()): the_post(); ?>
				    	        <div class="item">
					         		<div class="slide-info">
							    	    <div class="imgplace">
							            	<?php if (has_post_thumbnail()) { ?>
						            		<a href="<?php the_permalink() ?>" class="thumb"><?php the_post_thumbnail('thumb', array(
							            		'alt' => trim(strip_tags($post->post_title)),
								     	    	'title' => trim(strip_tags($post->post_title)),
								    	    	)); ?>
								        	</a>
							            	<?php } ?>
								        </div>
					    				<p>
						                	<?php printf(__('Oleh : <em>%s</em> / <i class="fa fa-clock-o"></i> <em>%s</em>', 'wpmasjid'),
					                            get_the_author(),
					                         	get_the_time('l, j M Y')
				                        	); ?>
								    	</p>
							    		<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
							    	</div>
						    	</div>
				        	<?php endwhile; ?>
		        		<?php } ?>
	        	    	<?php wp_reset_query(); ?>
			
	    	        	</div>
		        	</div>
	        	</div>
	    	</div>
		</div>
	</div>
	<!-- TAUSIYAH -->
	
	<!-- LAYANAN MASJID -->
    <div class="ndeleft grey clear">
						
		<div class="">
	    	<h3 class="homti"><span><?php echo (get_option('layanan')) ? get_option('layanan') : 'LAYANAN' ?></span></h3>
		    	<?php query_posts('post_type=layanan&showposts=50'); ?>
		        	<div class="lap-infaq">
			        	<table class="infaq">
				            <tr>
						    	<td><strong>NAMA LAYANAN</strong></td>
						    	<td class="tglnol"><strong>INFORMASI</strong></td>
						    	<td class="tdtelp"><strong>NO TELEPON</strong></td>
							</tr>
		        		    <?php if (have_posts()) { ?>
		    	    		    <?php while (have_posts()): the_post(); ?>
			             			<tr>
				                		<td><strong><?php the_title(); ?></strong></td>
					             		<td class="tglnol"><?php echo get_post_meta($post->ID, '_hubungi', true); ?></td>
						            	<td class="tdtelp"><?php echo get_post_meta($post->ID, '_informasi', true); ?></td>
					            	</tr>
				         		<?php endwhile; ?>
		    	        	<?php } ?>
			        	</table>
		        	</div>
		    	<?php wp_reset_query(); ?>
		</div>
		
	</div>
	<!-- LAYANAN MASJID -->
	
	<div class="ndeleft grey clear">
	
	    <!-- GALERI PHOTO -->
    	<div class="homhalf">
    		<h3 class="homti"><span><?php echo (get_option('galeri')) ? get_option('galeri') : 'GALERI' ?></span></h3>
	    	<?php query_posts('post_type=galeri&showposts=9'); ?>
				<div class="homgal clear">
				    <?php if (have_posts()) { ?>
					    <ul class="clear">
					        <?php while (have_posts()): the_post(); ?>
						    	<li class="ndesogal">
						    	<?php if (has_post_thumbnail()) { ?>
						        		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('medthumb', array(
							        		'alt' => trim(strip_tags($post->post_title)),
									    	'title' => trim(strip_tags($post->post_title)),
									    	)); ?></a>
							    <?php } ?>
								</li>
					    	<?php endwhile; ?>
						</ul>
		    		<?php } ?>
				</div>
			<?php wp_reset_query(); ?>
		</div>
		<!-- GALERI PHOTO -->
		
    	<!-- GALERI VIDEO -->
		<div class="halfleft">
    		<h3 class="homti"><span><?php echo (get_option('video')) ? get_option('video') : 'VIDEO' ?></span></h3>
	    	<?php query_posts('post_type=video&showposts=1'); ?>
				<div class="homv clear">
				    <?php if (have_posts()) { ?>
					    <?php while (have_posts()): the_post(); ?>
				    		<div class="full">
						    	<iframe src="https://www.youtube.com/embed/<?php echo get_post_meta($post->ID, '_embed', true); ?>" frameborder="0" allowfullscreen></iframe>
							</div>
						<?php endwhile; ?>
		    		<?php } ?>
				</div>
			<?php wp_reset_query(); ?>
		</div>
		<!-- GALERI PHOTO -->
		
	</div>


		<script>
            $(document).ready(function() {
              var owl = $('.invent');
              owl.owlCarousel({
                items: 3,
				dots: false,
				nav: false,
                loop: true,
                margin: 0,
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
        768:{
            items:2
        }
		,
        1024:{
            items:3
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
	
    <div class="ndeleft clear">
	    <h3 class="homti"><span><?php echo (get_option('invent')) ? get_option('invent') : 'INVENTARIS' ?></span> <a href="<?php echo home_url(); ?>/inventaris/">LAINNYA <i class="fa fa-angle-right"></i></a></h3>
	    <div class="">
			<?php query_posts('post_type=inventaris&showposts=6&orderby=rand'); ?>
			<div class="row">
    		<div class="large-12 columns">
	     		<div class="invent owl-carousel owl-theme">
				
				    <?php if (have_posts()) { ?>
					    
					    <?php while (have_posts()): the_post(); ?>
					    	
					    	<div class="item">
					     		<div class="slide-info inventa">
								    <div class="inimg">
							        	<?php if (has_post_thumbnail()) { ?>
						        		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumb', array(
							        		'alt' => trim(strip_tags($post->post_title)),
									    	'title' => trim(strip_tags($post->post_title)),
									    	)); ?>
								    	</a>
							        	<?php } ?>
								    </div>
									<h3><?php the_title(); ?></h3>
								</div>
							</div>
				     	<?php endwhile; ?>
				
			    	<?php } ?>
					</div>
				</div>
				</div>
			<?php wp_reset_query(); ?>
		</div>
	</div>
	
	
    <div class="ndeleft clear">	
	    <div class="">
	    	<h3 class="homti"><span><?php echo (get_option('perpus')) ? get_option('perpus') : 'PERPUSTAKAAN' ?></span> <a href="<?php echo home_url(); ?>/perpustakaan/">LAINNYA <i class="fa fa-angle-right"></i></a></h3>
		
	    	<?php query_posts('post_type=perpustakaan&showposts=6&orderbyrand'); ?>
			<div class="lap-infaq">
				<table class="infaq">
				    <tr>
				    	<td><strong>JUDUL BUKU</strong></td>
						<td><strong>PENULIS</strong></td>
						<td class="tglnol"><strong>PENERBIT</strong></td>
					</tr>
				    <?php if (have_posts()) { ?>
					    <?php while (have_posts()): the_post(); ?>
						<tr>
				    		<td><strong><?php the_title(); ?></strong></td>
							<td><?php echo get_post_meta($post->ID, '_penulis', true); ?></td>
							<td class="tglnol"><?php echo get_post_meta($post->ID, '_penerbit', true); ?></td>
						</tr>
						<?php endwhile; ?>
		    		<?php } ?>
				</table>
			</div>
			<?php wp_reset_query(); ?>
		</div>
		
	</div>


<?php get_footer(); ?>