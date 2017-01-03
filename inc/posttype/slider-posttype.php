<?php
/*  --------------------------------------------------------------
    :: Slider Posttype
    -------------------------------------------------------------- */
function sosq_register_slider() {
    $labels = array( 
        'name' => 'Slider',
        'singular_name' => __( 'Slider Item',  'sosthemes' ),
        'add_new' =>  __( 'Add new', 'sosthemes' ),
        'add_new_item' => __( 'Add New Slider Item', 'sosthemes' ),
        'edit_item' => __( 'Edit Slider Item', 'sosthemes' ),
        'new_item' => __( 'New Slider  Item', 'sosthemes' ),
        'view_item' => __( 'View Slider Item', 'sosthemes' ),
        'search_items' => __( 'Search Slider', 'sosthemes' ),
        'not_found' => __( 'No Sliders Found', 'sosthemes' ),
        'not_found_in_trash' => __( 'No Sliders In Trash', 'sosthemes' ),
        'parent_item_colon' => 'Parent Slider:',
        'menu_name' => __( 'Slider', 'sosthemes' ),
    );
    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => __('slider','sosthemes'),
        'supports' => array( 'title', 'custom-fields' ),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'menu_icon'       => get_template_directory_uri() . '/inc/shortcodes/tinymce/sos-slider-icon.png'
    );
    register_post_type( 'slider', $args );
}
add_action( 'init', 'sosq_register_slider' );



/*  --------------------------------------------------------------
    :: VideoSlider Posttype
    -------------------------------------------------------------- */
function sosq_register_videoslider() {
    $labels = array( 
        'name' => 'videoSlider',
        'singular_name' => __( 'EmbedSlider Item',  'sosthemes' ),
        'add_new' =>  __( 'Add new', 'sosthemes' ),
        'add_new_item' => __( 'Add New Slider Item', 'sosthemes' ),
        'edit_item' => __( 'Edit Slider Item', 'sosthemes' ),
        'new_item' => __( 'New Slider  Item', 'sosthemes' ),
        'view_item' => __( 'View Slider Item', 'sosthemes' ),
        'search_items' => __( 'Search Slider', 'sosthemes' ),
        'not_found' => __( 'No Sliders Found', 'sosthemes' ),
        'not_found_in_trash' => __( 'No Sliders In Trash', 'sosthemes' ),
        'parent_item_colon' => 'Parent Slider:',
        'menu_name' => __( 'EmbedSlider', 'sosthemes' ),
    );
    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => __('videoslider','sosthemes'),
        'supports' => array( 'title', 'custom-fields' ),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'menu_icon'       => get_template_directory_uri() . '/inc/shortcodes/tinymce/sos-slider-icon.png'
    );
    register_post_type( 'videoslider', $args );
}
add_action( 'init', 'sosq_register_videoslider' );
?>