<?php
/*  --------------------------------------------------------------
    :: Portfolio Posttype
    -------------------------------------------------------------- */
function sos_register_portfolio() {
    $labels = array( 
        'name' => 'Portfolio',
        'singular_name' => __( 'Portfolio Item',  'sosthemes' ),
        'add_new' =>  __( 'Add new', 'sosthemes' ),
        'add_new_item' => __( 'Add New Portfolio Item', 'sosthemes' ),
        'edit_item' => __( 'Edit Portfolio Item', 'sosthemes' ),
        'new_item' => __( 'New Portfolio  Item', 'sosthemes' ),
        'view_item' => __( 'View Portfolio Item', 'sosthemes' ),
        'search_items' => __( 'Search Portfolio', 'sosthemes' ),
        'not_found' => __( 'No Portfolios Found', 'sosthemes' ),
        'not_found_in_trash' => __( 'No Portfolios In Trash', 'sosthemes' ),
        'parent_item_colon' => 'Parent Portfolio:',
        'menu_name' => __( 'Portfolio', 'sosthemes' ),
    );
    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'description' => __('Portfolio','sosthemes'),
        'supports' => array('title','editor','custom-fields', 'excerpt'),
        'public' => true,
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
        'menu_icon'       => get_template_directory_uri() . '/inc/shortcodes/tinymce/sos-recent-portfolio.png'
    );
    register_post_type( 'Portfolio', $args );
}
function sos_filter_taxonomies(){
    register_taxonomy( "Filter", array( "portfolio"), array("hierarchical" => true, "label" => __( 'Filter', 'sosthemes' ), "singular_label" => __( 'Filter' , 'sosthemes' ), "rewrite" => array('slug' => 'Filter', 'hierarchical' => true))); 
}
add_action( 'init', 'sos_register_portfolio' );
add_action( 'init', 'sos_filter_taxonomies', 0 );
?>