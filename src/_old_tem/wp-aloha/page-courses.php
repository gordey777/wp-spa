<?php /* Template Name: Courses Page */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <div class="article-single courses-page">
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
        </div>
      </div><!-- container-fluid -->

      <div class="container">
        <div class="row">

          <article id="post-<?php the_ID(); ?>" <?php post_class('col-xl-12 courses-page--article'); ?>>
            <h2 class="cp-second-headline"><?php the_field('second_title'); ?><span></span></h2>
            <?php if (get_field('content_image')) { $image = get_field('content_image'); ?>
              <style>.article--content {background-image: url(<?php echo $image['url']; ?>);}</style>
            <?php } ?>
            <div class="article--content">
              <?php the_content(); ?>
            </div><!-- /.article--content -->
          </article>

          <?php if( have_rows('courses') ):  ?>
            <div class="courses--list col-xl-12">
              <div class="row">
                <?php while ( have_rows('courses') ) : the_row(); ?>

                <div class="col-xl-6">
                  <div class="courses--item clearfix">
                    <?php if (get_sub_field('image')) { $image = get_sub_field('image'); ?>
                      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="courses--item-img">
                    <?php } ?>
                    <div class="courses--item-right">
                      <h3 class="courses--item-title"><?php the_sub_field('title'); ?></h3>
                      <span class="courses--item-price"><?php the_sub_field('price'); ?></span>
                      <div class="courses--item-content"><?php the_sub_field('content'); ?></div>
                      <span class="courses--item-date"><?php the_sub_field('date'); ?></span>
                      <span class="courses--item-count"><?php the_sub_field('count'); ?></span>
                      <button class="courses--item-order btn btn-blue-half">записаться на курс</button>
                   </div><!-- /.courses--item-right -->

                  </div><!-- /.courses--item -->
                </div><!-- /.col-xl-6 -->

                <?php endwhile;?>
              </div><!-- /.row -->
            </div><!-- /.courses--list -->
          <?php endif; ?>

          <div class="col-xl-10 offset-1 courses-page--content">
            <h3 class="courses-page--title"><?php the_field('seo_title'); ?><span></span></h3>
            <div class="courses-page--descr">
              <?php the_field('seo_content'); ?>
            </div>
          </div><!-- /.col-xl-7 offset-1 -->

        </div>
      </div>
    </div><!-- article-single -->

  <?php endwhile; endif; ?>
<?php get_footer(); ?>
