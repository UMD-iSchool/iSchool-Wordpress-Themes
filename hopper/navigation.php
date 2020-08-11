<?php if (  $wp_query->max_num_pages > 1 ) { ?>

    <div class="navigation clear">
        
        <?php
            if(function_exists('wp_pagenavi')) {
                wp_pagenavi();
            } else {
        ?><?php if (function_exists("pagination")) {
    pagination($additional_loop->max_num_pages);
} ?><?php
        } ?> 
        
    </div><!-- .navigation -->
    
<?php } ?>