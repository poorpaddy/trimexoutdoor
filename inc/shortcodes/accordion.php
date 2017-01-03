<?php 
    // [accordion][/accordion]
    function sos_accordion($atts, $content = null) {
        return '<div class="accordion">'.do_shortcode($content).'</div>';
    }
    add_shortcode('accordion', 'sos_accordion');
    // [acc][/acc]
    function sos_acc($atts, $content = null) {
        extract(shortcode_atts(array(
            "title" => ''
        ), $atts));
        return '<h2>'.$title.'</h2><div class="pane">'.do_shortcode($content).'</div>';
    }
    add_shortcode('acc', 'sos_acc');
    //[accordionv] [/accordionv]
    function sos_accordionv($atts, $content = null) {
    extract(shortcode_atts(array(
        "titles" => '',
    ), $atts));
    $sosTabs=explode(',',$titles);
    $output ='<div class="accordion-v">
                    <div class="columns three row">';
    foreach($sosTabs as $title){
        $output.='<h2>'.$title.'</h2>';
    }
    $output.=' </div>
                    <div class="columns nine omega row">'.do_shortcode($content).'</div></div>';
    return $output;
    }
    add_shortcode('accordionv', 'sos_accordionv');
    //[accv][/accv]
    function sos_accv($atts, $content = null) {
        extract(shortcode_atts(array(
            "title" => ''
        ), $atts));
        return '<div class="pane">'.do_shortcode($content).'</div>';
    }
    add_shortcode('accv', 'sos_accv');   
?>