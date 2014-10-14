<?php
$t_flag = has_post_thumbnail($post->ID);
?>
<div class="article_box">
	<div class="article_t">
		<?php if( comments_open() && !post_password_required() ): // comments ?>
			<a href="<?php comments_link() ?>" class="ico_link comments-a<?php echo $t_flag?'':' grey' ?>"><?php echo get_comments_number($post->ID) ?>
			</a>
		<?php endif ?>
	</div>
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
				<a href="<?php the_permalink() ?>" title="<?php echo $thumb['caption'] ?>" data-img="<?php echo $thumb['b_href'] ?>">	
					<img <?php echo $thumb['size'][3] ?> src="<?php echo $thumb['t_href'] ?>" alt="<?php echo $thumb['alt'] ?>"/>
				</a>
			</div>
		<?php endif ?>
		<h4 class="entry-title _cf"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
		<?php 
		the_excerpt();
		wp_link_pages();
		?>
	
		<a href="<?php the_permalink() ?>" class="button"><span class="but-r"><span><i class="detail"></i><?php _e( 'Details', LANGUAGE_ZONE) ?></span></span></a>       
		
	</div><!-- .article end -->
	<div class="article_footer_b"></div>
</div>