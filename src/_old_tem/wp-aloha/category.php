<?php get_header(); ?>

  <div class="container">
    <div class="row">
      <div class="category-heading col-xl-10 offset-1">
        <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>
        <h2 class="category--title"><?php the_category(', '); ?></h2>
      </div><!-- /.category-heading col-xl-10 offset-1 -->

      <?php $term = get_queried_object(); if (get_field('category_heading_subtitle', "term_" . $term->term_id)) { ?>
        <div class="category-image col-xl-12">
          <span class="category-image--heading"><?php the_field('category_heading_subtitle', "term_" . $term->term_id); ?></span>
          <h1 class="category-image--title"><?php the_field('category_heading_title', "term_" . $term->term_id); ?></h1>
          <div class="category-image--descr"><?php echo category_description(); ?></div>
        </div><!-- category-image -->
      <?php } ?>

      <?php get_template_part('loop'); ?>
      <?php get_template_part('pagination'); ?>

    </div><!-- /.row -->
  </div><!-- /.container -->

<?php get_footer(); ?>
