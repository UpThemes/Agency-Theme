<?php
  $path = $_SERVER['DOCUMENT_ROOT'] . "/header.inc.php";
  include_once($path);
?>
<section class="breadcrumb">
  <div class="wrap">
    <ul>
      <li><a href="#">Home</a></li>
      <li class="seperator">&#9654;</li>
      <li><a href="#">Page title</a></li>
    </ul>
  </div><!--/.wrap-->
</section><!--/.breadcrumb-->
<div class="wrap content">
  <section class="_4-5 _parent">
    <article class="_1 post-standard">
      <i class="post-icon"></i>
      <div class="meta post-pad-left">
        <a href="#" class="comments">2</a><a href="#">Design Resources</a>
      </div>
      <h1 class="post-pad-left">A Recent Photo Shoot for This Random Person in a Field</h1>
      <h4 class="post-pad-left">Posted at 4:15 PM on Feb 21st, 2011 by <a href="#">Rich Hemsley</a></h4>
      <img src="temp.gif" class="temp">
      <p class="post-pad-left">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Sed posuere consectetur est at lobortis. Aenean lacinia bibendum nulla sed consectetur. Nullam quis risus eget urna mollis ornare vel eu leo.</p>
      <h2 class="post-pad-left">Seriously? Heck yea!</h2>
      <p class="post-pad-left">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Sed posuere consectetur est at lobortis. Aenean lacinia bibendum nulla sed consectetur. Nullam quis risus eget urna mollis ornare vel eu leo.</p>
      <h3 class="post-pad-left">So what are you waiting for!?!</h3>
      <p class="post-pad-left">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Sed posuere consectetur est at lobortis. Aenean lacinia bibendum nulla sed consectetur. Nullam quis risus eget urna mollis ornare vel eu leo.</p>
      <blockquote>Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas sed diam eget risus varius blandit sit amet non magna. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</blockquote>
      <p class="post-pad-left">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Sed posuere consectetur est at lobortis. Aenean lacinia bibendum nulla sed consectetur. Nullam quis risus eget urna mollis ornare vel eu leo.</p>
    </article>
    <hr/>
    <div class="comments">
      <div class="comment-list _1">
        <h1>21 Responses</h1>
        <div class="comment">
          <div class="image-wrap">
            <img src="temp.gif" class="temp"/>
          </div><!--/.image-wrap-->
          <div class="comment-wrap">
            <strong>Jack</strong> said<br/>
            <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Donec ullamcorper nulla non metus auctor fringilla.</p>
            <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Donec ullamcorper nulla non metus auctor fringilla.</p>
          </div><!--/.comment-wrap-->
        </div><!--/.comment-->
        <div class="comment">
          <div class="image-wrap">
            <img src="temp.gif" class="temp"/>
          </div><!--/.image-wrap-->
          <div class="comment-wrap">
            <strong>Jack</strong> said<br/>
            <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Donec ullamcorper nulla non metus auctor fringilla.</p>
          </div><!--/.comment-wrap-->
        </div><!--/.comment-->
        <div class="comment">
          <div class="image-wrap">
            <img src="temp.gif" class="temp"/>
          </div><!--/.image-wrap-->
          <div class="comment-wrap">
            <strong>Jack</strong> said<br/>
            <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Donec ullamcorper nulla non metus auctor fringilla.</p>
          </div><!--/.comment-wrap-->
        </div><!--/.comment-->
      </div><!--/.comment-list-->
      <form id="comment-form" class="_1 _parent">
        <div class="_1 _no-t _no-b">
          <hr/>
          <h1>Leave a comment</h1>
        </div>
        <div class="_1-3 _no-t _no-b">
          <input type="text" name="name" id="name" placeholder="Name"/>
        </div>
        <div class="_1-3 _no-t _no-b">
          <input type="text" name="email-address" id="email-address" placeholder="Email Address"/>
        </div>
        <div class="_1-3 _no-t _no-b">
          <input type="text" name="web-url" id="web-url" placeholder="Web Url"/>
        </div>
        <div class="_1 _no-t">
          <textarea name="comment" id="comment"></textarea>
          <input type="submit" id="post-comment" value="Post Comment"/>
        </div>
      </form><!--/#comment-form-->
    </div><!--/.comments-->
  </section>
  <section class="_1-5">
    <form>
      <input type="text" name="search" id="search" placeholder="search">
    </form>
    <hr/>
    <br/>
    <h2>Categories</h2>
    <ul class="sidebar-list">
      <li><a href="#">Case Studies</a></li>
      <li><a href="#">General</a></li>
      <li><a href="#">Interviews</a></li>
      <li><a href="#">News & Updates</a></li>
      <li><a href="#">Team</a></li>
    </ul>
    <hr/>
    <br/>
    <h2>Archive</h2>
    <ul class="sidebar-list">
      <li><a href="#">February 2011</a></li>
      <li><a href="#">January 2011</a></li>
      <li><a href="#">December 2010</a></li>
      <li><a href="#">November 2010</a></li>
      <li><a href="#">October 2010</a></li>
      <li><a href="#">September 2010</a></li>
      <li><a href="#">August 2010</a></li>
    </ul>
    <hr/>
    <br/>
    <h2>Agency on Dribbble</h2>
    <a href="#">
      <img src="temp.gif" class="temp"/>
      Vacation Theme
    </a>
  </section>
</div><!--/.wrap-->
<?php
  $path = $_SERVER['DOCUMENT_ROOT'] . "/footer.inc.php";
  include_once($path);
?>