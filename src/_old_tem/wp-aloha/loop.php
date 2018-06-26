<?php if (have_posts()): while (have_posts()) : the_post(); ?>
  <?php if ( has_post_thumbnail()) { ?>
    <a rel="nofollow" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('looper col-xl-3'); ?>  style="background-image: url(<?php echo the_post_thumbnail_url('medium'); ?>);">
  <?php } else { ?>
    <a rel="nofollow" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('looper col-xl-3'); ?>  style="background-image: url(<?php echo catchFirstImage(); ?>);">
  <?php }; ?>
    <span class="looper--date"><?php the_time('j F Y'); ?></span>
    <h2 class="looper--title"><?php the_title(); ?></h2>
  </a><!-- /looper -->
<?php endwhile; endif; ?>
