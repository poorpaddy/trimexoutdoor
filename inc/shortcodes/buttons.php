<?php 
    //[button color="" link=""][/button]
    function add_button($atts, $content = null) {
        extract(shortcode_atts(array(
            "color" => '',
            "link" => ''
        ), $atts));
        if($color == ''){ $color = 'maincolor';}
    return '<a class="bbutton '.$color.'" href="'.$link.'">'.do_shortcode($content).'</a>';
    }
    add_shortcode('button', 'add_button');
?>