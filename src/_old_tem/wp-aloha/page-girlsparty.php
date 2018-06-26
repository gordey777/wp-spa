<?php /* Template Name: Girsl Party Page */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <div class="article-single girlsparty-page">
      <div class="container-fluid">
        <div class="row">
          <?php if (get_field('header_image')) {
            $image = get_field('header_image');
            $style = 'style="background-image: url(' . $image['url'] .');"';
          } else {
            $style = '';
          }?>
          <div class="article-heading col-xl-10 offset-1" <?php echo $style; ?>>
            <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>
            <h1 class="article-title"><?php the_title(); ?></h1>
          </div><!-- /.article-heading -->

          <article id="post-<?php the_ID(); ?>" <?php post_class('col-xl-6 offset-3'); ?>>
            <h2 class="gpp-second-headline"><?php the_field('second_block_headline'); ?></h2>
            <div class="article--content">
              <?php the_content(); ?>
            </div><!-- /.article--content -->
            <button class="btn btn-blue-half btn-gp-order">Заказать</button>
          </article>

          <div class="col-xl-8 offset-2">
            <?php $i = 0; if( have_rows('packages') ): while ( have_rows('packages') ) : the_row(); ?>
              <?php
                if ( ($i== 0) || ($i== 2) || ($i== 4) || ($i== 6) || ($i== 8) || ($i== 10) ) {
                  $order_1 = 'order-1';
                  $order_2 = 'order-2';
                } else {
                  $order_1 = 'order-2';
                  $order_2 = 'order-1';
                }
              ?>
              <div class="packages--item row">
                <div class="packages--item-img col-xl-4 <?php echo $order_1; ?>">

                  <?php if (get_sub_field('package_image')) { $image = get_sub_field('package_image'); ?>
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="article--content--img">
                  <?php } ?>
                </div><!-- /.packages--item-img col-xl-4 -->

                <div class="packages--item-cont col-xl-8 <?php echo $order_2; ?>">
                  <h3 class="pic--title"><?php the_sub_field('package_title'); ?><span></span></h3>
                  <div class="pic--descr">
                    <?php the_sub_field('package_description'); ?>
                  </div>
                  <div class="pic--time"><?php the_sub_field('time'); ?><span>Продолжительность</span></div>
                  <div class="pic--price"><?php the_sub_field('price'); ?><span>стоимость</span></div>
                </div><!-- /.packages--item-cont col-xl-8 -->
              </div><!-- /.packages--item -->
            <?php $i++; endwhile; endif; ?>
          </div><!-- /.col-xl-10 offset-1 -->

          <?php if (get_field('aditional_content')) { ?>
            <h3 class="adc--title col-xl-6 offset-3"><?php the_field('additional_content_title'); ?><span></span></h3>
            <div class="article--content additional-content col-xl-6 offset-3">
              <?php the_field('aditional_content'); ?>
            </div><!-- /.article--content -->
          <?php } ?>
        </div>
      </div>
    </div><!-- article-single -->

  <?php endwhile; endif; ?>
<?php get_footer(); ?>
