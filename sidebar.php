<div class="container-fluid py-4" id="comics">

    <h1 class="display-6">Newest Comics</h1>

    <?php
        $category_id = 5;
        $posts_per_page = 6;

        $args = array(
        'category' => $category_id,
        'posts_per_page' => $posts_per_page,
        'orderby' => 'date',
        'order' => 'DESC',
        );

        $posts = get_posts($args);

        if ($posts) {
        foreach ($posts as $post) {
        setup_postdata($post);

        if (has_post_thumbnail()) {
        $post_url = get_permalink($post->ID);

        echo '<a href="' . $post_url . '">';
        the_post_thumbnail('thumbnail');
        echo '</a>';
        }
        }
        wp_reset_postdata();
        }
    ?> 

</div>

<div class="container-fluid py-4" id="thoughts">

    <h1 class="display-6">Last Thoughts</h1>

    <?php
        $category_id = 6;

        $args = array(
        'category' => $category_id,
        'posts_per_page' => -4,
        );

        $posts = get_posts($args);

        if ($posts) {
        foreach ($posts as $post) {
        setup_postdata($post);

        ?>
        <div class="py-2">

            <h2><?php the_title(); ?></h2>
            <p><?php the_excerpt(); ?></p>
            <hr>

        </div>
        <?php
        }
        wp_reset_postdata();
        }
    ?>
    
</div>

<div class="container-fluid py-4" id="illustrations">

    <h1 class="display-6">Recent Illustrations</h1>

    <?php
        $category_id = 7;
        $posts_per_page = 6;

        $args = array(
        'category' => $category_id,
        'posts_per_page' => $posts_per_page,
        'orderby' => 'date',
        'order' => 'DESC',
        );

        $posts = get_posts($args);

        if ($posts) {
        foreach ($posts as $post) {
        setup_postdata($post);

        if (has_post_thumbnail()) {
        $post_url = get_permalink($post->ID);

        echo '<a href="' . $post_url . '">';
        the_post_thumbnail('thumbnail');
        echo '</a>';
        }
        }
        wp_reset_postdata();
        }
    ?> 

</div>