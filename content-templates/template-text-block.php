<div id="content post-<?php the_ID(); ?>" class="<?php echo esc_attr( $container ); ?>">
    <div  <?php post_class('row text-block'); ?>>

        <div class="content-area" id="primary">

            <main class="site-main" id="main" role="main">

                <?php 
                    the_content();
                    edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); 
                ?>

            </main><!-- #main -->

        </div><!-- #primary -->

    </div><!-- .row end -->
</div>