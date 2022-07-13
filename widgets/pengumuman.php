<?php
class Pengumuman extends WP_Widget {
	function __construct() {
		parent::__construct(
			'pengumuman',
			__('WPM : Pengumuman', 'wpmasjid')
		);
	}

	public function widget($args, $instance) {
		extract($args);

		$title = apply_filters('widget_title', $instance['title']);

		global $post;
		if (get_option('pengumuman')) $pengumuman = get_option('pengumuman');
		else $pengumuman = 5;
		$q_args = array(
			'numberposts' => $pengumuman,
			'post_type' => 'pengumuman',
		);
		$rpthumb_posts = get_posts($q_args);

		echo $before_widget;

		if ($title) echo $before_title.$title.$after_title;
		else echo '<div class="widget-body clear">';

		foreach ($rpthumb_posts as $post):
			setup_postdata($post);
		?>

		<a href="<?php the_permalink(); ?>" class="rpthumb clear">
			<?php if (has_post_thumbnail() && !get_option('rpthumb_thumb')) {
				the_post_thumbnail('mini-thumbnail');
				$offset = ' style="padding-left: 65px;"';
			}
			else $offset = '';
			?>
			<strong class="rpthumb-title"<?php echo $offset; ?>><?php the_title(); ?></strong>
			<span class="rpthumb-date"<?php echo $offset; ?>><?php printf(__('<i class="fa fa-clock-o"></i> <em>%s</em>', 'wpmasjid'),
					                    get_the_time('l, j M Y')
				                    	); ?></span>
		</a>

		<?php
		endforeach;

		echo $after_widget;
	}

	public function form($instance) {
		if (isset($instance['title'])) $title = esc_attr($instance['title']);
		else $title = __('Pengumuman', 'wpmasjid');
		?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Judul:', 'wpmasjid'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
		<p><label for="pengumuman"><?php _e('Jumlah pos:', 'wpmasjid'); ?> </label><input type="text" name="pengumuman" id="pengumuman" size="2" value="<?php echo get_option('pengumuman'); ?>"/></p>
		<p><label for="rpthumb_thumb"><?php _e('Sembunyikan thumbnail:', 'wpmasjid'); ?> </label><input type="checkbox" name="rpthumb_thumb" id="rpthumb_thumb" <?php echo (get_option('rpthumb_thumb')) ? 'checked="checked"' : ''; ?>/></p>

		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		update_option('pengumuman', $_POST['pengumuman']);
		update_option('rpthumb_thumb', $_POST['rpthumb_thumb']);
		return $instance;
	}
}
