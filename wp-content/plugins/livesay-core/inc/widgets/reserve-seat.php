<?php
/*
 * Reserver Seat Widget
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

class vt_reserve_seat_widget extends WP_Widget {

  /**
   * Specifies the widget name, description, class name and instatiates it
   */
  public function __construct() {
    parent::__construct(
      'vt-reserve-seat-widget',
      VTHEME_NAME_P . __( ': Reserve Seat Widget', 'livesay' ),
      array(
        'classname'   => 'vt-reserve-seat-widget',
        'description' => VTHEME_NAME_P . __( ' widget that displays Reserve seat form.', 'livesay' )
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
      'content' => ''
    ));

    // Title
    $title_value = esc_attr( $instance['title'] );
    $title_field = array(
      'id'    => $this->get_field_name('title'),
      'name'  => $this->get_field_name('title'),
      'type'  => 'text',
      'title' => __( 'Title :', 'livesay' ),
      'info' => __( 'The title you enter here will be sanitized and used for id also.Use this id in reserve seat button shortcode. your id is: '.__('#', 'livesay').'<strong><span class="reserve-frm-id"></span></strong>', 'livesay' ),
      'wrap_class' => 'vt-reserve-widgt-fields',
    );
    echo cs_add_element( $title_field, $title_value );

    // Content
    $content_value = esc_attr( $instance['content'] );
    $content_field = array(
      'id'    => $this->get_field_name('content'),
      'name'  => $this->get_field_name('content'),
      'type'  => 'textarea',
      'shortcode'  => true,
      'attributes'    => array(
        'rows'        => 16,
        'cols'        => 20,
      ),
      'title' => __( 'Form shorcode :', 'livesay' ),
    );
    echo cs_add_element( $content_field, $content_value );

  }

  /**
   * Processes the widget's values
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Update values
    $instance['title']      = strip_tags( stripslashes( $new_instance['title'] ) );
    $instance['content']    = strip_tags( stripslashes( $new_instance['content'] ) );

    return $instance;
  }

  /**
   * Output the contents of the widget
   */
  public function widget( $args, $instance ) {
    // Extract the arguments
    extract( $args );

    $title      = apply_filters( 'widget_title', $instance['title'] );
    $content    = $instance['content'];
    $id = sanitize_title($title);

    echo '<div class="modal fade" id="'.$id.'" tabindex="-1" role="dialog" aria-labelledby="registrationLabel"><div class="modal-dialog modal-md" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"></button><h4 class="modal-title" id="registrationLabel">'.$instance['title'].'</h4></div><div class="modal-body">';
    echo do_shortcode($content);
    echo '</div></div></div></div>';

  }
}

// Register the widget using an annonymous function
function vt_reserve_seat_widget_function() {
  register_widget( "vt_reserve_seat_widget" );
}
add_action( 'widgets_init', 'vt_reserve_seat_widget_function' );
