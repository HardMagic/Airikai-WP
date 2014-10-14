<?php

/*
Keep in mind these are add on functions for DT-Slash Theme
*/

show_admin_bar(false); 

add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'certification',
    array(
      'labels' => array(
        'name' => __( 'Certifications' ),
        'singular_name' => __( 'certification' )
      ),
        'public' => true,
        'has_archive' => false,
        'public' => true,
        'has_archive' => false,
    	'publicly_queryable' => true,
    	'show_ui' => true,
    	'query_var' => true,
    	'menu_icon' => '',
    	'rewrite' => true,
    	'capability_type' => 'post',
    	'hierarchical' => true,
    	'menu_position' => 5,
    	'supports' => array('title','editor','thumbnail','excerpt'),
        'taxonomies' => array('category'),
    )
  );
}