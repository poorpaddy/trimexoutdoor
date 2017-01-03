<?php
/*	--------------------------------------------------------------
	:: Options Page
	-------------------------------------------------------------- */

function sostheme_admin_settings()
{
	global $settings_options;
	$settings_options = array();
	$blogurl = get_template_directory_uri();

/*	--------------------------------------------------------------
	:: General Settings
	-------------------------------------------------------------- */

	$settings_options[] = array(
		'name'          => __('General Settings','sosthemes'),
		'type'          => 'start_menu',
		'id'            => 'general_settings',
		'icon' 			=> $blogurl.'/admin/images/op1.png'
	);

	$settings_options[] = 	array(
		'name' 			=> __('Upload Logo','sosthemes'),
		'desc' 			=> __('Please click Browse button to choose and upload your logo. Use delete button to delete logo. Please do not forget to save after uploading your logo.','sosthemes'),
		'id' 			=> 'sosq_logo_image',
		'type'			=> 'textupload',
		'default' 		=> $blogurl.'/images/logo.jpg',
	);
		
	$settings_options[] = 	array(
		'id' 			=> 'sosq_logo',
		'type' 			=> 'button',
		'std' 			=> __('Browse','sosthemes'),		
	);

	$settings_options[] = 	array(
		'name' 			=> __('Upload Favicon','sosthemes'),
		'desc' 			=> __('Please click Browse button to choose and upload Favicon. Use delete button to delete. Please do not forget to save after uploading Favicon.','sosthemes'),
		'id' 			=> 'sosq_favicon_image',
		'type' 			=> 'textupload',
		'default' 		=> $blogurl.'/images/favicon.ico',
	);
		
	$settings_options[] = 	array(
		'id' 			=> 'sosq_favicon',
		'type' 			=> 'button',
		'std' 			=> __('Browse','sosthemes'),		
	);
	
	$settings_options[] = array(
		'name' 			=> __('Header Text Right','sosthemes'),
		'desc' 			=> __('Text you insert here will be displayed on the top right of the page. Please insert your text here.','sosthemes'),
		'id' 			=> 'header_free_text1',
		'type' 			=> 'text',
		'default'		=> 'Free Call Us'
	);
	
	$settings_options[] = array(
		'name' 			=> __('Header Text Bold Right','sosthemes'),
		'desc' 			=> __('Text you insert here will be displayed on the top right of the page as bold. Please insert your text here.','sosthemes'),
		'id' 			=> 'header_free_text2',
		'type' 			=> 'text',
		'default'		=> '+900 589 69 36'
	);

	$settings_options[] = array(
		'name' 			=> __('Footer Text Left','sosthemes'),
		'desc' 			=> __('Text you insert here will be displayed on the bottom left of the page. Please insert your text here.','sosthemes'),
		'id' 			=> 'footer_free_text3',
		'type' 			=> 'text',
		'default'		=> 'Copyright 2012 Responsive Business Html Theme'
	);
	
	$settings_options[] = array(
		'name' 			=> __('Footer Text Right','sosthemes'),
		'desc' 			=> __('Text you insert here will be displayed on the bottom right of the page as bold. Please insert your text here.','sosthemes'),
		'id' 			=> 'footer_free_text4',
		'type' 			=> 'text',
		'default'		=> 'Quickess Theme powered by <a href="#">Yourname</a>'
	);
		
	$settings_options[] = array(
		'name' 			=> __('Script field','sosthemes'),
		'desc' 			=> __('You can paste any code like Google Analytic in here.','sosthemes'),
		'id' 			=> 'sosq_main_script_area',
		'type' 			=> 'textarea',
		'default'		=> ''
	);
	
	$settings_options[] = array(
		'name' 			=> __('Custom CSS','sosthemes'),
		'desc' 			=> __('You can paste any css code','sosthemes'),
		'id' 			=> 'sosq_main_style_area',
		'type' 			=> 'textarea',
		'default'		=> ''
	);
	
	$settings_options[] = array('type' => 'end_menu');

/*	--------------------------------------------------------------
	:: Background Settings
	-------------------------------------------------------------- */

	$settings_options[] = array(
		'name'          => __('Background Settings','sosthemes'),
		'type'          => 'start_menu',
		'id'            => 'admin_background_settings',
		'icon' 			=> $blogurl.'/admin/images/op2.png'
	);	

	$settings_options[] = array(
		'name'          =>  __('Predefined Background Pattern','sosthemes'),
		'desc'          =>  __('Site\'s background/pattern. If you choose predefined patterns, please make sure "Custom Background/Pattern" is turned <strong>[OFF]</strong>. If "Custom Background/Pattern" button below is turned <strong>[OFF]</strong>, predefined background/patterns will be reactived.','sosthemes'),
		'id'            => 'sosq_main_pattern',
		'type'          => 'radio',
		'std'     		=> '1_s1',
		'default' 		=> 'true',
		'options' => array(
		'1_s1' => '1_s1' ,
		'2_s1' => '2_s1',
		'3_s1' => '3_s1', 
		'4_s1' => '4_s1' ,
		'5_s1' => '5_s1' ,
		'6_s1' => '6_s1' ,
		'7_s1' => '7_s1' , 
		'8_s1' => '8_s1' ,
		'9_s1' => '9_s1' ,
		'10_s1' => '10_s1' , )
	);

	$settings_options[] = array(
		'name' 			=> __('Custom Background/Pattern','sosthemes'),
		'desc' 			=> __('Please turn <strong>[ON]</strong> this button if you would like to deactivate predefined patterns and use custom background. If you turn <strong>[OFF]</strong> this button, predefined patterns will be reactived.','sosthemes'),
		'id' 			=> 'pattern_control',
		'type' 			=> 'checkbox',
		'default' 		=> '',
	);	
	
	$settings_options[] = array(
		'name' 			=> __('Custom Background/Pattern','sosthemes'),
		'desc'			=> __('Please click Browse button to choose and upload your background image and choose how to align it. Use delete button to delete background image. Please do not forget to save after uploading your background image.','sosthemes'),
		'id' 			=> 'sosq_main_background_image',
		'type' 			=> 'textupload',
		'default' 		=> ''
	);
	
	$settings_options[] = array(
		'id' 			=> 'sosq_main_background',
		'type' 			=> 'button',
		'std' 			=> __('Browse','sosthemes'),
	);	
	
	$settings_options[] = array(
		'name' 			=> __('Background Position','sosthemes'),
		'desc' 			=> __('If you choose Stretch as background position, background image you uploaded will be stretched. If background position is set to Stretch, you do not need to set background repeat.','sosthemes'),
		'id' 			=> 'sosq_main_background_position',
		'type' 			=> 'select',
		'default'		=> 'center center',
		'options' 		=> array(
		'Background Position' => 'Background Position',
		'left top' 		=> 'left top',
		'left center' 	=> 'left center', 
		'left bottom' 	=> 'left bottom' , 
		'center top' 	=> 'center top' , 
		'center center' => 'center center',
		'center bottom' => 'center bottom',
		'right top' 	=> 'right top' , 
		'right center' 	=> 'right center',
		'right bottom'	=> 'right bottom',
		'stretch' 		=> 'stretch',)
	);
	
	$settings_options[] = array(
		'name' => __('Background Repeat','sosthemes'),
		'desc' => __('Please choose background repeat.','sosthemes'),
		'id' => 'sosq_main_background_repeat',
		'type' => 'select',
		'default'		=> 'repeat',
		'options' => array(
		'Background Repeat' => 'Background Repeat',
		'no-repeat' => 'no-repeat',
		'repeat' => 'repeat', 
		'repeat-x' => 'repeat-x' , 
		'repeat-y' => 'repeat-y' , )
	);
	
	$settings_options[] = array(
		'name' 			=> __('Background of page titles.','sosthemes'),
		'desc'			=> __('Please choose a background image for your page titles','sosthemes'),
		'id' 			=> 'sosq_main_titlebg_image',
		'type' 			=> 'textupload',
		'default' 		=> $blogurl.'/images/title_bg.png'
	);
	
	$settings_options[] = array(
		'id' 			=> 'sosq_main_titlebg',
		'type' 			=> 'button',
		'std' 			=> __('Browse','sosthemes'),
	);	
	
	$settings_options[] = array(
		'name' 			=> __('Background Position','sosthemes'),
		'desc' 			=> __('Please choose background position.','sosthemes'),
		'id' 			=> 'sosq_titlebg_background_position',
		'type' 			=> 'select',
		'default'		=> 'left center',
		'options' 		=> array(
		'Background Position' => 'Background Position',
		'left top' 		=> 'left top',
		'left center' 	=> 'left center', 
		'left bottom' 	=> 'left bottom' , 
		'center top' 	=> 'center top' , 
		'center center' => 'center center',
		'center bottom' => 'center bottom',
		'right top' 	=> 'right top' , 
		'right center' 	=> 'right center',
		'right bottom'	=> 'right bottom',)
	);
	
	$settings_options[] = array(
		'name' => __('Background Repeat','sosthemes'),
		'desc' => __('Please choose background repeat.','sosthemes'),
		'id' => 'sosq_titlebg_background_repeat',
		'type' => 'select',
		'default'		=> 'no-repeat',
		'options' => array(
		'Background Repeat' => 'Background Repeat',
		'no-repeat' => 'no-repeat',
		'repeat' => 'repeat', 
		'repeat-x' => 'repeat-x' , 
		'repeat-y' => 'repeat-y' , )
	);

	$settings_options[] = array(
		'name' 			=> __('Footer Background','sosthemes'),
		'desc'			=> __('Please click browse button to choose and upload a background image for footer. Please use delete button to delete background image of footer. Please do not forget to save after uploading your background image of footer.','sosthemes'),
		'id' 			=> 'sosq_main_footer_image',
		'type' 			=> 'textupload',
		'default' 		=> ''
	);
	
	$settings_options[] = array(
		'id' 			=> 'sosq_main_footer',
		'type' 			=> 'button',
		'std' 			=> __('Browse','sosthemes'),
	);	
	
	$settings_options[] = array(
		'name' 			=> __('Background Position','sosthemes'),
		'desc' 			=> __('Please choose background position.','sosthemes'),
		'id' 			=> 'sosq_footer_background_position',
		'type' 			=> 'select',
		'default'		=> 'left center',
		'options' 		=> array(
		'Background Position' => 'Background Position',
		'left top' 		=> 'left top',
		'left center' 	=> 'left center', 
		'left bottom' 	=> 'left bottom' , 
		'center top' 	=> 'center top' , 
		'center center' => 'center center',
		'center bottom' => 'center bottom',
		'right top' 	=> 'right top' , 
		'right center' 	=> 'right center',
		'right bottom'	=> 'right bottom',)
	);
	
	$settings_options[] = array(
		'name' => __('Background Repeat','sosthemes'),
		'desc' => __('Please choose background repeat.','sosthemes'),
		'id' => 'sosq_footer_background_repeat',
		'type' => 'select',
		'default'		=> 'no-repeat',
		'options' => array(
		'Background Repeat' => 'Background Repeat',
		'no-repeat' => 'no-repeat',
		'repeat' => 'repeat', 
		'repeat-x' => 'repeat-x' , 
		'repeat-y' => 'repeat-y' , )
	);	

	$settings_options[] = array('type' => 'end_menu');
	
/*	--------------------------------------------------------------
	:: Styles and Fonts
	-------------------------------------------------------------- */

	$settings_options[] = array(
		'name'          => __('Styles and Fonts','sosthemes'),
		'type'          => 'start_menu',
		'id'            => 'style_and_font',
		'icon' 			=> $blogurl.'/admin/images/op2.png'
	);
	
	$settings_options[] = array(
		'name'          =>  __('Main Color','sosthemes'),
		'desc'          =>  __('Site\'s main color. If you choose predefined colors, please make sure "custom color" button below is turned <strong>[OFF]</strong>. If "custom color" button below is turned <strong>[OFF]</strong>, predefined colors will be reactivated.','sosthemes'),
		'id'            => 'sosq_main_skin',
		'type'          => 'radio',
		'default' 		=> 'true',		
		'std'          => 'D64937',
		'options' => array(
		'D64937' => 'D64937' ,
		'57985B' => '57985B',
		'579497' => '579497', 
		'577C97' => '577C97' ,
		'E58038' => 'E58038' ,
		'7B7B7B' => '7B7B7B' ,
		'97576D' => '97576D' , 
		'975797' => '975797' ,
		'978A57' => '978A57' ,
		'E7C836' => 'E7C836' , )
	);

	$settings_options[] = array(
		'name' 			=> __('Custom Color','sosthemes'),
		'desc' 			=> __('Please turn <strong>[ON]</strong> this button if you would like to deactivate predefined colors and use custom colors. If you turn <strong>[OFF]</strong> this button, predefined colors will be reactived.','sosthemes'),
		'id' 			=> 'color_control',
		'default' 		=> '',
		'type' 			=> 'checkbox',
	);	

	$settings_options[] = array(
		'name' 			=> __('Body Color','sosthemes'),
		'desc' 			=> __('Color value of all text elements that are within body.','sosthemes'),
		'id' 			=> 'qmain_body_site_color',
		'type' 			=> 'colorpicker',
		'default' 		=> '#7D7D7D',
	);
	
	$settings_options[] = array(
		'name' 			=> __('Main Color','sosthemes'),
		'desc' 			=> __('All buttons, background colors and all the areas that take this color on the website will be effected.','sosthemes'),
		'id' 			=> 'qmain_site_color',
		'type' 			=> 'colorpicker',
		'default' 		=> '#D64937',
	);
		
	$settings_options[] = array(
		'name' 			=> __('Link Color','sosthemes'),
		'desc' 			=> __('You can change every link color on the website here.','sosthemes'),
		'id' 			=> 'qmain_site_link_color',
		'type' 			=> 'colorpicker',
		'default' 		=> '#000',	
	);
		
	$settings_options[] = array(
		'name' 			=> __('Link Hover Color','sosthemes'),
		'desc'			=> __('You can change every link hover color on the website here.','sosthemes'),
		'id' 			=> 'qmain_site_link_hover_color',
		'type' 			=> 'colorpicker',
		'default' 		=> '#D64937',
	);

	$settings_options[] = array(
		'name' 			=> __('h1,h2,h3,h4,h5,h6 Color','sosthemes'),
		'desc' 			=> __('You can change all h tagged elements\' color here.','sosthemes'),
		'id' 			=> 'qmain_site_h123456_color',
		'type' 			=> 'colorpicker',
		'default' 		=> '#000',	
	);

	$settings_options[] = array(
		'name' 			=> __('Footer Background Color','sosthemes'),
		'desc' 			=> __('You can change footers background color here.','sosthemes'),
		'id' 			=> 'qmain_footer_bg_color',
		'type' 			=> 'colorpicker',
		'default' 		=> '#000',
	);

	$settings_options[] = array(
		'name' 			=> __('Footer Bottom Background Color','sosthemes'),
		'desc' 			=> __('You can change footers bottom background color here.','sosthemes'),
		'id' 			=> 'qmain_footer_bottom_bg_color',
		'type' 			=> 'colorpicker',
		'default' 		=> '#0D0D0D',
	);
	
	$settings_options[] = array(
		'name' 			=> __('Footer Main Text Color','sosthemes'),
		'desc' 			=> __('You can change footers main text color in here','sosthemes'),
		'id' 			=> 'qmain_footer_site_color',
		'type' 			=> 'colorpicker',
		'default' 		=> '#B4B4B4',
	);

	$settings_options[] = array(
		'name' 			=> __('Footer Bottom Text Color','sosthemes'),
		'desc' 			=> __('You can change footers bottom main text color in here','sosthemes'),
		'id' 			=> 'qmain_footer_bottom_color',
		'type' 			=> 'colorpicker',
		'default' 		=> '#7d7d7d',
	);

	$settings_options[] = array(
		'name' 			=> __('Footer Link Color','sosthemes'),
		'desc' 			=> __('You can change footers link color in here.','sosthemes'),
		'id' 			=> 'qmain_footer_link_color',
		'type' 			=> 'colorpicker',
		'default' 		=> '#fff',	
	);
		
	$settings_options[] = array(
		'name' 			=> __('Footer Link Hover Color','sosthemes'),
		'desc'			=> __('You can change footers link hover color in here.','sosthemes'),
		'id' 			=> 'qmain_footer_link_hover_color',
		'type' 			=> 'colorpicker',
		'default' 		=> '#D64937',
	);	

	$settings_options[] = array(
		'name' 			=> __('Footer Widget Titles','sosthemes'),
		'desc'			=> __('You can change the color of footer widget titles in here.','sosthemes'),
		'id' 			=> 'qmain_footer_widget_title_color',
		'type' 			=> 'colorpicker',
		'default' 		=> '#fff',
	);	
	
	$settings_options[] = array(
		'name' 			=> __('Body/ Main Font','sosthemes'),
		'desc'			=> __('This change will effect body font.','sosthemes'),
		'id'    		=> 'sosq_body_font',
		"std"			=> array( 	'size' => get_option('sosq_body_font_size'),
									'unit' => get_option('sosq_body_font_unit'),
									'face' => get_option('sosq_body_font_face'),
									'style' => get_option('sosq_body_font_style')),
									
		'type'   		=> 'typography',
		'dsize' 		=> '13',
		'dface'			=> 'PT Sans',
		'dstyle' 		=> 'normal',
	);

	$settings_options[] = array(
		'name'  		=> __('h1 Tag','sosthemes'),
		'desc'			=> __('This change will effect h1 tag.','sosthemes'),
		'id'    		=> 'sosq_h1_font',
		"std"			=> array( 	'size' => get_option('sosq_h1_font_size'),
									'unit' => get_option('sosq_h1_font_unit'),
									'face' => get_option('sosq_h1_font_face'),
									'style' => get_option('sosq_h1_font_style')),
									
		'type'   		=> 'typography',
		'dsize'			=> '46',
		'dface' 		=> 'Viga',
		'dstyle' 		=> 'normal',
	);
		
	$settings_options[] = array(
		'name'          => __('h2 Tag','sosthemes'),
		'desc'			=> __('This change will effect h2 tag.','sosthemes'),
		'id'            => 'sosq_h2_font',
		"std"			=> array( 	'size' => get_option('sosq_h2_font_size'),
									'unit' => get_option('sosq_h2_font_unit'),
									'face' => get_option('sosq_h2_font_face'),
									'style' => get_option('sosq_h2_font_style')),
									
		'type'          => 'typography',
		'dsize'			=> '35',
		'dface' 		=> 'Viga',
		'dstyle' 		=> 'normal',
	);

	$settings_options[] = array(
		'name'          => __('h3 Tag','sosthemes'),
		'desc'			=> __('This change will effect h3 tag.','sosthemes'),
		'id'            => 'sosq_h3_font',
		"std"			=> array( 	'size' => get_option('sosq_h3_font_size'),
									'unit' => get_option('sosq_h3_font_unit'),
									'face' => get_option('sosq_h3_font_face'),
									'style' => get_option('sosq_h3_font_style')),
									
		'type'          => 'typography',
		'dsize'			=> '28',
		'dface' 		=> 'Viga',
		'dstyle' 		=> 'normal',
	);
		
	$settings_options[] = array(
		'name'          => __('h4 Tag','sosthemes'),
		'desc'			=> __('This change will effect h4 tag.','sosthemes'),
		'id'            => 'sosq_h4_font',
		"std"			=> array( 	'size' => get_option('sosq_h4_font_size'),
									'unit' => get_option('sosq_h4_font_unit'),
									'face' => get_option('sosq_h4_font_face'),
									'style' => get_option('sosq_h4_font_style')),
									
		'type'          => 'typography',
		'dsize'			=> '21',
		'dface' 		=> 'Viga',
		'dstyle' 		=> 'normal',
		);	

	$settings_options[] = array(
		'name'          => __('h5 Tag','sosthemes'),
		'desc'			=> __('This change will effect h5 tag.','sosthemes'),
		'id'            => 'sosq_h5_font',
		"std"			=> array( 	'size' => get_option('sosq_h5_font_size'),
									'unit' => get_option('sosq_h5_font_unit'),
									'face' => get_option('sosq_h5_font_face'),
									'style' => get_option('sosq_h5_font_style')),
									
		'type'          => 'typography',
		'dsize'			=> '17',
		'dface' 		=> 'Viga',
		'dstyle' 		=> 'normal',
	);
	
	$settings_options[] = array(
		'name'          => __('h6 Tag','sosthemes'),
		'desc'			=> __('This change will effect h6 tag.','sosthemes'),
		'id'            => 'sosq_h6_font',
		"std"			=> array( 	'size' => get_option('sosq_h6_font_size'),
									'unit' => get_option('sosq_h6_font_unit'),
									'face' => get_option('sosq_h6_font_face'),
									'style' => get_option('sosq_h6_font_style')),
									
		'type'          => 'typography',
		'dsize'			=> '14',
		'dface' 		=> 'Viga',
		'dstyle' 		=> 'normal',
	);	
	
	$settings_options[] = array(
		'name'          => __('Custom title 1','sosthemes'),
		'desc'			=> __('This change will effect Page titles, Blog single\'s title and Blog page title.','sosthemes'),
		'id'            => 'sosq_ctitle1_font',
		"std"			=> array( 	'size' => get_option('sosq_ctitle1_font_size'),
									'unit' => get_option('sosq_ctitle1_font_unit'),
									'face' => get_option('sosq_ctitle1_font_face'),
									'style' => get_option('sosq_ctitle1_font_style')),
									
		'type'          => 'typography',
		'dsize'			=> '18',
		'dface' 		=> 'Viga',
		'dstyle' 		=> 'normal',
	);	
	
	$settings_options[] = array(
		'name'          => __('Custom title 2','sosthemes'),
		'desc'			=> __('This change will effect Loop titles / recent post and recent portfolio.','sosthemes'),
		'id'            => 'sosq_ctitle2_font',
		"std"			=> array( 	'size' => get_option('sosq_ctitle2_font_size'),
									'unit' => get_option('sosq_ctitle2_font_unit'),
									'face' => get_option('sosq_ctitle2_font_face'),
									'style' => get_option('sosq_ctitle2_font_style')),
									
		'type'          => 'typography',
		'dsize'			=> '14',
		'dface' 		=> 'PT Sans',
		'dstyle' 		=> 'bold',
	);
	
	$settings_options[] = array(
		'name'          => __('Custom title 3','sosthemes'),
		'desc'			=> __('This change will effect widget titles and seperator titles.','sosthemes'),
		'id'            => 'sosq_ctitle3_font',
		"std"			=> array( 	'size' => get_option('sosq_ctitle3_font_size'),
									'unit' => get_option('sosq_ctitle3_font_unit'),
									'face' => get_option('sosq_ctitle3_font_face'),
									'style' => get_option('sosq_ctitle3_font_style')),
									
		'type'          => 'typography',
		'dsize'			=> '14',
		'dface' 		=> 'Viga',
		'dstyle' 		=> 'normal',
	);			
	
	$settings_options[] = array(
		'name'          => __('Custom Menu','sosthemes'),
		'desc'			=> __('This change will effect main nav.','sosthemes'),
		'id'            => 'sosq_gmenu_font',
		"std"			=> array( 	'size' => get_option('sosq_gmenu_font_size'),
									'unit' => get_option('sosq_gmenu_font_unit'),
									'face' => get_option('sosq_gmenu_font_face'),
									'style' => get_option('sosq_gmenu_font_style')),
									
		'type'          => 'typography',
		'dsize'			=> '14',
		'dface' 		=> 'Viga',
		'dstyle' 		=> 'normal',
	);			
										
	$settings_options[] = array('type' => 'end_menu');	
	
/*	--------------------------------------------------------------
	:: Blog Settings
	-------------------------------------------------------------- */

	$settings_options[] = array(
		'name'          => __('Blog Settings','sosthemes'),
		'type'          => 'start_menu',
		'id'            => 'blogs_settings',
		'icon' 			=> $blogurl.'/admin/images/op3.png'
	);	
	//
	$settings_options[] = array(
		'name'          =>  __('Blog Layout','sosthemes'),
		'desc'          =>  __('Please choose default layout for your blog. To set your blog page, please go to Setting > Reading > FrontPage Display > A static page > post page and choose the page that you would like to display your blog page. You can set number of post per page in Blog pages show at most section.','sosthemes'),
		'id'            => 'sosq_blog_type',
		'type'          => 'radio',
		'std'          => 'large',
		'default' 		=> 'true',
		'options' => array(
		'medium' => 'medium' ,
		'large' => 'large', )
		);

	$settings_options[] = array(
		'name'          =>  __('Blog Sidebar Position','sosthemes'),
		'desc'          =>  __('Please choose default sidebar position for your blog.','sosthemes'),
		'id'            => 'sosq_blog_sb_position',
		'type'          => 'radio',
		'std'          => 'sidebarright',
		'default' 		=> 'true',
		'options' => array(
		'sidebarleft' => 'sidebarleft',
		'sidebarright' => 'sidebarright' ,
 )
		);

	$settings_options[] = array(
		'name' 			=> __('Display author in blog posts?','sosthemes'),
		'desc' 			=> __('If you would like to hide author, please turn <stong>[OFF]</strong> this button.','sosthemes'),
		'id' 			=> 'sosq_blog_dauthor',
		'type' 			=> 'checkbox',
		'default' 		=> 'true',
	);	

	$settings_options[] = array(
		'name' 			=> __('Display comment in blog posts?','sosthemes'),
		'desc' 			=> __('If you would like to hide comment, please turn <strong>[OFF]</strong> this button.','sosthemes'),
		'id' 			=> 'sosq_blog_dcomment',
		'type' 			=> 'checkbox',
		'default' 		=> 'true',
	);	

	$settings_options[] = array(
		'name' 			=> __('Display date in blog posts?','sosthemes'),
		'desc' 			=> __('If you would like to hide date, please turn <strong>[OFF]</strong> this button.','sosthemes'),
		'id' 			=> 'sosq_blog_ddate',
		'type' 			=> 'checkbox',
		'default' 		=> 'true',
	);

	$settings_options[] = array(
		'name' 			=> __('Display tag in blog posts?','sosthemes'),
		'desc' 			=> __('If you would like to hide tag, please turn <strong>[OFF]</strong> this button.','sosthemes'),
		'id' 			=> 'sosq_blog_dtag',
		'type' 			=> 'checkbox',
		'default' 		=> 'true',
	);	

	$settings_options[] = array(
		'name' 			=> __('Display category in blog posts?','sosthemes'),
		'desc' 			=> __('If you would like to hide category, please turn <strong>[OFF]</strong> this button.','sosthemes'),
		'id' 			=> 'sosq_blog_dcategory',
		'type' 			=> 'checkbox',
		'default' 		=> 'true',
	);

	$settings_options[] = array(
		'name'          => __('Blog Settings','sosthemes'),
		'desc' 			=> __('Please insert Default blog title in here.','sosthemes'),
		'type'          => 'text',
		'id'            => 'sosq_blog_main_title',
		'default' 		=> 'OUR BLOG'
	);		
	
	$settings_options[] = array('type' => 'end_menu');	

/*	--------------------------------------------------------------
	:: Social Settings
	-------------------------------------------------------------- */

	$settings_options[] = array(
		'name'          => __('Social Settings','sosthemes'),
		'type'          => 'start_menu',
		'id'            => 'socialss_settings',
		'icon' 			=> $blogurl.'/admin/images/op4.png'
	);	
	
	$settings_options[] = array(
		'name' 			=> __('Facebook','sosthemes'),
		'desc'			=> __('Please write your Facebook URL.','sosthemes'),
		'id' 			=> 'sosq_social_facebook',
		'type' 			=> 'text',
		'default' 		=> '#'
	);
	
	$settings_options[] = array(
		'name' 			=> __('Twitter','sosthemes'),
		'desc'			=> __('Please write your Twitter URL.','sosthemes'),
		'id' 			=> 'sosq_social_twitter',
		'type' 			=> 'text',
		'default' 		=> '#'	
	);
	
	$settings_options[] = array(
		'name' 			=> __('YouTube','sosthemes'),
		'desc'			=> __('Please write your YouTube URL.','sosthemes'),
		'id' 			=> 'sosq_social_youtube',
		'type' 			=> 'text',
		'default' 		=> '#'
	);
	
	$settings_options[] = array(
		'name' 			=> __('Forrst','sosthemes'),
		'desc'			=> __('Please write your Forrst URL.','sosthemes'),
		'id' 			=> 'sosq_social_forrst',
		'type' 			=> 'text',
		'default' 		=> '#'
	);

	$settings_options[] = array(
		'name' 			=> __('Dribbble','sosthemes'),
		'desc'			=> __('Please write your Dribbble URL.','sosthemes'),
		'id' 			=> 'sosq_social_dribbble',
		'type' 			=> 'text',
		'default' 		=> '#'
	);	
	
	$settings_options[] = array(
		'name' 			=> __('Vimeo','sosthemes'),
		'desc'			=> __('Please write your Vimeo URL.','sosthemes'),
		'id' 			=> 'sosq_social_vimeo',
		'type' 			=> 'text',
		'default' 		=> '#'
	);	

	$settings_options[] = array(
		'name' 			=> __('Pinterest','sosthemes'),
		'desc'			=> __('Please write your Pinterest URL.','sosthemes'),
		'id' 			=> 'sosq_social_pinterest',
		'type' 			=> 'text',
		'default' 		=> '#'	
	);

	$settings_options[] = array(
		'name' 			=> __('Flickr','sosthemes'),
		'desc'			=> __('Please write your Flickr URL.','sosthemes'),
		'id' 			=> 'sosq_social_flickr',
		'type' 			=> 'text',
		'default' 		=> '#'
	);	
	
		$settings_options[] = array(
		'name' 			=> __('Linkedin','sosthemes'),
		'desc'			=> __('Please write your Linkedin URL.','sosthemes'),
		'id' 			=> 'sosq_social_linkedin',
		'type' 			=> 'text',
		'default' 		=> '#'	
	);
	
	$settings_options[] = array(
		'name' 			=> __('Rss','sosthemes'),
		'desc'			=> __('Please write your RSS URL.','sosthemes'),
		'id' 			=> 'sosq_social_rss',
		'type' 			=> 'text',
		'default' 		=> '#'	
	);	

		$settings_options[] = array(
		'name' 			=> __('Delicious','sosthemes'),
		'desc'			=> __('Please write your Delicious URL.','sosthemes'),
		'id' 			=> 'sosq_social_delicious',
		'type' 			=> 'text',
		'default' 		=> '#'	
	);	

		$settings_options[] = array(
		'name' 			=> __('Digg','sosthemes'),
		'desc'			=> __('Please write your Digg URL.','sosthemes'),
		'id' 			=> 'sosq_social_digg',
		'type' 			=> 'text',
		'default' 		=> '#'
	);	

		$settings_options[] = array(
		'name' 			=> __('Foursquare','sosthemes'),
		'desc'			=> __('Please write your Foursquare URL.','sosthemes'),
		'id' 			=> 'sosq_social_foursquare',
		'type' 			=> 'text',
		'default' 		=> '#'
	);	

		$settings_options[] = array(
		'name' 			=> __('Github','sosthemes'),
		'desc'			=> __('Please write your Github URL.','sosthemes'),
		'id' 			=> 'sosq_social_github',
		'type' 			=> 'text',
		'default' 		=> '#'
	);	
	
	$settings_options[] = array(
		'name' 			=> __('Google-Plus','sosthemes'),
		'desc'			=> __('Please write your Google-Plus URL.','sosthemes'),
		'id' 			=> 'sosq_social_google-plus',
		'type' 			=> 'text',
		'default' 		=> '#'	
	);	

		$settings_options[] = array(
		'name' 			=> __('Reddit','sosthemes'),
		'desc'			=> __('Please write your Reddit URL.','sosthemes'),
		'id' 			=> 'sosq_social_reddit',
		'type' 			=> 'text',
		'default' 		=> '#'
		
	);	
		$settings_options[] = array(
		'name' 			=> __('Stumbleupon','sosthemes'),
		'desc'			=> __('Please write your Stumbleupon URL.','sosthemes'),
		'id' 			=> 'sosq_social_stumbleupon',
		'type' 			=> 'text',
		'default' 		=> '#'
	);	

		$settings_options[] = array(
		'name' 			=> __('Yelp','sosthemes'),
		'desc'			=> __('Please write your Yelp URL.','sosthemes'),
		'id' 			=> 'sosq_social_yelp',
		'type' 			=> 'text',
		'default' 		=> '#'
	);	

		$settings_options[] = array(
		'name' 			=> __('Zerply','sosthemes'),
		'desc'			=> __('Please write your Zerply URL.','sosthemes'),
		'id' 			=> 'sosq_social_zerply',
		'type' 			=> 'text',
		'default' 		=> '#'
	);	

	$settings_options[] = array('type' => 'end_menu');	
	
/*	--------------------------------------------------------------
	:: Portfolio Settings
	-------------------------------------------------------------- */

	$settings_options[] = array(
		'name'          => __('Portfolio Settings','sosthemes'),
		'type'          => 'start_menu',
		'id'            => 'portfolio_settings',
		'icon' 			=> $blogurl.'/admin/images/op5.png'
	);

	$settings_options[] = array(
		'name'          => __('Portfolio Page','sosthemes'),
		'type'          => 'select-page',
		'id'            => 'sosq_portfolio_mainpage',
		'std' 			=> '',
		'desc'          => __('Please choose portfolio page ( required for active class )','sosthemes'),
	);	
	
	$settings_options[] = array(
		'name'          =>  __('Portfolio (nofilter) Layout','sosthemes'),
		'desc'          =>  __('Please choose default layout of Portfolio (nofilter). You can choose any template and layout for filterable portfolios while creating their pages.','sosthemes'),
		'id'            => 'sosq_portfoliomain_layout',
		'type'          => 'radio',
		'default' 		=> 'true',		
		'std'          => 'four',
		'options' => array(
		'three' => 'three' ,
		'four' => 'four',
		'six' => 'six', )
	);

	$settings_options[] = array(
		'name'          => __('Nofilter Portfolio Short Description','sosthemes'),
		'type'          => 'textarea',
		'id'            => 'sosq_portfolio_minidesc',
		'default' 		=> 'Do you like our portfolio? If you would like to use our services, you can contact us via contact page.',
		'desc'          => __('You can write a short description for your portfolio that will be displayed in NoFilter portfolio','sosthemes'),
	);	
	
	$settings_options[] = array(
		'name'          => __('Portfolio Number','sosthemes'),
		'type'          => 'text',
		'id'            => 'sosq_portfolio_maxitem',
		'default' 		=> '12',
		'desc' 			=> __('Please insert maximum item number per page that will be displayed on NoFilter','sosthemes'),
	);			

	$settings_options[] = array(
		'name'          => __('Portfolio Number ( Filterable Portfolio )','sosthemes'),
		'type'          => 'text',
		'id'            => 'sosq_portfolio_maxitemfp',
		'default' 		=> '12',
		'desc' 			=> __('Please insert maximum item number per page that will be displayed on Filterable Portfolio','sosthemes'),
	);	

	$settings_options[] = array(
		'name' 			=> __('Filterable Portfolio Pagenavi','sosthemes'),
		'desc' 			=> __('Deactivates pagination ( pagenavi ) feature in Filterable Portfolio templates. If you turn <strong>[OFF]</strong> this button, pagination ( pagenavi ) will be visible in Filterable Portfolio page templates.','sosthemes'),
		'id' 			=> 'sosq_portfolio_pagenavi',
		'type' 			=> 'checkbox',
		'default' 		=> 'true',
	);	
	
	$settings_options[] = array('type' => 'end_menu');	

/*	--------------------------------------------------------------
	:: Slider Settings
	-------------------------------------------------------------- */

	$settings_options[] = array(
		'name'          => __('Slider Settings','sosthemes'),
		'type'          => 'start_menu',
		'id'            => 'sliders_settings',
		'icon' 			=> $blogurl.'/admin/images/op10.png'
	);	
	
	$settings_options[] = array(
		'name' 			=> __('FlexSlider (Homepage) Slide number','sosthemes'),
		'desc' 			=> __('Please insert maximum slide number that will be displayed in slider.','sosthemes'),
		'id' 			=> 'sosq_hp_fslider_itemsize',
		'type' 			=> 'text',
		'default'		=> '5',
	);

	$settings_options[] = array(
		'name' 			=> __('FlexSlider (Homepage) Slide Duration','sosthemes'),
		'desc' 			=> __('Please insert slider duration in milliseconds. i.e.: insert 1000 for 1 second','sosthemes'),
		'id' 			=> 'sosq_hp_fslider_second',
		'type' 			=> 'text',
		'default'		=> '5000',
	);

	$settings_options[] = array(
		'name' 			=> __('FlexSlider (Homepage) Slide Effect ','sosthemes'),
		'desc' 			=> __('Please choose slide effect. This will effect homepage flexslider.','sosthemes'),
		'id' 			=> 'sosq_hp_fslider_slidefade',
		'type' 			=> 'select',
		'default'		=> 'fade',
		'options' 		=> array(
		'fade' 		=> 'fade',
		'slide' 	=> 'slide', )
	);	

	$settings_options[] = array(
		'name' 			=> __('FlexSlider (Homepage) Control Nav ','sosthemes'),
		'desc' 			=> __('Please turn <strong>[ON]</strong> the button to activate and turn <strong>[OFF]</strong> the button to deactivate Control nav.','sosthemes'),
		'id' 			=> 'sosq_hp_fslider_contnav',
		'type' 			=> 'checkbox',
		'default'		=> '',
	);

	$settings_options[] = array(
		'name' 			=> __('FlexSlider (Homepage) Direction Nav ','sosthemes'),
		'desc' 			=> __('Please turn <strong>[ON]</strong> the button to show and turn <strong>[OFF]</strong> the button to hide direction nav when mouse over slide.','sosthemes'),
		'id' 			=> 'sosq_hp_fslider_directnav',
		'type' 			=> 'checkbox',
		'default'		=> 'true',
	);

	$settings_options[] = array(
		'name' 			=> __('FlexSlider (Homepage) Pause on Mouseover','sosthemes'),
		'desc' 			=> __('Please turn <strong>[ON]</strong> the button to pause when mouse over slide and turn <strong>[OFF]</strong> the button to deactivate pause when mouse over slide.','sosthemes'),
		'id' 			=> 'sosq_hp_fslider_pausemouse',
		'type' 			=> 'checkbox',
		'default'		=> 'true',
	);

	$settings_options[] = array(
		'name' 			=> __('FlexSlider (Homepage) Slideshow(Autoplay)','sosthemes'),
		'desc' 			=> __('Please turn <strong>[ON]</strong> the button to activate autoplay and turn <strong>[OFF]</strong> the button to deactivate autoplay.','sosthemes'),
		'id' 			=> 'sosq_hp_fslider_slideshow',
		'type' 			=> 'checkbox',
		'default'		=> 'true',
	);

	$settings_options[] = array(
		'name' 			=> __('EmbedSlider Slideshow(Autoplay)','sosthemes'),
		'desc' 			=> __('Please turn <strong>[ON]</strong> the button to activate autoplay and turn <strong>[OFF]</strong> the button to deactivate autoplay.','sosthemes'),
		'id' 			=> 'sosq_hp_fslider_esslideshow',
		'type' 			=> 'checkbox',
		'default'		=> '',
	);

	$settings_options[] = array(
		'name' 			=> __('EmbedSlider (Homepage) Slide Duration','sosthemes'),
		'desc' 			=> __('Please insert slider duration in milliseconds. i.e.: insert 1000 for 1 second','sosthemes'),
		'id' 			=> 'sosq_hp_fslider_essecond',
		'type' 			=> 'text',
		'default'		=> '5000',
	);

	$settings_options[] = array(
		'name' 			=> __('Portfolio Single Slideshow(Autoplay)','sosthemes'),
		'desc' 			=> __('Please turn <strong>[ON]</strong> the button to activate autoplay and turn <strong>[OFF]</strong> the button to deactivate autoplay.','sosthemes'),
		'id' 			=> 'sosq_hp_fslider_psslideshow',
		'type' 			=> 'checkbox',
		'default'		=> '',
	);

	$settings_options[] = array(
		'name' 			=> __('Portfolio Single Slide Duration','sosthemes'),
		'desc' 			=> __('Please insert slider duration in milliseconds. i.e.: insert 1000 for 1 second','sosthemes'),
		'id' 			=> 'sosq_hp_fslider_pssecond',
		'type' 			=> 'text',
		'default'		=> '5000',
	);

	$settings_options[] = array(
		'name' 			=> __('Portfolio Single Slide Effect ','sosthemes'),
		'desc' 			=> __('Please choose slide effect. This will effect portfolio single flexslider.','sosthemes'),
		'id' 			=> 'sosq_hp_fslider_psslidefade',
		'type' 			=> 'select',
		'default'		=> 'fade',
		'options' 		=> array(
		'fade' 		=> 'fade',
		'slide' 	=> 'slide', )
	);	

	$settings_options[] = array(
		'name' 			=> __('Testimonials Slide Duration','sosthemes'),
		'desc' 			=> __('Please insert slider duration in milliseconds. i.e.: insert 1000 for 1 second','sosthemes'),
		'id' 			=> 'sosq_hp_fslider_tmsecond',
		'type' 			=> 'text',
		'default'		=> '5000',
	);	

	$settings_options[] = array(
		'name' 			=> __('Blog Gallery Slide Duration','sosthemes'),
		'desc' 			=> __('Please insert slider duration in milliseconds. i.e.: insert 1000 for 1 second','sosthemes'),
		'id' 			=> 'sosq_hp_fslider_blgsecond',
		'type' 			=> 'text',
		'default'		=> '5000',
	);						
	
	$settings_options[] = array('type' => 'end_menu');	
		
/*	--------------------------------------------------------------
	:: Contact Settings
	-------------------------------------------------------------- */

	$settings_options[] = array(
		'name'          => __('Contact Settings','sosthemes'),
		'type'          => 'start_menu',
		'id'            => 'contact_settings',
		'icon' 			=> $blogurl.'/admin/images/op6.png'
	);
		
	$settings_options[] = array(
		'name'          =>  __('Contact Page Sidebar Position','sosthemes'),
		'desc'          =>  __('Please choose default sidebar position for your Contact Page.','sosthemes'),
		'id'            => 'sosq_contact_sb_position',
		'type'          => 'radio',
		'std'          => 'sidebarright',
		'default' 		=> 'true',
		'options' => array(
		'sidebarleft' => 'sidebarleft',
		'sidebarright' => 'sidebarright' , )
	);

	$settings_options[] = array(
		'name' 			=> __('Maps Code','sosthemes'),
		'desc' 			=> __('You can paste Google Maps code here or any other embed or iframe codes.','sosthemes'),
		'id' 			=> 'sosq_maps_code',
		'type' 			=> 'textarea',
		'default'		=> '',
	);
	
	$settings_options[] = array(
		'name' 			=> __('Contact Mail','sosthemes'),
		'desc' 			=> __('Please insert your contact mail here. For more than 1 email address, please insert comma (without space) in between each email addresses.','sosthemes'),
		'id' 			=> 'sosq_contactmail',
		'type' 			=> 'text',
		'default'		=> '',
	);
	
	$settings_options[] = array('type' => 'end_menu');	

/*	--------------------------------------------------------------
	:: Seo Settings
	-------------------------------------------------------------- */

	$settings_options[] = array(
		'name'          => __('SEO Settings','sosthemes'),
		'type'          => 'start_menu',
		'id'            => 'seo_settings',
		'icon' 			=> $blogurl.'/admin/images/op7.png'
	);	
	
	$settings_options[] = array(
		'name' 			=> __('Site\'s Main Title','sosthemes'),
		'desc' 			=> __('Title must not exceed 70 characters. Search engines mark titles with more than 70 characters as spam. Character count will not let you write if you try to exceed the limit.','sosthemes'),
		'id' 			=> 'sosq_main_seo_title',
		'type' 			=> 'text',
		'default'		=> '',
	);
	
	$settings_options[] = array(
		'name' 			=> __('Site\'s Main Description','sosthemes'),
		'desc' 			=> __('Description must not exceed 160 characters. Search engines mark descriptions with more than 160 characters as spam. Character count will not let you write if you try to exceed the limit.','sosthemes'),
		'id' 			=> 'sosq_main_seo_desc',
		'type' 			=> 'textarea',
		'default'		=> '',
	);
		
	$settings_options[] = array(
		'name' 			=> __('Site\'s Main Keywords','sosthemes'),
		'desc' 			=> __('Keywords must not exceed 260 characters. Search engines mark keywords with more than 260 characters as spam. Character count will not let you write if you try to exceed the limit.','sosthemes'),
		'id' 			=> 'sosq_main_seo_key',
		'type' 			=> 'textarea',
		'default'		=> '',
	);
	
	$settings_options[] = array(
		'name' 			=> __('Google Site Verification','sosthemes'),
		'desc' 			=> __('Please insert verification code for Webmaster tool in here. Insert the code given in meta codes content="" section.','sosthemes'),
		'id' 			=> 'sosq_main_seo_gwt',
		'type' 			=> 'text',
		'default'		=> '',
	);
	
	$settings_options[] = array('type' => 'end_menu');	

/*	--------------------------------------------------------------
	:: Admin Settings
	-------------------------------------------------------------- */

	$settings_options[] = array(
		'name'          => __('Admin Settings','sosthemes'),
		'type'          => 'start_menu',
		'id'            => 'admin_settings',
		'icon' 			=> $blogurl.'/admin/images/op7.png'
	);	
		
	$settings_options[] = array(
		'name' 			=> __('Theme Name','sosthemes'),
		'desc' 			=> __('Theme name will be displayed in the menu in appearance.','sosthemes'),
		'id' 			=> 'sosq_theme_name',
		'type' 			=> 'text',
		'default'		=> 'Quickess',
	);

	$settings_options[] = 	array(
		'name' 			=> __('Upload Options Page Logo (this page)','sosthemes'),
		'desc' 			=> __('Logo uploaded here will change the logo located on the top left side of this page.','sosthemes'),
		'id' 			=> 'sosq_op_logo_image',
		'type'			=> 'textupload',
		'default' 		=> $blogurl.'/admin/images/opimage/admin-logo.png',
	);
		
	$settings_options[] = 	array(
		'id' 			=> 'sosq_op_logo',
		'type' 			=> 'button',
		'std' 			=> __('Browse','sosthemes'),		
	);

	$settings_options[] = 	array(
		'name' 			=> __('Upload Admin Login Logo','sosthemes'),
		'desc' 			=> __('Please click Browse button to choose and upload your admin login logo. Use delete button to delete logo. Please do not forget to save after uploading your logo. Logo will be displayed in admin login page.','sosthemes'),
		'id' 			=> 'sosq_admin_logo_image',
		'type'			=> 'textupload',
		'default' 		=> $blogurl.'/images/admin_logo.png',
	);
		
	$settings_options[] = 	array(
		'id' 			=> 'sosq_admin_logo',
		'type' 			=> 'button',
		'std' 			=> __('Browse','sosthemes'),		
	);

	
	$settings_options[] = array('type' => 'end_menu');	

/*	--------------------------------------------------------------
	:: 
	-------------------------------------------------------------- */	
	
	return $settings_options;
} update_option('sostheme_settings_template',sostheme_admin_settings());

