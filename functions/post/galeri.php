<?php 

/*** POST TYPE GALERI ***/
	
	register_post_type( 'galeri',		
	array(			
	    'menu_icon' => 'dashicons-images-alt2',
		'labels' => array(				
	    'name' => __( 'Galeri' ),				
	    'singular_name' => __( 'Galeri' ),        
	    'add_new' => __( 'Tambah Galeri?' ),	
	    'add_new_item' => __( 'Tambah Galeri' ),	
	    'edit' => __( 'Edit' ),	 
	    'edit_item' => __( 'Edit Galeri' ),	
	    'new_item' => __( 'Item Baru' ),	
	    'view' => __( 'Lihat Galeri' ),	
	    'view_item' => __( 'Lihat Item' ),	
	    'search_items' => __( 'Cari Item' ),	
	    'not_found' => __( 'Tidak ada Galeri ditemukan' ),	
	    'not_found_in_trash' => __( 'Tidak ada Galeri di folder Trash' ),	
	    'parent' => __( 'Parent Super Duper' ),			
	    ),		                	
		'public' => true,           					            
		'has_archive' => true,        			            
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt'),        			            
		'exclude_from_search' => false, 
		 )	
    );
	
?>