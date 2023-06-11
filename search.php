<?php get_header(); ?>

<div class="container-md">
    <div class="row">
        <div class="col-md-8">          

            <?php

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
            
            ?>

        </div>
        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>


