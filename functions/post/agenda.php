<?php 

/*** POST TYPE AGENDA ***/
	
	register_post_type( 'event',		
	array(			
	    'menu_icon' => 'dashicons-calendar-alt',
		'labels' => array(				
	    'name' => __( 'Agenda' ),				
	    'singular_name' => __( 'Agenda' ),        
	    'add_new' => __( 'Tambah Agenda?' ),	
	    'add_new_item' => __( 'Tambah Agenda' ),	
	    'edit' => __( 'Edit' ),	 
	    'edit_item' => __( 'Edit Agenda' ),	
	    'new_item' => __( 'Item Baru' ),	
	    'view' => __( 'Lihat Agenda' ),	
	    'view_item' => __( 'Lihat Item' ),	
	    'search_items' => __( 'Cari Item' ),	
	    'not_found' => __( 'Tidak ada Agenda ditemukan' ),	
	    'not_found_in_trash' => __( 'Tidak ada Agenda di folder Trash' ),	
	    'parent' => __( 'Parent Super Duper' ),			
	    ),		                	
		'public' => true,           					            
		'has_archive' => true,        			            
		'supports' => array( 'title', 'editor', 'thumbnail'),        			            
		'exclude_from_search' => false, 	 
		'register_meta_box_cb' => 'masevents',
		 )	
    );
	
		function masevents() {
	    add_meta_box('masjid_events', 'Data Agenda', 'masjid_events', 'event', 'normal', 'default');
	}

	function masjid_events() {
	    global $post;
	    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
	    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
        
		$minus = strtotime(get_post_meta($post->ID, '_tevent', true));
	    $tevent = get_post_meta($post->ID, '_tevent', true);
	    $jam = get_post_meta($post->ID, '_jam', true);
		$lokasi = get_post_meta($post->ID, '_lokasi', true);
		$koordinator = get_post_meta($post->ID, '_koordinator', true);
		$telepon = get_post_meta($post->ID, '_telepon', true);
		$hariini = strtotime(date("Y-m-d"));
		$sekarang = strtotime(date("Y-m-d"));
		$currents = $sekarang-$minus;
		
	        echo '<p>Tanggal Agenda</p>';
	        echo '<input type="text" name="_tevent" value="'.$tevent.'" class="tevent widefat" />';
	        echo '<p>Jam Agenda</p>';
	        echo '<input type="text" name="_jam" value="'.$jam.'" class="widefat" />';
			echo '<p>Lokasi</p>';
	        echo '<input type="text" name="_lokasi" value="'.$lokasi.'" class="widefat" />';
			echo '<p>Koordinator</p>';
	        echo '<input type="text" name="_koordinator" value="'.$koordinator.'" class="widefat" />';
			echo '<p>Telepon</p>';
	        echo '<input type="text" name="_telepon" value="'.$telepon.'" class="widefat" />';
			
			?>
			
			<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
	
        	<script type="text/javascript">
    	    	jQuery(document).ready(function($) {
			        $('.tevent').datepicker({
			    	dateFormat : 'dd-mm-yy' });
		    	});
        	</script>
	
        	<?php
	
	    	wp_enqueue_script('jquery-ui-datepicker');
	    	wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
			
	}

	function masjid_events_meta($post_id, $post) {
	    if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
	    return $post->ID;
	    }

	    if ( !current_user_can( 'edit_post', $post->ID ))
	        return $post->ID;
        
		$events_meta['_minus'] = strtotime($_POST['_tevent']);
	    $events_meta['_tevent'] = $_POST['_tevent'];
		$events_meta['_jam'] = $_POST['_jam'];
		$events_meta['_lokasi'] = $_POST['_lokasi'];
		$events_meta['_koordinator'] = $_POST['_koordinator'];
		$events_meta['_telepon'] = $_POST['_telepon'];

	    foreach ($events_meta as $key => $value) {         
		    if( $post->post_type == 'revision' ) return; 
	        $value = implode(',', (array)$value); 
	        if(get_post_meta($post->ID, $key, FALSE)) { 
	            update_post_meta($post->ID, $key, $value);
	        } else { 
	            add_post_meta($post->ID, $key, $value);
	        }
	        if(!$value) delete_post_meta($post->ID, $key); 
	    }
	}

	add_action('save_post', 'masjid_events_meta', 1, 2); 
	
?>