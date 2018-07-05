<?php /* Template Name: HomePage */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
<?php $front__id = (int)(get_option( 'page_on_front' )); ?>
    <?php if( have_rows('slider') ): ?>

          <div class="home-slider">
          <div class="owl-carousel owl-carousel-top">
            <?php $i = 0;
            while( have_rows('slider') ): the_row();

              // vars
              $i++;
              $small_title = get_sub_field('small_title');
              $title_with_dividers = get_sub_field('title_with_dividers');
              $content = get_sub_field('content');
              $image = get_sub_field('image');
              ?>
              <div class="slides" data-dot="<?php echo $i; ?>" style="background-image: url(<?php echo $image['url']; ?>)">

                <div class="container">
                <div class="home-slider--content">
                  <span class="home-slider--pretitle"><?php echo $small_title; ?></span>
                  <span class="home-slider--title"><?php echo $title_with_dividers; ?></span>
                  <?php echo $content; ?>
                </div><!-- /.home-slider--content -->
                </div><!-- /.home-slider--content -->
              </div>

            <?php endwhile; ?>

          </div><!-- /.owl-carousel -->
          <div class="home-slider--navi">
            <span class="hsn-current">1</span>
            <span class="hsn-next"></span>
          </div>
        </div><!-- /.home-slider -->

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
                  $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                } else {
                  $image = catchFirstImage();
                } ?>
              <div class="home-services--item-wrap col-xl-4  col-sm-6">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="home-services--item" style="background-image: url(<?php echo $image; ?>);">
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
          <div class="home-content--item col-xl-8 col-lg-7">
            <h6 class="home-content--pretitle"><?php the_field('main_title'); ?></h6>
            <h1 class="home-content--title"><?php the_field('second_title'); ?></h1>
            <?php the_content(); ?>
          </div><!-- /.home-content--item col-xl-8 -->
          <?php $image = get_field('first_block_image');

            if ($image){
              $bgstyle = 'style = "background-image: url(' . $image['url'] . ');"';
            } else {
              $bgstyle = "";
            }
          ?>
          <div class="home-content--img col-xl-4 col-lg-5">
            <div class="content-bg-img" <?php echo $bgstyle ;?>></div><!-- /.home-content--img col-xl-4 -->
          </div><!-- /.home-content--img col-xl-4 -->
        </div>
      </div>
    </div><!-- /.home-content col-xl-12 -->

    <?php $posts = get_field('actions');

    if( $posts ): ?>
      <div class="home-actions dots-decor-left decor-bottom">
        <div class="container">
          <div class="row">

            <div class="home-actions--heading col-xl-12"><?php the_field('actions_title'); ?><span></span></div>


            <?php foreach( $posts as $post): ?>
              <?php setup_postdata($post); ?>
              <?php
                if ( has_post_thumbnail()) {
                  $image = get_the_post_thumbnail_url(get_the_ID(),'medium');
                } else {
                  $image = catchFirstImage();
                } ?>
                <div class="home-actions--wrap col-lg-4 ">
              <a href="<?php the_permalink(); ?>" class="home-actions--item " style="background-image: url(<?php echo $image; ?>);">
                <div class="actions-content">
                  <span class="hai--date"><?php the_time('j F Y'); ?></span>
                  <span class="hai--title"><?php the_title(); ?></span>
                  <div class="hai--content"><?php wpeExcerpt('wpeExcerpt10'); ?></div>
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
            background-image: url(<?php echo $image['url']; ?>);
          }
        </style>
      <?php }?>
      <div class="home-gift">
        <div class="container">
          <div class="row">
            <div class="home-gift--content page-content col-lg-8">
              <h3 class="home-gift--title"><?php the_field('gift_title'); ?><span></span></h3>
              <?php the_field('gift_content'); ?>
              <button class="btn btn-blue-half home-gift--order ajax-order" data-toggle="modal" data-target="#contactFormModal" data-formcode='<?php the_field('gift_form'); ?>' data-formtarg="<?php the_field('gift_title'); ?>"><?php the_field('label_order'); ?><span></span></button>
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
            background-image: url(<?php echo $image['url']; ?>) !important;
          }
        </style>
      <?php }?>
      <div class="home-girls dots-decor-right">
        <div class="container">
          <div class="row">
            <div class="home-girls--content col-lg-6 offset-lg-5">
              <h3 class="home-girls--title"><?php the_field('girls_title'); ?><span></span></h3>
              <div class="home-girls--content_wrap">
                <?php the_field('girls_content'); ?>
              </div>

              <button class="btn btn-blue-half home-girls--order ajax-order" data-toggle="modal" data-target="#contactFormModal" data-formcode='<?php the_field('girls_form'); ?>' data-formtarg="<?php the_field('girls_title'); ?>"><?php the_field('label_order'); ?></button>
            </div><!-- /.col-lg-7 -->
          </div>
        </div><!-- /.container -->
      </div><!-- /.home-girls-->
    <?php endif;?>
    <div class="home-video">
      <div class="container">
        <div class="row">
          <div class="home-video--item col-xl-10 offset-xl-1 ratio" data-hkoef=".55">
            <?php $front_video = get_field('home_video'); ?>
            <?php //echo $front_video["iframe"]; ?>
            <div class="videoholder" data-video="<?php echo $front_video['vid']; ?>" style="background-image: url(<?php echo $front_video['thumbs']['maximum']["url"]; ?>);">
              <div class="video-title"><?php echo $front_video["title"]; ?></div>
            </div>
          </div><!-- /.row -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.home-video -->


      <div class="home-reviews dots-decor-left decor-bottom">
        <div class="container">
          <div class="row">
            <h6 class="home-reviews--heading col-xl-10 offset-xl-1"><?php the_field('reviews_title'); ?><span></span></h6>
          </div><!-- row -->
        </div><!-- /.container -->

        <?php
        $args = array(
          'author_email'        => '',
          'author__in'          => '',
          'author__not_in'      => '',
          'include_unapproved'  => '',
          'fields'              => '',
          'comment__in'         => '',
          'comment__not_in'     => '',
          'karma'               => '',
          'number'              => '',
          'offset'              => '',
          'no_found_rows'       => true,
          'orderby'             => '',
          'order'               => 'DESC',
          'status'              => 'approve',
          'type'                => '',
          'type__in'            => '',
          'type__not_in'        => '',
          'user_id'             => '',
          'search'              => '',
          'count'               => false,
          'meta_key'            => '',
          'meta_value'          => '',
          'meta_query'          => '',
          'date_query'          => null, // See WP_Date_Query
          'hierarchical'        => false,
          'update_comment_meta_cache'  => true,
          'update_comment_post_cache'  => false,
        );
        if( $comments = get_comments( $args ) ): ?>
        <div class="slider--wrap">
          <div class="hr-slide--container container owl-carousel">

            <?php foreach( $comments as $comment ):
              $attachment = get_comment_meta( $comment->comment_ID , 'comment_image_reloaded', true );
              $avatar_url = '';
              $ava_url = $comment->comment_author_url;
              //var_dump($attachment);
              if ($attachment){
                $avatar_url = 'style="background-image: url(' . wp_get_attachment_url($attachment[0]) .');"';
              } else if ($ava_url) {
                $avatar_url = 'style="background-image: url(' . $ava_url .');"';
              } else {
                $avatar_url = 'style="background-image: url(' . get_template_directory_uri() . '/img/noimage.jpg );"';
              }
                ?>
                <div class="home-reviews--item">
                  <div class="home-reviews--img ratio" data-hkoef="1.5" data-hkoefxs=".8" <?php echo $avatar_url; ?>></div>

                  <div class="home-reviews--cont">
                    <span class="home-reviews--name"><?php echo $comment->comment_author ;?></span>
                    <span class="home-reviews--title"><?php //echo $comment->comment_author_url ;?></span>
                    <p><?php echo $comment->comment_content ;?></p>
                  </div>
                </div>
            <?php endforeach; ?>

          </div><!-- /.hr-slide--container col-xl-10 -->
        </div>
    <?php endif; ?>
        <div class="container reviews-btn-wrap">
          <button class="btn btn-blue-half reviews-btn" data-toggle="modal" data-target="#reviewModal"><?php the_field('reviews_btn'); ?></button>
        </div>
      </div><!-- /.home-reviews -->







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
                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>" data-icon="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-76x76.png"></div>
              </div>
              <?php endif; ?>
            </div><!-- /.home-contacts--map col-lg-6 -->
            <div class="home-contacts--adress col-lg-6">
              <?php the_content(); ?>
              <button class="btn btn-blue-half home-contacts--order ajax-order" data-toggle="modal" data-target="#contactFormModal" data-formcode='<?php the_field('home_contacts_form', $front__id); ?>' data-formtarg=""><?php the_field('label_callback', $front__id); ?><span></span></button>
            </div><!-- /.home-contacts--adress col-lg-6 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      <?php endforeach; ?>
      <?php wp_reset_postdata(); ?>
    </div><!-- /.home-contacts -->
  <?php endif; ?>
  <?php endwhile; endif; ?>

<?php get_footer(); ?>
