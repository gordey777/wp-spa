  </section><!-- /section -->
</div><!-- /wrapper -->
<?php $front__id = (int)(get_option( 'page_on_front' )); ?>
<?php $page__id = get_the_ID(); ?>
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
	<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b48a659715c73e1"></script>
</footer><!-- /footer -->


<!-- Modal -->
<div class="modal fade" id="contactFormModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div id="modal_form_body" class="modal-content order-form">
      <?php //echo do_shortcode('[contact-form-7 id="3943" title="Callback Модальная Форма"]');?>
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
