<?php 
    // [tabs titles="title,title,title"][tab] 1 [/tab][tab] 2 [/tab][tab] 3 [/tab][/tabs]
    function sos_tabs($atts, $content = null) {
    extract(shortcode_atts(array(
        "titles" => '',
    ), $atts));
    $sosTabs=explode(',',$titles);
    $output ='<div class="clear"></div><div class="wrap"><ul class="tabs">';
    foreach($sosTabs as $title){
        $output.='<li><a href="#">'.$title.'</a></li>';
    }
    $output.='</ul><div style="clear:both;"></div>'.do_shortcode($content).'</div>';
    return $output;
    }
    add_shortcode('tabs', 'sos_tabs');
    function sos_tab($atts, $content = null) {
        return '<div class="pane">'.do_shortcode($content).'</div>';
    }
    add_shortcode('tab', 'sos_tab');
?>
