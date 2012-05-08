<?php

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'team_member_load_widgets' );


/**
 * Register our widget.
 * 'Team_Member_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function team_member_load_widgets() {
  register_widget( 'Team_Member_Widget' );
}


/**
 * Example Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Team_Member_Widget extends WP_Widget {


  /**
   * Widget setup.
   */
  function Team_Member_Widget() {

    /* Widget settings. */
    $widget_ops = array( 'classname' => 'team-member-widget', 'description' => __('A widget that displays one or more featured team members.', 'team-member-widget') );

    /* Widget control settings. */
    $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'team-member-widget' );

    /* Create the widget. */
    $this->WP_Widget( 'team-member-widget', __('Team Member Widget', 'team-member-widget'), $widget_ops, $control_ops );
  }

  /**
   * How to display the widget on the screen.
   */
  function widget( $args, $instance ) {
    extract( $args );

    $w_title  = $instance['title'];
    $w_type   = $instance['display-option'];
    $w_type == 'single-member' ? $w_single = $instance['member-select'] : $w_single = '';


    /* Before widget (defined by themes). */
    echo $before_widget;

    build_team_widget($w_title, $w_type, $w_single);

    /* After widget (defined by themes). */
    echo $after_widget;
  }


  /**
   * Update the widget settings.
   */
  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['display-option'] = $new_instance['display-option'];
    $instance['member-select'] = strip_tags( $new_instance['member-select'] );

    return $instance;
  }



  /**
   * Displays the widget settings controls on the widget panel.
   * Make use of the get_field_id() and get_field_name() function
   * when creating your form elements. This handles the confusing stuff.
   */
  function form( $instance ) {


    /* Set up some default widget settings. */
    $defaults = array( 'title' => 'Featured Team Member', 'display-options' => 'random-member', 'member-select' => '');
    $instance = wp_parse_args( (array) $instance, $defaults ); ?>

    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'team-member-widget'); ?></label>
      <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'display-option' ); ?>">
        <?php _e('Display Option:', 'team-member-widget'); ?>
      </label>
      <select
        id="<?php echo $this->get_field_id( 'display-option' ); ?>"
        name="<?php echo $this->get_field_name( 'display-option' ); ?>"
        class="widefat" style="width: 100%;">

        <option value="all-members" <?php if ('all-members' == $instance['display-option']) echo 'selected="selected"'; ?>>Show All Team Members</option>
        <option value="random-member" <?php if ('random-member' == $instance['display-option']) echo 'selected="selected"'; ?>>Show Random Team Member</option>
        <option value="single-member" <?php if ('single-member' == $instance['display-option']) echo 'selected="selected"'; ?>>Show One Team Member</option>
      </select>
    </p>


    <?php if ( $instance['display-option'] == 'single-member' ) { ?>

      <?php $team = get_team(); ?>
      <?php if ($team) { ?> 

    <p>
      <label for="<?php echo $this->get_field_id( 'member-select' ); ?>">
        <?php _e('Member Select:', 'team-member-widget'); ?>
      </label>

      <select
        id="<?php echo $this->get_field_id( 'member-select' ); ?>"
        name="<?php echo $this->get_field_name( 'member-select' ); ?>"
        class="widefat" style="width: 100%;">

        <?php foreach ( $team as $member_id => $member_name ) { ?>
        <option value="<?php echo $member_id; ?>" <?php if ($member_id == $instance['member-select']) echo 'selected="selected"'; ?>><?php echo $member_name; ?></option>
        <?php } ?>
        
      </select>
    </p>

      <?php } else { ?>
          <p>You must first add team members.</p>
      <?php } ?>


    <?php } ?>


  <?php
  }
}


/**
  * Returns an array of all team member post types
  */
function get_team(){

  $query = new WP_Query(
    array(
      'post_type' => 'team',
      'orderby'   => 'title',
      'order'     => 'ASC',
      'posts_per_page'  => '-1'
    )
  );

  $team_members = array();

  if ($query->have_posts() ){
    while ( $query->have_posts() ) : $query->the_post();

      $key = get_the_id();
      $team_members[$key] = get_the_title();

    endwhile;

    return $team_members;
  }

  wp_reset_postdata();


}



  /**
   * Build the widget on the screen,  depending on $type.
   */
  function build_team_widget($title, $type, $single_id='' ){


    echo "\n"."      <div class=\"inner\">";
    echo "        <h2>" . $title . "</h2>";

    if ( $type == 'single-member' && $single_id != '' ) {

      $query = new WP_Query(
        array(
          'post_type' => 'team',
          'p'         => intval($single_id),
          'posts_per_page'  => '1'
        )
      );

      if ($query->have_posts() ){
        while ( $query->have_posts() ) : $query->the_post(); ?>

          <div class="team-member-widget-content">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('responsive'); ?></a>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          </div>

        <?php endwhile;
      }

      wp_reset_postdata();

    } elseif ( $type == 'random-member' || ($type == 'single-member' && $single_id == '') ) {
    
      // Show Random
      $query = new WP_Query(
        array(
          'post_type' => 'team',
          'orderby'  => 'rand',
          'posts_per_page'  => '1'
        )
      );

      if ($query->have_posts() ){
        while ( $query->have_posts() ) : $query->the_post(); ?>

          <div class="team-member-widget-content">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('responsive'); ?></a>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          </div>

        <?php endwhile;
      }

      wp_reset_postdata();

    
    } elseif ( $type == 'all-members' ) {
    
      echo "  <div class=\"flexslider\">";
      echo "    <ul class=\"slides\">";
      // Show All
      $query = new WP_Query(
        array(
          'post_type' => 'team',
          'orderby'  => 'rand',
          'posts_per_page'  => '-1'
        )
      );

      if ($query->have_posts() ){
        while ( $query->have_posts() ) : $query->the_post(); ?>

<?php   echo "      <li class=\"slide\">"; ?>

          <div class="team-member-widget-content">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('responsive'); ?></a>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          </div>

<?php   echo "      </li>";

        endwhile;
      }

      wp_reset_postdata();

      echo "    </ul>";
      echo "  </div>";

    } else {
      // Something went wrong, display nothing.
    }

    echo "\n      </div>"."\n    ";

  }


?>