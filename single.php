<?php get_header(); ?>

    <div class="container-sm">

        <h1 class="display-6"><?php the_title(); ?></h1>
        <small><?php echo get_the_date(); ?></small>
        
        <div class="container-fluid p-5">
            <?php the_content(); ?>
        </div>

    </div>

<?php get_footer(); ?>