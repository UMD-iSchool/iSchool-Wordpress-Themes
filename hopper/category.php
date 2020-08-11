<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <h1 class="blog-post-title"><?php single_cat_title(); ?></h1>

            <?php 
                if ( have_posts() ) { 
                    while ( have_posts() ) : the_post();
                    ?>
                    <div class="blog-post">
                        <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'hopper'), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                        
                        <div class="maincontent">
                            <?php the_excerpt(); ?>
                        </div>
                    </div><!-- /.blog-post -->
                    
                    
                    <?php endwhile;
                } 

                // Previous/next page navigation.
                the_posts_pagination(
                    array(
                        'prev_text'          => __( 'Previous page', 'hopper' ),
                        'next_text'          => __( 'Next page', 'hopper' ),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'hopper' ) . ' </span>',
                    )
                );
                wp_link_pages(
                    array(
                        'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'hopper' ) . '"><span class="label">' . __( 'Pages:', 'hopper' ) . '</span>',
                        'after'       => '</nav>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                    )
                );
            ?>
        </div>
        
        <div class="col-sm-3 ">
            <?php dynamic_sidebar( 'sidebar_primary' ); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>