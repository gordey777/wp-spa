<?php

load_theme_textdomain('pinnacle', get_template_directory() . '/languages');

/*
 * Init Theme Options
 */
require_once( trailingslashit( get_template_directory() ) . 'themeoptions/redux/framework.php');          					// Options framework
require_once( trailingslashit( get_template_directory() ) . 'themeoptions/theme_options.php');          						// Options framework
require_once( trailingslashit( get_template_directory() ) . 'themeoptions/options_assets/pinnacle_extension.php');        	// Options framework


/*
 * Init Theme Startup/Core utilities
 */

require_once( trailingslashit( get_template_directory() ) . 'lib/utils.php');           										// Utility functions
require_once( trailingslashit( get_template_directory() ) . 'lib/init.php');            										// Initial theme setup and constants
require_once( trailingslashit( get_template_directory() ) . 'lib/sidebar.php');         										// Sidebar class
require_once( trailingslashit( get_template_directory() ) . 'lib/config.php');          										// Configuration
require_once( trailingslashit( get_template_directory() ) . 'lib/cleanup.php');        										// Cleanup
require_once( trailingslashit( get_template_directory() ) . 'lib/custom-nav.php');        									// Custom Nav Functions
require_once( trailingslashit( get_template_directory() ) . 'lib/nav.php');            										// Custom nav modifications
require_once( trailingslashit( get_template_directory() ) . 'lib/comments.php');        										// Custom comments modifications
require_once( trailingslashit( get_template_directory() ) . 'lib/class-kadence-image-processing.php');      					// Image processing
require_once( trailingslashit( get_template_directory() ) . 'lib/class-pinnacle-get-image.php');      						// Resize on the fly
require_once( trailingslashit( get_template_directory() ) . 'lib/aq_resizer.php');      										// Resize on the fly
require_once( trailingslashit( get_template_directory() ) . 'lib/image_functions.php');      									// Resize on the fly
require_once( trailingslashit( get_template_directory() ) . 'lib/taxonomy-meta-class.php');   								// Taxonomy meta boxes
require_once( trailingslashit( get_template_directory() ) . 'lib/taxonomy-meta.php');         								// Taxonomy meta boxes
require_once( trailingslashit( get_template_directory() ) . 'kt_framework/status.php');   									// System status
require_once( trailingslashit( get_template_directory() ) . 'lib/build_slider.php');   									// System status

/*
 * Init metaboxes
 */
require_once( trailingslashit( get_template_directory() ) . 'lib/classes/cmb/init.php');     	// Init Metaboxes
require_once( trailingslashit( get_template_directory() ) . 'lib/metaboxes/pinnacle-cmb-extensions.php');     		// Custom metaboxes
require_once( trailingslashit( get_template_directory() ) . 'lib/metaboxes/post-metaboxes.php');     				// Custom metaboxes
require_once( trailingslashit( get_template_directory() ) . 'lib/metaboxes/postheader-metaboxes.php');     		// Custom metaboxes
require_once( trailingslashit( get_template_directory() ) . 'lib/metaboxes/pageheader-metaboxes.php');     		// Custom metaboxes
require_once( trailingslashit( get_template_directory() ) . 'lib/metaboxes/portfolio-metaboxes.php');     		// Custom metaboxes
require_once( trailingslashit( get_template_directory() ) . 'lib/metaboxes/staff-metaboxes.php');     		// Custom metaboxes
require_once( trailingslashit( get_template_directory() ) . 'lib/metaboxes/testimonial-metaboxes.php');     		// Custom metaboxes
require_once( trailingslashit( get_template_directory() ) . 'lib/metaboxes/page-template-blog-metaboxes.php');     		// Custom metaboxes
require_once( trailingslashit( get_template_directory() ) . 'lib/metaboxes/product-metaboxes.php');     		// Custom metaboxes
require_once( trailingslashit( get_template_directory() ) . 'lib/metaboxes/page-metaboxes.php');     		// Custom metaboxes
/*
 * Init Shortcodes
 */
