<?php
/**
 * Template for displaying post featured image.
 */
global $post, $kt_feat_width;
$swidth = get_post_meta( $post->ID, '_kad_posthead_width', true );
$height = get_post_meta( $post->ID, '_kad_gallery_posthead_height', true );
	if (!empty($swidth)) {
		$slidewidth = $swidth;
	} else {
		$slidewidth = apply_filters('pinnacle_default_posthead_width', $kt_feat_width);
	} 
	if (!empty($height)) {
		$slideheight = $height; 
	} else {
		$slideheight = apply_filters('pinnacle_default_posthead_height', 400);
	}
	
 	echo '<div class="postfeat carousel_outerrim">';
 		echo '<div class="slick-slider kad-light-gallery kt-slickslider kt-image-carousel loading" data-slider-speed="7000" data-slider-center-mode="true" data-slider-anim-speed="400" data-slider-fade="false" data-slider-type="carousel" data-slider-auto="true" data-slider-arrows="true">';
 			$image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
            if(!empty($image_gallery)) {
                $attachments = array_filter( explode( ',', $image_gallery ) );
                if ($attachments) {
                    foreach ($attachments as $attachment) {
                        $alt = get_post_meta($attachment, '_wp_attachment_image_alt', true);
                        $img = pinnacle_get_image_array(null, $slideheight, true, null, $alt, $attachment, false);
                        if( kad_lazy_load_filter() ) {
                            $image_src_output = 'src="data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs=" data-lazy-src="'.esc_url($img['src']).'" '; 
                        } else {
                            $image_src_output = 'src="'.esc_url($img['src']).'"'; 
                        }
                        echo '<div class="kt-slick-slide">';
                            echo '<a href="'.esc_url($img['full']).'" data-rel="lightbox" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">';
                                echo '<img '.$image_src_output.' width="'.esc_attr($img['width']).'" height="'.esc_attr($img['height']).'" alt="'.esc_attr($img['alt']).'" data-caption="'.esc_attr(get_post_field('post_excerpt', $attachment)).'" itemprop="image" '.$img['srcset'].'/>';
                                echo '<meta itemprop="url" content="'.esc_url($img['full']).'">';
								echo '<meta itemprop="width" content="'.esc_attr($img['width']).'">';
								echo '<meta itemprop="height" content="'.esc_attr($img['height']).'">';
                            echo '</a>';
                        echo '</div>';
                    }
                }
            }
        echo '</div>';
 	echo '</div>';