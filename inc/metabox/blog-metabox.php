<?php
/*	--------------------------------------------------------------
	:: SEO Metabox
	-------------------------------------------------------------- */
$prefix = 'sos_';

$metabox_seo_blog = array(

		'id'            => 'metabox_seo_blog',
		'title'         => __('SEO Settings','sosthemes'),
		'page'          => 'post',
		'context'       => 'normal',
		'priority'      => 'core',
		'fields'        => array(

	array(
		'name' 			=> __('Title','sosthemes'),
		'desc' 			=> __('Title must not exceed 70 characters. Search engines mark titles with more than 70 characters as spam. Character count will not let you write if you try to exceed the limit.','sosthemes'),
		'id' 			=> 'sosq_inpost_seo_title',
		'type' 			=> 'text',
		'std'		    => '',
	),
	
	array(
		'name' 			=> __('Description','sosthemes'),
		'desc' 			=> __('Description must not exceed 160 characters. Search engines mark descriptions with more than 160 characters as spam. Character count will not let you write if you try to exceed the limit.','sosthemes'),
		'id' 			=> 'sosq_inpost_seo_desc',
		'type' 			=> 'textarea',
		'std'		    => '',
	),
		
	array(
		'name' 			=> __('Keywords ( comma seperated )','sosthemes'),
		'desc' 			=> __('Keywords must not exceed 260 characters. Search engines mark keywords with more than 260 characters as spam. Character count will not let you write if you try to exceed the limit.','sosthemes'),
		'id' 			=> 'sosq_inpost_seo_key',
		'type' 			=> 'textarea',
		'std'		    => '',
	),
		),
	);
/*	--------------------------------------------------------------
	:: Add Metabox
	-------------------------------------------------------------- */
add_action('admin_menu', 'sos_add_metabox_seo_blog');
function sos_add_metabox_seo_blog() {
	global $metabox_seo_blog;
	add_meta_box($metabox_seo_blog['id'], $metabox_seo_blog['title'], 'st_metabox_seo_blog', $metabox_seo_blog['page'], $metabox_seo_blog['context'], $metabox_seo_blog['priority']);
}
/*	--------------------------------------------------------------
	:: Metabox Functions SEO
	-------------------------------------------------------------- */
function st_metabox_seo_blog() {
	global $metabox_seo_blog, $post;
	echo '<input type="hidden" name="sos_nonce_p" value="', wp_create_nonce(basename(__FILE__)), '" />';
	echo '<div class="metabox-area">';
	foreach ($metabox_seo_blog['fields'] as $field) {
			$meta = get_post_meta($post->ID, $field['id'], true);
			switch ($field['type']) {
/*	--------------------------------------------------------------
	::  Case : Textarea
	-------------------------------------------------------------- */
			case 'textarea':
			echo '<div class="metabox-title">'. $field['name'].'</div>
			<textarea class="metabox-textarea" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" "">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
			echo '<div class="metabox-desc">'. $field['desc'].'  </div> <div class="sep"></div>';
			break;
/*	--------------------------------------------------------------
	::  Case : Checkbox
	-------------------------------------------------------------- */
			case "checkbox": 
		   $saved_std = get_post_meta($post->ID, $field['id'], true);
		   $checked = '';
			$std = $field['std'];
			if(!empty($saved_std)) {
				if($saved_std == 'true') {
				$checked = 'checked="checked"';
				}
				else{
				   $checked = '';
				}
			}
			elseif( $std == 'true') {
			   $checked = 'checked="checked"';
			}
			else {
				$checked = '';
			}
			echo '<div class="metabox-title">'. $field['name'].'</div>
			<input type="checkbox" class="checkbox inblock" name="'.  $field['id'] .'" id="'. $field['id'] .'" value="true" '. $checked .' /><div class=" inblock">'. $field['desc'].'</div><div class="sep"></div>';
		break;
/*	--------------------------------------------------------------
	::  Case : Text
	-------------------------------------------------------------- */	
			case 'text':
			echo '<div class="metabox-title">'. $field['name'].'</div>
			<input class="metabox-text" type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '"  />
			<div class="metabox-desc">'. $field['desc'].'</div><div class="sep"></div>';
			break;
		}
	}
	echo '</div>';
}
/*	--------------------------------------------------------------
	::  Edit Metabox
	-------------------------------------------------------------- */
	add_action('save_post', 'save_metabox_seo_blog'); 
	function save_metabox_seo_blog($post_id) { global $post; global $metabox_seo_blog;
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id;}
		if (!isset($_POST['sos_nonce_p']) || !wp_verify_nonce($_POST['sos_nonce_p'], basename(__FILE__))) {return $post_id;}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		} elseif (!current_user_can('edit_post', $post_id)) { return $post_id;}
		foreach ($metabox_seo_blog['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			$new = isset($_POST[$field['id']]) ? $_POST[$field['id']] : ('');
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], $new);
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
	}
