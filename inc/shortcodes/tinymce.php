<?php
//Tinymce
add_action('init', 'add_tinymce_button');
function add_tinymce_button() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
   {  
     add_filter('mce_external_plugins', 'add_plugin');  
     add_filter('mce_buttons_4', 'register_tinymce_button');  
   }  
}  
function register_tinymce_button($buttons) {  
   array_push($buttons,
   "sos_recent_portfolio",
   "sos_recent_post",
   "sos_embed",
   "sos_lightbox",
   "sos_respons_image",
   "sos_slider",
   "sos_iconic",
   "sos_servicebox",
   "sos_team",
   "sos_tabs",
   "sos_accordion",
   "sos_vaccordion",
   "sos_button",
   "sos_testimonials"
    );  
   return $buttons;  
}  
function add_plugin($plugin_array) { 
    $plugin_array['sos_recent_portfolio']   = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';
    $plugin_array['sos_recent_post']    = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';
    $plugin_array['sos_embed']        = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';  
    $plugin_array['sos_lightbox']       = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js'; 
    $plugin_array['sos_slider']       = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';      
    $plugin_array['sos_respons_image']    = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';    
    $plugin_array['sos_iconic']       = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';  
    $plugin_array['sos_team']           = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';  
    $plugin_array['sos_tabs']           = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';  
    $plugin_array['sos_accordion']        = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';  
    $plugin_array['sos_vaccordion']     = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';  
    $plugin_array['sos_button']       = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';  
    $plugin_array['sos_servicebox']     = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';  
    $plugin_array['sos_testimonials']     = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';  
   return $plugin_array;  
}  
//Tinymce
add_action('init', 'add_tinymce_button2');
function add_tinymce_button2() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
   {  
     add_filter('mce_external_plugins', 'add_plugin2');  
     add_filter('mce_buttons_3', 'register_tinymce_button2');  
   }  
}  
function register_tinymce_button2($buttons) {  
   array_push($buttons,
    "sos_container", 
  "sos_columns12",
  "sos_columns13",
  "sos_columns14",
  "sos_columns24",
  "sos_columns23",
  "sos_columns34",
  "sos_announcement",
  "sos_title",  
  "sos_dropcap",
  "sos_highlight",
  "sos_aqua_hr",
  "sos_alert",
  "sos_listtick",
  "sos_listcross",
  "sos_erase"
  );  
   return $buttons;  
}  
function add_plugin2($plugin_array) { 
    $plugin_array['sos_container']      = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';
    $plugin_array['sos_announcement']     = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';  
    $plugin_array['sos_columns12']      = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';  
    $plugin_array['sos_columns13']      = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js'; 
    $plugin_array['sos_columns14']      = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';  
    $plugin_array['sos_columns24']      = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js'; 
    $plugin_array['sos_columns23']      = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js'; 
    $plugin_array['sos_columns34']      = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js'; 
    $plugin_array['sos_highlight']      = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js'; 
    $plugin_array['sos_dropcap']     	= get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';  
    $plugin_array['sos_aqua_hr']      	= get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';
    $plugin_array['sos_title']        	= get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';  
    $plugin_array['sos_alert']        	= get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js'; 
	$plugin_array['sos_listtick']       = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js'; 
	$plugin_array['sos_listcross']      = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js'; 
	$plugin_array['sos_erase']      = get_template_directory_uri().'/inc/shortcodes/tinymce/sos-tinymce.js';     
   return $plugin_array;  
}  
?>
