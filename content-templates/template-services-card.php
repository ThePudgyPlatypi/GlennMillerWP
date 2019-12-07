<div class="col-sm-12 col-lg-6 col-xl-4 animation-element fade-in">
    <div class="card">
        <?php if( !has_post_thumbnail() ) { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo-square.png" class="card-img-top" alt="Glenn Miller Associates Logo">
        <?php } else {
            the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top']); 
        } ?>

        <div class="card-body">
            <h5 class="card-title"><?php the_title();?></h5>
            
                <?php
                // Grab the content of the grid if it is not empty
                // Helpful for if I want a title or something
                $thecontent = get_the_content();

                if(!empty($thecontent)) { ?>
                    <div class="card-text">
                        <?php the_content(); ?>
                    </div>
                <?php } ?>

        </div> <!-- card body end -->
    </div> <!-- card end -->
</div> <!-- card column end -->