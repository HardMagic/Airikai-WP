<?php
/* Template Name: Certification - Masonry */
?>
<?php get_header() ?>
<div id="bg">
	
	<?php get_template_part('mobile-menu') ?>
	<div id="top_bg"></div>
	<div id="holder">
		<?php get_template_part('aside') ?>
		<div id="content">
			<?php if( post_password_required() ): ?>
			
			<div class="article_box p">
				<div class="article_t"></div>
				<div class="article b">
					<?php echo get_the_password_form(); ?>
				</div><!-- .article b end -->
				<div class="article_b"></div>
			</div>
			
			<?php else: ?>
			<?php
			if( !$paged = get_query_var('paged') ){
				$paged = get_query_var('page');
			}
			
			$args = array(
				'post_type'	=>'certification',
				'paged'		=>$paged,
				'certification_division' => 'certification',
				'order' => 'ASC',
			);
			
			$data = get_post_meta( $post->ID, 'blog_posts_pp', true );
			if ( isset($data['posts_per_page']) && $data['posts_per_page'] ) {
				$args['posts_per_page'] = $data['posts_per_page'];
			}

			$temp = $wp_query;
			$wp_query = new Wp_Query( $args );
			?>
			<?php if( $wp_query->have_posts() ): ?>
			<div class="multicol">
				<?php while( $wp_query->have_posts() ): $wp_query->the_post(); ?>
					<?php
					if( !post_password_required() )
						get_template_part('certification-masonry', get_post_format());
					else
						get_template_part('certification-masonry');
					?>
				<?php endwhile ?>
			</div>
			<div id="nav-above" class="navigation blog">
				<?php 
				 if( function_exists('wp_pagenavi') ) wp_pagenavi();
				 else wp_link_pages();
				?>
			</div>
			<br><br>
			<?php
			else:
			endif ?>
			
			<div style="clear:both;"></div>
			<?php
			// DEGREE SECTION
			
			$args = array(
				'post_type'	=>'certification',
				'paged'		=>$paged,
				'certification_division' => 'degrees',
				'order' => 'ASC',
			);
			
				$temp = $wp_query;
			$wp_query = new Wp_Query( $args );
			?>
			<?php if( $wp_query->have_posts() ): ?>
			<div class="multicol">
				<?php while( $wp_query->have_posts() ): $wp_query->the_post(); ?>
					<?php
					if( !post_password_required() )
						get_template_part('certification-masonry', get_post_format());
					else
						get_template_part('certification-masonry');
					?>
				<?php endwhile ?>
			</div>
			<?php
			else:
			endif ?>
			
			<?php
			
			// END DEGREE SECTION
			
			
			 $wp_query = $temp; ?>
			<?php endif;// password protectection ?>
		</div>
	</div>
</div>
<?php get_footer() ?>
