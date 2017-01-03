<?php get_header(); ?>
<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
$stterm = $term->name;?>
            <!-- PAGE TITLE -->
            <div class="titlebg">
                <h1 class="regular-size lh fleft">
                <?php echo $term->name; ?>
                </h1>
                <ul class="breadcrumbs">
                <?php kriesi_breadcrumb(); ?>
                </ul>
                <div class="clear"></div>
            </div>
            <!-- END PAGE TITLE -->
           <!-- PORTFOLIO -->
           <div class="container">
                <div class="portfolio-wrapper">
                    <div class="portfolio-container" id="project">
                    <?php $q = new WP_Query( 
                    array( 'orderby' => 'date', 'post_type' => 'portfolio', 'posts_per_page' => 100 , 'taxonomy' => 'Filter' , 'term' => $stterm) );
                    while($q->have_posts()) : $q->the_post(); ?>
                    <?php get_template_part('/inc/loop/portfolio3'); ?>
                    <?php endwhile; wp_reset_query(); ?>
                    </div>
                </div>
           </div>
            <div class="clear"></div>
<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>
