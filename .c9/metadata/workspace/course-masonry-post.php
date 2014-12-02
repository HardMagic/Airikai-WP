{"changed":true,"filter":false,"title":"course-masonry-post.php","tooltip":"/course-masonry-post.php","value":"<?php \n\n?>\n<?php\n\t$encoded = false;\n\t$taxonomy = 'portfolio-category';\n\t$category_class = ' course';\n\t$term_ids = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' =>'ids' ));\n\tforeach( $term_ids as $term_id){\n\t\t$term = get_term( $term_id, $taxonomy );\n\t\t$category_class .= ' '. $term->slug;\t\n\t}\n\t// get post options data\n\t$data = get_post_meta( $post->ID, 'portfolio_options', true );\n\tif ( get_post_meta( $post->ID, 'course_video_url', true ) ){\n\t$video_src = get_post_meta( $post->ID, 'course_video_url', true );\n\t$video_html = wp_oembed_get($video_src);\n\t// echo $video_html;\n\t//\t$video_src = get_post_meta( $post->ID, 'course_video_url', true );\n\t//\t$video_html = '<iframe width=\"640\" height=\"315\" src=\"'. $video_src . '?feature=oembed&autoplay=1\" frameborder=\"0\" allowfullscreen></iframe>';\n\t}\n\telse\n\t$video_html = '';\n\t// post content type\n\t$p_type = '';\n\t$vid_container = '';\n\n\t$thumb = dt_get_thumbnail( array(\n\t\t'post_id'\t=>$post->ID,\n\t\t'width'\t\t=>240,\n\t\t'upscale'\t=>true\n\t) );\n\t\t\t\n\tif ( $video_html && !post_password_required() ) {\n\t\t$p_type = 'type-video';\n\t\t$thumb['b_href'] = '#';\n\t\t$vid_container = <<<HEREDOC\n\t\t<div class=\"highslide-maincontent\">{$video_html}</div>\nHEREDOC;\n\t}\n\t\n\t$pass_class = post_password_required()?' dt-pass-protected':'';\n?>\n<div id=\"<?php echo $post->ID ?>\" class=\"article_box<?php echo $category_class ?> isotope-item <?php echo esc_attr(get_post_time('U', true, $post->ID)); echo $pass_class; ?>\">\n\t<div class=\"article_t\"></div>\n\t<div class=\"article\">\n\t\t<div class=\"img-holder n-s ro <?php echo $p_type ?>\">\n\t\t\t<a href=\"<?php the_permalink() ?>\" data-img=\"<?php echo get_post_meta( $post->ID, 'featured_url', true ); ?>\" title=\"<?php echo $thumb['caption']; ?>\">\n\t\t\t<img  <?php echo $thumb['size'][3] ?> src=\"<?php echo get_post_meta( $post->ID, 'featured_url', true ); ?>\" />\n\t\t\t</a>\n\t\t\t\n\t\t\t<?php echo $vid_container ?>\n\t\t</div>\n\t\t<h4 class=\"entry-title _cf\"><a href=\"<?php the_permalink() ?>\"><?php the_title() ?></a></h4>\n\t\t<?php the_excerpt();\n\t\t// echo $content = do_shortcode( '[course_join_button course=\"' . $encoded . '\" course_id=\"' .  $post->ID . '\"]' );\n\t\techo $content = do_shortcode( '[course_cost course=\"' . $encoded . '\" course_id=\"' .  $post->ID . '\"]' );\n\t\t\n\t\t?>\n\t\t<a href=\"<?php the_permalink() ?>\" class=\"button\"><span class=\"but-r\"><span><i class=\"detail\"></i><?php _e( 'Details', LANGUAGE_ZONE ) ?></span></span></a>       \t\n\t</div><!-- .article end -->\n\t<div class=\"article_footer_b\"></div>\n</div>","undoManager":{"mark":0,"position":-1,"stack":[]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":27,"column":34},"end":{"row":27,"column":34},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1414038846000}