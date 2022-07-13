<?php 

add_action( 'init', 'create_post_type' );

function create_post_type() {

require_once('post/slide.php');
require_once('post/agenda.php');
require_once('post/pengumuman.php');	
require_once('post/info.php');	
require_once('post/tausiyah.php');

require_once('jadwal/shalat.php');
require_once('jadwal/jumat.php');
require_once('jadwal/ramadhan.php');

require_once('laporan/infaq.php');
require_once('laporan/keuangan.php');

require_once('masjid/lembaga.php');
require_once('masjid/layanan.php');
require_once('masjid/inventaris.php');
require_once('masjid/perpustakaan.php');
	
require_once('post/galeri.php');	
require_once('post/video.php');
}

require_once('theme-taxonomy.php');

?>