<?php
/*
 * Reserver Seat Widget
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

class vt_call_to_action_widget extends WP_Widget {

  /**
   * Specifies the widget name, description, class name and instatiates it
   */
  public function __construct() {
    parent::__construct(
      'vt-call-to-action-widget',
      VTHEME_NAME_P . __( ': Call To Action Widget', 'livesay-core' ),
      array(
        'classname'   => 'vt-call-to-action-widget',
        'description' => VTHEME_NAME_P . __( ' widget that displays Call to action.', 'livesay-core' )
      )
    );
  }

  /**
   * Generates the back-end layout for the widget
   */
  public function form( $instance ) {
    // Default Values
    $instance   = wp_parse_args( $instance, array(
      'title'    => '',
      'sub_title' => '',
      'btn_txt' => '',
      'btn_link' => '',
    ));

    // Title
    $title_value = esc_attr( $instance['title'] );
    $title_field = array(
      'id'    => $this->get_field_name('title'),
      'name'  => $this->get_field_name('title'),
      'type'  => 'text',
      'title' => __( 'Title :', 'livesay-core' ),
      'wrap_class' => 'vt-reserve-widgt-fields',
    );
    echo cs_add_element( $title_field, $title_value );

    // Sub Title
    $sub_title_value = esc_attr( $instance['sub_title'] );
    $sub_title_field = array(
      'id'    => $this->get_field_name('sub_title'),
      'name'  => $this->get_field_name('sub_title'),
      'type'  => 'text',
      'title' => __( 'Sub-Title :', 'livesay-core' ),
    );
    echo cs_add_element( $sub_title_field, $sub_title_value );

    // Button Text
    $btn_txt_value = esc_attr( $instance['btn_txt'] );
    $btn_txt_field = array(
      'id'    => $this->get_field_name('btn_txt'),
      'name'  => $this->get_field_name('btn_txt'),
      'type'  => 'text',
      'title' => __( 'Buttom Text :', 'livesay-core' ),
    );
    echo cs_add_element( $btn_txt_field, $btn_txt_value );

    // Button Text
    $btn_link_value = esc_attr( $instance['btn_link'] );
    $btn_link_field = array(
      'id'    => $this->get_field_name('btn_link'),
      'name'  => $this->get_field_name('btn_link'),
      'type'  => 'text',
      'title' => __( 'Buttom Link :', 'livesay-core' ),
    );
    echo cs_add_element( $btn_link_field, $btn_link_value );

  }

  /**
   * Processes the widget's values
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Update values
    $instance['title']      = strip_tags( stripslashes( $new_instance['title'] ) );
    $instance['sub_title']      = strip_tags( stripslashes( $new_instance['sub_title'] ) );
    $instance['btn_txt']    = strip_tags( stripslashes( $new_instance['btn_txt'] ) );
    $instance['btn_link']    = strip_tags( stripslashes( $new_instance['btn_link'] ) );

    return $instance;
  }

  /**
   * Output the contents of the widget
   */
  public function widget( $args, $instance ) {
    // Extract the arguments
    extract( $args );

    $title      = apply_filters( 'widget_title', $instance['title'] );
    $sub_title    = $instance['sub_title'];
    $btn_txt    = $instance['btn_txt'];
    $btn_link    = $instance['btn_link'];

    echo '<div class="lvsy-join-event join-style-two"><div class="container"><div class="row"><div class="col-md-8"><div class="section-title-wrap"><div class="section-title">'.$instance['title'].'</div><div class="section-sub-title">'.$sub_title.'</div></div></div><div class="col-md-4"><div class="pull-right"><a href="'.$instance['btn_link'].'" class="lvsy-btn lvsy-btn-black">'.$instance['btn_txt'].'</a></div></div></div></div></div>';

  }
}

// Register the widget using an annonymous function
function vt_call_to_action_widget_function() {
  register_widget( "vt_call_to_action_widget" );
}
add_action( 'widgets_init', 'vt_call_to_action_widget_function' );
