<?php /* Template Name: Certificate Page */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
<?php $front__id = (int)(get_option( 'page_on_front' )); ?>


    <div class="article-single certificate-page heading-decor">

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
          <article id="post-<?php the_ID(); ?>" <?php post_class('cp-second col-lg-8 offset-lg-2'); ?>>
            <div class="article--content">
              <h2 class="cp-second-headline"><?php the_field('second_title'); ?></h2>
              <div class="page-content">
                <?php the_content(); ?>
              </div>
              <div class="row">
              <?php if(get_field('duration')){ ?>
                <span class="cp-duration col-lg-4  col-sm-6"><?php the_field('duration'); ?><span><?php the_field('duration_label'); ?></span></span>
              <?php } ?>
                <span class="cp-price col-lg-4 col-sm-6"><?php the_field('price'); ?><span><?php the_field('price_label'); ?></span></span>
              </div>
            </div><!-- /.article--content -->
            <button class="btn btn-blue-half btn-cp-order" onclick="$('html, body').animate({scrollTop: $('#page_contact_form').offset().top }, 400);"><?php the_field('label_order', $front__id); ?></button>
          </article>
        </div>
      </div>


          <?php if (get_field('how_it_works_content')) { ?>
            <?php $giftImage = get_field('advantages_image'); ?>
            <?php if($giftImage){ ?>
              <style>
                .home-gift--img:before{
                  background-image: url(<?php echo $giftImage['url']; ?>) !important;
                }
              </style>
            <?php } ?>
            <div class="home-gift home-gift--img dots-decor-left">
              <div class="container home-gift--img">
                <div class="row">
                  <div class="home-gift--content col-lg-8">
                    <h3 class="home-gift--title"><?php the_field('how_it_works_title'); ?><span></span></h3>
                    <div class="page-content">
                      <?php the_field('how_it_works_content'); ?>
                    </div>

                  </div><!-- home-gift--content  -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div><!-- /.home-gift row -->
          <?php } ?>

          <?php if (get_field('advantages_content')) { ?>
            <?php $girlsImage = get_field('advantages_image'); ?>
            <?php if($girlsImage){ ?>
              <style>
                .home-girls:before{
                  background-image: url(<?php echo $girlsImage['url']; ?>) !important;
                }
              </style>
            <?php } ?>

            <div class="home-girls services-img dots-decor-right">
            <div class="container">
              <div class="row">
                <div class="home-girls--content col-lg-7 offset-lg-5">
                  <h3 class="home-girls--title"><?php the_field('advantages_title'); ?><span></span></h3>
                  <div class="home-girls--content_wrap page-content">
                    <?php the_field('advantages_content'); ?>
                  </div>
<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                </div><!-- /.col-lg-7 -->
              </div>
              </div>
            </div><!-- /.home-girls container-fluid -->
          <?php } ?>

          <div id="page_contact_form" class="container">
            <div class="row">
              <?php //$page_form = get_field('page_contact_form');?>
              <?php $page_form = get_field('services_contacts_form', $front__id);?>
              <?php if($page_form){ ?>
                <div class="order-form col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 order-decor">
                  <?php echo do_shortcode($page_form); ?>
                </div>
              <?php }?>

            </div>
          </div>
    </div><!-- article-single -->

  <?php endwhile; endif; ?>
<?php get_footer(); ?>
