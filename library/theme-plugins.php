<?php

function agency_get_theme_plugin_list() {

  return array(

  );

}


// Installed Plugin Check
function agency_check_plugins() {

  $plugins = agency_get_theme_plugin_list();

  if ( current_user_can('edit_theme_options') ):

    foreach($plugins as $plugin):
    
      extract($plugin);

      if ( is_plugin_active( $location ) )
        $active = true;
      else
        $active = false;
      
      if( file_exists( trailingslashit( WP_PLUGIN_DIR ) . $location ) )
        $installed = true;
      else
        $installed = false;
  
      $args = array(
        'isPluginInstalled' => $installed,
        'isPluginActive' => $active,
        'isPluginRequired' => $required,
        'pluginName' => $name,
        'pluginSearchURI' => admin_url() . "/plugin-install.php?tab=search&type=term&s=$name",
        'pluginActivationURI' => admin_url("plugins.php")
      );
  
      agency_active_plugin_notice( $args );
      
    endforeach;

  endif;
  
}

add_action('admin_notices', 'agency_check_plugins');

function agency_active_plugin_notice( $args ) {
  
  if ( isset($args) && is_array($args) ):

    extract($args);
    
    if( $isPluginRequired ):
      $class = 'error';
      $activateText  = 'must be activated for your current theme to work properly';
      $installText  = 'must be installed for your current theme to work properly';
    else:
      $class = 'updated';
      $activateText  = 'is a recommended plugin that works well with your current theme';
      $installText  = 'is a recommended plugin that works well with your current theme';
    endif;

    if( !$isPluginActive )
      $message = "<p>$pluginName $activateText. You can <a href='$pluginActivationURI'>activate it on the plugins page</a>.</p>";

    if( !$isPluginInstalled )
      $message = "<p>$pluginName $installText. Please <a href='$pluginSearchURI'>install it here</a>.</p>";

    if( !empty($message) ):
      echo '<div class="' . $class . '">';
      echo $message;
      echo '</div>';
    endif;
    
  endif;
  
}
