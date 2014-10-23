<?php
$t_flag = has_post_thumbnail($post->ID);
?>
<div id="<?php echo $post->ID ?>" style="margin: 50px 0px; class="article_box illustration isotope-item <?php echo esc_attr(get_post_time('U', true, $post->ID)); echo $pass_class; ?>">
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
				<a href="<?php the_permalink() ?>" data-img="<?php echo get_post_meta( $post->ID, 'featured_url', true ); ?>" title="<?php echo $thumb['caption']; ?>">
				<img  width="240" height="250" src="<?php echo get_post_meta( $post->ID, 'featured_url', true ); ?>" />
				</a>
			</div>
		<?php endif ?>
		<h4 class="entry-title _cf"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
		<?php 
		the_excerpt();
		wp_link_pages();
		?>
		<?php if( current_user_can('edit_posts')): // edit link?>
			<a href="<?php echo get_edit_post_link($post->ID) ?>" class="button">
				<span class="but-r"><span><i class="detail"></i><?php echo __( 'Edit', LANGUAGE_ZONE ) ?></span></span>
			</a>
		<?php endif ?>
		<a href="<?php the_permalink() ?>" class="button"><span class="but-r"><span><i class="detail"></i><?php _e( 'Details', LANGUAGE_ZONE) ?></span></span></a>       
		
		<?php if( !post_password_required() ): ?>
		<div class="meta">
			<div class="ico-l d">   
				<a href="#" class="ico_link date"></a>
				<div class="info-block">
					<span class="grey"><?php _e( 'Published on:', LANGUAGE_ZONE ) ?></span><br/>
					<a href="<?php the_permalink() ?>"><?php the_time(get_option('date_format'). ' '. get_option('time_format') ) ?></a>
				</div>
			</div>           
			
			<div class="ico-l">
				<span class="ico_link author"></span>
				<div class="info-block">
					<span class="grey"><?php echo __( 'Author:', LANGUAGE_ZONE ) ?></span><br />                 
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>">
						<?php echo get_the_author() ?>
					</a>
				</div>
			</div>
			
			<?php // category
			 $categories = get_the_category_list( __( ', ', 'dt' ) );
			 if( $categories ):
			?>
				<div class="ico-l">
					<span class="ico_link categories"></span>
					<div class="info-block">
						<span class="grey"><?php echo __( 'Categories:', 'dt' ) ?></span><br />					
						<?php echo $categories ?>
					</div>
				</div>
			<?php endif ?>
			
			<?php //tags
			 $tags = get_the_tag_list( '', __( ', ', 'dt' ) );
			 if( $tags ):			
			?>
				<div class="ico-l">
					<span class="ico_link tags"></span>
					<div class="info-block">
						<span class="grey"><?php echo __( 'Tags:', 'dt' ) ?></span><br />                 
						<?php echo $tags ?>
					</div>
				</div>
			<?php endif ?>
		</div><!-- meta end -->
		<?php endif; ?>
	</div><!-- .article end -->
	<div class="article_footer_b"></div>
</div>