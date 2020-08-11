<?php get_header(); ?>

  <div class="row">
       <div class="col-sm-12 slider"> 
          <?php dynamic_sidebar( 'homeblurb' ); ?>
        </div>
  </div>

    <div class="container">
        <div class="row">
                    <div class="col-sm-8 group-left">
                        <?php dynamic_sidebar( 'hocol1' ); ?>
                    </div>
                    <div class="col-sm-4 homesidebar">
                        <?php dynamic_sidebar( 'hocol2' ); ?>
                    </div>
                 </div>
                </div>

<?php get_footer(); ?>

                    