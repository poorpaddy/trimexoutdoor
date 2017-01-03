<?php   
        //Portfolio customfields
        $portfoliotype  = get_post_meta(get_the_ID(), 'sosq_portfolio_type', TRUE); 
        $pdescription   = get_post_meta(get_the_ID(), 'sosq_portfolio_desc', TRUE);
        $plightbox      = get_post_meta(get_the_ID(), 'sosq_portfolio_lightbox', TRUE); 
        $terms          = get_the_terms( get_the_ID(), 'Filter' );  
        global $post_id;
?>
    <!-- PORTFOLIO BOX -->
    <li class="element <?php if($terms) : foreach ($terms as $term) { echo 'filter-'.$term->term_id.' '; } endif; ?>">
    <div class="columns six row">
        <div class="portfolio-item">
                <?php if ($plightbox == "No") { ?>
                            <?php  sos_no_lightbox($post_id); ?>
                 <?php } else { ?>
                            <?php if($portfoliotype == 'Image') { sos_pthumb($post_id); sos_portfolio_thumbnail($post_id);} ?>
                            <?php if($portfoliotype == 'Video') { sos_pembedpp($post_id); } ?>
                  <?php } ?>
                <h3 class="second-title"><a href="<?php the_permalink(); ?>" class="second-title" title="<?php the_title(); ?>">
                <?php the_title(); ?></a></h3>
                <p class="summary remove-bottom 0">
                 <?php
                $excerpt = $pdescription;
                echo string_limit_words($excerpt,15);
                ?></p>
        </div>
    </div>
    </li>
    <!-- END PORTFOLIO BOX -->