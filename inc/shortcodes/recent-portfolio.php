<?php 
    //[recent-portfolio title="" thumb="yes" excerpt="yes" columns="4" number="4" filter="" last="yes"][/recent-portfolio]
    function add_recentportfolio($atts, $content = null) {
        extract(shortcode_atts(array(
            "title" => '',
            "thumb" => '',
            "excerpt" => '',
            "meta" => '',
            "metafull" => '',
            "columns" => '',
            "last" => '',
            "number" => '',
            "filter" => '',
        ), $atts));
        ob_start(); 
    $attr_size = $atts['number']; 
    $list = '';
    $postcount = 0;
    $q = new WP_Query( 
    array( 'orderby' => 'date', 'post_type' => 'portfolio', 'posts_per_page' => $attr_size , 'taxonomy' => 'Filter' , 'term' => $filter) );
    $postcount = 0; 
    while($q->have_posts()) : $q->the_post();
        global $postcount;    $postcount++; 
        global $attr_title; $attr_title = $title;
        global $attr_thumb; $attr_thumb = $thumb;
        global $attr_excerpt; $attr_excerpt = $excerpt;
        global $attr_meta; $attr_meta = $meta;
        global $attr_metafull; $attr_metafull = $metafull;
        global $attr_columns;$attr_columns = $columns;
        global $columns_last; $columns_last = $last;
        global $attr_size;  $attr_size = $number;
            $list .= get_template_part( 'inc/postformat/mini/portfolio' );
    endwhile; wp_reset_query();
    $postcount = 0; 
    $list = ob_get_contents();
    ob_end_clean();
    return $list ;  }
	
    add_shortcode('recent-portfolio', 'add_recentportfolio');
	
?>