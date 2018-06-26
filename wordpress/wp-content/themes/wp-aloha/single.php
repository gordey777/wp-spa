<?php get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
<?php $front__id = (int)(get_option( 'page_on_front' )); ?>
    <div class="article-single heading-decor">
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
            <span class="heading-cat"><?php the_category(', '); ?></span>
            <span class="heading-date"><?php the_time('d F Y'); ?></span>
          </div>
        </div>
      </div><!-- /.article-heading -->

      <div class="container">
        <div class="row">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="col-lg-8 offset-lg-2">
              <div class="article--content">
                <?php the_content(); ?>
              </div><!-- /.article--content -->
            </div>

            <?php if (get_field('image_first_block_bottom')) { $image = get_field('image_first_block_bottom'); ?>
              <div class="col-lg-10 offset-lg-1">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="article--content--img">
                <div class="img--desc"><?php echo $image['alt']; ?></div>
              </div>
            <?php } ?>

            <?php if( have_rows('additional_blocks') ): while ( have_rows('additional_blocks') ) : the_row(); ?>
              <div class="col-lg-8 offset-lg-2">
                <?php if (get_sub_field('content')) { ?>
                  <div class="article--content">
                    <?php the_sub_field('content'); ?>
                  </div><!-- /.article--content -->
                <?php } ?>
              </div>
              <div class="col-lg-10 offset-lg-1">
                <?php if (get_sub_field('after_block_image')) { $image = get_field('after_block_image'); ?>
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="article--content--img">
                  <div class="img--desc"><?php echo $image['alt']; ?></div>
                <?php } ?>
              </div>
            <?php endwhile; endif; ?>
          </article>

          <button class="btn btn-blue-half btn-share"><?php the_field('label_shared', $front__id); ?></button>

        <?php $images = get_field('gallery'); if( $images ): ?>
          <div class="gallery-block col-12">
            <div class="row">
              <?php foreach( $images as $image ): ?>
                <div class="gallery--item-wrap col-md-4">
                  <a class="gallery--item ratio" data-hkoef=".8" rel="lightbox" href="<?php echo $image['url']; ?>" style="background-image: url(' <?php echo $image['sizes']['medium'];?>');">
                    <p><?php echo $image['alt']; ?></p>
                  </a>
                </div>
              <?php endforeach; ?>
            </div>
          </div><!-- /.gallery-block col-xl-8 offset-1 -->
        <?php endif; ?>
        </div><!-- /.row -->
      </div><!-- /.container -->


      <?php
      $catsList = '';
      $postCats = array();
      if( $categories = get_the_category( ) ) {
          foreach ( $categories as $key=>$cat ) {
              $postCats[$key] = $cat->cat_ID;
          }
          //$catsList = implode(', ', $postCats);
        }
        $itemArgs = array(
            'post_type'    => 'post',
            'numberposts' => -1,
            'posts_per_page' => -1,
            //'orderby'     => 'data',
            //'order'       => 'ASC',
            'category__in'  => $postCats,
            'post__not_in'  => array(get_the_ID()),
            'post_status'  => 'publish',
        );

        $servises = new WP_Query( $itemArgs );
        if($servises->have_posts()) : ?>
          <div class="recommend-block">
            <div class="container">
              <div class="recommend-block--heading">Рекомендуем<span></span>
              </div>
            </div>

              <div class="slider--wrap">
                <div class="massages--list owl-carousel recommend-slider  container">
                  <?php
                  while ( $servises->have_posts() ) { ?>
                    <?php
                    $servises->the_post();

                    $catsList = '';
                    if( $cats = get_the_category() ) {
                      foreach ( $cats as $key=>$cat ) {
                          $post_cats[$key] = $cat->name;
                      }
                      $catsList = implode(', ', $post_cats);
                    }

                    if ( has_post_thumbnail() ) {
                      $item_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    } else {
                      $item_image = catchFirstImage();
                    }
                    ?>

                    <div class="looper--wrap">
                      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('looper massage--item'); ?>>
                        <div class="massage--img ratio" data-hkoef=".6" style="background-image: url(<?php echo $item_image ?>);"></div>
                        <div class="massage--content">
                          <span class="looper--date"><?php the_time('j F Y'); ?></span>
                          <span class="looper--title"><?php the_title(); ?></span>
                          <span class="looper--cats"><?php echo $catsList; ?></span>
                        </div>
                      </a><!-- /.looper -->
                    </div>
                  <?php
                  }
                  wp_reset_postdata();
                  ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div><!-- /.article-single -->
  <?php endwhile; endif; ?>
<?php get_footer(); ?>
