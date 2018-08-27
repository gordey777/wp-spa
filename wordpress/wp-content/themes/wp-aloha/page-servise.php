<?php /* Template Name: Servise Page */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
<?php $front__id = (int)(get_option( 'page_on_front' )); ?>
<?php $post__id = get_the_ID(); ?>

    <div class="article-single certificate-page heading-decor">

          <?php if (get_field('header_image')) {
            $image = get_field('header_image');
            $style = 'style="background-image: url(' . $image['url'] .');"';
          } else {
            $style = '';
          }?>
      <div class="article-heading container" <?php echo $style; ?>>
        <div class="row">
          <div class="headind--wrap col-lg-10 offset-lg-1">
            <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>
            <h1 class="article-title"><?php the_title(); ?></h1>
          </div>
        </div>
      </div><!-- /.article-heading -->

      <div class="container">
        <div class="row">
          <article id="post-<?php the_ID(); ?>" <?php post_class('cp-second col-lg-8 offset-lg-2'); ?>>
            <div class="article--content">
              <h2 class="cp-second-headline"><?php the_field('second_title'); ?></h2>
              <div class="page-content">
                <?php the_content(); ?>
              </div>
              <div class="row">
              <?php if(get_field('duration')){ ?>
                <span class="cp-duration col-lg-4  col-sm-6"><?php the_field('duration'); ?><span><?php the_field('duration_label'); ?></span></span>
              <?php } ?>
                <span class="cp-price col-lg-4 col-sm-6"><?php the_field('price'); ?><span><?php the_field('price_label'); ?></span></span>
              </div>
            </div><!-- /.article--content -->
            <button class="btn btn-blue-half btn-cp-order" onclick="$('html, body').animate({scrollTop: $('#page_contact_form').offset().top }, 400);"><?php the_field('label_order', $front__id); ?></button>
          </article>
        </div>
      </div>


          <?php if (get_field('how_it_works_content')) { ?>
            <?php $girlsImage = get_field('how_it_works_image'); ?>
            <?php if($girlsImage){ ?>

              <style>
                .home-girls:before{
                  background-image: url(<?php echo $girlsImage['url']; ?>) !important;
                }
              </style>
            <?php } ?>
            <div class="home-girls services-img">
            <div class="container">
              <div class="row">
                <div class="home-girls--content col-lg-7 offset-lg-5">
                  <h2 class="home-girls--title"><?php the_field('how_it_works_title'); ?><span></span></h2>
                  <div class="home-girls--content_wrap page-content services-content">
                    <?php the_field('how_it_works_content'); ?>
                  </div>
                  <div class="services-content-more fa fa-chevron-down"></div>
                </div><!-- /.col-lg-7 -->
              </div>
              </div>
            </div><!-- /.home-girls container-fluid -->
          <?php } ?>

          <?php if (get_field('advantages_content')) { ?>
            <?php $giftImage = get_field('advantages_image'); ?>
            <?php if($giftImage){ ?>
              <style>
                .home-gift--img:before{
                  background-image: url(<?php echo $giftImage['url']; ?>) !important;
                }
              </style>
            <?php } ?>
            <div class="home-gift home-gift--img dots-decor-left">
              <div class="container home-gift--img">
                <div class="row">
                  <div class="home-gift--content col-lg-8">
                    <h2 class="home-gift--title"><?php the_field('advantages_title'); ?><span></span></h2>
                    <div class="page-content services-content">
                      <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
						<?php the_field('advantages_content'); ?>
                    </div>
                    <div class="services-content-more fa fa-chevron-down"></div>
                  </div><!-- home-gift--content  -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div><!-- /.home-gift row -->
          <?php } ?>
          <div id="page_contact_form" class="container">
            <div class="row">
              <?php //$page_form = get_field('page_contact_form');?>
              <?php $page_form = get_field('services_contacts_form', $front__id);?>
              <?php if($page_form){ ?>
                <div class="order-form col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 order-decor">
                  <?php echo do_shortcode($page_form); ?>
                </div>
              <?php }?>

            </div>
          </div>

          <?php if (!(get_field('recomend_services_triger'))){
            $servID = $post->post_parent;

            $itemArgs = array(
                'post_type'    => 'any',
                'numberposts' => -1,
                'orderby'     => 'name',
                'order'       => 'ASC',
                //'child_of'     => $servID,
                'post__not_in'       => array($post__id),
                'post_parent'       => $servID,
                'post_status'  => 'publish',
                //'meta_key' => '_wp_page_template',
                //'meta_value' => 'page-service.php',
                //'ignore_sticky_posts'=> 1,
            );

            $servises = new WP_Query( $itemArgs );
            if($servises->have_posts() ) :
            ?>
              <div class="slider--wrap">
                <div class="massages--list recent-servises--slider owl-carousel container">
                    <?php
                    while ( $servises->have_posts() ) { ?>
                      <?php
                      $servises->the_post();
                      if ( has_post_thumbnail() ) {
                        $item_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                      } else {
                        $item_image = catchFirstImage();
                      }
                      ?>
                  <div class="massage--wrap">
                    <div id="post-<?php the_ID(); ?>" class="massage--item ratio" data-hkoef=".9" style="background-image: url(<?php echo $item_image ?>);">
                      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="massage--link"></a>
                      <span class="massage--price"><?php the_field('price'); ?></span>
                      <div class="massage--content">
                        <span class="massage--title"><?php the_title(); ?></span>

                        <span class="massage--duration"><?php the_field('duration_label'); ?> - <?php the_field('duration'); ?></span>
                      </div>
                      <button class="btn btn-blue-half ajax-order" data-toggle="modal" data-target="#contactFormModal" data-formcode='<?php the_field('services_modal_form', $front__id); ?>' data-formtarg="<?php the_title(); ?>"><?php the_field('label_order', $front__id); ?><span></span></button>
                    </div><!-- /.massage--item -->

                  </div><!-- /.massage--wrap -->
                    <?php
                    }
                    wp_reset_postdata();
                    ?>

                </div><!-- /.massages--list  -->
              </div>
            <?php endif;
          } else {
            $post_objects = get_field('recomend_services');

            if( $post_objects ):
            ?>
            <div class="slider--wrap">
              <div class="massages--list recent-servises--slider owl-carousel container">
                  <?php
                  foreach( $post_objects as $post){
                    setup_postdata($post);
                    if ( has_post_thumbnail() ) {
                      $item_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    } else {
                      $item_image = catchFirstImage();
                    }
                    ?>
                  <div class="massage--wrap">
                    <div id="post-<?php the_ID(); ?>" class="massage--item ratio" data-hkoef=".9" style="background-image: url(<?php echo $item_image ?>);">
                      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="massage--link"></a>
                      <span class="massage--price"><?php the_field('price'); ?></span>
                      <div class="massage--content">
                        <span class="massage--title"><?php the_title(); ?></span>

                        <span class="massage--duration"><?php the_field('duration_label'); ?> - <?php the_field('duration'); ?></span>
                      </div>
                      <button class="btn btn-blue-half ajax-order" data-toggle="modal" data-target="#contactFormModal" data-formcode='<?php the_field('services_modal_form', $front__id); ?>' data-formtarg="<?php the_title(); ?>"><?php the_field('label_order', $front__id); ?><span></span></button>
                    </div><!-- /.massage--item -->

                  </div><!-- /.massage--wrap -->
                  <?php
                  }
                  wp_reset_postdata();
                  ?>

              </div><!-- /.massages--list  -->
            </div>
          <?php endif;
           }?>


  <?php endwhile; endif; ?>
<?php get_footer(); ?>
