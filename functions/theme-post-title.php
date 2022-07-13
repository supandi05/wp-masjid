<?php

/*
 * Replace text.
 *
 */

function infaq_title_text( $title ){
     $screen = get_current_screen();
  
     if  ( 'infaq' == $screen->post_type ) {
          $title = 'Masukkan nama pemberi Infaq...';
	 } else if  ( 'laporan' == $screen->post_type ) {
          $title = 'Masukkan nama bulan dan tahun...';
     } else if  ( 'ramadhan' == $screen->post_type ) {
          $title = 'Masukkan tahun...';
     } else if  ( 'jadwal-jumat' == $screen->post_type ) {
          $title = 'Masukkan nama bulan dan tahun...';
     } else if  ( 'jadwal-shalat' == $screen->post_type ) {
          $title = 'Masukkan nama bulan dan tahun...';
     } else if  ( 'inventaris' == $screen->post_type ) {
          $title = 'Nama Inventaris / Fasilitas / Sarana Prasarana...';
     } else if  ( 'perpustakaan' == $screen->post_type ) {
          $title = 'Judul Buku / Kitab...';
     } else {
	      $title = 'Masukkan judul...';
	 }
  
     return $title;
}
  
add_filter( 'enter_title_here', 'infaq_title_text' );

?>