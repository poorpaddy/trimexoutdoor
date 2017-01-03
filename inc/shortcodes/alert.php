<?php       //[alert color=""][/alert]
    function add_alerts($atts, $content = null) {
        extract(shortcode_atts(array(
            "color" => ''
        ), $atts));
    return '<div class="b_'.$color.'">'.do_shortcode($content).'
       <span class="closebox">X</span></div>';
    }
    add_shortcode('alert', 'add_alerts'); ?>