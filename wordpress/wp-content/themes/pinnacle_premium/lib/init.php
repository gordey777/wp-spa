<?php
/**
 * Kadence initial setup and constants
 */
function kadence_setup() {
 global $pinnacle, $pagenow; 
 if(isset($pinnacle['header_style']) && $pinnacle['header_style'] == "center") {
      register_nav_menus(array(
        'left_navigation' => __('Left Navigation', 'pinnacle'),
        'right_navigation' => __('Right Navigation', 'pinnacle'),
        'primary_navigation' => __('Mobile Navigation', 'pinnacle'),
        'topbar_navigation' => __('Topbar Navigation', 'pinnacle'),
        'footer_navigation' => __('Footer Navigation', 'pinnacle'),
      ));
  } else {
  register_nav_menus(array(
        'primary_navigation' => __('Primary Navigation', 'pinnacle'),
        'topbar_navigation' => __('Topbar Navigation', 'pinnacle'),
        'footer_navigation' => __('Footer Navigation', 'pinnacle'),
      ));
  }
  add_theme_support( 'title-tag' );
  add_theme_support('post-thumbnails');
  add_image_size( 'widget-thumb', 60, 60, true );
  add_post_type_support( 'attachment', 'page-attributes' );
  add_theme_support('post-formats', array('gallery', 'image', 'video'));
  add_theme_support( 'automatic-feed-links' );
  add_editor_style('/assets/css/editor-style.css');


  if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
      wp_redirect(admin_url("themes.php?page=kt_api_manager_dashboard"));
  }
  define( 'PINNACLE_VERSION', '2.0.5' );
}
add_action('after_setup_theme', 'kadence_setup');

function kt_fav_output(){
// Keep for fallback
    global $pinnacle; 
    if(!empty($pinnacle['pinnacle_custom_favicon']['url'])) { 
      echo '<link rel="shortcut icon" type="image/x-icon" href="'. esc_url($pinnacle['pinnacle_custom_favicon']['url']).'" />';
    }
} 
add_action('wp_head', 'kt_fav_output', 1);