/*	--------------------------------------------------------------
	:: Blog Metabox
	-------------------------------------------------------------- */

$metabox_blog = array(

			'id'       => 'metabox_blog',
			'title'    => __('Blog Settings','sosthemes'),
			'page'     => 'post','page',
			'context'  => 'normal',
			'priority' => 'high',
			'fields'   => array(
			
/*	--------------------------------------------------------------
	:: Postformat : Gallery
	-------------------------------------------------------------- */		
	array(
			'id'       => 'blog_desc_trigger',
			'type'     => 'trigger',
			),

	array( 'id'        => 'blog_main_desc',
			'type'     => 'alldesc',
			'desc'     => __('For Thumbnail image, please use Featured Image. Please change format to Gallery or Video to use metaboxes of related section.','sosthemes'),
			
			),	
	array(
			'id'       => 'blog_desc_trigger_close',
			'type'     => 'trigger_close',
			),	
	array(
			'id'       => 'blog_gallery',
			'type'     => 'trigger',
			),
			
	array(
			'name'     => __('Gallery Image Height','sosthemes'),
			'desc'     => __('Please insert height for your images that will be located in gallery post format. For 600px write 600. If automatic resizing/cropping is not turned <strong>[OFF]</strong>, images will not be resized/cropped.','sosthemes'),
			'id'       => 'gallery_img_height',
			'type'     => 'text',
			"std"      => ''
			),
	array(
			'name'     => __('Automatic Resizing / Cropping','sosthemes'),
			'desc'     => __('Turn <strong>[ON]</strong> if you want your images to be automatically resized / cropped by using timthumb.','sosthemes'),
			'id'       => 'true_timthumb',
			'type'     => 'checkbox',
			"std"      => ''
			),
			
	array(
			'name'     => __('Image 1','sosthemes'),
			'desc'     => __('Please click Browse button to choose and add image. w: 610px , h: same height as above.','sosthemes'),
			'id'       => 'gallery_big1_image',
			'type'     => 'textupload',
			"std"      => ''
			),
			
	array(
			'id'       => 'gallery_big1',
			'type'     => 'button',
			'std'      => __('Browse','sosthemes'),
			),
	array(
			'name'     => __('Image 2','sosthemes'),
			'desc'     => __('Please click Browse button to choose and add image. w: 610px , h: same height as above.','sosthemes'),
			'id'       => 'gallery_big2_image',
			'type'     => 'textupload',
			"std"      => ''
			),
			
	array(
			'id'       => 'gallery_big2',
			'type'     => 'button',
			'std'      => __('Browse','sosthemes'),
			),
			
	array(
			'name'     => __('Image 3','sosthemes'),
			'desc'     => __('Please click Browse button to choose and add image. w: 610px , h: same height as above.','sosthemes'),
			'id'       => 'gallery_big3_image',
			'type'     => 'textupload',
			"std"      => ''
			),
			
	array(
			'id'       => 'gallery_big3',
			'type'     => 'button',
			'std'      => __('Browse','sosthemes'),
			),

	array(
			'name'     => __('Image 4','sosthemes'),
			'desc'     => __('Please click Browse button to choose and add image. w: 610px , h: same height as above.','sosthemes'),
			'id'       => 'gallery_big4_image',
			'type'     => 'textupload',
			"std"      => ''
			),
			
	array(
			'id'       => 'gallery_big4',
			'type'     => 'button',
			'std'      => __('Browse','sosthemes'),
			),
		
	array(
			'name'     => __('Image 5','sosthemes'),
			'desc'     => __('Please click Browse button to choose and add image. w: 610px , h: same height as above.','sosthemes'),
			'id'       => 'gallery_big5_image',
			'type'     => 'textupload',
			"std"      => ''
			),
			
	array(
			'id'       => 'gallery_big5',
			'type'     => 'button',
			'std'      => __('Browse','sosthemes'),
			),
			
	array(
			'id'       => 'blog_gallery_close',
			'type'     => 'trigger_close',
			),
				
/*	--------------------------------------------------------------
	:: Postformat : Video
	-------------------------------------------------------------- */
	
	array(
			'id'       => 'blog_embed',
			'type'     => 'trigger',
			),
			
	array(
			'name'     => __('Video Embed/Iframe','sosthemes'),
			'desc'     => __('You can paste any embed/iframe code here. Width and height will be automatically fit in responsive layout','sosthemes'),
			'id'       => 'blog_embed_code',
			'type'     => 'textarea',
			"std"      => ''
			),

	array(
			'id'       => 'blog_embed_close',
			'type'     => 'trigger_close',
			),
		),
	);
