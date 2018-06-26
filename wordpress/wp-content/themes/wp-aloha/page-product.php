<?php
/*
Template Name:  ProductPage
Template Post Type: post, page
*/
get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <div class="article-single product-page">
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
          <?php $posts = get_field('products_list'); if( $posts ): ?>
            <div class="products--list col-12">
              <div class="row">

                <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                  <?php setup_postdata($post); ?>
                    <?php if ( has_post_thumbnail()) {
                      $bg_image = 'style="background-image: url('. get_the_post_thumbnail_url(get_the_ID(), 'medium') .');"';
                    } else {
                      $bg_image = 'style="background-image: url('. catchFirstImage() .');"';
                    }; ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                      <div id="post-<?php the_ID(); ?>" <?php post_class('products--item ratio'); ?> data-hkoef="1.2">
                        <div class="product--img" <?php echo $bg_image; ?>></div>
                        <div class="product--content">
                          <span class="product--title"><?php the_title(); ?></span>
                          <span class="product-desc"><?php wpeExcerpt('wpeExcerpt20'); ?></span>
                          <span class="product-price"><?php the_field('price'); ?></span>
                        </div><!-- /.product--price product--content -->
                      </div><!-- /.products--item -->
                    </div>
                  <?php endforeach; ?>
                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

              </div><!-- /.row -->
            </div><!-- /.products--list col-xl-10 offset-1 -->
          <?php endif; ?>


          <?php $page_form = get_field('page_contact_form');?>
          <?php if($page_form){ ?>
            <div id="page_contact_form" class="order-form col-lg-6 offset-lg-3 col-md-8 offset-md-2 order-decor">
              <?php echo do_shortcode($page_form); ?>
            </div>
          <?php }?>

          <article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-10 offset-lg-1'); ?>>
            <div class=" courses-page--content">
                <div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1">
                  <h2 class="courses-page--title"><?php the_field('second_title'); ?><span></span></h2>
                  <div class="courses-page--descr">
                    <?php the_content(); ?>
                  </div>
              </div>
            </div><!-- /.col-xl-7 offset-1 -->
          </article>

        </div>
      </div>
    </div><!-- article-single -->

  <?php endwhile; endif; ?>
<?php get_footer(); ?>

