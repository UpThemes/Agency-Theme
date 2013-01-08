jQuery(document).ready(function($) {

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

});
