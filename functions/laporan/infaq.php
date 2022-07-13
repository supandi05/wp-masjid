<?php 

/*** POST TYPE LAPORAN INFAQ ***/
	
	register_post_type( 'infaq',		
	array(			
	    'menu_icon' => 'dashicons-book-alt',
		'labels' => array(				
	    'name' => __( 'Laporan Infaq' ),				
	    'singular_name' => __( 'Laporan Infaq' ),        
	    'add_new' => __( '+ Pemberi Infaq' ),	
	    'add_new_item' => __( '+ Pemberi Infaq' ),	
	    'edit' => __( 'Edit' ),	 
	    'edit_item' => __( 'Edit Laporan' ),	
	    'new_item' => __( 'Item Baru' ),	
	    'view' => __( 'Lihat Laporan' ),	
	    'view_item' => __( 'Lihat Item' ),	
	    'search_items' => __( 'Cari Item' ),	
	    'not_found' => __( 'Tidak ada Laporan ditemukan' ),	
	    'not_found_in_trash' => __( 'Tidak ada Laporan di folder Trash' ),	
	    'parent' => __( 'Parent Super Duper' ),			
	    ),		                	
		'public' => true,           					            
		'has_archive' => true,        			            
		'supports' => array( 'title'),        			            
		'exclude_from_search' => false, 	 
		'register_meta_box_cb' => 'lap_infaq',
		 )	
    );
	
		function lap_infaq() {
	    add_meta_box('masjid_infaq', 'Data Infaq Masuk', 'masjid_infaq', 'infaq', 'normal', 'default');
	}

	function masjid_infaq() {
	    global $post;
	    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
	    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	    $tanginfaq = get_post_meta($post->ID, '_tanginfaq', true);
	    $juminfaq = get_post_meta($post->ID, '_juminfaq', true);
		$asalinfaq = get_post_meta($post->ID, '_asalinfaq', true);
		
	        echo '<div style="overflow:hidden;"><p>';
			echo '<strong style="color: #f33;">KETERANGAN</strong> : Lengkapi data laporan infaq dibawah ini, Laporan Infaq terbaru akan ditampilkan di halaman Beranda<br/><br/></p>';
			echo '<p>Tanggal Infaq</p>';
	        echo '<input type="text" name="_tanginfaq" value="'.$tanginfaq.'" class="tanggal widefat" />';
	        echo '<p>Jumlah Dana (masukkan angka, misal : <em>1.000.000</em></p>';
	        echo '<input type="text" name="_juminfaq" value="'.$juminfaq.'" class="widefat" />';
			echo '<p>Daerah Asal (masukkan nama daerah, misal : <em>Lampung</em></p>';
	        echo '<input type="text" name="_asalinfaq" value="'.$asalinfaq.'" class="widefat" />
		    	</div>';
			
			?>
			
			<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
	
        	<script type="text/javascript">
    	    	jQuery(document).ready(function($) {
			        $('.tanggal').datepicker({
			    	dateFormat : 'dd-mm-yy' });
		    	});
        	</script>
	
        	<?php
	
	    	wp_enqueue_script('jquery-ui-datepicker');
	    	wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
			
	}

	function masjid_infaq_meta($post_id, $post) {
	    if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
	    return $post->ID;
	    }

	    if ( !current_user_can( 'edit_post', $post->ID ))
	        return $post->ID;

	    $events_meta['_tanginfaq'] = $_POST['_tanginfaq'];
		$events_meta['_juminfaq'] = $_POST['_juminfaq'];
		$events_meta['_asalinfaq'] = $_POST['_asalinfaq'];

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

	add_action('save_post', 'masjid_infaq_meta', 1, 2); 
	
?>