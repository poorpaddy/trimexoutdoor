    <div class="flexslider loading" id="slider1">
        <ul class="slides">
        <?php 
        $slideritem = get_option('sosq_hp_fslider_itemsize');
        global $wp_query;query_posts( array('post_type' => array( 'slider' ),'showposts' => $slideritem,'paged'=>$paged ));
        while (have_posts()) : the_post();
        $slide_type         = get_post_meta(get_the_ID(), 'sosq_slider_type', TRUE);
        $slide_big_image    = get_post_meta(get_the_ID(), 'sosq_slide_big_image', TRUE);
        $slide_url          = get_post_meta(get_the_ID(), 'sosq_slide_url', TRUE);
        $slide_title        = get_post_meta(get_the_ID(), 'sosq_slide_title', TRUE);
        $slide_caption      = get_post_meta(get_the_ID(), 'sosq_slide_caption', TRUE);
        $slide_timthumb     = get_post_meta(get_the_ID(), 'sosq_slide_timthumb', TRUE);
        $slide_align        = get_post_meta(get_the_ID(), 'sosq_slider_caption_align', TRUE);
        if($slide_align == 'Left'){ $salign = '';} 
        else  {$salign = '2';}
        ?>
         <li>
           <?php if($slide_title != '') { ?>
           <h3 class="caption-title<?php echo $salign ?>"><?php echo $slide_title ?></h3><?php } ?>
           <?php if($slide_caption != '') { ?>
           <h6 class="caption-subtitle<?php echo $salign ?>"><?php echo $slide_caption ?></h6><?php } ?>       
           <?php if($slide_url == '') { ?> 
                    <?php if($slide_timthumb == 'true') { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/inc/postformat/timthumb.php?src=<?php echo $slide_big_image ?>&h=400&w=930&zc=1&q=100" alt="<?php the_Title(); ?>"/>
                    <?php } else { ?>
                   <img alt="<?php the_Title(); ?>" src="<?php echo $slide_big_image ?>" width="930">
                    <?php } ?>
           <?php } else {?>
                   <?php if($slide_timthumb == 'true') { ?>
                   <a href="<?php echo $slide_url ?>"><img src="<?php echo get_template_directory_uri(); ?>/inc/postformat/timthumb.php?src=<?php echo $slide_big_image ?>&h=400&w=930&zc=1&q=100" alt="<?php the_Title(); ?>"/></a>
           <?php } else { ?>
                   <a href="<?php echo $slide_url ?>"><img alt="<?php the_Title(); ?>" src="<?php echo $slide_big_image ?>" width="930"></a>
                   <?php } ?> 
            <?php } ?>
       </li>
       <?php endwhile; wp_reset_query(); ?> 
       </ul> <!-- End ul.slides -->
   </div> <!-- End #slider1 -->