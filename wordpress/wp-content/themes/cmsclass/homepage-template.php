<?php
/**
* Template Name: Homepage template
* The front page template file
*/
get_header ();
/** require 'header.php'; **/
?>
<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <?php
    //if ( have_posts() ) {
      // Load posts Loop.
      //while ( have_posts() ) {
        //the_post();
        //get_template_part( 'template-parts/content/content' );
      //}
      // Previous/next page navigation.
      //twentynineteen_the_posts_navigation();
    //} else {
      //If no content, include the "No posts found" template.
      //get_template_part( 'template-parts/content/content', 'none' );
    //}
    //}
     ?>
    <!-- Add content using custom advanced fields -->
    <section class="masthead" style="background-image: url(<?php the_field('masthead_image'); ?>);">
      <article>
        <h1><?php the_field('page_title'); ?></h1>
      </article>
    </section>
  </main>
</div>
