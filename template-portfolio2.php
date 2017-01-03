<?php get_header(); 
// Template Name: Portfolio 2 Columns
        $taxonomy = 'Filter';   
        $tax_terms = get_terms($taxonomy);
        $showpagenavi = get_option('sosq_portfolio_pagenavi');
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
                <div class="columns twelve row">
                    <div id="options">
                        <ul class="portfolio-filter option-set" data-option-key="filter">
                            <li><span class="alpha"><?php _e('Filter by','sosthemes') ?> :
                                </span>
                            </li>
                            <li><a href="#filter" data-option-value="*" class="selected radius"><?php _e('All','sosthemes') ?></a></li>
                                <?php foreach ($tax_terms as $tax_term) 
                                        {
                                        echo '<li><a href="#filter" data-option-value=".filter-'.$tax_term->term_id.'" class="radius">' . $tax_term->name.'</a></li>';
                                    }
                                ?>
                            <div class="clear"></div>
                        </ul>
                    </div>
                </div>
                <!-- END PORTFOLIO FILTER -->
                <div class="seperator del-margin"></div>
                <!-- PORTFOLIO -->
                <div class="portfolio-wrapper">
                    <div class="portfolio-container" id="project">
                    <?php $itemnumber = get_option('sosq_portfolio_maxitemfp'); global $wp_query; query_posts( array('post_type' => array( 'portfolio' ),'showposts' => $itemnumber, 'paged'=>$paged ));
                        while (have_posts()) : the_post();?>
                        <?php get_template_part('/inc/loop/portfolio2'); ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <?php if($showpagenavi == 'true') { ?> <?php } else { ?>
            <div class="seperator"></div>
            <div class="container row">
            <?php if ( function_exists( 'page_navi' ) ) page_navi( 'items=7&prev_label=' . __('Prev', 'sosthemes') . '&next_label=' . __('Next', 'sosthemes') . '&first_label=' . __('First', 'sosthemes') . '&last_label=' . __('Last', 'sosthemes') . '&show_num=1&num_position=after' ); ?>
            </div>
            <div class="clear"></div>
            <?php } ?>
<?php get_footer(); ?>