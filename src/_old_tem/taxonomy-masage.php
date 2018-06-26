<?php get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <div class="article-single certificate-page">
      <div class="container">
        <div class="row">
          <?php if (get_field('header_image')) {
            $image = get_field('header_image');
            $style = 'style="background-image: url(' . $image['url'] .');"';
          } else {
            $style = '';
          }?>
          <div class="article-heading col-12" <?php echo $style; ?>>
            <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>
            <h1 class="article-title"><?php the_title(); ?></h1>
          </div><!-- /.article-heading -->

          <article id="post-<?php the_ID(); ?>" <?php post_class('cp-second col-lg-8 offset-lg-2'); ?>>
            <div class="article--content">
              <h2 class="cp-second-headline"><?php the_field('second_title'); ?></h2>
              <div class="page-content">
                <?php the_content(); ?>
              </div>
              <span class="cp-price"><?php the_field('price'); ?><span><?php the_field('price_label'); ?></span></span>
              <?php if(get_field('duration')){ ?>
                <span class="cp-duration"><?php the_field('duration'); ?><span><?php the_field('duration'); ?></span></span>
              <?php } ?>
            </div><!-- /.article--content -->
            <button class="btn btn-blue-half btn-cp-order">Заказать</button>
          </article>
        </div>
      </div>


          <?php if (get_field('how_it_works_content')) { ?>
            <?php $image = get_field('how_it_works_image'); ?>
            <style>
              .home-girls::before{
                background-image: url(<?php echo $image['sizes']['medium']; ?>);
              }
              .home-girls.layzy__loaded::before{
                background-image: url(<?php echo $image['url']; ?>);
              }
            </style>

            <div class="home-girls  layzy__load">
            <div class="container">
              <div class="row">
                <div class="home-girls--content col-lg-6 offset-lg-5">
                  <h3 class="home-girls--title"><?php the_field('how_it_works_title'); ?><span></span></h3>
                  <div class="home-girls--content_wrap page-content">
                    <?php the_field('how_it_works_content'); ?>
                  </div>
                </div><!-- /.col-lg-7 -->
              </div>
              </div>
            </div><!-- /.home-girls container-fluid -->
          <?php } ?>

          <?php if (get_field('advantages_content')) { ?>
            <?php $image = get_field('advantages_image'); ?>
            <style>
              .home-gift::before{
                background-image: url(<?php echo $image['sizes']['medium']; ?>);
              }
              .home-gift.layzy__loaded::before{
                background-image: url(<?php echo $image['url']; ?>);
              }
            </style>
            <div class="home-gift layzy__load">
              <div class="container">
                <div class="row">
                  <div class="home-gift--content col-lg-8">
                    <h3 class="home-gift--title"><?php the_field('advantages_title'); ?><span></span></h3>
                    <div class="page-content">
                      <?php the_field('advantages_content'); ?>
                    </div>

                  </div><!-- home-gift--content  -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div><!-- /.home-gift row -->
          <?php } ?>
      <div class="container">
        <div class="row">
          <?php $page_form = get_field('page_form');?>
          <?php if($page_form){ ?>
            <div class="order-form col-lg-6 offset-lg-3 col-md-8 offset-md-2">
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
                //'post_in'       => $postList,
                'post_parent'       => $servID,
                'post_status'  => 'publish',
                //'meta_key' => '_wp_page_template',
                //'meta_value' => 'page-service.php',
                //'ignore_sticky_posts'=> 1,
            );

            $servises = new WP_Query( $itemArgs );
            if($servises->have_posts() ) :
            ?>
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
                      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" id="post-<?php the_ID(); ?>" class="massage--item">
                        <div class="massage--img ratio" data-hkoef=".6" style="background-image: url(<?php echo $item_image ?>);"></div>
                        <div class="massage--content">
                          <span class="massage--title"><?php the_title(); ?></span>
                          <span class="massage--price"><?php the_field('price'); ?></span>
                          <span class="massage--duration"><?php the_field('duration_label'); ?> - <?php the_field('duration'); ?></span>
                        </div>
                      </a><!-- /.massage--item -->
                    </div><!-- /.massage--wrap -->
                  <?php
                  }
                  wp_reset_postdata();
                  ?>

              </div><!-- /.massages--list  -->
            <?php endif;
          } else {
            $post_objects = get_field('recomend_services');

            if( $post_objects ):
            ?>
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
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" id="post-<?php the_ID(); ?>" class="massage--item">
                      <div class="massage--img ratio" data-hkoef=".6" style="background-image: url(<?php echo $item_image ?>);"></div>
                      <div class="massage--content">
                        <span class="massage--title"><?php the_title(); ?></span>
                        <span class="massage--price"><?php the_field('price'); ?></span>
                        <span class="massage--duration"><?php the_field('duration_label'); ?> - <?php the_field('duration'); ?></span>
                      </div>
                    </a><!-- /.massage--item -->
                  </div><!-- /.massage--wrap -->
                <?php
                }
                wp_reset_postdata();
                ?>

            </div><!-- /.massages--list  -->
          <?php endif;
           }?>


  <?php endwhile; endif; ?>
<?php get_footer(); ?>
