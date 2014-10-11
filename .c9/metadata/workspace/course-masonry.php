{"changed":true,"filter":false,"title":"course-masonry.php","tooltip":"/course-masonry.php","value":"<?php \n/* Template Name: Portfolio - masonry - Courses*/\n?>\n<?php get_header() ?>\n<div id=\"bg\">\n\t\n\t<?php get_template_part('mobile-menu') ?>\n\t<div id=\"top_bg\"></div>\n\t<div id=\"holder\">\n\t\t<?php get_template_part('aside') ?>\n\t\t<div id=\"content\">\n\t\t\t<?php if( post_password_required() ): ?>\n\t\t\t\n\t\t\t<div class=\"article_box p\">\n\t\t\t\t<div class=\"article_t\"></div>\n\t\t\t\t<div class=\"article b\">\n\t\t\t\t\t<?php echo get_the_password_form(); ?>\n\t\t\t\t</div><!-- .article b end -->\n\t\t\t\t<div class=\"article_b\"></div>\n\t\t\t</div>\n\t\t\t\n\t\t\t<?php else: ?>\n\t\t\t\n\t\t\t<?php\n\t\t\t$port_terms = get_post_meta( $post->ID, 'show_portf', true );\n\t\t\t$args = array( 'post_type'\t=>'course' );\n\t\t\t\n\n/*\t\t\tCATEGORIES FOR COURSES - COMING SOON\n\t\t\thttp://premium.wpmudev.org/forums/topic/feature-requests-for-coursepress-pro\n\t\t\n\n\t\t\tif( isset($port_terms['number_portf']) && $port_terms['number_portf'] ) {\n\t\t\t\t$args['posts_per_page'] = $port_terms['number_portf'];\n\t\t\t\tunset($port_terms['number_portf']);\n\t\t\t}\n\n\t\t\t\n\t\t\tif( $port_terms ) {\n\t\t\t\t$args['tax_query'] = array(\t\n\t\t\t\t\t\t\t\t\t\t\tarray(\n\t\t\t\t\t\t\t\t\t\t\t\t'taxonomy'=>'portfolio-category',\n\t\t\t\t\t\t\t\t\t\t\t\t'field'=>'id',\n\t\t\t\t\t\t\t\t\t\t\t\t'terms'=>current( $port_terms ),\n\t\t\t\t\t\t\t\t\t\t\t\t'operator' => ( 'only' == key($port_terms) )?'IN':'NOT IN',\n\t\t\t\t\t\t\t\t\t\t\t)\n\t\t\t\t\t\t\t\t\t\t);\n\t\t\t}\n*/\n\n\t     \n\t\t\t$temp = $wp_query;\n\t\t\t$wp_query = new Wp_Query( $args );\n/*\n\t\t\tRELATED TO CATEGORIES \n\t\t\tif( $wp_query->have_posts() ): \n\t\t\t\techo dt_portf_tax_list(\n\t\t\t\t\tarray(\n\t\t\t\t\t\t'a_class'\t=>'button big filter',\n\t\t\t\t\t\t'c_class'\t=>'filter-p filters',\n\t\t\t\t\t\t'tax'\t\t=>$port_terms,\n\t\t\t\t\t\t'ajax'\t\t=>true\n\t\t\t\t\t)\n\t\t\t\t);\n*/\n\t\t\t?>\n\n\t\n\t\t\t\t<div id=\"multicol\" class=\"portfolio_massonry\">\n\t\t\t\t\t<?php while( $wp_query->have_posts() ): $wp_query->the_post(); ?>\n\t\t\t\t\t\t<?php get_template_part('course-masonry', 'portfolio'); ?>\n\t\t\t\t\t<?php endwhile ?>\n\t\t\t\t</div>\n\t\t\t\t<div id=\"nav-above\" class=\"navigation portfolio _m\">\n\t\t\t\t\t<?php\n\t\t\t\t\tif( function_exists('wp_pagenavi') ) wp_pagenavi();\n\t\t\t\t\telse wp_link_pages();\n\t\t\t\t\t?>\n\t\t\t\t</div>\n\t\t\t<?php // else:?>\n\t\t\t<?php // endif ?>\n\t\t\t<?php $wp_query = $temp; ?>\n\t\t\t<?php endif;// password protectection ?>\n\t\t</div>\n\t</div>\n</div>\n<?php get_footer() ?>\n","undoManager":{"mark":-1,"position":52,"stack":[[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":31},"end":{"row":70,"column":32}},"text":"c"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":31},"end":{"row":70,"column":32}},"text":"C"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":39},"end":{"row":70,"column":40}},"text":"m"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":39},"end":{"row":70,"column":40}},"text":"M"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":46},"end":{"row":70,"column":47}},"text":"-"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":47},"end":{"row":70,"column":48}},"text":"P"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":48},"end":{"row":70,"column":49}},"text":"o"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":49},"end":{"row":70,"column":50}},"text":"r"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":50},"end":{"row":70,"column":51}},"text":"t"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":51},"end":{"row":70,"column":52}},"text":"f"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":52},"end":{"row":70,"column":53}},"text":"o"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":53},"end":{"row":70,"column":54}},"text":"l"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":54},"end":{"row":70,"column":55}},"text":"i"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":55},"end":{"row":70,"column":56}},"text":"o"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":31},"end":{"row":70,"column":32}},"text":"C"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":31},"end":{"row":70,"column":32}},"text":"c"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":39},"end":{"row":70,"column":40}},"text":"M"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":39},"end":{"row":70,"column":40}},"text":"m"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":46},"end":{"row":70,"column":47}},"text":"-"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":46},"end":{"row":70,"column":47}},"text":"P"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":46},"end":{"row":70,"column":47}},"text":"o"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":46},"end":{"row":70,"column":47}},"text":"r"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":46},"end":{"row":70,"column":47}},"text":"t"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":46},"end":{"row":70,"column":47}},"text":"f"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":46},"end":{"row":70,"column":47}},"text":"o"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":46},"end":{"row":70,"column":47}},"text":"l"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":46},"end":{"row":70,"column":47}},"text":"i"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":46},"end":{"row":70,"column":47}},"text":"o"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":46},"end":{"row":70,"column":47}},"text":"-"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":47},"end":{"row":70,"column":48}},"text":"p"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":48},"end":{"row":70,"column":49}},"text":"o"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":49},"end":{"row":70,"column":50}},"text":"r"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":50},"end":{"row":70,"column":51}},"text":"t"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":51},"end":{"row":70,"column":52}},"text":"f"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":52},"end":{"row":70,"column":53}},"text":"o"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":53},"end":{"row":70,"column":54}},"text":"l"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":54},"end":{"row":70,"column":55}},"text":"i"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":55},"end":{"row":70,"column":56}},"text":"o"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":55},"end":{"row":70,"column":56}},"text":"o"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":54},"end":{"row":70,"column":55}},"text":"i"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":53},"end":{"row":70,"column":54}},"text":"l"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":52},"end":{"row":70,"column":53}},"text":"o"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":51},"end":{"row":70,"column":52}},"text":"f"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":50},"end":{"row":70,"column":51}},"text":"t"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":49},"end":{"row":70,"column":50}},"text":"r"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":48},"end":{"row":70,"column":49}},"text":"o"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":47},"end":{"row":70,"column":48}},"text":"p"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":46},"end":{"row":70,"column":47}},"text":"-"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":46},"end":{"row":70,"column":47}},"text":"-"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":46},"end":{"row":70,"column":47}},"text":"-"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":34},"end":{"row":70,"column":38}},"text":"tent"}]}],[{"group":"doc","deltas":[{"action":"removeText","range":{"start":{"row":70,"column":33},"end":{"row":70,"column":34}},"text":"n"}]}],[{"group":"doc","deltas":[{"action":"insertText","range":{"start":{"row":70,"column":33},"end":{"row":70,"column":37}},"text":"urse"}]}]]},"ace":{"folds":[],"scrolltop":448,"scrollleft":0,"selection":{"start":{"row":70,"column":45},"end":{"row":70,"column":45},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":31,"state":"php-comment","mode":"ace/mode/php"}},"timestamp":1413053747000}