<?php 

/*** POST TYPE PERPUSTAKAAN ***/
	
	register_post_type( 'perpustakaan',		
	array(			
	    'menu_icon' => 'dashicons-book',
		'labels' => array(				
	    'name' => __( 'Perpustakaan' ),				
	    'singular_name' => __( 'Perpustakaan' ),        
	    'add_new' => __( 'Tambah Buku?' ),	
	    'add_new_item' => __( 'Tambah Buku' ),	
	    'edit' => __( 'Edit' ),	 
	    'edit_item' => __( 'Edit Buku' ),	
	    'new_item' => __( 'Item Baru' ),	
	    'view' => __( 'Lihat Buku' ),	
	    'view_item' => __( 'Lihat Item' ),	
	    'search_items' => __( 'Cari Item' ),	
	    'not_found' => __( 'Tidak ada Buku ditemukan' ),	
	    'not_found_in_trash' => __( 'Tidak ada Buku di folder Trash' ),	
	    'parent' => __( 'Parent Super Duper' ),			
	    ),		                	
		'public' => true,           					            
		'has_archive' => true,        			            
		'supports' => array( 'title', 'editor', 'thumbnail'),        			            
		'exclude_from_search' => false, 	 
		'register_meta_box_cb' => 'perpus',
		 )	
    );
	
		function perpus() {
	    add_meta_box('masjid_perpus', 'Daftar Buku / Kitab Koleksi', 'masjid_perpus', 'perpustakaan', 'normal', 'default');
	}

	function masjid_perpus() {
	    global $post;
	    // Noncename needed to verify where the data originated
	    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
	    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	    // Get the location data if its already been entered

	    $penulis = get_post_meta($post->ID, '_penulis', true);
	    $penerbit = get_post_meta($post->ID, '_penerbit', true);
		$halaman = get_post_meta($post->ID, '_halaman', true);
		$jumlahbuku = get_post_meta($post->ID, '_jumlahbuku', true);
		

	    // Echo out the field

			echo '<p>Nama Penulis</p>';
	        echo '<input type="text" name="_penulis" value="' . $penulis  . '" class="widefat" />';
	        echo '<p>Nama Penerbit</p>';
	        echo '<input type="text" name="_penerbit" value="' . $penerbit  . '" class="widefat" />';
			echo '<p>Jumlah Halaman</p>';
	        echo '<input type="text" name="_halaman" value="' . $halaman  . '" class="widefat" />';
			echo '<p>Jumlah Buku</p>';
	        echo '<input type="text" name="_jumlahbuku" value="' . $jumlahbuku  . '" class="widefat" />';
	}

	function masjid_perpus_meta($post_id, $post) {

	    // verify this came from the our screen and with proper authorization,
	    // because save_post can be triggered at other times

	    if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
	    return $post->ID;
	    }

	    // Is the user allowed to edit the post or page?

	    if ( !current_user_can( 'edit_post', $post->ID ))

	        return $post->ID;

	    // OK, we're authenticated: we need to find and save the data
	    // We'll put it into an array to make it easier to loop though.

	    $events_meta['_penulis'] = $_POST['_penulis'];
		$events_meta['_penerbit'] = $_POST['_penerbit'];
		$events_meta['_halaman'] = $_POST['_halaman'];
		$events_meta['_jumlahbuku'] = $_POST['_jumlahbuku'];

	    // Add values of $events_meta as custom fields

	    foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!	        
		    if( $post->post_type == 'revision' ) return; // Don't store custom data twice
	        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
	        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
	            update_post_meta($post->ID, $key, $value);
	        } else { // If the custom field doesn't have a value
	            add_post_meta($post->ID, $key, $value);
	        }
	        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	    }

	}

	add_action('save_post', 'masjid_perpus_meta', 1, 2); // save the custom fields	

	
?>