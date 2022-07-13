<?php
class MasjidMaps extends WP_Widget {
	function __construct() {
		parent::__construct(
			'masjidmaps',
			__('WPM : Maps Masjid', 'wpmasjid')
		);
	}

	public function widget($args, $instance) {
		extract($args);

		$title = apply_filters('widget_title', $instance['title']);

		global $post;
		if (get_option('maps_height')) $maps_height = get_option('maps_height');
		else $maps_height = 5;

		echo $before_widget;

		if ($title) echo $before_title.$title.$after_title;
		else echo '<div class="widget-body clear">'; ?>

	    	<div style="background: #639374; padding: 10px; color: #fff;">
	        	<div id="googleMap" style="width:100%; height:<?php echo (get_option('maps_height')) ? get_option('maps_height') : '450px' ?>; margin: 0 0 15px;"></div>
			    <div>
				    <h2><?php echo (get_option('nama')) ? get_option('nama') : 'Masjid At-Taqwa' ?></h2>
					<div>
				    	<em><?php echo (get_option('alamat')) ? get_option('alamat') : 'Jalan Lintas Liwa No. 39' ?>, <?php echo (get_option('kelurahan')) ? get_option('kelurahan') : 'Simpang Sari' ?>, <?php echo (get_option('kecamatan')) ? get_option('kecamatan') : 'Sumberjaya' ?>, <?php echo (get_option('kabupaten')) ? get_option('kabupaten') : 'Lampung Barat' ?>, <?php echo (get_option('provinsi')) ? get_option('provinsi') : 'Lampung' ?> , <?php echo (get_option('kodepos')) ? get_option('kodepos') : '' ?></em><br/>
						Telp : <strong><?php echo (get_option('telepon')) ? get_option('telepon') : '083815251385' ?></strong>
						<?php if (get_option('fax')) { echo '<br/>Fax : <strong>'.get_option('fax').'</strong>'; } ?>
						<?php if (get_option('email')) { echo '<br/>Email : '.get_option('email'); } ?>
					</div>
				</div>
			</div>
        <?php
		echo $after_widget;
	}

	public function form($instance) {
		if (isset($instance['title'])) $title = esc_attr($instance['title']);
		else $title = __('Lokasi Masjid', 'wpmasjid');
		?>

		<p>
		    Widget ini digunakan untuk menampilkan Maps lokasi masjid di Google Maps. Pastikan telah mengatur posisi koordinate dan API Key di penggaturan tema.
		</p>
		<p>
	    	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Judul:', 'wpmasjid'); ?> 
		        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	    	</label>
		</p>
		<p>
	    	<label for="maps_height"><?php _e('Tinggi Maps:', 'wpmasjid'); ?>
			<input  class="widefat" type="text" name="maps_height" id="maps_height" size="5" placeholder="450px" value="<?php echo get_option('maps_height'); ?>"/>
			</label>
		</p>
		

		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		update_option('maps_height', $_POST['maps_height']);
		return $instance;
	}
}