require_once( trailingslashit( get_template_directory() ) . 'lib/kad_shortcodes/general_shortcodes.php');      				// Shortcodes
require_once( trailingslashit( get_template_directory() ) . 'lib/kad_shortcodes/carousel_shortcodes.php');   					// Carousel Shortcodes
require_once( trailingslashit( get_template_directory() ) . 'lib/kad_shortcodes/custom_carousel_shortcodes.php');  			// Custom Carousel Shortcodes
require_once( trailingslashit( get_template_directory() ) . 'lib/kad_shortcodes/testimonial_shortcodes.php');   				// Testimonial Shortcodes
require_once( trailingslashit( get_template_directory() ) . 'lib/kad_shortcodes/testimonial_form_shortcode.php');   			// Testimonial Form Shortcodes
require_once( trailingslashit( get_template_directory() ) . 'lib/kad_shortcodes/blog_shortcodes.php');   						// Blog Shortcodes
require_once( trailingslashit( get_template_directory() ) . 'lib/kad_shortcodes/image_menu_shortcodes.php'); 					// Image Menu Shortcodes
require_once( trailingslashit( get_template_directory() ) . 'lib/kad_shortcodes/google_map_shortcode.php');  					// Map Shortcodes
require_once( trailingslashit( get_template_directory() ) . 'lib/kad_shortcodes/portfolio_shortcodes.php'); 					// Portfolio Shortcodes
require_once( trailingslashit( get_template_directory() ) . 'lib/kad_shortcodes/portfolio_cat_shortcodes.php'); 				// Portfolio Type Shortcodes
require_once( trailingslashit( get_template_directory() ) . 'lib/kad_shortcodes/staff_shortcodes.php'); 						// Staff Shortcodes
require_once( trailingslashit( get_template_directory() ) . 'lib/kad_shortcodes/latest_posts_carousel_shortcode.php'); 		// Latest Posts Carousel
require_once( trailingslashit( get_template_directory() ) . 'lib/kad_shortcodes/gallery.php');      							// Gallery Shortcode

/*
 * Init Widgets
 */
require_once( trailingslashit( get_template_directory() ) . 'lib/premium_widgets.php'); 										// Premium Widgets
require_once( trailingslashit( get_template_directory() ) . 'lib/widgets.php');         										// Sidebars and widgets
require_once( trailingslashit( get_template_directory() ) . 'lib/mobile_detect.php');        									// Mobile Detect
require_once( trailingslashit( get_template_directory() ) . 'lib/plugin-activate.php');   									// Plugin Activation
require_once( trailingslashit( get_template_directory() ) . 'lib/custom.php');          										// Custom functions


/*
 * Template Hooks
 */
require_once( trailingslashit( get_template_directory() ) . 'lib/authorbox.php');         									// Author box
require_once( trailingslashit( get_template_directory() ) . 'lib/breadcrumbs.php');         									// Breadcrumbs
require_once( trailingslashit( get_template_directory() ) . 'lib/custom-woocommerce.php'); 									// Woocommerce functions
require_once( trailingslashit( get_template_directory() ) . 'lib/woo-account.php'); 											// Woocommerce account
require_once( trailingslashit( get_template_directory() ) . 'lib/custom-pagebuilderlayouts.php');								// Pagebuilder layout functions
require_once( trailingslashit( get_template_directory() ) . 'lib/custom-header.php'); 										// Fontend Header
require_once( trailingslashit( get_template_directory() ) . 'lib/customizer.php'); 											// Custom Customizer
require_once( trailingslashit( get_template_directory() ) . 'lib/kt_flexslider.php'); 										// Flex Slider Create Function
require_once( trailingslashit( get_template_directory() ) . 'lib/template_hooks/single_post.php'); 		    				// Single Post Template Hooks
require_once( trailingslashit( get_template_directory() ) . 'lib/template_hooks/post_list.php'); 		    					// Post List Template Hooks
require_once( trailingslashit( get_template_directory() ) . 'lib/template_hooks/page.php'); 		    					    // Page Template Hooks
require_once( trailingslashit( get_template_directory() ) . 'lib/template_hooks/staff.php'); 		    					    // Page Template Hooks
require_once( trailingslashit( get_template_directory() ) . 'kt_framework/extensions.php');        							// Custom Nav Functions
require_once( trailingslashit( get_template_directory() ) . 'lib/post-types.php');      										// Post Types

/*
 * Load Scripts
 */
require_once( trailingslashit( get_template_directory() ) . 'lib/admin_scripts.php');    										// Admin Scripts functions
require_once( trailingslashit( get_template_directory() ) . 'lib/scripts.php');        										// Scripts and stylesheets
require_once( trailingslashit( get_template_directory() ) . 'lib/output_css.php'); 											// Fontend Custom CSS

 /*
 * Updater
 */
require_once( trailingslashit( get_template_directory() ) . 'kt_framework/kt-api.php');
require_once( trailingslashit( get_template_directory() ) . 'kt_framework/wp-updates-theme.php');

/*
 * Admin Shortcode Btn
 */
function pinnacle_shortcode_init() {
	if(is_admin()){ if(kad_is_edit_page()){require_once locate_template('/lib/kad_shortcodes.php');	}}
}
add_action('init', 'pinnacle_shortcode_init');

add_action('template_redirect', 'template_redirect_attachment');
function template_redirect_attachment() {
global $post;
// Перенаправляем на основную запись:
if (is_attachment()) {
wp_redirect(get_permalink($post->post_parent));
}
}