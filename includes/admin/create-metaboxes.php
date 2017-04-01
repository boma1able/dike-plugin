<?php
/**
 * Created by PhpStorm.
 * User: boma1
 * Date: 16.02.2017
 * Time: 16:50
 */

function dp_create_metaboxes(){
    add_meta_box(
        'dp_dike_options_mb',
        __('Table Values', 'dike-plugin'),
        'dp_dike_options_mb',
        'dike',
        'normal',
        'low'
    );
}