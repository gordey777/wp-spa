<?php
/**
	Staff Metaboxes
 */

add_filter( 'cmb2_admin_init', 'pinnacle_staff_metaboxes');
function pinnacle_staff_metaboxes(){
	$prefix = '_kad_';
	$kt_staff_post = new_cmb2_box( array(
		'id'         => 'staff_post_metabox',
		'title'      => __('Staff Options', 'pinnacle'),
		'object_types'      => array( 'staff' ), // Post type
		'priority'   => 'high',
	) );
	$kt_staff_post->add_field( array(
		'name' => __('Job Title', 'pinnacle'),
		'desc' => __('ex: Customer Service', 'pinnacle'),
		'id'   => $prefix . 'staff_job_title',
		'type' => 'text',
	) );
	$kt_staff_post->add_field( array(
		'name'    => __('Email', 'pinnacle'),
		'id'      => $prefix . 'staff_email',
		'type' => 'text',
	) );
	$kt_staff_post->add_field( array(
		'name'    => __('Phone', 'pinnacle'),
		'id'      => $prefix . 'staff_phone',
		'type' => 'text',
	) );
	$kt_staff_post->add_field( array(
		'name'    => __('Facebook Link', 'pinnacle'),
		'id'      => $prefix . 'staff_facebook',
		'type' => 'text',
	) );
	$kt_staff_post->add_field( array(
		'name'    => __('Twitter Link', 'pinnacle'),
		'id'      => $prefix . 'staff_twitter',
		'type' => 'text',
	) );
	$kt_staff_post->add_field( array(
		'name'    => __('Instagram Link', 'pinnacle'),
		'id'      => $prefix . 'staff_instagram',
		'type' => 'text',
	) );
	$kt_staff_post->add_field( array(
		'name'    => __('Linkedin Link', 'pinnacle'),
		'id'      => $prefix . 'staff_linkedin',
		'type' => 'text',
	) );
} 
add_filter( 'cmb2_admin_init', 'pinnacle_staff_sidebar_metaboxes');
function pinnacle_staff_sidebar_metaboxes(){
	$prefix = '_kad_';
	$kt_staff_sidebar_post = new_cmb2_box( array(
		'id'         => 'single_post_metabox',
		'title'      => __("Post Options", 'pinnacle'),
		'object_types'      => array( 'staff', 'testimonial'), // Post type
		'priority'   => 'high',
	) );
	$kt_staff_sidebar_post->add_field( array(
		'name' => __('Display Sidebar?', 'pinnacle'),
		'desc' => __('Choose if layout is fullwidth or sidebar', 'pinnacle'),
		'id'   => $prefix . 'post_sidebar',
		'type'    => 'select',
		'options' => array(
			'yes' => __('Yes', 'pinnacle'),
			'no' => __('No', 'pinnacle'), 
		),
	) );
	$kt_staff_sidebar_post->add_field( array(
		'name'    => __('Choose Sidebar', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'sidebar_choice',
		'type'    => 'select',
		'options' => pinnacle_cmb_sidebar_options(),
	) );
}
add_filter( 'cmb2_admin_init', 'pinnacle_staff_template_metaboxes');
function pinnacle_staff_template_metaboxes(){
	$prefix = '_kad_';
	$kt_staff_page = new_cmb2_box( array(
		'id'         => 'staff_page_metabox',
		'title'      => __('Staff Page Options', 'pinnacle'),
		'object_types'      => array( 'page' ), // Post type
		'show_on' => array('key' => 'page-template', 'value' => array( 'template-staff-grid.php' )),
		'priority'   => 'high',
	) );
	$kt_staff_page->add_field( array(
		'name'    => __('Columns', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'staff_columns',
		'type'    => 'select',
		'options' => array(
			'4' => __('Four Column', 'pinnacle'),
			'3' => __('Three Column', 'pinnacle'),
			'2' => __('Two Column', 'pinnacle'),
		),
	) );
	$kt_staff_page->add_field( array(
        'name' => __('Limit to Group', 'pinnacle'),
        'desc' => '',
        'id' => $prefix .'staff_type',
        'type' 		=> 'kt_select_group',
		'taxonomy' 	=> 'staff-group',
   	) );
	$kt_staff_page->add_field( array(
		'name'    => __('Filter?', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'staff_filter',
		'type'    => 'select',
		'options' => array(
			'no' => __('No', 'pinnacle'),
			'yes' => __('Yes', 'pinnacle'),
		),
	) );
	$kt_staff_page->add_field( array(
		'name'    => __('Items per Page', 'pinnacle'),
		'desc'    => __('How many portfolio items per page', 'pinnacle'),
		'id'      => $prefix . 'staff_items',
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
	$kt_staff_page->add_field( array(
		'name'    => __('Image Ratio?', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'staff_img_ratio',
		'type'    => 'select',
		'options' => array(
			'square' => __('Square 1:1', 'pinnacle'),
			'portrait' => __('Portrait 3:4', 'pinnacle'),
			'landscape' => __('Landscape 4:3', 'pinnacle'),
			'widelandscape' => __('Wide Landscape 4:2', 'pinnacle'),
		),
	) );
	$kt_staff_page->add_field( array(
		'name' => __('Masonry Layout?', 'pinnacle'),
		'desc' => __('Images height will not be cropped', 'pinnacle'),
		'id'   => $prefix . 'staff_masonry',
		'type'    => 'select',
		'options' => array(
			'false' => __('No', 'pinnacle'),
			'true' => __('Yes', 'pinnacle'),
		),
	) );
	$kt_staff_page->add_field( array(
		'name' => __('Use Staff Excerpt or Content?', 'pinnacle'),
		'id'   => $prefix . 'staff_wordlimit',
		'type'    => 'select',
		'options' => array(
			'false' => __('Excerpt', 'pinnacle'),
			'true' => __('Content', 'pinnacle'),
		),
	) );
	$kt_staff_page->add_field( array(
		'name' => __('Make images and title link to single post?', 'pinnacle'),
		'id'   => $prefix . 'staff_single_link',
		'type'    => 'select',
		'options' => array(
			'true' => __('Yes', 'pinnacle'),
			'false' => __('No', 'pinnacle'),
		),		
	) );
}
