<?php 

	add_action( 'init', 'agenda_taxonomy', 0 );
	function agenda_taxonomy() {
	  $labels = array(
	    'name' => _x( 'Kategori Agenda', 'taxonomy general name' ),
	    'singular_name' => _x( 'Kategori Agenda', 'taxonomy singular name' ),
	    'search_items' =>  __( 'Cari Kategori' ),
	    'all_items' => __( 'Semua Kategori' ),
	    'parent_item' => null,
	    'parent_item_colon' => null,
	    'edit_item' => __( 'Edit Kategori' ),
	    'update_item' => __( 'Update Kategori' ),
	    'add_new_item' => __( 'Tambah Baru' ),
	    'new_item_name' => __( 'Tambah Kategori Baru' ),
	    'menu_name' => __( 'Kategori Agenda' ),
	  );   
	// Now register the taxonomy
	  register_taxonomy('kat-agenda',array('agenda'), array(
	    'hierarchical' => true,
	    'labels' => $labels,
	    'show_ui' => true,
	    'show_admin_column' => true,
	    'query_var' => true,
	  ));
	}

	add_action( 'init', 'katt_taxonomy', 0 );
	function katt_taxonomy() {
	  $labels = array(
	    'name' => _x( 'Kategori Tausiyah', 'taxonomy general name' ),
	    'singular_name' => _x( 'Kategori Tausiyah', 'taxonomy singular name' ),
	    'search_items' =>  __( 'Cari Kategori' ),
	    'all_items' => __( 'Semua Kategori' ),
	    'parent_item' => null,
	    'parent_item_colon' => null,
	    'edit_item' => __( 'Edit Kategori' ),
	    'update_item' => __( 'Update Kategori' ),
	    'add_new_item' => __( 'Tambah Baru' ),
	    'new_item_name' => __( 'Tambah Kategori Baru' ),
	    'menu_name' => __( 'Kategori Tausiyah' ),
	  );   
	// Now register the taxonomy
	  register_taxonomy('kat-tausiyah',array('tausiyah'), array(
	    'hierarchical' => true,
	    'labels' => $labels,
	    'show_ui' => true,
	    'show_admin_column' => true,
	    'query_var' => true,
	  ));
	}
	
add_action( 'init', 'topik_taxonomy', 0 );
 
function topik_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'Topik Tausiyah', 'taxonomy general name' ),
    'singular_name' => _x( 'Topik Tausiyah', 'taxonomy singular name' ),
    'search_items' =>  __( 'Cari Tausiyah' ),
    'popular_items' => __( 'Topik Terpopuler' ),
    'all_items' => __( 'Semua Topik' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Topik' ), 
    'update_item' => __( 'Update Topik' ),
    'add_new_item' => __( 'Tambah Topik' ),
    'new_item_name' => __( 'Nama Topik Baru' ),
    'separate_items_with_commas' => __( 'Pisahkan topik dengan koma' ),
    'add_or_remove_items' => __( 'Tambah atau kurangi topik' ),
    'choose_from_most_used' => __( 'Pilih dari topik populer' ),
    'menu_name' => __( 'Topik Tausiyah' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('topik','tausiyah',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
  ));
}
	
?>