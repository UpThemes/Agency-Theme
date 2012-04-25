<?php

function agency_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; ?>

  <div <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">

    <div class="comment-body clearfix">

      <div class="image-wrap">
        <?php echo get_avatar( $comment->comment_author_email, 48 ); ?>
      </div><!--/.image-wrap-->


      <div class="comment-wrap">

        <strong><?php comment_author_link(); ?></strong> <?php echo __('says'); ?><br/>

        <?php if ($comment->comment_approved == '0') : ?>
           <em><?php _e('Your comment is awaiting moderation.') ?></em>
           <br />
        <?php endif; ?>
  
        <?php comment_text() ?>
  

        <div class="comment-meta commentmetadata">
          <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>">
            <?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>
          </a>
          <?php edit_comment_link(__('(Edit)'),'  ','') ?> - 
          <span class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
        </div>

      </div>

    </div>


<?php
        }
