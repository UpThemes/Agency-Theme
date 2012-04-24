    <div id="comments" class="comments">

<?php
  $req = get_option('require_name_email'); // Checks if fields are required.
  if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
    die ( 'Please do not load this page directly. Thanks!' );
  if ( ! empty($post->post_password) ) :
    if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) :
?>
      <div class="nopassword">
        <h2><?php _e('This post is password protected. Enter the password to view any comments.', 'agency') ?></h2>
      </div>
    </div><!--/.comments-->
<?php
    return;
  endif;
endif;
?>


<?php if ( have_comments() ) : ?>

<?php /* numbers of pings and comments */
$ping_count = $comment_count = 0;
foreach ( $comments as $comment )
  get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;
?>

<?php if ( ! empty($comments_by_type['comment']) ) : ?>


        <div id="comments-list" class="comments">
          <h1><?php printf($comment_count > 1 ? __('<span>%d</span> Responses', 'agency') : __('<span>1</span> Response', 'agency'), $comment_count) ?></h1>


<?php wp_list_comments( array('style' => 'div', 'type' => 'comment', 'avatar_size' => 74, 'callback' => 'agency_comments') ); ?>


          <div id="comments-nav-below" class="comment-navigation">
            <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
          </div>
          
        </div><!-- #comments-list .comments -->

<?php endif; /* if ( $comment_count ) */ ?>
<?php endif; /* if ( $comments ) */ ?>

      <form id="comment-form" class="_1 _parent" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
        <div class="_1 _no-t _no-b">
          <hr/>
          <h1>Leave a comment</h1>

<?php if ( $user_ID ) : ?>
          <h2 id="login"><?php printf(__('<span class="loggedin">Logged in as <a href="%1$s" title="Logged in as %2$s">%2$s</a>.</span> <span class="logout"><a href="%3$s" title="Log out of this account">Log out?</a></span>', 'garageband'),
            get_option('siteurl') . '/wp-admin/profile.php',
            esc_html($user_identity, true),
            wp_logout_url(get_permalink()) ) ?></h2>
        </div>
<?php else : ?>
        </div>

        <div class="_1-3 _no-t _no-b">
          <input type="text" name="author" id="author" placeholder="Name" value="<?php echo $comment_author ?>" size="30" maxlength="20" tabindex="3" />
        </div>
        <div class="_1-3 _no-t _no-b">
          <input type="text" name="email" id="email" placeholder="Email Address" value="<?php echo $comment_author_email ?>" size="30" maxlength="50" tabindex="4" />
        </div>
        <div class="_1-3 _no-t _no-b">
          <input type="text" name="url" id="url" placeholder="Web Url" value="<?php echo $comment_author_url ?>" size="30" maxlength="50" tabindex="5" />
        </div>

<?php endif; /* if ( $user_ID ) */ ?>

        <div class="_1 _no-t">
          <textarea name="comment" id="comment"></textarea>
          <input type="submit" id="submit" value="<?php _e('Post Comment', 'agency') ?>"  tabindex="7"/>
          <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></div>

<?php comment_id_fields(); ?>

        </div>
      </form><!--/#comment-form-->
    </div><!--/.comments-->
