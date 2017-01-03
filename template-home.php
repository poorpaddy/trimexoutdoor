<?php get_header(); 
// Template Name: Home
$hpslide_type           = get_post_meta(get_the_ID(), 'sosq_hpslider_type', TRUE);
?>  
    		<?php if($hpslide_type == 'NoSlider') { ?> 
	            <?php } else { ?>
	            <!-- SLIDER -->
	            <div class="slider-wrapper">
	            <?php if($hpslide_type == 'FlexSlider') { ?> 
	            <?php get_template_part('inc/slider/flexslider'); ?>
	            <?php } else { ?>
	            <?php get_template_part('inc/slider/embedslider'); ?>
	            <?php } ?>
            </div>
            <?php } ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                    <?php edit_post_link(__('Edit', 'sosthemes'),'<p class="entry-edit">','</p>'); ?>
                        <div class="homepage">
                            <?php the_content(); ?>
                        </div>
                        <?php endwhile; ?>
                        <?php else : ?>
                        <div id="post-0" <?php post_class(); ?>> 
                            <div class="not-found"> 
                                <h2 class="error-message">
                                <?php _e('Error 404 - Not Found', 'sosthemes') ?>
                                </h2>
                                <h3 class="regular-size">
                                <?php _e("Sorry, content you are trying to display is not available.", "sosthemes") ?>
                                </h3>
                            </div>
                        </div>  
                    <?php endif; ?>
                    </div>
<?php get_footer(); ?>