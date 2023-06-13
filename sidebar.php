<div class="container-fluid pb-4 px-4" id="thoughts">

    <h1 class="display-6 py-4">Lastest Thoughts</h1>

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

            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <small><?php echo get_the_date('F j, Y'); ?></small>
            <div id="excerpt" class="pb-4">
                <p><?php the_excerpt(); ?></p>
            </div>

        <?php
        }
        wp_reset_postdata();
        }
    ?>

    <?php get_search_form(); ?>

</div>

<div class="container-fluid pt-4" id="comics">

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

<div class="container-fluid pt-2" id="illustrations">

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

<div class="container-fluid pt-4" id="archives">

    <h1 class="display-6">Archives</h1>

    <ul class="p-0">
        <?php
            $archives = wp_get_archives(array(
            'type' => 'monthly',
            'echo' => 0,
            ));
        
            echo $archives;
        ?>
    </ul>

</div>

<div class="container-fluid pb-5">
    <div class="container-fluid p-4" id="knowmore">
        <p>
            <small>Originals signed by Noah Miller, do not use without permission, for more professional projects please visit my complete Portfolio in my <a href="https://noahstudio.space" target="_blank">Studio Website</a>.</small>
        </p>
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo_NM.png" alt="Noah Miller" class="img-fluid logosigned">
    </div>
</div>