<?php
$t_flag = has_post_thumbnail($post->ID);
?>
<div id="<?php echo $post->ID ?>" style="margin: 7px 0px;" class="article_box illustration isotope-item <?php echo esc_attr(get_post_time('U', true, $post->ID)); echo $pass_class; ?>">
	<div class="article">
		<?php if( $t_flag && !post_password_required() ): // post featuredimage ?>
			<div class="img-holder n-s">
				<?php
				$args = array(	'post_id'	=>$post->ID,
								'width'		=>240,
								'upscale'	=>true
								);
				$thumb = dt_get_thumbnail( $args );
				?>
				<a href="<?php echo get_post_meta( $post->ID, 'themov_link', true ); ?>" data-img="<?php echo get_post_meta( $post->ID, 'featured_url', true ); ?>" title="<?php echo $thumb['caption']; ?>">
				<img width="240" height="250" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" />
				</a>
			</div>
		<?php endif ?>
		<h4 class="entry-title _cf"><a href="<?php echo get_post_meta( $post->ID, 'themov_link', true ); ?>"><?php the_title() ?></a></h4>
		<?php 
		the_excerpt();
		wp_link_pages();
		?>
		<?php if( current_user_can('edit_posts')): // edit link?>
			<a href="<?php echo get_edit_post_link($post->ID) ?>" class="button">
				<span class="but-r"><span><i class="detail"></i><?php echo __( 'Edit', LANGUAGE_ZONE ) ?></span></span>
			</a>
		<?php endif ?>
		<a href="<?php echo get_post_meta( $post->ID, 'themov_link', true ); ?>?action=curriculum" class="button"><span class="but-r"><span><i class="detail"></i><?php _e( 'Curriculum', LANGUAGE_ZONE) ?></span></span></a>       
		
	</div><!-- .article end -->
	<div class="article_footer_b"></div>
</div>