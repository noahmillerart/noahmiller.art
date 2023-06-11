<?php get_header(); ?>

<div class="container-md" id="page">

    <div class="row">
        <div class="col-md-8">
            <?php the_title(); ?>
            <?php the_content(); ?>
        </div>

        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>

</div>

<?php get_footer(); ?>