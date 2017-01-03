<?php

#........................................................................
#
# 	Plugin Name: Custom Portfolio Widget
# 	Plugin URI: http://www.cmscode.com
#	Description: This widget displays flickr images.
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



class sosq_flickr_widget extends WP_Widget {

#........................................................................
#
# 	01 > Widget Setup
#
#........................................................................
	
function sosq_flickr_widget() {
	
$widget_ops = array(
			'classname' => 'sosq_flickr_widget',
			'description' =>  __('You can display your Flickr images by using this widget.', 'sosthemes')
	);
	
#
# 	Widget control window settings
#
	$widget_window = array(
			'width' => 400,
			'height' => 360,
			'id_base' => 'sosq_flickr_widget'
	);
#
# 	Widget main function
#
	$this->WP_Widget( 'sosq_flickr_widget', __('SOS Flickr Widget', 'sosthemes'), $widget_ops, $widget_window );
	
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
                        <div id="flickr-images-wrapper">
                                    <div class="flickr-images" id="flickr-images-<?php echo $random ?>">
                                        <script type="text/javascript">
                                            jQuery(document).ready(function ($) {
                                                $.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?id=<?php echo $username ?>&format=json&jsoncallback=?", function (data) {
                                                    var target = "#flickr-images-<?php echo $random ?>";
                                                    for (i = 0; i <= <?php echo $count ?> - 1; i = i + 1) {
                                                        var pic = data.items[i];
                                                        var liNumber = i + 1;

                                                        $(target).append("<li class='flickr-image no-" + liNumber + "'><a title='" + pic.title + "' href='" + pic.link + "' target='_blank'><img src='" + pic.media.m + "'/></a></li>");
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                               </div>
                            <div class="clear"></div>
                        <!-- END FLICKR -->


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
		'title' => 'Flickr',
		'count' => 3,
		'username' => '',
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
# 	Flickr Username (Text Input)
#
-->
	<p>
	<label for="<?php echo $this->get_field_id( 'username' ); ?>">
	<?php _e('Flickr id', 'sosthemes') ?>
	</label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" />
	</p>
<!-- 
#
# 	Number of photos  (Text Input)
#
-->
	
	<p>
	<label for="<?php echo $this->get_field_id( 'count' ); ?>">
	<?php _e('Number of photos ', 'sosthemes') ?>
	</label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $instance['count']; ?>" />
	</p>

<?php
	}
}


#........................................................................
#
# 	06 > Register 
#
#........................................................................

add_action( 'widgets_init', 'sosq_flickr_widgets_register' );
function sosq_flickr_widgets_register() {
	register_widget( 'sosq_flickr_widget' );
}
?>
