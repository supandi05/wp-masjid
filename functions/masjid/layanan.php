<?php 

/*** POST TYPE LAYANAN ***/		

	register_post_type( 'layanan',		
	array(			
	    'menu_icon' => 'dashicons-share',
		'labels' => array(				
	    'name' => __( 'Layanan' ),				
	    'singular_name' => __( 'Layanan' ),        
	    'add_new' => __( 'Tambah Layanan' ),	
	    'add_new_item' => __( 'Tambah Layanan' ),	
	    'edit' => __( 'Edit' ),	 
	    'edit_item' => __( 'Edit Layanan' ),	
	    'new_item' => __( 'Layanan Baru' ),	
	    'view' => __( 'Lihat Layanan' ),	
	    'view_item' => __( 'Lihat Layanan' ),	
	    'search_items' => __( 'Cari Layanan' ),	
	    'not_found' => __( 'Tidak ada Layanan ditemukan' ),	
	    'not_found_in_trash' => __( 'Tidak ada Layanan di folder Trash' ),	
	    'parent' => __( 'Parent Super Duper' ),			
	    ),		                	
		'public' => true,           					            
		'has_archive' => true,        			            
		'supports' => array( 'title', 'editor', 'thumbnail'),        			            
		'exclude_from_search' => false, 	 
		'register_meta_box_cb' => 'lay_masjid',
		 )	
    );
	
	function lay_masjid() {
	    add_meta_box('daya_lay', 'Data Layanan Masjid', 'daya_lay', 'layanan', 'normal', 'core');
	}

	function daya_lay() {
	    global $post;
	    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
	    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
		
		$hubungi = get_post_meta($post->ID, '_hubungi', true);
		$informasi = get_post_meta($post->ID, '_informasi', true);

			echo '<p>Petugas (nama petugas yang bisa di hubungi)</p>';
			echo '<input type="text" name="_hubungi" value="' . $hubungi  . '" class="widefat" />';
			echo '<p>Telepon (nomor telepon informasi)</p>';
			echo '<input type="text" name="_informasi" value="' . $informasi  . '" class="widefat" />';

	}

	function lay_meta($post_id, $post) {
	    if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
	    return $post->ID;
	    }

	    if ( !current_user_can( 'edit_post', $post->ID ))
	        return $post->ID;

		$events_meta['_hubungi'] = $_POST['_hubungi'];
		$events_meta['_informasi'] = $_POST['_informasi'];

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

	add_action('save_post', 'lay_meta', 1, 2);

?>