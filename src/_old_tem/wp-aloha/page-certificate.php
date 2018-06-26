<?php /* Template Name: Certificate Page */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <div class="article-single certificate-page">
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

          <article id="post-<?php the_ID(); ?>" <?php post_class('cp-second col-xl-8 offset-2'); ?>>
            <div class="article--content">
              <h2 class="cp-second-headline"><?php the_field('second_title'); ?></h2>
              <?php the_content(); ?>
              <span class="cp-price"><?php the_field('price'); ?><span>Стоимость</span></span>
            </div><!-- /.article--content -->
            <button class="btn btn-blue-half btn-cp-order">Заказать</button>
          </article>

          <div class="col-xl-7 offset-1 cp-content">
            <h3 class="cpc--title"><?php the_field('advantages_title'); ?><span></span></h3>
            <div class="cpc--descr">
              <?php the_field('advantages_content'); ?>
            </div>
          </div><!-- /.col-xl-7 offset-1 -->
          <div class="cp-content--image col-xl-4">
            <?php if (get_field('advantages_image')) { $image = get_field('advantages_image'); ?>
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="article--content--img">
            <?php } ?>
          </div><!-- /.cp-content--image col-xl-4 -->

          <?php if (get_field('how_it_works_content')) { ?>
            <?php $image = get_field('how_it_works_image'); ?>
            <style>
              .cpac--image {background-image: url(<?php echo $image['url']; ?>);}
            </style>
            <div class="cpac--image col-xl-5">
            </div><!-- /.cpac--image col-xl-5 -->
            <div class="cpac-cont col-xl-6">
              <h3 class="cpac--title"><?php the_field('how_it_works_title'); ?><span></span></h3>
              <div class="article--content cpac-content">
                <?php the_field('how_it_works_content'); ?>
              </div><!-- /.article--content -->
            </div><!-- /.cpac-cont col-xl-5 offset-1 -->
          <?php } ?>

          <div class="cp-order col-xl-6 offset-3">
            <form action="">
              <h4>Заказать услугу</h4>
              <p>Оставьте свой номер, мы Вам перезвоним</p>
              <input type="text" placeholder="Имя">
              <label for="phones">Номер телефона</label>
              <input type="text" id="phones" placeholder="+380 (98) 32">
              <button class="btn btn-blue-half btn-submit">Заказать услугу</button>
            </form>
          </div><!-- cp-order -->

        </div>
      </div>
    </div><!-- article-single -->

  <?php endwhile; endif; ?>
<?php get_footer(); ?>
