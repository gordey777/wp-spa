<?php /* Template Name: Reviews Page */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
<?php $front__id = (int)(get_option( 'page_on_front' )); ?>
<?php $page__id = get_the_ID(); ?>


    <div class="article-single reviews-page heading-decor">
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

    </div><!-- article-single -->

    <?php
    $args = array(
      'author_email'        => '',
      'author__in'          => '',
      'author__not_in'      => '',
      'include_unapproved'  => '',
      'fields'              => '',
      'comment__in'         => '',
      'comment__not_in'     => '',
      'karma'               => '',
      'number'              => '',
      'offset'              => '',
      'no_found_rows'       => true,
      'orderby'             => '',
      'order'               => 'DESC',
      'status'              => 'approve',
      'type'                => '',
      'type__in'            => '',
      'type__not_in'        => '',
      'user_id'             => '',
      'search'              => '',
      'count'               => false,
      'meta_key'            => '',
      'meta_value'          => '',
      'meta_query'          => '',
      'date_query'          => null, // See WP_Date_Query
      'hierarchical'        => false,
      'update_comment_meta_cache'  => true,
      'update_comment_post_cache'  => false,
    );
    if( $comments = get_comments( $args ) ): ?>
      <div class="reviews-list">

          <div class="container">
            <div class="row">
              <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                <div class="row">
                  <?php foreach( $comments as $comment ):
                    $attachment = get_comment_meta( $comment->comment_ID , 'comment_image_reloaded', true );
                    $avatar_url = '';
                    $ava_url = $comment->comment_author_url;
                    //var_dump($attachment);
                    if ($attachment){
                      $avatar_url = 'style="background-image: url(' . wp_get_attachment_url($attachment[0]) .');"';
                    } else if ($ava_url) {
                      $avatar_url = 'style="background-image: url(' . $ava_url .');"';
                    } else {
                      $avatar_url = 'style="background-image: url(' . get_template_directory_uri() . '/img/noimage.jpg );"';
                    }
                      ?>
                    <div class="col-12 reviews--item-wrap">
                      <div class="home-reviews--item">
                        <div class="home-reviews--img" <?php echo $avatar_url; ?>></div>

                        <div class="home-reviews--cont">
                          <span class="home-reviews--name"><?php echo $comment->comment_author ;?></span>
                          <span class="home-reviews--title"><?php //echo $comment->comment_author_url ;?></span>
                          <p><?php echo $comment->comment_content ;?></p>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
      </div><!-- /.reviews-list -->
    <?php endif; ?>

    <div class="container">
      <div class="row">
        <div class="order-form col-xl-6 offset-xl-3 col-lg-8 offset-lg-2  order-decor">

                <?php
                if (function_exists("get_cir_upload_field")) { $avatarimg = get_cir_upload_field(); }
                  $customform = array(
                    'fields'               => array(
                                                'author' => '<p><span class="order-title">' . get_field('reviews_form_title') . '</span></p><div class="input-wrap"><label for="author">' . get_field('reviews_name_label') . '</label><input id="author" class="text-input" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . 'placeholder="' . get_field('reviews_name_label') . '" ></div>',
                                              ),
                    'comment_field'        => '<div class="input-wrap comment-form-comment"><label for="comment">' . get_field('reviews_text_label') . '</label><textarea id="comment" name="comment" placeholder="' . get_field('reviews_text_label') . '" cols="45" rows="5"  aria-required="true" required="required"></textarea></div><div class="rev-avatar-wrap"><div class="top-label">' . get_field('reviews_img_label') . '</div>' . $avatarimg .'</div>',
                    'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
                    'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( '<a href="%1$s" aria-label="Logged in as %2$s. Edit your profile.">Logged in as %2$s</a>. <a href="%3$s">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
                    'comment_notes_before' => '',
                    'comment_notes_after'  => '',
                    'id_form'              => 'commentform',
                    'id_submit'            => 'submit',
                    'class_form'           => 'comment-form',
                    'class_submit'         => 'submit',
                    'name_submit'          => 'submit',
                    'title_reply'          => '',
                    'title_reply_to'       => __( 'Leave a Reply to %s' ),
                    'title_reply_before'   => '',
                    'title_reply_after'    => '',
                    'cancel_reply_before'  => ' <small>',
                    'cancel_reply_after'   => '</small>',
                    'cancel_reply_link'    => __( 'Cancel reply' ),
                    'label_submit'         => get_field('reviews_submit_label'),
                    'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s btn btn-blue-half btn-submit" value="%4$s" />',
                    'submit_field'         => '<div class="btn--wrap form-submit">%1$s %2$s</div>',
                    'format'               => 'xhtml',
                  );
                comment_form( $customform );
                ?>

        </div>
      </div>
    </div>


  <?php endwhile; endif; ?>
<?php get_footer(); ?>
