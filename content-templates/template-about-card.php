<div class="about-card-wrapper" >
    <div id="post-<?php the_ID(); ?>" <?php post_class('about-card container'); ?>>

        <div class="content-area row">
                
                <div class="col-lg-3 col-sm-12 about-image">
                    <?php the_post_thumbnail( 'medium', array( 'class' => 'animation-element slide-left') ); ?>
                </div>

                <div class="col-lg-9 col-sm-12 about-content">
                    <div class=" animation-element slide-right">
                        <?php the_content(); ?>
                        <?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
                    </div>
                </div>

        </div><!-- content-area end -->

    </div><!-- about-card end -->
</div> <!-- about-card-wrapper end -->