<?php 

// Replace text pengaturan WP Masjid

?>

    <tr valign="top">
	    <td class="tl"><label for="sekilas"><?php _e('Replace Text', 'wp-masjid'); ?></label></td>
		<td>
			Pengaturan ganti text digunakan untuk mengganti beberapa text default, khususnya text judul / heading yang ada di halaman Beranda website.
		</td>
	</tr>
	
	<tr valign="top">
    	<td class="tl"><label for="sekilas"><?php _e('Sekilas Info', 'wp-masjid'); ?></label></td>
		<td> 
	    	<input type="text" name="sekilas" id="sekilas" class="widefat" value="<?php echo get_option('sekilas'); ?>"/>
		</td>
	</tr>
	<tr valign="top">
    	<td class="tl"><label for="waktu"><?php _e('Waktu', 'wp-masjid'); ?></label></td>
		<td> 
	    	<input type="text" name="waktu" id="waktu" class="widefat" value="<?php echo get_option('waktu'); ?>"/>
		</td>
	</tr>
	
	<tr valign="top">
    	<td class="tl"><label for="dkm"><?php _e('Dewan Pengurus', 'wp-masjid'); ?></label></td>
		<td> 
	    	<input type="text" name="dkm" id="dkm" class="widefat" value="<?php echo get_option('dkm'); ?>"/>
		</td>
	</tr>
	<tr valign="top">
		<td class="tl"><label for="pusat"><?php _e('Pusat Informasi', 'wp-masjid'); ?></label></td>
		<td>
		    <input type="text" name="pusat" id="pusat" class="widefat" value="<?php echo get_option('pusat'); ?>"/>
		</td>
	</tr>
	<tr valign="top">
		<td class="tl"><label for="agenda"><?php _e('Agenda', 'wp-masjid'); ?></label></td>
		<td>
		    <input type="text" name="agenda" id="agenda" class="widefat" value="<?php echo get_option('agenda'); ?>"/>
		</td>
	</tr>
	<tr valign="top">
		<td class="tl"><label for="umum"><?php _e('Pengumuman', 'wp-masjid'); ?></label></td>
		<td>
		    <input type="text" name="umum" id="umum" class="widefat" value="<?php echo get_option('umum'); ?>"/>
		</td>
	</tr>
	<tr valign="top">
		<td class="tl"><label for="lapin"><?php _e('Laporan Infaq', 'wp-masjid'); ?></label></td>
		<td>
			<input type="text" name="lapin" id="lapin" class="widefat" value="<?php echo get_option('lapin'); ?>"/>
		</td>
	</tr>
	<tr valign="top">
		<td class="tl"><label for="seleng"><?php _e('Selengkapnya', 'wp-masjid'); ?></label></td>
		<td>
		    <input type="text" name="seleng" id="seleng" class="widefat" value="<?php echo get_option('seleng'); ?>"/>
		</td>
	</tr>
	
	<tr valign="top">
		<td class="tl"><label for="berita"><?php _e('Berita Terbaru', 'wp-masjid'); ?></label></td>
		<td>
		    <input type="text" name="berita" id="berita" class="widefat" value="<?php echo get_option('berita'); ?>"/>
		</td>
	</tr>
	<tr valign="top">
		<td class="tl"><label for="tausiyah"><?php _e('Tausiyah', 'wp-masjid'); ?></label></td>
		<td>
		    <input type="text" name="tausiyah" id="tausiyah" class="widefat" value="<?php echo get_option('tausiyah'); ?>"/>
		</td>
	</tr>
	<tr valign="top">
		<td class="tl"><label for="layanan"><?php _e('Layanan', 'wp-masjid'); ?></label></td>
		<td>
			<input type="text" name="layanan" id="layanan" class="widefat" value="<?php echo get_option('layanan'); ?>"/>
		</td>
	</tr>
	<tr valign="top">
		<td class="tl"><label for="galeri"><?php _e('Galeri', 'wp-masjid'); ?></label></td>
		<td>
		    <input type="text" name="galeri" id="galeri" class="widefat" value="<?php echo get_option('galeri'); ?>"/>
		</td>
	</tr>
	<tr valign="top">
		<td class="tl"><label for="video"><?php _e('Video', 'wp-masjid'); ?></label></td>
		<td>
		    <input type="text" name="video" id="video" class="widefat" value="<?php echo get_option('video'); ?>"/>
		</td>
	</tr>
	<tr valign="top">
		<td class="tl"><label for="invent"><?php _e('Inventaris', 'wp-masjid'); ?></label></td>
		<td>
		    <input type="text" name="invent" id="invent" class="widefat" value="<?php echo get_option('invent'); ?>"/>
		</td>
	</tr>
	<tr valign="top">
		<td class="tl"><label for="perpus"><?php _e('Perpustakaan', 'wp-masjid'); ?></label></td>
		<td>
		    <input type="text" name="perpus" id="perpus" class="widefat" value="<?php echo get_option('perpus'); ?>"/>
		</td>
	</tr>