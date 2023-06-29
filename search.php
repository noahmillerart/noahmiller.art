<?php get_header(); ?>

<div class="container-md">
    <div class="row">
        <div class="col-md-7 py-4">

            <h1 class="display-6">Search Result</h1>          

            <?php

            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    ?>
                    <div class="py-4 px-2" >
                        <div class="pb-3" id="searchtitle">
                            <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                            <small><?php echo get_the_date('F j, Y'); ?></small>
                        </div>
                        <div id="searchresult">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                    <hr>
                    <?php
                }
            } else {
                echo '<p>No search results found.</p>';
            }
            
            ?>

        </div>
        <div class="col-md-5">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>