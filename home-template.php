<?php

/**
 * Template Name: Home Page
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage ranker
 * @since ranker 1.0
 */

get_header();?>

<div id="content" class="pageContent">
    <div class="main-content">
       <?php /*<h1 class="entry-title"><?php the_title(); ?></h1> <!-- Page Title --> */?>

        <?php
        // TO SHOW THE PAGE CONTENTS
        while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->

            <div class="entry-content-page">
                <?php the_content(); ?> <!-- Page Content -->
            </div><!-- .entry-content-page -->
        <?php
        endwhile; //resetting the page loop
        wp_reset_query(); //resetting the page query
        ?>
    </div>
</div>

<?php echo get_footer();?>