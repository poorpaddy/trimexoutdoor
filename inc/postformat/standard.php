                   <?php 
                   $dauthor  = get_option('sosq_blog_dauthor');
                   $dcomment = get_option('sosq_blog_dcomment');
                   $ddate    = get_option('sosq_blog_ddate');
                   $dtag     = get_option('sosq_blog_dtag');
                   $dcategory  = get_option('sosq_blog_dcategory');
                   $thumburl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
                    <!-- POSTFORMAT STANDART -->
                    <div class="large-blog-item">
                    <?php if(has_post_thumbnail()){ ?>
                        <div class="blog-item-image mediumbox line-zero half-bottom">
                            <a href="<?php echo $thumburl ?>" rel="prettyPhoto" title="<?php the_title(); ?>">
                            <?php the_post_thumbnail('blog-thumb'); ?></a>
                        </div>
                     <?php } ?>
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