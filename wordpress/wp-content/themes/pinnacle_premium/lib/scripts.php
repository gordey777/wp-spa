<?php
/**
 * Enqueue scripts and stylesheets
 *
 */

function pinnacle_scripts() {
	global $pinnacle;
  	
  	wp_enqueue_style('pinnacle_theme', get_template_directory_uri() . '/assets/css/pinnacle.css', false, PINNACLE_VERSION);
   	
   	if(isset($pinnacle['skin_stylesheet']) && !empty($pinnacle['skin_stylesheet'])) {
   		$skin = $pinnacle['skin_stylesheet'];
   	} else { 
   		$skin = 'default.css';
   	} 
 	wp_enqueue_style('pinnacle_skin', get_template_directory_uri() . '/assets/css/skins/'.$skin.'', false, null);

	if (is_child_theme()) {
		$child_theme = wp_get_theme();
    	$child_version = $child_theme->get( 'Version' );
   		wp_enqueue_style('pinnacle_child', get_stylesheet_uri(), false, $child_version);
  	} 
  	if (is_single() && comments_open() && get_option('thread_comments')) {
    	wp_enqueue_script('comment-reply');
  	}
  	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/min/bootstrap-min.js', array( 'jquery'), PINNACLE_VERSION, true);
  	wp_enqueue_script('pinnacle_plugins', get_template_directory_uri() . '/assets/js/min/kt_plugins.min.js', array( 'jquery'), PINNACLE_VERSION, true);
   	wp_enqueue_script('select2', get_template_directory_uri() . '/assets/js/min/select2_v4-min.js', array( 'jquery'), PINNACLE_VERSION, true);
  	
  	if(isset($pinnacle["smooth_scrolling"]) && $pinnacle["smooth_scrolling"] == '1') { 
     	wp_enqueue_script('pinnacle_smoothscroll', get_template_directory_uri() . '/assets/js/min/nicescroll-min.js', array( 'jquery'), '1.8.5', true);
  	} else if(isset($pinnacle["smooth_scrolling"]) && $pinnacle["smooth_scrolling"] == '2') { 
    	wp_enqueue_script('pinnacle_smoothscroll', get_template_directory_uri() . '/assets/js/min/smoothscroll-min.js', array( 'jquery'), null, true);
  	}
  	wp_enqueue_script('pinnacle_main', get_template_directory_uri() . '/assets/js/kt_main.js', array( 'jquery'), PINNACLE_VERSION, true);

  	if((isset($pinnacle['infinitescroll']) && $pinnacle['infinitescroll'] == 1) || (isset($pinnacle['blog_infinitescroll']) && $pinnacle['blog_infinitescroll'] == 1) || (isset($pinnacle['blog_cat_infinitescroll']) && $pinnacle['blog_cat_infinitescroll'] == 1)) {
    	wp_enqueue_script('infinite_scroll', get_template_directory_uri() . '/assets/js/min/jquery.infinitescroll.min.js', false, PINNACLE_VERSION, true);
  	}

  	if(class_exists('woocommerce')) {
    	if(isset($pinnacle['product_radio']) && $pinnacle['product_radio'] == 1) {
      		wp_enqueue_script( 'kt-wc-add-to-cart-variation-radio', get_template_directory_uri() . '/assets/js/min/kt-add-to-cart-variation-radio-min.js' , array( 'jquery' ), PINNACLE_VERSION, true );
    	} else {
      		wp_enqueue_script( 'kt-wc-add-to-cart-variation', get_template_directory_uri() . '/assets/js/min/kt-add-to-cart-variation-min.js' , array( 'jquery' ), PINNACLE_VERSION, true );
    	}
  		if(isset($pinnacle['product_quantity_input']) && $pinnacle['product_quantity_input'] == 1) {
        	wp_enqueue_script( 'wcqi-js', get_template_directory_uri() . '/assets/js/min/wc-quantity-increment.min.js' , array( 'jquery' ), PINNACLE_VERSION, true );
  		}
  	}

}
add_action('wp_enqueue_scripts', 'pinnacle_scripts', 100);


/**
 * Add Respond.js for IE8 support of media queries
 */
function pinnacle_ie_support_header() {
    echo '<!--[if lt IE 9]>'. "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/assets/js/vendor/respond.min.js' ) . '"></script>'. "\n";
    echo '<![endif]-->'. "\n";
}
add_action( 'wp_head', 'pinnacle_ie_support_header', 15 );

add_action('pinnacle_after_body_open', 'pinnacle_wp_after_body_script_output');
function pinnacle_wp_after_body_script_output() {
    global $pinnacle;
    if(isset($pinnacle['kt_after_body_open_script']) && !empty($pinnacle['kt_after_body_open_script']) ){
        echo $pinnacle['kt_after_body_open_script'];
    }
}

function kadence_google_analytics() { 
  global $pinnacle; 
  if(isset($pinnacle['google_analytics']) && !empty($pinnacle['google_analytics'])) { ?>
    <!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', '<?php echo $pinnacle['google_analytics']; ?>', 'auto');
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->
  <?php
  }
}
add_action('wp_head', 'kadence_google_analytics', 20);