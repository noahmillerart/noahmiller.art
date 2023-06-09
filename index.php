<?php get_header(); ?>

<div class="container-sm text-center" style="background-color: aquamarine;">

    <!-- Last Comic --><?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
        'category_name' => 'comics'
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $query->the_post();
        ?>
        <div><?php the_content(); ?></div>
        <?php
    } else {

        echo 'No posts found.';
    }

    wp_reset_postdata();
    ?><!-- End Last Comic -->

</div>
    
<?php get_footer(); ?>