{"filter":false,"title":"functions.php","tooltip":"/functions.php","undoManager":{"mark":53,"position":53,"stack":[[{"group":"doc","deltas":[{"start":{"row":201,"column":30},"end":{"row":201,"column":48},"action":"remove","lines":["_my_meta_value_key"]},{"start":{"row":201,"column":30},"end":{"row":201,"column":41},"action":"insert","lines":["themov_link"]}]}],[{"group":"doc","deltas":[{"start":{"row":141,"column":37},"end":{"row":141,"column":55},"action":"remove","lines":["_my_meta_value_key"]},{"start":{"row":141,"column":37},"end":{"row":141,"column":48},"action":"insert","lines":["themov_link"]}]}],[{"group":"doc","deltas":[{"start":{"row":203,"column":65},"end":{"row":204,"column":0},"action":"insert","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":204,"column":0},"end":{"row":205,"column":0},"action":"insert","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":205,"column":0},"end":{"row":206,"column":0},"action":"insert","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":206,"column":0},"end":{"row":300,"column":4},"action":"insert","lines":["\t// taxonomy list","\t\t\tfunction dt_portf_tax_list( array $options ) {","\t\t\t\tglobal $post;","\t\t\t\t","\t\t\t\t// for other button","\t\t\t\t$tax = get_terms( 'portfolio-category', array('fields' =>'ids') );","\t\t\t\t$query = new Wp_Query(","\t\t\t\t\tarray(\t","\t\t\t\t\t\t'post_type'\t\t=>'portfolio',","\t\t\t\t\t\t'tax_query'\t\t=>array(","\t\t\t\t\t\t\tarray(","\t\t\t\t\t\t\t\t'taxonomy'\t=>'portfolio-category',","\t\t\t\t\t\t\t\t'field'\t\t=>'id',","\t\t\t\t\t\t\t\t'terms'\t\t=>$tax,","\t\t\t\t\t\t\t\t'operator'\t=>'NOT IN'","\t\t\t\t\t\t\t)","\t\t\t\t\t\t),","\t\t\t\t\t\t'posts_per_page'\t=>1","\t\t\t\t\t)","\t\t\t\t);","\t\t\t\t$others_flag = $query->found_posts?true:false;","\t\t\t\t// end other part","\t\t\t\t","\t\t\t\t$term_args = array( \t'type'          =>'portfolio',","\t\t\t\t\t\t\t\t\t\t'hide_empty'    =>1,","\t\t\t\t\t\t\t\t\t\t'hierarchical'  =>0,","\t\t\t\t\t\t\t\t\t\t'taxonomy'      =>'portfolio-category',","\t\t\t\t\t\t\t\t\t\t'pad_counts'    =>false","\t\t\t\t\t\t\t\t);","\t\t\t\t$default = array(\t'a_class'\t\t=>'button filter',","\t\t\t\t\t\t\t\t\t'c_class'\t\t=>'filters',","\t\t\t\t\t\t\t\t\t'ajax'\t\t\t=>false,","\t\t\t\t\t\t\t\t\t'tax'\t\t\t=>null","\t\t\t\t\t\t\t\t);","\t\t\t\t$o = array_merge( $default, $options );","\t\t\t\t$tax_key = $o['tax']?key( $o['tax'] ):$o['tax'];","\t\t\t\t$cur_cat = $out = $href = $href_plus = '';","\t\t\t\t\t\t\t\t","\t\t\t\tif( !$o['ajax'] ){","\t\t\t\t\t// set glue element for href","\t\t\t\t\t$href = get_permalink();","\t\t\t\t\tif ( get_option('permalink_structure') != '' ){","\t\t\t\t\t\t$glue = '?';","\t\t\t\t\t}else{","\t\t\t\t\t\t$glue = '&';","\t\t\t\t\t}","\t\t\t\t\t","\t\t\t\t\tif( isset($_GET['portfolio_category']) ){","\t\t\t\t\t\t$cur_cat = trim( (string) $_GET['portfolio_category'] );","\t\t\t\t\t}","\t\t\t\t\t$href_plus = $href. $glue. 'portfolio_category=';","\t\t\t\t\t$href_other = $href. $glue. 'portfolio_category=none';","\t\t\t\t}else{","\t\t\t\t\t$href_plus = '#';","\t\t\t\t\t$href = '#all';","\t\t\t\t\t$href_other = '#none';","\t\t\t\t}","\t\t\t\t","\t\t\t\tif( 'except' == $tax_key ) {","\t\t\t\t\t$term_args['exclude'] = current( $o['tax'] );","\t\t\t\t}elseif( 'only' == $tax_key ){","\t\t\t\t\t$term_args['include'] = current( $o['tax'] );","\t\t\t\t}","","\t\t\t\t$terms = get_categories( $term_args );","\t\t\t\tif( 1 == count($terms) ) {","\t\t\t\t\t$out .= '<div class=\"'. esc_attr($o['c_class']). '\" style=\"display: none !important;\">';","\t\t\t\t\t$out .= '<a href=\"'. esc_attr( $href_plus. $terms[0]->slug ). '\" class=\"'. esc_attr($o['a_class']). ' act\">';","                    $out .= '</a>';","                    $out .= '</div>';","                    return $out;","                }","","\t\t\t\tif( $terms ){","\t\t\t\t\t$out .= '<div class=\"'. esc_attr($o['c_class']). '\">';","\t\t\t\t\t$out .= '<a href=\"'. esc_attr( $href ). '\" class=\"'. esc_attr($o['a_class']). ($cur_cat?'':' act'). '\">';","\t\t\t\t\t$out .= '<span class=\"but-r\"><span>'. __( 'View all', 'dt'). '</span></span>';","\t\t\t\t\t$out .= '</a>';","\t\t\t\t\tforeach( $terms as $term ){","\t\t\t\t\t\t$act = '';","\t\t\t\t\t\tif( $cur_cat == $term->slug ) $act = ' act';","\t\t\t\t\t\t$out .= '<a href=\"'. esc_attr( $href_plus. $term->slug ). '\" class=\"'. esc_attr($o['a_class']). $act. '\">';","\t\t\t\t\t\t$out .= '<span class=\"but-r\"><span>'. $term->name. '</span></span>';","\t\t\t\t\t\t$out .= '</a>';","\t\t\t\t\t}","\t\t\t\t\t","\t\t\t\t\tif ( $others_flag ) {","\t\t\t\t\t\t$out .= '<a href=\"'. esc_attr( $href_other ). '\" class=\"'. esc_attr($o['a_class']). ('none' == $cur_cat?' act':''). '\">';","\t\t\t\t\t\t$out .= '<span class=\"but-r\"><span>'. __( 'Other', 'dt'). '</span></span>';","\t\t\t\t\t\t$out .= '</a>';","\t\t\t\t\t}","\t\t\t\t\t$out .= '</div>';","\t\t\t\t}","\t\t\t\treturn $out;","\t\t\t}"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":19},"end":{"row":207,"column":20},"action":"remove","lines":["f"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":18},"end":{"row":207,"column":19},"action":"remove","lines":["t"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":17},"end":{"row":207,"column":18},"action":"remove","lines":["r"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":16},"end":{"row":207,"column":17},"action":"remove","lines":["o"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":15},"end":{"row":207,"column":16},"action":"remove","lines":["p"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":14},"end":{"row":207,"column":15},"action":"remove","lines":["_"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":13},"end":{"row":207,"column":14},"action":"remove","lines":["t"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":12},"end":{"row":207,"column":13},"action":"remove","lines":["d"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":12},"end":{"row":207,"column":13},"action":"insert","lines":["c"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":13},"end":{"row":207,"column":14},"action":"insert","lines":["o"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":14},"end":{"row":207,"column":15},"action":"insert","lines":["u"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":15},"end":{"row":207,"column":16},"action":"insert","lines":["r"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":16},"end":{"row":207,"column":17},"action":"insert","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":17},"end":{"row":207,"column":18},"action":"insert","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":18},"end":{"row":207,"column":19},"action":"insert","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":18},"end":{"row":207,"column":19},"action":"remove","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":17},"end":{"row":207,"column":18},"action":"remove","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":16},"end":{"row":207,"column":17},"action":"remove","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":16},"end":{"row":207,"column":17},"action":"insert","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":207,"column":17},"end":{"row":207,"column":18},"action":"insert","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":211,"column":23},"end":{"row":211,"column":41},"action":"remove","lines":["portfolio-category"]},{"start":{"row":211,"column":23},"end":{"row":211,"column":31},"action":"insert","lines":["division"]},{"start":{"row":217,"column":22},"end":{"row":217,"column":40},"action":"remove","lines":["portfolio-category"]},{"start":{"row":217,"column":22},"end":{"row":217,"column":30},"action":"insert","lines":["division"]},{"start":{"row":232,"column":29},"end":{"row":232,"column":47},"action":"remove","lines":["portfolio-category"]},{"start":{"row":232,"column":29},"end":{"row":232,"column":37},"action":"insert","lines":["division"]}]}],[{"group":"doc","deltas":[{"start":{"row":214,"column":22},"end":{"row":214,"column":31},"action":"remove","lines":["portfolio"]},{"start":{"row":214,"column":22},"end":{"row":214,"column":23},"action":"insert","lines":["c"]}]}],[{"group":"doc","deltas":[{"start":{"row":214,"column":23},"end":{"row":214,"column":24},"action":"insert","lines":["o"]}]}],[{"group":"doc","deltas":[{"start":{"row":214,"column":24},"end":{"row":214,"column":25},"action":"insert","lines":["u"]}]}],[{"group":"doc","deltas":[{"start":{"row":214,"column":25},"end":{"row":214,"column":26},"action":"insert","lines":["r"]}]}],[{"group":"doc","deltas":[{"start":{"row":214,"column":26},"end":{"row":214,"column":27},"action":"insert","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":214,"column":27},"end":{"row":214,"column":28},"action":"insert","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":229,"column":44},"end":{"row":229,"column":53},"action":"remove","lines":["portfolio"]},{"start":{"row":229,"column":44},"end":{"row":229,"column":45},"action":"insert","lines":["c"]}]}],[{"group":"doc","deltas":[{"start":{"row":229,"column":45},"end":{"row":229,"column":46},"action":"insert","lines":["o"]}]}],[{"group":"doc","deltas":[{"start":{"row":229,"column":46},"end":{"row":229,"column":47},"action":"insert","lines":["u"]}]}],[{"group":"doc","deltas":[{"start":{"row":229,"column":47},"end":{"row":229,"column":48},"action":"insert","lines":["r"]}]}],[{"group":"doc","deltas":[{"start":{"row":229,"column":48},"end":{"row":229,"column":49},"action":"insert","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":229,"column":49},"end":{"row":229,"column":50},"action":"insert","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":270,"column":13},"end":{"row":270,"column":27},"action":"remove","lines":["get_categories"]},{"start":{"row":270,"column":13},"end":{"row":270,"column":14},"action":"insert","lines":["g"]}]}],[{"group":"doc","deltas":[{"start":{"row":270,"column":14},"end":{"row":270,"column":15},"action":"insert","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":270,"column":15},"end":{"row":270,"column":16},"action":"insert","lines":["t"]}]}],[{"group":"doc","deltas":[{"start":{"row":270,"column":16},"end":{"row":270,"column":17},"action":"insert","lines":[" "]}]}],[{"group":"doc","deltas":[{"start":{"row":270,"column":16},"end":{"row":270,"column":17},"action":"remove","lines":[" "]}]}],[{"group":"doc","deltas":[{"start":{"row":270,"column":16},"end":{"row":270,"column":17},"action":"insert","lines":["_"]}]}],[{"group":"doc","deltas":[{"start":{"row":270,"column":17},"end":{"row":270,"column":18},"action":"insert","lines":["t"]}]}],[{"group":"doc","deltas":[{"start":{"row":270,"column":18},"end":{"row":270,"column":19},"action":"insert","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":270,"column":19},"end":{"row":270,"column":20},"action":"insert","lines":["r"]}]}],[{"group":"doc","deltas":[{"start":{"row":270,"column":20},"end":{"row":270,"column":21},"action":"insert","lines":["m"]}]}],[{"group":"doc","deltas":[{"start":{"row":270,"column":21},"end":{"row":270,"column":22},"action":"insert","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":270,"column":22},"end":{"row":270,"column":23},"action":"insert","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":270,"column":23},"end":{"row":270,"column":24},"action":"insert","lines":["d"]}]}],[{"group":"doc","deltas":[{"start":{"row":270,"column":23},"end":{"row":270,"column":24},"action":"remove","lines":["d"]}]}],[{"group":"doc","deltas":[{"start":{"row":270,"column":22},"end":{"row":270,"column":23},"action":"remove","lines":["s"]}]}]]},"ace":{"folds":[],"scrolltop":3480,"scrollleft":0,"selection":{"start":{"row":271,"column":29},"end":{"row":271,"column":29},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":11,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1417652882261,"hash":"99f3f0c8cbfd8fdc4fa70798bc82b9faf2f5248a"}