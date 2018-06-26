<?php /* Template Name: Contacts Page */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
<?php $front__id = (int)(get_option( 'page_on_front' )); ?>


    <div class="page-contacts heading-decor">
      <div class="article-heading heading-noimg container">
        <div class="row">
          <div class="headind--wrap col-lg-10 offset-lg-1">
            <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>
            <h1 class="article-title"><?php the_title(); ?></h1>
          </div>
        </div>
      </div><!-- /.article-heading -->
      <div class="container contacts-container">
        <div class="row">
          <div class="home-contacts--map  col-lg-6">
            <?php $location = get_field('location');
            if( !empty($location) ): ?>
              <div class="acf-map">
                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
              </div>
            <?php endif; ?>
          </div><!-- /.home-contacts--map col-lg-6 -->
          <div class="home-contacts--adress col-lg-4 offset-lg-1">
            <?php the_content(); ?>

          </div><!-- /.home-contacts--adress col-lg-6 -->
                      <button class="btn btn-blue-half home-contacts--order ajax-order" data-toggle="modal" data-target="#contactFormModal" data-formcode='<?php the_field('modal_contact_form'); ?>' data-formtarg=""><?php the_field('label_callback', $front__id); ?><span></span></button>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.home-contacts -->

  <?php endwhile; endif; ?>
<?php get_footer(); ?>
