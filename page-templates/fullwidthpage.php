<?php
/**
 * Template Name: Full Width Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
set_query_var( 'container', $container );

?>

<?php if ( is_front_page() ) : ?>
  <?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>


<div class="wrapper" id="full-width-page-wrapper">
	<?php 
	// this would be any content that is not on the static home page
		
		if ( !is_front_page() && !is_page( 'Contact' ) ) {
			while ( have_posts() ) : the_post(); ?>
				<div class="container-fluid" id="content">
					<div class="row">

						<div class="col-md-12 image-header">

							<!-- no header -->

							<div class="image-overlay">
								<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
							</div>

						</div>

						<div class="col-md-12 content-area" id="primary">
							<main class="site-main" id="main" role="main">

								<?php
									get_template_part( 'loop-templates/content', 'page' ); 
								?>

							</main><!-- #main -->
						</div><!-- #primary -->
					</div><!-- .row end -->
				</div><!-- container end -->

		
				<?php // If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // end of the loop.

		} else {
			// The body content of the home page
			// Grabs posts based off of their meta page tag and then orders them by the order tag
			// Also will style the content based off of meta templates

			global $wp_query;
			
			$page_meta = get_the_title();

			wp_reset_query();


			if(!$page_meta) {
				$page_meta="no_posts";
			}

			$body = array(
				'post_type' 		=> 'contents',
				'nopaging' 			=> true,
				'order' 			=> 'ASC',
				'meta_query' 		=> array(
					'relation'			=> 'AND',
					'order'				=> array(
						'key'				=> 'order',
						'compare'			=> 'EXISTS',
					), 
					'page' 				=> array(
						'value' 			=> $page_meta,
						'compare' 			=> 'EXISTS',
					)
				),
				'orderby' 			=> array(
					'order'				=> 'ASC'
				),
			);

			$the_query = new WP_Query($body);

				// The Loop
				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {

							$the_query->the_post(); 
							$meta_template = get_post_meta( get_the_ID(), 'template', true);
							
						?>

						<?php get_template_part( 'content-templates/template', $meta_template ) ?>

				<?php }
					/* Restore original Post Data */
					wp_reset_postdata();
				} else {
					// no posts found
				}
		} ?>
</div><!-- #full-width-page-wrapper -->

<?php get_footer();
