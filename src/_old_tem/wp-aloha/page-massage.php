<?php /* Template Name: Massage Category Page */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <div class="article-single massasges-page">
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

          <?php $posts = get_field('massages_list'); if( $posts ): ?>
            <div class="massages--list col-xl-10 offset-1">
              <div class="row">
                <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                  <?php setup_postdata($post); ?>

                    <?php if ( has_post_thumbnail()) { ?>
                      <div title="<?php the_title(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('massage--item col-xl-4'); ?>  style="background-image: url(<?php echo the_post_thumbnail_url('medium'); ?>);">
                    <?php } else { ?>
                      <div title="<?php the_title(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('massage--item col-xl-4'); ?>  style="background-image: url(<?php echo catchFirstImage(); ?>);">
                    <?php }; ?>
                      <h2 class="massage--title"><?php the_title(); ?></h2>
                      <span class="massage--price"><?php the_field('price'); ?>1 750 грн</span>
                      <span class="massage--duration"><?php the_field('duration'); ?></span>
                    </div><!-- /.massage--item -->

                  <?php endforeach; ?>
                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
              </div><!-- /.row -->
            </div><!-- /.massages--list col-xl-12 -->
          <?php endif; ?>

          <div class="cp-order col-xl-6 offset-3">
            <form action="">
              <h4>Заказать консультацию</h4>
              <p>Оставьте свой номер, мы Вам перезвоним</p>
              <input type="text" placeholder="Имя">
              <label for="phones">Номер телефона</label>
              <input type="text" id="phones" placeholder="+380 (98) 32">
              <button class="btn btn-blue-half btn-submit">Заказать звонок</button>
            </form>
          </div><!-- cp-order -->

          <div class="col-xl-12 massages-content">
            <?php if (get_field('advantages_image')) { $image = get_field('advantages_image'); ?>
              <style>
                .mc-cont--first {background-image: url(<?php echo $image['url']; ?>);}
              </style>
              <div class="row mc-cont--first">
                <div class="mc-cont col-xl-6 offset-1 col-xl-5">
                  <h3 class="mc--title"><?php the_field('second_title'); ?><span></span></h3>
                  <?php the_content(); ?>
                </div><!-- /.mc-cont col-xl-6 offset-1 col-xl-5 -->
              </div><!-- /.row mc-cont--first -->
            <?php } ?>


            <?php if (get_field('third_block_image')) { $image = get_field('third_block_image'); ?>
              <style>
                .mc-cont--second {background-image: url(<?php echo $image['url']; ?>);}
              </style>
              <div class="row mc-cont--second">

                <div class="mcsc col-xl-7 offset-4">
                  <h3 class="mcsc--title"><?php the_field('third_title'); ?><span></span></h3>
                  <?php the_field('third_block_content'); ?>
                </div><!-- /.mcsc col-xl-7 offset-3 -->

              </div><!-- /.row mc-cont--second -->
            <?php } ?>

          </div><!-- /.col-xl-7 offset-1 -->


        </div>
      </div>
    </div><!-- article-single -->

  <?php endwhile; endif; ?>
<?php get_footer(); ?>
