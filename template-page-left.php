<?php get_header(); 
// Template Name: Page With Sidebar Left
?>
            <!-- PAGE TITLE -->
            <div class="titlebg">
                <h1 class="regular-size lh fleft">
                <?php if (is_home()) { ?>
                <?php echo get_option('sosq_blog_main_title'); ?>
                <?php } else { ?>
                <?php the_title(); ?>
                <?php } ?></h1>
                <ul class="breadcrumbs">
                <?php kriesi_breadcrumb(); ?>
                </ul>
                <div class="clear"></div>
            </div>
            <!-- END PAGE TITLE -->
            <!-- PAGE CONTENT -->
            <div class="container" id="halfpage">
            <!-- SIDEBAR -->
            <div class="columns four row">
                <div class="sidebarleft">
                <?php generated_dynamic_sidebar(); ?> 
                <?php wp_reset_query(); ?>
                </div><!-- End .sidebar -->
            </div><!-- End .columns .four .omega .row -->
                <div class="columns eight row omega">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php edit_post_link(__('Edit', 'sosthemes'),'<p class="entry-edit">','</p>'); ?>
                        <?php the_content(); ?>
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
                <!-- END PAGE CONTENT -->
            </div> <!-- End .container -->
            <div class="clear"></div>
<?php get_footer(); ?>