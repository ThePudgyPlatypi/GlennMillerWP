
<div id="post-<?php the_ID(); ?>" <?php post_class('full-width-image'); ?>>

    <div class="content-area">


            <?php 
                the_post_thumbnail();
                edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); 
            ?>

    </div><!-- #primary -->

</div><!-- .row end -->

