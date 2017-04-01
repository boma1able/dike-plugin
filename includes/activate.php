<?php
/**
 * Created by PhpStorm.
 * User: boma1
 * Date: 16.02.2017
 * Time: 16:14
 */

function dp_activate_plugin(){
    if (version_compare( get_bloginfo('version'), '4.2', '<' )){
        wp_die(__('You must update WordPress.', 'dike-plugin'));
    }

    global $wpdb;
    $createSQL = " 
            CREATE TABLE `" . $wpdb->prefix . "dike-plugin` ( 
            `id` bigint(20) NOT NULL AUTO_INCREMENT, 
            `post_id` bigint(20) NOT NULL, 
            `rating` float NOT NULL, 
            `user_ip` varchar(32) NOT NULL,
             PRIMARY KEY  (id) 
            ) ENGINE=InnoDB " . $wpdb->get_charset_collate() . " AUTO_INCREMENT=1;";
    error_log($createSQL);
    require(ABSPATH . '/wp-admin/includes/upgrade.php');
    dbDelta( $createSQL );
}
