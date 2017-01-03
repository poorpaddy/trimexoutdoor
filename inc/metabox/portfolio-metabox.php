<?php
/*	--------------------------------------------------------------
	:: Slider Metabox
	-------------------------------------------------------------- */
$prefix = 'sos_';
$metabox_seo_portfolio = array(

			'id' => 'metabox_seo_portfolio',
			'title' => __('SEO Settings','sosthemes'),
			'page' => 'portfolio',
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
add_action('admin_menu', 'sos_add_metabox_seo_portfolio');
function sos_add_metabox_seo_portfolio() {
	global $metabox_seo_portfolio;
	add_meta_box($metabox_seo_portfolio['id'], $metabox_seo_portfolio['title'], 'st_metabox_seo_portfolio', $metabox_seo_portfolio['page'], $metabox_seo_portfolio['context'], $metabox_seo_portfolio['priority']);
}
/*	--------------------------------------------------------------
	:: Metabox Functions SEO
	-------------------------------------------------------------- */
function st_metabox_seo_portfolio() {
	global $metabox_seo_portfolio, $post;
	echo '<input type="hidden" name="sos_nonce_p" value="', wp_create_nonce(basename(__FILE__)), '" />';
	echo '<div class="metabox-area">';
	foreach ($metabox_seo_portfolio['fields'] as $field) {
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
	add_action('save_post', 'save_metabox_seo_portfolio');
	function save_metabox_seo_portfolio($post_id) { global $post; global $metabox_seo_portfolio;
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id;}
		if (!isset($_POST['sos_nonce_p']) || !wp_verify_nonce($_POST['sos_nonce_p'], basename(__FILE__))) {return $post_id;}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		} elseif (!current_user_can('edit_post', $post_id)) { return $post_id;}
		foreach ($metabox_seo_portfolio['fields'] as $field) {
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
$metabox_portfolio = array(

			'id' => 'metabox_portfolio',
			'title' => __('Portfolio Settings','sosthemes'),
			'page' => 'portfolio',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				
/*	--------------------------------------------------------------
	:: Settings
	-------------------------------------------------------------- */	

	array(
			'name' => __('Portfolio Type','sosthemes'),
			'desc' => __('Please choose portfolio type. ( image or video )','sosthemes'),
			'id' => $prefix.'portfolio_type',
			'type' => 'select',
			'options' => array('Image' => 'Image','Video' => 'Video' ),
			"std" => ''
			
			),
			
	array(
			'name' => __('Lightbox','sosthemes'),
			'desc' => __('If lightbox is active ( yes ), larger images displayed with lightbox when clicked on thumbnail. If lightbox is deactive ( no ), goes to portfolio single page when clicked on thumbnail.','sosthemes'),
			'id' => $prefix.'portfolio_lightbox',
			'type' => 'select',
			'options' => array('yes' => 'Yes','no' => 'No' ),
			"std" => ''
			
			),

	array(
			'name' => __('Portfolio Thumbnail','sosthemes'),
			'desc' => __('Please click browse button > select files > insert into post, to choose and add portfolio thumbnail image. w: 450px , h: 320px','sosthemes'),
			'id' => $prefix.'portfolio_thumb_image',
			'type' => 'textupload',
			"std" => ''
			),
			
	array(
			'id' => $prefix.'portfolio_thumb',
			'type' => 'button',
			'std' => __('Browse','sosthemes'),
			),
	array(
			'name' => __('Automatic Resizing / Cropping','sosthemes'),
			'desc' => __('Turn <strong>[ON]</strong> if you want your images to be automatically resized / cropped by using timthumb.','sosthemes'),
			'id' => 'true_timthumb',
			'type' => 'checkbox',
			"std" => ''
			),
			
	array(
			'name' => __('Portfolio Description','sosthemes'),
			'desc' => __('Please write a short description about your portfolio.','sosthemes'),
			'id' => $prefix.'portfolio_desc',
			'type' => 'textarea',
			"std" => ''
			),
	array(
			'name' => __('Portfolio Client','sosthemes'),
			'desc' => __('Please insert names of your clients, if left empty (if there is no) client section will not be displayed.','sosthemes'),
			'id' => $prefix.'portfolio_client',
			'type' => 'text',
			"std" => ''
			),
	array(
			'name' => __('Show Data','sosthemes'),
			'desc' => __('If you choose yes data will be displayed and if you choose no data will not be displayed.','sosthemes'),
			'id' => $prefix.'portfolio_data',
			'type' => 'select',
			'options' => array('yes' => 'Yes','no' => 'No' ),
			"std" => ''
			
			),
	array(
			'name' => __('Portfolio URL','sosthemes'),
			'desc' => __('Please write if your portfolio has a link. Leave empty if there is not.','sosthemes'),
			'id' => $prefix.'portfolio_url',
			'type' => 'text',
			"std" => ''
			),

	array(
			'name' => __('View Project text','sosthemes'),
			'desc' => __('Please insert text if you would like to change "view project" text. If left empty, View Project will be displayed.','sosthemes'),
			'id' => $prefix.'portfolio_view_text',
			'type' => 'text',
			"std" => ''
			),
	array(
			'name' => __('Show Taxonomy','sosthemes'),
			'desc' => __('If you choose yes taxonomy will be displayed and if you choose no taxonomy will not be displayed.','sosthemes'),
			'id' => $prefix.'portfolio_taxo',
			'type' => 'select',
			'options' => array('yes' => 'Yes','no' => 'No' ),
			"std" => ''
			
			),
			
/*	--------------------------------------------------------------
	:: Portfolio Type: Image
	-------------------------------------------------------------- */		
					
	array(
			'id' => $prefix.'portfolio_img',
			'type' => 'trigger',
			),
			
			
	array(
			'name' => __('Image 1','sosthemes'),
			'desc' => __('Image width must be minimum 930px. Height will be automatically set.','sosthemes'),
			'id' => $prefix.'portfolio_big1_image',
			'type' => 'textupload',
			"std" => ''
			),
			
	array(
			'id' => $prefix.'portfolio_big1',
			'type' => 'button',
			'std' => __('Browse','sosthemes'),
			),
	array(
			'name' => __('Image 2','sosthemes'),
			'desc' => __('Image width must be minimum 930px. Height will be automatically set.','sosthemes'),
			'id' => $prefix.'portfolio_big2_image',
			'type' => 'textupload',
			"std" => ''
			),
			
	array(
			'id' => $prefix.'portfolio_big2',
			'type' => 'button',
			'std' => __('Browse','sosthemes'),
			),
			
	array(
			'name' => __('Image 3','sosthemes'),
			'desc' => __('Image width must be minimum 930px. Height will be automatically set.','sosthemes'),
			'id' => $prefix.'portfolio_big3_image',
			'type' => 'textupload',
			"std" => ''
			),
			
	array(
			'id' => $prefix.'portfolio_big3',
			'type' => 'button',
			'std' => __('Browse','sosthemes'),
			),

	array(
			'name' => __('Image 4','sosthemes'),
			'desc' => __('Image width must be minimum 930px. Height will be automatically set.','sosthemes'),
			'id' => $prefix.'portfolio_big4_image',
			'type' => 'textupload',
			"std" => ''
			),
			
	array(
			'id' => $prefix.'portfolio_big4',
			'type' => 'button',
			'std' => __('Browse','sosthemes'),
			),
		
	array(
			'name' => __('Image 5','sosthemes'),
			'desc' => __('Image width must be minimum 930px. Height will be automatically set.','sosthemes'),
			'id' => $prefix.'portfolio_big5_image',
			'type' => 'textupload',
			"std" => ''
			),
			
	array(
			'id' => $prefix.'portfolio_big5',
			'type' => 'button',
			'std' => __('Browse','sosthemes'),
			),
	
	array(
			'name' => __('Image 6','sosthemes'),
			'desc' => __('Image width must be minimum 930px. Height will be automatically set.','sosthemes'),
			'id' => $prefix.'portfolio_big6_image',
			'type' => 'textupload',
			"std" => ''
			),
			
	array(
			'id' => $prefix.'portfolio_big6',
			'type' => 'button',
			'std' => __('Browse','sosthemes'),
			),
	array(
			'name' => __('Image 7','sosthemes'),
			'desc' => __('Image width must be minimum 930px. Height will be automatically set.','sosthemes'),
			'id' => $prefix.'portfolio_big7_image',
			'type' => 'textupload',
			"std" => ''
			),
			
	array(
			'id' => $prefix.'portfolio_big7',
			'type' => 'button',
			'std' => __('Browse','sosthemes'),
			),
			
	array(
			'name' => __('Image 8','sosthemes'),
			'desc' => __('Image width must be minimum 930px. Height will be automatically set.','sosthemes'),
			'id' => $prefix.'portfolio_big8_image',
			'type' => 'textupload',
			"std" => ''
			),
			
	array(
			'id' => $prefix.'portfolio_big8',
			'type' => 'button',
			'std' => __('Browse','sosthemes'),
			),

	array(
			'name' => __('Image 9','sosthemes'),
			'desc' => __('Image width must be minimum 930px. Height will be automatically set.','sosthemes'),
			'id' => $prefix.'portfolio_big9_image',
			'type' => 'textupload',
			"std" => ''
			),
			
	array(
			'id' => $prefix.'portfolio_big9',
			'type' => 'button',
			'std' => __('Browse','sosthemes'),
			),
		
	array(
			'name' => __('Image 10','sosthemes'),
			'desc' => __('Image width must be minimum 930px. Height will be automatically set.','sosthemes'),
			'id' => $prefix.'portfolio_big10_image',
			'type' => 'textupload',
			"std" => ''
			),
			
	array(
			'id' => $prefix.'portfolio_big10',
			'type' => 'button',
			'std' => __('Browse','sosthemes'),
			),
			
	array(
			'id' => $prefix.'portfolio_img_close',
			'type' => 'trigger_close',
			),

/*	--------------------------------------------------------------
	:: Portfolio Type: Video
	-------------------------------------------------------------- */
	
	array(
			'id' => $prefix.'portfolio_embed',
			'type' => 'trigger',
			),
			
	array(
			'name' => __('Video Embed','sosthemes'),
			'desc' => __('You can paste any embed/iframe code here. Width and height will be automatically fit in responsive layout','sosthemes'),
			'id' => $prefix.'portfolio_embed_code',
			'type' => 'textarea',
			"std" => ''
			),
			
	array(
			'id' => $prefix.'portfolio_embed_close',
			'type' => 'trigger_close',
			),

			
		),
	);
/*	--------------------------------------------------------------
	:: Add Metabox
	-------------------------------------------------------------- */
add_action('admin_menu', 'sos_add_metabox_portfolio');
function sos_add_metabox_portfolio() {
	global $metabox_portfolio;
	add_meta_box($metabox_portfolio['id'], $metabox_portfolio['title'], 'st_metabox_portfolio', $metabox_portfolio['page'], $metabox_portfolio['context'], $metabox_portfolio['priority']);
}
/*	--------------------------------------------------------------
	:: Metabox Functions
	-------------------------------------------------------------- */
function st_metabox_portfolio() {
	global $metabox_portfolio, $post;
	echo '<input type="hidden" name="sos_nonce_p" value="', wp_create_nonce(basename(__FILE__)), '" />';
	echo '<div class="metabox-area">';
	foreach ($metabox_portfolio['fields'] as $field) {
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
add_action('save_post', 'save_metabox_portfolio');
function save_metabox_portfolio($post_id) {global $post; global $metabox_portfolio;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id;}
	if (!isset($_POST['sos_nonce_p']) || !wp_verify_nonce($_POST['sos_nonce_p'], basename(__FILE__))) {return $post_id;}
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) { return $post_id;}
	foreach ($metabox_portfolio['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = isset($_POST[$field['id']]) ? $_POST[$field['id']] : ('');
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}