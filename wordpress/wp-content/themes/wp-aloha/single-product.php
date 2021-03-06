<?php get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <div class="article-single">

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
            <span class="heading-date"><?php the_time('d F Y'); the_field('price'); ?></span>
          </div>
        </div>
      </div><!-- /.article-heading -->

      <div class="container">
        <div class="row">
          <article id="post-<?php the_ID(); ?>" <?php post_class('col-xl-8 offset-2'); ?>>
            <div class="article--content">
              <?php the_content(); ?>
            </div><!-- /.article--content -->
            <?php if (get_field('blockquote')) { ?>
              <blockquote>
                <?php the_field('blockquote'); ?>
              </blockquote>
            <?php } ?>
            <?php if (get_field('image_first_block_bottom')) { $image = get_field('image_first_block_bottom'); ?>
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="article--content--img">
            <?php } ?>

            <?php if( have_rows('additional_blocks') ): while ( have_rows('additional_blocks') ) : the_row(); ?>

              <?php if (get_sub_field('heading')) { ?>
                <<?php the_sub_field('heading_type'); ?>><?php the_sub_field('heading'); ?></<?php the_sub_field('heading_type'); ?>>
              <?php } ?>

              <?php if (get_sub_field('content')) { ?>
                <div class="article--content">
                  <?php the_sub_field('content'); ?>
                </div><!-- /.article--content -->
              <?php } ?>

              <?php if (get_sub_field('after_block_image')) { $image = get_field('after_block_image'); ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="article--content--img">
              <?php } ?>

            <?php endwhile; endif; ?>
          </article>

          <button class="btn btn-blue-half btn-share">расказать друзьям</button>

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.article-single -->




      <div class="container">
        <div class="row">
          <article id="post-<?php the_ID(); ?>" <?php post_class('about-page--content col-xl-8 offset-xl-2 col-lg-10 offset-lg-1'); ?>>
            <div class="article--content page-content">
              <?php the_content(); ?>
            </div><!-- /.article--content -->
          </article>
        </div>
      </div><!-- container -->
      <div class="container reviews-btn-wrap">
        <a href="#commentform" class="btn btn-blue-half reviews-btn"><?php the_field('reviews_btn'); ?></a>
      </div>
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





  <?php endwhile; endif; ?>
<?php get_footer(); ?>
