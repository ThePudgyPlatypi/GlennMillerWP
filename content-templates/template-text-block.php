<div id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

    <div class="content-area" id="primary">

        <main class="site-main" id="main" role="main">

            <?php 
            the_post_thumbnail();
            the_content();
            edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); 
            ?>

        </main><!-- #main -->

    </div><!-- #primary -->

</div><!-- .row end -->