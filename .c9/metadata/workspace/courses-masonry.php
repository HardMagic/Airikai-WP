{"changed":true,"filter":false,"title":"courses-masonry.php","tooltip":"/courses-masonry.php","value":"<?php\n/* Template Name: Course Masonry*/\n?>\n<?php get_header() ?>\n<div id=\"bg\">\n\t\n\t<?php get_template_part('mobile-menu') ?>\n\t<div id=\"top_bg\"></div>\n\t<div id=\"holder\">\n\t\t<?php get_template_part('aside') ?>\n\t\t<div id=\"content\">\n\t\t\t<?php if( post_password_required() ): ?>\n\t\t\t\n\t\t\t<div class=\"article_box p\">\n\t\t\t\t<div class=\"article_t\"></div>\n\t\t\t\t<div class=\"article b\">\n\t\t\t\t\t<?php echo get_the_password_form(); ?>\n\t\t\t\t</div><!-- .article b end -->\n\t\t\t\t<div class=\"article_b\"></div>\n\t\t\t</div>\n\t\t\t\n\t\t\t<?php else: ?>\n\t\t\t<?php\n\t\t\tif( !$paged = get_query_var('paged') ){\n\t\t\t\t$paged = get_query_var('page');\n\t\t\t}\n\t\t\t\n\t\t\t$args = array(\n\t\t\t\t'post_type'\t=>'course',\n\t\t\t\t'paged'\t\t=>$paged,\n\t\t\t);\n\t\t\t\n\t\t\t$data = get_post_meta( $post->ID, 'blog_posts_pp', true );\n\t\t\tif ( isset($data['posts_per_page']) && $data['posts_per_page'] ) {\n\t\t\t\t$args['posts_per_page'] = $data['posts_per_page'];\n\t\t\t}\n\t\t\t\n\n\t\t\t$temp = $wp_query;\n\t\t\t$wp_query = new Wp_Query( $args );\n\t\t\t?>\n\t\t\t<?php if( $wp_query->have_posts() ): ?>\n\t\t\t<div id=\"multicol\">\n\t\t\t\t<?php while( $wp_query->have_posts() ): $wp_query->the_post(); ?>\n\t\t\t\t\t<?php\n\t\t\t\t\tif( !post_password_required() ){\n\t\t\t\t\t\tget_template_part('content-masonry', get_post_format());\n\t\t\t\t\t\techo \"tests\";\n\t\t\t\t\t\t}\n\t\t\t\t\telse\n\t\t\t\t\t\tget_template_part('content-masonry');\n\t\t\t\t\t?>\n\t\t\t\t<?php endwhile ?>\n\t\t\t\t\n\t\t\t</div>\n\t\t\t<div id=\"nav-above\" class=\"navigation blog\">\n\t\t\t\t<?php \n\t\t\t\t if( function_exists('wp_pagenavi') ) wp_pagenavi();\n\t\t\t\t else wp_link_pages();\n\t\t\t\t?>\n\t\t\t</div>\n\t\t\t<?php else:?>\n\t\t\t<?php endif ?>\n\t\t\t<?php $wp_query = $temp; ?>\n\t\t\t<?php endif;// password protectection ?>\n\t\t</div>\n\t</div>\n</div>\n<?php get_footer() ?>\n","undoManager":{"mark":-1,"position":7,"stack":[[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":1,"column":24},"end":{"row":1,"column":35}},"text":" Guide Old "}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":1,"column":24},"end":{"row":1,"column":25}},"text":" "}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":1,"column":27},"end":{"row":1,"column":28}},"text":"m"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":1,"column":27},"end":{"row":1,"column":28}},"text":"M"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":1,"column":26},"end":{"row":1,"column":27}},"text":" "}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":1,"column":25},"end":{"row":1,"column":26}},"text":"-"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":1,"column":24},"end":{"row":1,"column":25}},"text":" "}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":1,"column":24},"end":{"row":1,"column":25}},"text":" "}]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":1,"column":25},"end":{"row":1,"column":25},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1413052657207}