

<div class="card col-sm-12 col-md-6 col-lg-3">

    <?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top']); ?>

    <div class="card-body">
        <h5 class="card-title"><?php the_title();?></h5>
        <p class="card-text">
            <?php the_content(); ?>
        </p>
    </div>

</div>