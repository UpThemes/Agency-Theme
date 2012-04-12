<?php
  $path = "header.inc.php";
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
  <section class="_1 _no-b">
    <h1>Contact Us</h1>
  </section>
  <hr/>
  <section class="_4-5 _parent">
    <form id="contact">
      <div class="_1-3 col-no-left col-no-top">
        <input type="text" name="name" id="name" placeholder="Name"/>
        <input type="text" name="company" id="company" placeholder="Company"/>
        <input type="text" name="email-address" id="email-address" placeholder="Email Address"/>
        <input type="text" name="phone" id="phone" placeholder="Phone"/>
        <input type="text" name="web-url" id="web-url" placeholder="Web URL"/>
      </div>
      <div class="_2-3 col-no-right col-no-top">
        <textarea id="message"></textarea>
        <input type="submit" id="send" value="Send Message"/>
      </div>
    </form>
  </section>
  <section class="_1-5">
    <h2>Agency</h2>
    <p>
      555 Main St., Suite 100<br/>
      San Diego, CA 55555-5454<br/>
      <br/>
      <i class="phone"></i>(555) 555-5555<br/>
      <i class="phone"></i><a href="mailto:info@agency.com">info@agency.com</a>
    </p>

    <h2>Social Networking</h2>
    <ul class="social">
      <li><a href="#"><i class="social-vimeo"></i>Vimeo</a></li>
      <li><a href="#"><i class="social-twitter"></i>Twitter</a></li>
      <li><a href="#"><i class="social-linkedin"></i>LinkedIn</a></li>
      <li><a href="#"><i class="social-forrst"></i>Forrst</a></li>
      <li><a href="#"><i class="social-flickr"></i>Flickr</a></li>
      <li><a href="#"><i class="social-facebook"></i>Facebook</a></li>
      <li><a href="#"><i class="social-dribbble"></i>Dribbble</a></li>
    </ul>
  </section>
</div><!--/.wrap-->
<?php
  $path = "footer.inc.php";
  include_once($path);
?>