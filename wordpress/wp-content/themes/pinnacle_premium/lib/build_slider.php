<?php 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if(!function_exists('pinnacle_build_slider')) {
    function pinnacle_build_slider($id = 'post', $images = null, $width = null, $height = null, $link ='image', $class = null, $type = 'slider', $captions = "false", $auto = 'true', $speed = '7000', $arrows = 'true', $fade = 'true', $fade_speed = '400', $delay = '0') {
    	if(empty($images)) {
    		global $post;
            $attach_args = array('order'=> 'ASC','post_type'=> 'attachment','post_parent'=> $post->ID,'post_mime_type' => 'image','post_status'=> null,'orderby'=> 'menu_order','numberposts'=> -1);
            $attachments_posts = get_posts($attach_args);
            $images = '';
            foreach ($attachments_posts as $val) {
                $images .= $val->ID.',';
            }

        }
        if($type == 'thumb') {
            echo '<div class="thumb-slider-container" style="max-width:'.esc_attr($width).'px;">';
        }
        if(!empty($images)) :
            echo '<div id="kt_slider_'.esc_attr($id).'" class="slick-slider kad-light-wp-gallery kt-slickslider loading '.esc_attr($class).'" data-slider-speed="'.esc_attr($speed).'" data-slider-anim-speed="'.esc_attr($fade_speed).'" data-slider-fade="'.esc_attr($fade).'" data-slider-type="'.esc_attr($type).'" data-slider-center-mode="true" data-slider-auto="'.esc_attr($auto).'" data-slider-thumbid="#kt_slider_'.esc_attr($id).'-thumbs" data-slider-arrows="'.esc_attr($arrows).'" data-slider-initdelay="'.esc_attr($delay).'" data-slider-thumbs-showing="'.esc_attr(ceil($width/80)).'" style="max-width:'.esc_attr($width).'px;">';
                $attachments = array_filter( explode( ',', $images ) );
                    if ($attachments) {
                        foreach ($attachments as $attachment) {
                            $alt = get_post_meta($attachment, '_wp_attachment_image_alt', true);
                            $img = pinnacle_get_image_array($width, $height, true, null, $alt, $attachment, false);
                            $item = get_post($attachment);
                            echo '<div class="kt-slick-slide gallery_item">';
                                if($link == "post") {
                                    echo '<a href="'.esc_url(get_the_permalink()).'" class="kt-slider-image-link">';
                                } else if($link == "attachment"){
                                    echo '<a href="'.esc_url(get_permalink($attachment)).'" class="kt-slider-image-link">';
                                } else {
                                    echo '<a href="'.esc_url($img['full']).'" data-rel="lightbox" class="kt-slider-image-link">';
                                }
                                    echo '<div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">';
                                    echo '<img src="'.esc_url($img['src']).'" width="'.esc_attr($img['width']).'" height="'.esc_attr($img['height']).'" alt="'.esc_attr($img['alt']).'" data-caption="'.esc_attr( wptexturize($item->post_excerpt) ).'" itemprop="contentUrl" '.$img['srcset'].'/>';
                                    echo '<meta itemprop="url" content="'.esc_url($img['src']).'">';
                                    echo '<meta itemprop="width" content="'.esc_attr($img['width']).'px">';
                                    echo '<meta itemprop="height" content="'.esc_attr($img['height']).'px">';
                                    echo '</div>';
                                    if ($captions == 'true') {
                                    	if(trim($item->post_excerpt) ) {
							        		echo  '<div class="caption kad_caption">';
							        			echo  '<div class="kad_caption_inner">' . wptexturize($item->post_excerpt) . '</div>';
							        		echo  '</div>';
							        	}
						      		}
                                echo '</a>';
                            echo '</div>';
                        }
                    }                      
            echo '</div> <!--Image Slider-->';
            if($type == 'thumb') {
	                echo '<div id="kt_slider_'.esc_attr($id).'-thumbs" class="kt-slickslider-thumbs slick-slider">';
	                $attachments = array_filter( explode( ',', $images ) );
	                    if ($attachments) {
	                        foreach ($attachments as $attachment) {
	                            $alt = get_post_meta($attachment, '_wp_attachment_image_alt', true);
	                            $img = pinnacle_get_image_array(80, 80, true, null, $alt, $attachment, false);
	                            echo '<div class="kt-slick-thumb">';
	                                    echo '<img src="'.esc_url($img['src']).'" width="'.esc_attr($img['width']).'" height="'.esc_attr($img['height']).'" alt="'.esc_attr($img['alt']).'" itemprop="image" '.$img['srcset'].'/>';
	                                    echo '<div class="thumb-highlight"></div>';
	                            echo '</div>';
	                        }
	                    }                       
	                echo '</div> <!--Image Slider-->';
                echo '</div> <!--Image Slider-->';
            }
        endif;
    }
}