function sostheme_machine_menu($options) {
$output = '';
$menu = '';
	foreach ($options as $arg) {
		
		if ( $arg['type'] == "start_menu" )
		{ 
			$output .= '<li class="sos-admin-menu-li"><a class="sos-admin-menu-link" href="#'.$arg['name'].'" id="sos-admin-menu-'.$arg['id'].'"><span id="sos-admin-menu-'.$arg['id'].'" class="adminlink"></span>'.$arg['name'].'</a></li>'."\n";
		}
	}
	
	return array($output,$menu);
}

/*-----------------------------------------------------------------------------------*/
/* Google Webfonts Array */
/* Documentation:
/*
/* name: The name of the Google Font.
/* variant: The Google Font API variants available for the font.
/*-----------------------------------------------------------------------------------*/

// Available Google webfont names

$google_fonts = array(	

	array( 'name' => "Asap", 
			'variant' => ':400,700,400italic,700italic'),
			
	array( 'name' => "Condiment", 
			'variant' => ''),
			
	array( 'name' => "Lilita One", 
			'variant' => ''),
			
	array( 'name' => "Kaushan Script", 
			'variant' => ''),
			
	array( 'name' => "Parisienne", 
			'variant' => ''),
			
	array( 'name' => "Glegoo", 
			'variant' => ''),
			
	array( 'name' => "Iceberg", 
			'variant' => ''),
			
	array( 'name' => "Kotta One", 
			'variant' => ''),
			
	array( 'name' => "Mrs Saint Delafield", 
			'variant' => ''),
			
	array( 'name' => "Diplomata", 
			'variant' => ''),
			
	array( 'name' => "Mr Bedfort", 
			'variant' => ''),
			
	array( 'name' => "Ropa Sans", 
			'variant' => ':400,400italic'),
			
	array( 'name' => "Diplomata SC", 
			'variant' => ''),
			
	array( 'name' => "Alegreya", 
			'variant' => ':400italic,700italic,900italic,400,700,900'),
			
	array( 'name' => "Shojumaru", 
			'variant' => ''),
			
	array( 'name' => "Amethysta", 
			'variant' => ''),
			
	array( 'name' => "Junge", 
			'variant' => ''),
			
	array( 'name' => "Lemon", 
			'variant' => ''),
			
	array( 'name' => "Homenaje", 
			'variant' => ''),
			
	array( 'name' => "Germania One", 
			'variant' => ''),
			
	array( 'name' => "Telex", 
			'variant' => ''),
			
	array( 'name' => "Macondo", 
			'variant' => ''),
			
	array( 'name' => "Alegreya SC", 
			'variant' => ':400,400italic,700,700italic,900,900italic'),
			
	array( 'name' => "Montaga", 
			'variant' => ''),
			
	array( 'name' => "Lustria", 
			'variant' => ''),
			
	array( 'name' => "Port Lligat Slab", 
			'variant' => ''),
			
	array( 'name' => "Gudea", 
			'variant' => ':400,700,400italic'),
			
	array( 'name' => "Sonsie One", 
			'variant' => ''),
			
	array( 'name' => "Sirin Stencil", 
			'variant' => ''),
			
	array( 'name' => "Trochut", 
			'variant' => ':400,400italic,700'),
			
	array( 'name' => "Emblema One", 
			'variant' => ''),
			
	array( 'name' => "Flamenco", 
			'variant' => ':300,400'),
			
	array( 'name' => "Macondo Swash Caps", 
			'variant' => ''),
			
	array( 'name' => "Port Lligat Sans", 
			'variant' => ''),
			
	array( 'name' => "Titan One", 
			'variant' => ''),
			
	array( 'name' => "Metamorphous", 
			'variant' => ''),
			
	array( 'name' => "Rouge Script", 
			'variant' => ''),
			
	array( 'name' => "Ruluko", 
			'variant' => ''),
			
	array( 'name' => "Quantico", 
			'variant' => ':400,700italic,700,400italic'),
			
	array( 'name' => "Fugaz One", 
			'variant' => ''),
			
	array( 'name' => "Piedra", 
			'variant' => ''),
			
	array( 'name' => "Ruda", 
			'variant' => ':400,700,900'),
			
	array( 'name' => "Acme", 
			'variant' => ''),
			
	array( 'name' => "Alfa Slab One", 
			'variant' => ''),
			
	array( 'name' => "Herr Von Muellerhoff", 
			'variant' => ''),
			
	array( 'name' => "Magra", 
			'variant' => ':400,700'),
			
	array( 'name' => "Mr De Haviland", 
			'variant' => ''),
			
	array( 'name' => "Lusitana", 
			'variant' => ':400,700'),
			
	array( 'name' => "Caesar Dressing", 
			'variant' => ''),
			
	array( 'name' => "Dynalight", 
			'variant' => ''),
			
	array( 'name' => "Balthazar", 
			'variant' => ''),
			
	array( 'name' => "Esteban", 
			'variant' => ''),
			
	array( 'name' => "Almendra", 
			'variant' => ':400,700'),
			
	array( 'name' => "Flavors", 
			'variant' => ''),
			
	array( 'name' => "Sail", 
			'variant' => ''),
			
	array( 'name' => "Aladin", 
			'variant' => ''),
			
	array( 'name' => "Habibi", 
			'variant' => ''),
			
	array( 'name' => "Cambo", 
			'variant' => ''),
			
	array( 'name' => "Eater", 
			'variant' => ''),
			
	array( 'name' => "Bad Script", 
			'variant' => ''),
			
	array( 'name' => "Almendra SC", 
			'variant' => ''),
			
	array( 'name' => "Nixie One", 
			'variant' => ''),
			
	array( 'name' => "Arbutus", 
			'variant' => ''),
			
	array( 'name' => "Yesteryear", 
			'variant' => ''),
			
	array( 'name' => "Quicksand", 
			'variant' => ':300,400,700'),
			
	array( 'name' => "Wellfleet", 
			'variant' => ''),
			
	array( 'name' => "Frijole", 
			'variant' => ''),
			
	array( 'name' => "Fredericka the Great", 
			'variant' => ''),
			
	array( 'name' => "Galdeano", 
			'variant' => ''),
			
	array( 'name' => "Knewave", 
			'variant' => ''),
			
	array( 'name' => "Patua One", 
			'variant' => ''),
			
	array( 'name' => "Medula One", 
			'variant' => ''),
			
	array( 'name' => "Chango", 
			'variant' => ''),
			
	array( 'name' => "Fondamento", 
			'variant' => ':400italic,400'),
			
	array( 'name' => "Armata", 
			'variant' => ''),
			
	array( 'name' => "Inika", 
			'variant' => ':400,700'),
			
	array( 'name' => "Qwigley", 
			'variant' => ''),
			
	array( 'name' => "Trade Winds", 
			'variant' => ''),
			
	array( 'name' => "Playball", 
			'variant' => ''),
			
	array( 'name' => "Bubblegum Sans", 
			'variant' => ''),
			
	array( 'name' => "Jim Nightshade", 
			'variant' => ''),
			
	array( 'name' => "Sansita One", 
			'variant' => ''),
			
	array( 'name' => "Fresca", 
			'variant' => ''),
			
	array( 'name' => "Butcherman", 
			'variant' => ''),
			
	array( 'name' => "Chelsea Market", 
			'variant' => ''),
			
	array( 'name' => "Belgrano", 
			'variant' => ''),
			
	array( 'name' => "Noticia Text", 
			'variant' => ':400,400italic,700,700italic'),
			
	array( 'name' => "Mate SC", 
			'variant' => ''),
			
	array( 'name' => "Overlock SC", 
			'variant' => ''),
			
	array( 'name' => "Amatic SC", 
			'variant' => ':400,700'),
			
	array( 'name' => "Passion One", 
			'variant' => ':400,700,900'),
			
	array( 'name' => "Arapey", 
			'variant' => ':400italic,400'),
			
	array( 'name' => "Sofia", 
			'variant' => ''),
			
	array( 'name' => "Loved by the King", 
			'variant' => ''),
			
	array( 'name' => "Italianno", 
			'variant' => ''),
			
	array( 'name' => "Overlock", 
			'variant' => ':400,700,900,400italic,700italic,900italic'),
			
	array( 'name' => "Gentium Basic", 
			'variant' => ':400,700,400italic,700italic'),
			
	array( 'name' => "Handlee", 
			'variant' => ''),
			
	array( 'name' => "Short Stack", 
			'variant' => ''),
			
	array( 'name' => "Annie Use Your Telescope", 
			'variant' => ''),
			
	array( 'name' => "Spinnaker", 
			'variant' => ''),
			
	array( 'name' => "Enriqueta", 
			'variant' => ':400,700'),
			
	array( 'name' => "Concert One", 
			'variant' => ''),
			
	array( 'name' => "Ruge Boogie", 
			'variant' => ''),
			
	array( 'name' => "Ruthie", 
			'variant' => ''),
			
	array( 'name' => "Ubuntu Mono", 
			'variant' => ':400,700,400italic,700italic'),
			
	array( 'name' => "Niconne", 
			'variant' => ''),
			
	array( 'name' => "Monoton", 
			'variant' => ''),
			
	array( 'name' => "Aguafina Script", 
			'variant' => ''),
			
	array( 'name' => "Ceviche One", 
			'variant' => ''),
			
	array( 'name' => "Bilbo", 
			'variant' => ''),
			
	array( 'name' => "Electrolize", 
			'variant' => ''),
			
	array( 'name' => "Asul", 
			'variant' => ':400,700'),
			
	array( 'name' => "Tulpen One", 
			'variant' => ''),
			
	array( 'name' => "Boogaloo", 
			'variant' => ''),
			
	array( 'name' => "Tenor Sans", 
			'variant' => ''),
			
	array( 'name' => "Nova Square", 
			'variant' => ''),
			
	array( 'name' => "Bangers", 
			'variant' => ''),
			
	array( 'name' => "Alike Angular", 
			'variant' => ''),
			
	array( 'name' => "Allerta", 
			'variant' => ''),
			
	array( 'name' => "Megrim", 
			'variant' => ''),
			
	array( 'name' => "Delius Unicase", 
			'variant' => ':400,700'),
			
	array( 'name' => "Creepster", 
			'variant' => ''),
			
	array( 'name' => "Terminal Dosis", 
			'variant' => ':400,200,300,500,600,700,800'),
			
	array( 'name' => "Chivo", 
			'variant' => ':400,400italic,900,900italic'),
			
	array( 'name' => "Cookie", 
			'variant' => ''),
			
	array( 'name' => "Leckerli One", 
			'variant' => ''),
			
	array( 'name' => "Caudex", 
			'variant' => ':400,700,400italic,700italic'),
			
	array( 'name' => "Julee", 
			'variant' => ''),
			
	array( 'name' => "Geostar Fill", 
			'variant' => ''),
			
	array( 'name' => "Sorts Mill Goudy", 
			'variant' => ':400,400italic'),
			
	array( 'name' => "Abril Fatface", 
			'variant' => ''),
			
	array( 'name' => "Sniglet", 
			'variant' => ''),
			
	array( 'name' => "Dorsa", 
			'variant' => ''),
			
	array( 'name' => "Bentham", 
			'variant' => ''),
			
	array( 'name' => "Righteous", 
			'variant' => ''),
			
	array( 'name' => "Pinyon Script", 
			'variant' => ''),
			
	array( 'name' => "Nova Mono", 
			'variant' => ''),
			
	array( 'name' => "Vast Shadow", 
			'variant' => ''),
			
	array( 'name' => "Sancreek", 
			'variant' => ''),
			
	array( 'name' => "Pompiere", 
			'variant' => ''),
			
	array( 'name' => "Coustard", 
			'variant' => ':400,900'),
			
	array( 'name' => "Aubrey", 
			'variant' => ''),
			
	array( 'name' => "Judson", 
			'variant' => ':400,700,400italic'),
			
	array( 'name' => "Atomic Age", 
			'variant' => ''),
			
	array( 'name' => "Smokum", 
			'variant' => ''),
			
	array( 'name' => "Give You Glory", 
			'variant' => ''),
			
	array( 'name' => "Poller One", 
			'variant' => ''),
			
	array( 'name' => "Bitter", 
			'variant' => ':400,700,400italic'),
			
	array( 'name' => "Coda", 
			'variant' => ':400,800'),
			
	array( 'name' => "Candal", 
			'variant' => ''),
			
	array( 'name' => "Nova Cut", 
			'variant' => ''),
			
	array( 'name' => "Rammetto One", 
			'variant' => ''),
			
	array( 'name' => "Stardos Stencil", 
			'variant' => ':400,700'),
			
	array( 'name' => "Supermercado One", 
			'variant' => ''),
			
	array( 'name' => "Crafty Girls", 
			'variant' => ''),
			
	array( 'name' => "Sigmar One", 
			'variant' => ''),
			
	array( 'name' => "Dr Sugiyama", 
			'variant' => ''),
			
	array( 'name' => "Unna", 
			'variant' => ''),
			
	array( 'name' => "Brawler", 
			'variant' => ''),
			
	array( 'name' => "Carter One", 
			'variant' => ''),
			
	array( 'name' => "Bigshot One", 
			'variant' => ''),
			
	array( 'name' => "Radley", 
			'variant' => ':400,400italic'),
			
	array( 'name' => "Passero One", 
			'variant' => ''),
			
	array( 'name' => "Abel", 
			'variant' => ''),
			
	array( 'name' => "Gentium Book Basic", 
			'variant' => ':400,400italic,700,700italic'),
			
	array( 'name' => "Federo", 
			'variant' => ''),
			
	array( 'name' => "Fjord One", 
			'variant' => ''),
			
	array( 'name' => "Michroma", 
			'variant' => ''),
			
	array( 'name' => "Alike", 
			'variant' => ''),
			
	array( 'name' => "Delius Swash Caps", 
			'variant' => ''),
			
	array( 'name' => "Alex Brush", 
			'variant' => ''),
			
	array( 'name' => "Open Sans Condensed", 
			'variant' => ':300,300italic'),
			
	array( 'name' => "Corben", 
			'variant' => ':400,700'),
			
	array( 'name' => "Lancelot", 
			'variant' => ''),
			
	array( 'name' => "Vidaloka", 
			'variant' => ''),
			
	array( 'name' => "Gravitas One", 
			'variant' => ''),
			
	array( 'name' => "Monofett", 
			'variant' => ''),
			
	array( 'name' => "Mate", 
			'variant' => ':400,400italic'),
			
	array( 'name' => "Lobster Two", 
			'variant' => ':400,400italic,700italic,700'),
			
	array( 'name' => "Nunito", 
			'variant' => ':400,700,300'),
			
	array( 'name' => "Permanent Marker", 
			'variant' => ''),
			
	array( 'name' => "Linden Hill", 
			'variant' => ':400,400italic'),
			
	array( 'name' => "Signika", 
			'variant' => ':400,300,600,700'),
			
	array( 'name' => "Artifika", 
			'variant' => ''),
			
	array( 'name' => "Dawning of a New Day", 
			'variant' => ''),
			
	array( 'name' => "Duru Sans", 
			'variant' => ''),
			
	array( 'name' => "Miniver", 
			'variant' => ''),
			
	array( 'name' => "Ruslan Display", 
			'variant' => ''),
			
	array( 'name' => "Smythe", 
			'variant' => ''),
			
	array( 'name' => "Gochi Hand", 
			'variant' => ''),
			
	array( 'name' => "Bevan", 
			'variant' => ''),
			
	array( 'name' => "PT Serif", 
			'variant' => ':400,700,400italic,700italic'),
			
	array( 'name' => "Raleway", 
			'variant' => ''),
			
	array( 'name' => "IM Fell French Canon SC", 
			'variant' => ''),
			
	array( 'name' => "Cuprum", 
			'variant' => ''),
			
	array( 'name' => "PT Sans Narrow", 
			'variant' => ':400,700'),
			
	array( 'name' => "Ribeye Marrow", 
			'variant' => ''),
			
	array( 'name' => "Nova Oval", 
			'variant' => ''),
			
	array( 'name' => "Chewy", 
			'variant' => ''),
			
	array( 'name' => "IM Fell Great Primer", 
			'variant' => ':400,400italic'),
			
	array( 'name' => "Wire One", 
			'variant' => ''),
			
	array( 'name' => "Quattrocento Sans", 
			'variant' => ''),
			
	array( 'name' => "Cedarville Cursive", 
			'variant' => ''),
			
	array( 'name' => "Fanwood Text", 
			'variant' => ':400,400italic'),
			
	array( 'name' => "Dancing Script", 
			'variant' => ':400,700'),
			
	array( 'name' => "Damion", 
			'variant' => ''),
			
	array( 'name' => "Vibur", 
			'variant' => ''),
			
	array( 'name' => "Muli", 
			'variant' => ':300,400,300italic,400italic'),
			
	array( 'name' => "Playfair Display", 
			'variant' => ':400,400italic'),
			
	array( 'name' => "Paytone One", 
			'variant' => ''),
			
	array( 'name' => "Ubuntu", 
			'variant' => ':300,400,500,700,300italic,400italic,500italic,700italic'),
			
	array( 'name' => "Geostar", 
			'variant' => ''),
			
	array( 'name' => "Nova Flat", 
			'variant' => ''),
			
	array( 'name' => "Contrail One", 
			'variant' => ''),
			
	array( 'name' => "Andada", 
			'variant' => ''),
			
	array( 'name' => "Jockey One", 
			'variant' => ''),
			
	array( 'name' => "Miltonian", 
			'variant' => ''),
			
	array( 'name' => "Astloch", 
			'variant' => ':400,700'),
			
	array( 'name' => "Francois One", 
			'variant' => ''),
			
	array( 'name' => "IM Fell Double Pica", 
			'variant' => ':400,400italic'),
			
	array( 'name' => "Inder", 
			'variant' => ''),
			
	array( 'name' => "Asset", 
			'variant' => ''),
			
	array( 'name' => "Play", 
			'variant' => ':400,700'),
			
	array( 'name' => "Anonymous Pro", 
			'variant' => ':400,400italic,700,700italic'),
			
	array( 'name' => "Nova Slim", 
			'variant' => ''),
			
	array( 'name' => "Nova Round", 
			'variant' => ''),
			
	array( 'name' => "Petrona", 
			'variant' => ''),
			
	array( 'name' => "Arimo", 
			'variant' => ':400,700,400italic,700italic'),
			
	array( 'name' => "Bonbon", 
			'variant' => ''),
			
	array( 'name' => "Nova Script", 
			'variant' => ''),
			
	array( 'name' => "Modern Antiqua", 
			'variant' => ''),
			
	array( 'name' => "IM Fell Great Primer SC", 
			'variant' => ''),
			
	array( 'name' => "Bowlby One", 
			'variant' => ''),
			
	array( 'name' => "Prata", 
			'variant' => ''),
			
	array( 'name' => "Kameron", 
			'variant' => ':400,700'),
			
	array( 'name' => "Kelly Slab", 
			'variant' => ''),
			
	array( 'name' => "Wallpoet", 
			'variant' => ''),
			
	array( 'name' => "Indie Flower", 
			'variant' => ''),
			
	array( 'name' => "Quattrocento", 
			'variant' => ''),
			
	array( 'name' => "Rosario", 
			'variant' => ':400,700,400italic,700italic'),
			
	array( 'name' => "Unkempt", 
			'variant' => ':400,700'),
			
	array( 'name' => "Rochester", 
			'variant' => ''),
			
	array( 'name' => "Didact Gothic", 
			'variant' => ''),
			
	array( 'name' => "Andika", 
			'variant' => ''),
			
	array( 'name' => "IM Fell English SC", 
			'variant' => ''),
			
	array( 'name' => "Baumans", 
			'variant' => ''),
			
	array( 'name' => "Cardo", 
			'variant' => ':400,400italic,700'),
			
	array( 'name' => "Maiden Orange", 
			'variant' => ''),
			
	array( 'name' => "Swanky and Moo Moo", 
			'variant' => ''),
			
	array( 'name' => "Amaranth", 
			'variant' => ':400,400italic,700,700italic'),
			
	array( 'name' => "Waiting for the Sunrise", 
			'variant' => ''),
			
	array( 'name' => "Droid Serif", 
			'variant' => ':400,700,400italic,700italic'),
			
	array( 'name' => "Adamina", 
			'variant' => ''),
			
	array( 'name' => "Federant", 
			'variant' => ''),
			
	array( 'name' => "Inconsolata", 
			'variant' => ''),
			
	array( 'name' => "Ultra", 
			'variant' => ''),
			
	array( 'name' => "Kranky", 
			'variant' => ''),
			
	array( 'name' => "Just Another Hand", 
			'variant' => ''),
			
	array( 'name' => "Bowlby One SC", 
			'variant' => ''),
			
	array( 'name' => "PT Sans", 
			'variant' => ':400,700,400italic,700italic'),
			
	array( 'name' => "Holtwood One SC", 
			'variant' => ''),
			
	array( 'name' => "Slackey", 
			'variant' => ''),
			
	array( 'name' => "UnifrakturCook", 
			'variant' => ''),
			
	array( 'name' => "Cousine", 
			'variant' => ':400,700,400italic,700italic'),
			
	array( 'name' => "UnifrakturMaguntia", 
			'variant' => ''),
			
	array( 'name' => "Nosifer", 
			'variant' => ''),
			
	array( 'name' => "Convergence", 
			'variant' => ''),
			
	array( 'name' => "IM Fell Double Pica SC", 
			'variant' => ''),
			
	array( 'name' => "Oswald", 
			'variant' => ''),
			
	array( 'name' => "Yeseva One", 
			'variant' => ''),
			
	array( 'name' => "Snippet", 
			'variant' => ''),
			
	array( 'name' => "Volkhov", 
			'variant' => ':400,400italic,700,700italic'),
			
	array( 'name' => "Cabin", 
			'variant' => ':400,500,600,700,400italic,500italic,600italic,700italic'),
			
	array( 'name' => "Comfortaa", 
			'variant' => ':400,300,700'),
			
	array( 'name' => "Orbitron", 
			'variant' => ':400,500,700,900'),
			
	array( 'name' => "Carme", 
			'variant' => ''),
			
	array( 'name' => "Yellowtail", 
			'variant' => ''),
			
	array( 'name' => "Molengo", 
			'variant' => ''),
			
	array( 'name' => "Pacifico", 
			'variant' => ''),
			
	array( 'name' => "News Cycle", 
			'variant' => ''),
			
	array( 'name' => "Lato", 
			'variant' => ':100,300,400,700,900,100italic,300italic,400italic,700italic,900italic'),
			
	array( 'name' => "IM Fell French Canon", 
			'variant' => ':400,400italic'),
			
	array( 'name' => "Nothing You Could Do", 
			'variant' => ''),
			
	array( 'name' => "Puritan", 
			'variant' => ':400,700,400italic,700italic'),
			
	array( 'name' => "Meddon", 
			'variant' => ''),
			
	array( 'name' => "Yanone Kaffeesatz", 
			'variant' => ':400,200,300,700'),
			
	array( 'name' => "PT Serif Caption", 
			'variant' => ':400,400italic'),
			
	array( 'name' => "Goudy Bookletter 1911", 
			'variant' => ''),
			
	array( 'name' => "Alice", 
			'variant' => ''),
			
	array( 'name' => "Varela", 
			'variant' => ''),
			
	array( 'name' => "Arizonia", 
			'variant' => ''),
			
	array( 'name' => "Open Sans", 
			'variant' => '300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'),
			
	array( 'name' => "Syncopate", 
			'variant' => ':400,700'),
			
	array( 'name' => "Mountains of Christmas", 
			'variant' => ':400,700'),
			
	array( 'name' => "IM Fell DW Pica SC", 
			'variant' => ''),
			
	array( 'name' => "Mako", 
			'variant' => ''),
			
	array( 'name' => "Kristi", 
			'variant' => ''),
			
	array( 'name' => "Redressed", 
			'variant' => ''),
			
	array( 'name' => "Lora", 
			'variant' => ':400,700,400italic,700italic'),
			
	array( 'name' => "Engagement", 
			'variant' => ''),
			
	array( 'name' => "Rokkitt", 
			'variant' => ':400,700'),
			
	array( 'name' => "Trykker", 
			'variant' => ''),
			
	array( 'name' => "Luckiest Guy", 
			'variant' => ''),
			
	array( 'name' => "Cabin Sketch", 
			'variant' => ':400,700'),
			
	array( 'name' => "Covered By Your Grace", 
			'variant' => ''),
			
	array( 'name' => "Schoolbell", 
			'variant' => ''),
			
	array( 'name' => "Aldrich", 
			'variant' => ''),
			
	array( 'name' => "Ovo", 
			'variant' => ''),
			
	array( 'name' => "Anton", 
			'variant' => ''),
			
	array( 'name' => "Expletus Sans", 
			'variant' => ':400,400italic,500,500italic,600,600italic,700,700italic'),
			
	array( 'name' => "Cherry Cream Soda", 
			'variant' => ''),
			
	array( 'name' => "Nobile", 
			'variant' => ':400,400italic,700italic,700'),
			
	array( 'name' => "EB Garamond", 
			'variant' => ''),
			
	array( 'name' => "Kreon", 
			'variant' => ':300,400,700'),
			
	array( 'name' => "Zeyada", 
			'variant' => ''),
			
	array( 'name' => "Crimson Text", 
			'variant' => ':400,400italic,600,600italic,700,700italic'),
			
	array( 'name' => "IM Fell English", 
			'variant' => ':400,400italic'),
			
	array( 'name' => "Calligraffitti", 
			'variant' => ''),
			
	array( 'name' => "Vollkorn", 
			'variant' => ':400italic,700italic,400,700'),
			
	array( 'name' => "Buenard", 
			'variant' => ':400,700'),
			
	array( 'name' => "PT Sans Caption", 
			'variant' => ':400,700'),
			
	array( 'name' => "Merriweather", 
			'variant' => ':400,300,700,900'),
			
	array( 'name' => "Droid Sans", 
			'variant' => ':400,700'),
			
	array( 'name' => "Delius", 
			'variant' => ''),
			
	array( 'name' => "Miltonian Tattoo", 
			'variant' => ''),
			
	array( 'name' => "Maven Pro", 
			'variant' => ':400,500,700,900'),
			
	array( 'name' => "Reenie Beanie", 
			'variant' => ''),
			
	array( 'name' => "Tienne", 
			'variant' => ':400,700,900'),
			
	array( 'name' => "Tangerine", 
			'variant' => ':400,700'),
			
	array( 'name' => "Droid Sans Mono", 
			'variant' => ''),
			
	array( 'name' => "Prociono", 
			'variant' => ''),
			
	array( 'name' => "Special Elite", 
			'variant' => ''),
			
	array( 'name' => "Fontdiner Swanky", 
			'variant' => ''),
			
	array( 'name' => "Numans", 
			'variant' => ''),
			
	array( 'name' => "Hammersmith One", 
			'variant' => ''),
			
	array( 'name' => "Metrophobic", 
			'variant' => ''),
			
	array( 'name' => "Rock Salt", 
			'variant' => ''),
			
	array( 'name' => "MedievalSharp", 
			'variant' => ''),
			
	array( 'name' => "Satisfy", 
			'variant' => ''),
			
	array( 'name' => "Buda", 
			'variant' => ''),
			
	array( 'name' => "Cantarell", 
			'variant' => ':400,700,400italic,700italic'),
			
	array( 'name' => "Signika Negative", 
			'variant' => ':300,400,600,700'),
			
	array( 'name' => "Architects Daughter", 
			'variant' => ''),
			
	array( 'name' => "Black Ops One", 
			'variant' => ''),
			
	array( 'name' => "Six Caps", 
			'variant' => ''),
			
	array( 'name' => "League Script", 
			'variant' => ''),
			
	array( 'name' => "La Belle Aurore", 
			'variant' => ''),
			
	array( 'name' => "Lekton", 
			'variant' => ':400,700,400italic'),
			
	array( 'name' => "Voltaire", 
			'variant' => ''),
			
	array( 'name' => "Iceland", 
			'variant' => ''),
			
	array( 'name' => "Istok Web", 
			'variant' => ':400,700,400italic,700italic'),
			
	array( 'name' => "Coming Soon", 
			'variant' => ''),
			
	array( 'name' => "Old Standard TT", 
			'variant' => ':400,400italic,700'),
			
	array( 'name' => "Philosopher", 
			'variant' => ':400,700,400italic,700italic'),
			
	array( 'name' => "Copse", 
			'variant' => ''),
			
	array( 'name' => "Crete Round", 
			'variant' => ':400,400italic'),
			
	array( 'name' => "Mr Dafoe", 
			'variant' => ''),
			
	array( 'name' => "Changa One", 
			'variant' => ':400,400italic'),
			
	array( 'name' => "Allan", 
			'variant' => ''),
			
	array( 'name' => "Neuton", 
			'variant' => ':200,300,400,700,800,400italic'),
			
	array( 'name' => "Homemade Apple", 
			'variant' => ''),
			
	array( 'name' => "Shanti", 
			'variant' => ''),
			
	array( 'name' => "Lobster", 
			'variant' => ''),
			
	array( 'name' => "Patrick Hand", 
			'variant' => ''),
			
	array( 'name' => "Josefin Sans", 
			'variant' => ':100,300,400,600,700,100italic,300italic,400italic,600italic,700italic'),
			
	array( 'name' => "Sunshiney", 
			'variant' => ''),
			
	array( 'name' => "Marvel", 
			'variant' => ':400,400italic,700,700italic'),
			
	array( 'name' => "Goblin One", 
			'variant' => ''),
						
	array( 'name' => "Squada One", 
			'variant' => ''),
			
	array( 'name' => "Fascinate", 
			'variant' => ''),
						
	array( 'name' => "Forum", 
			'variant' => ''),
			
	array( 'name' => "Gruppo", 
			'variant' => ''),
						
	array( 'name' => "Neucha", 
			'variant' => ''),
			
	array( 'name' => "Love Ya Like A Sister", 
			'variant' => ''),
						
	array( 'name' => "Bilbo Swash Caps", 
			'variant' => ''),
			
	array( 'name' => "Antic", 
			'variant' => ''),			
			
	array( 'name' => "Sarina", 
			'variant' => ''),
			
	array( 'name' => "Days One", 
			'variant' => ''),			
			
	array( 'name' => "Allerta Stencil", 
			'variant' => ''),
			
	array( 'name' => "Miss Fajardose", 
			'variant' => ''),			
			
	array( 'name' => "Walter Turncoat", 
			'variant' => ''),
			
	array( 'name' => "Rancho", 
			'variant' => ''),
					
	array( 'name' => "Just Me Again Down Here", 
			'variant' => ''),
			
	array( 'name' => "Questrial", 
			'variant' => ''),
						
	array( 'name' => "Tinos", 
			'variant' => ':400,700,400italic,700italic'),
						
	array( 'name' => "Arvo", 
			'variant' => ':400,700,400italic,700italic'),
			
	array( 'name' => "Over the Rainbow", 
			'variant' => ''),			
			
	array( 'name' => "Aclonica", 
			'variant' => ''),
				
	array( 'name' => "Spirax", 
			'variant' => ''),
			
	array( 'name' => "Crushed", 
			'variant' => ''),
			
	array( 'name' => "Salsa", 
			'variant' => ''),			
			
	array( 'name' => "Unlock", 
			'variant' => ''),
						
	array( 'name' => "Kenia", 
			'variant' => ''),
						
	array( 'name' => "Chicle", 
			'variant' => ''),			
			
	array( 'name' => "Varela Round", 
			'variant' => ''),			
			
	array( 'name' => "Poly", 
			'variant' => ':400,400italic'),			
			
	array( 'name' => "Uncial Antiqua", 
			'variant' => ''),
						
	array( 'name' => "IM Fell DW Pica", 
			'variant' => ':400,400italic'),
						
	array( 'name' => "Geo", 
			'variant' => ''),
						
	array( 'name' => "Basic", 
			'variant' => ''),			
			
	array( 'name' => "Irish Grover", 
			'variant' => ''),			
			
	array( 'name' => "Marko One", 
			'variant' => ''),
						
	array( 'name' => "Sue Ellen Francisco", 
			'variant' => ''),
						
	array( 'name' => "Oldenburg", 
			'variant' => ''),			
			
	array( 'name' => "Marck Script", 
			'variant' => ''),			
			
	array( 'name' => "Monsieur La Doulaise", 
			'variant' => ''),
						
	array( 'name' => "Josefin Slab", 
			'variant' => ':100,300,400,600,700,100italic,300italic,400italic,600italic,700italic'),
						
	array( 'name' => "Montserrat", 
			'variant' => ''),			
			
	array( 'name' => "VT323", 
			'variant' => ''),
						
	array( 'name' => "Shadows Into Light", 
			'variant' => ''),			
			
	array( 'name' => "Ubuntu Condensed", 
			'variant' => ''),			
			
	array( 'name' => "Rationale", 
			'variant' => ''),			
			
	array( 'name' => "Montez", 
			'variant' => ''),			
			
	array( 'name' => "Cagliostro", 
			'variant' => ''),			
			
	array( 'name' => "Fascinate Inline", 
			'variant' => ''),			
			
	array( 'name' => "Gloria Hallelujah", 
			'variant' => ''),			
			
	array( 'name' => "Stoke", 
			'variant' => ''),			
			
	array( 'name' => "Podkova", 
			'variant' => ':400,700'),
			
	array( 'name' => "Bree Serif", 
			'variant' => ''),
			
	array( 'name' => "Spicy Rice", 
			'variant' => ''),
			
	array( 'name' => "Viga", 
			'variant' => ''),
			
	array( 'name' => "Coda Caption", 
			'variant' => ''),
			
	array( 'name' => "Mrs Sheppards", 
			'variant' => ''),
			
	array( 'name' => "The Girl Next Door", 
			'variant' => ''),
			
	array( 'name' => "Stint Ultra Condensed", 
			'variant' => ''),
			
	array( 'name' => "Merienda One", 
			'variant' => ''),
			
	array( 'name' => "Actor", 
			'variant' => ''),
			
	array( 'name' => "Marmelad", 
			'variant' => ''),
			
	array( 'name' => "Ribeye", 
			'variant' => ''),
			
	array( 'name' => "Cabin Condensed", 
			'variant' => ':400,500,600,700'),
			
	array( 'name' => "Original Surfer", 
			'variant' => ''),
			
	array( 'name' => "Devonshire", 
			'variant' => ''),
			
	array( 'name' => "Plaster", 
			'variant' => ''),
			
	array( 'name' => "Limelight", 
			'variant' => ''),
			
	array( 'name' => "Jura", 
			'variant' => ''),
						
);

