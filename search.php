<?php get_header(); 
    global $query_string;
    query_posts( $query_string . '&posts_per_page=-1' );
?>  
            <!-- PAGE TITLE -->
            <div class="titlebg">
                <h1 class="regular-size lh fleft">
                <?php printf( __('Search Results for: &ldquo;%s&rdquo;', 'sosthemes'), get_search_query()); ?>
                 </h1>
                <ul class="breadcrumbs">
                <?php kriesi_breadcrumb(); ?>
                </ul>
                <div class="clear"></div>
            </div>
            <!-- END PAGE TITLE -->  
            <!-- PAGE CONTENT -->
            <div class="container page">
                <div class="columns eight row">
                <h2 class="regular-size row"><?php _e('Search results in Post','sosthemes')?></h2>
                <!--Begin .search-posts -->
                <div class="search-posts row">
                    <ul>
                        <?php $i = 0; while( have_posts() ) : the_post();  if( $post->post_type == 'post' ) {
                                    $i++;
                                    printf('<li><span class="dropcaps-sp">%4$s.</span><a href="%1$s">%2$s</a><p>%3$s</p></li>', get_permalink(), get_the_title(), get_the_excerpt(),$i); 
                                }
                            endwhile;
                            if( $i == 0 ) { printf('<li>%s</li>', __('No result matching your search were found.', 'sosthemes')); }
                        ?>
                    </ul>
                </div>
                <!--Begin .search-posts -->  
                <div class="seperator del-margin"></div>
                 <h2 class="regular-size row"><?php _e('Search results in Portfolio','sosthemes')?></h2>
                <!--Begin .search-posts -->
                <div class="search-posts">
                    <ul>
                        <?php rewind_posts(); $i = 0; while( have_posts() ) : the_post();  if( $post->post_type == 'portfolio' ) {
                                        $i++;
                                    printf('<li><span class="dropcaps-sp">%4$s.</span><a href="%1$s">%2$s</a><p>%3$s</p></li>', get_permalink(), get_the_title(), get_the_excerpt(),$i); 
                                }
                            endwhile;
                            if( $i == 0 ) { printf('<li>%s</li>', __('No result matching your search were found.', 'sosthemes')); }
                        ?>
                    </ul>
                </div>
                <!--Begin .search-posts -->          
                </div>
                <!-- END PAGE CONTENT -->
                <!-- SIDEBAR -->
                <div class="columns four omega row">
                    <div class="sidebar">
                    <?php generated_dynamic_sidebar(); ?> 
                    </div><!-- End .sidebar -->
                </div><!-- End .columns .four .omega .row -->
            </div> <!-- End .container -->
            <div class="clear"></div>
<?php get_footer(); ?>