{"filter":false,"title":"certification-masonry-portfolio.php","tooltip":"/certification-masonry-portfolio.php","undoManager":{"mark":18,"position":18,"stack":[[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":1,"column":18},"end":{"row":1,"column":24}},"text":"Course"},{"action":"insertText","range":{"start":{"row":1,"column":18},"end":{"row":1,"column":19}},"text":"C"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":1,"column":19},"end":{"row":1,"column":20}},"text":"e"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":1,"column":20},"end":{"row":1,"column":21}},"text":"r"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":1,"column":21},"end":{"row":1,"column":22}},"text":"t"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":1,"column":22},"end":{"row":1,"column":23}},"text":"i"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":1,"column":23},"end":{"row":1,"column":24}},"text":"f"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":1,"column":24},"end":{"row":1,"column":25}},"text":"i"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":1,"column":25},"end":{"row":1,"column":26}},"text":"c"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":1,"column":26},"end":{"row":1,"column":27}},"text":"a"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":1,"column":27},"end":{"row":1,"column":28}},"text":"t"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":1,"column":28},"end":{"row":1,"column":29}},"text":"i"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":1,"column":29},"end":{"row":1,"column":30}},"text":"o"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":1,"column":30},"end":{"row":1,"column":31}},"text":"n"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":6,"column":21},"end":{"row":6,"column":27}},"text":"course"},{"action":"insertText","range":{"start":{"row":6,"column":21},"end":{"row":6,"column":35}},"text":"Certifications"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":6,"column":21},"end":{"row":6,"column":22}},"text":"C"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":6,"column":20},"end":{"row":6,"column":21}},"text":" "}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":6,"column":20},"end":{"row":6,"column":21}},"text":"c"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":6,"column":20},"end":{"row":6,"column":21}},"text":" "}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":62,"column":0},"end":{"row":62,"column":6}},"text":"</div>"},{"action":"removeLines","range":{"start":{"row":3,"column":0},"end":{"row":62,"column":0}},"nl":"\n","lines":["<?php","\t$encoded = false;","\t$taxonomy = 'portfolio-category';","\t$category_class = ' certifications';","\t$term_ids = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' =>'ids' ));","\tforeach( $term_ids as $term_id){","\t\t$term = get_term( $term_id, $taxonomy );","\t\t$category_class .= ' '. $term->slug;\t","\t}","\t// get post options data","\t$data = get_post_meta( $post->ID, 'portfolio_options', true );","\tif ( get_post_meta( $post->ID, 'course_video_url', true ) ){","\t$video_src = get_post_meta( $post->ID, 'course_video_url', true );","\t$video_html = wp_oembed_get($video_src);","\t// echo $video_html;","\t//\t$video_src = get_post_meta( $post->ID, 'course_video_url', true );","\t//\t$video_html = '<iframe width=\"640\" height=\"315\" src=\"'. $video_src . '?feature=oembed&autoplay=1\" frameborder=\"0\" allowfullscreen></iframe>';","\t}","\telse","\t$video_html = '';","\t// post content type","\t$p_type = '';","\t$vid_container = '';","","\t$thumb = dt_get_thumbnail( array(","\t\t'post_id'\t=>$post->ID,","\t\t'width'\t\t=>240,","\t\t'upscale'\t=>true","\t) );","\t\t\t","\tif ( $video_html && !post_password_required() ) {","\t\t$p_type = 'type-video';","\t\t$thumb['b_href'] = '#';","\t\t$vid_container = <<<HEREDOC","\t\t<div class=\"highslide-maincontent\">{$video_html}</div>","HEREDOC;","\t}","\t","\t$pass_class = post_password_required()?' dt-pass-protected':'';","?>","<div id=\"<?php echo $post->ID ?>\" class=\"article_box<?php echo $category_class ?> isotope-item <?php echo esc_attr(get_post_time('U', true, $post->ID)); echo $pass_class; ?>\">","\t<div class=\"article_t\"></div>","\t<div class=\"article\">","\t\t<div class=\"img-holder n-s ro <?php echo $p_type ?>\">","\t\t\t<a href=\"<?php the_permalink() ?>\" data-img=\"<?php echo get_post_meta( $post->ID, 'featured_url', true ); ?>\" title=\"<?php echo $thumb['caption']; ?>\">","\t\t\t<img  <?php echo $thumb['size'][3] ?> src=\"<?php echo get_post_meta( $post->ID, 'featured_url', true ); ?>\" />","\t\t\t</a>","\t\t\t","\t\t\t<?php echo $vid_container ?>","\t\t</div>","\t\t<h4 class=\"entry-title _cf\"><a href=\"<?php the_permalink() ?>\"><?php the_title() ?></a></h4>","\t\t<?php the_excerpt();","\t\t// echo $content = do_shortcode( '[course_join_button course=\"' . $encoded . '\" course_id=\"' .  $post->ID . '\"]' );","\t\techo $content = do_shortcode( '[course_cost course=\"' . $encoded . '\" course_id=\"' .  $post->ID . '\"]' );","\t\t","\t\t?>","\t\t<a href=\"<?php the_permalink() ?>\" class=\"button\"><span class=\"but-r\"><span><i class=\"detail\"></i><?php _e( 'Details', LANGUAGE_ZONE ) ?></span></span></a>       \t","\t</div><!-- .article end -->","\t<div class=\"article_footer_b\"></div>"]},{"action":"insertText","range":{"start":{"row":3,"column":0},"end":{"row":3,"column":5}},"text":"<?php"},{"action":"insertText","range":{"start":{"row":3,"column":5},"end":{"row":4,"column":0}},"text":"\n"},{"action":"insertLines","range":{"start":{"row":4,"column":0},"end":{"row":53,"column":0}},"lines":["\t$taxonomy = 'portfolio-category';","\t$category_class = '';","\t$term_ids = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' =>'ids' ));","\tforeach( $term_ids as $term_id){","\t\t$term = get_term( $term_id, $taxonomy );","\t\t$category_class .= ' '. $term->slug;\t","\t}","\t// get post options data","\t$data = get_post_meta( $post->ID, 'portfolio_options', true );","\t$video_html = isset( $data['video_html'] )?trim( $data['video_html'] ):'';","\t// post content type","\t$p_type = '';","\t$vid_container = '';","","\t$thumb = dt_get_thumbnail( array(","\t\t'post_id'\t=>$post->ID,","\t\t'width'\t\t=>240,","\t\t'upscale'\t=>true","\t) );","\t\t\t","\tif ( $video_html && !post_password_required() ) {","\t\t$p_type = 'type-video';","\t\t$thumb['b_href'] = '#';","\t\t$vid_container = <<<HEREDOC","\t\t<div class=\"highslide-maincontent\" data-width=\"{$data['video_width']}\">{$video_html}</div>","HEREDOC;","\t}","\t","\t$pass_class = post_password_required()?' dt-pass-protected':'';","?>","<div id=\"<?php echo $post->ID ?>\" class=\"article_box<?php echo $category_class ?> isotope-item <?php echo esc_attr(get_post_time('U', true, $post->ID)); echo $pass_class; ?>\">","\t<div class=\"article_t\"></div>","\t<div class=\"article\">","\t\t<div class=\"img-holder n-s ro <?php echo $p_type ?>\">","\t\t\t<a href=\"<?php the_permalink() ?>\" data-img=\"<?php echo $thumb['b_href'] ?>\" title=\"<?php echo $thumb['caption']; ?>\">","\t\t\t\t<img <?php echo $thumb['size'][3] ?> src=\"<?php echo $thumb['t_href'] ?>\" alt=\"<?php echo $thumb['alt'] ?>\"/>","\t\t\t</a>","\t\t\t<?php echo $vid_container ?>","\t\t</div>","\t\t<h4 class=\"entry-title _cf\"><a href=\"<?php the_permalink() ?>\"><?php the_title() ?></a></h4>","\t\t<?php the_excerpt() ?>","\t\t<?php if( current_user_can('edit_posts')): // edit link?>","\t\t\t<a href=\"<?php echo get_edit_post_link($post->ID) ?>\" class=\"button\">","\t\t\t\t<span class=\"but-r\"><span><i class=\"detail\"></i><?php echo __( 'Edit', 'dt' ) ?></span></span>","\t\t\t</a>","\t\t<?php endif ?>","\t\t<a href=\"<?php the_permalink() ?>\" class=\"button\"><span class=\"but-r\"><span><i class=\"detail\"></i><?php _e( 'Details', LANGUAGE_ZONE ) ?></span></span></a>       \t","\t</div><!-- .article end -->","\t<div class=\"article_footer_b\"></div>"]},{"action":"insertText","range":{"start":{"row":53,"column":0},"end":{"row":53,"column":6}},"text":"</div>"}]}]]},"ace":{"folds":[],"scrolltop":154,"scrollleft":0,"selection":{"start":{"row":53,"column":6},"end":{"row":53,"column":6},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":10,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1413235552122,"hash":"a74ce3e964c2a52af290f6410acfd7c64986a775"}