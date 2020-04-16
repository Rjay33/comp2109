<?php
/*
* Template Name: Working with Post Templates
* Template Post Type: post
*/
get_header();
?>
<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php
                if (have_posts()) : while (have_posts()) : the_post();
            ?>
            <div>
                <div>
                    <?php the_post_thumbnail(); ?>
                </div>
                <div>
                    <?php the_title(); ?>
                    <?php the_content(); ?>
                    <p><?php the_author(); ?></P>
                    <p><?php echo get_the_date(); ?></P>
                    <p><?php the_tags(); ?></P>
                    <?php
                        the_post_navigation(
                            array(
                                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'twentynineteen' ) . '</span> ' .
                                    '<span class="screen-reader-text">' . __( 'Next post:', 'twentynineteen' ) . '</span> <br/>' .
                                    '<span class="post-title">%title</span>',
                                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'twentynineteen' ) . '</span> ' .
                                    '<span class="screen-reader-text">' . __( 'Previous post:', 'twentynineteen' ) . '</span> <br/>' .
                                    '<span class="post-title">%title</span>',
                            )
                        );
                    ?>
                </div>
            </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <!-- add the sidebar -->
                <article class="sidebar-container">
                    <?php get_sidebar(); ?>
                </article>
                <section class="comment-section-container">
                <?php
                // <!-- If comments are open or we have at least one comment, load up the comment template. -->
                        if ( comments_open() || get_comments_number() ) : comments_template();
                    endif;
                ?>
                </section>
        </main>
    </div>
</div>
