<?php get_header(); ?>

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <div class="article-single about-page">

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

          <article id="post-<?php the_ID(); ?>" <?php post_class('about-page--content col-xl-8 offset-xl-2 col-lg-10 offset-lg-1'); ?>>
            <div class="article--content page-content">
              <?php the_content(); ?>
            </div><!-- /.article--content -->
          </article>

        </div>
      </div><!-- container -->
    </div><!-- article-single -->

  <?php endwhile; endif; ?>
<?php get_footer(); ?>

