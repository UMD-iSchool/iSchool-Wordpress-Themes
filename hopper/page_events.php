<?php session_start();
/**
 * Template Name: Events Page
*/

global $theme; get_header(); ?>

<div class="row  page-content">
<div class="container">
<div class="col-sm-9 blog-main">
	<div class="blog-post">
    <h1 class="blog-post-title"><?php the_title(); ?></h1>
        <div class="maincontent">
       
    <?php $query = new WP_Query( 'cat=3' ); ?>
 <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

 <div class="post">
 <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
 <small><?php the_time( 'F jS, Y' ); ?> by <?php the_author_posts_link(); ?></small>
  <div class="entry">
    <?php the_excerpt(); ?>
  </div>
 </div>
 <?php endwhile; 
 wp_reset_postdata();
 else : ?>
 	<?php get_template_part('navigation'); ?>
 <?php endif; ?>

</div>
</div><!-- /.blog-post -->
</div><!-- /.blog-main -->
<div class="col-sm-3 sidebar-primary">
<?php dynamic_sidebar( 'sidebar_primary' ); ?>
</div>
<?php get_footer(); ?>