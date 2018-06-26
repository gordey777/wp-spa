<?php /* Template Name: Page Gallery */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
  <?php $page___id = get_the_ID(); ?>

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
        </div><!-- /.row -->
      </div>



        <?php $images = get_field('gallery');
        if( $images ): ?>
          <div class="container images-gallery-container">
            <div id="images_gallery" class="row" data-pageid="<?php echo $page___id;?>">
              <div class="gallery--item-wrap col-md-4">
                <a class="gallery--item ratio lazy__load" data-hkoef="1" rel="lightbox" data-imgurl="<?php echo $images[1]['sizes']['large'];?>" href="<?php echo $images[1]['url']; ?>" style="background-image: url(' <?php echo $images[1]['sizes']['small'];?>');">
                  <p><?php echo $images[1]['alt']; ?></p>
                </a>
              </div>

              <div class="gallery--item-wrap col-md-4">
                <a class="gallery--item ratio lazy__load" data-hkoef="1" rel="lightbox" data-imgurl="<?php echo $images[2]['sizes']['large'];?>" href="<?php echo $images[2]['url']; ?>" style="background-image: url(' <?php echo $images[2]['sizes']['small'];?>');">
                  <p><?php echo $images[2]['alt']; ?></p>
                </a>
              </div>

              <div class="gallery--item-wrap col-md-4">
                <a class="gallery--item ratio lazy__load" data-hkoef="1" rel="lightbox" data-imgurl="<?php echo $images[3]['sizes']['large'];?>" href="<?php echo $images[3]['url']; ?>" style="background-image: url(' <?php echo $images[3]['sizes']['small'];?>');">
                  <p><?php echo $images[3]['alt']; ?></p>
                </a>
              </div>

              <div class="col-md-4">
                <div class="row">
                  <div class="gallery--item-wrap col-12">
                    <a class="gallery--item ratio lazy__load" data-hkoef="1" rel="lightbox" data-imgurl="<?php echo $images[4]['sizes']['large'];?>" href="<?php echo $images[4]['url']; ?>" style="background-image: url(' <?php echo $images[4]['sizes']['small'];?>');">
                      <p><?php echo $images[4]['alt']; ?></p>
                    </a>
                  </div>
                  <div class="gallery--item-wrap col-12">
                    <a class="gallery--item ratio lazy__load" data-hkoef="1" rel="lightbox" data-imgurl="<?php echo $images[5]['sizes']['large'];?>" href="<?php echo $images[5]['url']; ?>" style="background-image: url(' <?php echo $images[5]['sizes']['small'];?>');">
                      <p><?php echo $images[5]['alt']; ?></p>
                    </a>
                  </div>
                </div>
              </div>
              <div class="gallery--item-wrap col-md-8">
                <a class="gallery--item ratio lazy__load" data-hkoef="1" rel="lightbox" data-imgurl="<?php echo $images[0]['sizes']['large'];?>" href="<?php echo $images[0]['url']; ?>" style="background-image: url(' <?php echo $images[0]['sizes']['small'];?>');">
                  <p><?php echo $images[0]['alt']; ?></p>
                </a>
              </div>
              <button id="loadMoreImages" class="btn btn-blue-half btn-cp-order">Показать все</button>
            </div>
          </div>
        <?php endif; ?>


      <div class="container">
        <div class="row">


          <article id="post-<?php the_ID(); ?>" <?php post_class('cp-second col-xl-8 offset-2'); ?>>
            <div class="article--content">
              <h2 class="cp-second-headline"><?php the_field('second_title'); ?></h2>
              <?php the_content(); ?>
            </div><!-- /.article--content -->
          </article>

        </div>
      </div>
    </div><!-- article-single -->

  <?php endwhile; endif; ?>
<?php get_footer(); ?>
