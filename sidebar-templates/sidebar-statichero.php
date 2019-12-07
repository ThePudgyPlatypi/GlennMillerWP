<?php
/**
 * Static hero sidebar setup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_active_sidebar( 'statichero' ) ) : ?>

	<!-- ******************* The Hero Widget Area ******************* -->

	<div class="wrapper" id="wrapper-static-hero">

			<div class="<?php echo esc_attr( $container ); ?>" id="wrapper-static-content" tabindex="-1">

				<div class="row">

					<!-- exceptions to add name and other fun stuff to front page -->
					<!-- Could add another meta check to see if a page wants the header info -->
					<?php if ( is_front_page() ) { ?>
						<div id="webpage-information">
							<img class="main-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-square.png" alt="Glenn Miller Associates, LLC Logo">
							<?php echo "<h1 class='site-title'>".get_bloginfo()."</h1>"; ?>
							<hr>
							<?php echo "<span class='site-tagline'>".get_bloginfo( 'description' )."</span>";
							echo do_shortcode( "[contact-card show_name=0 show_address=0 show_get_directions=0 show_phone=1 show_contact=0 show_opening_hours=0 show_map=0]" ); ?>
							<button type="button" class="btn btn-outline-secondary">
								<a href="#contact" class="scrollTo">
									Let's Talk
								</a>
							</button>
						</div>
						<div id='hero-wrapper'>
					<?php } ?>

						<?php dynamic_sidebar( 'statichero' ); ?>
					
					<?php if ( is_front_page() ) { ?>
						</div>
					<?php } ?>

				</div>

			</div>

	</div><!-- #wrapper-static-hero -->

<?php endif;
