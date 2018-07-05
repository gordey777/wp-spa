<?php /* Template Name: Reviews Page */ get_header(); ?>
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



<?php comments_template('/reviews.php', true); ?>
    </article>

        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.home-contacts -->

  <?php endwhile; endif; ?>
<?php get_footer(); ?>


    <?php //old front reviews

    $posts = get_field('reviews');
     if( $posts ): ?>

        <div class="slider--wrap">
          <div class="hr-slide--container container owl-carousel">
            <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
              <?php setup_postdata($post); ?>
                <div class="home-reviews--item">
                  <div class="home-reviews--img ratio" data-hkoef="1.5" data-hkoefxs=".8" style="background-image: url(<?php echo the_post_thumbnail_url('medium'); ?>);"></div>

                  <div class="home-reviews--cont">
                    <span class="home-reviews--name"><?php the_title(); ?></span>
                    <span class="home-reviews--title"><?php the_field('title'); ?></span>
                    <?php the_content(); ?>
                  </div>
                </div>

            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
          </div><!-- /.hr-slide--container col-xl-10 -->
        </div>
<?php endif; ?>
