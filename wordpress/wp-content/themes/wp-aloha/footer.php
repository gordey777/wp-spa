  </section><!-- /section -->
</div><!-- /wrapper -->
<?php $front__id = (int)(get_option( 'page_on_front' )); ?>
<footer role="contentinfo">
  <div class="container">
    <div class="row">

      <div class="footer-copy col-lg-4 col-md-6 col-sm-4">
          <div class="footer--logo">
              <?php if ( !is_front_page() && !is_home() ){ ?>
                <a href="<?php echo home_url(); ?>">
              <?php } else { ?>
                <span>
              <?php } ?>

              <?php if ( !is_front_page() && !is_home() ){ ?>
                </a>
              <?php } else { ?>
                </span>
              <?php } ?>
          </div><!-- /header--logo -->
        <p class="copyright"><?php the_field('footer_content', $front__id); ?></p><!-- /copyright -->
      </div><!-- /.footer-copy col-xl-4 -->

      <?php if ( is_active_sidebar('widgetarea1') ) : ?>
        <?php dynamic_sidebar( 'widgetarea1' ); ?>
      <?php endif; ?>


      <?php $i = 0;
      if( have_rows('footer_text', $front__id) ): while ( have_rows('footer_text', $front__id) ) : the_row(); ?>
        <div class="footer--text col-lg-2 col-md-3 col-sm-4 col-6">
          <span class="footer-widget--title"><?php the_sub_field('title'); ?></span>
          <div class="textwidget"><?php the_sub_field('content'); ?></div>
          <?php if( have_rows('footer_socials', $front__id) && $i == 1): ?>
            <div class="footer-socials">
              <?php while ( have_rows('footer_socials', $front__id) ) : the_row(); ?>
                <a href="<?php the_sub_field('link'); ?>" class="social-item fa <?php the_sub_field('icon'); ?>" title="<?php the_sub_field('title'); ?>"></a>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
      <?php $i++; endwhile; endif; ?>
    </div><!-- /.row -->
  </div><!-- /.container -->
</footer><!-- /footer -->


<!-- Modal -->
<div class="modal fade" id="contactFormModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div id="modal_form_body" class="modal-content order-form">
      <?php //echo do_shortcode('[contact-form-7 id="3943" title="Callback Модальная Форма"]');?>
    </div>
  </div>
</div>

<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div id="modal_form_body" class="modal-content order-form">
      <div id="respond" class="comment-respond">
        <form action="/wp-comments-post.php" method="post" id="commentform" class="comment-form" enctype="multipart/form-data">
        <span class="order-title"><?php the_field('reviews_form_title'); ?></span>
        <div class="input-wrap">
        <label for="modform-name"><?php the_field('reviews_name_label'); ?></label>
          <input type="text" name="author" value="" class="text-input" id="author"  required="required" placeholder="<?php the_field('reviews_name_label'); ?>" >
        </div>
        <div class="input-wrap">
        <label for="modform-tel"><?php the_field('reviews_mail_label'); ?></label><br>
          <input type="text" name="email" value="" class="text-input" id="email" placeholder="<?php the_field('reviews_mail_label'); ?>">
        </div>
        <div class="input-wrap comment-form-comment">
          <textarea id="comment" name="comment" placeholder="<?php the_field('reviews_text_label'); ?>" cols="45" rows="5" required="required"></textarea>
        </div>
        <div id="comment-image-reloaded-wrapper"><p id="comment-image-reloaded-error"></p>
          <label for="comment_image_reloaded_<?php echo $front__id; ?>"><?php the_field('reviews_img_label'); ?> (GIF, PNG, JPG, JPEG):</label>
          <p class="comment-image-reloaded">
            <input type="file" name="comment_image_reloaded_13[]" id="comment_image_reloaded">
          </p>
        </div><!-- #comment-image-wrapper -->
        <div class="btn--wrap form-submit">
          <input name="submit" type="submit" id="submit" class="submit btn btn-blue-half btn-submit" value="<?php the_field('reviews_submit_label'); ?>">
          <input type="hidden" name="comment_post_ID" value="<?php echo $front__id; ?>" id="comment_post_ID">
          <input type="hidden" name="comment_parent" id="comment_parent" value="0">
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

  <script>
    var frontid = <?php echo $front__id; ?>;
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZF31krTQH_5QnEpdIsEgmsBV-Iy884rE"></script>

  <?php wp_footer(); ?>

    <style>
      .lds-ring {position:absolute;z-index:-1;display:none!important;}
    </style>

</body>
</html>
