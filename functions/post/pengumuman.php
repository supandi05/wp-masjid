<?php 

/*** POST TYPE PENGUMUMAN ***/		

	register_post_type( 'pengumuman',		
	array(			
	    'menu_icon' => 'dashicons-clipboard',
		'labels' => array(				
	    'name' => __( 'Pengumuman' ),				
	    'singular_name' => __( 'Pengumuman' ),        
	    'add_new' => __( 'Tambah Pengumuman?' ),	
	    'add_new_item' => __( 'Tambah Pengumuman' ),	
	    'edit' => __( 'Edit' ),	 
	    'edit_item' => __( 'Edit Pengumuman' ),	
	    'new_item' => __( 'Pengumuman Baru' ),	
	    'view' => __( 'Lihat Pengumuman' ),	
	    'view_item' => __( 'Lihat Pengumuman' ),	
	    'search_items' => __( 'Cari Pengumuman' ),	
	    'not_found' => __( 'Tidak ada Pengumuman ditemukan' ),	
	    'not_found_in_trash' => __( 'Tidak ada Pengumuman di folder Trash' ),	
	    'parent' => __( 'Parent Super Duper' ),			
	    ),		                	
		'public' => true,           					            
		'has_archive' => true,        			            
		'supports' => array( 'title', 'editor', 'thumbnail'),        			            
		'exclude_from_search' => false, 	 
		 )	
    );
	
?>