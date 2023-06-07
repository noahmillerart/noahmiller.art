<?php get_header(); ?>

<div class="container-sm">

<?php
$args = array(
    'posts_per_page' => 7 // Limit the number of posts to 7
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

// Restore the original post data
wp_reset_postdata();
?>

</div>
    
<?php get_footer(); ?>