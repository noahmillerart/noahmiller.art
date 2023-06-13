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
                                <?php the_content(); ?>
                                
                            </div>
                            <div class="container-fluid" id="authorname">
                                <p><em><?php the_author(); ?></em></p>
                                <hr>
                            </div>

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