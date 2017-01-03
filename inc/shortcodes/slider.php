<?php 
    //[slider][/slider]
    function add_slider($atts, $content = null) {
    return '<div class="posrel">
                <div class="flexslider sliderblog loading">
                        <ul class="slides">
                            '.do_shortcode($content).'
                        </ul>
                </div>
            </div>
                ';
    }
    add_shortcode('slider', 'add_slider');
    //[slide][/slide]
    function add_slidercontent($atts, $content = null) {
    return '<li>'.do_shortcode($content).'</li>';
    }
    add_shortcode('slide', 'add_slidercontent');
?>
