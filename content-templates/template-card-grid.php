<div id="post-<?php the_ID(); ?>" <?php post_class('card-grid'); ?>>
    <div class="content-area">

        <?php  
        // Grab the content of the grid if it is not empty
        // Helpful for if I want a title or something
        $thecontent = get_the_content();

        if(!empty($thecontent)) { ?>
            <div class="grid-content">
                <?php the_content(); ?>
            </div>
        <?php } ?>

        <?php
        global $wp_query;
        
        $meta_card = get_post_field( 'post_name', get_post() );

        if(!$meta_card) {
            $meta_card="no_posts";
        }

        $body = array(
            'post_type' 		=> 'contents',
            'nopaging' 			=> true,
            'order' 			=> 'ASC',
            'meta_query' 		=> array(
                'relation'			=> 'AND',
                'order'				=> array(
                    'key'				=> 'order',
                    'compare'			=> 'EXISTS',
                ), 
                'card' 				=> array(
                    'value' 			=> $meta_card,
                    'compare' 			=> 'EXISTS',
                )
            ),
            'orderby' 			=> array(
                'order'				=> 'ASC'
            ),
        );

        $the_query = new WP_Query($body); ?>

        <div <?php echo 'class="'.$meta_card.'"' ?> >
            <div class="container">
                <div class="row justify-content-md-center ">
                    <?php // The Loop
                    if ( $the_query->have_posts() ) {
                        while ( $the_query->have_posts() ) {

                            $the_query->the_post(); 
                            $meta_template = get_post_meta( get_the_ID(), 'template', true);
                            get_template_part( 'content-templates/template', $meta_template );

                    }
                        /* Restore original Post Data */
                        wp_reset_postdata();
                    } else {
                        // no posts found
                    } ?>
                </div> <!-- .row end -->
            </div> <!-- .container end -->
        </div> <!-- .card-grid end -->
    </div><!-- .CONTENT-AREA -->
</div>
