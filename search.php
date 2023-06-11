<?php
get_header(); // Include the header template

if (have_posts()) {
    while (have_posts()) {
        the_post();
        // Display the title and content of each search result
        ?>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_excerpt(); ?>
        <?php
    }
} else {
    // Display a message if no search results are found
    echo '<p>No search results found.</p>';
}

get_footer(); // Include the footer template
?>