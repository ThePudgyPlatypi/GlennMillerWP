
<div id="post-<?php the_ID(); ?>" <?php post_class('full-width-image'); ?>>

    <div class="content-area">

            <?php 
                the_post_thumbnail();

                if( has_excerpt() ) { ?>
                    <div class="image-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                <?php }

                edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); 
            ?>

    </div><!-- content-area end -->

</div><!-- full-width-image end -->