/*	--------------------------------------------------------------
	:: Add Metabox
	-------------------------------------------------------------- */
add_action('admin_menu', 'sos_add_metabox_blog');
function sos_add_metabox_blog() {
	global $metabox_blog; 
	add_meta_box($metabox_blog['id'], $metabox_blog['title'], 'st_metabox_blog', $metabox_blog['page'], $metabox_blog['context'], $metabox_blog['priority']);

}
/*	--------------------------------------------------------------
	:: Metabox Functions
	-------------------------------------------------------------- */
function st_metabox_blog() {
	global $metabox_blog, $post;
	echo '<input type="hidden" name="sos_nonce_p" value="', wp_create_nonce(basename(__FILE__)), '" />';
	echo '<div class="metabox-area">';
	foreach ($metabox_blog['fields'] as $field) {
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
	::  Case : Colorpicker
	-------------------------------------------------------------- */
			case 'colorpicker':
			echo '<div class="metabox-title">'. $field['name'].'</div>
			<input type="text" class="color-picker metabox-text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '">';
			echo '<div class="metabox-desc">'. $field['desc'].'  </div> <div class="sep"></div>';
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
	::  Case : Text
	-------------------------------------------------------------- */	
			case 'alldesc':
			echo '<div class="metabox-desc">'. $field['desc'].'</div><div class="sep"></div>';
			break;
/*	--------------------------------------------------------------
	::  Case : Button
	-------------------------------------------------------------- */	
			case 'button':
			echo '<input type="button" class="customdark" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />
			<input type="button" class="customdark1" name="', $field['id'], '" id="', $field['id'], '_delete" value="'.__('Delete','sosthemes').'" /><div class="sep"></div>';	
			echo '<script type="text/javascript">
			jQuery(document).ready(function() {
					jQuery(\'#'. $field['id'] .'\').click(function() {
							window.send_to_editor = function(html) {
								imgurl = jQuery(\'img\',html).attr(\'src\');
								jQuery(\'#'. $field['id'] .'_image\').val(imgurl);
								tb_remove();
							}
							tb_show(\'\', \'media-upload.php?post_id=1&amp;type=image&amp;TB_iframe=true\');
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
				echo '<div class="metabox-title">'. $field['name'].'</div><select class="typography " name="'. $field['id'] .'" id="'. $field['id'] .'">';
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
add_action('save_post', 'save_metabox_blog');
function save_metabox_blog($post_id) { global $post; global $metabox_blog;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id;}
	if (!isset($_POST['sos_nonce_p']) || !wp_verify_nonce($_POST['sos_nonce_p'], basename(__FILE__))) {return $post_id;}
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) { return $post_id;}
	foreach ($metabox_blog['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = isset($_POST[$field['id']]) ? $_POST[$field['id']] : ('');
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}