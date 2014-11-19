<?php get_header() ?>

	<?php get_template_part('mobile-menu') ?>
	<div id="top_bg"></div>
	<div id="holder">
		<?php get_template_part('aside') ?>
		<div id="content">    
			<div class="article_box p">
				<div class="article_t"></div>
				<div class="article">
				<div>         
            	<?php
            		/**
            		 * woocommerce_before_main_content hook
            		 *
            		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
            		 * @hooked woocommerce_breadcrumb - 20
            		 */
            		do_action( 'woocommerce_before_main_content' );
            	?>
            
            		<?php while ( have_posts() ) : the_post(); ?>
            
            			<?php wc_get_template_part( 'content', 'single-product' ); ?>
            
            		<?php endwhile; // end of the loop. ?>
            
            	<?php
            		/**
            		 * woocommerce_after_main_content hook
            		 *
            		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
            		 */
            		do_action( 'woocommerce_after_main_content' );
            	?>
            
                </div>
                <div>
            	<?php
            		/**
            		 * woocommerce_sidebar hook
            		 *
            		 * @hooked woocommerce_get_sidebar - 10
            		 */
            		do_action( 'woocommerce_sidebar' );
            	?>
				</div><!-- .article b end -->
				<div class="article_b"></div>
			</div>
		</div>
	</div>
</div>
<?php get_footer( 'shop' ); ?>


    