add_action( 'wp_head', 'atp_google_webfonts' );	
if (!function_exists( "atp_google_webfonts")) {
	function atp_google_webfonts() { 
	
	global $google_fonts;				
		$fonts = '';
		
		global $settings_options;
		// Go through the options
		if ( !empty($settings_options) ) {  
			foreach ( $settings_options as $option )
			
			 {
				$option_types=$option['type'];

					if($option_types == "typography")
					
					{
						foreach ($google_fonts as $font) {
						$googlefont = get_option($option['id']."_face");

								if ( $googlefont == $font['name']){
									$fonts .= $font['name'].$font['variant']."|";
									}	
						}
					}
			}	
		}
			// Output google font css in header			
			if ( $fonts ) {
				$fonts = str_replace( " ","+",$fonts);	
				$out = "\n<!-- Google Fonts -->\n";
				$out.= '<link href="http://fonts.googleapis.com/css?family=' . $fonts .'" rel="stylesheet" type="text/css" />'."\n\n";
				$out = str_replace( '|"','"',$out);
				
				echo $out;
			
		}
	}
}

/*	--------------------------------------------------------------
	::  Cases
	-------------------------------------------------------------- */
	
function sostheme_machine($options) {
	$output = '';
	foreach ($options as $arg) {
		
		if ( $arg['type'] == "start_menu" )
		{	
		
			$output .= '<div class="sos-admin-content-box" id="sos-admin-content-'.$arg['id'].'">'."\n";
		}
			
/*	--------------------------------------------------------------
	::  Case : Text
	-------------------------------------------------------------- */
	
		elseif ( $arg['type'] == "text" )
		{
			$output .= '<div class="metabox-title">'. $arg['name'] .'</div>'."\n";
			$val = get_option($arg['id']);
			if ( $val == "") {
				$val = get_option($arg['id']);
			}
			$tinput = get_option($arg['id']);
			if( $tinput != "") { $sos_value1 = htmlspecialchars( $tinput ); } elseif ($tinput == "") {$sos_value1 = '';}
			$output .= '<input class="metabox-text" name="'. $arg['id'] .'" id="'. $arg['id'] .'" type="'. $arg['type'] .'" value="'. $sos_value1 .'" />'."\n";
			@$output .= '<div id="asd"></div><div class="metabox-desc">'. $arg['desc'] .'</div><div class="adminsep"></div>'."\n";
		}
		
    	// Selectpage
		elseif ( $arg['type'] == "select-page" )
		{	
			$output .= '<div class="metabox-title">'. $arg['name'] .'</div>'."\n";
			$val = $arg['std'];
			$std = get_option($arg['id']);
			if ( $std != "") { $val = $std; }
			
			$args = array(
				'selected'         => $val,
				'echo'             => 0,
				'name'             => $arg['id']
			);
	
			$output .= wp_dropdown_pages( $args );
			@$output .= '<div id="asd"></div><div class="metabox-desc">'. $arg['desc'] .'</div><div class="adminsep"></div>'."\n";

		}
/*	--------------------------------------------------------------
	::  Case : Colorpicker
	-------------------------------------------------------------- */
	
		elseif ( $arg['type'] == "colorpicker" )
		{
			$val = get_option($arg['id']);
			if ( $val == "") {
				$val = $arg['default']; update_option( $arg['id'], $val);
			}
			$output .=  '<div class="metabox-title">'. $arg['name'] .'</div>'."\n";
			$output .=  '<input type="text" class="color-picker metabox-text" name="'. $arg['id'] .'" id="'. $arg['id'] .'" value="'. $val .'">'."\n";
			$output .=  '<div class="metabox-desc">'. $arg['desc'] .'</div> <div class="adminsep"></div>';
		
		}	
		
/*	--------------------------------------------------------------
	::  Case : Upload
	-------------------------------------------------------------- */
 
		elseif ( $arg['type'] == "textupload" )
		{	
			$val = get_option($arg['id']);
			if ( $val == "") {
				$val = get_option($arg['id']);
			}
			$output .= '<div class="metabox-title">'. $arg['name'] .'</div>'."\n";
			$output .=  '<input class="metabox-text" type="text" name="'. $arg['id'] .'" id="'. $arg['id'] .'" value="'. $val .'"  />'."\n";
			$output .=  '<div class="metabox-desc">'. $arg['desc'].'</div>'."\n";
			
			$metapic =  get_option( $arg['id']);
			if ( $metapic !== "") {
			$output .= '<div id="'. $arg['id'] .'_div" > <img class="admin-image" src="'. $val .'" /> </div>'."\n";} else { }
				
		}
		
/*	--------------------------------------------------------------
	::  Case : Textarea
	-------------------------------------------------------------- */

		elseif ( $arg['type'] == "textarea" )
		{
			$output .= '<div class="metabox-title">'. $arg['name'] .'</div>'."\n";
			$val = stripslashes(get_option($arg['id']));
			if ( $val == "") {
				$val = get_option($arg['id']);
			}
			$sos_value = '';
			$tarea = get_option($arg['id']);
			if( $tarea != "") { $sos_value = stripslashes( $tarea ); } elseif ($tarea == "") {$sos_value = '';}
			$output .= '<textarea class="metabox-textarea" name="'. $arg['id'] .'" id="'. $arg['id'] .'">' . $sos_value . '</textarea>'."\n";
			$output .= '<div class="metabox-desc">'. $arg['desc'] .'</div><div class="adminsep"></div>'."\n";
		}
		
/*	--------------------------------------------------------------
	::  Case : Button
	-------------------------------------------------------------- */	
 
		elseif ( $arg['type'] == "button" )
		{
			$output .= '<input type="button" class="customdark" name="'. $arg['id'] .'" id="'. $arg['id'] .'"value="browse" />'."\n";
			$output .= '<input type="button" class="customdark1" name="'. $arg['id'] .'" id="'. $arg['id'] .'_delete" value="'.__('Delete','sosthemes').'" /><div class="adminsep"></div>'."\n";
								
			$output .= '<script type="text/javascript">'."\n";
			$output .= 'jQuery(document).ready(function() {'."\n";
				
					$output .= 'jQuery(\'#'. $arg['id'] .'\').click(function() {'."\n";
						
							$output .= 'window.send_to_editor = function(html) {'."\n";
								
								$output .= 'imgurl = jQuery(\'img\',html).attr(\'src\');'."\n";
								$output .= 'jQuery(\'#'. $arg['id'] .'_image\').val(imgurl);'."\n";
								$output .= 'tb_remove();'."\n";
							$output .= '}'."\n";
							
							$output .= 'tb_show(\'\', \'media-upload.php?post_id=0&type=image&TB_iframe=1\');'."\n";
							$output .= 'return false;'."\n";
					$output .= '}); '."\n";	
			$output .= '});'."\n";
			
			$output .= 'jQuery(document).ready(function() {'."\n";
				
					$output .= 'jQuery(\'#'. $arg['id'] .'_delete\').click(function() {'."\n";
						
							$output .= 'imgurl = \'\';'."\n";
							$output .= 'jQuery(\'#'. $arg['id'] .'_image\').val(imgurl);'."\n";
							$output .= 'jQuery(\'#'. $arg['id'] .'_image_div\').fadeOut(\'slow\');'."\n";
					$output .= '}); '."\n";
			$output .= '});'."\n";
			
			$output .= '</script>'."\n";
			
		}
		
/*	--------------------------------------------------------------
	::  Case : Select
	-------------------------------------------------------------- */				
			
		elseif ( $arg['type'] == "select" )
		{
			
			$output .= '<div class="metabox-title">'. $arg['name'].'</div><select class="typography" name="'. $arg['id'] .'" id="'. $arg['id'] .'">'."\n";

				 $select_value = stripslashes(get_option($arg['id']));

				foreach ( $arg['options'] as $option ) {

					$selected = '';

					if( $select_value != '' ) {
						if ( $select_value == $option ) { $selected = ' selected="selected"';}
					} else {
						if ( isset( $arg['std'] ) )
							if ( $arg['std'] == $option ) { $selected = ' selected="selected"'; }
					}

					$output .=  '<option'. $selected .'>';
					$output .=  $option;
					$output .=  '</option>';

				}
				$output .=  '</select><div class="metabox-desc">'. $arg['desc'].'</div><div class="adminsep"></div>'."\n";
		}
		
/*	--------------------------------------------------------------
	::  Case : Checkbox
	-------------------------------------------------------------- */
	
		elseif ( $arg['type'] == "checkbox" )
		{
		   
		   $saved_std = stripslashes(get_option($arg['id']));
		   
		   $checked = '';
		   	$selectclassactive = '';
			$selectclassdeactive = 'selected';
			
			if(!empty($saved_std)) {
				if($saved_std == 'true') {
				$checked = 'checked="checked"';
				$selectclassactive = 'selected';
				$selectclassdeactive = '';
				}
				else{
				   $selectclassactive = '';
				$selectclassdeactive = 'selected';
				}
			}
			else {
				$selectclassactive = '';
				$selectclassdeactive = 'selected';
			}
			$output .=  '<div class="metabox-title">'. $arg['name'].'</div>
					<p class="field switch" style="float:left; margin-right:30px;"><label class="cb-enable '.$selectclassactive.'"><span>'. __('ON','sosthemes').'</span></label>
					<label class="cb-disable '.$selectclassdeactive.'"><span>'. __('OFF','sosthemes').'</span></label><span class="hidden" style="display:none;">
			<input type="checkbox" style="margin:0 10px 10px 10px;" class="checkbox inblock" name="'.  $arg['id'] .'" id="'. $arg['id'] .'" value="true" '. $checked .' /><div class="inblock0" style="margin-left: 130px; margin-top: 22px;">'. $arg['desc'].'</div><div class="adminsep"></div></span></p>';

		}
		
/*	--------------------------------------------------------------
	::  Case : Typography
	-------------------------------------------------------------- */

		else if ( $arg['type'] == "typography" )
		{
			
		$output .= '<div class="metabox-title">'. $arg['name'] .'</div>'."\n";
		$output .= '<div class="metabox-desc">'. $arg['desc'] .'</div>'."\n";

			$default = $arg['std'];
			$typography_stored = get_option( $arg['id'] );

			$val = $default['size'];
			if (!empty($typography_stored['size']) ) { $val = $typography_stored['size']; }
			
			if (@$typography_stored['unit'] == 'px' ) { $show_px = ''; $show_em = ' style="display:none" '; $name_px = ' name="'. $arg['id'].'_size" '; $name_em = ''; }
			else if(@$typography_stored['unit'] == 'em' ) { $show_em = ''; $show_px = 'style="display:none"'; $name_em = ' name="'. $arg['id'].'_size" '; $name_px = ''; }
			else { $show_px = ''; $show_em = ' style="display:none" '; $name_px = ' name="'. $arg['id'].'_size" '; $name_em = ''; }
			$output .= '<select class="typography  typography-size  typography-size-px"  id="'. $arg['id'].'_size_px" '. $name_px . $show_px .'>';
			for ( $i = 9; $i < 71; $i++ ) {
				if( $val == strval( $i ) ) { $active = 'selected="selected"'; } else { $active = ''; }
				$output .= '<option value="'. $i .'" ' . $active . '>'. $i .'</option>'; }
			$output .= '</select>';

			$output .= '<select class="typography  typography-size  typography-size-em" id="'. $arg['id'].'_size_em" '. $name_em . $show_em.'>';
			$em = 0.5;
			for ( $i = 0; $i < 39; $i++ ) {
				if ( $i <= 24 ) 
					$em = $em + 0.1;
				elseif ( $i >= 14 && $i <= 24 )
					$em = $em + 0.2;
				elseif ( $i >= 24 ) 
					$em = $em + 0.5;
				if( $val == strval( $em ) ) { $active = 'selected="selected"'; } else { $active = ''; }
			
				$output .= '<option value="'. $em .'" ' . $active . '>'. $em .'</option>'; }
			$output .= '</select>';

			$val = $default['unit'];
			if (!empty( $typography_stored['unit']) ) { $val = $typography_stored['unit']; }
			$em = ''; $px = '';
			if( $val == 'em' ) { $em = 'selected="selected"'; }
			if( $val == 'px' ) { $px = 'selected="selected"'; }
			$output .= '<select class=" typography  typography-unit" name="'. $arg['id'].'_unit" id="'. $arg['id'].'_unit">';
			$output .= '<option value="px" '. $px .'">px</option>';
			$output .= '<option value="em" '. $em .'>em</option>';
			$output .= '</select>';
		
			$val = $default['face'];
			if (!empty ( $typography_stored['face'] ) )
				$val = $typography_stored['face'];

			$font01 = '';
			$font02 = '';
			$font03 = '';
			$font04 = '';
			$font05 = '';
			$font06 = '';
			$font07 = '';
			$font08 = '';
			$font09 = '';
			$font10 = '';
			$font11 = '';
			$font12 = '';
			$font13 = '';
			$font14 = '';
			$font15 = '';
			$font16 = '';

			if ( strpos( $val, 'Arial, sans-serif' ) !== false ) { $font01 = 'selected="selected"'; }
			if ( strpos( $val, 'Verdana, Geneva' ) !== false ) { $font02 = 'selected="selected"'; }
			if ( strpos( $val, 'Trebuchet' ) !== false ) { $font03 = 'selected="selected"'; }
			if ( strpos( $val, 'Georgia' ) !== false ) { $font04 = 'selected="selected"'; }
			if ( strpos( $val, 'Times New Roman' ) !== false ) { $font05 = 'selected="selected"'; }
			if ( strpos( $val, 'Tahoma, Geneva' ) !== false ) { $font06 = 'selected="selected"'; }
			if ( strpos( $val, 'Palatino' ) !== false ) { $font07 = 'selected="selected"'; }
			if ( strpos( $val, 'Helvetica' ) !== false ) { $font08 = 'selected="selected"'; }
			if ( strpos( $val, 'Calibri' ) !== false ) { $font09 = 'selected="selected"'; }
			if ( strpos( $val, 'Myriad' ) !== false ) { $font10 = 'selected="selected"'; }
			if ( strpos( $val, 'Lucida' ) !== false ) { $font11 = 'selected="selected"'; }
			if ( strpos( $val, 'Arial Black' ) !== false ) { $font12 = 'selected="selected"'; }
			if ( strpos( $val, 'Gill' ) !== false ) { $font13 = 'selected="selected"'; }
			if ( strpos( $val, 'Geneva, Tahoma' ) !== false ) { $font14 = 'selected="selected"'; }
			if ( strpos( $val, 'Impact' ) !== false ) { $font15 = 'selected="selected"'; }
			if ( strpos( $val, 'Courier' ) !== false ) { $font16 = 'selected="selected"'; }

			$output .= '<select class=" typography  typography-face" name="'. $arg['id'].'_face" id="'. $arg['id'].'_face">';
			$output .= '<option value="Arial, sans-serif" '. $font01 .'>Arial</option>';
			$output .= '<option value="Verdana, Geneva, sans-serif" '. $font02 .'>Verdana</option>';
			$output .= '<option value="&quot;Trebuchet MS&quot;, Tahoma, sans-serif"'. $font03 .'>Trebuchet</option>';
			$output .= '<option value="Georgia, serif" '. $font04 .'>Georgia</option>';
			$output .= '<option value="&quot;Times New Roman&quot;, serif"'. $font05 .'>Times New Roman</option>';
			$output .= '<option value="Tahoma, Geneva, Verdana, sans-serif"'. $font06 .'>Tahoma</option>';
			$output .= '<option value="Palatino, &quot;Palatino Linotype&quot;, serif"'. $font07 .'>Palatino</option>';
			$output .= '<option value="&quot;Helvetica Neue&quot;, Helvetica, sans-serif" '. $font08 .'>Helvetica*</option>';
			$output .= '<option value="Calibri, Candara, Segoe, Optima, sans-serif"'. $font09 .'>Calibri*</option>';
			$output .= '<option value="&quot;Myriad Pro&quot;, Myriad, sans-serif"'. $font10 .'>Myriad Pro*</option>';
			$output .= '<option value="&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Sans&quot;, sans-serif"'. $font11 .'>Lucida</option>';
			$output .= '<option value="&quot;Arial Black&quot;, sans-serif" '. $font12 .'>Arial Black</option>';
			$output .= '<option value="&quot;Gill Sans&quot;, &quot;Gill Sans MT&quot;, Calibri, sans-serif" '. $font13 .'>Gill Sans*</option>';
			$output .= '<option value="Geneva, Tahoma, Verdana, sans-serif" '. $font14 .'>Geneva*</option>';
			$output .= '<option value="Impact, Charcoal, sans-serif" '. $font15 .'>Impact</option>';
			$output .= '<option value="Courier, &quot;Courier New&quot;, monospace" '. $font16 .'>Courier</option>';
			
			global $google_fonts;
			sort ($google_fonts);
		
			$output .= '<option value="">-- Google Fonts --</option>';
			foreach ( $google_fonts as $key => $googlefont ) :
				$font[$key] = '';
				if ($val == $googlefont['name']){ $font[$key] = 'selected="selected"'; }
				$name = $googlefont['name'];
				$output .= '<option value="'.$name.'" '. $font[$key] .'>'.$name.'</option>';
			endforeach;			
			
			$output .= '</select>';

			$val = $default['style'];
			if (!empty( $typography_stored['style'])) { $val = $typography_stored['style']; }
			$normal = ''; $italic = ''; $bold = ''; $bolditalic = '';
			if( $val == 'normal' ) { $normal = 'selected="selected"'; }
			if( $val == 'italic' ) { $italic = 'selected="selected"'; }
			if( $val == 'bold' ) { $bold = 'selected="selected"'; }
			if( $val == 'bold italic' ) { $bolditalic = 'selected="selected"'; }

			$output .= '<select class="typography  typography-style" name="'. $arg['id'].'_style" id="'. $arg['id'].'_style">';
			$output .= '<option value="normal" '. $normal .'>Normal</option>';
			$output .= '<option value="italic" '. $italic .'>Italic</option>';
			$output .= '<option value="bold" '. $bold .'>Bold</option>';
			$output .= '<option value="bold italic" '. $bolditalic .'>Bold/Italic</option>';
			$output .= '</select>';
			
			$output .= '<div class="adminsep"></div>'."\n";
		
		}
		
/*	--------------------------------------------------------------
	::  Case : Radio
	-------------------------------------------------------------- */		
		
		elseif ( $arg['type'] == "radio" )
		{
			$output .= '<div class="metabox-title">'. $arg['name'] .'</div>'."\n";
			$output .= '<div style="width:470px; float:left;">'."\n";
			 $select_value = get_option( $arg['id'] );
				
			 foreach ( $arg['options'] as $key => $option) 
			 { 	

				 $checked = '';
				  $activeimg = '';
				   if($select_value != '') {
						if ( $select_value == $key) { $checked = ' checked'; $activeimg = 'radio-img-selected'; } 
				   } else {
					if ($arg['std'] == $key) { $checked = ' checked'; $activeimg = 'radio-img-selected'; }
				   }
				  $urlfinf = get_template_directory_uri();
				
				$output .= '<label style="display:inline-block; float:left; padding-right:10px; padding-bottom:5px;"><input id="'. $key .'" style=" display:none;" class="input -radio" type="radio" name="'. $arg['id'] .'" value="'. $key .'" '. $checked .' /><img  class="jconnect_'. $arg['id'] .' '. $activeimg .' radioimages" src="'.$urlfinf.'/admin/images/opimage/' . $option .'.png" alt="" /></label>';
				
				$output .= '
				
				<script>
    			jQuery(\'.jconnect_'. $arg['id'] .'\').click(function(){
					jQuery(this).parent().parent().find(\'.jconnect_'. $arg['id'] .'\').removeClass(\'radio-img-selected\');
					jQuery(this).addClass(\'radio-img-selected\');
					
				});
</script>';
			
			}
			
			$output .= '</div>'."\n";
			$output .= '<div class="sosdesc">'. $arg['desc'] .'</div>'."\n";
			$output .= '<div class="adminsep"></div>'."\n";
			
		}
			
/*	--------------------------------------------------------------
	::  Case : End Menu
	-------------------------------------------------------------- */
		
		elseif ( $arg['type'] == "end_menu" )
		{
			$output .= '</div>';
		}
	}$menu = ''; 
	return array($output,$menu);
}

/*	--------------------------------------------------------------
	::  Default Options
	-------------------------------------------------------------- */
		
		global  $output;
		$output = '';
		
function sostheme_meta($options) {
$output = ''; $menu = '';
	foreach ($options as $arg) {
		
		if ( $arg['type'] == "text" )
		{
			$output .= "document.getElementById('". $arg['id'] ."').value = '" .$arg['default'] . "';" . "\n";
		}
		elseif ( $arg['type'] == "textarea" )
		{
			$output .= "document.getElementById('". $arg['id'] ."').value = '" .$arg['default'] . "';" . "\n";
		}
			elseif ( $arg['type'] == "colorpicker" )
		{
			$output .= "document.getElementById('". $arg['id'] ."').value = '" .$arg['default'] . "';" . "\n";
		}
		elseif ( $arg['type'] == "checkbox" )
		{
			$output .= "document.getElementById('". $arg['id'] ."').checked='" .$arg['default'] . "';" . "\n";
		}
		elseif ( $arg['type'] == "radio" )
		{
			$output .= "document.getElementById('". $arg['std'] ."').checked='" .$arg['default'] . "';" . "\n";
		}	
		elseif ( $arg['type'] == "select" )
		{
			$output .= "document.getElementById('". $arg['id'] ."').value = '" .$arg['default'] . "';" . "\n";
		}
		elseif ( $arg['type'] == "textupload" )
		{
			$output .= "document.getElementById('". $arg['id'] ."').value = '" .$arg['default'] . "';" . "\n";
		}
		
		elseif ( $arg['type'] == "typography" )
		{
			$output .= "document.getElementById('". $arg['id'] ."_size_px').value = '" .$arg['dsize'] . "';" . "\n";
			$output .= "document.getElementById('". $arg['id'] ."_face').value = '" .$arg['dface'] . "';" . "\n";
			$output .= "document.getElementById('". $arg['id'] ."_style').value = '" .$arg['dstyle'] . "';" . "\n";
		}

	}
	return array($output,$menu);
}

/*	--------------------------------------------------------------
	::  Callback
	-------------------------------------------------------------- */

	function sostheme_ajax_callback() {
		check_ajax_referer('sostheme_ajax_post_action','sostheme_nonce');
		$data = $_POST['data'];
		parse_str($data,$output);
		$options = get_option('sostheme_settings_template');
		foreach($options as $option_array){
			@$id = $option_array['id'];
			@$new_value = $output[$option_array['id']];
			$up = update_option($id,stripslashes($new_value));
				
		}
			foreach($output as $out_id => $out_veri) {
		update_option($out_id,$out_veri);	
		}
	} add_action('wp_ajax_sostheme_ajax_post_action', 'sostheme_ajax_callback');

/*	--------------------------------------------------------------
	::  Add Admin
	-------------------------------------------------------------- */

	function sostheme_add_admin() {

	global $menu;

	$menu[30] = array('', 'administrator', 'separator', '', 'wp-menu-separator');

	$tname = get_option('sosq_theme_name');

		add_theme_page(get_option('current_theme').' Settings', $tname ? $tname : 'Quickess' , 'administrator', 'sostheme_settings', 'sostheme_settings_page', get_template_directory_uri() . '/images/set.png' , 39);
	} add_action('admin_menu', 'sostheme_add_admin');

/*	--------------------------------------------------------------
	::  Markup
	-------------------------------------------------------------- */

	function sostheme_settings_page(){
	?>
	<div id="sos-admin" class="posrel">
		<form enctype="multipart/form-data" id="sosthemeform">
			<div id="sos-admin-header">
				<?php $clogo = get_option('sosq_op_logo_image'); if($clogo == ''){?> 
				<img id="admin-logo" src="<?php $blogurl = get_template_directory_uri(); echo $blogurl."/admin/images/opimage/admin-logo.png"; ?>">
				<?php } else { ?>
				<img id="admin-logo" src="<?php echo $clogo; ?>" height="120" width="225">
				<?php } ?>
				<div class="announcement"><?php _e('If you need any help, you can vist our <a href="http://www.cmscode.com/">support page.</a>','sosthemes') ?></div>
				<div class="button1"><input type="submit" class="customyellow shadowbutton" value="<?php _e('Apply Changes','sosthemes') ?>" id="submit-button" /></div>

			</div>
			<div id="yaytrue"></div>
			<div id="sos-admin-main">
				<div id="sos-admin-menu">
					<ul>
						<?php $return = sostheme_machine_menu(sostheme_admin_settings()); ?>
						<?php echo $return[0]; ?>
					</ul>
				</div>
				<div id="sos-admin-content">
					<?php $return = sostheme_machine(sostheme_admin_settings()); ?>
					<?php echo $return[0]; ?>
				</div>
				<div class="clear"></div>
			</div>
			<div id="sos-admin-footer"  style="position:relative;">
				<div id="yaybottom"></div>
				<div id="sos-admin-footer-submit">
					<div class="button3"><input type="button" class="button secondcustombutton" id="submit-button" name="revert" value="<?php _e('Default Values','sosthemes') ?>" onclick="kRevert()" /></div>
					<div class="button4"><input type="submit" class="customyellow shadowbutton" value="<?php _e('Apply Changes','sosthemes') ?>" id="submit-button" /></div>
					<?php wp_nonce_field('sostheme_ajax_post_action','sostheme_nonce'); ?>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript">
		function kRevert() {
			<?php $return = sostheme_meta(sostheme_admin_settings()); ?>
			<?php echo $return[0]; ?>
		}
	</script>
	<?php
}