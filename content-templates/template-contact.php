<div id="content post-<?php the_ID(); ?>" class="contact-wrapper">
    <div class="<?php echo esc_attr( $container ); ?>">
        <div  <?php post_class('row contact'); ?>>

        <?php if( !is_front_page( ) ) { ?> 
            <div class="title-area col-sm-12">
                <img class="main-logo mx-auto d-block" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-square.png" alt="Glenn Miller Associates, LLC Logo">
                <h1 class="text-center"><?php echo get_bloginfo('name') ?></h2>
                <hr class="black">
            </div>
        <?php } ?>
            <div class="content-area col-sm-12">

                    <?php 
                        the_content();
                        edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); 
                    ?>

            </div>
        </div><!-- contact end -->
    </div> <!-- container end -->
</div> <!-- contact-wrapper end -->