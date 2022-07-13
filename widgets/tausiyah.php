<?php
class Tausiyah extends WP_Widget {
	function __construct() {
		parent::__construct(
			'tausiyah',
			__('WPM : Tausiyah Terbaru', 'wpmasjid')
		);
	}


	public function widget($args, $instance) {
		extract($args);

		$title = apply_filters('widget_title', $instance['title']);

		global $post;
		if (get_option('tausiyah_qty')) $tausiyah_qty = get_option('tausiyah_qty');
		else $tausiyah_qty = 5;
		$q_args = array(
			'numberposts' => $tausiyah_qty,
		);
		$rpthumb_posts = get_posts($q_args);

		echo $before_widget;

		if ($title) echo $before_title.$title.$after_title;

		foreach ($rpthumb_posts as $post):
			setup_postdata($post);
		?>
        <div class="widwpmasjid clear">
		<a href="<?php the_permalink(); ?>" class="rpthumb clear">
			<?php if (has_post_thumbnail() && !get_option('rpthumb_thumb')) {
				the_post_thumbnail('mini-thumbnail');
				$offset = ' style="padding-left: 65px;"';
			}
			else $offset = '';
			?>
			<span class="rpthumb-title"<?php echo $offset; ?>><?php the_title(); ?></span>
			<span class="rpthumb-date"<?php echo $offset; ?>><?php the_time('M j, Y'); ?></span>
		</a>
        </div>
		<?php
		endforeach;

		echo $after_widget;
	}

	public function form($instance) {
		if (isset($instance['title'])) $title = esc_attr($instance['title']);
		else $title = __('Tausiyah Terbaru', 'wpmasjid');
		?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Judul:', 'wpmasjid'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
		<p><label for="tausiyah_qty"><?php _e('Jumlah pos:', 'wpmasjid'); ?> </label><input type="text" name="tausiyah_qty" id="tausiyah_qty" size="2" value="<?php echo get_option('tausiyah_qty'); ?>"/></p>
		<p><label for="rpthumb_thumb"><?php _e('Sembunyikan thumbnail:', 'wpmasjid'); ?> </label><input type="checkbox" name="rpthumb_thumb" id="rpthumb_thumb" <?php echo (get_option('rpthumb_thumb')) ? 'checked="checked"' : ''; ?>/></p>

		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		update_option('tausiyah_qty', $_POST['tausiyah_qty']);
		update_option('rpthumb_thumb', $_POST['rpthumb_thumb']);
		return $instance;
	}
}
