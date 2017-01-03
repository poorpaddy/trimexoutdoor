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

    $dauthor  = get_option('sosq_blog_dauthor');
    $dcomment = get_option('sosq_blog_dcomment');
    $ddate    = get_option('sosq_blog_ddate');
    $dtag     = get_option('sosq_blog_dtag');
    $dcategory  = get_option('sosq_blog_dcategory');
?>
                    <!-- POSTFORMAT SLIDE -->
                    <div class="large-blog-item" id="post-<?php the_ID(); ?>">
                        <div class="blog-item-slider mediumbox line-zero half-bottom posrel">
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
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-item-content">
                            <h2 class="regular-size">
                                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                            </h2> 
                            <p class="minitalic half-bottom">
                            <?php if($dauthor == 'true') { ?>
                                <?php _e('By', 'sosthemes'); ?> <?php the_author_posts_link(); ?>
                                 <span class="bsep">//</span> 
                             <?php } ?>
                             <?php if($dcategory == 'true') { ?>
                                <?php _e('In', 'sosthemes'); ?>
                                <?php the_category(', ') ?>
                                <span class="bsep">//</span> 
                             <?php } ?>
                             <?php if($ddate == 'true') { ?>
                                <?php the_time('Y.m.d') ?>
                                <span class="bsep">//</span>
                            <?php } ?> 
                            <?php if($dtag == 'true') { ?>
                                <?php the_tags('',' , '); ?>
                                <span class="bsep">//</span> 
                            <?php } ?> 
                            <?php if($dcomment == 'true') { ?>
                                <?php comments_popup_link(  __( 'No Comments', 'sosthemes' ), __( '1 Comment', 'sosthemes' ), __( '% Comments', 'sosthemes' ));?>
                                <span class="bsep">//</span> 
                            <?php } ?>
                            <?php if ( !is_singular() ) { ?>
                                <a href="<?php the_permalink(); ?>"><?php _e('Read More','sosthemes') ?></a>
                            <?php } ?>
                            </p>
                           <?php if ( is_singular() ) { ?>
                           <p></p>
                        <?php  } else { ?>
                        <?php global $more; $more = 0; ?>
                        <?php } ?>
                            <?php the_content(''); ?>
                        </div>
                        <div class="seperator del-margin"></div>
                    </div>