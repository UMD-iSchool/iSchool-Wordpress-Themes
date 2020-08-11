<?php session_start();
/**
 * Template Name: Search Results
*/

global $theme; get_header(); ?>

  <div class="container">
        <div class="row">
            <div class="col-sm-9 blog-main">
                <h1 class="blog-post-title">Search Results</h1>

<div class="search-page-form" id="ss-search-page-form"><?php get_search_form(); ?></div>

                        <?php if ( have_posts() ) : ?>

                            <header class="page-header">
                                <span class="search-page-title"><?php printf( esc_html__( 'Search Results for: %s', 'hopper' ), '<span><strong>' . get_search_query() . '</strong></span>' ); ?></span>
                            </header><!-- .page-header -->

                            <?php /* Start the Loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                            <div class="searchresults">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php the_excerpt(); ?></p>
                            </div>

                            <?php endwhile; ?>

                            <?php //the_posts_navigation(); ?>

                            <?php else : ?>

                             <div class="nosearchresults">
                                        <p><?php printf( ( 'Sorry, but nothing matched your search criteria: %s. Please try again with some different keywords.' ), '<strong>' . get_search_query() . '</strong>' ); ?></p>
                                    </div>

                                 <?php endif; ?>
                             </div>
                             <div class="col-sm-3 sidebar-primary">
                        <?php dynamic_sidebar( 'sidebar_primary' ); ?>
 </div>
</div>
</div>
</div>
<?php get_footer(); ?>