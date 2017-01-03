<?php 
    //[title][/title]
    function add_title($atts, $content = null) {
    return '<h1 class="regular-title row">'.do_shortcode($content).'</h1>';
    }
    add_shortcode('title', 'add_title');
    //[hr][/hr]
    function add_hr($atts, $content = null) {
        extract(shortcode_atts(array(
            "margin" => 'no'
        ), $atts));
        if($margin == 'no') { $margin1 = 'del-margin';}
    return '<div class="seperator '.$margin1.'"></div>';
    }
    add_shortcode('hr', 'add_hr');  
    //[highlight][/highlight]
    function add_highlight($atts, $content = null) {
        extract(shortcode_atts(array(
            "color" => ''
        ), $atts));
    return '<span class="highlight hl-'.$color.'">'.do_shortcode($content).'</span>';
    }
    add_shortcode('highlight', 'add_highlight');
    //[dropcap][/dropcap]
    function add_dropcap($atts, $content = null) {
    return '<span class="dropcap">'.do_shortcode($content).'</span>';
    }
    add_shortcode('dropcap', 'add_dropcap');        
?>