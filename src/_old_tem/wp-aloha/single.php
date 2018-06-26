<?php get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <div class="article-single">
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
            <span class="heading-cat"><?php the_category(', '); ?></span>
            <span class="heading-date"><?php the_time('d F Y'); ?></span>
          </div><!-- /.article-heading -->

          <article id="post-<?php the_ID(); ?>" <?php post_class('col-xl-8 offset-2'); ?>>
            <<?php the_field('type_of_first_block_heading'); ?>><?php the_field('first_block_heading'); ?></<?php the_field('type_of_first_block_heading'); ?>>
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

        <?php if (get_field('gallery')) { ?>
          <div class="gallery-block col-xl-8 offset-2">

            <?php $images = get_field('gallery'); if( $images ): ?>
              <ul class="gallery--container masonry">
                <?php foreach( $images as $image ): ?>
                  <li class="gallery--item item">
                    <a rel="lightbox" href="<?php echo $image['url']; ?>">
                      <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>

          </div><!-- /.gallery-block col-xl-8 offset-1 -->
        <?php }; ?>

      </div><!-- /.container-fluid -->
    </div><!-- /.article-single -->

    <?php include(TEMPLATEPATH.'/include-recommend.php'); ?>

  <?php endwhile; endif; ?>
<?php get_footer(); ?>
