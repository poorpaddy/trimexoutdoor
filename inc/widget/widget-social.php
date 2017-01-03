<?php

#........................................................................
#
# 	Plugin Name: Custom Portfolio Widget
# 	Plugin URI: http://www.cmscode.com
#	Description: This widget displays social network buttons.
# 	Version: 1.0
# 	Author: Can Yigit
# 	Author URI: http://www.cmscode.com
#
#........................................................................

#........................................................................
#
# 	TABLE OF CONTENT
# 	
#	01 > Widget Setup
#	02 > Display Widget
#	03 > Widget Page Appearance
#	04 > Update Widget
#	05 > Widget control panel in widget area
#	06 > Register
#
#........................................................................



class sosq_socials_widget extends WP_Widget {

#........................................................................
#
# 	01 > Widget Setup
#
#........................................................................
	
function sosq_socials_widget() {
	
$widget_ops = array(
			'classname' => 'sosq_socials_widget',
			'description' =>  __('This widget displays your social network that you have added in option page.', 'sosthemes')
	);
	
#
# 	Widget control window settings
#
	$widget_window = array(
			'width' => 400,
			'height' => 360,
			'id_base' => 'sosq_socials_widget'
	);
#
# 	Widget main function
#
	$this->WP_Widget( 'sosq_socials_widget', __('SOS Social Widget', 'sosthemes'), $widget_ops, $widget_window );
	
}

#........................................................................
#
# 	02 > Display Widget
#
#........................................................................
	
function widget( $fields, $instance ) {
	extract( $fields );
#
# 	Our widget settings variables
#

	$title = apply_filters('widget_title', $instance['title'] );
	
#
# 	Before Widget
#
	echo $before_widget;
	
#
# 	Widget Title
#
	if ( $title )
	echo $before_title . $title . $after_title;

	
#........................................................................
#
# 	03 > Widget Page Appearance
#
#........................................................................
?>

                        <?php sos_social_icons(); ?>

<?php echo $after_widget;
	
}

#........................................................................
#
# 	04 > Update Widget
#
#........................................................................
	
function update( $new_instance, $old_instance ) {
	
#
# 	When widget options are saved this function is called and values 
#	are transfered to function as array
#

	
	$instance = $old_instance; // old values
	
	
#
# 	Widget variables
#	
	$instance['size'] = strip_tags( $new_instance['size']);
	$instance['title'] = strip_tags( $new_instance['title'] );
	
	return $instance;
}

#........................................................................
#
# 	05 > Widget control panel in widget area
#
#........................................................................
	 
function form( $instance ) {
#
# 	Values that will be created when no value entered or no value changed
#	
	$default_values = array(
		'title' => 'Social Networks',
	);
	$instance = wp_parse_args( (array) $instance, $default_values); ?>

<!-- 
#
# 	Title (Text Input)
#
-->
	<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>">
	<?php _e('Title', 'sosthemes') ?>
	</label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
    <?php _e('All social network you have added in option page will be displayed in selected section.', 'sosthemes') ?>
	</p>
    
<?php
	}
}


#........................................................................
#
# 	06 > Register 
#
#........................................................................

add_action( 'widgets_init', 'sosq_socials_widgets_register' );
function sosq_socials_widgets_register() {
	register_widget( 'sosq_socials_widget' );
}
?>
