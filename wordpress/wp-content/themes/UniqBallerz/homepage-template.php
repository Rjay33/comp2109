<?php
/**
 * Template Name: Homepage Template
 * The front page template file
 */
 get_header ();
 /** require 'header.php'; **/
?>
<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <!-- Let's use the featured image for the masthead image -->
    <?php $masthead_background = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');?>
    <section class="masthead" style="background-image: url(<?php echo $masthead_background['0'];?>);">
      <article>
        <h1><?php echo esc_html( get_the_title() ); ?></h1>
      </article>
    </section>
    <section class="the-page-content">
      <?php
        // Start the loop to get the pages content
        while(have_posts()) : the_post();
      ?>
      <!-- Note that the_content() works only inside a WP Loop -->
      <div class="entry-content-page">
        <?php the_content(); ?> <!-- Page Content -->
      </div>
      <?php
			endwhile; // end the loop
    		wp_reset_query(); //resetting the page query
    	?>
    </section>
    <section class="display-posts">
      <!-- Define our WP Query Parameters -->
			<?php $the_query = new WP_Query( 'posts_per_page=5' ); ?>
      <!-- Start our WP Query -->
      <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
      <!-- Display the Post Title with Hyperlink -->
      <li>
        <a href="<?php the_permalink() ?>">
          <div><?php the_title(); ?></div>
          <!-- featured image -->
          <div><?php the_post_thumbnail(); ?></div>
          <!-- Display the Post Excerpt -->
          <div><?php the_excerpt(__('(more…)')); ?></div>
        </a>
      </li>
      <!-- Repeat the process and reset once it hits the limit -->
			<?php
				endwhile;
				wp_reset_postdata();
			?>
    </section>
    <section class="shortcode-example">
      <div><?php echo do_shortcode('[shoe_shortcode]'); ?></div>
    </section>
  </main>
</div>
