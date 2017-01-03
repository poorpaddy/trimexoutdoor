<?php 
    //[embed][/embed]
    function add_embed($atts, $content = null) {
        extract(shortcode_atts(array(
            "row" => ''
        ), $atts));
        if($row == 'yes') {$rowyes = 'row';} else {}
    return '<div class="embed-container line-zero '.$rowyes.'">
'.do_shortcode($content).'
     </div>';
    }
    add_shortcode('embeds', 'add_embed');
?>
