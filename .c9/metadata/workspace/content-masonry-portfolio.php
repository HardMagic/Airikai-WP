{"changed":true,"filter":false,"title":"content-masonry-portfolio.php","tooltip":"/content-masonry-portfolio.php","value":"<?php\n\t$taxonomy = 'portfolio-category';\n\t$category_class = '';\n\t$term_ids = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' =>'ids' ));\n\tforeach( $term_ids as $term_id){\n\t\t$term = get_term( $term_id, $taxonomy );\n\t\t$category_class .= ' '. $term->slug;\t\n\t}\n\t// get post options data\n\t$data = get_post_meta( $post->ID, 'portfolio_options', true );\n\t$video_html = isset( $data['video_html'] )?trim( $data['video_html'] ):'';\n\t// post content type\n\t$p_type = '';\n\t$vid_container = '';\n\n\t$thumb = dt_get_thumbnail( array(\n\t\t'post_id'\t=>$post->ID,\n\t\t'width'\t\t=>240,\n\t\t'upscale'\t=>true\n\t) );\n\t\t\t\n\tif ( $video_html && !post_password_required() ) {\n\t\t$p_type = 'type-video';\n\t\t$thumb['b_href'] = '#';\n\t\t$vid_container = <<<HEREDOC\n\t\t<div class=\"highslide-maincontent\" data-width=\"{$data['video_width']}\">{$video_html}</div>\nHEREDOC;\n\t}\n\t\n\t$pass_class = post_password_required()?' dt-pass-protected':'';\n?>\n<div id=\"<?php echo $post->ID ?>\" class=\"article_box<?php echo $category_class ?> isotope-item <?php echo esc_attr(get_post_time('U', true, $post->ID)); echo $pass_class; ?>\">\n\t<div class=\"article_t\"></div>\n\t<div class=\"article\">\n\t\t<div class=\"img-holder n-s ro <?php echo $p_type ?>\">\n\t\t\t<a href=\"<?php the_permalink() ?>\" data-img=\"<?php echo $thumb['b_href'] ?>\" title=\"<?php echo $thumb['caption']; ?>\">\n\t\t\t\t<img <?php echo $thumb['size'][3] ?> src=\"<?php echo $thumb['t_href'] ?>\" alt=\"<?php echo $thumb['alt'] ?>\"/>\n\t\t\t</a>\n\t\t\t<?php echo $vid_container ?>\n\t\t</div>\n\t\t<h4 class=\"entry-title _cf\"><a href=\"<?php the_permalink() ?>\"><?php the_title() ?></a></h4>\n\t\t<?php the_excerpt() ?>\n\t\t<?php if( current_user_can('edit_posts')): // edit link?>\n\t\t\t<a href=\"<?php echo get_edit_post_link($post->ID) ?>\" class=\"button\">\n\t\t\t\t<span class=\"but-r\"><span><i class=\"detail\"></i><?php echo __( 'Edit', 'dt' ) ?></span></span>\n\t\t\t</a>\n\t\t<?php endif ?>\n\t\t<a href=\"<?php the_permalink() ?>\" class=\"button\"><span class=\"but-r\"><span><i class=\"detail\"></i><?php _e( 'Details', LANGUAGE_ZONE ) ?></span></span></a>       \t\n\t</div><!-- .article end -->\n\t<div class=\"article_footer_b\"></div>\n</div>","undoManager":{"mark":30,"position":-1,"stack":[[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":30,"column":2},"end":{"row":31,"column":0}},"text":"\n"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":31,"column":0},"end":{"row":31,"column":1}},"text":"s"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":31,"column":1},"end":{"row":31,"column":2}},"text":"a"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":31,"column":2},"end":{"row":31,"column":3}},"text":"d"},{"action":"insertText","range":{"start":{"row":31,"column":3},"end":{"row":31,"column":4}},"text":"f"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":31,"column":4},"end":{"row":31,"column":5}},"text":"s"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":31,"column":4},"end":{"row":31,"column":5}},"text":"s"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":31,"column":3},"end":{"row":31,"column":4}},"text":"f"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":31,"column":2},"end":{"row":31,"column":3}},"text":"d"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":31,"column":1},"end":{"row":31,"column":2}},"text":"a"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":31,"column":0},"end":{"row":31,"column":1}},"text":"s"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":30,"column":2},"end":{"row":31,"column":0}},"text":"\n"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":30,"column":2},"end":{"row":31,"column":0}},"text":"\n"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":31,"column":0},"end":{"row":31,"column":1}},"text":"<"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":31,"column":1},"end":{"row":31,"column":2}},"text":"t"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":31,"column":2},"end":{"row":31,"column":3}},"text":"e"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":31,"column":3},"end":{"row":31,"column":4}},"text":"s"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":31,"column":4},"end":{"row":31,"column":5}},"text":"t"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":31,"column":4},"end":{"row":31,"column":5}},"text":"t"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":31,"column":3},"end":{"row":31,"column":4}},"text":"s"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":31,"column":2},"end":{"row":31,"column":3}},"text":"e"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":31,"column":1},"end":{"row":31,"column":2}},"text":"t"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":31,"column":0},"end":{"row":31,"column":1}},"text":"<"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":31,"column":0},"end":{"row":31,"column":1}},"text":"t"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":31,"column":1},"end":{"row":31,"column":2}},"text":"e"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":31,"column":2},"end":{"row":31,"column":3}},"text":"s"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":31,"column":3},"end":{"row":31,"column":4}},"text":"t"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":31,"column":3},"end":{"row":31,"column":4}},"text":"t"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":31,"column":2},"end":{"row":31,"column":3}},"text":"s"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":31,"column":1},"end":{"row":31,"column":2}},"text":"e"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":31,"column":0},"end":{"row":31,"column":1}},"text":"t"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":30,"column":2},"end":{"row":31,"column":0}},"text":"\n"}]}]]},"ace":{"folds":[],"scrolltop":120,"scrollleft":0,"selection":{"start":{"row":36,"column":46},"end":{"row":36,"column":110},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1413235538099}