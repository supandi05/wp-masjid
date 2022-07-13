<?php
/**
 * Tema WP Masjid menambahkan beberapa fungsi hook 
 * Bertujuan untuk membantu menampilkan konten sesuai kebutuhan
 * Disesuaikan untuk sebuah website desa
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 */

/**
 * Memanggil beberapa fungsi lain, dibawah ini
 */

require_once('functions/theme-post-type.php');
require_once('functions/theme-post-title.php');
require_once('functions/theme-time-left.php');
require_once('functions/theme-breadcrumb.php');
require_once('functions/theme-setup.php');
require_once('functions/theme-script.php');
require_once('functions/theme-option.php');
require_once('functions/theme-sidebar.php');
require_once('functions/theme-excerpt.php');
require_once('functions/theme-comment.php');
require_once('functions/theme-ciuss-news.php');
 
 
if (!isset($content_width)) {
	$content_width = 610;
}

//Initialize the update checker.
require 'functions/theme-update.php';
$example_update_checker = new ThemeUpdateChecker(
    'wp-masjid',
    'http://new.wpmasjid.com/masjid.json'
);

