<?php
/*	--------------------------------------------------------------
	:: Slider Metabox
	-------------------------------------------------------------- */

$prefix = 'sosq_';
$metabox_slider = array(

			'id' => 'metabox_slider',
			'title' => __('Slide Settings','sosthemes'),
			'page' => 'slider',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				
/*	--------------------------------------------------------------
	:: Slider Settings
	-------------------------------------------------------------- */	
	array(
			'name' => __('Automatic Resizing / Cropping','sosthemes'),
			'desc' => __('Turn <strong>[ON]</strong> if you want your images to be automatically resized / cropped by using timthumb.','sosthemes'),
			'id' => $prefix.'slide_timthumb',
			'type' => 'checkbox',
			"std" => ''
			),

			
	array(
			'name' => __('Slider Image','sosthemes'),
			'desc' => __('Please click browse button > select files > insert into post, to choose and add slider image. w: 930px , h: 400px','sosthemes'),
			'id' => $prefix.'slide_big_image',
			'type' => 'textupload',
			"std" => ''
			),
			
	array(
			'id' => $prefix.'slide_big',
			'type' => 'button',
			'std' => __('Browse','sosthemes'),
			),

	array(
			'name' => __('Slider Url','sosthemes'),
			'desc' => __('Link to URL when clicked on image. ( Empty if there is no )','sosthemes'),
			'id' => $prefix.'slide_url',
			'type' => 'text',
			"std" => ''
			),

	array(
			'name' => __('Slide Title','sosthemes'),
			'desc' => __('Title will not be displayed if empty','sosthemes'),
			'id' => $prefix.'slide_title',
			'type' => 'text',
			"std" => ''
			),
			
	array(
			'name' => __('Slide Caption','sosthemes'),
			'desc' => __('Caption will not be displayed if empty','sosthemes'),
			'id' => $prefix.'slide_caption',
			'type' => 'text',
			"std" => ''
			),
	array(
			'name' => __('Caption Align','sosthemes'),
			'desc' => __('Please choose how to align slider title and caption.','sosthemes'),
			'id' => $prefix.'slider_caption_align',
			'type' => 'select',
			'options' => array('left' => 'Left','right' => 'Right' ),
			"std" => ''
			
			),

			
		),
	);

/*	--------------------------------------------------------------
	:: Add Metabox
	-------------------------------------------------------------- */
add_action('admin_menu', 'sos_add_metabox_slider');
function sos_add_metabox_slider() {
	global $metabox_slider;
	add_meta_box($metabox_slider['id'], $metabox_slider['title'], 'sos_stshow', $metabox_slider['page'], $metabox_slider['context'], $metabox_slider['priority']);
}
/*	--------------------------------------------------------------
	:: Metabox Functions
	-------------------------------------------------------------- */
