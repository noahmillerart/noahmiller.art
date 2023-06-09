<?php get_header(); ?>

    <div class="container-sm text-center">

        <h1 class="display-6 p-4"><?php the_title(); ?></h1>
        
        <div class="container-fluid">
            <?php the_content(); ?>
        </div>

    </div>

<?php get_footer(); ?>