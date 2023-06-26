<?php get_header(); ?>

<div class="container-md" id="page">

    <div class="row">
        <div class="col-md-7 pt-4">

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
                        $posts_per_page = 4;

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
                        echo '<hr>';
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

                    <div class="container-sm">

                        <h1 class="display-6">Illustrations</h1>

                        <?php the_content(); ?>

                        <hr>

                        <div id="illustrationspage" class="text-center">

                            <?php
                                // Get the category ID or slug
                                $category_id = 'illustrations';

                                // Query the posts with the specified category
                                $args = array(
                                'category_name' => $category_id,
                                'posts_per_page' => -1 // Adjust the number of posts to display, or use -1 for all
                                );
                                $query = new WP_Query($args);

                                // Check if there are posts in the category
                                if ($query->have_posts()) {
                                echo '<ul class="gallery p-0">';

                                // Loop through the posts
                                while ($query->have_posts()) {
                                $query->the_post();

                                // Get the thumbnail HTML with the "img-fluid" class
                                $thumbnail_html = get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'img-fluid'));

                                // Check if thumbnail exists
                                if ($thumbnail_html) {
                                echo '<li>';
                                echo '<a href="' . get_permalink() . '">';
                                echo $thumbnail_html;
                                echo '</a>';
                                echo '</li>';
                                }
                                }

                                echo '</ul>';

                                // Reset the post data
                                wp_reset_postdata();
                                }
                            ?>

                        </div>

                    </div>

                    <?php break;
                        
                    case 'thoughts': ?>

                        <div class="container-sm pb-5">

                            <h1 class="display-6">Thoughts</h1>

                            <?php the_content(); ?>

                            <hr>

                            <div class="py-4">

                                            <?php
                                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                                        $posts_per_page = 10;

                                        $category_slug = 'thoughts';

                                        $args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => -1,
                                        'category_name' => $category_slug,
                                        );

                                        $all_posts_query = new WP_Query($args);
                                        $total_posts = $all_posts_query->found_posts;

                                        $offset = ($paged - 1) * $posts_per_page;

                                        $args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => $posts_per_page,
                                        'offset' => $offset,
                                        'category_name' => $category_slug,
                                        );

                                        $archive_query = new WP_Query($args);

                                        if ($archive_query->have_posts()) {
                                        while ($archive_query->have_posts()) {
                                        $archive_query->the_post();
                                        ?>

                                        

                                            <article>
                                                <div class="pb-5" id="archived">
                                                    <div class="row">
                                                        <div class="col-2 text-center pb-4" id="thumbnail">
                                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                                                        </div>
                                                        <div class="col px-2">
                                                            <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                                            <p><?php echo get_the_date('F j, Y'); ?></p>
                                                            <div id="excerpt_arch">
                                                                <?php the_excerpt(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        <?php
                                        }
                                        ?>
                                        <?php

                                        $total_pages = ceil($total_posts / $posts_per_page);

                                        if ($total_pages < 10) {

                                            echo '<hr>';
                                            echo '<div class="container-fluid text-center p-2" id="pagination">';
                                            echo paginate_links(array(
                                                'total' => $total_pages,
                                                'current' => $paged,
                                                'prev_text' => '&laquo; Previous',
                                                'next_text' => 'Next &raquo;',
                                            ));
                                            echo '</div>';
                                            
                                        }
                                        ?>                    
                                        <?php
                                        } else {
                                        ?>
                                        <p>No posts found.</p>
                                        <?php
                                        }

                                        wp_reset_postdata();
                                        ?>
                            </div>

                        </div>

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

        <div class="col-md-5">
            <?php get_sidebar(); ?>
        </div>
    </div>

</div>

<?php get_footer(); ?>