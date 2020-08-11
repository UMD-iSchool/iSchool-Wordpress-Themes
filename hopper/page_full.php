<?php session_start();
/**
 * Template Name: Full Page - No Sidebar
*/

global $theme; get_header(); ?>
      
    <div class="container">
        <div class="row  page-content">
                <div class="col-sm-12">
    
                    <?php 
                    if ( have_posts() ) { 
                        while ( have_posts() ) : the_post();
                    ?>
                    <div class="blog-post">
                        <h1 class="blog-post-title"><?php the_title(); ?></h1>
                        <div class="maincontent">
                        <?php the_content(); ?>
                    </div>
                    </div><!-- /.blog-post -->
                    <?php
                        endwhile;
                    } 
                    ?>

                </div><!-- /.blog-main -->
            </div>
    </div>

<?php get_footer(); ?>