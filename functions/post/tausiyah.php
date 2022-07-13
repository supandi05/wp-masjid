<?php 

/*** POST TYPE TAUSIYAH ***/		

	register_post_type( 'tausiyah',		
	array(			
	    'menu_icon' => 'dashicons-format-status',
		'labels' => array(				
	    'name' => __( 'Tausiyah' ),				
	    'singular_name' => __( 'Tausiyah' ),        
	    'add_new' => __( 'Tambah Tausiyah?' ),	
	    'add_new_item' => __( 'Tambah Tausiyah' ),	
	    'edit' => __( 'Edit' ),	 
	    'edit_item' => __( 'Edit Tausiyah' ),	
	    'new_item' => __( 'Tausiyah Baru' ),	
	    'view' => __( 'Lihat Tausiyah' ),	
	    'view_item' => __( 'Lihat Tausiyah' ),	
	    'search_items' => __( 'Cari Tausiyah' ),	
	    'not_found' => __( 'Tidak ada Tausiyah ditemukan' ),	
	    'not_found_in_trash' => __( 'Tidak ada Tausiyah di folder Trash' ),	
	    'parent' => __( 'Parent Super Duper' ),			
	    ),		                	
		'public' => true,           					            
		'has_archive' => true,        			            
		'supports' => array( 'title', 'editor', 'thumbnail'),        			            
		'exclude_from_search' => false, 	 
		 )	
    );	
	
?>