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


	// taxonomy list
			function course_tax_list( array $options ) {
				global $post;
				
				// for other button
				$tax = get_terms( 'division', array('fields' =>'ids') );
				$query = new Wp_Query(
					array(	
						'post_type'		=>'course',
						'tax_query'		=>array(
							array(
								'taxonomy'	=>'division',
								'field'		=>'id',
								'terms'		=>$tax,
								'operator'	=>'NOT IN'
							)
						),
						'posts_per_page'	=>1
					)
				);
				$others_flag = $query->found_posts?true:false;
				// end other part
				
				$term_args = array( 	'hide_empty'    =>1,
										'hierarchical'  =>0,
										'taxonomy'      =>'division',
										'pad_counts'    =>false
								);
				$default = array(	'a_class'		=>'button filter',
									'c_class'		=>'filters',
									'ajax'			=>false,
									'tax'			=>null
								);
				$o = array_merge( $default, $options );
				$tax_key = $o['tax']?key( $o['tax'] ):$o['tax'];
				$cur_cat = $out = $href = $href_plus = '';
								
				if( !$o['ajax'] ){
					// set glue element for href
					$href = get_permalink();
					if ( get_option('permalink_structure') != '' ){
						$glue = '?';
					}else{
						$glue = '&';
					}
					
					if( isset($_GET['portfolio_category']) ){
						$cur_cat = trim( (string) $_GET['portfolio_category'] );
					}
					$href_plus = $href. $glue. 'portfolio_category=';
					$href_other = $href. $glue. 'portfolio_category=none';
				}else{
					$href_plus = '#';
					$href = '#all';
					$href_other = '#none';
				}
				
				if( 'except' == $tax_key ) {
					$term_args['exclude'] = current( $o['tax'] );
				}elseif( 'only' == $tax_key ){
					$term_args['include'] = current( $o['tax'] );
				}

				$terms = get_terms( $term_args );
				print_r($terms);
				if( 1 == count($terms) ) {
					$out .= '<div class="'. esc_attr($o['c_class']). '" style="display: none !important;">';
					$out .= '<a href="'. esc_attr( $href_plus. $terms[0]->slug ). '" class="'. esc_attr($o['a_class']). ' act">';
                    $out .= '</a>';
                    $out .= '</div>';
                    return $out;
                }

				if( $terms ){
					$out .= '<div class="'. esc_attr($o['c_class']). '">';
					$out .= '<a href="'. esc_attr( $href ). '" class="'. esc_attr($o['a_class']). ($cur_cat?'':' act'). '">';
					$out .= '<span class="but-r"><span>'. __( 'View all', 'dt'). '</span></span>';
					$out .= '</a>';
					foreach( $terms as $term ){
						$act = '';
						if( $cur_cat == $term->slug ) $act = ' act';
						$out .= '<a href="'. esc_attr( $href_plus. $term->slug ). '" class="'. esc_attr($o['a_class']). $act. '">';
						$out .= '<span class="but-r"><span>'. $term->name. '</span></span>';
						$out .= '</a>';
					}
					
					if ( $others_flag ) {
						$out .= '<a href="'. esc_attr( $href_other ). '" class="'. esc_attr($o['a_class']). ('none' == $cur_cat?' act':''). '">';
						$out .= '<span class="but-r"><span>'. __( 'Other', 'dt'). '</span></span>';
						$out .= '</a>';
					}
					$out .= '</div>';
				}
				return $out;
			}
			
add_action('init', 'course_tax_list');