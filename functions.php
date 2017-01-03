<?php
/*  --------------------------------------------------------------
    :: Languages
    -------------------------------------------------------------- */
    load_theme_textdomain('sosthemes', get_template_directory() . '/languages'); 
/*  --------------------------------------------------------------
    :: Wordpress Head Scripts
    -------------------------------------------------------------- */
    function sos_register_js() {
        if (!is_admin()) {
            wp_register_script('custom', get_template_directory_uri() . '/js/custom.js', 'jquery');
            wp_register_script('respond', get_template_directory_uri() . '/js/respond.min.js', 'jquery');
            wp_register_script('superfish', get_template_directory_uri() . '/js/jquery.superfish.js', 'jquery');
            wp_register_script('easing', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', 'jquery');
            wp_register_script('prettyphoto', get_template_directory_uri() . '/js/jquery.easing.1.3.js', 'jquery');
            wp_register_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', 'jquery');
            wp_register_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', 'jquery');
            wp_register_script('validation', get_template_directory_uri() . '/js/jquery.validate.js', 'jquery');
            wp_register_script('heightfit', get_template_directory_uri() . '/js/jquery.heightfit.js', 'jquery');
			wp_register_script('slider', get_template_directory_uri() . '/js/slider.php', 'jquery');
			
            wp_enqueue_script('jquery');
            wp_enqueue_script('custom');
			wp_enqueue_script('slider');
            wp_enqueue_script('respond');
            wp_enqueue_script('superfish');
            wp_enqueue_script('easing');
            wp_enqueue_script('flexslider'); 
            wp_enqueue_script('isotope'); 
            wp_enqueue_script('validation'); 
            wp_enqueue_script('prettyphoto'); 
            wp_enqueue_script('heightfit'); 
        }
    }
    add_action('init', 'sos_register_js');
/*  --------------------------------------------------------------
    :: Admin Styles & Scripts
    -------------------------------------------------------------- */
    function sos_register_astyle() {
        if (is_admin()) {
            // :: Register Style
            wp_register_style('custom-style', get_template_directory_uri() . '/admin/css/styles.css');
            wp_register_style('google-font', 'http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic');
            wp_register_style('jcolorpicker', get_template_directory_uri() . '/admin/css/colorpicker.css');
            wp_enqueue_style('custom-style');
            wp_enqueue_style('google-font');
            wp_enqueue_style('jcolorpicker');
        }
    }
    add_action('init', 'sos_register_astyle');
    function sos_register_ascript() {
        if (is_admin()) {
            // :: Register script
            wp_register_script('custom-script', get_template_directory_uri() . '/admin/js/modena.js');
            wp_register_script('jcolorpicker', get_template_directory_uri() . '/admin/js/colorpicker.js');
            wp_register_script('custom-admin', get_template_directory_uri() . '/admin/js/admin-functions.js');
            //wp_enqueue_script('jquerys');
            wp_enqueue_script('custom-script');
            wp_enqueue_script('jcolorpicker');
            wp_enqueue_script('custom-admin');
        }
    }
    add_action('init', 'sos_register_ascript');
/*  --------------------------------------------------------------
    :: Wordpress Styles
    -------------------------------------------------------------- */
    function sos_register_css() {
        if (!is_admin()) {
            wp_register_style( 'layout', get_template_directory_uri() . '/style.css' );
            wp_register_style( 'skeleton', get_template_directory_uri() . '/css/skeleton.css' );
            wp_register_style( 'base', get_template_directory_uri() . '/css/base.css' );
            wp_register_style( 'fontawesomeie7', get_template_directory_uri() . '/css/font-awesome-ie7.css' );
            wp_register_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.css' );     
            wp_enqueue_style('layout');
            wp_enqueue_style('skeleton');
            wp_enqueue_style('base');
            wp_enqueue_style('fontawesomeie7');
            wp_enqueue_style('fontawesome');
        }
    }
    add_action('init', 'sos_register_css');
/*  --------------------------------------------------------------
    :: Wordpress Menu Support
    -------------------------------------------------------------- */
    function sos_deregister_ul($menu){
        return preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
    }
    add_filter('wp_nav_menu', 'sos_deregister_ul');
    function sos_register_menu() {
        register_nav_menus(
        array( 'main-menu' => __( 'Main Menu' , 'sosthemes' )));
    }
    add_action( 'init', 'sos_register_menu' );
	
	add_editor_style('editor-style.css');
/*  --------------------------------------------------------------
    :: Wordpress Sos Nav
    -------------------------------------------------------------- */
    if( !function_exists('wp_sos_nav')) {
        function wp_sos_nav() {
			$mainppage = get_option('sosq_portfolio_mainpage');
            global $post, $wp_query;
            $defaults = array(
                'container'      => false,
                'theme_location' => 'main-menu',
            );
            if ( get_query_var('post_type') == 'portfolio' || get_query_var('taxonomy') == 'Filter' ) {
                $temp_post = $post;
                $temp_query = $wp_query;
                $wp_query = null;
                $wp_query = new WP_Query();
                $wp_query->query( array( 'page_id' => $mainppage ) );
                wp_nav_menu($defaults);
                $wp_query = null;
                $wp_query = $temp_query;
                $post = $temp_post;
            } else {
                wp_nav_menu( $defaults );
            }
        }
    }
/*  --------------------------------------------------------------
    :: Theme Support
    -------------------------------------------------------------- */
    $formats = array( 
                'gallery', 
                'video',);
    add_theme_support( 'post-formats', $formats ); 
    // Tumbnail 
    if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 80, '', true );
    add_image_size( 'large', 610, '', true ); // Large thumbnails
    add_image_size( 'medium', 450, '', true ); // Medium thumbnails
    add_image_size( 'small', 210, '', true ); // Small thumbnails
    add_image_size( 'blog-thumb', 610, '', true ); 
    add_image_size( 'archive-thumb', 80, '', true ); 
    add_image_size( 'portfolio-thumb', 450, 321, true ); 
    add_image_size( 'fullsize', '', '', true ); // Fullsize
    }
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );
/*  --------------------------------------------------------------
    :: Excerpt Length
    -------------------------------------------------------------- */       
    if( !function_exists( 'sosq_excerpt_length' ) ) {
        function sosq_excerpt_length($length) {
            return 30; 
        }
        add_filter('excerpt_length', 'sosq_excerpt_length');
    }   
