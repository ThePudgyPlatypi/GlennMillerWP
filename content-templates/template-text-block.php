<div id="content post-<?php the_ID(); ?>" class="<?php echo esc_attr( $container ); ?>">
    <div  <?php post_class('row text-block '); ?>>
        <div class="content-area col-sm-12" id="primary">

                <?php 
                    the_content();
                    edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); 
                ?>

        </div><!-- #primary -->
    </div><!-- text-block end -->
</div> <!-- text-block container end -->