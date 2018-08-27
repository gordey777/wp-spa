<?php /* Template Name: About Page 2 */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <div class="article-single about-page">
          <?php if (get_field('header_image')) {
            $image = get_field('header_image');
            $style = 'style="background-image: url(' . $image['url'] .');"';
          } else {
            $style = '';
          }?>
      <div class="article-heading container" <?php echo $style; ?> >
        <div class="row">
          <div class="headind--wrap col-lg-10 offset-lg-1">
            <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>
            <h1 class="article-title"><?php the_title(); ?></h1>
          </div>
        </div>
      </div><!-- /.article-heading -->

      <div class="container">
        <div class="row">

          <article id="post-<?php the_ID(); ?>" <?php post_class('about-page--content col-xl-8 offset-2'); ?>>
            <div class="article--content">
              <?php the_content(); ?>
            </div><!-- /.article--content -->
          </article>

          <?php if( have_rows('team') ):  ?>
            <div class="col-xl-12 about-page--team">

              <h3 class="about-page--team-title"><?php the_field('team_title'); ?><span></span></h3>

              <div class="row">
                <?php while ( have_rows('team') ) : the_row(); ?>
                  <?php $team_image = get_sub_field('image');?>
                  <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="about-page--item ratio" data-hkoef="1.4">
                      <div class="team--item-img" style="background-image: url(<?php echo $team_image['sizes']['medium']; ?>);"></div>
                      <span class="team--item-title"><?php the_sub_field('name'); ?><span><?php the_sub_field('title'); ?></span></span>
                    </div><!-- /.about-page--item col-xl-3 -->
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