/*  --------------------------------------------------------------
    :: Include
    -------------------------------------------------------------- */
    //Sidebars
    include("inc/plugin/sidebars.php");
    // Options Page
    include("admin/admin-functions.php");
    // Widgets
    include("inc/widget/widget-flickr.php");
    include("inc/widget/widget-twitter.php");
    include("inc/widget/widget-social.php");
    include("inc/widget/widget-recent-portfolio.php");
    //Metaboxes
    include("inc/metabox/blog-metabox.php");
    include("inc/metabox/page-metabox.php");
    include("inc/metabox/portfolio-metabox.php");
    include("inc/metabox/slider-metabox.php");
    //Page Navi
    include("inc/postformat/navi.php");
    //Posttype
    include("inc/posttype/portfolio-posttype.php");
    include("inc/posttype/slider-posttype.php");
/*  --------------------------------------------------------------
    :: Breadcrumb
    -------------------------------------------------------------- */
    function kriesi_breadcrumb() {
        echo '<ul class="breadcrumbs">';
         if ( !is_front_page() ) {
        echo '<li><a href="';
        echo home_url();
        echo '">'.__('Home', 'sosthemes');
        echo "</a></li>";
    }
        global $post;
    if ( is_category() || is_single() && !is_singular('portfolio')) {
            $category = get_the_category();
            $ID = $category[0]->cat_ID;
            echo '<li>'.get_category_parents($ID, TRUE, '', FALSE ).'</li>';
    }
    if(get_query_var('taxonomy') == 'Filter') {
        $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
        $stterm = $term->name;
        echo '<li><a href="">'.$stterm.'</a></li>';  
    }
        if(is_singular('portfolio')) {
            echo get_the_term_list($post->ID, 'Filter', '<li>', '<span class="sosep"></span>', '</li>');   
        }
        if(is_home()) { echo '<li>'.get_option('sosq_blog_main_title').'</li>'; }
        if(is_single() || is_page()) { echo '<li>'.get_the_title().'</li>'; }
        if(is_tag()){ echo '<li>'."Tag: ".single_tag_title('',FALSE).'</li>'; }
        if(is_404()){ echo '<li>'.__("404 - Page not Found", 'sosthemes').'</li>'; }
        if(is_search()){ echo '<li>'.__("Search", 'sosthemes').'</li>'; }
        if(is_year()){ echo '<li>'.get_the_time('Y').'</li>'; }
        echo "</ul>";
}
/*	--------------------------------------------------------------
	:: Content Width
	-------------------------------------------------------------- */
	
	if( !isset( $content_width ) ) $content_width = 610;
	
/*  --------------------------------------------------------------
    :: Sos SEO
    -------------------------------------------------------------- */
    function sos_seo_title($post_id) { 
	global $post_id;

    if( is_archive() || is_category() || is_tag() || is_search() || is_404() || is_home() ) {
		
	     wp_title(' | ', true, 'right'); bloginfo('name');
		 
		} else {
			$inpost_title   = get_post_meta(get_the_ID(), 'sosq_inpost_seo_title', TRUE);
			$inmain_title   = get_option('sosq_main_seo_title');
		
		if($inpost_title != '') { echo $inpost_title; } else if($inmain_title != '') { wp_title(' | ', true, 'right'); echo $inmain_title; } else { wp_title(' | ', true, 'right'); bloginfo('name');}
		}
	}
    function sos_seo_desc($post_id) { 
	global $post_id;
	if( is_archive() || is_category() || is_tag() || is_search() || is_404() || is_home() ) { 
	$inmain_desc   = get_option('sosq_main_seo_desc');
	echo $inmain_desc;
	} 
	
		else {
		$inpost_desc   = get_post_meta(get_the_ID(), 'sosq_inpost_seo_desc', TRUE);
		$inmain_desc   = get_option('sosq_main_seo_desc');
		
		if($inpost_desc != '') { echo $inpost_desc; } else { echo $inmain_desc;}
		
		}
	}
    function sos_seo_key($post_id) { 
	global $post_id;
	
	 if( is_archive() || is_category() || is_tag() || is_search() || is_404() || is_home() ) {
	
	$inmain_key   = get_option('sosq_main_seo_key');
	echo $inmain_key;
		
		} else {
			
		$inpost_key   = get_post_meta(get_the_ID(), 'sosq_inpost_seo_key', TRUE);
		$inmain_key   = get_option('sosq_main_seo_key');
		
		
		if($inpost_key != '') { echo $inpost_key; } else { echo $inmain_key;}

			
			}
	}
