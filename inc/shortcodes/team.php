<?php 
    //[team img="" name="" position="" facebook="" twitter="" linkedin="" link=""][/team]
    function add_team($atts, $content = null) {
        extract(shortcode_atts(array(
            "img" => '',
            "name" => '',
            "position" => '',
            "facebook" => '',
            "twitter" => '',
            "linkedin" => '',
            "link" => '',
        ), $atts));
        $duri = get_template_directory_uri();
        if($facebook != '') { $fbcontent = '<a href="'.$facebook.'"><img alt="Facebook" height="21" src="'.$duri.'/images/facebook.jpg" width="21"></a>';}
        if($twitter != '') { $twcontent = '<a href="'.$twitter.'"><img alt="Twitter" height="21" src="'.$duri.'/images/twitter.jpg" width="21"></a>';}
        if($linkedin != '') { $linkedincontent = '<a href="'.$linkedin.'"><img alt="Linkedin" height="21" src="'.$duri.'/images/linkedin.jpg" width="21"></a>';}
    return '<div class="taling-c">
                    <div class="team-thumb half-bottom"><img alt="Team" class="scale-with-grid" src="'.$img.'" width="210">
                    </div>
                    <h4 class="regular-title"><a href="'.$link.'" class="second-title">'.$name.'</a></h4>
                    <p class="minitalic half-bottom">'.$position.'
                    </p>
                    <p>'.do_shortcode($content).'</p>
                    <p class="taling-c">
                    '.$fbcontent .'  
                    '.$twcontent .'    
                    '.$linkedincontent .'
                    </p>
            </div>          
                ';
    }
    add_shortcode('team', 'add_team');
?>