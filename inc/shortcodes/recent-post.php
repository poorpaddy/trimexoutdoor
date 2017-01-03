<?php 
//Excerpt Limit
function string_limit_words($string, $word_limit) {
      $words = explode(' ', $string, ($word_limit + 1));
      if(count($words) > $word_limit)
      array_pop($words);
      return implode(' ', $words);
    }
    //[recent-post][/recent-post]
    function add_recentpost($atts, $content = null) {
        extract(shortcode_atts(array(
            "title" => '',
            "thumb" => '',
            "excerpt" => '',
            "meta" => '',
            "metafull" => '',
            "columns" => '',
            "last" => '',
            "number" => '',
            "cat" => '',
            "size" => ''
        ), $atts));
ob_start(); 
    $list = '';
    if ($cat == '' ) { 
        $custom_cat = 0; 
    } 
        else { 
         $custom_cat = $cat;
        } 
    $postcount = 0;
    $q = new WP_Query( 
    array( 'orderby' => 'date', 'category__and' => $custom_cat, 'posts_per_page' => $number) );
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
            $format = get_post_format();
                if($format == '') 
                    {
                     $list .= get_template_part( 'inc/postformat/mini/standard' );
                    }
                else if($format == 'video') 
                    {
                     $list .= get_template_part( 'inc/postformat/mini/video' );
                    }
                else if($format == 'gallery') 
                    {
                     $list .= get_template_part( 'inc/postformat/mini/gallery' );
                    }
    endwhile; wp_reset_query();
    $postcount = 0; 
    $list = ob_get_contents();
    ob_end_clean();
    return $list ;  }
    add_shortcode('recent-post', 'add_recentpost');
?>