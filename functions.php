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
    	'publicly_queryable' => true,
    	'show_ui' => true,
    	'query_var' => true,
    	'menu_icon' => '',
    	'rewrite' => true,
    	'capability_type' => 'post',
    	'hierarchical' => true,
    	'menu_position' => 5,
    	'supports' => array('title','editor','thumbnail','excerpt', 'post-formats'),
    )
  );
}

function certification_division() {
	// create a new taxonomy
	register_taxonomy(
		'certification_division',
		'certification',
		array(
		    'labels' => array(
                'name' => 'Divisions',
                'add_new_item' => 'Add New Divison',
                'new_item_name' => "New Division of Certifications"
            ),
			'rewrite' => array( 'slug' => 'division' ),
			'hierarchical'      => true,
    		'show_ui'           => true,
    		'show_admin_column' => true,
    		'query_var'         => true,
			'capabilities' => array(
				'assign_terms' => 'edit_guides',
				'edit_terms' => 'publish_guides'
			)
		)
	);
}



add_action( 'init', 'course_division' );

add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'course',
    array(
      'labels' => array(
        'name' => __( 'courses' ),
        'singular_name' => __( 'course' )
      ),
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
    	'supports' => array('title','editor','thumbnail','excerpt', 'post-formats'),
    )
  );
}

function course_division() {
	// create a new taxonomy
	register_taxonomy(
		'course_division',
		'course',
		array(
		    'labels' => array(
                'name' => 'Divisions',
                'add_new_item' => 'Add New Divison',
                'new_item_name' => "New Division of courses"
            ),
			'rewrite' => array( 'slug' => 'division' ),
			'hierarchical'      => true,
    		'show_ui'           => true,
    		'show_admin_column' => true,
    		'query_var'         => true,
			'capabilities' => array(
				'assign_terms' => 'edit_guides',
				'edit_terms' => 'publish_guides'
			)
		)
	);
}
add_action( 'init', 'course_division' );