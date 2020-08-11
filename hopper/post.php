<?php get_header(); ?>
      
    <div class="container">
        <div class="row">
                <div class="col-sm-9">
    
                    <?php 
                    if ( have_posts() ) { 
                        while ( have_posts() ) : the_post();
                    ?>
                    <div class="blog-post">
                        <h1 class="blog-post-title"><?php the_title(); ?></h1>
                        <small><?php the_time( 'F jS, Y' ); ?> by <?php the_author_posts_link(); ?></small>
                        <div class="maincontent">
                        <?php the_content(); ?>
                    </div>
                    </div><!-- /.blog-post -->
                    <?php
                        endwhile;
                    } 
                    ?>

                </div><!-- /.blog-main -->
                <div class="col-sm-3 ">
                <?php dynamic_sidebar( 'sidebar_primary' ); ?>
                </div>
            </div>
    </div>


<?php get_footer(); ?>