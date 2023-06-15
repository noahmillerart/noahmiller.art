<?php get_header(); ?>

    <div class="container-md">

        <div class="row">
            <div class="col-md-8 pt-4 px-5">

                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        ?>
                
                        <article>
                            <h1 class="display-6"><?php the_title(); ?></h1>
                            <small><?php the_date(); ?></small>

                            <div class="container-fluid py-4">

                                <?php echo add_img_fluid_class(apply_filters('the_content', get_the_content())); ?>
                                
                            </div>

                            <div class="container-fluid" id="authorname">
                                <p>By <em><?php the_author(); ?></em></p>
                            </div>

                                <?php
                                $tags = get_the_tags();
                                if ($tags) {
                                echo '<div class="post-tags">';
                                
                                echo '<ul class="p-0">';

                                echo '<li class="p-2 small-text"><b>Tags:</b></li>';

                                foreach ($tags as $tag) {
                                echo '<li class="p-2 small-text"><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
                                }

                                echo '</ul>';
                                echo '</div>';
                                }
                                ?>

                                <hr>

                            <div class="share-links">
                                <ul>
                                    <li>Share this: </li>
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer">Facebook</a></li>
                                    <li><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="noopener noreferrer">Twitter</a></li>
                                    <li><a href="https://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" rel="noopener noreferrer">LinkedIn</a></li>
                                </ul>
                            </div>
                            
                        </article>
                
                        <?php
                    }
                } else {
                    echo "No posts found.";
                }
                ?>

            </div>            
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>

    </div>

<?php get_footer(); ?>