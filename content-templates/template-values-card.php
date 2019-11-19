

<div class="card col-sm-12 col-lg-4">

    <?php if( !has_post_thumbnail() ) { ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo-square.png" class="card-img-top" alt="Glenn Miller Associates Logo">
    <?php } else {
        the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top']); 
    } ?>

    <div class="card-body">
        <h5 class="card-title"><?php the_title();?></h5>
        <div class="card-text">
            <?php the_content(); ?>
        </div>
    </div>

</div>