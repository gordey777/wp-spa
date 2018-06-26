<?php /* Template Name: About Page */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <div class="article-single about-page">
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
      </div>

      <div class="container">
        <div class="row">

          <article id="post-<?php the_ID(); ?>" <?php post_class('about-page--content col-xl-8 offset-2'); ?>>
            <div class="article--content">
              <?php the_content(); ?>
            </div><!-- /.article--content -->
          </article>

          <?php if( have_rows('team') ):  ?>
            <div class="col-xl-12 about-page--team">

              <h3 class="about-page--team-title">Наша команда<span></span></h3>

              <div class="row">
                <?php while ( have_rows('team') ) : the_row(); ?>

                  <div class="about-page--item col-xl-3">
                    <?php if (get_sub_field('image')) { $image = get_sub_field('image'); ?>
                      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="team--item-img">
                    <?php } ?>
                    <h3 class="team--item-title"><?php the_sub_field('name'); ?><span><?php the_sub_field('title'); ?></span></h3>
                  </div><!-- /.about-page--item col-xl-3 -->
                <?php endwhile;?>

              </div><!-- /.row -->
            </div><!-- /.col-xl-12 about-page--team -->
          <?php endif; ?>

        </div>
      </div><!-- container -->
    </div><!-- article-single -->

  <?php endwhile; endif; ?>
<?php get_footer(); ?>
