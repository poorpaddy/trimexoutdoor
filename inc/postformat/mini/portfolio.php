<?php   global $attr_title; global $attr_thumb; global $attr_excerpt; global $attr_columns; global $attr_size; global $postcount; global $columns_last; global $attr_size;
      //Calculating column according to Attribute
      if($attr_columns == 4)
        { 
            $custom_columns = "three";
        }
        else if($attr_columns == 3)
        { 
            $custom_columns = "four";
        }
        else if($attr_columns == 2)
        { 
            $custom_columns = "six";
        }
        else if($attr_columns == 1)
        { 
            $custom_columns = "twelve";
        }
        else { $custom_columns = "three";}
        $last1 = '';
        $last_item = '';
        // To or not to add .Last class after last item.
        if($postcount % $attr_size == 0)  { $last1 = "last"; }
        if( $last1 == $columns_last ) { $last_item = "omega"; }
        //Portfolio customfields
        $portfoliotype  = get_post_meta(get_the_ID(), 'sosq_portfolio_type', TRUE); 
        $pdescription   = get_post_meta(get_the_ID(), 'sosq_portfolio_desc', TRUE);
        $plightbox      = get_post_meta(get_the_ID(), 'sosq_portfolio_lightbox', TRUE);     
        global $post_id;
?>
    <!-- PORTFOLIO BOX 1 -->
    <div class="columns <?php echo $last_item; ?> <?php echo $custom_columns;?> row">
        <div class="portfolio-item">
            <?php if ($attr_thumb != "no") { ?>
                <?php if ($plightbox == "No") { ?>
                            <?php  sos_no_lightbox($post_id); ?>
                 <?php } else { ?>
                            <?php if($portfoliotype == 'Image') { sos_pthumb($post_id); sos_portfolio_thumbnail($post_id);} ?>
                            <?php if($portfoliotype == 'Video') { sos_pembedpp($post_id); } ?>
                  <?php } ?>
            <?php } ?>
            <?php if ($attr_title != "no") { ?>
                <h3 class="second-title"><a href="<?php the_permalink(); ?>" class="second-title" title="<?php the_title(); ?>">
                <?php the_title(); ?></a></h3>
            <?php } ?>
            <?php if ($attr_excerpt != "no") { ?>
                <p class="summary remove-bottom 0">
                 <?php
                $excerpt = $pdescription;
                echo string_limit_words($excerpt,15);
                ?></p>
            <?php } ?>
        </div>
    </div>
    <!-- END PORTFOLIO BOX 1 -->