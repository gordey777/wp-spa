<?php /* Template Name: GalleryPage */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
  <?php $page___id = get_the_ID(); ?>

    <div id="gallery_title" class="article-single certificate-page" data-pageid="<?php echo $page___id;?>">
      <div class="article-heading heading-noimg container">
        <div class="row">
          <div class="headind--wrap col-lg-10 offset-lg-1">
            <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>
            <h1 class="article-title"><?php the_title(); ?></h1>
          </div>
        </div>
      </div><!-- /.article-heading -->



        <?php $images = get_field('gallery');
        if( $images ): ?>
          <div class="container images-gallery-container">
            <div id="images_gallery" class="row">
              <div class="gallery--item-wrap col-md-4">
                <a class="gallery--item ratio" data-hkoef=".8" rel="lightbox" href="<?php echo $images[1]['url']; ?>" style="background-image: url(' <?php echo $images[1]['sizes']['medium'];?>');">
                  <p><?php echo $images[1]['alt']; ?></p>
                </a>
              </div>

              <div class="gallery--item-wrap col-md-4">
                <a class="gallery--item ratio" data-hkoef=".8" rel="lightbox" href="<?php echo $images[2]['url']; ?>" style="background-image: url(' <?php echo $images[2]['sizes']['medium'];?>');">
                  <p><?php echo $images[2]['alt']; ?></p>
                </a>
              </div>

              <div class="gallery--item-wrap col-md-4">
                <a class="gallery--item ratio" data-hkoef=".8" rel="lightbox" href="<?php echo $images[3]['url']; ?>" style="background-image: url(' <?php echo $images[3]['sizes']['medium'];?>');">
                  <p><?php echo $images[3]['alt']; ?></p>
                </a>
              </div>

              <div class="col-md-4">
                <div class="row">
                  <div class="gallery--item-wrap col-12">
                    <a class="gallery--item ratio" data-hkoef=".8" rel="lightbox" href="<?php echo $images[4]['url']; ?>" style="background-image: url(' <?php echo $images[4]['sizes']['medium'];?>');">
                      <p><?php echo $images[4]['alt']; ?></p>
                    </a>
                  </div>
                  <div class="gallery--item-wrap col-12">
                    <a class="gallery--item ratio" data-hkoef=".8" rel="lightbox" href="<?php echo $images[5]['url']; ?>" style="background-image: url(' <?php echo $images[5]['sizes']['medium'];?>');">
                      <p><?php echo $images[5]['alt']; ?></p>
                    </a>
                  </div>
                </div>
              </div>
              <div class="gallery--item-wrap col-md-8">
                <a class="gallery--item ratio" data-hkoef=".8" rel="lightbox" href="<?php echo $images[0]['url']; ?>" style="background-image: url(' <?php echo $images[0]['sizes']['large'];?>');">
                  <p><?php echo $images[0]['alt']; ?></p>
                </a>
              </div>
              <button id="loadMoreImages" class="btn btn-blue-half btn-cp-order"><?php the_field('btn_label'); ?></button>
            </div>
          </div>
        <?php endif; ?>

        <?php $videos = get_field('video_gallery'); ?>
        <?php if( $videos ): ?>
          <?php $i = 0; ?>
          <div class="container video-gallery-container">
            <div class="row video-gallery" id="video_gallery">
              <?php foreach ($videos as $video) { ?>
                <?php if ($i < 2) { ?>
                  <div class="col-sm-6">
                    <div class="gallery-video--item ratio" data-hkoef=".55">
                      <?php
                      $img_input = $video['thumbs']['maximum']["url"];
                      $img_url = preg_replace('#^http(s)?:#', '', $img_input);
                      ?>
                      <div class="videoholder" data-video="<?php echo $video['vid']; ?>" style="background-image: url(<?php echo $img_url; ?>);">
                        <div class="video-title"><?php echo $video["title"]; ?></div>
                      </div>
                    </div>
                  </div>
                  <?php $i++; ?>
                <?php } ?>
              <?php } ?>
              <button id="loadMoreVideos" class="btn btn-blue-half btn-cp-order"><?php the_field('btn_label'); ?></button>
          </div><!-- /.row -->
        </div>
      <?php endif; ?>


    </div><!-- article-single -->

  <?php endwhile; endif; ?>
<?php get_footer(); ?>
