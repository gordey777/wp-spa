<?php
/**
	Testimonial Metaboxes
 */

add_filter( 'cmb2_admin_init', 'pinnacle_blog_page_metaboxes');
function pinnacle_blog_page_metaboxes(){
	$prefix = '_kad_';
	$kt_blog_page = new_cmb2_box( array(
		'id'         => 'bloglist_metabox',
		'title'      => __('Blog List Options', 'pinnacle'),
		'object_types'      => array( 'page' ), // Post type
		'show_on' => array('key' => 'page-template', 'value' => array( 'template-blog.php')),
		'priority'   => 'high',
	) );
	$kt_blog_page->add_field( array(
        'name' => __('Blog Category', 'pinnacle'),
        'desc' => __('Select all blog posts or a specific category to show', 'pinnacle'),
        'id' => $prefix .'blog_cat',
        'type' => 'kt_select_category',
   	) );
	$kt_blog_page->add_field( array(
		'name'    => __('How Many Posts Per Page', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'blog_items',
		'type'    => 'select',
		'options' => array(
			'all' 	=> __("All", 'pinnacle' ),
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
	$kt_blog_page->add_field( array(
		'name'    => __('Display Post Content as:', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'blog_summery',
		'type'    => 'select',
		'options' => array(
			'summery' => __('Summary', 'pinnacle'),
			'full' => __('Full', 'pinnacle'),
		),		
	) );
}
add_filter( 'cmb2_admin_init', 'pinnacle_bloggrid_page_metaboxes');
function pinnacle_bloggrid_page_metaboxes(){
	$prefix = '_kad_';
	$kt_bloggrid_page = new_cmb2_box( array(
		'id'         => 'bloggrid_metabox',
		'title'      => __('Blog Grid Options', 'pinnacle'),
		'object_types'      => array( 'page' ), // Post type
		'show_on' => array('key' => 'page-template', 'value' => array( 'template-blog-grid.php',  'template-blog-photogrid.php')),
		'priority'   => 'high',
	) );
	$kt_bloggrid_page->add_field( array(
        'name' => __('Blog Category', 'pinnacle'),
        'desc' => __('Select all blog posts or a specific category to show', 'pinnacle'),
        'id' => $prefix .'blog_cat',
        'type' => 'kt_select_category',
    ) );
	$kt_bloggrid_page->add_field( array(
		'name'    => __('How Many Posts Per Page', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'blog_items',
		'type'    => 'select',
		'options' => array(
			'all' 	=> __("All", 'pinnacle' ),
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
	$kt_bloggrid_page->add_field( array(
		'name'    => __('Choose Column Layout:', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'blog_columns',
		'type'    => 'select',
		'options' => array(
			'4' => __('Four Column', 'pinnacle'),
			'3' => __('Three Column', 'pinnacle'),
			'2' => __('Two Column', 'pinnacle'),
		),		
	) );
}

add_filter( 'cmb2_admin_init', 'pinnacle_blogphoto_page_metaboxes');
function pinnacle_blogphoto_page_metaboxes(){
	$prefix = '_kad_';
	$kt_blogphoto_page = new_cmb2_box( array(
		'id'         => 'bloggrid_metabox',
		'title'      => __('Blog Grid Options', 'pinnacle'),
		'object_types'      => array( 'page' ), // Post type
		'show_on' => array('key' => 'page-template', 'value' => array('template-blog-photogrid.php')),
		'priority'   => 'high',
	) );
	$kt_blogphoto_page->add_field( array(
        'name' => __('Blog Category', 'pinnacle'),
        'desc' => __('Select all blog posts or a specific category to show', 'pinnacle'),
        'id' => $prefix .'blog_cat',
        'type' => 'kt_select_category',
    ) );
	$kt_blogphoto_page->add_field( array(
		'name'    => __('How Many Posts Per Page', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'blog_items',
		'type'    => 'select',
		'options' => array(
			'all' 	=> __("All", 'pinnacle' ),
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
	$kt_blogphoto_page->add_field( array(
		'name'    => __('Choose Column Layout:', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'blog_columns',
		'type'    => 'select',
		'options' => array(
			'4' => __('Four Column', 'pinnacle'),
			'3' => __('Three Column', 'pinnacle'),
			'2' => __('Two Column', 'pinnacle'),
		),
	) );
	$kt_blogphoto_page->add_field( array(
		'name'    => __('Fullwidth - Span Screen Size?', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'blog_photofullwidth',
		'type'    => 'select',
		'options' => array(
			'no' => __('No', 'pinnacle'),
			'yes' => __('Yes', 'pinnacle'),
		),
	));
} 