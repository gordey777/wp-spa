<?php /* Template Name: Home Page */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <?php if( have_rows('slider') ): ?>
      <div class="container">
        <div class="row">
          <div class="home-slider col-xl-12">
          <div class="owl-carousel owl-carousel-top">
            <?php while( have_rows('slider') ): the_row();

              // vars
              $small_title = get_sub_field('small_title');
              $title_with_dividers = get_sub_field('title_with_dividers');
              $content = get_sub_field('content');
              $image = get_sub_field('image');

              ?>
              <div class="slides">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>">
                <div class="home-slider--content">
                  <span class="home-slider--pretitle"><?php echo $small_title; ?></span>
                  <h5 class="home-slider--title"><?php echo $title_with_dividers; ?></h5>
                  <?php echo $content; ?>
                </div><!-- /.home-slider--content -->
              </div>

            <?php endwhile; ?>

          </div><!-- /.owl-carousel -->
          <div class="home-slider--navi">
            <span class="hsn-current"></span>
            <span class="hsn-next"></span>
          </div>
        </div><!-- /.home-slider -->

      </div><!-- row -->
    </div><!-- container -->
    <?php endif; ?>

    <div class="home-services">
      <div class="container">
        <div class="row">

          <h3 class="home-services--heading col-xl-12">Услуги<span></span></h3>
          <a href="#" class="home-services--item col-xl-4" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/home-services--item.jpg);">
            Хаммам<span></span><span></span>
          </a><!-- /.home-services--item -->
          <a href="#" class="home-services--item col-xl-4" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/home-services--item.jpg);">
            Хаммам<span></span><span></span>
          </a><!-- /.home-services--item -->
          <a href="#" class="home-services--item col-xl-4" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/home-services--item.jpg);">
            Хаммам<span></span><span></span>
          </a><!-- /.home-services--item -->
          <a href="#" class="home-services--item col-xl-4" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/home-services--item.jpg);">
            Хаммам<span></span><span></span>
          </a><!-- /.home-services--item -->
          <a href="#" class="home-services--item col-xl-4" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/home-services--item.jpg);">
            Хаммам<span></span><span></span>
          </a><!-- /.home-services--item -->
          <a href="#" class="home-services--item col-xl-4" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/home-services--item.jpg);">
            Хаммам<span></span><span></span>
          </a><!-- /.home-services--item -->

        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.home-services -->

    <div class="home-content">
      <div class="container">
        <div class="row">
          <div class="home-content--item col-xl-7">
            <h6 class="home-content--pretitle"><?php the_field('main_title'); ?></h6>
            <h1 class="home-content--title"><?php the_field('second_title'); ?></h1>
            <?php the_content(); ?>
          </div><!-- /.home-content--item col-xl-8 -->
          <div class="home-content--img col-xl-5">
            <?php $image = get_field('first_block_image'); ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
          </div><!-- /.home-content--img col-xl-4 -->
        </div>
      </div>
    </div><!-- /.home-content col-xl-12 -->

    <?php $posts = get_field('actions'); if( $posts ): ?>
      <div class="home-actions">
        <div class="container">
          <div class="row">
            <div class="home-actions--heading col-xl-12">Акции<span></span></div>

            <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
              <?php setup_postdata($post); ?>
              <?php
                if ( has_post_thumbnail()) {
                  $image = get_the_post_thumbnail_url();
                } else {
                  $image = catchFirstImage();
                } ?>
              <a href="<?php the_permalink(); ?>" class="home-actions--item col-xl-4" style="background-image: url(<?php echo $image; ?>);">
                <span class="hai--date"><?php the_time('j F Y'); ?></span>
                <span class="hai--title"><?php the_title(); ?></span>
                <span class="hai--content"><?php wpeExcerpt('wpeExcerpt10'); ?></span>
              </a><!-- home-actions--item -->
            <?php endforeach; ?>

          </div><!-- /.home-actions -->
        </div><!-- /.row -->
      </div><!-- /.container -->
      <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
    <?php endif; ?>

    <div class="home-gift">
      <div class="container">
        <div class="row">
          <div class="home-gift--content col-xl-8">
            <h5 class="home-gift--title"><?php the_field('gift_title'); ?> <span></span></h5>
            <?php the_field('gift_content'); ?>
            <button class="btn btn-blue-half home-gift--order">Заказать<span></span></button>
          </div><!-- home-gift--content  -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.home-gift row -->

    <div class="home-girls container-fluid">
      <div class="row">
        <div class="home-girls--content col-lg-6 offset-xl-5">
          <h4 class="home-girls--title"><?php the_field('girls_title'); ?><span></span></h4>
          <?php the_field('girls_content'); ?>
          <button class="btn btn-blue-half home-girls--order">Заказать</button>
        </div><!-- /.col-lg-7 -->
      </div>
    </div><!-- /.home-girls container-fluid -->

    <div class="home-video">
      <div class="container">
        <div class="row">
          <div class="home-video--item col-xl-10 offset-xl-1">
            <?php the_field('home_video'); ?>
          </div><!-- /.home-video--item -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.home-video -->

    <?php $posts = get_field('reviews'); if( $posts ): ?>
      <div class="home-reviews">
        <div class="container">
          <div class="row">
            <h6 class="home-reviews--heading col-xl-10 offset-xl-1">Отзывы<span></span></h6>
          </div><!-- row -->
        </div><!-- container -->
        <div class="container-fluid">
          <div class="row">
            <span class="home-reviews--nav home-reviews--nav-prev col-xl-1"></span>
            <div class="hr-slide--container owl-carousel col-xl-10">

              <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                <?php setup_postdata($post); ?>
                  <div class="home-reviews--item">
                    <img src="<?php echo the_post_thumbnail_url('medium'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                    <div class="home-reviews--cont">
                      <h6 class="home-reviews--name"><?php the_title(); ?></h6>
                      <span class="home-reviews--title"><?php the_field('title'); ?></span>
                      <?php the_content(); ?>
                    </div>
                  </div>
                <?php wp_reset_postdata(); ?>
              <?php endforeach; ?>

            </div><!-- /.hr-slide--container col-xl-10 -->
            <span class="home-reviews--nav home-reviews--nav-next col-xl-1"></span>
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.home-reviews -->
    <?php endif; ?>

  <?php endwhile; endif; ?>

  <?php $args = array('post_type' => 'page','post__in' => array(210));
    $my_three_posts = new WP_Query( $args );
    while ($my_three_posts -> have_posts()) : $my_three_posts -> the_post();
  ?>
    <div class="home-contacts">
      <div class="container">
        <div class="row">
          <h1 class="home-contacts--title">Контакты<span></span></h1>
        </div><!-- /.row -->
      </div><!-- /.container -->
      <div class="container">
        <div class="row">
          <div class="home-contacts--map col-xl-6">
            <?php $location = get_field('location'); if( !empty($location) ): ?>
            <div class="acf-map">
              <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
            </div>
            <?php endif; ?>
          </div><!-- /.home-contacts--map col-lg-6 -->
          <div class="home-contacts--adress col-xl-6">
            <?php the_content(); ?>
          </div><!-- /.home-contacts--adress col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.home-contacts -->
  <?php endwhile; ?>
<?php get_footer(); ?>
