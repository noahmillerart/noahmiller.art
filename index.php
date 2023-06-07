<?php get_header(); ?>

<div class="container-sm">

    <!-- Post Loop -->
    <?php
    $args = array(
        'posts_per_page' => 7
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post(); ?>
            
            <div class="container-fluid" id="post">
                <h1 class="display-6"><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
    <?php
        }
    }
    wp_reset_postdata();
    ?>
    <!-- End Post Loop -->

</div>
    
<?php get_footer(); ?>