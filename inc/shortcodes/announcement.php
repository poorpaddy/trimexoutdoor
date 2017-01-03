<?php 

    //[announcement title="" link="" buttontext=""][/announcement]
    function add_announcement($atts, $content = null) {
        extract(shortcode_atts(array(
            "icon" => '',
            "title" => '',
            "buttontext" => '',
            "link" => ''
        ), $atts));
    return '<!-- ANNOUNCEMENT -->
            <div class="announcement">
                <div class="container del-margin">
                    <div class="columns nine">
                        <h1 class="regular-size">'.$title.'</h1><h6 class="subheader">'.do_shortcode($content).'</h6>
                    </div> <div class="columns three omega taling-r"><a href="'.$link.'" class="bbutton mainbutton">'.$buttontext.'</a>
                    </div>
                </div>
            </div>
            <!-- END ANNOUNCEMENT -->';
    }
    add_shortcode('announcement', 'add_announcement');
?>
