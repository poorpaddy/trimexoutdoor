<!--Begin .blog-item-->
<div class="blog-item">

<?php
/*  --------------------------------------------------------------
    :: Please do not delete this field
    -------------------------------------------------------------- */
    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly');
    if ( post_password_required() ) { ?>
        <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'sosthemes') ?></p>
    <?php
        return;
    }
/*  --------------------------------------------------------------
    :: Display Comments
    -------------------------------------------------------------- */
        if ( have_comments() ) : ?>
            <h2 class="regular-size row"><?php comments_number( __( 'No Comments', 'sosthemes' ), __( '1 Comment', 'sosthemes' ), __( '% Comments', 'sosthemes' ) );?></h2>
        <?php if ( ! empty($comments_by_type['comment']) ) : ?>
        <ul class="comment-list">
        <?php wp_list_comments('type=comment&callback=sostheme_comment'); ?>
        </ul>
        <!--Begin .post-format-->
        <div class="seperator del-margin"></div>
        <!--End.post-format-->
        <?php endif; ?>
        <div class="navigation">
            <div class="alignleft"><?php previous_comments_link(); ?></div>
            <div class="alignright"><?php next_comments_link(); ?></div>
        </div>
        <?php
/*  --------------------------------------------------------------
    :: This field checks if there any comments and if comments are off
    -------------------------------------------------------------- */       
        if ('closed' == $post->comment_status ) :  ?>
        <p class="nocomments"><?php _e('Comments are closed.', 'sosthemes') ?></p>
        <?php endif; ?>
        <?php else :  ?>
        <?php if ('open' == $post->comment_status) :?>
        <?php else : ?>
        <?php if (is_single()) { ?><p class="nocomments"><?php _e('Comments are closed.', 'sosthemes') ?></p><?php } ?>
        <?php endif; ?>
<?php endif;
/*  --------------------------------------------------------------
    :: Form
    -------------------------------------------------------------- */
 ?>
<?php 
$comments_args = array(
        /*:: Title*/
        'title_reply'=>'
        <!--Begin .post-title-->
        <h2 class="regular-size row">' .__('Leave Comment','sosthemes') .'</h2>
        <!--End .post-title-->
        <div class="clear"></div>
        <div class="sep" style="background-color:#eee !important;"></div>',
        /*:: After Notes*/
        'comment_notes_after' => '',
        /*:: Before Notes*/
        'comment_notes_before' => '',
        /*:: Submit*/
        'label_submit'         => __( 'Submit' , 'sosthemes'),
        /*:: Logged In*/
        'logged_in_as' => '<p>'. sprintf(__('You are logged in as %1$s. %2$sLog out &raquo;%3$s', 'sosthemes'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>', '<a href="'.(function_exists('wp_logout_url') ? wp_logout_url(get_permalink()) : get_option('siteurl').'/wp-login.php?action=logout" title="').'" title="'.__('Log Out', 'sosthemes').'">', '</a>') . '</p>',
        /*:: Comment Field*/
        'comment_field' => '<div class="clear"></div> 
        <label for="comment" class="input-textarea">' . __('<b>Comment</b> ( * )','sosthemes'). '</label>
                <div class="clear"></div>
        <textarea class="comment-form-textarea radius required" name="comment"></textarea>',
);
comment_form($comments_args);
?>
</div>
<!--End .blog-item-->