<div class="comments">

  <a id="add-rev" href="#modalRew">ДОБАВИТЬ ОТЗЫВ</a>

  <?php if (post_password_required()) : ?>
    <p>
      <?php _e( 'Post is password protected. Enter the password to view any comments.', 'wpeasy' ); ?>
    </p>
    </div>

  <?php return; endif; ?>

  <?php if (have_comments()) : ?>

    <ul class="comments-blok">
      <?php wp_list_comments( ); ?>
    </ul><!-- /.comments-blok -->

  <?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

    <p><?php _e( 'Comments are closed here.', 'wpeasy' ); ?></p>

  <?php endif; ?>

</div>
