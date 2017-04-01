<?php
/**
 * Created by PhpStorm.
 * User: boma1
 * Date: 16.02.2017
 * Time: 16:47
 */

function dike_admin_init(){
    include ('create-metaboxes.php');
    include ('dike-options.php');
    include ('enqueue.php');

    add_action('add_meta_boxes_dike', 'dp_create_metaboxes');
    add_action('admin_enqueue_scripts', 'dp_admin_enqueue');
}