<?php get_header(); 

// Template Name: Portfolio No Filter

?>  
            <!-- PAGE TITLE -->
            <div class="titlebg">
                <h1 class="regular-size lh fleft">
                    <?php the_title(); ?>
                 </h1>
                <ul class="breadcrumbs">
                    <?php kriesi_breadcrumb(); ?>
                </ul>
                <div class="clear"></div>
            </div>
            <!-- END PAGE TITLE -->         
            <!-- PAGE CONTENT -->
            <div class="container">
                <!-- PORTFOLIO FILTER -->
                 <div class="columns nine row">
                    <?php echo get_option('sosq_portfolio_minidesc'); ?>
                </div>
                <div class="columns three omega row taling-r line-zero">
                <?php $playout = get_option('sosq_portfoliomain_layout'); $changer = ""; $changer2 = ""; $changer3 = "";
				if($playout == 'three') {$changer2 = "alayout";} else if($playout == 'four') {$changer = "alayout";} else if ($playout == 'six') {$changer3 = "alayout";}?>
                    <a id="changer2" class="<?php echo $changer2 ?>" href="#"></a>
                    <a id="changer" class="<?php echo $changer ?>" href="#"></a>
                    <a id="changer3" class="<?php echo $changer3 ?>" href=""></a>

                </div>
                <div class="seperator del-margin"></div>
                <!-- PORTFOLIO -->
                <div class="portfolio-wrapper">
                    <div class="portfolio-container" id="porfolionf">
                    <?php $itemnumber = get_option('sosq_portfolio_maxitem'); global $wp_query; query_posts( array('post_type' => array( 'portfolio' ),'showposts' => $itemnumber, 'paged'=>$paged ));
                        while (have_posts()) : the_post();?>
                        <?php get_template_part('/inc/loop/portfolionofilter'); ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="seperator"></div>
            <div class="container row">
            <?php if ( function_exists( 'page_navi' ) ) page_navi( 'items=7&prev_label=' . __('Prev', 'sosthemes') . '&next_label=' . __('Next', 'sosthemes') . '&first_label=' . __('First', 'sosthemes') . '&last_label=' . __('Last', 'sosthemes') . '&show_num=1&num_position=after' ); ?>
           </div>
            <div class="clear"></div>
<?php get_footer(); ?>