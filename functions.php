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

function certification_division() {
	// create a new taxonomy
	register_taxonomy(
		'certification_division',
		'certification',
		array(
		    'labels' => array(
                'name' => 'Division',
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
add_action( 'init', 'certification_division' );