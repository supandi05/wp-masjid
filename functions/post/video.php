<?php 

/*** POST TYPE VIDEO ***/
	
	register_post_type( 'video',		
	array(			
	    'menu_icon' => 'dashicons-video-alt3',
		'labels' => array(				
	    'name' => __( 'Video' ),				
	    'singular_name' => __( 'Video' ),        
	    'add_new' => __( 'Tambah Video?' ),	
	    'add_new_item' => __( 'Tambah Video' ),	
	    'edit' => __( 'Edit' ),	 
	    'edit_item' => __( 'Edit Video' ),	
	    'new_item' => __( 'Item Baru' ),	
	    'view' => __( 'Lihat Video' ),	
	    'view_item' => __( 'Lihat Item' ),	
	    'search_items' => __( 'Cari Item' ),	
	    'not_found' => __( 'Tidak ada Video ditemukan' ),	
	    'not_found_in_trash' => __( 'Tidak ada Video di folder Trash' ),	
	    'parent' => __( 'Parent Super Duper' ),			
	    ),		                	
		'public' => true,           					            
		'has_archive' => true,        			            
		'supports' => array( 'title', 'editor' ),        			            
		'exclude_from_search' => false, 	 
		'register_meta_box_cb' => 'vid',
		 )	
    );
	
		function vid() {
	    add_meta_box('masjid_vid', 'Video Galeri', 'masjid_vid', 'video', 'normal', 'default');
	}

	function masjid_vid() {
	    global $post;
	    // Noncename needed to verify where the data originated
	    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
	    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	    // Get the location data if its already been entered

	    $embed = get_post_meta($post->ID, '_embed', true);

	    // Echo out the field

	        echo '<p>Untuk memudahkan penambahan video, gunakan embed video dari Youtube, cukup masukkan ID Video</p>';
			echo '<p>ID Video Youtube</p>';
	        echo '<input type="text" name="_embed" value="' . $embed  . '" class="widefat" />';
	}

	function masjid_vid_meta($post_id, $post) {

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

	    $events_meta['_embed'] = $_POST['_embed'];

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

	add_action('save_post', 'masjid_vid_meta', 1, 2); // save the custom fields
	
?>