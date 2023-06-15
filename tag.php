<?php get_header(); ?>

<div class="container-md">
    <div class="row">
        <div class="col-md-8">

        <?php
/*
Template Name: Tag Results
*/

// Get the current tag
$current_tag = single_tag_title('', false);

// Query the posts with the current tag
$args = array(
    'tag' => $current_tag,
    'posts_per_page' => -1
);
$query = new WP_Query($args);

// Check if there are posts with the tag
if ($query->have_posts()) {
    echo '<div>';
    echo '<h1 class="display-6 pb-5">Tag:';
    echo ' <b>"' . $current_tag . '"</b>';
    echo '</h1>';
    
    // Loop through the posts
    while ($query->have_posts()) {
        $query->the_post();

        echo '<div class="pb-4">';

        echo '<div id="tagresult" class="p-4">';

        echo '<div class="post-thumbnail">';
        echo '<a href="' . get_permalink() . '">';
        the_post_thumbnail('thumbnail');
        echo '</a>';
        echo '</div>';
        
        echo '<div id="archived" class="small-text">';
        echo '<h6 class="post-title">';
        echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
        echo '</h6>';
        echo '<div id="excerpt_arch">';
        the_excerpt();
        echo '</div>';
        echo '</div>';

        echo '</div>';

        echo '</div>';
        
    }
    
    echo '</div>'; // Closing tag-results
    
    // Reset the post data
    wp_reset_postdata();
} else {
    echo '<p>No posts found.</p>';
}

?>
            



        </div>
        <div class="col-md-4">

            <?php get_sidebar(); ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>