/*  --------------------------------------------------------------
    :: Sos Thumbnail / Lightbox - Portfolio
    -------------------------------------------------------------- */
    function sos_no_lightbox($post_id) { 
        $output = '';
        $themeuri   = get_template_directory_uri();
        $timthumb   = get_post_meta(get_the_ID(), 'true_timthumb', TRUE);
        $pthumb     = get_post_meta(get_the_ID(), 'sosq_portfolio_thumb_image', TRUE);
        $output     .= '<div class="portfolio-thumb-image half-bottom">';
        if ($timthumb == 'true') {
        $output     .= '<a href="'.get_permalink().'" title="'. get_the_Title() .'"><img class="scale-with-grid colorize" src="'. $themeuri .'/inc/postformat/timthumb.php?src='. $pthumb.'&h=320&w=450&zc=1" alt="'. get_the_Title() .'">';        
        } else {    
        $output     .= '<a href="'.get_permalink().'" title="'. get_the_Title() .'"><img class="scale-with-grid colorize" src="'.$pthumb.'" alt="'. get_the_Title() .'">';      
        }
        $output     .= '</a></div>';
        echo $output;
        }   
    function sos_pembedpp($post_id) {
        $pembed         = get_post_meta(get_the_ID(), 'sosq_portfolio_embed_code', TRUE);
        $output = '';
        $themeuri   = get_template_directory_uri();
        $pthumb     = get_post_meta(get_the_ID(), 'sosq_portfolio_thumb_image', TRUE);
        $output     .= '<div class="portfolio-thumb-image half-bottom">';
        $output     .= '<a href="#inline-'.get_the_ID().'" rel="prettyPhoto" title="'. get_the_Title() .'"><img class="scale-with-grid colorize" src="'. $themeuri .'/inc/postformat/timthumb.php?src='. $pthumb.'&h=320&w=450&zc=1" alt="'. get_the_Title() .'">';
        $output     .= '</a></div>';
        $output     .= '<div id="inline-'.get_the_ID().'" class="lightboximages">'; 
        $output     .= '<div class="embed-container">'.$pembed.'</div></div>'; 
        echo $output;
    }
    function sos_pthumb($post_id) {
        $output = '';
        $themeuri   = get_template_directory_uri();
        $pthumb     = get_post_meta(get_the_ID(), 'sosq_portfolio_thumb_image', TRUE);
        $timthumb   = get_post_meta(get_the_ID(), 'true_timthumb', TRUE);
        $output     .= '<div class="portfolio-thumb-image half-bottom">';
        if ($timthumb == 'true') {
        $output     .= '<a href="'. $pthumb .'" rel="prettyPhoto['.get_the_ID().']" title="'. get_the_Title() .'"><img class="scale-with-grid colorize" src="'. $themeuri .'/inc/postformat/timthumb.php?src='. $pthumb.'&h=320&w=450&zc=1" alt="'. get_the_Title() .'">';
        } else {
        $output     .= '<a href="'. $pthumb .'" rel="prettyPhoto['.get_the_ID().']" title="'. get_the_Title() .'"><img class="scale-with-grid colorize" src="'. $pthumb.'" alt="'. get_the_Title() .'">';   
        }
        $output     .= '</a></div>';  
        echo $output;
    }
    function sos_portfolio_thumbnail($post_id) {
        $pimage1        = get_post_meta(get_the_ID(), 'sosq_portfolio_big1_image', TRUE);
        $pimage2        = get_post_meta(get_the_ID(), 'sosq_portfolio_big2_image', TRUE);
        $pimage3        = get_post_meta(get_the_ID(), 'sosq_portfolio_big3_image', TRUE);
        $pimage4        = get_post_meta(get_the_ID(), 'sosq_portfolio_big4_image', TRUE);
        $pimage5        = get_post_meta(get_the_ID(), 'sosq_portfolio_big5_image', TRUE);
        $pimage6        = get_post_meta(get_the_ID(), 'sosq_portfolio_big6_image', TRUE);
        $pimage7        = get_post_meta(get_the_ID(), 'sosq_portfolio_big7_image', TRUE);
        $pimage8        = get_post_meta(get_the_ID(), 'sosq_portfolio_big8_image', TRUE);
        $pimage9        = get_post_meta(get_the_ID(), 'sosq_portfolio_big9_image', TRUE);
        $pimage10       = get_post_meta(get_the_ID(), 'sosq_portfolio_big10_image', TRUE);
        $output = '';
        if($pimage1){ $output .= '<a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage1 .'">
            <img src="'. $pimage1 .'" alt="'. get_the_Title() .'" /></a>'; };
        if($pimage2){ $output .= '<a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage2 .'">
            <img src="'. $pimage2 .'" alt="'. get_the_Title() .'" /></a>'; };
        if($pimage3){ $output .= '<a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage3 .'">
            <img src="'. $pimage3 .'" alt="'. get_the_Title() .'" /></a>'; };
        if($pimage4){ $output .= '<a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage4 .'">
            <img src="'. $pimage4 .'" alt="'. get_the_Title() .'" /></a>'; };
        if($pimage5){ $output .= '<a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage5 .'">
            <img src="'. $pimage5 .'" alt="'. get_the_Title() .'" /></a>'; };
        if($pimage6){ $output .= '<a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage6 .'">
            <img src="'. $pimage6 .'" alt="'. get_the_Title() .'" /></a>'; };
        if($pimage7){ $output .= '<a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage7 .'">
            <img src="'. $pimage7 .'" alt="'. get_the_Title() .'" /></a>'; }; 
        if($pimage8){ $output .= '<a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage8 .'">
            <img src="'. $pimage8 .'" alt="'. get_the_Title() .'" /></a>'; };
        if($pimage9){ $output .= '<a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage9 .'">
            <img src="'. $pimage9 .'" alt="'. get_the_Title() .'" /></a>'; };       
        if($pimage10){ $output .= '<a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage10 .'">
            <img src="'. $pimage10 .'" alt="'. get_the_Title() .'" /></a>'; }; 
        echo '<div class="lightboximages">'.$output.'</div>';
        }
    //Single
    function sosq_single_portfolio($post_id) {
        $pimage1        = get_post_meta(get_the_ID(), 'sosq_portfolio_big1_image', TRUE);
        $pimage2        = get_post_meta(get_the_ID(), 'sosq_portfolio_big2_image', TRUE);
        $pimage3        = get_post_meta(get_the_ID(), 'sosq_portfolio_big3_image', TRUE);
        $pimage4        = get_post_meta(get_the_ID(), 'sosq_portfolio_big4_image', TRUE);
        $pimage5        = get_post_meta(get_the_ID(), 'sosq_portfolio_big5_image', TRUE);
        $pimage6        = get_post_meta(get_the_ID(), 'sosq_portfolio_big6_image', TRUE);
        $pimage7        = get_post_meta(get_the_ID(), 'sosq_portfolio_big7_image', TRUE);
        $pimage8        = get_post_meta(get_the_ID(), 'sosq_portfolio_big8_image', TRUE);
        $pimage9        = get_post_meta(get_the_ID(), 'sosq_portfolio_big9_image', TRUE);
        $pimage10       = get_post_meta(get_the_ID(), 'sosq_portfolio_big10_image', TRUE);
        $output = '';
        if($pimage1){ $output .= '<li><a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage1 .'">
            <img src="'. $pimage1 .'" alt="'. get_the_Title() .'" /></a></li>'; }; 
        if($pimage2){ $output .= '<li><a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage2 .'">
            <img src="'. $pimage2 .'" alt="'. get_the_Title() .'" /></a></li>'; };
        if($pimage3){ $output .= '<li><a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage3 .'">
            <img src="'. $pimage3 .'" alt="'. get_the_Title() .'" /></a></li>'; };
        if($pimage4){ $output .= '<li><a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage4 .'">
            <img src="'. $pimage4 .'" alt="'. get_the_Title() .'" /></a></li>'; };
        if($pimage5){ $output .= '<li><a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage5 .'">
            <img src="'. $pimage5 .'" alt="'. get_the_Title() .'" /></a></li>'; };
        if($pimage6){ $output .= '<li><a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage6 .'">
            <img src="'. $pimage6 .'" alt="'. get_the_Title() .'" /></a></li>'; };
        if($pimage7){ $output .= '<li><a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage7 .'">
            <img src="'. $pimage7 .'" alt="'. get_the_Title() .'" /></a></li>'; };
        if($pimage8){ $output .= '<li><a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage8 .'">
            <img src="'. $pimage8 .'" alt="'. get_the_Title() .'" /></a></li>'; };
        if($pimage9){ $output .= '<li><a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage9 .'">
            <img src="'. $pimage9 .'" alt="'. get_the_Title() .'" /></a></li>'; };
        if($pimage10){ $output .= '<li><a rel="prettyPhoto['.get_the_ID().']" href="'. $pimage10 .'">
            <img src="'. $pimage10 .'" alt="'. get_the_Title() .'" /></a></li>'; }; 
        echo $output;
        }
    function sosq_single_embed($post_id) {
        $pembed         = get_post_meta(get_the_ID(), 'sosq_portfolio_embed_code', TRUE);
        $output = '';
        $output     .= '<div class="embed-container">'.$pembed.'</div>'; 
        echo $output;
    }
/*  --------------------------------------------------------------
    :: Custom Color
    -------------------------------------------------------------- */
    function sos_predefined_colors() {
        $color_control          = get_option('color_control'); // color control
        $pattern_control        = get_option('pattern_control'); // pattern control 
        $custom_background      = get_option('sosq_main_background_image'); // custom background
        $background_repeat      = get_option('sosq_main_background_repeat'); // custom background repeat
        $background_position    = get_option('sosq_main_background_position'); // custom background position
        $main_titlebg           = get_option('sosq_main_titlebg_image'); // General titles bg
        $position_titlebg       = get_option('sosq_titlebg_background_position'); // General titles bg position
        $repeat_titlebg         = get_option('sosq_titlebg_background_repeat'); // General titles bg repeat
        $sosq_main_pattern      = get_option('sosq_main_pattern'); // main patterns
        $sosuri                 = get_template_directory_uri();
        /* Body */
        $get_body_font = get_option('sosq_body_font_face');
        $get_body_font_size = get_option('sosq_body_font_size');
        $get_body_font_style = get_option('sosq_body_font_style');
        $get_body_font_unit = get_option('sosq_body_font_unit');
        /* h1 */
        $get_h1_font = get_option('sosq_h1_font_face');
        $get_h1_font_size = get_option('sosq_h1_font_size');
        $get_h1_font_style = get_option('sosq_h1_font_style');
        $get_h1_font_unit = get_option('sosq_h1_font_unit');
        /* h2 */
        $get_h2_font = get_option('sosq_h2_font_face');
        $get_h2_font_size = get_option('sosq_h2_font_size');
        $get_h2_font_style = get_option('sosq_h2_font_style');
        $get_h2_font_unit = get_option('sosq_h2_font_unit');
        /* h3 */
        $get_h3_font = get_option('sosq_h3_font_face');
        $get_h3_font_size = get_option('sosq_h3_font_size');
        $get_h3_font_style = get_option('sosq_h3_font_style');
        $get_h3_font_unit = get_option('sosq_h3_font_unit');
        /* h4 */
        $get_h4_font = get_option('sosq_h4_font_face');
        $get_h4_font_size = get_option('sosq_h4_font_size');
        $get_h4_font_style = get_option('sosq_h4_font_style');
        $get_h4_font_unit = get_option('sosq_h4_font_unit');
        /* h5 */
        $get_h5_font = get_option('sosq_h5_font_face');
        $get_h5_font_size = get_option('sosq_h5_font_size');
        $get_h5_font_style = get_option('sosq_h5_font_style');
        $get_h5_font_unit = get_option('sosq_h5_font_unit');
        /* h6 */
        $get_h6_font = get_option('sosq_h6_font_face');
        $get_h6_font_size = get_option('sosq_h6_font_size');
        $get_h6_font_style = get_option('sosq_h6_font_style');
        $get_h6_font_unit = get_option('sosq_h6_font_unit');
        /* Custom title 1 */
        $get_ctitle1_font = get_option('sosq_ctitle1_font_face');
        $get_ctitle1_font_size = get_option('sosq_ctitle1_font_size');
        $get_ctitle1_font_style = get_option('sosq_ctitle1_font_style');
        $get_ctitle1_font_unit = get_option('sosq_ctitle1_font_unit');  
        /* Custom title 2 */
        $get_ctitle2_font = get_option('sosq_ctitle2_font_face');
        $get_ctitle2_font_size = get_option('sosq_ctitle2_font_size');
        $get_ctitle2_font_style = get_option('sosq_ctitle2_font_style');
        $get_ctitle2_font_unit = get_option('sosq_ctitle2_font_unit');
        /* Custom title 3 */
        $get_ctitle3_font = get_option('sosq_ctitle3_font_face');
        $get_ctitle3_font_size = get_option('sosq_ctitle3_font_size');
        $get_ctitle3_font_style = get_option('sosq_ctitle3_font_style');
        $get_ctitle3_font_unit = get_option('sosq_ctitle3_font_unit');
        /* Menu Style */
        $get_gmenu_font = get_option('sosq_gmenu_font_face');
        $get_gmenu_font_size = get_option('sosq_gmenu_font_size');
        $get_gmenu_font_style = get_option('sosq_gmenu_font_style');
        $get_gmenu_font_unit = get_option('sosq_gmenu_font_unit');  
        /* Footer background */
        $get_footer_image = get_option('sosq_main_footer_image');
        $get_footer_position = get_option('sosq_footer_background_position');
        $get_footer_repeat = get_option('sosq_footer_background_repeat');
        echo '<style type="text/css">';
        if($color_control == 'true') {
            $pred_color = get_option('qmain_site_color');
            $acolor     = get_option('qmain_site_link_color');
            $ahovercolor    = get_option('qmain_site_link_hover_color');
            $bodycolor      = get_option('qmain_body_site_color');
            $headingcolor   = get_option('qmain_site_h123456_color'); //h1,2,3,4,5,6 color
            $footerbgcolor  = get_option('qmain_footer_bg_color'); // footer bg
            $footerbottombg = get_option('qmain_footer_bottom_bg_color'); //footer bottom bg color
            $footertextcolor = get_option('qmain_footer_site_color'); // footer text color
            $footerbottomtextcolor = get_option('qmain_footer_bottom_color'); // footer bottom text color
            $footerlinkcolor = get_option('qmain_footer_link_color'); // footer link color
            $footerlinkhovercolor = get_option('qmain_footer_link_hover_color'); // footer link hover color
            $widgettitlescolor = get_option('qmain_footer_widget_title_color'); // footer widget title color
        } else {
            $ou = '';   
            $pcolor = get_option('sosq_main_skin');
            $diaz = "#";
            $ou .= $diaz;
            $ou .= $pcolor;
            $pred_color =  $ou ;
            $acolor     = "#000";
            $ahovercolor    = $pred_color;
            $bodycolor      = "#7D7D7D";
            $headingcolor   = "#000";
            $footerbgcolor  = "#000";
            $footerbottombg = "#0D0D0D";
            $footertextcolor = "#b4b4b4";
            $footerbottomtextcolor = "#7d7d7d";
            $footerlinkcolor = "#fff";
            $footerlinkhovercolor = $pred_color;
            $widgettitlescolor = "#fff";
            }  
        if ($pattern_control == 'true' && $background_position != 'stretch') {
            echo 'body { background-image:url('.$custom_background.'); background-repeat:'.$background_repeat.'; background-position:'.$background_position.';}';   
        }
        if ($pattern_control != 'true') {
            echo 'body { background-image:url('.$sosuri.'/images/prepattern/'.$sosq_main_pattern.'.png); background-repeat:repeat; background-position:center center;}';    
        }
        echo '
        /*Body*/
        body { color: '.$bodycolor.'; font:'.$get_body_font_style.' '.$get_body_font_size.''.$get_body_font_unit.'/22'.$get_body_font_unit.' \''.$get_body_font.'\', sans-serif;}
        /*Typography*/
        h1, h2, h3, h4, h5, h6 , .testimonials-bottom {color: '.$headingcolor.';font-weight: normal; }
        h1 { font:'.$get_h1_font_style.' '.$get_h1_font_size.''.$get_h1_font_unit.' \''.$get_h1_font.'\', sans-serif;}
        h2 { font:'.$get_h2_font_style.' '.$get_h2_font_size.''.$get_h2_font_unit.' \''.$get_h2_font.'\', sans-serif;}
        h3 { font:'.$get_h3_font_style.' '.$get_h3_font_size.''.$get_h3_font_unit.' \''.$get_h3_font.'\', sans-serif;}
        h4 { font:'.$get_h4_font_style.' '.$get_h4_font_size.''.$get_h4_font_unit.' \''.$get_h4_font.'\', sans-serif;}
        h5 { font:'.$get_h5_font_style.' '.$get_h5_font_size.''.$get_h5_font_unit.' \''.$get_h5_font.'\', sans-serif;}
        h6 { font:'.$get_h6_font_style.' '.$get_h6_font_size.''.$get_h6_font_unit.' \''.$get_h6_font.'\', sans-serif;}
        .regular-title, .regular-title a
        { font:'.$get_ctitle3_font_style.' '.$get_ctitle3_font_size.''.$get_ctitle3_font_unit.'/20px \''.$get_ctitle3_font.'\', sans-serif; }
        .second-title, .second-title a, .testimonials-bottom, .icon-title, .icon-title a , h2.icontitle , h2.icontitle a
        { font:'.$get_ctitle2_font_style.' '.$get_ctitle2_font_size.''.$get_ctitle3_font_unit.'/20px \''.$get_ctitle2_font.'\', sans-serif; }
        .regular-size {font:'.$get_ctitle1_font_style.' '.$get_ctitle1_font_size.''.$get_ctitle1_font_unit.'/30px \''.$get_ctitle1_font.'\', sans-serif;}
        ul.custom-menu li a {font:'.$get_gmenu_font_style.' '.$get_gmenu_font_size.''.$get_gmenu_font_unit.'/55px \''.$get_gmenu_font.'\', sans-serif;}
        ul.custom-menu li ul li a, ul.custom-menu li:hover ul li a, ul.custom-menu li.current ul li a, ul.custom-menu li.current-page-ancestor ul li a,
        ul.custom-menu li.current-menu-ancestor ul li a, ul.custom-menu li.current-menu-item ul li a
        {font-family:\''.$get_body_font.'\', sans-serif;}
        /*Link Color*/
        a, a:visited { color:'.$acolor.'; }
        a:hover, a:focus { color:'.$ahovercolor.'; }
        /*Main Color*/
        .button:hover, button:hover, input[type="submit"]:hover, input[type="reset"]:hover, input[type="button"]:hover ,
        ul.custom-menu li a:hover , ul.custom-menu li.current a , ul.custom-menu li.current-menu-item a ,
        ul.custom-menu li.current-menu-ancestor a, ul.custom-menu li.current-page-ancestor a, ul.custom-menu li.current_page_parent a ,
        ul.custom-menu li:hover a , #footer-wrapper a:hover , .page-nav li.current , .page_navi li span , .portfolio-filter li a.selected ,
        ul.menu li.current-page-ancestor a, ul.menu li.current_page_parent a , ul.menu li.current_page_item a   {color:'.$pred_color.'; }   
        /*Main Hover border*/
        ul.custom-menu li a:hover , ul.custom-menu li.current a , ul.custom-menu li.current-menu-item a, ul.custom-menu li.current-menu-ancestor a, 
        ul.custom-menu li.current-page-ancestor a, ul.custom-menu li:hover a , ul.custom-menu li.current_page_parent a{
        border-color:'.$pred_color.';}
        /*Main background color*/   
        .caption-title , .caption-title2 , .blog-thumb-image , .blog-item-image ,.recentportfolio li , .portfolio-thumb-image , .lightbox , 
        #slider2 .flex-control-nav a , .left-main-64 , .bbutton.mainbutton{
        background-color:'.$pred_color.';}
        /*Titlebg*/
        .titlebg { background-image: url('.$main_titlebg.'); background-repeat:'.$repeat_titlebg.'; background-position:'.$position_titlebg.';}
        /*Footer*/
        #footer-wrapper { background-color:'.$footerbgcolor.'; color:'.$footertextcolor.'; background-image:url('.$get_footer_image.'); background-repeat:'.$get_footer_repeat.'; background-position:'.$get_footer_position.';}        
        #footer-wrapper a, #footer-wrapper a:visited {color:'.$footerlinkcolor.';}
        #footer-wrapper a:hover {color:'.$footerlinkhovercolor.';}
        #footer-wrapper .regular-title, #footer-wrapper .regular-title a { color: '.$widgettitlescolor.';}
        .footer-bottom  { background:'.$footerbottombg.'; color: '.$footerbottomtextcolor.';}
        </style>
            ';
    }
/*  --------------------------------------------------------------
    :: Sidebar
    -------------------------------------------------------------- */
    register_sidebar(array(
    'name' => __('Sidebar Blog','sosthemes'),
    'id' => 'sosq_blog',
    'before_widget' => '<div class="widget row">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="regular-title row">',
    'after_title' => '</h2>',
    ));
    register_sidebar(array(
    'name' => __('Page','sosthemes'),
    'id' => 'sosq_pages',
    'before_widget' => '<div class="widget row">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="regular-title row">',
    'after_title' => '</h2>',
    ));
    register_sidebar(array(
    'name' => __('Sidebar Footer 1','sosthemes'),
    'id' => 'sosq_footer_1',
    'before_widget' => '<div class="widget row">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="regular-title ">',
    'after_title' => '</h2>',
    ));
    register_sidebar(array(
    'name' => __('Sidebar Footer 2','sosthemes'),
    'id' => 'sosq_footer_2',
    'before_widget' => '<div class="widget row">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="regular-title">',
    'after_title' => '</h2>',
    ));
    register_sidebar(array(
    'name' => __('Sidebar Footer 3','sosthemes'),
    'id' => 'sosq_footer_3',
    'before_widget' => '<div class="widget row">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="regular-title">',
    'after_title' => '</h2>',
    ));
    register_sidebar(array(
    'name' => __('Sidebar Footer 4','sosthemes'),
    'id' => 'sosq_footer_4',
    'before_widget' => '<div class="widget row">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="regular-title">',
    'after_title' => '</h2>',
    ));
/*  --------------------------------------------------------------
    :: Shortcodes
    -------------------------------------------------------------- */
    //Tinymce
    include("inc/shortcodes/tinymce.php"); 
    //Recent post
    include("inc/shortcodes/recent-post.php");     
    //Recent post
    include("inc/shortcodes/recent-portfolio.php");        
    //Columns
    include("inc/shortcodes/columns.php");     
    //Testimonials
    include("inc/shortcodes/testimonials.php");        
    //ServiceBox
    include("inc/shortcodes/servicebox.php");  
    //Announcement
    include("inc/shortcodes/announcement.php");    
    //Accordion
    include("inc/shortcodes/accordion.php");       
    //Team
    include("inc/shortcodes/team.php");                    
    //Slider
    include("inc/shortcodes/slider.php");      
    //Buttons
    include("inc/shortcodes/buttons.php");     
    //Alert
    include("inc/shortcodes/alert.php");
    //Embed
    include("inc/shortcodes/embed.php");   
    //Images
    include("inc/shortcodes/images.php");      
    //Tab
    include("inc/shortcodes/tab.php");     
    //Typography
    include("inc/shortcodes/typography.php");
/*  --------------------------------------------------------------
    :: Comment
    -------------------------------------------------------------- */
function sostheme_comment( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; $myavatar = get_template_directory_uri() . '/images/avatar.jpg';?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div class="comment" id="comment-<?php comment_ID(); ?>">
       <div class="comment-author vcard half-bottom"><?php echo get_avatar( $comment,60); ?>
            <strong><?php comment_author_link(); ?> </strong>
            <i class="minitalic"><?php comment_date(); ?> - <?php comment_time(); ?></i>
           <?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?> 
        </div>
        <?php comment_text() ?>
             <?php if ( $comment->comment_approved == '0' ) : ?>
             <br />
              <em style="text-align:right;"><?php _e( 'Your comment is awaiting moderation.', 'sosthemes' ) ?></em>
      <?php endif; ?>
        <div class="hr"></div>                         
     </div>
<?php
}   
/*  --------------------------------------------------------------
    :: Custom Admin Logo
    -------------------------------------------------------------- */
    if( !function_exists( 'sosq_custom_admin_logo' ) ) {
        function sosq_custom_admin_logo() {
            $custom_admin_logo = get_option('sosq_admin_logo_image');
            if($custom_admin_logo != '' ) {
            echo '<style type="text/css">
                h1 a { background-image:url('.$custom_admin_logo.') !important; }
            </style>';
            }
        }
        add_action('login_head', 'sosq_custom_admin_logo');
    }
/*  --------------------------------------------------------------
    :: Comment Form
    -------------------------------------------------------------- */
    add_filter('comment_form_default_fields', 'sos_remove_url');
    function sos_remove_url($arg) {    
    $commenter = wp_get_current_commenter();
    $arg['author'] = '<p class="input-float">
        <label for="author" class="input-label">'. __('<b>Your name</b> ( * )','sosthemes') .'</label> <input class="comment-form-inputs radius required" name="author" id="author" value="'. $commenter['comment_author'].'"  type="text" />
        </p>';
    $arg['email'] = '<p class="input-float">
        <label for="email" class="input-label">'. __('<b>Email</b> ( * )','sosthemes') .' </label><input class="comment-form-inputs radius required email" name="email" id="email" value="'. $commenter['comment_author_email'].'" type="text" /></p>';
    $arg['url'] = '<p class="input-float omega">
        <label for="url" class="input-label no-margin">'. __('<b>Website</b> ( Optional )','sosthemes') .'</label> <input class="comment-form-inputs radius no-margin" name="url" id="url" value="'. $commenter['comment_author_url'].'" type="text" /></p>';
        return $arg;
        }
/*  --------------------------------------------------------------
    :: Comment Reply
    -------------------------------------------------------------- */   
    function sos_comment_reply() {
        // on single blog post pages with comments open and threaded comments
        if ( is_singular() && comments_open() ) { 
            // enqueue the javascript that performs in-link comment reply fanciness
            wp_enqueue_script( 'comment-reply' ); 
        }
    }
    // Hook into wp_enqueue_scripts
    add_action( 'wp_enqueue_scripts', 'sos_comment_reply' );    
/*  --------------------------------------------------------------
    :: Social icons
    -------------------------------------------------------------- */                       
    function sos_social_icons() {
    $s_facebook     = get_option('sosq_social_facebook');
    $s_twitter      = get_option('sosq_social_twitter');
    $s_youtube      = get_option('sosq_social_youtube');
    $s_forrst       = get_option('sosq_social_forrst');
    $s_dribbble     = get_option('sosq_social_dribbble');
    $s_vimeo        = get_option('sosq_social_vimeo');
    $s_pinterest    = get_option('sosq_social_pinterest');
    $s_flickr       = get_option('sosq_social_flickr');
    $s_linkedin     = get_option('sosq_social_linkedin');
    $s_rss          = get_option('sosq_social_rss'); 
    $s_delicious    = get_option('sosq_social_delicious'); 
    $s_digg         = get_option('sosq_social_digg');
    $s_foursquare   = get_option('sosq_social_foursquare');
    $s_github       = get_option('sosq_social_github');
    $s_googleplus   = get_option('sosq_social_google-plus'); 
    $s_reddit       = get_option('sosq_social_reddit'); 
    $s_stumbleupon  = get_option('sosq_social_stumbleupon');
    $s_yelp         = get_option('sosq_social_yelp');
    $s_zerply       = get_option('sosq_social_zerply');
        if($s_facebook != '') { 
        echo '<span class="social-icon facebook"><a href="'.$s_facebook.'" title="facebook">Facebook</a></span>';
        }
        if($s_twitter != '') { 
        echo '<span class="social-icon twitter"><a href="'.$s_twitter.'" title="twitter">Twitter</a></span>';
        }
        if($s_youtube != '') { 
        echo '<span class="social-icon youtube"><a href="'.$s_youtube.'" title="youtube">YouTube</a></span>';
        }
        if($s_forrst != '') { 
        echo '<span class="social-icon forrst"><a href="'.$s_forrst.'" title="forrst">Forrst</a></span>';
        }
        if($s_dribbble != '') { 
        echo '<span class="social-icon dribbble"><a href="'.$s_dribbble.'" title="dribbble">Dribbble</a></span>';
        }
        if($s_vimeo != '') { 
        echo '<span class="social-icon vimeo"><a href="'.$s_vimeo.'" title="vimeo">Vimeo</a></span>';
        }
        if($s_pinterest != '') { 
        echo '<span class="social-icon pinterest"><a href="'.$s_pinterest.'" title="pinterest">Pinterest</a></span>';
        }
        if($s_flickr != '') { 
        echo '<span class="social-icon flickr"><a href="'.$s_flickr.'" title="flickr">Flickr</a></span>';
        }
        if($s_linkedin != '') { 
        echo '<span class="social-icon linkedin"><a href="'.$s_linkedin.'" title="linkedn">LinkedIn</a></span>';
        }
        if($s_rss != '') { 
        echo '<span class="social-icon rss"><a href="'.$s_rss.'" title="rss">rss</a></span>';
        }
        if($s_delicious != '') { 
        echo '<span class="social-icon delicious"><a href="'.$s_delicious.'" title="delicious">delicious</a></span>';
        }
        if($s_digg != '') { 
        echo '<span class="social-icon digg"><a href="'.$s_digg.'" title="digg">Digg</a></span>';
        }
        if($s_foursquare != '') { 
        echo '<span class="social-icon foursquare"><a href="'.$s_foursquare.'" title="foursquare">Foursquare</a></span>';
        }
        if($s_github != '') { 
        echo '<span class="social-icon github"><a href="'.$s_github.'" title="github">Github</a></span>';
        }
        if($s_googleplus != '') { 
        echo '<span class="social-icon google-plus"><a href="'.$s_googleplus.'" title="google-plus">google-plus</a></span>';
        }
        if($s_reddit != '') { 
        echo '<span class="social-icon reddit"><a href="'.$s_reddit.'" title="reddit">Reddit</a></span>';
        }
        if($s_stumbleupon != '') {  
        echo '<span class="social-icon stumbleupon"><a href="'.$s_stumbleupon.'" title="stumbleupon">Stumbleupon</a></span>';
        }
        if($s_yelp != '') { 
        echo '<span class="social-icon yelp"><a href="'.$s_yelp.'" title="yelp">Yelp</a></span>';
        }
        
        if($s_zerply != '') { 
        echo '<span class="social-icon zerply"><a href="'.$s_zerply.'" title="zerply">Zerply</a></span>';
        }
    }
/*  --------------------------------------------------------------
    :: Thickbox 
    -------------------------------------------------------------- */
    function sos_register_thickbox_scripts() { wp_enqueue_script( 'thickbox' ); }
    add_action( 'admin_print_scripts', 'sos_register_thickbox_scripts' );
    function sos_register_thickbox_styles() { wp_enqueue_style( 'thickbox' ); }
    add_action( 'admin_print_styles', 'sos_register_thickbox_styles' );
?>