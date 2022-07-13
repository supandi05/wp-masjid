<?php
class Agenda extends WP_Widget {
	function __construct() {
		parent::__construct(
			'agenda',
			__('WPM : Agenda', 'wpmasjid')
		);
	}

	public function widget($args, $instance) {
		extract($args);

		$title = apply_filters('widget_title', $instance['title']);

		global $post;
		if (get_option('wagenda')) $wagenda = get_option('wagenda');
		else $wagenda = 5;
		$today = strtotime(date('d-m-Y'));
		$q_args = array( 
			'post_type' => 'event', 
			'numberposts' => $wagenda,
			'meta_key' => '_minus',
			'meta_query' => array(
				array(
				'key' => '_minus',
				'value' => $today,
				'compare' => '>='
				)
			),
			'orderby' => 'meta_value',
			'order' => 'ASC'
			); 
		
		$rpthumb_posts = get_posts($q_args);
		$tanggalan = get_post_meta($post->ID, '_tevent', true);
		$minus = strtotime(get_post_meta($post->ID, '_tevent', true));
		$jam = get_post_meta($post->ID, '_jam', true);

		echo $before_widget;

		if ($title) echo $before_title.$title.$after_title;
		else echo '<div class="widget-body clear">';

		foreach ($rpthumb_posts as $post):
			setup_postdata($post);
		?>

		<a href="<?php the_permalink(); ?>" class="rpthumb clear">
			
			<span><i class="fa fa-clock-o"></i> <?php echo get_post_meta($post->ID, '_jam', true); ?> - <?php echo get_post_meta($post->ID, '_tevent', true); ?></span><br/>
			<strong><?php the_title(); ?></strong><br/>
			<span>
			INFO : <?php echo get_post_meta($post->ID, '_koordinator', true); ?> / <?php echo get_post_meta($post->ID, '_telepon', true); ?>
			</span>
		</a>

		<?php
		endforeach;

		echo $after_widget;
	}

	public function form($instance) {
		if (isset($instance['title'])) $title = esc_attr($instance['title']);
		else $title = __('Agenda', 'wpmasjid');
		?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Judul:', 'wpmasjid'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
		<p><label for="agenda"><?php _e('Jumlah pos:', 'wpmasjid'); ?> </label><input type="text" name="wagenda" id="wagenda" size="2" value="<?php echo get_option('wagenda'); ?>"/></p>
		
		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		update_option('wagenda', $_POST['wagenda']);
		update_option('rpthumb_thumb', $_POST['rpthumb_thumb']);
		return $instance;
	}
}
