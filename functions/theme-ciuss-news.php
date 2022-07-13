<?php

/*
 * Menambahkan RSS ciuss dashboard
 *
 */
 
    function wpc_dashboard_widgets() {
    	global $wp_meta_boxes;
	    	unset(
		    	$wp_meta_boxes['dashboard']['side']['core']['dashboard_plugins'],
				$wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],
				$wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']
				);
				
				add_meta_box( 'id', 'Berita dari <em>Ciuss.Com</em>', 'dashboard_custom_feed_output', 'dashboard', 'normal', 'high' );
		}
			
	function dashboard_custom_feed_output() {
	    echo '<div class="rss-widget">
            <div style="background: #333; width: auto; padding: 0px; margin: -12px -12px 10px;">
		        <img style="display: block;" src="http://ciuss.com/wp-content/themes/ciuss/images/ciuss.jpg" width="100%"/></div>';
				
				wp_widget_rss_output(array(
				'url' => 'http://ciuss.com/feed',
				'items' => 3,
				'show_summary' => 0,
				'show_author' => 0,
				'show_date' => 1)
				);
				
				echo '<div style="margin: 20px -12px -12px; padding: 12px; border-top: 1px solid #ddd;">
				    <a href="http://facebook.com/ciussw">Facebook</a> | 0838-1525-1385 | Gunakan kupon <a href="https://goo.gl/ie9jQv" target="_blank">CIUSS</a> , Ekstra diskon 10% Niagahoster
				</div>
			</div>';
		}
		
	add_action('wp_dashboard_setup', 'wpc_dashboard_widgets');

?>