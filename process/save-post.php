<?php
/**
 * Created by PhpStorm.
 * User: boma1
 * Date: 16.02.2017
 * Time: 19:20
 */

function dp_save_post_admin( $post_id, $post, $update ){
    if (!$update){
        return;
    }

    $dike_data                       = arraY();
    $dike_data['testing_period']     = sanitize_text_field($_POST['dp_testing_period']);
    $dike_data['price']              = sanitize_text_field($_POST['dp_price']);
    $dike_data['size']               = sanitize_text_field($_POST['dp_size']);
    $dike_data['rating']             = sanitize_text_field($_POST['dp_rating']);

    update_post_meta($post_id, 'dike_data', $dike_data);

}