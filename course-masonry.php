<?php 
/* Template Name: Portfolio - Masonry - Courses*/
?>
<?php get_header() ?>
<div id="bg">
	
	<?php get_template_part('mobile-menu') ?>
	<div id="top_bg"></div>
	<div id="holder">
		<?php get_template_part('aside') ?>
		<div id="content">
			<?php
			$port_terms = get_post_meta( $post->ID, 'division', true );
			$args = array( 'post_type'	=>'course' );
			

			if( isset($port_terms['division']) && $port_terms['division'] ) {
				$args['posts_per_page'] = $port_terms['division'];
				unset($port_terms['division']);
			}

			
			if( $port_terms ) {
				$args['tax_query'] = array(	
											array(
												'taxonomy'=>'portfolio-category',
												'field'=>'id',
												'terms'=>current( $port_terms ),
												'operator' => ( 'only' == key($port_terms) )?'IN':'NOT IN',
											)
										);
			}


	     
			$temp = $wp_query;
			$wp_query = new Wp_Query( $args );

			RELATED TO CATEGORIES 
			if( $wp_query->have_posts() ): 
				echo dt_portf_tax_list(
					array(
						'a_class'	=>'button big filter',
						'c_class'	=>'filter-p filters',
						'tax'		=>$port_terms,
						'ajax'		=>true
					)
				);

			?>

	
				<div id="multicol">
					<?php while( $wp_query->have_posts() ): $wp_query->the_post(); ?>
						<?php get_template_part('course-masonry', 'portfolio'); ?>
					<?php endwhile ?>
				</div>
				<div id="nav-above" class="navigation portfolio _m">
					<?php
					if( function_exists('wp_pagenavi') ) wp_pagenavi();
					else wp_link_pages();
					?>
				</div>
			<?php $wp_query = $temp; ?>
		</div>
	</div>
</div>
<?php get_footer() ?>
