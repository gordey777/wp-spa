<?php
/*
Template Name:  Product Page
Template Post Type: post, page
*/
get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <div class="article-single product-page">
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

          <?php $posts = get_field('products_list'); if( $posts ): ?>
            <div class="products--list col-xl-10 offset-1">
              <div class="row">

                <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                  <?php setup_postdata($post); ?>

                    <?php if ( has_post_thumbnail()) { ?>
                      <div title="<?php the_title(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('products--item col-xl-3'); ?>  style="background-image: url(<?php echo the_post_thumbnail_url('medium'); ?>);">
                    <?php } else { ?>
                      <div title="<?php the_title(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('products--item col-xl-3'); ?>  style="background-image: url(<?php echo catchFirstImage(); ?>);">
                    <?php }; ?>
                      <div class="product--content">
                        <h2 class="product--title"><?php the_title(); ?></h2>
                        <?php wpeExcerpt('wpeExcerpt20'); ?>
                        <span class="product-price"><?php the_field('price'); ?></span>
                      </div><!-- /.product--price product--content -->
                    </div><!-- /.products--item -->

                  <?php endforeach; ?>
                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

              </div><!-- /.row -->
            </div><!-- /.products--list col-xl-10 offset-1 -->
          <?php endif; ?>

          <div class="cp-order col-xl-6 offset-3">
            <form action="">
              <h4>Заказать консультацию</h4>
              <p>Оставьте свой номер, мы Вам перезвоним</p>
              <input type="text" placeholder="Имя">
              <label for="phones">Номер телефона</label>
              <input type="text" id="phones" placeholder="+380 (98) 32">
              <button class="btn btn-blue-half btn-submit">Заказать звонок</button>
            </form>
          </div><!-- cp-order -->

          <article id="post-<?php the_ID(); ?>" <?php post_class('col-xl-8 offset-2'); ?>>
            <h2 class="product-second-headline"><?php the_field('second_title'); ?></h2>
            <div class="article--content">
              <?php the_content(); ?>
            </div><!-- /.article--content -->
          </article>

        </div>
      </div>
    </div><!-- article-single -->

  <?php endwhile; endif; ?>
<?php get_footer(); ?>

