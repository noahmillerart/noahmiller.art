<?php get_header(); ?>

<div class="container-md" id="page">

    <div class="row">
        <div class="col-md-8 pt-4 px-5">

            <?php
                global $post;
                $page_slug = $post->post_name;
                
                switch ($page_slug) {

                    case 'comics': ?>

                    <div class="container pb-5" id="comicspage"> <!--Comics-->

                        <h1 class="display-6">Comics</h1>

                        <div class="pb-4">

                            <?php the_content(); ?>

                            <hr>
                    
                        </div>

                        <?php
                        // Get the ID of the category you want to retrieve posts from
                        $category_id = get_cat_ID('comics');

                        // Define the number of posts per page
                        $posts_per_page = 10;

                        // Determine the current page number
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                        // Query arguments to retrieve the newest posts from the specific category
                        $args = array(
                        'cat' => $category_id,
                        'posts_per_page' => $posts_per_page,
                        'paged' => $paged,
                        'orderby' => 'date',
                        'order' => 'DESC'
                        );

                        // Query the posts based on the arguments
                        $query = new WP_Query($args);

                        // Display the posts with title, date, and author
                        if ($query->have_posts()) {
                        while ($query->have_posts()) {
                        $query->the_post();
                        ?>
                        <div class="container-fluid">
                            <div class="pb-4">
                                <h1 class="display-6"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                                <small><?php echo get_the_date(); ?></small>
                            </div>

                            <div class="pb-5">
                                <?php echo add_img_fluid_class(get_the_content()); ?>
                            </div>
                        </div>
                        <?php
                        }
                                
                        // Display pagination links
                        $total_pages = $query->max_num_pages;
                        if ($total_pages > 1) {
                        echo '<div class="container-fluid text-center" id="pagination">';
                        echo paginate_links(array(
                        'current' => $paged,
                        'total' => $total_pages,
                        'prev_text' => '&laquo; Previous',
                        'next_text' => 'Next &raquo;'
                        ));
                        echo '</div>';
                        }

                        // Restore the global post data
                        wp_reset_postdata();
                        }
                        ?>


                    </div> <!--End Comics-->

                    <?php break;
                        
                    case 'illustrations': ?>

                        <h1>Illustrations</h1>
                        <p>Some additional content for Page Slug 2</p>

                        <?php the_content(); ?>

                    <?php break;
                        
                    case 'thoughts': ?>

                        <h1>Thoughts</h1>
                        <p>Some additional content for Page Slug 3</p>

                        <?php the_content(); ?>

                    <?php break;
                        
                    case 'about': ?>

                        <?php the_content(); ?>

                    <?php break;
                       
                    default: ?>
                        <!-- Default Content if necessary -->
                    <?php break;
                }
            ?>

        </div>

        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>

</div>

<?php get_footer(); ?>