<?php
/*
Plugin Name: Quick Search And Replace
Plugin URI: http://www.info-d-74.com
Description: Search and replace into any database table
Version: 1.0
Author: 
Author URI: 
Text Domain: quick-quick-search
Domain Path: /languages
*/


define('QUICK_SEARCH_PATH', dirname(__FILE__));
$plugin = plugin_basename(__FILE__);
define('QUICK_SEARCH_URL', plugin_dir_url($plugin));

require(QUICK_SEARCH_PATH.'/inc/quick-search-main.php');
require(QUICK_SEARCH_PATH.'/inc/quick-search-ajax.php');
// require QUICK_SEARCH_PATH.'/inc/special-discount-ajax.php';


// add_action('admin_print_styles', 'search_and_replace_css' );
   
// function search_and_replace_css() {
// 	//die( print plugins_url('css/style.css', __FILE__));
//     wp_enqueue_style( 'SearchAndReplaceStylesheet', plugins_url('css/style.css', __FILE__) );
//     //wp_enqueue_style( 'SearchAndReplaceStylesheet' );
// }





?>