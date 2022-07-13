<?php get_header(); ?>

    <div class="contents">
	<?php if (have_posts()): ?>
		<?php while (have_posts()): the_post(); ?>
            <?php
				global $post;
				$tanggal = get_post_meta($post->ID, '_tevent', true);
				$jam = get_post_meta($post->ID, '_jam', true);
				$today = strtotime(date_i18n('d-m-Y H:i'));
				$end = get_post_meta($post->ID, '_tevent', true).' '.get_post_meta($post->ID, '_jam', true);
				$exp = strtotime(date_i18n($end));
				$sisa = $exp-$today;
			?>
			<div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
				<div class="post-meta">
					<h1>Agenda : <?php the_title(); ?></h1>
				</div>
				<div class="agenda clear">
				    <div class="gad">
				        <?php if (has_post_thumbnail()) echo ''.get_the_post_thumbnail($post->ID, 'thumb',
			         		array(
					         	'alt' => trim(strip_tags($post->post_title)),
			         			'title' => trim(strip_tags($post->post_title)),
				        	)); 
						?>
				    	<div id="clockdiv">
						    <?php if ( $sisa > 0 ) { ?>
							     		<div class="days"></div> <div class="hours"></div><div class="dots">:</div><div class="minutes"></div><div class="seconds"></div>
                            <?php } ?>
						</div>
				    	<div class="intable">
					        <table>
				            	<tr>
					        		<td><strong>WAKTU</strong></td>
						    		<td>:</td>
				           	     	<td><?php echo date_i18n("l", strtotime($tanggal)); ?>, <?php echo date_i18n("H:i", strtotime($jam)); ?> - <?php echo date_i18n("j F Y", strtotime($tanggal)); ?></td>
					    		</tr>
					        	<tr>
						    	    <td><strong>LOKASI</strong></td>
						    		<td>:</td>
						    		<td><?php echo get_post_meta($post->ID, '_lokasi', true); ?></td>
					    		</tr>
					    		<tr>
					    		    <td><strong>INFO ACARA</strong></td>
					    			<td>:</td>
					    			<td><?php echo get_post_meta($post->ID, '_koordinator', true); ?> / <?php echo get_post_meta($post->ID, '_telepon', true); ?></td>
					    		</tr>
					        </table>
				    	</div>
						
					</div>
				    
					<div class="post-content">
					    <?php the_content(); ?>
					</div>
		    	</div>
			</div>	
		
		<?php endwhile; ?>
	<?php endif; ?>
	
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

var deadline = '<?php echo date("F j Y", strtotime($tanggal)); ?> <?php echo get_post_meta($post->ID, '_jam', true); ?> UTC+0700';
initializeClock('clockdiv', deadline);

</script>	
<?php get_footer(); ?>
