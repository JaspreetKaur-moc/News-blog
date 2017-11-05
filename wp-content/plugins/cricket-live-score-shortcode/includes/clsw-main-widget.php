<?php
class clsw_Main_Widget extends WP_Widget {

  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array( 'classname' => 'clsw_main_widget', 'description' => 'This is an Cricket Live Score Widget' );
    parent::__construct( 'clsw_main_widget', 'Cricket Live Score Widget', $widget_options );
  }

  // Create the widget output.
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    $blog_title = get_bloginfo( 'name' );
    $tagline = get_bloginfo( 'description' );

    printf( __( '%1$s', 'cricket-live-score-shortcode' ), $args['before_widget'] . $args['before_title'] . $title . $args['after_title'] ); 
    include 'clsw-fetch-score.php';
    printf( __( '%1$s', 'cricket-live-score-shortcode' ), $args['after_widget'] );
  }

  // Create the admin area widget settings form.
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    printf( __( '<p><label for="%1$s">%2$s:</label><input type="text" id="%3$s" name="%4$s" value="%5$s" /></p>', 'cricket-live-score-shortcode' ), $this->get_field_id( 'title' ), 'Title', $this->get_field_id( 'title' ), $this->get_field_name( 'title' ), esc_attr( $title ) );
  }

  // Apply settings to the widget instance.
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    return $instance;
  }

}

?>