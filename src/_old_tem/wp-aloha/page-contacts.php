<?php /* Template Name: Contacts Page */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <div class="home-contacts">
      <div class="container">
        <div class="row">
          <h1 class="home-contacts--title">Контакты<span></span></h1>
        </div><!-- /.row -->
      </div><!-- /.container -->
      <div class="container">
        <div class="row">
          <div class="home-contacts--map col-xl-6">
            <?php $location = get_field('location'); if( !empty($location) ): ?>
            <div class="acf-map">
              <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
            </div>
            <?php endif; ?>
          </div><!-- /.home-contacts--map col-lg-6 -->
          <div class="home-contacts--adress col-xl-6">
            <?php the_content(); ?>
          </div><!-- /.home-contacts--adress col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.home-contacts -->

  <?php endwhile; endif; ?>
<?php get_footer(); ?>
