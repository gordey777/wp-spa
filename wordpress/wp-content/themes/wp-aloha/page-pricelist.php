<?php /* Template Name: Prices Page */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class('article-single pricelist-page'); ?>>

      <div class="article-heading heading-noimg container">
        <div class="row">
          <div class="headind--wrap col-lg-10 offset-lg-1">
            <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>
            <h1 class="article-title"><?php the_title(); ?></h1>
          </div>
        </div>
      </div><!-- /.article-heading -->



      <?php $servArgs = array(
          'post_type'    => 'any',
          'numberposts' => -1,
          'posts_per_page' => -1,
          'orderby'     => 'title',
          'order'       => 'ASC',
          'post_status'  => 'publish',
          'meta_key' => '_wp_page_template',
          'meta_value' => 'page-massage.php',
            //'post__not_in' => array(),
          );
      $servisesCat = new WP_Query( $servArgs );

      if($servisesCat->have_posts()) :
      $i = 0;
      ?>
        <div class='price--container container'>
          <div class='row'>
            <div class='price--tab-nav col-lg-12'>
              <?php
              while ( $servisesCat->have_posts() ) {
                $servisesCat->the_post();
                if($i == 0){
                  $activeClass = 'active';
                } else{
                  $activeClass = '';
                }
                ?>
                  <a class="price--nav_item <?php echo $activeClass; ?>" href='#price_tab-<?php the_ID(); ?>'><?php the_title(); ?></a>
                <?php
                $i++;
              }
              wp_reset_postdata();
              ?>
            </div>


            <div class="price--table col-lg-12">
              <?php $j = 0; ?>
                <?php $servisesCat = new WP_Query( $servArgs );
                while ( $servisesCat->have_posts() ) {
                  $servisesCat->the_post();
                  $servID = $post->ID;
                  if($j == 0){
                    $activeClass = 'active';
                  } else{
                    $activeClass = '';
                  }
                  ?>
                  <?php $itemArgs = array(
                      'post_type'    => 'any',
                      'meta_key' => '_wp_page_template',
                      'meta_value' => 'page-massage.php',
                      'meta_compare' => '!=',
                      'numberposts' => -1,
                      'posts_per_page' => -1,
                      'orderby'     => 'title',
                      'order'       => 'ASC',
                      'post_parent'       => $servID,
                      'post_status'  => 'publish',

                  );

                  $servises = new WP_Query( $itemArgs ); ?>

                  <div id="price_tab-<?php the_ID(); ?>" class="row price-tab <?php echo $activeClass; ?>">
                    <?php
                    while ( $servises->have_posts() ) {
                        $servises->the_post(); ?>
                      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="pricelist--item col-md-10 offset-md-1">
                        <div class="row pricelist--row">
                          <div class="pricelist--item_title col-md-5"><?php the_title(); ?></div>
                          <div class="pricelist--item_time col-md-4 col-6"><p><?php the_field('duration'); ?></p><span><?php the_field('duration_label'); ?></span></div>
                          <div class="pricelist--item_price col-md-3 col-6"><p><?php the_field('price'); ?></p><span><?php the_field('price_label'); ?></span></div>
                        </div>
                      </a>
                    <?php
                    }
                    wp_reset_postdata();
                    ?>
                  </div>
                <?php
                $j++;
              }
              wp_reset_postdata();
              ?>
            </div>
          </div><!-- /.row -->
        </div>
      <?php endif; ?>

    </div><!-- article-single -->

  <?php endwhile; endif; ?>
<?php get_footer(); ?>
