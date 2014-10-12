<?php 
/* template name: Course Masonry Portfolio */
?>
<?php
	$encoded = false;
	$taxonomy = 'portfolio-category';
	$category_class = ' course';
	$term_ids = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' =>'ids' ));
	foreach( $term_ids as $term_id){
		$term = get_term( $term_id, $taxonomy );
		$category_class .= ' '. $term->slug;	
	}
	// get post options data
	$data = get_post_meta( $post->ID, 'portfolio_options', true );
	if ( get_post_meta( $post->ID, 'course_video_url', true ) ){
	$video_src = get_post_meta( $post->ID, 'course_video_url', true );
	$video_html = wp_oembed_get($video_src);
	// echo $video_html;
	//	$video_src = get_post_meta( $post->ID, 'course_video_url', true );
	//	$video_html = '<iframe width="640" height="315" src="'. $video_src . '?feature=oembed&autoplay=1" frameborder="0" allowfullscreen></iframe>';
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
		<div class="highslide-maincontent">{$video_html}</div>
HEREDOC;
	}
	
	$pass_class = post_password_required()?' dt-pass-protected':'';
?>
<div id="<?php echo $post->ID ?>" class="article_box<?php echo $category_class ?> isotope-item <?php echo esc_attr(get_post_time('U', true, $post->ID)); echo $pass_class; ?>">
	<div class="article_t"></div>
	<div class="article">
		<div class="img-holder n-s ro <?php echo $p_type ?>">
			<a href="<?php the_permalink() ?>" data-img="<?php echo get_post_meta( $post->ID, 'featured_url', true ); ?>" title="<?php echo $thumb['caption']; ?>">
			<img  <?php echo $thumb['size'][3] ?> src="<?php echo get_post_meta( $post->ID, 'featured_url', true ); ?>" />
			</a>
			
			<?php echo $vid_container ?>
		</div>
		<h4 class="entry-title _cf"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
		<?php the_excerpt();
		// echo $content = do_shortcode( '[course_join_button course="' . $encoded . '" course_id="' .  $post->ID . '"]' );
		?>
		<a href="<?php the_permalink() ?>" class="button"><span class="but-r"><span><i class="detail"></i><?php echo $content = do_shortcode( '[course_cost course="' . $encoded . '" course_id="' .  $post->ID . '"]' ); _e( 'Details', LANGUAGE_ZONE ) ?></span></span></a>       	
	</div><!-- .article end -->
	<div class="article_footer_b"></div>
</div>