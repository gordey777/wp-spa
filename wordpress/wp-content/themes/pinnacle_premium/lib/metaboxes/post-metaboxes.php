<?php
/**
	post Metaboxes
 */

add_filter( 'cmb2_admin_init', 'pinnacle_post_metaboxes');
function pinnacle_post_metaboxes(){
	$prefix = '_kad_';
	$kt_standard_post = new_cmb2_box( array(
		'id'         => 'standard_post_metabox',
		'title'      => __("Standard Post Options", 'pinnacle'),
		'object_types'      => array( 'post',), // Post type
		'priority'   => 'high',
	) );
	$kt_standard_post->add_field( array(
		'name'    => __("Post Summary", 'pinnacle' ),
		'desc'    => '',
		'id'      => $prefix . 'post_summery',
		'type'    => 'select',
		'options' => array(
			'default' 		=> __('Standard Post Default', 'pinnacle' ),
			'text' 			=> __('Text', 'pinnacle' ),
			'img_portrait' 	=> __('Portrait Image', 'pinnacle'),
			'img_landscape' => __('Landscape Image', 'pinnacle'),
		),
	) );

	// IMAGE POST //
	$kt_image_post = new_cmb2_box( array(
		'id'         => 'image_post_metabox',
		'title'      => __("Image Post Options", 'pinnacle'),
		'object_types'      => array( 'post',), // Post type
		'priority'   => 'high',
	) );
	$kt_image_post->add_field( array(
		'name'    => __("Head Content", 'pinnacle' ),
		'desc'    => '',
		'id'      => $prefix . 'image_blog_head',
		'type'    => 'select',
		'options' => array(
			'default' => __("Image Post Default", 'pinnacle' ),
			'image' => __("Image", 'pinnacle' ),
			'none' => __("None", 'pinnacle' ),
		),
	) );
	$kt_image_post->add_field( array(
		'name' => __("Max Image Width", 'pinnacle' ),
		'desc' => __("Default is: 848 or 1140 on fullwidth posts (Note: just input number, example: 650)", 'pinnacle' ),
		'id'   => $prefix . 'image_posthead_width',
		'type' => 'text_small',
	) );
	$kt_image_post->add_field( array(
		'name'    => __("Post Summary", 'pinnacle' ),
		'desc'    => '',
		'id'      => $prefix . 'image_post_summery',
		'type'    => 'select',
		'options' => array(
			'default' => __('Image Post Default', 'pinnacle' ),
			'text' => __('Text', 'pinnacle' ),
			'img_portrait' => __('Portrait Image', 'pinnacle'),
			'img_landscape' => __('Landscape Image', 'pinnacle'),
		),
	) );

	// GALLERY POST
	$kt_gallery_post = new_cmb2_box( array(
		'id'         => 'gallery_post_metabox',
		'title'      => __("Gallery Post Options", 'pinnacle'),
		'object_types'      => array( 'post',), // Post type
		'priority'   => 'high',
	) );
	$kt_gallery_post->add_field( array(
		'name'    => __("Post Head Content", 'pinnacle' ),
		'desc'    => '',
		'id'      => $prefix . 'gallery_blog_head',
		'type'    => 'select',
		'options' => array(
			'default' => __("Gallery Post Default", 'pinnacle' ),
			'flex' => __("Image Slider - (Cropped Image Ratio)", 'pinnacle' ),
			'carouselslider' => __("Image Slider - (Different Image Ratio)", 'pinnacle' ),
			'carousel' => __("Image Carousel - (Muiltiple Images Showing At Once)", 'pinnacle' ),
			'shortcode' => __("Shortcode", 'pinnacle' ),
			'none' => __("None", 'pinnacle' ),
			),
	) );
	$kt_gallery_post->add_field( array(
		'name' => __("Post Slider Gallery", 'pinnacle' ),
		'desc' => __("Add images for gallery here", 'pinnacle' ),
		'id'   => $prefix . 'image_gallery',
		'type' => 'kad_gallery',
	) );
	$kt_gallery_post->add_field( array(
		'name' => __('Gallery Post Shortcode', 'pinnacle'),
		'desc' => __('If using shortcode place here.', 'pinnacle'),
		'id'   => $prefix . 'post_gallery_shortcode',
		'type' => 'textarea_code',
	) );
	$kt_gallery_post->add_field( array(
		'name' => __("Max Slider Height", 'pinnacle' ),
		'desc' => __("Default is: 400 (Note: just input number, example: 350)", 'pinnacle' ),
		'id'   => $prefix . 'gallery_posthead_height',
		'type' => 'text_small',
	) );
	$kt_gallery_post->add_field( array(
		'name' => __("Max Slider Width", 'pinnacle' ),
		'desc' => __("Default is: 848 or 1140 on fullwidth posts (Note: just input number, example: 650, only applys to Image Slider)", 'pinnacle' ),
		'id'   => $prefix . 'gallery_posthead_width',
		'type' => 'text_small',
	) );
	$kt_gallery_post->add_field( array(
		'name'    => __("Post Summary", 'pinnacle' ),
		'desc'    => '',
		'id'      => $prefix . 'gallery_post_summery',
		'type'    => 'select',
		'options' => array(
			'default' => __('Gallery Post Default', 'pinnacle' ),
			'gallery_grid' => __('Photo Grid - (Need atleast five images)', 'pinnacle'), 
			'img_portrait' => __('Portrait Image (feature image)', 'pinnacle'),
			'img_landscape' => __('Landscape Image (feature image)', 'pinnacle'), 
			'slider_portrait' => __('Portrait Image Slider', 'pinnacle'), 
			'slider_landscape' => __('Landscape Image Slider', 'pinnacle'), 
		),
	) );
	// VIDEO POST
	$kt_video_post = new_cmb2_box( array(
		'id'         => 'video_post_metabox',
		'title'      => __("Video Post Options", 'pinnacle'),
		'object_types'      => array( 'post',), // Post type
		'priority'   => 'high',
	) );
	$kt_video_post->add_field( array(
		'name'    => __("Post Head Content", 'pinnacle' ),
		'desc'    => '',
		'id'      => $prefix . 'video_blog_head',
		'type'    => 'select',
		'options' => array(
			'default' => __("Video Post Default", 'pinnacle' ),
			'video' => __("Video", 'pinnacle' ),
			'shortcode' => __("Shortcode", 'pinnacle' ),
			'none' => __("None", 'pinnacle' ),
		),
	) );
	$kt_video_post->add_field( array(
		'name' => __('Video Post embed code', 'pinnacle'),
		'desc' => __('Place Embed Code Here, works with youtube, vimeo. (Use the featured image for screen shot)', 'pinnacle'),
		'id'   => $prefix . 'post_video',
		'type' => 'textarea_code',
	) );
	$kt_video_post->add_field( array(
		'name' => __('Video Post Shortcode', 'pinnacle'),
		'desc' => __('If using shortcode place here. (Use the featured image for screen shot)', 'pinnacle'),
		'id'   => $prefix . 'post_video_shortcode',
		'type' => 'textarea_code',
	) );
	$kt_video_post->add_field( array(
		'name' => __("Max Video Width", 'pinnacle' ),
		'desc' => __("Default is: 848 or 1140 on fullwidth posts (Note: just input number, example: 650, does not apply to carousel slider)", 'pinnacle' ),
		'id'   => $prefix . 'video_posthead_width',
		'type' => 'text_small',
	) );
	$kt_video_post->add_field( array(
		'name'    => __("Post Summary", 'pinnacle' ),
		'desc'    => '',
		'id'      => $prefix . 'video_post_summery',
		'type'    => 'select',
		'options' => array(
			'default' => __('Video Post Default', 'pinnacle' ),
			'video' => __('Video - (when possible)', 'pinnacle'), 
			'img_portrait' => __('Portrait Image (feature image)', 'pinnacle'), 
			'img_landscape' => __('Landscape Image (feature image)', 'pinnacle'), 
		),
	) );

	// NORMAL 
	$kt_post = new_cmb2_box( array(
		'id'         => 'post_metabox',
		'title'      => __("Post Options", 'pinnacle'),
		'object_types' => array( 'post',), // Post type
		'priority'   => 'high',
	));
	$kt_post->add_field( array(
		'name' => __('Display Sidebar?', 'pinnacle'),
		'desc' => __('Choose if layout is fullwidth or sidebar', 'pinnacle'),
		'id'   => $prefix . 'post_sidebar',
		'type'    => 'select',
		'options' => array(
			'default' => __('Default', 'pinnacle'),
			'yes' => __('Yes', 'pinnacle'),
			'no' => __('No', 'pinnacle'),
		),
	));
	$kt_post->add_field( array(
		'name'    => __('Choose Sidebar', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'sidebar_choice',
		'type'    => 'select',
		'options' => pinnacle_cmb_sidebar_options(),	
	));
	$kt_post->add_field( array(
		'name' => __('Author Info', 'pinnacle'),
		'desc' => __('Display an author info box?', 'pinnacle'),
		'id'   => $prefix . 'blog_author',
		'type'    => 'select',
		'options' => array(
			'default' => __('Default', 'pinnacle'),
			'no' => __('No', 'pinnacle'),
			'yes' => __('Yes', 'pinnacle'),
		),
	));
	$kt_post->add_field( array(
		'name' => __('Posts Carousel', 'pinnacle'),
		'desc' => __('Display a carousel with similar or recent posts?', 'pinnacle'),
		'id'   => $prefix . 'blog_carousel_similar',
		'type'    => 'select',
		'options' => array(
			'default' => __('Default', 'pinnacle'),
			'no' => __('No', 'pinnacle'), 
			'recent' => __('Yes - Display Recent Posts', 'pinnacle'),
			'similar' => __('Yes - Display Similar Posts', 'pinnacle'),
		),
		
	));
	$kt_post->add_field( array(
		'name' => __('Carousel Title', 'pinnacle'),
		'desc' => __('ex. Similar Posts', 'pinnacle'),
		'id'   => $prefix . 'blog_carousel_title',
		'type' => 'text_medium',
	));

}
