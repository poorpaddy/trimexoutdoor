<?php get_header(); 
        //Portfolio customfields
        $portfoliotype  = get_post_meta(get_the_ID(), 'sosq_portfolio_type', TRUE); 
        $pdescription   = get_post_meta(get_the_ID(), 'sosq_portfolio_desc', TRUE);
        $pclient        = get_post_meta(get_the_ID(), 'sosq_portfolio_client', TRUE);   
        $pdata          = get_post_meta(get_the_ID(), 'sosq_portfolio_data', TRUE);
        $purl           = get_post_meta(get_the_ID(), 'sosq_portfolio_url', TRUE);  
        $pvtext         = get_post_meta(get_the_ID(), 'sosq_portfolio_view_text', TRUE);
        $ptaxo          = get_post_meta(get_the_ID(), 'sosq_portfolio_taxo', TRUE); 
        $taxonomy = 'Filter';   
        $tax_terms = get_terms($taxonomy);
        global $post_id;
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
            <!-- SINGLE PAGE CONTENT -->            
            <div class="container">
            <?php edit_post_link(__('Edit', 'sosthemes'),'<p class="entry-edit">','</p>'); ?>
                <!-- ITEMS SHORT DESCRIPTION -->
                <div class="columns nine row">
                    <?php echo $pdescription ?>
                </div>
                <!-- END ITEMS SHORT DESCRIPTION -->
                <!-- ITEMS PREV / NEXT BUTTON -->
                <div class="columns three omega row taling-r nplink"><?php previous_post_link('%link', __('&larr; Prev', 'sosthemes')); ?>
                    <?php next_post_link('%link', __('Next &rarr;', 'sosthemes')); ?>
                </div>
                <!-- END ITEMS PREV / NEXT BUTTON -->
                <div class="seperator del-margin"></div>
                <!-- IMAGES ( SLIDE ) -->
                <div class="columns twelve omega row posrel">
                <?php if($portfoliotype == 'Video') { ?>
                <?php echo sosq_single_embed($post_id); ?>
                <?php } else { ?>
                    <div class="flexslider common loading">
                        <ul class="slides">
                        <?php echo sosq_single_portfolio($post_id); ?>
                        </ul>
                    </div>
                <?php } ?>
                </div>
                <!-- END IMAGES ( SLIDE ) -->
                <!-- PORTFOLIO DETAIL -->
                <div class="columns three row">
                    <?php if($pclient != '') { ?>
                        <span><strong><?php _e('Client','sosthemes') ?>
                        </strong>: <?php echo $pclient ?></span><br>
                    <?php } ?>
                    <?php if($pdata != 'no') { ?>
                        <span><strong><?php _e('Date','sosthemes') ?>
                        </strong>: <?php the_time('Y.m.d') ?></span><br>
                    <?php } ?>
                    <?php if($purl != '') { ?>
                        <span><strong><?php _e('Project Url','sosthemes') ?>
                        </strong>:
                        <a target="_blank" href="<?php echo $purl ?>"><?php if($pvtext == '') { ?> <?php _e('View Project','sosthemes') ?> <?php } else { ?><?php echo $pvtext ?> <?php } ?></a></span><br>
                    <?php } ?>
                    <?php if($ptaxo != 'no') { ?>
                        <span><strong><?php _e('Tag','sosthemes') ?></strong>: 
                            <?php echo get_the_term_list($post->ID, 'Filter', '', ' , ', ''); 
                             ?></span><br>
                    <?php } ?>
                </div>
                <!-- END PORTFOLIO DETAIL -->
                <!-- PORTFOLIO DETAIL CONTENT -->
                <div class="columns nine omega">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; endif; ?>
                </div>
                <!-- END PORTFOLIO DETAIL CONTENT -->
            </div>
            <!-- END SINGLE PAGE CONTENT -->
            <div class="seperator"></div>
            <?php global $wp_query; $page_id = $wp_query->get_queried_object_id(); $postcountr =1; ?>   
            <!-- RECENT PORFOLIO -->
            <div class="container">
                <h1 class="regular-title row">Recent Portfolio Items</h1>
                    <?php global $wp_query; query_posts( array('post_type' => array( 'portfolio' ),'showposts' => 5, 'paged'=>$paged ));
                    while (have_posts()) : the_post();?>
                    <?php $id = get_the_ID(); if($page_id == $id) { ?>
                        <?php } else { ?>
                        <?php get_template_part( '/inc/loop/portfolio-recent' ); ?>
                        <?php $postcountr++ ?>
                    <?php } ?>
                    <?php endwhile; ?>
            </div>
<?php get_footer(); ?>