function sos_stshow() {
	global $metabox_slider, $post;
	echo '<input type="hidden" name="sos_nonce_p" value="', wp_create_nonce(basename(__FILE__)), '" />';
	echo '<div class="metabox-area">';
	foreach ($metabox_slider['fields'] as $field) {
			$meta = get_post_meta($post->ID, $field['id'], true);
			switch ($field['type']) {
/*	--------------------------------------------------------------
	::  Case : Trigger
	-------------------------------------------------------------- */						
	case 'trigger':	
	echo '<div id="'. $field['id'].'">';
	break;	
	case 'trigger_close':	
	echo '</div>';
	break;	
/*	--------------------------------------------------------------
	::  Case : Upload
	-------------------------------------------------------------- */
			case 'textupload':		
			echo '<div class="metabox-title">'. $field['name'].'</div>
			<input class="metabox-text" type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '"  />
			<div class="metabox-desc">'. $field['desc'].'</div>';
			$metapic =  get_post_meta($post->ID, $field['id'], true);
			if ( $metapic !== "") {
			echo  '<div id="'. $field['id'] .'_div" > <img class="slide-image" src="', $meta ? $meta : $field['std'], '" /> </div>';} else { echo '';}
			break;
/*	--------------------------------------------------------------
	::  Case : Textarea
	-------------------------------------------------------------- */
			case 'textarea':
			echo '<div class="metabox-title">'. $field['name'].'</div>
			<textarea class="metabox-textarea" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
			echo '<div class="metabox-desc">'. $field['desc'].'  </div> <div class="sep"></div>';
			break;
/*	--------------------------------------------------------------
	::  Case : Checkbox
	-------------------------------------------------------------- */
			case "checkbox": 
		   $saved_std = get_post_meta($post->ID, $field['id'], true);
		   $checked = '';
		   $selectclassactive = '';
			$selectclassdeactive = 'selected';
			$std = $field['std'];
			if(!empty($saved_std)) {
				if($saved_std == 'true') {
				$checked = 'checked="checked"';
				$selectclassactive = 'selected';
		   		$selectclassdeactive = '';
				}
				else{
				   $checked = '';
				      $selectclassactive = '';
				$selectclassdeactive = 'selected';
				}
			}
			elseif( $std == 'true') {
			   $checked = 'checked="checked"';
			   $selectclassactive = 'selected';
				$selectclassdeactive = '';
			}
			else {
				$checked = '';
				 $selectclassactive = '';
				$selectclassdeactive = 'selected';
			}
			echo '<div class="metabox-title">'. $field['name'].'</div>
					<p class="field switch" style="float:left; margin-right:30px;"><label class="cb-enable '.$selectclassactive.'"><span>'. __('ON','sosthemes').'</span></label>
					<label class="cb-disable '.$selectclassdeactive.'"><span>'. __('OFF','sosthemes').'</span></label><span class="hidden" style="display:none;">
			<input type="checkbox" class="checkbox inblock" name="'.  $field['id'] .'" id="'. $field['id'] .'" value="true" '. $checked .' /><div class=" inblock0" style="margin-top: 30px;">'. $field['desc'].'</div><div class="sep"></div>';
		break;
/*	--------------------------------------------------------------
	::  Case : Text
	-------------------------------------------------------------- */	
			case 'text':
			echo '<div class="metabox-title">'. $field['name'].'</div>
			<input class="metabox-text" type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '"  />
			<div class="metabox-desc">'. $field['desc'].'</div><div class="sep"></div>';
			break;
/*	--------------------------------------------------------------
	::  Case : Button
	-------------------------------------------------------------- */	
			case 'button':
			echo '<input type="button" class="customdark" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />
			<input type="button" class="customdark1" name="', $field['id'], '" id="', $field['id'], '_delete" value="Delete" /><div class="sep"></div>';
			echo '<script type="text/javascript">
			jQuery(document).ready(function() {
					jQuery(\'#'. $field['id'] .'\').click(function() {
							window.send_to_editor = function(html) {
								imgurl = jQuery(\'img\',html).attr(\'src\');
								jQuery(\'#'. $field['id'] .'_image\').val(imgurl);
								tb_remove();
							}
							tb_show(\'\', \'media-upload.php?post_id=0&type=image&TB_iframe=1\');
							return false;
					}); 	
			});
			jQuery(document).ready(function() {
					jQuery(\'#'. $field['id'] .'_delete\').click(function() {
							imgurl = \'\';
							jQuery(\'#'. $field['id'] .'_image\').val(imgurl);
							jQuery(\'#'. $field['id'] .'_image_div\').fadeOut(\'slow\');
					}); 
			});
			</script>';
			break;	
/*	--------------------------------------------------------------
	::  Case : Select
	-------------------------------------------------------------- */				
			case 'select':
				echo '<div class="metabox-title">'. $field['name'].'</div><select class="typography" name="'. $field['id'] .'" id="'. $field['id'] .'">';
				 $select_value = get_post_meta($post->ID, $field['id'], true);
				foreach ( $field['options'] as $option ) {
					$selected = '';
					if( $select_value != '' ) {
						if ( $select_value == $option ) { $selected = ' selected="selected"';}
					} else {
						if ( isset( $field['std'] ) )
							if ( $field['std'] == $option ) { $selected = ' selected="selected"'; }
					}
					echo '<option'. $selected .'>';
					echo $option;
					echo '</option>';
				}
				echo '</select><div class="metabox-desc">'. $field['desc'].'</div><div class="sep"></div>';
				break;
		}
	}
	echo '</div>';
}
/*	--------------------------------------------------------------
	::  Edit Metabox
	-------------------------------------------------------------- */
add_action('save_post', 'save_metabox_slider');
function save_metabox_slider($post_id) { global $metabox_slider;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id;}
	if (!isset($_POST['sos_nonce_p']) || !wp_verify_nonce($_POST['sos_nonce_p'], basename(__FILE__))) {return $post_id;}
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) { return $post_id;}
	foreach ($metabox_slider['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = isset($_POST[$field['id']]) ? $_POST[$field['id']] : ('');
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}
$prefix = 'sosq_';
$metabox_videoslider = array(

			'id' => 'metabox_videoslider',
			'title' => __('Slide Settings','sosthemes'),
			'page' => 'videoslider',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				
/*	--------------------------------------------------------------
	:: Slider Settings
	-------------------------------------------------------------- */	
	array(
			'name' => __('Slide Embed','sosthemes'),
			'desc' => __('You can paste any embed/iframe code here. Width and height will be automatically fit in responsive layout','sosthemes'),
			'id' => $prefix.'slider_embed',
			'type' => 'textarea',
			"std" => ''
			),	
	array(
			'name' => __('Slide Title','sosthemes'),
			'desc' => __('Please insert a slide title that will be located on the right side of the embed code.','sosthemes'),
			'id' => $prefix.'slider_embed_title',
			'type' => 'text',
			"std" => ''
			),	
	array(
			'name' => __('Slide Caption','sosthemes'),
			'desc' => __('Please insert a slide caption that will be located on the right side of the embed code.','sosthemes'),
			'id' => $prefix.'slider_embed_caption',
			'type' => 'textarea',
			"std" => ''
			),
			
			
		),
	);

/*	--------------------------------------------------------------
	:: Add Metabox
	-------------------------------------------------------------- */
add_action('admin_menu', 'sos_add_metabox_videoslider');
function sos_add_metabox_videoslider() {
	global $metabox_videoslider;
	add_meta_box($metabox_videoslider['id'], $metabox_videoslider['title'], 'sos_stshowv', $metabox_videoslider['page'], $metabox_videoslider['context'], $metabox_videoslider['priority']);
}
/*	--------------------------------------------------------------
	:: Metabox Functions
	-------------------------------------------------------------- */
function sos_stshowv() {
	global $metabox_videoslider, $post;
	echo '<input type="hidden" name="sos_nonce_p" value="', wp_create_nonce(basename(__FILE__)), '" />';
	echo '<div class="metabox-area">';
	foreach ($metabox_videoslider['fields'] as $field) {
			$meta = get_post_meta($post->ID, $field['id'], true);
			switch ($field['type']) {			
/*	--------------------------------------------------------------
	::  Case : Trigger
	-------------------------------------------------------------- */						
	case 'trigger':	
	echo '<div id="'. $field['id'].'">';
	break;	
	case 'trigger_close':	
	echo '</div>';
	break;	
/*	--------------------------------------------------------------
	::  Case : Upload
	-------------------------------------------------------------- */
			case 'textupload':		
			echo '<div class="metabox-title">'. $field['name'].'</div>
			<input class="metabox-text" type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '"  />
			<div class="metabox-desc">'. $field['desc'].'</div>';
			$metapic =  get_post_meta($post->ID, $field['id'], true);
			if ( $metapic !== "") {
			echo  '<div id="'. $field['id'] .'_div" > <img class="slide-image" src="', $meta ? $meta : $field['std'], '" /> </div>';} else { echo '';}
			break;
/*	--------------------------------------------------------------
	::  Case : Textarea
	-------------------------------------------------------------- */
			case 'textarea':
			echo '<div class="metabox-title">'. $field['name'].'</div>
			<textarea class="metabox-textarea" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? stripslashes(htmlspecialchars(( $meta), ENT_QUOTES)) : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '">', $meta ? stripslashes(htmlspecialchars(( $meta), ENT_QUOTES)) : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
			echo '<div class="metabox-desc">'. $field['desc'].'  </div> <div class="sep"></div>';
			break;
/*	--------------------------------------------------------------
	::  Case : Checkbox
	-------------------------------------------------------------- */
			case "checkbox": 
		   $saved_std = get_post_meta($post->ID, $field['id'], true);
		   $checked = '';
		   $selectclassactive = '';
			$selectclassdeactive = 'selected';
			$std = $field['std'];
			if(!empty($saved_std)) {
				if($saved_std == 'true') {
				$checked = 'checked="checked"';
				$selectclassactive = 'selected';
		   		$selectclassdeactive = '';
				}
				else{
				   $checked = '';
				      $selectclassactive = '';
				$selectclassdeactive = 'selected';
				}
			}
			elseif( $std == 'true') {
			   $checked = 'checked="checked"';
			   $selectclassactive = 'selected';
				$selectclassdeactive = '';
			}
			else {
				$checked = '';
				 $selectclassactive = '';
				$selectclassdeactive = 'selected';
			}
			echo '<div class="metabox-title">'. $field['name'].'</div>
					<p class="field switch" style="float:left; margin-right:30px;"><label class="cb-enable '.$selectclassactive.'"><span>ON</span></label>
					<label class="cb-disable '.$selectclassdeactive.'"><span>OFF</span></label><span class="hidden" style="display:none;">
			<input type="checkbox" class="checkbox inblock" name="'.  $field['id'] .'" id="'. $field['id'] .'" value="true" '. $checked .' /><div class=" inblock0" style="margin-top: 30px;">'. $field['desc'].'</div><div class="sep"></div>';
		break;	
/*	--------------------------------------------------------------
	::  Case : Text
	-------------------------------------------------------------- */	
			case 'text':
			echo '<div class="metabox-title">'. $field['name'].'</div>
			<input class="metabox-text" type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '"  />
			<div class="metabox-desc">'. $field['desc'].'</div><div class="sep"></div>';
			break;
/*	--------------------------------------------------------------
	::  Case : Button
	-------------------------------------------------------------- */	
			case 'button':
			echo '<input type="button" class="customdark" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />
			<input type="button" class="customdark1" name="', $field['id'], '" id="', $field['id'], '_delete" value="Delete" /><div class="sep"></div>';
			echo '<script type="text/javascript">
			jQuery(document).ready(function() {
					jQuery(\'#'. $field['id'] .'\').click(function() {
							window.send_to_editor = function(html) {
								imgurl = jQuery(\'img\',html).attr(\'src\');
								jQuery(\'#'. $field['id'] .'_image\').val(imgurl);
								tb_remove();
							}
							tb_show(\'\', \'media-upload.php?post_id=0&type=image&TB_iframe=1\');
							return false;
					}); 	
			});
			jQuery(document).ready(function() {
					jQuery(\'#'. $field['id'] .'_delete\').click(function() {
							imgurl = \'\';
							jQuery(\'#'. $field['id'] .'_image\').val(imgurl);
							jQuery(\'#'. $field['id'] .'_image_div\').fadeOut(\'slow\');
					}); 
			});
			</script>';
			break;
/*	--------------------------------------------------------------
	::  Case : Select
	-------------------------------------------------------------- */				
			case 'select':
				echo '<div class="metabox-title">'. $field['name'].'</div><select class="typography" name="'. $field['id'] .'" id="'. $field['id'] .'">';
				 $select_value = get_post_meta($post->ID, $field['id'], true);
				foreach ( $field['options'] as $option ) {
					$selected = '';
					if( $select_value != '' ) {
						if ( $select_value == $option ) { $selected = ' selected="selected"';}
					} else {
						if ( isset( $field['std'] ) )
							if ( $field['std'] == $option ) { $selected = ' selected="selected"'; }
					}
					echo '<option'. $selected .'>';
					echo $option;
					echo '</option>';
				}
				echo '</select><div class="metabox-desc">'. $field['desc'].'</div><div class="sep"></div>';
				break;
		}
	}
	echo '</div>';
}
/*	--------------------------------------------------------------
	::  Edit Metabox
	-------------------------------------------------------------- */
add_action('save_post', 'save_metabox_videoslider');
function save_metabox_videoslider($post_id) { global $metabox_videoslider;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id;}
	if (!isset($_POST['sos_nonce_p']) || !wp_verify_nonce($_POST['sos_nonce_p'], basename(__FILE__))) {return $post_id;}
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) { return $post_id;}
	foreach ($metabox_videoslider['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = isset($_POST[$field['id']]) ? $_POST[$field['id']] : ('');
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}