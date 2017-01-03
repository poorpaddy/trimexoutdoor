<?php 
    //[testimonials][/testimonials]
    function add_testimonials($atts, $content = null) {
    return '<div class="shortcode row">
                        <div class="flexslider slidetestimonials loading">
                            <ul class="slides">
                            '.do_shortcode($content).'
                            </ul>
                        </div>
            </div>
        ';
    }
    add_shortcode('testimonials', 'add_testimonials');
    //[tlist][/tlist]
    function add_tlist($atts, $content = null) {
        extract(shortcode_atts(array(
            "name" => ''
        ), $atts));
    return ' <li><p class="testimonials-top remove-bottom">
    '.do_shortcode($content).'
      </p>
      <p class="testimonials-bottom taling-r"><span>by ~
      </span>'.$name.'
      </p>
      </li>';
    }
    add_shortcode('tlist', 'add_tlist');
?>