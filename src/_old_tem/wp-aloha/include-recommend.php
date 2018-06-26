<div class="recommend-block">
  <div class="container-fluid">
    <div class="row">
      <h6 class="recommend-block--heading col-xl-12">Рекомендуем<span></span></h6>
      <div class="col-xl-1">
        <a href="#" class="recommend-block--nav recommend-block--prev"></a>
      </div><!-- /.col-xl-1 -->
      <div class="col-xl-10">
        <div class="row">

          <?php query_posts("showposts=4&cat=1"); ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php if ( has_post_thumbnail()) { ?>
              <a rel="nofollow" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('recommend-block--item col-xl-3'); ?>  style="background-image: url(<?php echo the_post_thumbnail_url('medium'); ?>);">
                <a href="" class="recommend-block--item col-xl-3" style="background-image: url(<?php echo $image; ?>);">
            <?php } else { ?>
              <a rel="nofollow" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('recommend-block--item col-xl-3'); ?>  style="background-image: url(<?php echo catchFirstImage(); ?>);">
            <?php }; ?>
              <span class="recommend--date">27.03.2018</span>
              <span class="recommend--title"><?php the_title(); ?></span>
            </a><!-- home-actions--item -->
            <?php endwhile; endif; ?>
          <?php wp_reset_query(); ?>

        </div><!-- /.row -->
      </div><!-- /.col-xl-10 -->
      <div class="col-xl-1">
        <a href="#" class="recommend-block--nav recommend-block--next"></a>
      </div><!-- /.col-xl-1 -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /.recommend-block -->
