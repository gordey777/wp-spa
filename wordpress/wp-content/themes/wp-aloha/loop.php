<?php if (have_posts()): while (have_posts()) : the_post(); ?>
   <?php
   $catsList = '';
   if( $categories = get_the_category( ) ) {
    foreach ( $categories as $key=>$cat ) {
        $postCats[$key] = $cat->name;
    }
    $catsList = implode(', ', $postCats);
  }

  if ( has_post_thumbnail() ) {
    $item_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
  } else {
    $item_image = catchFirstImage();
  }
  ?>

  <div class="col-xl-3 col-md-4 col-sm-6 looper--wrap">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('looper massage--item'); ?> >
      <div class="massage--img ratio" data-hkoef=".6" style="background-image: url(<?php echo $item_image ?>);"></div>
      <div class="massage--content">
        <span class="looper--date"><?php the_time('j F Y'); ?></span>
        <span class="looper--title"><?php the_title(); ?></span>
        <span class="looper--cats"><?php echo $catsList; ?></span>
      </div>
    </a><!-- /.looper -->
  </div><!-- /.massage--wrap -->

<?php endwhile; endif; ?>
