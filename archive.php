<?php get_header(); ?>

<div class="container-md">
    <div class="row">
        <div class="col-md-8">

            <div id="result" class="container-md pb-5">

                <main id="main" class="site-main" role="main">

                    <h1 class="display-6">Comics of <?php echo get_the_date('F Y'); ?></h1>

                    <ul id="thumb" class="pb-4">

                        <?php
                            $category_slug = 'comics';

                            $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => -1,
                            'category_name' => $category_slug,
                            );

                            $posts_query = new WP_Query($args);

                            if ($posts_query->have_posts()) {
                            while ($posts_query->have_posts()) {
                            $posts_query->the_post();
                            $post_url = get_permalink($post->ID);
                            ?>

                        <li class="p-2">
                            <?php echo '<a href="' . $post_url . '">'; the_post_thumbnail('thumbnail'); echo '</a>'; ?>
                        </li>

                            <?php
                            }
                            wp_reset_postdata();
                            } else {
                            ?>
                            <p>No posts found.</p>
                            <?php
                            }
                        ?>

                    </ul>

                    <hr>

                    <h1 class="display-6">Illustrations of <?php echo get_the_date('F Y'); ?></h1>

                    <ul id="thumb" class="pb-4">

                        <?php
                            $category_slug = 'illustrations';

                            $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => -1,
                            'category_name' => $category_slug,
                            );

                            $posts_query = new WP_Query($args);

                            if ($posts_query->have_posts()) {
                            while ($posts_query->have_posts()) {
                            $posts_query->the_post();
                            $post_url = get_permalink($post->ID);
                            ?>

                        <li class="p-2">
                            <?php echo '<a href="' . $post_url . '">'; the_post_thumbnail('thumbnail'); echo '</a>'; ?>
                        </li>

                            <?php
                            }
                            wp_reset_postdata();
                            } else {
                            ?>
                            <p>No posts found.</p>
                            <?php
                            }
                        ?>

                    </ul>

                    <hr>

                    <h1 class="display-6 pb-5">Thoughts of <?php echo get_the_date('F Y'); ?></h1>


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
                    <div class="container-fluid text-center" id="pagination">
                        <?php
                            echo paginate_links(array(
                            'total' => ceil($total_posts / $posts_per_page),
                            'current' => $paged,
                            'prev_text' => '&laquo; Previous',
                            'next_text' => 'Next &raquo;',
                            ));
                        ?>
                    </div>
                    <?php
                    } else {
                    ?>
                    <p>No posts found.</p>
                    <?php
                    }

                    wp_reset_postdata();
                    ?>
                </main>

            </div>

        </div>
        <div class="col-md-4">

            <?php get_sidebar(); ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>
