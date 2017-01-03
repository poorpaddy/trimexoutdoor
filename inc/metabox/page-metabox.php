<?php
/*	--------------------------------------------------------------
	:: SEO Metabox
	-------------------------------------------------------------- */
$prefix = 'sos_';
$metabox_seo_page = array(

			'id' => 'metabox_seo_page',
			'title' => __('SEO Settings','sosthemes'),
			'page' => 'page',
			'context' => 'normal',
			'priority' => 'core',
			'fields' => array(

	array(
		'name' 			=> __('Title','sosthemes'),
		'desc' 			=> __('Title must not exceed 70 characters. Search engines mark titles with more than 70 characters as spam. Character count will not let you write if you try to exceed the limit.','sosthemes'),
		'id' 			=> 'sosq_inpost_seo_title',
		'type' 			=> 'text',
		'std'		=> '',
	),
	
	array(
		'name' 			=> __('Description','sosthemes'),
		'desc' 			=> __('Description must not exceed 160 characters. Search engines mark descriptions with more than 160 characters as spam. Character count will not let you write if you try to exceed the limit.','sosthemes'),
		'id' 			=> 'sosq_inpost_seo_desc',
		'type' 			=> 'textarea',
		'std'		=> '',
	),
		
	array(
		'name' 			=> __('Keywords ( comma seperated )','sosthemes'),
		'desc' 			=> __('Keywords must not exceed 260 characters. Search engines mark keywords with more than 260 characters as spam. Character count will not let you write if you try to exceed the limit.','sosthemes'),
		'id' 			=> 'sosq_inpost_seo_key',
		'type' 			=> 'textarea',
		'std'		=> '',
	),
	
		),
	);

/*	--------------------------------------------------------------
	:: Add Metabox
	-------------------------------------------------------------- */
add_action('admin_menu', 'sos_add_metabox_seo_page');
function sos_add_metabox_seo_page() {
	global $metabox_seo_page;
	add_meta_box($metabox_seo_page['id'], $metabox_seo_page['title'], 'st_metabox_seo_page', $metabox_seo_page['page'], $metabox_seo_page['context'], $metabox_seo_page['priority']);
}
/*	--------------------------------------------------------------
	:: Metabox Functions SEO
	-------------------------------------------------------------- */
function st_metabox_seo_page() {
	global $metabox_seo_page, $post;
	echo '<input type="hidden" name="sos_nonce_p" value="', wp_create_nonce(basename(__FILE__)), '" />';
	echo '<div class="metabox-area">';
	foreach ($metabox_seo_page['fields'] as $field) {
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
	add_action('save_post', 'save_metabox_seo_page');
	function save_metabox_seo_page($post_id) { global $post; global $metabox_seo_page;
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id;}
		if (!isset($_POST['sos_nonce_p']) || !wp_verify_nonce($_POST['sos_nonce_p'], basename(__FILE__))) {return $post_id;}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		} elseif (!current_user_can('edit_post', $post_id)) { return $post_id;}
		foreach ($metabox_seo_page['fields'] as $field) {
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
	:: Page Metabox
	-------------------------------------------------------------- */
$prefix = 'sosq_';
$metabox_homepage = array(

			'id' => 'metabox_homepage',
			'title' => __('Settings','sosthemes'),
			'page' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				
/*	--------------------------------------------------------------
	:: Homepage Settings
	-------------------------------------------------------------- */	
	array(
		'id' => $prefix.'page_homepage',
		'type' => 'trigger',
			),

	array(
		'name' => __('Homepage slider','sosthemes'),
		'desc' => __('Please choose slider that you would like to display on your homepage.','sosthemes'),
		'id' => $prefix.'hpslider_type',
		'type' => 'select',
		'options' => array('flexslider' => 'FlexSlider','embedslider' => 'EmbedSlider' ,'noslider' => 'NoSlider' ),
		"std" => ''	
			),
	
	array(
		'id' => $prefix.'page_homepage',
		'type' => 'trigger_close',
			),
			
		),
	);

/*	--------------------------------------------------------------
	:: Add Metabox
	-------------------------------------------------------------- */
add_action('admin_menu', 'sos_add_metabox_homepage');
function sos_add_metabox_homepage() {
	global $metabox_homepage;
	add_meta_box($metabox_homepage['id'], $metabox_homepage['title'], 'sos_stshowpma', $metabox_homepage['page'], $metabox_homepage['context'], $metabox_homepage['priority']);
}
/*	--------------------------------------------------------------
	:: Metabox Functions
	-------------------------------------------------------------- */
function sos_stshowpma() {
	global $metabox_homepage, $post;
	echo '<input type="hidden" name="sos_nonce_p" value="', wp_create_nonce(basename(__FILE__)), '" />';
	echo '<div class="metabox-area">';
	foreach ($metabox_homepage['fields'] as $field) {
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
/*	--------------------------------------------------------------
	::  Case : Button
	-------------------------------------------------------------- */	
			case 'button':
			echo '<input type="button" class="button-primary" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />
			<input type="button" class="button" name="', $field['id'], '" id="', $field['id'], '_delete" value="Delete" /><div class="sep"></div>';
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
add_action('save_post', 'save_metabox_homepage');
function save_metabox_homepage($post_id) { global $post; global $metabox_homepage;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id;}
	if (!isset($_POST['sos_nonce_p']) || !wp_verify_nonce($_POST['sos_nonce_p'], basename(__FILE__))) {return $post_id;}
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) { return $post_id;}
	foreach ($metabox_homepage['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = isset($_POST[$field['id']]) ? $_POST[$field['id']] : ('');
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}