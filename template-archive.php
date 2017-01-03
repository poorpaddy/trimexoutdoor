<?php get_header(); 
// Template Name: Archive
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
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                <div class="container archive">
                <?php edit_post_link(__('Edit', 'sosthemes'),'<p class="entry-edit">','</p>'); ?>
                    <?php the_content(); ?>
                </div>
                <?php endwhile; endif; ?>
                <div class="seperator"></div>
                <div class="container archive">
                    <div class="columns four row">
                    <h1 class="regular-title row"><?php _e('Pages Archive','sosthemes') ?></h1>
                        <ul class="archive-list row">
                        <?php wp_list_pages('title_li=' ); ?>
                        </ul>
                    </div>
                    <div class="columns four row">
                    <h1 class="regular-title row"><?php _e('Posts Archive','sosthemes') ?></h1>
                        <ul class="archive-list row">
                        <?php
                        global $wp_query;
                        query_posts( array(
                        'post_type' => array( 'post' ),
                        'show_post' => 20,
                         )); while (have_posts()) : the_post();?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php endwhile; ?>
                        <?php wp_reset_query(); ?>
                        </ul>
                    <h1 class="regular-title row"><?php _e('Categories Archive','sosthemes') ?></h1>
                    <ul class="archive-list row">
                    <?php wp_list_categories( 'title_li=' ); ?>
                    </ul>
                    <h1 class="regular-title row"><?php _e('Monthly Archive','sosthemes') ?></h1>
                        <ul class="archive-list row">
                        <?php wp_get_archives('type=monthly'); ?>
                        </ul>                      
                    </div>
                    <div class="columns four omega row">
                    <h1 class="regular-title row"><?php _e('Portfolio Archive','sosthemes') ?></h1>
                        <ul class="archive-list">
                        <?php
                        global $wp_query;
                        query_posts( array(
                        'post_type' => array( 'portfolio' ),
                        'show_post' => 20,
                        'paged'=>$paged )); while (have_posts()) : the_post();?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php endwhile; ?>
                        <?php wp_reset_query(); ?>
                        </ul>
                    </div>
                </div>
<?php get_footer(); ?>