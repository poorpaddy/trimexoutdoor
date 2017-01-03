<?php
    // Gallery
    $gallery_big_image1 = get_post_meta(get_the_ID(), 'gallery_big1_image', TRUE);
    $gallery_big_image2 = get_post_meta(get_the_ID(), 'gallery_big2_image', TRUE);
    $gallery_big_image3 = get_post_meta(get_the_ID(), 'gallery_big3_image', TRUE);
    $gallery_big_image4 = get_post_meta(get_the_ID(), 'gallery_big4_image', TRUE);
    $gallery_big_image5 = get_post_meta(get_the_ID(), 'gallery_big5_image', TRUE);
    // Gallery Height 
    $newheight          = get_post_meta(get_the_ID(), 'gallery_img_height', TRUE);
    // Gallery Timthumb
    $gallery_timthumb   = get_post_meta(get_the_ID(), 'true_timthumb', TRUE);
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
<!-- BLOG BOX 3 ( POSTFORMAT: GALLERY )-->
                   <div class="columns <?php echo $custom_columns;?> <?php echo $last_item; ?> <?php echo $postcount ?>">
                    <div class="blog-home">
                        <?php /* If thumb = no, will not be visible. */ if ($attr_thumb == "no") { ?>
                            <?php } else { ?>                   
                        <div class="blog-thumb-slide half-bottom posrel">
                            <div class="flexslider sliderblog loading">
                                <ul class="slides">
                                            <?php if ($gallery_timthumb == 'true') { ?>
                                            <li>
                                                <a href="<?php echo $gallery_big_image1 ?>" rel="prettyPhoto[largeGallery<?php the_ID(); ?>]" title="<?php the_Title(); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/inc/postformat/timthumb.php?src=<?php echo $gallery_big_image1 ?>&h=<?php echo $newheight ?>&w=610&zc=1" alt="<?php the_Title(); ?>"/>
                                                </a>
                                            </li>
                                        <?php if ($gallery_big_image2 != '') { ?>   
                                            <li>
                                                <a href="<?php echo $gallery_big_image2 ?>" rel="prettyPhoto[largeGallery<?php the_ID(); ?>]" title="<?php the_Title(); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/inc/postformat/timthumb.php?src=<?php echo $gallery_big_image2 ?>&h=<?php echo $newheight ?>&w=610&zc=1" alt="<?php the_Title(); ?>"/>
                                                </a>
                                            </li>
                                        <?php } /*img2 */?>
                                        
                                        <?php if ($gallery_big_image3 != '') { ?>   
                                            <li>
                                                <a href="<?php echo $gallery_big_image3 ?>" rel="prettyPhoto[largeGallery<?php the_ID(); ?>]" title="<?php the_Title(); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/inc/postformat/timthumb.php?src=<?php echo $gallery_big_image3 ?>&h=<?php echo $newheight ?>&w=610&zc=1" alt="<?php the_Title(); ?>"/>
                                                </a>
                                            </li>
                                        <?php } /*img3 */?>     

                                        <?php if ($gallery_big_image4 != '') { ?>   
                                            <li>
                                                <a href="<?php echo $gallery_big_image4 ?>" rel="prettyPhoto[largeGallery<?php the_ID(); ?>]" title="<?php the_Title(); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/inc/postformat/timthumb.php?src=<?php echo $gallery_big_image4 ?>&h=<?php echo $newheight ?>&w=610&zc=1" alt="<?php the_Title(); ?>"/>
                                                </a>
                                            </li>
                                        <?php } /*img4 */?> 
                                        
                                        <?php if ($gallery_big_image5 != '') { ?>   
                                            <li>
                                                <a href="<?php echo $gallery_big_image5 ?>" rel="prettyPhoto[largeGallery<?php the_ID(); ?>]" title="<?php the_Title(); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/inc/postformat/timthumb.php?src=<?php echo $gallery_big_image5 ?>&h=<?php echo $newheight ?>&w=610&zc=1" alt="<?php the_Title(); ?>"/>
                                                </a>
                                            </li>
                                        <?php } /*img5 */?>                                      
                                    <?php } else { ?> 
                                            <li><a href="<?php echo $gallery_big_image1 ?>" rel="prettyPhoto[largeGallery<?php the_ID(); ?>]" title="<?php the_Title(); ?>">
                                            <img src="<?php echo $gallery_big_image1 ?>"/></a></li>
                                        <?php if ($gallery_big_image2 != '') { ?>   
                                            <li><a href="<?php echo $gallery_big_image2 ?>" rel="prettyPhoto[largeGallery<?php the_ID(); ?>]" title="<?php the_Title(); ?>">
                                            <img src="<?php echo $gallery_big_image2 ?>"/></a></li><?php } /*img2 */?>
                                        <?php if ($gallery_big_image3 != '') { ?>   
                                            <li><a href="<?php echo $gallery_big_image3 ?>" rel="prettyPhoto[largeGallery<?php the_ID(); ?>]" title="<?php the_Title(); ?>">
                                            <img src="<?php echo $gallery_big_image3 ?>"/></a></li><?php } /*img3 */?>
                                        <?php if ($gallery_big_image4 != '') { ?>   
                                            <li><a href="<?php echo $gallery_big_image5 ?>" rel="prettyPhoto[largeGallery<?php the_ID(); ?>]" title="<?php the_Title(); ?>">
                                            <img src="<?php echo $gallery_big_image4 ?>"/></a></li><?php } /*img4 */?>
                                        <?php if ($gallery_big_image5 != '') { ?>   
                                            <li><a href="<?php echo $gallery_big_image5 ?>" rel="prettyPhoto[largeGallery<?php the_ID(); ?>]" title="<?php the_Title(); ?>">
                                            <img src="<?php echo $gallery_big_image5 ?>"/></a></li><?php } /*img5 */?>
                                    <?php } ?>                                </ul>
                            </div>
                        </div>
                        <?php } ?>
                       <?php /* If title = no, will not be visible. */ if ($attr_title == "no") { ?>
                            <?php } else { ?>
                            <h3 class="second-title"><a href="<?php the_permalink(); ?>" class="second-title" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                        <?php } ?>
                        <?php /* If excerpt = no, will not be visible. */ if ($attr_excerpt == "no") { ?>
                        <?php } else { ?>
                        <p class="summary half-bottom">
                        <?php if ( is_singular() ) { ?>
                        <?php  } else { ?>
                        <?php global $more; $more = 0; ?>
                        <?php } ?>
                        <?php
                              $excerpt = get_the_excerpt();
                              echo string_limit_words($excerpt,15);
                            ?></p>
                        <?php } ?>
                        <?php /* If meta = no, will not be visible. */ if ($attr_meta == "no") { ?>
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
                <!-- END BLOG BOX 1 ( POSTFORMAT: GALLERY )-->