<?php get_header(); 
// Template Name: Fullwidth
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
                <div class="container fullwith">
                <?php edit_post_link(__('Edit', 'sosthemes'),'<p class="entry-edit">','</p>'); ?>
                    <?php the_content(); ?>
                </div>
                <?php endwhile; ?>
                <div class="container">
			<?php// comments_template('', true); ?>
		</div>
                <?php else : ?>
                <div id="post-0" <?php post_class(); ?>> 
                    <div class="not-found"> 
                        <h2 class="error-message">
                        <?php _e('Error 404 - Not Found', 'sosthemes') ?>
                        </h2>
                        <h3 class="regular-size">
                        <?php _e("Sorry, content you are trying to display is not available.", "sosthemes") ?>
                        </h3>
                    </div>
                </div>  
            <?php endif; ?>
            </div>
<?php get_footer(); ?>