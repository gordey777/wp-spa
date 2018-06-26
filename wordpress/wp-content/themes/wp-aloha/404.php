<?php get_header(); ?>

      <div class="category-heading">
        <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>
        <h1 class="category--title"><?php _e( 'Page not found', 'wpeasy' ); ?></h1>
      </div><!-- /.category-heading col-xl-10 offset-1 -->

      <div class="container">
        <div class="row">

          <article id="post-<?php the_ID(); ?>" <?php post_class('about-page--content col-xl-8 offset-xl-2 col-lg-10 offset-lg-1'); ?>>
            <div class="article--content page-content">
              <h2><a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'wpeasy' ); ?></a></h2>
            </div><!-- /.article--content -->
          </article>

        </div>
      </div><!-- container -->
    </div><!-- article-single -->

<?php get_footer(); ?>

