<?php 

/*** POST TYPE SLIDE ***/
	
	register_post_type( 'slide',		
	array(			
	    'menu_icon' => 'dashicons-format-video',
		'labels' => array(				
	    'name' => __( 'Slide Gambar' ),				
	    'singular_name' => __( 'Slide Gambar' ),        
	    'add_new' => __( 'Tambah Slide?' ),	
	    'add_new_item' => __( 'Tambah Slide' ),	
	    'edit' => __( 'Edit' ),	 
	    'edit_item' => __( 'Edit Slide' ),	
	    'new_item' => __( 'Item Slide' ),	
	    'view' => __( 'Lihat Slide' ),	
	    'view_item' => __( 'Lihat Item' ),	
	    'search_items' => __( 'Cari Item' ),	
	    'not_found' => __( 'Tidak ada Slide ditemukan' ),	
	    'not_found_in_trash' => __( 'Tidak ada Slide di folder Trash' ),	
	    'parent' => __( 'Parent Super Duper' ),			
	    ),		                	
		'public' => true,           					            
		'has_archive' => true,        			            
		'supports' => array( 'title', 'thumbnail' ),        			            
		'exclude_from_search' => false, 
		 )	
    );
	
?>