<?php
/**
 * Created by PhpStorm.
 * User: boma1
 * Date: 24.02.2017
 * Time: 11:55
 */

function dp_enqueue_scripts(){
    wp_register_style('dp_rateit', plugins_url('/dike-plugin/assets/rateit/scripts/rateit.css', RECIPE_PLUGIN_URL));
    wp_enqueue_style('dp_rateit');

    wp_register_script('dp_rateit', plugins_url('/dike-plugin/assets/rateit/scripts/jquery.rateit.min.js', RECIPE_PLUGIN_URL), array(), '1.0.0', true);
    wp_register_script('dp_main', plugins_url('/dike-plugin/assets/scripts/main.js', RECIPE_PLUGIN_URL), array(), '1.0.0', true);

    wp_localize_script("dp_main", "dike_obj", array(
        "ajax_url"                  =>  admin_url("admin-ajax.php")
    ));


    wp_enqueue_script('dp_rateit');
    wp_enqueue_script('dp_main');

}