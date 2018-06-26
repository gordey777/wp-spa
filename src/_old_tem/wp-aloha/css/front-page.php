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
              <div class="slides lazy__load" data-imgurl="<?php echo $image['url']; ?>" style="background-image: url(<?php echo $image['sizes']['small']; ?>)">

                <div class="home-slider--content">
                  <span class="home-slider--pretitle"><?php echo $small_title; ?></span>
                  <span class="home-slider--title"><?php echo $title_with_dividers; ?></span>
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


    <?php $posts = get_field('home_services');

    if( $posts ): ?>
    <div class="home-services">
      <div class="container">

          <h3 class="home-services--heading"><?php the_field('services_title'); ?><span></span></h3>
          <div class="row">
            <?php foreach( $posts as $post): ?>
              <?php setup_postdata($post); ?>
              <?php
                if ( has_post_thumbnail()) {
                  $image = get_the_post_thumbnail_url();
                } else {
                  $image = catchFirstImage();
                } ?>
              <div class="home-services--item-wrap col-xl-4  col-sm-6">
                <a href="<?php the_permalink(); ?>" aly="<?php the_title(); ?>" class="home-services--item" style="background-image: url(<?php echo $image; ?>);">
                  <p><?php the_title(); ?></p><span></span>
                </a><!-- /.home-services--item -->
              </div>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.home-services -->
    <?php endif; ?>

    <div class="home-content">
      <div class="container">
        <div class="row">
          <div class="home-content--item col-lg-7">
            <h6 class="home-content--pretitle"><?php the_field('main_title'); ?></h6>
            <h1 class="home-content--title"><?php the_field('second_title'); ?></h1>
            <?php the_content(); ?>
          </div><!-- /.home-content--item col-xl-8 -->
          <?php $image = get_field('first_block_image');

            if ($image){
              $bgstyle = 'style = "background-image: url(' . $image['sizes']['medium'] . ');"';
            } else {
              $bgstyle = "";
            }
          ?>
          <div class="home-content--img col-lg-5 lazy__load" data-imgurl="<?php echo $image['url'];?>" <?php echo $bgstyle ;?>>
          </div><!-- /.home-content--img col-xl-4 -->
        </div>
      </div>
    </div><!-- /.home-content col-xl-12 -->

    <?php $posts = get_field('actions');

    if( $posts ): ?>
      <div class="home-actions">
        <div class="container">
          <div class="row">

            <div class="home-actions--heading col-xl-12"><?php the_field('actions_title'); ?><span></span></div>


            <?php foreach( $posts as $post): ?>
              <?php setup_postdata($post); ?>
              <?php
                if ( has_post_thumbnail()) {
                  $image = get_the_post_thumbnail_url('small');
                } else {
                  $image = catchFirstImage();
                } ?>
                <div class="home-actions--wrap col-lg-4 ">
              <a href="<?php the_permalink(); ?>" class="home-actions--item lazy__load" data-imgurl="the_post_thumbnail_url();" style="background-image: url(<?php echo $image; ?>);">
                <div class="actions-content">
                  <span class="hai--date"><?php the_time('j F Y'); ?></span>
                  <span class="hai--title"><?php the_title(); ?></span>
                  <span class="hai--content"><?php wpeExcerpt('wpeExcerpt10'); ?></span>
                </div>
              </a><!-- home-actions--item --></div>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>

          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.home-actions -->

    <?php endif; ?>
    <?php if (get_field('gift_content')) : ?>
      <?php $image = get_field('home_gift_img'); ?>
      <?php if($image){ ?>
        <style>
          .home-gift::before{
            background-image: url(<?php echo $image['sizes']['medium']; ?>);
          }
          .home-gift.layzy__loaded::before{
            background-image: url(<?php echo $image['url']; ?>);
          }
        </style>
      <?php }?>
      <div class="home-gift lazy__load">
        <div class="container">
          <div class="row">
            <div class="home-gift--content page-content col-lg-8">
              <h3 class="home-gift--title"><?php the_field('gift_title'); ?><span></span></h3>
              <?php the_field('gift_content'); ?>
              <button class="btn btn-blue-half home-gift--order">Заказать<span></span></button>
            </div><!-- home-gift--content  -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div><!-- /.home-gift row -->
    <?php endif;?>

    <?php if (get_field('girls_content')) : ?>
      <?php $image = get_field('home_girls_img'); ?>
      <?php if($image){ ?>
        <style>
          .home-girls::before{
            background-image: url(<?php echo $image['sizes']['medium']; ?>);
          }
          .home-girls.layzy__loaded::before{
            background-image: url(<?php echo $image['url']; ?>);
          }
        </style>
      <?php }?>
      <div class="home-girls lazy__load">
        <div class="container">
          <div class="row">
            <div class="home-girls--content col-lg-6 offset-lg-5">
              <h3 class="home-girls--title"><?php the_field('girls_title'); ?><span></span></h3>
              <div class="home-girls--content_wrap">
                <?php the_field('girls_content'); ?>
              </div>

              <button class="btn btn-blue-half home-girls--order">Заказать</button>
            </div><!-- /.col-lg-7 -->
          </div>
        </div><!-- /.container -->
      </div><!-- /.home-girls-->
    <?php endif;?>
    <div class="home-video">
      <div class="container">
        <div class="row">
          <div class="home-video--item col-xl-10 offset-xl-1">
            <?php the_field('home_video'); ?>
          </div><!-- /.home-video--item -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.home-video -->

    <?php $posts = get_field('reviews');
     if( $posts ): ?>
      <div class="home-reviews">
        <div class="container">
          <div class="row">
            <h6 class="home-reviews--heading col-xl-10 offset-xl-1"><?php the_field('reviews_title'); ?><span></span></h6>
          </div><!-- row -->
        </div><!-- /.container -->

            <div class="hr-slide--container owl-carousel container">

              <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                <?php setup_postdata($post); ?>
                  <div class="home-reviews--item">
                    <div class="home-reviews--img  lazy__load" data-imgurl="<?php echo the_post_thumbnail_url(); ?>" style="background-image: url(<?php echo the_post_thumbnail_url('medium'); ?>);"></div>

                    <div class="home-reviews--cont">
                      <span class="home-reviews--name"><?php the_title(); ?></span>
                      <span class="home-reviews--title"><?php the_field('title'); ?></span>
                      <?php the_content(); ?>
                    </div>
                  </div>

              <?php endforeach; ?>
              <?php wp_reset_postdata(); ?>
            </div><!-- /.hr-slide--container col-xl-10 -->

      </div><!-- /.home-reviews -->
    <?php endif; ?>

  <?php endwhile; endif; ?>



  <?php $posts = get_field('home_contacts');
   if( $posts ): ?>
    <div class="home-contacts">
      <div class="container">
        <div class="row">
          <span class="home-contacts--title"><?php the_field('home_contacts_title');?><span></span></span>
        </div><!-- /.row -->
      </div><!-- /.container -->
      <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <div class="container">
          <div class="row">
            <div class="home-contacts--map col-lg-6">
              <?php $location = get_field('location'); if( !empty($location) ): ?>
              <div class="acf-map">
                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
              </div>
              <?php endif; ?>
            </div><!-- /.home-contacts--map col-lg-6 -->
            <div class="home-contacts--adress col-lg-6">
              <?php the_content(); ?>
            </div><!-- /.home-contacts--adress col-lg-6 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      <?php endforeach; ?>
      <?php wp_reset_postdata(); ?>
    </div><!-- /.home-contacts -->
  <?php endif; ?>


<?php get_footer(); ?>
