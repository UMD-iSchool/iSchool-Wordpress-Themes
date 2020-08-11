<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <!-- masthead-->
    <div class="blog-masthead"> 
      <div class="umdheader">
        <a href="https://umd.edu" target="_blank" title="University of Maryland">University of Maryland
        </a>
    </div>
  </div>
 <!-- /masthead-->
  <div class="blog-header">
     <div class="container clearfix">
      <div class="col-sm-3">
        <a href="https://ischool.umd.edu/" target="_blank" title="UMD College of Information Studies" class="sublogo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ischoollogo_dark.png" alt="UMD College of Information Studies" ></a>

      </div>
      <div class="col-sm-6">
        <a href="<?php echo esc_url(home_url()); ?>/" title="<?php bloginfo('name'); ?>" class="sitename"><?php bloginfo('name'); ?> </a> </div>
    </div>
</div>
 <!-- custom header-->
    <div class="row navbar-light bg-light">
           <div class="col-sm-12">
              <nav class="container navbar navbar-expand-sm bg-light navbar-light">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
<div class="navbar-brand" href="#myPage"><h1 class="blog-title"><a href="<?php echo esc_url(home_url()); ?>/"><?php echo get_bloginfo( 'name' ); ?></a></h1></div>
     <?php wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_class' => 'navbar-nav',
        'container' => 'div',
        'container_class' => 'collapse navbar-collapse',
        'container_id' => 'collapsibleNavbar',
        'level' => '3',
        'depth' =>'3',
        'walker' => new Custom_Walker_Nav_Menu
                  )); ?> 
</nav>
</div>
</div>
