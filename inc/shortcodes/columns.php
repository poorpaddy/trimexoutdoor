<?php 
    //[container][/container]
    function add_container($atts, $content = null) {
        extract(shortcode_atts(array(
            "row" => ''
        ), $atts));
        $row_name = '';
        if($row == 'yes'){ $row_name = 'row';} 
    return '<div class="container '.$row_name.'">'.do_shortcode($content).'<div class="clear"></div></div>';
    }
    add_shortcode('container', 'add_container');
    //[columns][/columns]
    function add_columns($atts, $content = null) {
        extract(shortcode_atts(array(
            "type" => '',
            "last" => '',
            "row" => '',
        ), $atts));
        $last_name = '';
        $row_name = '';
        if($last == 'yes'){ $last_name = 'omega';}
        if($row == 'yes'){ $row_name = 'row';}
    return '<div class="columns '.$type.' '.$last.' '.$last_name.' '.$row_name.'">'.do_shortcode($content).'</div>';
    }
    add_shortcode('columns', 'add_columns');
    //[box][/box]
    function add_box($atts, $content = null) {
            extract(shortcode_atts(array(
            "title" => ''
        ), $atts));
    return '<div class="c-box"><h1 class="regular-title row">'.$title.'</h1>'.do_shortcode($content).'</div>';
    }
    add_shortcode('box', 'add_box');
	//[fontawesome icon=""][/fontawesome]
    function add_fontawesome($atts, $content = null) {
            extract(shortcode_atts(array(
            "type" => '',
			"size" => 'normal'
        ), $atts));
		if($content == '' ) { $padclass = ""; } else { $padclass = "plefticon"; }
    return '<i class="icon-'.$type.'  icon-'.$size.'"></i><span class="'.$padclass.'">'.do_shortcode($content).'</span>';
    }
    add_shortcode('icon', 'add_fontawesome');
	 //[clear][/clear]
    function add_clear($atts, $content = null) {
            extract(shortcode_atts(array(
            "title" => ''
        ), $atts));
    return '<div class="clear">'.do_shortcode($content).'</div>';
    }
    add_shortcode('clear', 'add_clear');
    //Clear Tags
    add_filter('the_content', 'shortcode_empty_paragraph_fix');
    function shortcode_empty_paragraph_fix($content)
    {   
        $array = array (
            '<p>[' => '[', 
            ']</p>' => ']', 
            ']<br />' => ']'
        );
        $content = strtr($content, $array);
        return $content;
    }
    add_filter('widget_text', 'do_shortcode'); /*:: shortcode support*/
?>