                    <?php $blog_embed = get_post_meta(get_the_ID(), 'blog_embed_code', TRUE);
                      global $attr_title; global $attr_thumb; global $attr_excerpt; global $attr_meta; global $attr_columns; global $attr_size; global $postcount; global $columns_last; global $attr_metafull;
                      /*Post Columns*/
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
                        /*Post Count Last*/
                        $last1 = '';
                        $last_item = '';
                        if($postcount % $attr_size == 0)  { $last1 = "last"; }
                        if( $last1 == $columns_last ) { $last_item = "omega"; }
                 ?>
                <!-- BLOG BOX 4 ( POSTFORMAT: VIDEO )-->
                <div class="columns <?php echo $custom_columns;?> <?php echo $last_item; ?> <?php echo $postcount ?>">
                    <div class="blog-home">
                        <?php /* If thumb = no, will not be displayed. */ if ($attr_thumb == "no") { ?>
                            <?php } else { ?>                   
                        <div class="embed-container half-bottom">
                            <?php echo $blog_embed ?>
                        </div>
                        <?php } ?>
                        
                        <?php /* If title = no, will not be displayed. */ if ($attr_title == "no") { ?>
                            <?php } else { ?>
                            <h3 class="second-title"><a href="<?php the_permalink(); ?>" class="second-title" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                        <?php } ?>
                        <?php /* If excerpt = no, will not be displayed. */ if ($attr_excerpt == "no") { ?>
                        <?php } else { ?>
                        <p class="summary half-bottom">
                        <?php /* Excerpt limit */
                              $excerpt = get_the_excerpt();
                              echo string_limit_words($excerpt,15);
                            ?></p>
                        <?php } ?>
                        <?php /* If meta = no, will not be displayed. */ if ($attr_meta == "no") { ?>
                        <?php } else { ?>   
                         <p class="minitalic">In
                                <?php the_category(', ') ?>
                                <span class="bsep">//</span> 
                                <?php the_time('Y.m.d') ?> 
                                    <?php if($attr_metafull == 'yes') { ?>
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