<?php 
    //[lightbox][/lightbox]
    function add_lightbox($atts, $content = null) {
        extract(shortcode_atts(array(
            "src" => '',
            "alt" => '',
            "gallery" => '',
        ), $atts));
    return '<a class="lightbox" href="'.$src.'" rel="prettyPhoto['.$gallery.']" title="'.$alt.'"><img alt="'.$alt.'" class="scale-with-grid" src="'.do_shortcode($content).'" style="opacity: 1; "></a>';
    }
    add_shortcode('lightbox', 'add_lightbox');
    //[img][/img]
    function add_img($atts, $content = null) {
        extract(shortcode_atts(array(
            "alt" => '',
            "row" => '',
            "link" => ''
        ), $atts));
        $rowname = '';
        if($row == 'yes') { $rowname = "row"; }
        if ($link) { 
        return '<a href="'.$link.'" class="'.$rowname.'"><img alt="'.$alt.'" class="scale-with-grid" src="'.do_shortcode($content).'" style="opacity: 1; "><strong></strong>';
        } else {
    return '<img alt="'.$alt.'" class="scale-with-grid '.$rowname.'" src="'.do_shortcode($content).'" style="opacity: 1; ">';
        }
    }
    add_shortcode('img', 'add_img');
?>
