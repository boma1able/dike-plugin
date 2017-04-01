<?php
/*
Plugin Name: Dike Beauty Plugin
Description: Это плагин для Dike1
Version: 1.0
Author: boma
Text Domain: dike-plugin
Domain Path: /languages/
License: A "Slug" license name e.g. GPL2
    Copyright 2017  boma  (email: bomaooo@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (!function_exists('add_action')){
    echo 'No allowed!';
    exit();
}


//Setup
define('DIKE_PLUGIN_URL', __FILE__);

//Includes
include ('includes/activate.php');
include ('includes/init.php');
include ('includes/admin/localization.php');
include ('includes/admin/dashboard-widgets.php');
include ('includes/admin/init.php');
include ('includes/widgets/dike-widget.php');
include ('includes/front/enqueue.php');
include ('includes/widgets/dashboard-dike-widget.php');
include ('process/save-post.php');
include ('process/filter-content.php');

//Hooks
register_activation_hook( __FILE__, 'dp_activate_plugin' );
add_action('init', 'dike_plugin_init');
add_action('admin_init', 'dike_admin_init');
add_action('save_post_dike', 'dp_save_post_admin', 10, 3);
add_filter( 'the_content', 'dp_filter_dike_content' );
add_action('wp_enqueue_scripts', 'dp_enqueue_scripts', 999);
add_action('plugins_loaded', 'dike_plugin_loc_init');
add_action( 'widgets_init', 'register_dike_widget' );
add_action('wp_dashboard_setup', 'dp_add_dashboard_widget');
add_action('wp_ajax_dp_rate_dike', 'dp_rate_dike');
add_action('wp_ajax_nopriv_dp_rate_dike', 'dp_rate_dike');
add_action( 'pre_get_posts', 'add_sheensay_product_in_main_query' );

function add_sheensay_product_in_main_query( $query ) {
    if ( is_archive() && $query -> is_main_query() )
    error_log(print_r($query, true));
    $query -> set( 'post_type', array( 'post', 'dike' ) );
    return $query;
}
//Shortcodes