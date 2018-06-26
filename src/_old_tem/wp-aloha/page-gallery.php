<?php /* Template Name: Gallery Page */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <div class="article-single certificate-page">
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
