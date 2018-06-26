<?php get_header(); ?>
  <?php
  $curr__ID = get_queried_object()->cat_ID;
  $curr_term = 'category_' . $curr__ID;
  $front__id = (int)(get_option( 'page_on_front' ));
  $cat_title =  get_queried_object()->name;
  ?>
 <div class="heading-decor">
  <div class="container">
      <div class="category-heading">
        <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>
        <p class="category--title"><?php echo $cat_title; ?></p>
      </div><!-- /.category-heading col-xl-10 offset-1 -->


      <?php $term = get_queried_object(); if (get_field('category_heading_subtitle', "term_" . $term->term_id)) { ?>
        <div class="category-image">
          <span class="category-image--heading"><?php the_field('category_heading_subtitle', "term_" . $term->term_id); ?></span>
          <h1 class="category-image--title"><?php the_field('category_heading_title', "term_" . $term->term_id); ?></h1>
          <div class="category-image--descr"><?php echo category_description(); ?></div>
        </div><!-- category-image -->
      <?php } ?>

    <div class="row looper--wrap">
      <?php get_template_part('loop'); ?>
      <?php get_template_part('pagination'); ?>
    </div><!-- /.row -->
  </div><!-- /.container -->
</div>
<?php get_footer(); ?>
