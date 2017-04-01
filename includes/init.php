<?php
/**
 * Created by PhpStorm.
 * User: boma1
 * Date: 16.02.2017
 * Time: 16:22
 */

function dike_plugin_init() {
    $labels = array(
        'name'               => __( 'Dike Beauty', 'dike-plugin' ),
        'singular_name'      => __( 'dike2', 'dike-plugin' ),
        'menu_name'          => __( 'Dike Beauty', 'dike-plugin' ),
        'name_admin_bar'     => __( 'Dike4', 'dike-plugin' ),
        'add_new'            => __( 'Add New', 'dike-plugin' ),
        'add_new_item'       => __( 'Add New Post', 'dike-plugin' ),
        'new_item'           => __( 'New Post', 'dike-plugin' ),
        'edit_item'          => __( 'Edit Post', 'dike-plugin' ),
        'view_item'          => __( 'View Post', 'dike-plugin' ),
        'all_items'          => __( 'All Posts', 'dike-plugin' ),
        'search_items'       => __( 'Search Posts', 'dike-plugin' ),
        'parent_item_colon'  => __( 'Parent Books:', 'dike-plugin' ),
        'not_found'          => __( 'No posts found.', 'dike-plugin' ),
        'not_found_in_trash' => __( 'No posts found in Trash.', 'dike-plugin' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'A custom post type.', 'dike-plugin' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'dike' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 2,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail'),
        'taxonomies'         => array( 'category', 'post_tag' )
    );

    register_post_type( 'dike', $args );
}