<?php
/**
	Product Video Metaboxes
 */

add_filter( 'cmb2_admin_init', 'pinnacle_product_metaboxes');
function pinnacle_product_metaboxes(){
	$prefix = '_kad_';
	$kt_product_post = new_cmb2_box( array(
		'id'         => 'product_post_side_metabox',
		'title'      => __('Product Sidebar Options', 'pinnacle'),
		'object_types'      => array( 'product' ), // Post type
		'priority'   => 'default',
	) );
	$kt_product_post->add_field( array(
		'name' => __('Display Sidebar?', 'pinnacle'),
		'desc' => __('Choose if layout is fullwidth or sidebar', 'pinnacle'),
		'id'   => $prefix . 'post_sidebar',
		'type'    => 'select',
		'options' => array(
			'default' => __('Default', 'pinnacle'),
			'no' => __('No', 'pinnacle'),
			'yes' => __('Yes', 'pinnacle'),
		),
	) );
	$kt_product_post->add_field( array(
		'name'    => __('Choose Sidebar', 'pinnacle'),
		'desc'    => '',
		'id'      => $prefix . 'sidebar_choice',
		'type'    => 'select',
		'options' => pinnacle_cmb_product_sidebar_options(),
	) );
}
add_filter( 'cmb2_admin_init', 'pinnacle_productvideo_metaboxes');
function pinnacle_productvideo_metaboxes(){
	$prefix = '_kad_';
	$kt_productvideo_post = new_cmb2_box( array(
		'id'         => 'product_post_metabox',
		'title'      => __('Product Video Tab', 'pinnacle'),
		'object_types'      => array( 'product' ), // Post type
		'priority'   => 'default',
	) );
	$kt_productvideo_post->add_field( array(
		'name' => __('Product Video', 'pinnacle'),
		'desc' => __('Place Embed Code Here, works with youtube, vimeo...', 'pinnacle'),
		'id'   => $prefix . 'product_video',
		'type' => 'textarea_code',
	) );
} 
add_filter( 'cmb2_admin_init', 'pinnacle_product_tab_metaboxes');
function pinnacle_product_tab_metaboxes(){
	$prefix = '_kad_';
	global $pinnacle;

	if(isset($pinnacle['custom_tab_01']) && $pinnacle['custom_tab_01'] == '1') {
		$kt_custom_tab_01 = new_cmb2_box( array(
			'id'         	=> 'kad_custom_tab_01',
			'title'      	=> __("Custom Tab 01", 'pinnacle'),
			'object_types'  => array('product'),
			'priority'   	=> 'default',
		) );
		$kt_custom_tab_01->add_field( array(
			'name' => __( "Tab Title", 'pinnacle' ),
			'desc' => __( "This will show on the tab", 'pinnacle' ),
			'id'   => $prefix . 'tab_title_01',
			'type' => 'text',
		) );
		$kt_custom_tab_01->add_field( array(
			'name'    => __("Tab Content", 'pinnacle' ),
			'desc'    =>  __( "Add Tab Content", 'pinnacle' ),
			'id'      => $prefix . 'tab_content_01',
			'type'    => 'wysiwyg',
		) );
		$kt_custom_tab_01->add_field( array(
			'name' => __( "Tab priority", 'pinnacle' ),
			'desc' => __( "This will determine where the tab is shown (e.g. 20)", 'pinnacle' ),
			'id'   => $prefix . 'tab_priority_01',
			'type' => 'text',
		) );
	}
	if(isset($pinnacle['custom_tab_02']) && $pinnacle['custom_tab_02'] == '1') {
		$kt_custom_tab_02 = new_cmb2_box( array(
			'id'         	=> 'kad_custom_tab_02',
			'title'      	=> __("Custom Tab 02", 'pinnacle'),
			'object_types'  => array('product'),
			'priority'   	=> 'default',
		) );
		$kt_custom_tab_02->add_field( array(
			'name' => __( "Tab Title", 'pinnacle' ),
			'desc' => __( "This will show on the tab", 'pinnacle' ),
			'id'   => $prefix . 'tab_title_02',
			'type' => 'text',
		) );
		$kt_custom_tab_02->add_field( array(
			'name'    => __("Tab Content", 'pinnacle' ),
			'desc'    =>  __( "Add Tab Content", 'pinnacle' ),
			'id'      => $prefix . 'tab_content_02',
			'type'    => 'wysiwyg',
		) );
		$kt_custom_tab_02->add_field( array(
			'name' => __( "Tab priority", 'pinnacle' ),
			'desc' => __( "This will determine where the tab is shown (e.g. 20)", 'pinnacle' ),
			'id'   => $prefix . 'tab_priority_02',
			'type' => 'text',
		) );
	}
	if(isset($pinnacle['custom_tab_03']) && $pinnacle['custom_tab_03'] == '1') {
		$kt_custom_tab_03 = new_cmb2_box( array(
			'id'         	=> 'kad_custom_tab_03',
			'title'      	=> __("Custom Tab 03", 'pinnacle'),
			'object_types'  => array('product'),
			'priority'   	=> 'default',
		) );
		$kt_custom_tab_03->add_field( array(
			'name' => __( "Tab Title", 'pinnacle' ),
			'desc' => __( "This will show on the tab", 'pinnacle' ),
			'id'   => $prefix . 'tab_title_03',
			'type' => 'text',
		) );
		$kt_custom_tab_03->add_field( array(
			'name'    => __("Tab Content", 'pinnacle' ),
			'desc'    =>  __( "Add Tab Content", 'pinnacle' ),
			'id'      => $prefix . 'tab_content_03',
			'type'    => 'wysiwyg',
		) );
		$kt_custom_tab_03->add_field( array(
			'name' => __( "Tab priority", 'pinnacle' ),
			'desc' => __( "This will determine where the tab is shown (e.g. 20)", 'pinnacle' ),
			'id'   => $prefix . 'tab_priority_03',
			'type' => 'text',
		) );
	}
}