<?php get_header(); ?>

<div class="container-md">

    <div class="row">

        <div class="col-md-8 px-4 pb-4">
            

            <?php

                $current_month = date('m');
                $current_year = date('Y');


                $paged = get_query_var('paged') ? get_query_var('paged') : 1;


                $args = array(
                'post_type' => 'post',
                'posts_per_page' => 10,
                'monthnum' => $current_month,
                'year' => $current_year,
                'paged' => $paged,
                );


                $query = new WP_Query($args);


                if ($query->have_posts()) {
                while ($query->have_posts()) {
                $query->the_post();
                ?>

                    <div class="pb-2" id="homeposts">
                        <h1 class="display-6"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                        <small><?php echo get_the_date(); ?></small>
                    </div>
                    
                    <div class="pb-5">
                        <?php echo add_img_fluid_class(get_the_content()); ?>
                    </div>

                <?php
                }
                echo '<hr>';
                echo '<div class="text-center p-2" id="pagination">';
                echo paginate_links(array(
                'total' => $query->max_num_pages,
                'prev_text' => '&laquo; Previous',
                'next_text' => 'Next &raquo;',
                'current' => $paged,
                'mid_size' => 2,
                'prev_next' => true,
                'prev_next' => !is_singular(),
                ));
                echo '</div>';

                // Restore the global post data
                wp_reset_postdata();
                } else {
                // No posts found
                echo 'No posts found.';
                }
            ?>

         



        </div>

        <div class="col-md-4">
            <?php get_template_part('bio'); ?>
            <?php get_sidebar(); ?>
        </div>

    </div>

</div>
    
<?php get_footer(); ?>