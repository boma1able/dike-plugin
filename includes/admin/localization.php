<?php
/**
 * Created by PhpStorm.
 * User: boma1
 * Date: 23.02.2017
 * Time: 15:53
 */

function dike_plugin_loc_init() {
    load_plugin_textdomain( 'dike-plugin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}