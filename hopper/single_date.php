<?php
  
 get_header();  ?>

     <div class="row">
        <div class="container">
            <div class="col-sm-12 blog-main">
    
            <?php 
            if ( have_posts() ) { 
                while ( have_posts() ) : the_post();
            ?>
            <div class="blog-post">
                <h1 class="blog-post-title"><?php the_title(); ?></h1>
                
                <div class="maincontent">
                <?php the_content(); ?>
                <small><?php the_time( 'F jS, Y' ); ?> by <?php the_author_posts_link(); ?></small>
            </div>
            </div><!-- /.blog-post -->
            <?php
                endwhile;
            } 
            ?>  
        </div><!-- /.blog-main -->
    </div>
<?php get_footer(); ?>