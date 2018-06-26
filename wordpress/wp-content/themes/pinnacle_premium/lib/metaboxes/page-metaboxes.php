<?php
/**
	Product Video Metaboxes
 */

add_filter( 'cmb2_admin_init', 'pinnacle_page_metaboxes');
function pinnacle_page_metaboxes(){
	$prefix = '_kad_';
	$kt_page_sidebar = new_cmb2_box( array(
		'id'         => 'page_sidebar',
		'title'      => __('Sidebar Options', 'pinnacle'),
		'object_types'      => array( 'page' ), // Post type
		'show_on' => array( 'key' => 'kt-template', 'value' => array('template-portfolio-grid','template-contact')),
		'priority'   => 'high',
	) );
	$kt_page_sidebar->add_field( array(
		'name' => __('Display Sidebar?', 'pinnacle'),
		'desc' => __('Choose if layout is fullwidth or sidebar', 'pinnacle'),
		'id'   => $prefix . 'page_sidebar',
		'type'    => 'select',
		'options' => array(
			'no' => __('No', 'pinnacle'),
			'yes' => __('Yes', 'pinnacle'),
		),
	) );
	$kt_page_sidebar->add_field( array(
		'name'    => __('Choose Sidebar', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'sidebar_choice',
		'type'    => 'select',
		'options' => pinnacle_cmb_sidebar_options(),				
	) );
}
add_filter( 'cmb2_admin_init', 'pinnacle_contact_page_metaboxes');
function pinnacle_contact_page_metaboxes(){
	$prefix = '_kad_';
	$kt_contact_page = new_cmb2_box( array(
		'id'         => 'contact_metabox',
		'title'      => __('Contact Page Options', 'pinnacle'),
		'object_types'      => array( 'page' ), // Post type
		'show_on' => array('key' => 'page-template', 'value' => array( 'template-contact.php')),
		'priority'   => 'high',
	) );
	$kt_contact_page->add_field( array(
        'name' => __('Use Contact Form', 'pinnacle'),
        'desc' => '',
        'id' => $prefix .'contact_form',
        'type'    => 'select',
		'options' => array(
			'yes' => __('Yes', 'pinnacle'),
			'noe' => __('No', 'pinnacle'),
		),
	) );
	$kt_contact_page->add_field( array(
		'name' => __('Contact Form Title', 'pinnacle'),
		'desc' => __('ex. Send us an Email', 'pinnacle'),
		'id'   => $prefix . 'contact_form_title',
		'type' => 'text',
	) );
	$kt_contact_page->add_field( array(
		'name' => __('Contact Form Email Recipient', 'pinnacle'),
		'desc' => __('ex. joe@gmail.com', 'pinnacle'),
		'id'   => $prefix . 'contact_form_email',
		'type' => 'text',
	) );
	$kt_contact_page->add_field( array(
        'name' => __('Use Simple Math Question', 'pinnacle'),
        'desc' => 'Adds a simple math question to form.',
        'id' => $prefix .'contact_form_math',
        'type'    => 'select',
		'options' => array(
			'yes' => __('Yes', 'pinnacle'),
			'no' => __('No', 'pinnacle'), 
		),
	) );
	$kt_contact_page->add_field( array(
        'name' => __('Use Map', 'pinnacle'),
        'desc' => '',
        'id' => $prefix .'contact_map',
        'type'    => 'select',
		'options' => array(
			'no' => __('No', 'pinnacle'),
			'yes' => __('Yes', 'pinnacle'),
		),
	) );
	$kt_contact_page->add_field( array(
		'name' => __('Address', 'pinnacle'),
		'desc' => __('Enter your Location', 'pinnacle'),
		'id'   => $prefix . 'contact_address',
		'type' => 'text',
	) );
	$kt_contact_page->add_field( array(
		'name'    => __('Map Type', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'contact_maptype',
		'type'    => 'select',
		'options' => array(
			'ROADMAP' => __('ROADMAP', 'pinnacle'),
			'HYBRID' => __('HYBRID', 'pinnacle'),
			'TERRAIN' => __('TERRAIN', 'pinnacle'),
			'SATELLITE' => __('SATELLITE', 'pinnacle'),
		),
	) );
	$kt_contact_page->add_field( array(
		'name' => __('Map Zoom Level', 'pinnacle'),
		'desc' => __('A good place to start is 15', 'pinnacle'),
		'id'   => $prefix . 'contact_zoom',
		'std'  => '15',
		'type'    => 'select',
		'options' => array(
			'1' => __('1 (World View)', 'pinnacle'),
			'2' => '2', 
			'3' => '3', 
			'4' => '4', 
			'5' => '5', 
			'6' => '6', 
			'7' => '7', 
			'8' => '8', 
			'9' => '9', 
			'10' => '10', 
			'11' => '11', 
			'12' => '12', 
			'13' => '13', 
			'14' => '14', 
			'15' => '15', 
			'16' => '16', 
			'17' => '17', 
			'18' => '18', 
			'19' => '19', 
			'20' => '20', 
			'21' => __('21 (Street View)', 'pinnacle'),
			),
	) );
	$kt_contact_page->add_field( array(
		'name' => __('Map Height', 'pinnacle'),
		'desc' => __('Default is 300', 'pinnacle'),
		'id'   => $prefix . 'contact_mapheight',
		'type' => 'text_small',
	) );
	$kt_contact_page->add_field( array(
		'name' => __('Address Two', 'pinnacle'),
		'desc' => __('Enter your Location', 'pinnacle'),
		'id'   => $prefix . 'contact_address2',
		'type' => 'text',
	) );
	$kt_contact_page->add_field( array(
		'name' => __('Address Three', 'pinnacle'),
		'desc' => __('Enter a Location', 'pinnacle'),
		'id'   => $prefix . 'contact_address3',
		'type' => 'text',
	) );
	$kt_contact_page->add_field( array(
		'name' => __('Address Four', 'pinnacle'),
		'desc' => __('Enter a Location', 'pinnacle'),
		'id'   => $prefix . 'contact_address4',
		'type' => 'text',
	) );
	$kt_contact_page->add_field( array(
		'name' => __('Map Center', 'pinnacle'),
		'desc' => __('Enter a Location', 'pinnacle'),
		'id'   => $prefix . 'contact_map_center',
		'type' => 'text',	
	));
}

add_filter( 'cmb2_admin_init', 'pinnacle_feature_page_metaboxes');
function pinnacle_feature_page_metaboxes(){
	$prefix = '_kad_';
	$kt_feature_page = new_cmb2_box( array(
		'id'         => 'pagefeature_metabox',
		'title'      => __('Feature Page Options', 'pinnacle'),
		'object_types'      => array( 'page' ), // Post type
		'show_on' => array('key' => 'page-template', 'value' => array( 'template-feature.php')),
		'priority'   => 'high',
	) );
	$kt_feature_page->add_field( array(
		'name'    => __('Header Options', 'pinnacle'),
		'desc'    => __('If image slider make sure images uploaded are at-least 1170px wide.', 'pinnacle'),
		'id'      => $prefix . 'page_head',
		'type'    => 'select',
		'default' => 'pagetitle',
		'options' => array(
			'pagetitle' => __('Page Title', 'pinnacle'),
			'flex' => __('Image Slider - (Cropped Image Ratio)', 'pinnacle'),
			'carousel' => __('Image Slider - (Different Image Ratio)', 'pinnacle'),
			'imgcarousel' => __('Image Carousel - (Muiltiple Images Showing At Once)', 'pinnacle'),
			'shortcode' => __('Shortcode Slider', 'pinnacle'), 
			'video' => __('Video', 'pinnacle'),
		),
	) );
	$kt_feature_page->add_field( array(
		'name' => __("Slider Images", 'pinnacle' ),
		'desc' => __("Add for flex, carousel, and image carousel.", 'pinnacle' ),
		'id'   => $prefix . 'image_gallery',
		'type' => 'kad_gallery',
	) );
	$kt_feature_page->add_field( array(
		'name' => __('If Shortcode Slider', 'pinnacle'),
		'desc' => __('Paste slider shortcode here (example: [kadence_slider_pro id="4"])', 'pinnacle'),
		'id'   => $prefix . 'feature_shortcode_slider',
		'type' => 'textarea_code',
	) );
	$kt_feature_page->add_field( array(
		'name' => __('Max Image/Slider Height', 'pinnacle'),
		'desc' => __('Default is: 400 (Note: just input number, example: 350)', 'pinnacle'),
		'id'   => $prefix . 'posthead_height',
		'type' => 'text_small',
	) );
	$kt_feature_page->add_field( array(
		'name' => __("Max Image/Slider Width", 'pinnacle' ),
		'desc' => __("Default is: 1140 on fullwidth posts (Note: just input number, example: 650, does not apply to Carousel slider)", 'pinnacle' ),
		'id'   => $prefix . 'posthead_width',
		'type' => 'text_small',
	) );
	$kt_feature_page->add_field( array(
		'name' => __('If Video', 'pinnacle'),
		'desc' => __('Place Embed Code Here, works with youtube, vimeo...', 'pinnacle'),
		'id'   => $prefix . 'post_video',
		'type' => 'textarea_code',
	) );
}