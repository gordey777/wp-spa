<?php
/*
Template Name: Servises Category Page
Template Post Type: page, massage
*/
 get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
<?php $front__id = (int)(get_option( 'page_on_front' )); ?>

    <div class="article-single massasges-page heading-decor ">

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



          <?php
          $servID = get_the_ID();
          $itemArgs = array(
              'post_type'    => 'page',
              'numberposts' => -1,
              'posts_per_page' => -1,
              'orderby'     => 'name',
              'order'       => 'ASC',
              //'child_of'     => $servID,
              'post_parent'       => $servID,
              'post_status'  => 'publish',
              //'meta_key' => '_wp_page_template',
              //'meta_value' => 'page-service.php',
          );

          $servises = new WP_Query( $itemArgs );
          if($servises->have_posts()) :
          ?>
            <div class="massages--list">
              <div class="row">
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

                  <div class="col-lg-4 col-md-6 massage--wrap">
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

              </div><!-- /.row -->
            </div><!-- /.massages--list  -->
          <?php endif; ?>

            <div class="row">
              <?php $page_form = get_field('services_contacts_form',  $front__id);?>
              <?php if($page_form){ ?>
                <div id="page_contact_form" class="order-form col-lg-6 offset-lg-3 col-md-8 offset-md-2 order-decor">
                  <?php echo do_shortcode($page_form); ?>
                </div>
              <?php }?>

            </div>
          </div>


          <div class="massages-content">
            <?php if (get_field('advantages_image')) {
              $image = get_field('advantages_image'); ?>
              <style>
                .mc-cont--first::before {
                  background-image: url(<?php echo $image['url']; ?>);
                }
              </style>
              <div class="mc-cont--first">
                <div class="container">
                  <div class="row">
                    <div class="mc-cont page-content col-lg-6">
                      <h3 class="mc--title"><?php the_field('second_title'); ?><span></span></h3>
                      <?php the_content(); ?>
                    </div><!-- /.mc-cont -->
                  </div><!-- /.row -->
                </div>
              </div><!-- /.mc-cont--first -->
            <?php } ?>


            <?php if (get_field('third_block_image')) {
              $image = get_field('third_block_image'); ?>
              <style>
                .mc-cont--second::before {
                  background-image: url(<?php echo $image['url']; ?>);
                }
              </style>
              <div class="mc-cont--second">
                <div class="container">
                  <div class="row">
                    <div class="mcsc col-lg-8 offset-lg-4">
                      <h2 class="mcsc--title"><?php the_field('third_title'); ?><span></span></h2>
                      <div class="page-content"><?php the_field('third_block_content'); ?></div><?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                    </div><!-- /.mcsc -->
                  </div><!-- /.row -->
                </div>
              </div><!-- / mc-cont--second -->
            <?php } ?>
          </div><!-- /.massages-content -->

    </div><!-- article-single -->

  <?php endwhile; endif; ?>
<?php get_footer(); ?>
