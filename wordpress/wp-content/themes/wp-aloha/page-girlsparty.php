<?php /* Template Name: Girsl Party */ get_header(); ?>

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <?php $front__id = (int)(get_option( 'page_on_front' )); ?>
    <div class="article-single girlsparty-page  heading-decor">
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
          <article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-8 offset-lg-2 content-girls'); ?>>
            <h2 class="gpp-second-headline"><?php the_field('second_block_headline'); ?></h2>
            <div class="article--content">
              <?php the_content(); ?>
            </div><!-- /.article--content -->
            <button class="btn btn-blue-half home-contacts--order ajax-order" data-toggle="modal" data-target="#contactFormModal" data-formcode='<?php the_field("modal_contact_form"); ?>' data-formtarg="<?php the_title(); ?>"><?php the_field('label_callback', $front__id); ?><span></span></button>
          </article>

          <div class="col-12">
            <?php $i = 0; if( have_rows('packages') ): while ( have_rows('packages') ) : the_row(); ?>
              <?php
                if ( ($i == 0) || (($i % 2) == 0) ) {
                  $order_1 = 'order-lg-1';
                  $order_2 = 'order-lg-2';
                } else {
                  $order_1 = 'order-lg-2';
                  $order_2 = 'order-lg-1';
                }
              if (get_sub_field('package_image')) {
                $image = get_sub_field('package_image');
              }
              ?>
              <div class="packages--item row row-eq-height">
                <div class="packages--item-img col-lg-5 <?php echo $order_1; ?>" style="background-image : url(<?php echo $image['url']; ?>);">


                </div><!-- /.packages--item-img col-xl-4 -->

                <div class="packages--item-cont col-lg-7 <?php echo $order_2; ?>">
                  <h3 class="pic--title"><?php the_sub_field('package_title'); ?><span></span></h3>
                  <div class="pic--descr">
                    <?php the_sub_field('package_description'); ?>
                  </div>
                  <div class="pic--descr-more">
                    <?php the_sub_field('package_more_label'); ?>
                  </div>
                  <div class="pic--time"><?php the_sub_field('time'); ?><span><?php the_sub_field('time_label'); ?></span></div>
                  <div class="pic--price"><?php the_sub_field('price'); ?><span><?php the_sub_field('price_label'); ?></span></div>
                </div><!-- /.packages--item-cont col-xl-8 -->
              </div><!-- /.packages--item -->
            <?php $i++; endwhile; endif; ?>
          </div><!-- /.col-xl-10 offset-1 -->

          <?php if (get_field('aditional_content')) { ?>
            <h3 class="adc--title col-xl-8 offset-xl-2 col-lg-8 offset-lg-2"><?php the_field('additional_content_title'); ?><span></span></h3>
            <div class="article--content additional-content col-xl-8 offset-xl-2 col-lg-8 offset-lg-2">
              <?php the_field('aditional_content'); ?>
            </div><!-- /.article--content -->
          <?php } ?>
        </div>
      </div>
    </div><!-- article-single -->

  <?php endwhile; endif; ?>
<?php get_footer(); ?>
