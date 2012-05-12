<div class="block sidebar">
  <?php 
  if (is_active_sidebar('default'))
    dynamic_sidebar('default'); 
  else
    agency_default_sidebar();
  ?>
</div>