<?php

/*
 * Register widget (sidebar).
 *
 */
function wpmasjid_widgets_init() {
	require get_template_directory().'/widgets/recent-posts.php';
	register_widget('Recentposts_thumbnail');
	require get_template_directory().'/widgets/tausiyah.php';
	register_widget('Tausiyah');
	require get_template_directory().'/widgets/pengumuman.php';
	register_widget('Pengumuman');
	require get_template_directory().'/widgets/maps.php';
	register_widget('MasjidMaps');
	require get_template_directory().'/widgets/infaq.php';
	register_widget('LapInfaq');
	require get_template_directory().'/widgets/videos.php';
	register_widget('GalVideos');
	require get_template_directory().'/widgets/agenda.php';
	register_widget('Agenda');
	require get_template_directory().'/widgets/layanan.php';
	register_widget('Layanan');

	register_sidebar(array(
		'name' => __('Sidebar', 'wpmasjid'),
		'before_widget' => '<div id="%1$s" class="%2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	
	register_sidebar(array(
		'name' => __('Home Sidebar', 'wpmasjid'),
		'before_widget' => '<div id="%1$s" class="%2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}
add_action('widgets_init', 'wpmasjid_widgets_init');

?>