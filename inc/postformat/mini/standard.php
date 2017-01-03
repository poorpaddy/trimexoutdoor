                <?php $thumburl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                      global $attr_title; global $attr_thumb; global $attr_excerpt; global $attr_meta; global $attr_metafull; global $attr_columns; global $attr_size; global $postcount; global $columns_last;
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
                        else { $custom_columns = "three";}
                        $last1 = '';
                        $last_item = '';
                        // To or not to add .Last class after last item.
                        if($postcount % $attr_size == 0)  { $last1 = "last"; }
                        if( $last1 == $columns_last ) { $last_item = "omega"; }
                 ?>
                 <!-- BLOG BOX 1 ( POSTFORMAT: STANDART )-->
                <div class="columns <?php echo $custom_columns;?> <?php echo $last_item; ?> <?php echo $attr_size; ?> <?php echo $attr_columns; ?>">
                    <div class="blog-home">
                        <?php /* If attribute is set to thumb="no" , it will not be visible. */ if ($attr_thumb == "no") { ?>
                            <?php } else { ?>
                             <?php if(has_post_thumbnail()){ ?>
                            <div class="blog-thumb-image half-bottom">
                                <a href="<?php echo $thumburl ?>" rel="prettyPhoto" title="<?php the_title(); ?>">
                                <?php the_post_thumbnail('blog-thumb'); ?>
                                </a>
                            </div>
                            <?php } ?>
                        <?php } ?>
                        <?php /* If title="no" , it will not be visible. */ if ($attr_title == "no") { ?>
                            <?php } else { ?>
                            <h3 class="second-title"><a href="<?php the_permalink(); ?>" class="second-title" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                        <?php } ?>
                        <?php /* If excerpt="no" , it will not be visible. */ if ($attr_excerpt == "no") { ?>
                        <?php } else { ?>
                        <p class="summary half-bottom">
                        <?php
                              $excerpt = get_the_excerpt();
                              echo string_limit_words($excerpt,15);
                            ?></p>
                        <?php } ?>
                        <?php /* If meta="no" , it will not be visible. */ if ($attr_meta == "no") { ?>
                        <?php } else { ?>   
                        <p class="minitalic">In
                                <?php the_category(', ') ?>
                                <span class="bsep">//</span> 
                                <?php the_time('Y.m.d') ?> 
                                    <?php /* The rest will not be visible unless metafull="yes". */ if($attr_metafull == 'yes') { ?>
                                            <span class="bsep">//</span> 
                                            <?php the_tags('',' , '); ?>
                                            <span class="bsep">//</span> 
                                            <?php comments_popup_link(  __( 'No Comments', 'sosthemes' ), __( '1 Comment', 'sosthemes' ), __( '% Comments', 'sosthemes' ));?>
                                    <?php } ?>
                            </p>
                        <?php } ?>
                    </div>
                </div>
                <!-- END BLOG BOX 1 ( POSTFORMAT: STANDART )-->
