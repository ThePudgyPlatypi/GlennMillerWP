<div id="content post-<?php the_ID(); ?>" class="contact-wrapper">
    <div class="<?php echo esc_attr( $container ); ?>">
        <div  <?php post_class('row contact'); ?>>
            <div class="content-area col-sm-12">

                    <?php 
                        the_content();
                        edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); 
                    ?>

            </div>
        </div><!-- contact end -->
    </div> <!-- container end -->
</div> <!-- contact-wrapper end -->