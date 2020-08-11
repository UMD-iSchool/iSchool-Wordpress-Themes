<?php
  
 get_header();  ?>
     <div class="row">
        <div class="container">
<div class="col-sm-12 blog-main">
        <h2>No Results Found</h2>
            <div class="entry">
                <?php _e('Sorry, the page you requested could not be found. The link you followed may be broken, or the page may have been removed.', 'hopper'); ?>
            </div>
            
            <div id="content-search">
                <?php get_search_form(); ?>
            </div>
              
</div>
</div>
</div>
<?php get_footer(); ?>