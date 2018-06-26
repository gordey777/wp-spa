<?php
/**
	Portfolio Metaboxes
 */

add_filter( 'cmb2_admin_init', 'pinnacle_portfolio_metaboxes');
function pinnacle_portfolio_metaboxes(){
	$prefix = '_kad_';

	$kt_portfolio_post = new_cmb2_box( array(
		'id'         => 'portfolio_post_metabox',
		'title'      => __('Portfolio Post Options', 'pinnacle'),
		'object_types'      => array( 'portfolio' ), // Post type
		'priority'   => 'high',
	) );
	$kt_portfolio_post->add_field( array(
		'name'    => __('Project Layout', 'pinnacle'),
		'desc'    => '<a href="http://docs.kadencethemes.com/pinnacle-premium/portfolio-posts/" target="_blank" >Whats the difference?</a>',
		'id'      => $prefix . 'ppost_layout',
		'type'    => 'radio_inline',
		'options' => array(
			'beside' => __('Beside 40%', 'pinnacle'), 
			'besidesmall' => __('Beside 33%', 'pinnacle'), 
			'above' => __('Above', 'pinnacle'), 
			'three' => __('Three Rows', 'pinnacle'),
		),
	) );
	$kt_portfolio_post->add_field( array(
		'name'    => __('Project Options', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'ppost_type',
		'type'    => 'select',
		'options' => array(
			'image' => __('Image', 'pinnacle'), 
			'flex' => __('Image Slider - (Cropped Image Ratio)', 'pinnacle'),
			'carousel' => __('Image Slider - (Different Image Ratio)', 'pinnacle'),
			'imgcarousel' => __('Image Carouse  - (Muiltiple Images Showing At Once)l', 'pinnacle'),
			'shortcode' => __('Shortcode', 'pinnacle'), 
			'imagegrid' => __('Image Grid', 'pinnacle'),
			'imagelist' => __('Image List', 'pinnacle'),
			'imagelist2' => __('Image List Style 2', 'pinnacle'), 
			'video' => __('Video', 'pinnacle'), 
			'none' => __('None', 'pinnacle'), 
		),
	) );
	$kt_portfolio_post->add_field( array(
		'name'    => __('Columns (Only for Image Grid option)', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'portfolio_img_grid_columns',
		'type'    => 'select',
		'options' => array(
			'4' => __('Four Column', 'pinnacle'),
			'3' => __('Three Column', 'pinnacle'), 
			'2' => __('Two Column', 'pinnacle'), 
			'5' => __('Five Column', 'pinnacle'), 
			'6' => __('Six Column', 'pinnacle'), 
		),
	) );
	$kt_portfolio_post->add_field( array(
		'name' => __("Portfolio Slider/Images", 'pinnacle' ),
		'desc' => __("Add images for post here", 'pinnacle' ),
		'id'   => $prefix . 'image_gallery',
		'type' => 'kad_gallery',
	) );
	$kt_portfolio_post->add_field( array(
		'name' => __("Slider Shortcode", 'pinnacle' ),
		'desc' => __("Paste Slider Shortcode here", 'pinnacle' ),
		'id'   => $prefix . 'portfolio_shortcode_slider',
		'type' => 'textarea_code',
	) );
	$kt_portfolio_post->add_field( array(
		'name' => __("Max Image/Slider Height", 'pinnacle' ),
		'desc' => __("Default is: 450 (Note: just input number, example: 350)", 'pinnacle' ),
		'id'   => $prefix . 'posthead_height',
		'type' => 'text_small',
	) );
	$kt_portfolio_post->add_field( array(
		'name' => __("Max Image/Slider Width", 'pinnacle' ),
		'desc' => __("Default is: 670 or 1140 on above or three row layouts (Note: just input number, example: 650)", 'pinnacle' ),
		'id'   => $prefix . 'posthead_width',
		'type' => 'text_small',
	) );
	$kt_portfolio_post->add_field( array(
		'name'    => __('Project Summary', 'pinnacle'),
		'desc'    => 'This determines how its displayed in the <b>portfolio grid page</b>',
		'id'      => $prefix . 'post_summery',
		'type'    => 'select',
		'options' => array(
			'image' => __('Image', 'pinnacle'),
			'slider' => __('Image Slider', 'pinnacle'),
			'videolight' => __('Image with video lightbox (must be url)', 'pinnacle'),
		),
	) );
	$kt_portfolio_post->add_field( array(
		'name' => __('Value 01 Title', 'pinnacle'),
		'desc' => __('ex. Project Type:', 'pinnacle'),
		'id'   => $prefix . 'project_val01_title',
		'type' => 'text_medium',
	) );
	$kt_portfolio_post->add_field( array(
		'name' => __('Value 01 Description', 'pinnacle'),
		'desc' => __('ex. Character Illustration', 'pinnacle'),
		'id'   => $prefix . 'project_val01_description',
		'type' => 'text_medium',
	) );
	$kt_portfolio_post->add_field( array(
		'name' => __('Value 02 Title', 'pinnacle'),
		'desc' => __('ex. Skills Needed:', 'pinnacle'),
		'id'   => $prefix . 'project_val02_title',
		'type' => 'text_medium',
	) );
	$kt_portfolio_post->add_field( array(
		'name' => __('Value 02 Description', 'pinnacle'),
		'desc' => __('ex. Photoshop, Illustrator', 'pinnacle'),
		'id'   => $prefix . 'project_val02_description',
		'type' => 'text_medium',
	) );
	$kt_portfolio_post->add_field( array(
		'name' => __('Value 03 Title', 'pinnacle'),
		'desc' => __('ex. Customer:', 'pinnacle'),
		'id'   => $prefix . 'project_val03_title',
		'type' => 'text_medium',
	) );
	$kt_portfolio_post->add_field( array(
		'name' => __('Value 03 Description', 'pinnacle'),
		'desc' => __('ex. Example Inc', 'pinnacle'),
		'id'   => $prefix . 'project_val03_description',
		'type' => 'text_medium',
	) );
	$kt_portfolio_post->add_field( array(
		'name' => __('Value 04 Title', 'pinnacle'),
		'desc' => __('ex. Project Year:', 'pinnacle'),
		'id'   => $prefix . 'project_val04_title',
		'type' => 'text_medium',
	) );
	$kt_portfolio_post->add_field( array(
		'name' => __('Value 04 Description', 'pinnacle'),
		'desc' => __('ex. 2013', 'pinnacle'),
		'id'   => $prefix . 'project_val04_description',
		'type' => 'text_medium',
	) );
	$kt_portfolio_post->add_field( array(
		'name' => __('External Website', 'pinnacle'),
		'desc' => __('ex. Website:', 'pinnacle'),
		'id'   => $prefix . 'project_val05_title',
		'type' => 'text_medium',
	) );
	$kt_portfolio_post->add_field( array(
		'name' => __('Website Address', 'pinnacle'),
		'desc' => __('ex. http://www.example.com', 'pinnacle'),
		'id'   => $prefix . 'project_val05_description',
		'type' => 'text_medium',
	) );
	$kt_portfolio_post->add_field( array(
		'name' => __('If Video Project - Video URL (recomended)', 'pinnacle'),
		'desc' => __('Place youtube, vimeo url', 'pinnacle'),
		'id'   => $prefix . 'post_video_url',
		'type' => 'textarea_code',
	) );
	$kt_portfolio_post->add_field( array(
		'name' => __('If Video Project - Video Embed Code', 'pinnacle'),
		'desc' => __('Place Embed Code Here, works with youtube, vimeo... (does not work with lightbox)', 'pinnacle'),
		'id'   => $prefix . 'post_video',
		'type' => 'textarea_code',
	) );
	$kt_portfolio_post->add_field( array(
		'name'    => __('Choose Portfolio Parent Page', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'portfolio_parent',
		'type'    => 'select',
		'options' => pinnacle_cmb_page_options(),
	) );
} 
add_filter( 'cmb2_admin_init', 'pinnacle_portfolio_carousel_metaboxes');
function pinnacle_portfolio_carousel_metaboxes(){
	$prefix = '_kad_';
	$kt_portfolio_carousel = new_cmb2_box( array(
		'id'         => 'portfolio_post_carousel_metabox',
		'title'      => __('Bottom Carousel Options', 'pinnacle'),
		'object_types'      => array( 'portfolio' ), // Post type
		'priority'   => 'high',
	) );
	$kt_portfolio_carousel->add_field( array(
		'name' => __('Carousel Title', 'pinnacle'),
		'desc' => __('ex. Similar Projects', 'pinnacle'),
		'id'   => $prefix . 'portfolio_carousel_title',
		'type' => 'text_medium',
	) );
	$kt_portfolio_carousel->add_field( array(
		'name' => __('Bottom Portfolio Carousel', 'pinnacle'),
		'desc' => __('Display a carousel with portfolio items below project?', 'pinnacle'),
		'id'   => $prefix . 'portfolio_carousel_recent',
		'type'    => 'select',
		'options' => array(
			'default' => __('Default', 'pinnacle'),
			'no' => __('No', 'pinnacle'),
			'yes' => __('Yes', 'pinnacle'),
		),
	) );
	$kt_portfolio_carousel->add_field( array(
		'name' => __('Carousel Items', 'pinnacle'),
		'desc' => '',
		'id'   => $prefix . 'portfolio_carousel_group',
		'type'    => 'select',
		'options' => array(
			'default' => __('Default', 'pinnacle'),
			'all' => __('All Portfolio Posts', 'pinnacle'),
			'cat' => __('Only of same Portfolio Type', 'pinnacle'),
		),
	) );
	$kt_portfolio_carousel->add_field( array(
		'name' => __('Carousel Order', 'pinnacle'),
		'desc' => '',
		'id'   => $prefix . 'portfolio_carousel_order',
		'type'    => 'select',
		'options' => array(
			'menu_order' => __('Menu Order', 'pinnacle'),
			'title' => __('Title', 'pinnacle'),
			'date' => __('Date', 'pinnacle'), 
			'rand' => __('Random', 'pinnacle'),
		),
	) );

}

add_filter( 'cmb2_admin_init', 'pinnacle_portfolio_template_metaboxes');
function pinnacle_portfolio_template_metaboxes(){
	$prefix = '_kad_';
	$kt_portfolio_page = new_cmb2_box( array(
		'id'         => 'portfolio_metabox',
		'title'      => __('Portfolio Page Options', 'pinnacle'),
		'object_types'      => array( 'page' ), // Post type
		'show_on' => array('key' => 'page-template', 'value' => array( 'template-portfolio-grid.php')),
		'priority'   => 'high',
	) );
	$kt_portfolio_page->add_field( array(
		'name'    => __('Style', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'portfolio_style',
		'type'    => 'select',
		'options' => array(
			'default' => __('Default', 'pinnacle'),
			'padded_style' => __('Post Boxes', 'pinnacle'),
			'flat-no-margin' => __('Flat No Margin', 'pinnacle'),
			'flat-w-margin' => __('Flat with Margin', 'pinnacle'),
		),
	) );
	$kt_portfolio_page->add_field( array(
		'name'    => __('Hover Style', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'portfolio_hover_style',
		'type'    => 'select',
		'options' => array(
			'default' => __('Default', 'pinnacle'),
			'p_lightstyle' => __('Light', 'pinnacle'), 
			'p_darkstyle' => __('Dark', 'pinnacle'),
			'p_primarystyle' => __('Primary Color', 'pinnacle'),
		),
	) );
	$kt_portfolio_page->add_field( array(
		'name'    => __('Columns', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'portfolio_columns',
		'type'    => 'select',
		'default' => '4',
		'options' => array(
			'4' 	=> __("Four Columns", 'pinnacle' ),
			'3' 	=> __("Three Columns", 'pinnacle' ),
			'2' 	=> __("Two Columns", 'pinnacle' ),
			'5' 	=> __("Five Columns", 'pinnacle' ),
			'6' 	=> __("Six Columns", 'pinnacle' ),
		),
	) );
	$kt_portfolio_page->add_field( array(
		'name'    => __('Fullwidth - Span Screen Size?', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'portfolio_fullwidth',
		'type'    => 'select',
		'options' => array(
			'no' => __('No', 'pinnacle'),
			'yes' => __('Yes', 'pinnacle'),
		),
	) );
	$kt_portfolio_page->add_field( array(
		'name'    => __('Filter?', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'portfolio_filter',
		'type'    => 'select',
		'options' => array(
			'no' => __('No', 'pinnacle'),
			'yes' => __('Yes', 'pinnacle'),
		),
	) );
	$kt_portfolio_page->add_field( array(
        'name' => __('Portfolio Work Types', 'pinnacle'),
        'desc' => __('You can have filterable portfolios with one work type if has children', 'pinnacle'),
        'id' => $prefix .'portfolio_type',
        'type' 		=> 'kt_select_type',
		'taxonomy' 	=> 'portfolio-type',
    ) );
	$kt_portfolio_page->add_field( array(
		'name'    => __('Order Items By', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'portfolio_order',
		'type'    => 'select',
		'options' => array(
			'menu_order' 	=> __("Menu Order", 'pinnacle' ),
			'date' 			=> __("Date", 'pinnacle' ),
			'title' 		=> __("Title", 'pinnacle' ),
			'rand' 			=> __("Random", 'pinnacle' ),
		),
	) );
	$kt_portfolio_page->add_field( array(
		'name'    => __('Items per Page', 'pinnacle'),
		'desc'    => __('How many portfolio items per page', 'pinnacle'),
		'id'      => $prefix . 'portfolio_items',
		'type'    => 'select',
		'options' => array(
			'all' 	=> __("All", 'pinnacle' ),
			'2' 	=> __("2", 'pinnacle' ),
			'3' 	=> __("3", 'pinnacle' ),
			'4' 	=> __("4", 'pinnacle' ),
			'5' 	=> __("5", 'pinnacle' ),
			'6' 	=> __("6", 'pinnacle' ),
			'7' 	=> __("7", 'pinnacle' ),
			'8' 	=> __("8", 'pinnacle' ),
			'9' 	=> __("9", 'pinnacle' ),
			'10' 	=> __("10", 'pinnacle' ),
			'11' 	=> __("11", 'pinnacle' ),
			'12' 	=> __("12", 'pinnacle' ),
			'13' 	=> __("13", 'pinnacle' ),
			'14' 	=> __("14", 'pinnacle' ),
			'15' 	=> __("15", 'pinnacle' ),
			'16' 	=> __("16", 'pinnacle' ),
			'17' 	=> __("17", 'pinnacle' ),
			'18' 	=> __("18", 'pinnacle' ),
		),
	) );
	$kt_portfolio_page->add_field( array(
		'name'    => __('Image Ratio?', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'portfolio_img_ratio',
		'type'    => 'select',
		'options' => array(
			'default' => __('Default', 'pinnacle'), 
			'square' => __('Square 1:1', 'pinnacle'), 
			'portrait' => __('Portrait 3:4', 'pinnacle'),
			'landscape' => __('Landscape 4:3', 'pinnacle'), 
			'widelandscape' => __('Wide Landscape 4:2', 'pinnacle'), 
		),
	) );
	$kt_portfolio_page->add_field( array(
		'name' => __('Masonry Layout?', 'pinnacle'),
		'desc' => __('Images height will not be cropped', 'pinnacle'),
		'id'   => $prefix . 'portfolio_masonry',
		'type'    => 'select',
		'options' => array(
			'no' => __('No', 'pinnacle'),
			'yes' => __('Yes', 'pinnacle'),
			),
	) );
	$kt_portfolio_page->add_field( array(
		'name' => __('Display Item Work Types', 'pinnacle'),
		'desc' => '',
		'id'   => $prefix . 'portfolio_item_types',
		'type' => 'checkbox',
	) );
	$kt_portfolio_page->add_field( array(
		'name' => __('Display Item Excerpt', 'pinnacle'),
		'desc' => '',
		'id'   => $prefix . 'portfolio_item_excerpt',
		'type' => 'checkbox',
	) );
	$kt_portfolio_page->add_field( array(
		'name' => __('Add Lightbox link in each item', 'pinnacle'),
		'desc' => '',
		'id'   => $prefix . 'portfolio_lightbox',
		'type' => 'checkbox',
	));
}
