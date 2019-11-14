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
?>

<?php if ( is_front_page() ) : ?>
  <?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>


<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php 
					
					if ( !is_front_page() ) {
						while ( have_posts() ) : the_post(); 

						get_template_part( 'loop-templates/content', 'page' ); 

					
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					

						endwhile; // end of the loop.
					} else {
						// The body content of the home page

						// this grabs the first key value from current page
						// then use that to filter out, by matching key, on the custom post type contents
						// to use set the first custom field key and value to the exact values of the custom fields of your custom posts
						global $wp_query;
						$page_meta = get_the_title();
						wp_reset_query();

						if(!$page_meta) {
							$page_meta="no_posts";
						}
						// print_r($page_meta);
						// print_r(get_post_meta($postid));
						// echo get_the_title();

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
								
									the_content();
									edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); 
							}
								/* Restore original Post Data */
								wp_reset_postdata();
							} else {
								// no posts found
							}
					} ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer();
