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
  
  register_post_type( 'course',
    array(
      'labels' => array(
        'name' => __( 'Courses' ),
        'singular_name' => __( 'Course' )
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

add_action( 'init', 'certification_division' );



/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function themov_course_id_add_meta_box() {

	$screens = array( 'course' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'themov_course_id_sectionid',
			__( 'Course Link', 'themov_course_id_textdomain' ),
			'themov_course_id_meta_box_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'themov_course_id_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function themov_course_id_meta_box_callback( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'themov_course_id_meta_box', 'themov_course_id_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, 'themov_link', true );

	echo '<label for="themov_course_id_new_field">';
	_e( 'Course Link on TheMOV', 'themov_course_id_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="themov_course_id_new_field" name="themov_course_id_new_field" value="' . esc_attr( $value ) . '" size="25" />';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function themov_course_id_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['themov_course_id_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['themov_course_id_meta_box_nonce'], 'themov_course_id_meta_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( ! isset( $_POST['themov_course_id_new_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['themov_course_id_new_field'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'themov_link', $my_data );
}
add_action( 'save_post', 'themov_course_id_save_meta_box_data' );