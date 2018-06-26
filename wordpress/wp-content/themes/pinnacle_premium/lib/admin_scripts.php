<?php

/**
 * Enqueue CSS & JS
 */
function kadence_admin_scripts($hook) {
  	//wp_enqueue_style('pinnacle_admin_styles', get_template_directory_uri() . '/assets/css/pinnacle_admin_styles.css', false, PINNACLE_VERSION);
  	if( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' && $hook != 'widgets.php' && $hook != 'toplevel_page_ktoptions') {
		return;
  	}
  	wp_enqueue_style('pinnacle_admin_styles', get_template_directory_uri() . '/assets/css/pinnacle_admin_styles.css', false, PINNACLE_VERSION);
  	wp_enqueue_style( 'wp-color-picker' );
  	if (class_exists('woocommerce')) {
		if ( version_compare( WC_VERSION, '2.7', '>' ) ) {  
			wp_register_script('select2', get_template_directory_uri() . '/assets/js/min/select2_v4-min.js', false, PINNACLE_VERSION, false);
		} else {
			wp_register_script('select2', get_template_directory_uri() . '/assets/js/min/select2-min.js', false, PINNACLE_VERSION, false);
			
		}
	} else {
		wp_register_script('select2', get_template_directory_uri() . '/assets/js/min/select2_v4-min.js', false, PINNACLE_VERSION, false);
	}
  	wp_enqueue_script('select2');
  	 wp_enqueue_media();
  	 wp_register_script('mustache-js', get_template_directory_uri() . '/assets/js/vendor/mustache.min.js');
  	wp_enqueue_script('pinnacle_admin_js', get_template_directory_uri() . '/assets/js/pinnacle_admin_scripts.js', array( 'wp-color-picker', 'jquery', 'underscore', 'backbone', 'jquery-ui-sortable', 'mustache-js'), PINNACLE_VERSION, false);

}

add_action('admin_enqueue_scripts', 'kadence_admin_scripts');

add_action( 'elementor/editor/before_enqueue_scripts', 'pinnacle_elementor_edit_scripts');
function pinnacle_elementor_edit_scripts() {
	wp_enqueue_style('pinnacle_admin_styles', get_template_directory_uri() . '/assets/css/pinnacle_admin_styles.css', false, PINNACLE_VERSION);
  	if (class_exists('woocommerce')) {
		if ( version_compare( WC_VERSION, '2.7', '>' ) ) {  
			wp_register_script('select2', get_template_directory_uri() . '/assets/js/min/select2_v4-min.js', false, PINNACLE_VERSION, false);
		} else {
			wp_register_script('select2', get_template_directory_uri() . '/assets/js/min/select2-min.js', false, PINNACLE_VERSION, false);
			
		}
	} else {
		wp_register_script('select2', get_template_directory_uri() . '/assets/js/min/select2_v4-min.js', false, PINNACLE_VERSION, false);
	}
  	wp_enqueue_script('select2');
  	wp_enqueue_media();
  	wp_enqueue_script('pinnacle_admin_js', get_template_directory_uri() . '/assets/js/pinnacle_admin_scripts.js', array( 'wp-color-picker', 'jquery' ), PINNACLE_VERSION, false);
}

function kadence_gallery_default_type_set_link( $settings ) {
    $settings['galleryDefaults']['link'] = 'file';
    return $settings;
}
add_filter( 'media_view_settings', 'kadence_gallery_default_type_set_link');

add_action('print_media_templates', 'kadence_media_gallery_extras');
function kadence_media_gallery_extras(){
?>
<script type="text/html" id="tmpl-custom-gallery-setting">
    <hr style="clear: both;">
    <h3 style="margin-top:10px;"><?php echo __('KT Extra Gallery Settings', 'pinnacle');?></h3>
    <label class="setting">
      <span><?php _e('Type', 'pinnacle'); ?></span>
      <select data-setting="type">
        <option value="default"><?php _e('Default', 'pinnacle');?></option>
        <option value="slider"><?php _e('Slider', 'pinnacle');?></option>
        <option value="carousel"><?php _e('Carousel', 'pinnacle');?></option>
        <option value="mosaic"><?php _e('Mosaic', 'pinnacle');?></option>
        <option value="grid"><?php _e('Custom Grid', 'pinnacle');?></option>
      </select>
    </label>
    <label class="setting">
      <span><?php _e('Show Captions', 'pinnacle'); ?></span>
      <select data-setting="caption">
      <option value="default"><?php _e('Default', 'pinnacle');?></option>
        <option value="false"><?php _e('False', 'pinnacle');?></option>
        <option value="true"><?php _e('True', 'pinnacle');?></option>
      </select>
    </label>
    <label class="setting">
      <span><?php _e('Masonry', 'pinnacle'); ?></span>
      <select data-setting="masonry">
        <option value="default"><?php _e('Default', 'pinnacle');?></option>
        <option value="false"><?php _e('False', 'pinnacle');?></option>
        <option value="true"><?php _e('True', 'pinnacle');?></option>
      </select>
    </label>
    <h4><?php echo __('Slider Option - Settings', 'pinnacle');?></h4>
    <label class="setting">
        <span style="min-width: 50px;"><?php _e('Width', 'pinnacle'); ?></span>
        <input type="text" value="" data-setting="width" style="float:left;">
    </label>
    <label class="setting">
        <span style="min-width: 50px;"><?php _e('Height', 'pinnacle'); ?></span>
        <input type="text" value="" data-setting="height" style="float:left;">
    </label>
    <hr style="clear: both;">
</script>

<script>

    jQuery(document).ready(function()
    {
        _.extend(wp.media.gallery.defaults, {
        type: 'default',
        caption: 'default',
        masonry: 'default',
        width: '',
        height: '',
        });

        wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend({
        template: function(view){
          return wp.media.template('gallery-settings')(view)
               + wp.media.template('custom-gallery-setting')(view);
        }
        });

    });

</script>
<?php

}