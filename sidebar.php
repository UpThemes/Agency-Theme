<?php if (is_active_sidebar('default')) { ?>
<div class="block">
    <?php dynamic_sidebar('default'); ?>
</div>
<?php } else { ?>

<div class="block">
    <?php agency_default_sidebar(); ?>
</div>


<?php } ?>