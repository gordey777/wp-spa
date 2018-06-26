<?php
/**
	Testimonial Metaboxes
 */

add_filter( 'cmb2_admin_init', 'pinnacle_testimonial_metaboxes');
function pinnacle_testimonial_metaboxes(){
	$prefix = '_kad_';
	$kt_testimonial_post = new_cmb2_box( array(
		'id'         => 'testimonial_post_metabox',
		'title'      => __('Testimonial Options', 'pinnacle'),
		'object_types'      => array( 'testimonial' ), // Post type
		'priority'   => 'high',
	) );
	$kt_testimonial_post->add_field( array(
		'name' => __('Text Next To Name', 'pinnacle'),
		'desc' => __('ex: New York, NY', 'pinnacle'),
		'id'   => $prefix . 'testimonial_location',
		'type' => 'text',
	) );
	$kt_testimonial_post->add_field( array(
		'name'    => __('Client Title (single post only)', 'pinnacle'),
		'desc'    => __('ex: CEO of Example Inc', 'pinnacle'),
		'id'      => $prefix . 'testimonial_occupation',
		'type' => 'text',
	) );
	$kt_testimonial_post->add_field( array(
		'name'    => __('Link (single post only)', 'pinnacle'),
		'desc'    => __('ex: http://www.example.com', 'pinnacle'),
		'id'      => $prefix . 'testimonial_link',
		'type' => 'text',
	) );
} 


add_filter( 'cmb2_admin_init', 'pinnacle_testimonial_template_metaboxes');
function pinnacle_testimonial_template_metaboxes(){
	$prefix = '_kad_';
	$kt_testimonial_page = new_cmb2_box( array(
		'id'         => 'testimonial_page_metabox',
		'title'      => __('Testimonial Page Options', 'pinnacle'),
		'object_types'      => array( 'page' ), // Post type
		'show_on' => array('key' => 'page-template', 'value' => array( 'template-testimonial-grid.php' )),
		'priority'   => 'high',
	) );
	$kt_testimonial_page->add_field( array(
		'name'    => __('Columns', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'testimonial_columns',
		'type'    => 'select',
		'options' => array(
			'4' => __('Four Column', 'pinnacle'), 
			'3' => __('Three Column', 'pinnacle'), 
			'2' => __('Two Column', 'pinnacle'), 
		),
	) );
	$kt_testimonial_page->add_field( array(
		'name'    => __('Orderby', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'testimonial_orderby',
		'type'    => 'select',
		'options' => array(
			'menu_order' 	=> __("Menu Order", 'pinnacle' ),
			'date' 			=> __("Date", 'pinnacle' ),
			'title' 		=> __("Title", 'pinnacle' ),
			'rand' 			=> __("Random", 'pinnacle' ),
		),
	) );
	$kt_testimonial_page->add_field( array(
        'name' => __('Testimonial Group', 'pinnacle'),
        'desc' => '',
        'id' => $prefix .'testimonial_type',
        'type' 		=> 'kt_select_group',
		'taxonomy' 	=> 'testimonial-group',
    ) );
	$kt_testimonial_page->add_field( array(
		'name'    => __('Items per Page', 'pinnacle'),
		'desc'    => __('How many testimonial items per page', 'pinnacle'),
		'id'      => $prefix . 'testimonial_items',
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
	$kt_testimonial_page->add_field( array(
		'name' => __('Limit Testimonial Text', 'pinnacle'),
		'desc' => '',
		'id'   => $prefix . 'limit_testimonial',
		'type' => 'checkbox',
		'std'  => '0'
	) );
	$kt_testimonial_page->add_field( array(
		'name' => __('Word Count Text', 'pinnacle'),
		'desc' => __('eg: 25', 'pinnacle'),
		'id'   => $prefix . 'testimonial_word_count',
		'type' => 'text_small',
	) );
	$kt_testimonial_page->add_field( array(
		'name' => __('Add link to single post', 'pinnacle'),
		'desc' => '',
		'id'   => $prefix . 'single_testimonial_link',
		'type' => 'checkbox',
		'std'  => '0'
	) );
	$kt_testimonial_page->add_field( array(
		'name' => __('Link Text', 'pinnacle'),
		'desc' => __('eg: Read More', 'pinnacle'),
		'id'   => $prefix . 'testimonial_link_text',
		'type' => 'text_small',							
	) );
}
