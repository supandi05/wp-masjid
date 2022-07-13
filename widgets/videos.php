<?php
class GalVideos extends WP_Widget {
	function __construct() {
		parent::__construct(
			'galerivideo',
			__('WPM : Video Terbaru', 'wpmasjid')
		);
	}

	public function widget($args, $instance) {
		extract($args);

		$title = apply_filters('widget_title', $instance['title']);

		global $post;
		$q_args = array(
			'numberposts' => 1,
			'post_type' => 'video',
		);
		$rpthumb_posts = get_posts($q_args);

		echo $before_widget;

		if ($title) echo $before_title.$title.$after_title;

		foreach ($rpthumb_posts as $post):
			setup_postdata($post);
		?>
        <iframe class="vibar" src="https://www.youtube.com/embed/<?php echo get_post_meta($post->ID, '_embed', true); ?>" frameborder="0" allowfullscreen></iframe>
		<?php
		endforeach;

		echo $after_widget;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form($instance) {
		if (isset($instance['title'])) $title = esc_attr($instance['title']);
		else $title = __('Video Terbaru', 'wpmasjid');
		?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Judul:', 'wpmasjid'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
}
