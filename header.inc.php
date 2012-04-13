<!doctype html>
<html>
<head>
  <title>Agency Theme</title>
  <link rel="stylesheet" type="text/css" href="assets/main.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes" />  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="assets/jquery.sticky.js"></script>
  <script src="assets/jquery.flexslider-min.js"></script>
  <script type="text/javascript">
    $(function(){
      $('.flexslider').flexslider();
      $(".breadcrumb").sticky();

      // Create the dropdown base
      $("<select />").appendTo("header nav");

      // Create default option "Go to..."
      $("<option />", {
         "selected": "selected",
         "value"   : "",
         "text"    : "Go to..."
      }).appendTo("nav select");

      // Populate dropdown with menu items
      $("header nav a").each(function() {
       var el = $(this);
       $("<option />", {
           "value"   : el.attr("href"),
           "text"    : el.text()
       }).appendTo("nav select");
      });

      $("header nav select").change(function() {
        window.location = $(this).find("option:selected").val();
      });
    });
  </script>
  <!--[if lt IE 7]>
  <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>
  <![endif]-->
  <!--[if lt IE 9]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>
  <header>
    <div class="wrap">
      <a href="#" class="logo">
        <img src="temp.gif"/>
        <span>Politica</span>
      </a>
      <nav>
        <ul>
          <li><a href="#" class="active">Our Team</a></li>
          <li class="sub"><a href="#">Services</a>
            <ul>
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Graphics</a></li>
              <li><a href="#">Illustration</a></li>
              <li><a href="#">Branding</a></li>
              <li><a href="#">Print</a></li>
              <li><a href="#">Motion</a></li>
            </ul>
          </li>
          <li><a href="#">Philosophy</a></li>
          <li><a href="#">Portfolio</a></li>
          <li class="sub last"><a href="#">Contact Us</a>
            <ul>
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Graphics</a></li>
              <li><a href="#">Illustration</a></li>
              <li><a href="#">Branding</a></li>
              <li><a href="#">Print</a></li>
              <li><a href="#">Motion</a></li>
            </ul>
          </li>
        </ul>
      </nav>
      <div class="clear"></div>
    </div><!--/.wrap-->
  </header>