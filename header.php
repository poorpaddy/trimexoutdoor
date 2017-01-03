<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php global $post_id; sos_seo_title($post_id); ?></title>
        <link rel="shortcut icon" href="<?php echo get_option('sosq_favicon_image');?>" type="image/x-icon" />  
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <meta name="description" content="<?php global $post_id; sos_seo_desc($post_id); ?>"> 
        <meta name="keywords" content="<?php global $post_id; sos_seo_key($post_id); ?>">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
        <!-- WP Head -->
        <?php wp_head(); ?>
        <?php 
        $logo       = get_option('sosq_logo_image'); // Main Logo
        $freetext1  = get_option('header_free_text1'); // Free Text 1 ( Header Right )
        $freetext2  = get_option('header_free_text2'); // Free Text 2 ( Header Right )
        $customcss = get_option('sosq_main_style_area'); // Custom Css
        $pattern_control    = get_option('pattern_control'); // Pattern control
        $custom_background  = get_option('sosq_main_background_image'); // Background Image
        $background_position    = get_option('sosq_main_background_position'); // Bg Position
        ?>
        <?php sos_predefined_colors() // Custom Color ?>
        <?php if ($customcss != '') { ?>
        <!-- Custom CSS -->
        <style type="text/css">
        <?php echo $customcss ?>
        </style>
        <?php } ?>      
    </head>
    <body <?php body_class(); ?>>
    <?php if ($pattern_control == 'true' && $background_position == 'stretch') {    
            echo '<img id="background" src="'.$custom_background.'" />';} ?>
        <div id="wrapper">
            <!-- HEADER -->
            <div id="header">
                <!-- LOGO -->
                <div id="logo">
                    <a href="<?php echo home_url(); ?>">
                        <?php if($logo != '') { ?>
                        <img alt="<?php bloginfo('name'); ?>" src="<?php echo $logo ?>">
                        <?php } else { ?>
                        <img alt="<?php bloginfo('name'); ?>" src="<?php echo get_template_directory_uri(); ?>/images/logo.jpg">
                        <?php } ?>
                    </a>
                </div>
                <!-- END LOGO -->
                <!-- RIGHT AREA -->
                <div id="header-right">
                    <span class="taling-r dblock"><?php echo $freetext1 ?></span>
                    <h1 class="regular-size taling-r"><?php echo $freetext2 ?></h1>
                </div>
                <div class="clear"></div>
                <!-- END RIGHT AREA -->
                <!-- NAVIGATION -->
                <div class="mobile-main-menu">
                    <div class="main-menu">
                        <ul class="custom-menu">
                            <?php wp_sos_nav(); ?> 
                        </ul>
                        <!-- SEARCHBAR -->
                        <div class="searhbar">
                        <form method="get" action="<?php echo home_url(); ?>/">
                            <input class="searchinput" name="s" id="s" type="text">
                            </form>
                        </div>
                     <!-- END SEARCHBAR -->
                    </div>
                   <div class="clear"></div>
                </div>
               <!-- END NAVIGATION -->
            </div>
            <div class="clear"></div>
            <!-- END HEADER -->