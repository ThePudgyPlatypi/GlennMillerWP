
<div id="post-<?php the_ID(); ?>" <?php post_class('full-width-image'); ?>>

    <div class="content-area">

            <?php 
                the_post_thumbnail();

                $thecontent = get_the_content();

                if(!empty($thecontent)) { ?>
                    <div class="image-excerpt animation-element slide-left">
                        <?php the_content(); ?>
                    </div>
                <?php }

                edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); 
            ?>

    </div><!-- content-area end -->

</div><!-- full-width-image end -->

