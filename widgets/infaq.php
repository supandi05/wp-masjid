<?php
class LapInfaq extends WP_Widget {
	function __construct() {
		parent::__construct(
			'infaq_terbaru',
			__('WPM : Infaq Terbaru', 'wpmasjid')
		);
	}

	public function widget($args, $instance) {
		extract($args);

		$title = apply_filters('widget_title', $instance['title']);

		global $post;
		
		$q_args = array(
			'numberposts' => 5,
			'post_type' => 'infaq',
		);
		$rpthumb_posts = get_posts($q_args);

		echo $before_widget;

		if ($title) echo $before_title.$title.$after_title;
		else echo '<div class="widget-body clear">';
        echo '<div class="sdtable">';
		echo '<table>';
		echo '<tr><td><strong>Jumlah</strong></td><td><strong>Peng-Infaq</strong></td></tr>';
		foreach ($rpthumb_posts as $post):
			setup_postdata($post);
		?>

		<tr>
			<td><strong><?php echo 'Rp. '.get_post_meta($post->ID, '_juminfaq', true); ?></strong></td>
			<td><?php the_title(); ?></td>
		</tr>

		<?php
		endforeach;
		echo '</table>';
		echo '</div>';
		echo $after_widget;
	}


	public function form($instance) {
		if (isset($instance['title'])) $title = esc_attr($instance['title']);
		else $title = __('Infaq Terbaru', 'wpmasjid');
		?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Judul:', 'wpmasjid'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
		<p>Widget ini digunakan untuk menampilkan daftar 10 infaq terbaru di sidebar</p>

		<?php
	}


	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
}
