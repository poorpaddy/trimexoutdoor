<?php 
    //[servicebox][/servicebox]
    function add_servicebox($atts, $content = null) {
        extract(shortcode_atts(array(
            "icon" => '',
            "title" => '',
            "row" => '',
        ), $atts));
    return '<div class="row"><div class="left-main-64 round"><i class="icon-'.$icon.'"></i></div>
    <h2 class="icontitle">'.$title.'</h2><span class="iconsubtitle">'.do_shortcode($content).'</span></div>';
    }
    add_shortcode('servicebox', 'add_servicebox');
    //[servicebox2 img="" title="" moretext="" link="" showmore="yes-no"][/servicebox2]
    function add_servicebox2($atts, $content = null) {
        extract(shortcode_atts(array(
            "img" => '',
            "title" => '',
            "moretext" => '',
            "showmore" => '',
            "link" => '',
            "align" => '',
            "bottom" => '',
        ), $atts));
        $wspace = '';
        if($bottom == 'half-bottom') { $wspace = 'half-bottom'; } else { $wspace = 'add-bottom'; }
        if($showmore == 'no') {} else { $showm = '<p class="remove-bottom"><a href="'.$link.'">'.$moretext.'</a></p>';}
        //Align
        if($align == "center") { $talign = 'taling-c'; }
        else if($align == "left") { $talign = 'taling-l'; }
        else if($align == "center") { $talign = 'taling-r'; }
        else  { $talign = 'taling-c'; }
    return '<div class="'.$talign.'">
                <div class="service-icon">
                    <img class="scale-with-grid '.$wspace.'" src="'.$img.'">
                </div><div class="service-text">
                 <h2 class="second-title">'.$title.'</h2>
                 <div class="half-bottom serviceboxp">'.do_shortcode($content).'</div>
                        '.$showm.'
                 </div></div>';
    }
    add_shortcode('servicebox2', 'add_servicebox2');
?>