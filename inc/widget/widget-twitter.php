<?php

#........................................................................
#
# 	Plugin Name: Custom Portfolio Widget
# 	Plugin URI: http://www.cmscode.com
#	Description: This widget displays your Tweets.
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



class sosq_twitter_widget extends WP_Widget {

#........................................................................
#
# 	01 > Widget Setup
#
#........................................................................
	
function sosq_twitter_widget() {

	$widget_ops = array(
			'classname' => 'sosq_twitter_widget',
			'description' =>  __('You can display your Tweets by using this Twitter widget.', 'sosthemes')
	);
	
#
# 	Widget control window settings
#
	$widget_window = array(
			'width' => 400,
			'height' => 360,
			'id_base' => 'sosq_twitter_widget'
	);
#
# 	Widget main function
#
	$this->WP_Widget( 'sosq_twitter_widget', __('SOS Twitter Widget', 'sosthemes'), $widget_ops, $widget_window );

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
	$count = $instance['count'];
	$username = $instance['username'];
	$followtext = $instance['followtext'];
	
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

$random = rand(0,999);
?>

            <script type="text/javascript">
			jQuery(document).ready(function($){
				$.getJSON('http://api.twitter.com/1/statuses/user_timeline/<?php echo $username; ?>.json?count=<?php echo $count; ?>&callback=?', function(tweets){
					$("#twitter_update_list_<?php echo $random; ?>").html(twitter_f(tweets));
				});
			});
			</script>
            <ul id="twitter_update_list_<?php echo $random; ?>" class="twitter">
                <li><p></p></li>
            </ul>
			<a class="bbutton black" href="https://twitter.com/<?php echo $username; ?>" target="_blank">@Follow us</a>

<div class="clear"></div>



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
	$instance['username'] = strip_tags( $new_instance['username']);
	$instance['title'] = strip_tags( $new_instance['title'] );
	$instance['count'] = strip_tags( $new_instance['count']);
	$instance['followtext'] = strip_tags( $new_instance['followtext']);
	
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
		'title' => 'Twitter',
		'count' => 3,
		'username' => 'google',
		'followtext' => '@follow',
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
	</p>
<!-- 
#
# 	Tweet Username (Text Input)
#
-->
	<p>
	<label for="<?php echo $this->get_field_id( 'username' ); ?>">
	<?php _e('Twitter name', 'sosthemes') ?>
	</label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" />
	</p>
<!-- 
#
# 	Tweet Number (Text Input)
#
-->
	
	<p>
	<label for="<?php echo $this->get_field_id( 'count' ); ?>">
	<?php _e('Tweet Number', 'sosthemes') ?>
	</label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $instance['count']; ?>" />
	</p>
<!-- 
#
# 	Follow Text (Text Input)
#
-->
	
	<p>
	<label for="<?php echo $this->get_field_id( 'followtext' ); ?>">
	<?php _e('Follow Text', 'sosthemes') ?>
	</label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'followtext' ); ?>" name="<?php echo $this->get_field_name( 'followtext' ); ?>" value="<?php echo $instance['followtext']; ?>" />
	</p>

<?php
	}
}


#........................................................................
#
# 	06 > Register 
#
#........................................................................

add_action( 'widgets_init', 'sosq_twitter_widgets_register' );
function sosq_twitter_widgets_register() {
	register_widget( 'sosq_twitter_widget' );
}
?>
