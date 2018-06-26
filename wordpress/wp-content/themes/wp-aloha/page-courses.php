<?php /* Template Name: Courses Page */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <div class="article-single courses-page">
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



    <article id="post-<?php the_ID(); ?>" <?php post_class('home-content'); ?>>
      <div class="container">
        <div class="row">
          <div class="home-content--item col-lg-7">

            <h2 class="home-content--title"><?php the_field('second_title'); ?></h2>
            <?php the_content(); ?>
          </div><!-- /.home-content--item col-xl-8 -->
          <?php $image = get_field('content_image');

            if ($image){
              $bgstyle = 'style = "background-image: url(' . $image['url'] . ');"';
            } else {
              $bgstyle = "";
            }
          ?>
          <div class="home-content--img col-lg-5" <?php echo $bgstyle ;?>>
          </div><!-- /.home-content--img col-xl-4 -->
        </div>
      </div>
    </article><!-- /.home-content -->


      <div class="container">
        <div class="row">

          <?php if( have_rows('courses') ):  ?>
            <div class="courses--list col-xl-12">
              <div class="row">
                <?php while ( have_rows('courses') ) : the_row(); ?>

                <div class="col-lg-6">
                  <div class="courses--item clearfix">
                    <?php if (get_sub_field('image')) { $image = get_sub_field('image'); ?>
                      <!-- <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="courses--item-img"> -->
                      <div class="courses--item-img" style="background-image:url(<?php echo $image['url']; ?>);"></div>
                    <?php } ?>
                    <div class="courses--item-right">
                      <span class="courses--item-title"><?php the_sub_field('title'); ?></span>
                      <span class="courses--item-price"><?php the_sub_field('price'); ?></span>
                      <div class="courses--item-content"><?php the_sub_field('content'); ?></div>
                      <span class="courses--item-date"><?php the_sub_field('date'); ?></span>
                      <span class="courses--item-count"><?php the_sub_field('count'); ?></span>
                      <button class="courses--item-order btn btn-blue-half  ajax-order" data-toggle="modal" data-target="#contactFormModal" data-formcode='<?php the_field('modal_contact_form'); ?>' data-formtarg="<?php the_sub_field('title'); ?>"><?php the_field('label_register'); ?></button>
                   </div><!-- /.courses--item-right -->

                  </div><!-- /.courses--item -->
                </div><!-- /.col-xl-6 -->

                <?php endwhile;?>
              </div><!-- /.row -->
            </div><!-- /.courses--list -->
          <?php endif; ?>

          <div class="col-lg-10 offset-lg-1">
            <div class=" courses-page--content">

                <div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1">
                  <h3 class="courses-page--title"><?php the_field('seo_title'); ?><span></span></h3>
                  <div class="courses-page--descr">
                    <?php the_field('seo_content'); ?>
                  </div>
              </div>

            </div>
          </div><!-- /.col-xl-7 offset-1 -->

        </div>
      </div>
    </div><!-- article-single -->

  <?php endwhile; endif; ?>
<?php get_footer(); ?>
