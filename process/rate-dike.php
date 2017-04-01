<?php
/**
 * Created by PhpStorm.
 * User: boma1
 * Date: 24.02.2017
 * Time: 12:34
 */

function dp_rate_dike(){
    global $wpdb;

    $response           =   array('status' => 1);
    $post_id            =   absint($_POST['rid']);
    $rating             =   round($_POST['rating'], 1);
    $user_ip            =   $_SERVER['REMOTE_ADDR'];

    $rating_count       =   $wpdb->get_var("SELECT COUNT(*) FROM `" . $wpdb->prefix . "dike-plugin` 
                            WHERE dike_id='" .$post_id . "' AND user_ip='" . $user_ip . "'");

    if($rating_count > 0){
        wp_send_json($response);
    }



    $wpdb->insert(
        $wpdb->prefix . 'dike-plugin',
        array(
            'dike_id'       =>  $post_id,
            'rating'        =>  $rating,
            'user_ip'       =>  $user_ip
        ),
        array(
            '%d', '%f', '%s'
        )
    );


    $dike_data          =   get_post_meta($post_id, 'dike_id', true);
    $dike_data['rating_count']++;
    $dike_data          =   $wpdb->get_var("SELECT AVG('rating') FROM `" . $wpdb->prefix . "dike-plugin` 
                            WHERE dike_id='" .$post_id . "'", 1);
    update_post_meta($post_id, 'dike_data', $dike_data);


    $response['status']     =   2;
    wp_send_json($response);

}