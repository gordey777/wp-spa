<?php
/**
	Page header Metaboxes
 */

add_filter( 'cmb2_admin_init', 'pinnacle_pageheader_metaboxes');
function pinnacle_pageheader_metaboxes(){
	$prefix = '_kad_';

	$kt_pageheader = new_cmb2_box( array(
		'id'         => 'page_title_metabox_options',
		'title'      => __( "Post Title and Subtitle", 'pinnacle' ),
		'object_types'      => array( 'page'), // Post type
		'priority'   => 'default',
	) );
	$kt_pageheader->add_field( array(
		'name' => __( "Subtitle", 'pinnacle' ),
		'desc' => __( "Subtitle will go below post title", 'pinnacle' ),
		'id'   => $prefix . 'subtitle',
		'type' => 'textarea_code',
	) );
	$kt_pageheader->add_field( array(
		'name'    => __("Align Text", 'pinnacle' ),
		'desc'    => '',
		'id'      => $prefix . 'pagetitle_align',
		'type'    => 'select',
		'options' => array(
			'default' => __("Default", 'pinnacle' ),
			'left' => __("Align Left", 'pinnacle' ), 
			'center' => __("Align Center", 'pinnacle' ), 
			'right' => __("Align Right", 'pinnacle' ),
		),
	) );
	$kt_pageheader->add_field( array(
	    'name' => 'Title Color',
	    'id'   => $prefix . 'pagetitle_title_color',
	    'type' => 'colorpicker',
	    'default'  => '',
	   
	) );
	$kt_pageheader->add_field( array(
	    'name' => 'Sub Title Color',
	    'id'   => $prefix . 'pagetitle_sub_color',
	    'type' => 'colorpicker',
	    'default'  => '',
	   
	) );
	$kt_pageheader->add_field( array(
	    'name' => 'Background Color',
	    'id'   => $prefix . 'pagetitle_bg_color',
	    'type' => 'colorpicker',
	    'default'  => '',
	   
	) );
	$kt_pageheader->add_field( array(
	    'name' => 'Background Image',
	    'desc' => 'Upload an image.',
	    'id' => $prefix . 'pagetitle_bg_image',
	    'type' => 'file',
	    'allow' => array( 'url') // limit to just attachments with array( 'attachment' )
	) );
	$kt_pageheader->add_field( array(
		'name'    => __("Background Image Position", 'pinnacle' ),
		'desc'    => '',
		'id'      => $prefix . 'pagetitle_bg_position',
		'type'    => 'select',
		'default' => 'center center',
		'options' => array(
			'left top' => __("Left Top", 'pinnacle' ),
			'left center' => __("Left Center", 'pinnacle' ),
			'left bottom' => __("Left Bottom", 'pinnacle' ),
			'center top' => __("Center Top", 'pinnacle' ),
			'center center' => __("Center Center", 'pinnacle' ),
			'center bottom' => __("Center Bottom", 'pinnacle' ),
			'right top' => __("Right Top", 'pinnacle' ),
			'right center' => __("Right Center", 'pinnacle' ),
			'right bottom' => __("Right Bottom", 'pinnacle' ),
		),
	) );
	$kt_pageheader->add_field( array(
	    'name' => 'Repeat Background Image',
	    'desc' => '',
	    'id' => $prefix . 'pagetitle_bg_repeat',
	    'type' => 'checkbox'
	) );
	$kt_pageheader->add_field( array(
	    'name' => 'Background Cover',
	    'desc' => '',
	    'id' => $prefix . 'pagetitle_bg_cover',
	    'type' => 'checkbox'
	) );
	$kt_pageheader->add_field( array(
	    'name' => 'Background Parallax',
	    'desc' => '',
	    'id' => $prefix . 'pagetitle_bg_parallax',
	    'type' => 'checkbox'
	) );
	$kt_pageheader->add_field( array(
		'name' => __( "Padding Top", 'pinnacle' ),
		'desc' => __( "Just enter number e.g. 25", 'pinnacle' ),
		'id'   => $prefix . 'pagetitle_ptop',
		'type' => 'kt_text_number',
	) );
	$kt_pageheader->add_field( array(
		'name' => __( "Padding Bottom", 'pinnacle' ),
		'desc' => __( "Just enter number e.g. 25", 'pinnacle' ),
		'id'   => $prefix . 'pagetitle_pbottom',
		'type' => 'kt_text_number',
	) );
	$kt_pageheader->add_field( array(
		'name' => __('Overide and use a Shortcode Slider', 'pinnacle'),
		'desc' => __('Paste slider shortcode here (example: [kadence_slider id="200"])', 'pinnacle'),
		'id'   => $prefix . 'shortcode_slider',
		'type' => 'textarea_code',
	) );
	$kt_pageheader->add_field( array(
		'name'    => __("Hide Page Title", 'pinnacle' ),
		'desc'    => '',
		'id'      => $prefix . 'pagetitle_hide',
		'type'    => 'select',
		'options' => array(
			'default' => __("Default", 'pinnacle' ),
			'show' => __("Show", 'pinnacle' ),
			'hide' => __("Hide", 'pinnacle' ),
		),
	) );
	$kt_pageheader->add_field( array(
		'name'    => __("Page Title background behind Header", 'pinnacle' ),
		'desc'    => '',
		'id'      => $prefix . 'pagetitle_behind_head',
		'type'    => 'select',
		'options' => array(
			'default' => __("Default", 'pinnacle' ),
			'true' => __("Place behind Header", 'pinnacle' ),
			'false' => __("Don't place behind Header", 'pinnacle' ),
		),
	) );
}
