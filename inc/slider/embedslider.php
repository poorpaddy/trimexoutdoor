<div class="flexslider loading" id="slider2">
    <div class="container">
        <ul class="slides">
            <?php 
            $slideritem = 5;
            global $wp_query;query_posts( array('post_type' => array( 'videoslider' ),'showposts' => $slideritem,'paged'=>$paged ));
            while (have_posts()) : the_post();
            $slide_type         = get_post_meta(get_the_ID(), 'sosq_slider_type', TRUE);
            $slide_embed        = get_post_meta(get_the_ID(), 'sosq_slider_embed', TRUE);
            $slide_title        = get_post_meta(get_the_ID(), 'sosq_slider_embed_title', TRUE);
            $slide_caption      = get_post_meta(get_the_ID(), 'sosq_slider_embed_caption', TRUE);
            ?>
            <li>
                <div class="columns seven">
                    <div class="slider-video-wrapper">
                        <div class="slider-video-container">
                            <div class="embed-container"> <?php echo $slide_embed ?> </div>
                        </div>
                    </div>
                </div>
                <div class="columns five omega">
                    <h3><?php echo $slide_title ?></h3>
                    <?php echo $slide_caption ?> </div>
            </li>
            <?php endwhile; wp_reset_query(); ?>
        </ul>
        <!-- End ul.slides --> 
    </div>
    <!-- .container --> 
</div>
<!-- End #slider1 -->