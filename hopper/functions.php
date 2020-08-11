<?php

function add_google_fonts() {

wp_enqueue_style( ' add_google_fonts ', 'https://fonts.googleapis.com/css?family=Crimson+Text|Open+Sans:400,700', false );}

add_action( 'wp_enqueue_scripts', 'add_google_fonts' );

add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
function enqueue_load_fa() {
wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.0.7/css/all.css' );
}

if (function_exists('register_nav_menu'))
{
    register_nav_menu('primary', 'Primary Menu');
}

function bootstrapstarter_enqueue_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    $dependencies = array('bootstrap');
	wp_enqueue_style( 'bootstrapstarter-style', get_stylesheet_uri(), $dependencies ); 
}

function bootstrapstarter_enqueue_scripts() {
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', $dependencies, '', true );
}

add_action( 'wp_enqueue_scripts', 'bootstrapstarter_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'bootstrapstarter_enqueue_scripts' );

function bootstrapstarter_wp_setup() {
    add_theme_support( 'title-tag' );
}

// Background Image

$defaults_args = array(
    'wp-head-callback'       => 'my_custom_background_cb',
);
add_theme_support( 'custom-background', $defaults_args );

function my_custom_background_cb() {
    $bg_image = get_background_image();

    if ( empty( $bg_image ) ) {
        return;
    } else { ?>
        <style type="text/css">
            .slider {
                background: url('<?php echo $bg_image; ?>');
             background-attachment: fixed;
             background-repeat: no-repeat;
             background-size: cover;
             background-position: bottom right;
            }
        </style><?php
    }
}

// Background Image End

add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar(array(
        'name' => ('Primary Sidebar'),
        'id' => 'sidebar_primary',
        'description' => ('The primary sidebar widget area'),
        'before_widget' => '<ul class="widget-container"><li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li></ul>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => ('Home Slider Blurb'),
        'id' => 'homeblurb',
        'description' => ('This is the content for the slideshow'),
        'before_widget' => '<div class="col-12 col-md-6 homeblurb">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
        register_sidebar(array(
        'name' => ('Home Intro Blurb'),
        'id' => 'hocol1',
        'description' => ('This is the primary home intro blurb'),
        'before_widget' => '<ul class="widget-container"><li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li></ul>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ));
            register_sidebar(array(
        'name' => ('Home Side Bar'),
        'id' => 'hocol2',
        'description' => ('This is the home page sidebar'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}
add_action( 'after_setup_theme', 'bootstrapstarter_wp_setup' );

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {

  function start_lvl( &$output, $depth = 0, $args = array() ){
      $indent = str_repeat("\t", $depth);
      //$output .= "\n$indent<ul class=\"sub-menu\">\n";

      // Change sub-menu to dropdown menu
      $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }

  function start_el ( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    // Most of this code is copied from original Walker_Nav_Menu
    global $wp_query, $wpdb;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = ' class="' . esc_attr( $class_names ) . '"';

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

    $has_children = $wpdb->get_var("SELECT COUNT(meta_id)
                            FROM wp_postmeta
                            WHERE meta_key='_menu_item_menu_item_parent'
                            AND meta_value='".$item->ID."'");

    $output .= $indent . '<li' . $id . $value . $class_names .'>';

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    // Check if menu item is in main menu
    if ( $depth == 0 && $has_children > 0  ) {
        // These lines adds your custom class and attribute
        $attributes .= ' class="dropdown-toggle"';
        $attributes .= ' data-toggle="dropdown"';
    }

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

    // Add the caret if menu level is 0
    if ( $depth == 0 && $has_children > 0  ) {
        $item_output .= ' <b class="caret"></b>';
    }

    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }



}

function customizer_default_favicon($wp_customize) {
    $wp_customize->add_setting( 'site_icon' , array(
        'default'     => get_stylesheet_directory_uri() . '/images/icon.ico',
        'sanitize_callback' => 'esc_attr'
    ) );
}


add_action( 'customize_register', 'customizer_default_favicon' );

global $content_width;
if ( ! isset( $content_width ) ) {
    $content_width = 1200;
}

add_theme_support( 'automatic-feed-links' );

