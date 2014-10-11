<?php 
/* template name: Course Masonry Portfolio */
?>
<?php
	$taxonomy = 'portfolio-category';
	$category_class = ' course';
	$term_ids = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' =>'ids' ));
	foreach( $term_ids as $term_id){
		$term = get_term( $term_id, $taxonomy );
		$category_class .= ' '. $term->slug;	
	}
	// get post options data
	$data = get_post_meta( $post->ID, 'portfolio_options', true );
	if ( get_post_meta( $post->ID, 'course_video_url', true ) )
	$video_src = get_post_meta( $post->ID, 'course_video_url', true );
	$video_html = wp_oembed_get( $video_src);
	}
	else
	$video_html = '';
	// post content type
	$p_type = '';
	$vid_container = '';

	$thumb = dt_get_thumbnail( array(
		'post_id'	=>$post->ID,
		'width'		=>240,
		'upscale'	=>true
	) );
			
	if ( $video_html && !post_password_required() ) {
		$p_type = 'type-video';
		$thumb['b_href'] = '#';
		$vid_container = <<<HEREDOC
		<div class="highslide-maincontent" data-width="80%">{$video_html}</div>
HEREDOC;
	}
	
	$pass_class = post_password_required()?' dt-pass-protected':'';
?>
<div id="<?php echo $post->ID ?>" class="article_box<?php echo $category_class ?> isotope-item <?php echo esc_attr(get_post_time('U', true, $post->ID)); echo $pass_class; ?>">
	<div class="article_t"></div>
	<div class="article">
		<div class="img-holder n-s ro <?php echo $p_type ?>">
			<a href="<?php the_permalink() ?>" data-img="<?php echo get_post_meta( $post->ID, 'featured_url', true ); ?>" title="<?php echo $thumb['caption']; ?>">
			<img src="<?php echo get_post_meta( $post->ID, 'featured_url', true ); ?>" />
			</a>
			
			<?php echo $vid_container ?>
		</div>
		<h4 class="entry-title _cf"><a href="<?php the_permalink() ?>"><?php the_title() ?>set</a></h4>
		<?php the_excerpt() ?>
		<a href="<?php the_permalink() ?>" class="button"><span class="but-r"><span><i class="detail"></i><?php _e( 'Details', LANGUAGE_ZONE ) ?></span></span></a>       	
	</div><!-- .article end -->
	<div class="article_footer_b"></div>
</div>