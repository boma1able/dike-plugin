<?php
/**
 * Created by PhpStorm.
 * User: boma1
 * Date: 16.02.2017
 * Time: 17:02
 */

function dp_admin_enqueue(){
    global $typenow;

    if($typenow !== "dike"){
        return;
    }

    wp_register_style('dp_style', plugins_url('/assets/styles/style.css', DIKE_PLUGIN_URL));
    wp_enqueue_style('dp_style');

    
}