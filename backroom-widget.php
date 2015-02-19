<?php
/*
Plugin Name: Backroom Widget
Plugin URI: http://www.backroomapp.com/
Description: A plugin that allows integration of Backroom.
Version: 1.0.0.0
Author: Backroom
Author URI: http://www.backroomapp.com/
License: GPLv2 or later
*/

/**
 * Create the widget class and extend from the WP_Widget
 */
class Backroom_Widget extends WP_Widget {

	/**
	 * Set the widget defaults
	 */
	private $widget_title = "Backroom Messenger";
	private $publisher_key = "";
	private $position = 'after-article';

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {

		parent::__construct(
			'Backroom_Widget',// Base ID
			'Backroom ',// Name
			array(
				'classname'		=>	'Backroom_Widget',
				'description'	=>	__('A widget to integrate Backroom.', 'framework')
			)
		);

	} // end constructor

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$this->widget_title = apply_filters('widget_title', $instance['title'] );

		$this->publisher_key      = $instance['publisher_key'];
		$this->position   = $instance['position'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $this->widget_title )
			echo $before_title . $this->widget_title . $after_title;

		/* Backroomapp Render*/
        $this->render_widget( array('publisher_key' => $this->publisher_key
                            , 'position' => $this->position
                            ) );

		/* After widget (defined by themes). */
		echo $after_widget;
	}

  public function microtime_float()
	{
	    list($usec, $sec) = explode(" ", microtime());
	    return ((float)$usec + (float)$sec);
	}

  public function render_widget( $args ) {
  	$r = wp_parse_args($args, array('publisher_key' => '')
											);

		$output = '<div id="backroom_hb"></div>'
		.'<script> '
		.'var __bkrmc = { '
		.'bar: true, '
		.'publisher_key: "'.$r["publisher_key"].'" '
		.'}; '
		.'!function(d,s,id) { '
		.'var js,fjs=d.getElementsByTagName(s)[0]; '
		.'if(!d.getElementById(id)) { '
		.'js=d.createElement(s); '
		.'js.id=id; '
		.'js.src="https://cdn.backroomapp.com/assets/bkroom-launcher.js?'.floor($this->microtime_float()).'"; '
		.'fjs.parentNode.insertBefore(js,fjs); '
		.'} '
		.'} '
		.' (document,"script","bkroom-ujs"); '
		.'</script> ';

		echo $output;
	}

		/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['publisher_key'] = strip_tags( $new_instance['publisher_key'] );
		$instance['position'] = strip_tags( $new_instance['position'] );

		return $instance;
	}


	/**
	 * Create the form for the Widget admin
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
                'publisher_key' => $this->publisher_key,
                'position' => $this->position
            );

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<div class="bkroom-widget-content">
	    <!-- Widget Title: Text Input -->
	    <p>
	        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title') ?>: </label>
	        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	    </p>

      <!-- Publisher Key: Text Input -->
      <p>
          <label for="<?php echo $this->get_field_id( 'publisher_key' ); ?>"><?php _e('Publisher Key from backroomapp') ?>: </label>
          <input type="text" class="widefat bkroom-input-publisherkey" id="<?php echo $this->get_field_id( 'publisher_key' ); ?>" name="<?php echo $this->get_field_name( 'publisher_key' ); ?>" value="<?php echo $instance['publisher_key']; ?>" placeholder="PublisherKey"/>
          <br><span class="bkroom_description">Your Publisher Key from <a href="http://backroomapp.com">backroomapp</a>.</span>
      </p>

      <p>
      <strong>Embed Settings:</strong>
      </p>

      <!-- Position : Radio Buttons -->
      <p>
          <label for="<?php echo $this->get_field_id( 'position' ); ?>"><?php _e('Widget Position') ?>: </label>
          <input type="radio" id="<?php echo $this->get_field_id( 'position' ); ?>_aftercontent" name="<?php echo $this->get_field_name( 'position' ); ?>" value="after-content">After Content</input>
          <input type="radio" id="<?php echo $this->get_field_id( 'position' ); ?>_beforecomments" name="<?php echo $this->get_field_name( 'position' ); ?>" value="before-comments">Before Comments</input>
          <input type="radio" id="<?php echo $this->get_field_id( 'position' ); ?>_aftercomments" name="<?php echo $this->get_field_name( 'position' ); ?>" value="after-comments">After Comments</input>
          <br><span class="bkroom_description">Place in the post where Backroom widget would embed.</span>
      </p>

    </div>

	<?php
	}
}

/**
 * Register the Widget
 */
function register_backroom_widget() {
    register_widget( 'Backroom_Widget' );
}
add_action( 'widgets_init', register_backroom_widget);

/**
 * Show the Backroom widget in embed form
 *
 * The list of arguments is below:
 *     'publisher_key' (string) - Your Publisher key of Backroomapp
 *     'position' (string) - position of the widget
 *
 * @param string|array $args Optional. Override the defaults.
 */ 
function backroom_widget($args) {
    $bkroom_plugin = new Backroom_Widget();
    $bkroom_plugin->render_widget($args);
}

/**
 * Shortcode to diplay Backroom widget in your site.
 * 
 * The list of arguments is below:
 *     'publisher_key' (string) - Your Publisher key of Backroomapp
 *     'position' (string) - position of the widget
 * 
 * Usage: 
 * [backroom publisher_key="abcd"]
 */
function backroom_shortcode($atts) {
    $bkroom_plugin = new Backroom_Widget();

    $publisher_key = '';
    if (isset($atts['publisher_key']) && ! empty( $atts['publisher_key'] ) ) {
        $publisher_key = $atts['publisher_key'];
    }

    $position = '';
    if (isset($atts['position']) && ! empty( $atts['position'] ) ) {
        $position = $atts['position'];
    }

    return $bkroom_plugin->render_widget( array(
        'publisher_key' => $publisher_key,
        'position' => $position
    ) );
}

add_shortcode( 'backroom', 'backroom_shortcode' );

?>