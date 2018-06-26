<?php 
/**
 * Pinnacle Gallery Shortcode
 */
function kadence_gallery($attr) {
  $post = get_post();
  static $instance = 0;
  $instance++;

  if (!empty($attr['ids'])) {
    if (empty($attr['orderby'])) {
      $attr['orderby'] = 'post__in';
    }
    $attr['include'] = $attr['ids'];
  }

  $output = apply_filters('post_gallery', '', $attr);

  if ($output != '') {
    return $output;
  }

  if (isset($attr['orderby'])) {
    $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
    if (!$attr['orderby']) {
      unset($attr['orderby']);
    }
  }
  if(!isset($post)) {
    $post_id = null;
  } else {
    $post_id = $post->ID;
  }
  extract(shortcode_atts(array(
    'order'             => 'ASC',
    'orderby'           => 'menu_order ID',
    'id'                => $post_id,
    'itemtag'           => '',
    'icontag'           => '',
    'captiontag'        => '',
    'masonry'           => '',
    'fullscreen'        => false,
    'speed'             => '9000',
    'transpeed'         => '700',
    'height'            => '400',
    'width'             => '1140',
    'arrows'   			=> 'true',
	'thumbs'   			=> 'false',
	'fade'				=> 'true',
    'imgwidth'          => '',
    'imgheight'         => '',
    'caption'           => '',
    'type'              => '',
    'sidebar'           => '',
    'link'              => 'file',
    'attachment_page'   => 'false',
    'gallery_id'        => (rand(10,100)),
    'autoplay'          => 'true',
    'lightboxsize'      => 'full',
    'portraitstring'    => '3,4,7,8,11,12,15,16',
    'columns'           => 3,
    'size'              => 'full',
    'use_image_alt'     => 'false',
    'isostyle'          => 'masonry',
    'scroll'            => '1',
    'include'           => '',
    'exclude'           => ''
  ), $attr));

  $id = intval($id);

  if ($order === 'RAND') {
    $orderby = 'none';
  }

  if (!empty($include)) {
    $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

    $attachments = array();
    foreach ($_attachments as $key => $val) {
      $attachments[$val->ID] = $_attachments[$key];
    }
  } elseif (!empty($exclude)) {
    $attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
  } else {
    $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
  }

  if (empty($attachments)) {
    return '';
  }
  if (empty($caption) || $caption == 'default') {
    global $pinnacle;
    if(isset($pinnacle['gallery_captions']) && $pinnacle['gallery_captions'] == 1)  {
      $caption = 'true';
    } else {
      $caption = 'false';
    }
  }

  if (is_feed()) {
    $output = "\n";
    foreach ($attachments as $att_id => $attachment) {
      $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
    }
    return $output;
  }

  	// CAROUSEL GALLERY
  	if (isset($type) && $type == 'carousel') {
      	if(empty($scroll) || $scroll == 1) {
	  		$scroll = '1';
	  	} else {
	  		$scroll = 'all';
	  	}
      	if ($columns == '2') {
	        $itemsize = 'tcol-lg-6 tcol-md-6 tcol-sm-6 tcol-xs-12 tcol-ss-12'; 
	        $imgsize = 560; 
	        $cc = pinnacle_carousel_columns('2');
      	} else if ($columns == '1') {
	        $itemsize = 'tcol-lg-12 tcol-md-12 tcol-sm-12 tcol-xs-12 tcol-ss-12'; 
	        $imgsize = 560; 
	        $cc = pinnacle_carousel_columns('1');
      	} else if ($columns == '3'){ 
	        $itemsize = 'tcol-lg-4 tcol-md-4 tcol-sm-4 tcol-xs-6 tcol-ss-12'; 
	        $imgsize = 400; 
	        $cc = pinnacle_carousel_columns('3');
      	} else if ($columns == '6'){
	        $itemsize = 'tcol-lg-2 tcol-md-2 tcol-sm-3 tcol-xs-4 tcol-ss-6'; 
	        $imgsize = 240; 
	        $cc = pinnacle_carousel_columns('6');
	    } else if ($columns == '8' || $columns == '9' || $columns == '7'){
	        $itemsize = 'tcol-lg-2 tcol-md-2 tcol-sm-3 tcol-xs-4 tcol-ss-4'; 
	        $imgsize = 240; 
	        $cc = pinnacle_carousel_columns('6');
	    } else if ($columns == '12' || $columns == '11'){
	        $itemsize = 'tcol-lg-1 tcol-md-1 tcol-sm-2 tcol-xs-2 tcol-ss-3'; 
	        $imgsize = 240; 
	        $cc = pinnacle_carousel_columns('6');
	    } else if ($columns == '5'){
	        $itemsize = 'tcol-lg-25 tcol-md-25 tcol-sm-3 tcol-xs-4 tcol-ss-6'; 
	        $imgsize = 240;
	        $cc = pinnacle_carousel_columns('5');
	    } else {
	        $itemsize = 'tcol-lg-3 tcol-md-3 tcol-sm-4 tcol-xs-4 tcol-ss-12'; 
	        $imgsize = 300; 
	        $cc = pinnacle_carousel_columns('4');
	    }
	    $cc = apply_filters('pinnacle_gallery_carousel_columns', $cc);
      	if(!empty($imgheight)) {
      		$imgheightsize = $imgheight;
      	} else {
      		$imgheightsize = $imgsize;
      	}
     	if(!empty($imgwidth)) {
     		$imgsize = $imgwidth;
     	} else {
     		$imgsize = $imgsize;
     	}
        ob_start(); 
        ?>
          <div class="carousel_outerrim kad-animation" data-animation="fade-in" data-delay="0">
              	<div id="gallery-carousel-<?php echo esc_attr($gallery_id); ?>" class="rowtight">
                	<div id="carousel-<?php echo esc_attr($gallery_id); ?>"  class="slick-slider kt-slickslider kad-light-wp-gallery kt-image-carousel loading clearfix" data-slider-fade="false" data-slider-type="content-carousel" data-slider-anim-speed="400" data-slider-arrows="<?php echo esc_attr($arrows);?>" data-slider-scroll="<?php echo esc_attr($scroll);?>" data-slider-auto=<?php echo esc_attr($autoplay);?>" data-slider-speed="<?php echo esc_attr($speed);?>" data-slider-xxl="<?php echo esc_attr($cc['xxl']);?>" data-slider-xl="<?php echo esc_attr($cc['xl']);?>" data-slider-md="<?php echo esc_attr($cc['md']);?>" data-slider-sm="<?php echo esc_attr($cc['sm']);?>" data-slider-xs="<?php echo esc_attr($cc['xs']);?>" data-slider-ss="<?php echo esc_attr($cc['ss']);?>">
               		 <?php  
                 	$gid = 0; 
                  	foreach ($attachments as $id => $attachment) {
                  		$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
				        if(empty($alt)) {
				        	$alt = $attachment->post_excerpt;
				        }
                        $img = pinnacle_get_image_array($imgsize, $imgheightsize, true, null, $alt, $id, false);
		                // Check for lazy load
					    if( kad_lazy_load_filter() ) {
					      	$image_src_output = 'src="data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs=" data-lazy-src="'.esc_url($img['src']).'" '; 
					    } else {
					      	$image_src_output = 'src="'.esc_url($img['src']).'"'; 
					    }
					    if($lightboxsize != 'full') {
					      	$attachment_lb = wp_get_attachment_image_src( $id, $lightboxsize);
					      	$img['full'] = $attachment_lb[0];
					    }
                    	$lightbox_data = 'data-rel="lightbox"';
	                    if($link == 'attachment_page' || $attachment_page == 'true') {
	                        $attachment_url = get_permalink($id);
	                        $lightbox_data = '';
	                    }
	                    $paddingbtn = ($img['height']/$img['width']) * 100;
	                    echo '<div class="'.esc_attr($itemsize).' g_item">';
	                  	echo '<div class="carousel_item grid_item gallery_item">';
	                  	if($link != 'none') { 
	                    	echo '<a href="'.esc_url($img['full']).'" '.$lightbox_data.' class="gallery-link">';
	                  	}
	                  		echo  '<div class="kt-intrinsic" style="padding-bottom:'.esc_attr($paddingbtn).'%;" itemprop="image" itemscope itemtype="http://schema.org/ImageObject">';
				    			echo  '<img '.$image_src_output.' width="'.esc_attr($img['width']).'" height="'.esc_attr($img['height']).'" alt="'.esc_attr($img['alt']).'" data-caption="'.esc_attr(wptexturize($attachment->post_excerpt)).'" itemprop="contentUrl" '.$img['srcset'].' class="kt-gallery-img"/>';
				    			echo '<meta itemprop="url" content="'.esc_url($img['src']).'">';
					            echo '<meta itemprop="width" content="'.esc_attr($img['width']).'">';
					            echo '<meta itemprop="height" content="'.esc_attr($img['height']).'>">';
				    		echo  '</div>';

                            if (trim($attachment->post_excerpt) && $caption == 'true') { 
                              	echo '<div class="caption kad_caption">';
                                	echo '<div class="kad_caption_inner">';
                                		echo wptexturize($attachment->post_excerpt);
                                	echo '</div>';
                              	echo '</div>';
                            } 
                        if($link != 'none') { 
	                    	echo '</a>';
	                  	}
	                  	echo '</div>';
	                  	echo '</div>';

	                  	$gid ++; 
              		} ?>

             		</div>
            	</div>
            <div class="clearfix"></div>
        </div>  
    <?php $output = ob_get_contents();
    ob_end_clean();
	} elseif (isset($type) && $type == 'imagecarousel') { 
		if(empty($height)) {$height = '400';}
    	if($link == 'attachment_page') {
	      	$link = 'attachment';
	    } else {
	    	$link = 'image';
	    }
	    $type = 'carousel';
        $images = array();
        foreach ($attachments as $id => $attachment) {
        		$images[] = $id;
        }
        $images = implode(",", $images);
  		ob_start(); 
			pinnacle_build_slider($gallery_id, $images, null, $height, $link, $class .' kt-image-carousel kt-image-carousel-center-fade kad-wp-gallery', $type, $caption, $autoplay, $speed, $arrows, 'false', $transpeed);
		$output = ob_get_contents();
    	ob_end_clean();
  	} elseif (isset($type) && $type == 'slider') {
  		// Slider 
        if($link == 'attachment_page') {
	      	$link = 'attachment';
	    } else {
	    	$link = 'image';
	    }
	    if($thumbs == 'true') {
	      	$type = 'thumb';
	    } else {
	    	$type = 'slider';
	    }
        $images = array();
        foreach ($attachments as $id => $attachment) {
        		$images[] = $id;
        }
        $images = implode(",", $images);
        ob_start(); 

            	pinnacle_build_slider($gallery_id, $images, $width, $height, $link, 'kt-slider-same-image-ratio kad-wp-gallery', $type, $caption, $autoplay, $speed, $arrows, $fade, $transpeed);

 		$output = ob_get_contents();
    	ob_end_clean();

  } else if(isset($type) && $type == 'grid') {
        global $pinnacle; 
        if(isset($pinnacle['pinnacle_animate_in']) && $pinnacle['pinnacle_animate_in'] == 1) {
            $animate = 1;
        } else {
            $animate = 0;
        }

        $output .= '<div id="kad-wp-gallery'.esc_attr($gallery_id).'" class="kad-wp-gallery kad-light-wp-gallery init-isotope-varwidth clearfix rowtight" data-fade-in="'.esc_attr($animate).'">';
        
        if(isset($sidebar) && $sidebar == 'yes'){ 
            $imgsize = 840; $himgsize = 560; $simgsize = 440; $shimgsize = 660;
        } else {
            $imgsize = 1140; $himgsize = 760; $simgsize = 560; $shimgsize = 840;
        }
        $n = 1;

        foreach ($attachments as $id => $attachment) {
            $attachment_src = wp_get_attachment_image_src($id, 'full');
            $attachment_url = $attachment_src[0];
            if(in_array($n, explode(',', $portraitstring))){
                $image = aq_resize($attachment_url, $simgsize, $shimgsize, true, false, false, $id);
                $itemsize = 'tcol-lg-6 tcol-md-6 tcol-sm-6 tcol-xs-12 tcol-ss-12';
            } else {
                $image = aq_resize($attachment_url, $imgsize, $himgsize, true, false, false, $id);
                $itemsize = 'tcol-lg-12 tcol-md-12 tcol-sm-12 tcol-xs-12 tcol-ss-12';
            }
            if(empty($image[0])) {$image = array($attachment_url,$attachment_src[1],$attachment_src[2]);}
            $img_srcset_output = kt_get_srcset_output( $image[1], $image[2], $attachment_url, $id);
            if($lightboxsize != 'full') {
                $attachment_url = wp_get_attachment_image_src( $id, $lightboxsize);
                $attachment_url = $attachment_url[0];
            }
            $lightbox_data = 'data-rel="lightbox"';
            if($link == 'attachment_page' || $attachment_page == 'true') {
                $attachment_url = get_permalink($id);
                $lightbox_data = '';
            }
            $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
	        if(empty($alt)) {
	        	$alt = $attachment->post_excerpt;
	        }
                $output .= '<div class="'.esc_attr($itemsize).' g_item">';
                $output .= '<div class="grid_item kt_item_fade_in kad_gallery_fade_in gallery_item">';
                $output .= '<a href="'.esc_url($attachment_url).'" '.$lightbox_data.' class="lightboxhover">';
                $output .= '<img src="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_attr($alt).'" data-caption="'.esc_attr(wptexturize($attachment->post_excerpt)).'" '.$img_srcset_output.' class="light-dropshaddow"/>';
                    if (trim($attachment->post_excerpt) && $caption == 'true') {
                        $output .= '<div class="caption kad_caption"><div class="kad_caption_inner">' . wptexturize($attachment->post_excerpt) . '</div></div>';
                    }
                $output .= '</a>';
                $output .= '</div></div>';
            $n ++;
        }
        $output .= '</div>';

  } else if(isset($type) && $type == 'mosaic') {

    // MOSIAC
    global $pinnacle; 
    if(isset($pinnacle['pinnacle_animate_in']) && $pinnacle['pinnacle_animate_in'] == 1) {
        $animate = 1;
    } else {
        $animate = 0;
    }
    $output .= '<div class="kad-mosaic-gallery-wrapper">';
    $output .= '<div id="kad-wp-gallery'.esc_attr($gallery_id).'" class="kad-wp-gallery init-mosaic-isotope kad-light-mosaic-gallery clearfix" data-fade-in="'.esc_attr($animate).'" data-iso-selector=".g_item" data-iso-style="packery" data-iso-filter="false">';
    if ($columns == '3') {
        $itemsize_normal = 'tcol-lg-4 tcol-md-4 tcol-sm-4 tcol-xs-6 tcol-ss-12 mosiac_item_normal'; $ximgsize_normal = 400;$yimgsize_normal = 400;
        $itemsize_wide = 'tcol-lg-8 tcol-md-8 tcol-sm-8 tcol-xs-12 tcol-ss-12 mosiac_item_wide'; $ximgsize_wide = 800;$yimgsize_wide = 400; $wide_string = '0,8,16,22,30';
        $itemsize_tall = 'tcol-lg-4 tcol-md-4 tcol-sm-4 tcol-xs-6 tcol-ss-12 mosiac_item_tall'; $ximgsize_tall = 400;$yimgsize_tall = 800; $tall_string = '5,12,14,27';
        $itemsize_large = 'tcol-lg-8 tcol-md-8 tcol-sm-8 tcol-xs-12 tcol-ss-12 mosiac_item_large'; $ximgsize_large = 800;$yimgsize_large = 800; $large_string = '3,9,19,24';
    } else {
        $itemsize_normal = 'tcol-lg-3 tcol-md-3 tcol-sm-3 tcol-xs-6 tcol-ss-12 mosiac_item_normal'; $ximgsize_normal = 300;$yimgsize_normal = 300;
        $itemsize_wide = 'tcol-lg-6 tcol-md-6 tcol-sm-6 tcol-xs-12 tcol-ss-12 mosiac_item_wide'; $ximgsize_wide = 600;$yimgsize_wide = 300; $wide_string = '0,9,16,21,30';
        $itemsize_tall = 'tcol-lg-3 tcol-md-3 tcol-sm-3 tcol-xs-6 tcol-ss-12 mosiac_item_tall'; $ximgsize_tall = 300;$yimgsize_tall = 600; $tall_string = '4,12,18,25';
        $itemsize_large = 'tcol-lg-6 tcol-md-6 tcol-sm-6 tcol-xs-12 tcol-ss-12 mosiac_item_large'; $ximgsize_large = 600;$yimgsize_large = 600; $large_string = '1,10,17,22';
    }

    $i = 0;
    foreach ($attachments as $id => $attachment) {
        if($i == 31){$i = 0;}
        if(in_array($i, explode(',', $wide_string))){
            $mosaic_xsize = $ximgsize_wide;
            $mosaic_ysize = $yimgsize_wide;
            $mosaic_itemsize = $itemsize_wide;
        } else if(in_array($i, explode(',', $large_string))){
            $mosaic_xsize = $ximgsize_large;
            $mosaic_ysize = $yimgsize_large;
            $mosaic_itemsize = $itemsize_large;
        } elseif(in_array($i, explode(',', $tall_string))){
            $mosaic_xsize = $ximgsize_tall;
            $mosaic_ysize = $yimgsize_tall;
            $mosaic_itemsize = $itemsize_tall;
        } else {
            $mosaic_xsize = $ximgsize_normal;
            $mosaic_ysize = $yimgsize_normal;
            $mosaic_itemsize = $itemsize_normal;
        }
        $attachment_src = wp_get_attachment_image_src($id, 'full');
        $attachment_url = $attachment_src[0];
        $image = aq_resize($attachment_url, $mosaic_xsize, $mosaic_ysize, true, false, false, $id);
        if(empty($image[0])) {$image = array($attachment_url,$mosaic_xsize,$mosaic_ysize);}

        $img_srcset_output = kt_get_srcset_output( $image[1], $image[2], $attachment_url, $id);
        if($lightboxsize != 'full') {
            $attachment_url = wp_get_attachment_image_src( $id, $lightboxsize);
            $attachment_url = $attachment_url[0];
        }
        $lightbox_data = 'data-rel="lightbox"';
        if($link == 'attachment_page' || $attachment_page == 'true') {
            $attachment_url = get_permalink($id);
            $lightbox_data = '';
        }
        $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
        if(empty($alt)) {
        	$alt = $attachment->post_excerpt;
        }

        $output .= '<div class="'.$mosaic_itemsize.' g_item"><div class="grid_item kt_item_fade_in kad_gallery_fade_in gallery_item g_mosiac_item">';
        $output .= '<img src="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_attr($alt).'" data-caption="'.esc_attr(wptexturize($attachment->post_excerpt)).'" '.$img_srcset_output.' class="light-dropshaddow"/>';
        $output .= '<a href="'.$attachment_url.'" '.$lightbox_data.' class="lightboxhover">';
            if (trim($attachment->post_excerpt) && $caption == 'true') {
                $output .= '<div class="caption kad_caption"><div class="kad_caption_inner">' . wptexturize($attachment->post_excerpt) . '</div></div>';
            }
        $output .= '</a>';
        $output .= '</div></div>';
        $i ++;
    }
    $output .= '</div>';
    $output .= '</div>';


    } else {
        // NORMAL
        global $pinnacle; 
        if(isset($pinnacle['pinnacle_animate_in']) && $pinnacle['pinnacle_animate_in'] == 1) {
            $animate = 1;
        } else {
            $animate = 0;
        }
        $output .= '<div id="kad-wp-gallery'.esc_attr($gallery_id).'" class="kad-wp-gallery init-isotope-intrinsic reinit-isotope kad-light-wp-gallery clearfix rowtight" data-fade-in="'.esc_attr($animate).'" data-iso-style="'.esc_attr($isostyle).'" data-iso-selector=".g_item" data-iso-filter="false">';
        if($fullscreen == 'true') {
            if ($columns == '2') {$itemsize = 'tcol-sxl-3 tcol-xl-4 tcol-lg-6 tcol-md-6 tcol-sm-6 tcol-xs-12 tcol-ss-12'; $imgsize = 700;} 
            else if ($columns == '1') {$itemsize = 'tcol-sxl-12 tcol-xl-12 tcol-lg-12 tcol-md-12 tcol-sm-12 tcol-xs-12 tcol-ss-12'; $imgsize = 1200;} 
            else if ($columns == '3'){ $itemsize = 'tcol-sxl-25 tcol-xl-3 tcol-lg-4 tcol-md-4 tcol-sm-4 tcol-xs-6 tcol-ss-12'; $imgsize = 460;} 
            else if ($columns == '6'){ $itemsize = 'tcol-sxl-2 tcol-xl-2 tcol-lg-2 tcol-md-2 tcol-sm-3 tcol-xs-4 tcol-ss-6'; $imgsize = 360;}
            else if ($columns == '8' || $columns == '9' || $columns == '7'){ $itemsize = 'tcol-sxl-2 tcol-xl-2 tcol-lg-2 tcol-md-2 tcol-sm-3 tcol-xs-4 tcol-ss-4'; $imgsize = 360;}
            else if ($columns == '12' || $columns == '11'){ $itemsize = 'tcol-sxl-1 tcol-xl-1 tcol-lg-1 tcol-md-1 tcol-sm-2 tcol-xs-2 tcol-ss-3'; $imgsize = 300;} 
            else if ($columns == '5'){ $itemsize = 'tcol-sxl-2 tcol-xl-2 tcol-lg-25 tcol-md-25 tcol-sm-3 tcol-xs-4 tcol-ss-6'; $imgsize = 360;} 
            else {$itemsize = 'tcol-sxl-2 tcol-xl-25 tcol-lg-3 tcol-md-3 tcol-sm-4 tcol-xs-6 tcol-ss-12'; $imgsize = 360;}
        } else { 
            if ($columns == '2') {$itemsize = 'tcol-lg-6 tcol-md-6 tcol-sm-6 tcol-xs-12 tcol-ss-12'; $imgsize = 600;} 
            else if ($columns == '1') {$itemsize = 'tcol-lg-12 tcol-md-12 tcol-sm-12 tcol-xs-12 tcol-ss-12'; $imgsize = 1200;} 
            else if ($columns == '3'){ $itemsize = 'tcol-lg-4 tcol-md-4 tcol-sm-4 tcol-xs-6 tcol-ss-12'; $imgsize = 400;} 
            else if ($columns == '6'){ $itemsize = 'tcol-lg-2 tcol-md-2 tcol-sm-3 tcol-xs-4 tcol-ss-6'; $imgsize = 300;}
            else if ($columns == '8' || $columns == '9' || $columns == '7'){ $itemsize = 'tcol-lg-2 tcol-md-2 tcol-sm-3 tcol-xs-4 tcol-ss-4'; $imgsize = 260;}
            else if ($columns == '12' || $columns == '11'){ $itemsize = 'tcol-lg-1 tcol-md-1 tcol-sm-2 tcol-xs-2 tcol-ss-3'; $imgsize = 240;} 
            else if ($columns == '5'){ $itemsize = 'tcol-lg-25 tcol-md-25 tcol-sm-3 tcol-xs-4 tcol-ss-6'; $imgsize = 300;} 
            else {$itemsize = 'tcol-lg-3 tcol-md-3 tcol-sm-4 tcol-xs-6 tcol-ss-12'; $imgsize = 300;}
        }
        if(!empty($imgwidth)) {
            $imgsize = $imgwidth;
        } else {
            $imgsize = $imgsize;
        }
        if(!empty($imgheight)) {
            $imgheightsize = $imgheight;
        } else {
            $imgheightsize = $imgsize;
        }

        $i = 0;
        foreach ($attachments as $id => $attachment) {
            $image = array();
            $attachment_src = wp_get_attachment_image_src($id, 'full');
            $attachment_url = $attachment_src[0];
            if(!empty($masonry)) {
                if($masonry == 'true'){
                    $image = aq_resize($attachment_url, $imgsize, null, false, false, false, $id);
                } else {
                    $image = aq_resize($attachment_url, $imgsize, $imgheightsize, true, false, false, $id);
                }
            } else {
                if(isset($pinnacle['pinnacle_gallery_masonry']) && $pinnacle['pinnacle_gallery_masonry'] ==  '1') {
                    $image = aq_resize($attachment_url, $imgsize, null, false, false, false, $id);
                } else {
                    $image = aq_resize($attachment_url, $imgsize, $imgheightsize, true, false, false, $id);
                }
            }
            if(empty($image[0])) {$image = array($attachment_url,$attachment_src[1],$attachment_src[2]);}
            $img_srcset_output = kt_get_srcset_output( $image[1], $image[2], $attachment_url, $id);
            if($lightboxsize != 'full') {
                $attachment_url = wp_get_attachment_image_src( $id, $lightboxsize);
                $attachment_url = $attachment_url[0];
            }
            $lightbox_data = 'data-rel="lightbox"';
            if($link == 'attachment_page' || $attachment_page == 'true') {
                $attachment_url = get_permalink($id);
                $lightbox_data = '';
            }
            $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
            if(empty($alt)) {
            	$alt = $attachment->post_excerpt;
            }
            if( kad_lazy_load_filter() ) {
                $image_src_output = 'src="data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs=" data-lazy-src="'.esc_url($image[0]).'" '; 
            } else {
                $image_src_output = 'src="'.esc_url($image[0]).'"'; 
            }
            $paddingbtn = ($image[2]/$image[1]) * 100;

            $output .= '<div class="'.esc_attr($itemsize).' g_item"><div class="grid_item kt_item_fade_in kad_gallery_fade_in gallery_item">';
            if($link != 'none') { 
               $output .= '<a href="'.esc_url($attachment_url).'" '.$lightbox_data.' class="lightboxhover">';
            }
            $output .= '<div class="kt-intrinsic" style="padding-bottom:'.$paddingbtn.'%;"><img '.$image_src_output.' width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_attr($alt).'" data-caption="'.esc_attr(wptexturize($attachment->post_excerpt)).'" '.$img_srcset_output.' class="light-dropshaddow"/></div>';
            if (trim($attachment->post_excerpt) && $caption == 'true') {
                $output .= '<div class="caption kad_caption"><div class="kad_caption_inner">' . wptexturize($attachment->post_excerpt) . '</div></div>';
            }
            if($link != 'none') { 
                $output .= '</a>';
            }
            $output .= '</div></div>';
        }
        $output .= '</div>';
    }
  
  return $output;
}
add_action('after_setup_theme', 'kadence_gallery_setup');
function kadence_gallery_setup() {
  global $pinnacle;
  if(isset($pinnacle['pinnacle_gallery']) && $pinnacle['pinnacle_gallery'] == '1')  {
    remove_shortcode('gallery');
    add_shortcode('gallery', 'kadence_gallery');
  } 
}