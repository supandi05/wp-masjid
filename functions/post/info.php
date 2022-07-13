<?php 

// SEKILAS INFO

	register_post_type( 'sekilas-info',		
	array(			
	    'menu_icon' => 'dashicons-controls-back',
		'labels' => array(				
	    'name' => __( 'Sekilas Info' ),				
	    'singular_name' => __( 'Sekilas Info' ),        
	    'add_new' => __( 'Data info baru?' ),	
	    'add_new_item' => __( 'Tambah info baru' ),	
	    'edit' => __( 'Edit' ),	 
	    'edit_item' => __( 'Edit info' ),	
	    'new_item' => __( 'Item Baru' ),	
	    'view' => __( 'Lihat info' ),	
	    'view_item' => __( 'Lihat Item' ),	
	    'search_items' => __( 'Cari Item' ),	
	    'not_found' => __( 'Tidak ada info ditemukan' ),	
	    'not_found_in_trash' => __( 'Tidak ada info di folder Trash' ),	
	    'parent' => __( 'Parent Super Duper' ),			
	    ),		                	
		'public' => true,           					            
		'has_archive' => false,        			            
		'supports' => array( 'editor',),        			            
		'exclude_from_search' => false, 	 
		 )	
    );	
	
?>