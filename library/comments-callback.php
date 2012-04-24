<?php

// Custom callback to list comments in the Thematic style
function agency_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
  $GLOBALS['comment_depth'] = $depth;
    ?>
        <div id="comment-<?php comment_ID() ?>" class="comment">
          <div class="image-wrap">
            <?php echo get_avatar( $comment, 74 ); ?>
          </div><!--/.image-wrap-->
          <div class="comment-wrap">
            <strong><?php comment_author(); ?></strong> said<br/>

        <?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'agency') ?>


            <?php comment_text() ?>


            <?php // echo the comment reply link with help from Justin Tadlock http://justintadlock.com/ and Will Norris http://willnorris.com/
              if($args['type'] == 'all' || get_comment_type() == 'comment') :
                comment_reply_link(array_merge($args, array(
                  'reply_text' => __('Add Reply','agency'), 
                  'login_text' => __('Log in to reply.','agency'),
                  'depth' => $depth,
                  'before' => '<div class="comment-reply-link">', 
                  'after' => '</div>'
                )));
              endif;
            ?>

          </div><!--/.comment-wrap-->
        </div><!--/.comment-->


<?php }



// Custom callback to list pings in the Thematic style
function agency_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
        ?>
        <div id="comment-<?php comment_ID() ?>" class="comment pingback">

          <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'agency'),
              get_comment_author_link(),
              get_comment_date(),
              get_comment_time() );
              edit_comment_link(__('Edit', 'agency'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?>
          </div>

    <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'agency') ?>
            <div class="comment-content">
          <?php comment_text() ?>
      </div>

<?php }