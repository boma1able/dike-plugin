<?php
/**
 * Created by PhpStorm.
 * User: boma1
 * Date: 16.02.2017
 * Time: 20:46
 */

function dp_filter_dike_content( $content ){
    if(!is_singular('dike')){
        return $content;
    }

    global $post, $wpdb;
    $dike_data                  =   get_post_meta( $post->ID, 'dike_data', true);
    $dike_html                  =   file_get_contents('dike-template.php', true);
    $dike_html                  =   str_replace('TESTING_PERIOD_PH', $dike_data['testing_period'], $dike_html);
    $dike_html                  =   str_replace('PRICE_PH', $dike_data['price'], $dike_html);
    $dike_html                  =   str_replace('SIZE_PH', $dike_data['size'], $dike_html);
    $dike_html                  =   str_replace('RATING_PH', $dike_data['rating'], $dike_html);
    $dike_html                  =   str_replace('TESTING_PERIOD_Il8N', __('Testing Period', 'dike-plugin'), $dike_html);
    $dike_html                  =   str_replace('PRICE_Il8N', __('Price', 'dike-plugin'), $dike_html);
    $dike_html                  =   str_replace('SIZE_Il8N', __('Size', 'dike-plugin'), $dike_html);
    $dike_html                  =   str_replace('RATING_Il8N', __('Rating', 'dike-plugin'), $dike_html);
    $dike_html                  =   str_replace('RATE_LI8N', __('Rate', 'dike-plugin'), $dike_html);
    $dike_html                  =   str_replace('DIKE_ID', $post->ID, $dike_html);
    $dike_html                  =   str_replace('DIKE_RATING', $dike_data['rating'], $dike_html);

    $user_ip            =   $_SERVER['REMOTE_ADDR'];

    $rating_count       =   $wpdb->get_var("SELECT COUNT(*) FROM `" . $wpdb->prefix . "dike-plugin` 
                            WHERE dike_id='" .$post->ID . "' AND user_ip='" . $user_ip . "'");

    if($rating_count > 0){
        $dike_html              =   str_replace('READONLY_PLACEHOLDER', 'data-rateit-randomly="true"', $dike_html);
    }else{
        $dike_html              =   str_replace('READONLY_PLACEHOLDER', '', $dike_html);
    }


    return $dike_html . $content;
}