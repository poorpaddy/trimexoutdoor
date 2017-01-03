<?php get_header(); 

$blogstyle = get_option('sosq_blog_type');
$sidebarposition = get_option('sosq_blog_sb_position');

?>
            <!-- PAGE TITLE -->
            <div class="titlebg">
                <h1 class="regular-size lh fleft">
                <?php if (is_home()) { ?>
                    <?php echo get_option('sosq_blog_main_title'); ?>
                <?php } elseif (is_category()) { ?>
                 <?php single_cat_title(); ?> 
                 <?php } elseif (is_author() or is_archive()) { ?>
                 <?php wp_title("",true); ?>
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
            <div class="container homepage">
            <?php if($sidebarposition == 'sidebarleft') { ?>
                <!-- SIDEBAR -->
                <div class="columns four row">
                    <div class="sidebarleft">
                      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("sosq_blog") ) ?>
                    </div><!-- End .sidebar -->
                </div><!-- End .columns .four .omega .row -->
                <?php wp_reset_query(); ?>
            <?php } ?>
                <div class="columns eight row blog-type-<?php echo $blogstyle ?> <?php if($sidebarposition == 'sidebarleft') { ?> <?php echo "omega"; ?> <?php } ?>">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php edit_post_link(__('Edit', 'sosthemes'),'<p class="entry-edit">','</p>'); ?>
                        <?php $format = get_post_format(); get_template_part( 'inc/postformat/'.$format );
                        if($format == '') get_template_part( 'inc/postformat/standard' ); ?>
                        <?php wp_link_pages(); ?>
                        <?php endwhile; ?>
                        <?php if ( function_exists( 'page_navi' ) ) page_navi( 'items=7&prev_label=' . __('Prev', 'sosthemes') . '&next_label=' . __('Next', 'sosthemes') . '&first_label=' . __('First', 'sosthemes') . '&last_label=' . __('Last', 'sosthemes') . '&show_num=1&num_position=after' ); ?>
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
                <?php if($sidebarposition == 'sidebarright') { ?>
                <!-- SIDEBAR -->
                <div class="columns four omega row">
                    <div class="sidebar">
                      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("sosq_blog") ) ?>
                    </div><!-- End .sidebar -->
                </div><!-- End .columns .four .omega .row -->
               <?php } ?>
            </div> <!-- End .container -->
            <div class="clear"></div>
             <div class="navigation" style="display:none;">
            <p>
                <span class="ppost"><?php previous_post_link('%link', __('&larr; Previous Post', 'sosthemes')); ?></span>
                <span class="npost"><?php next_post_link('%link', __('Next Post &rarr;', 'sosthemes')); ?></span>
            </p>
           <div class="clear"></div></div>
         
<?php get_footer(); ?>