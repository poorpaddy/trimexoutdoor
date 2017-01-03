<?php get_header(); 
// Template Name: Contact
$maps = get_option('sosq_maps_code');
$contactmail = get_option('sosq_contactmail');
$sidebarcontact = get_option('sosq_contact_sb_position');
//This file is triggered via contact.html. 
//Data sent via form in contact.html are post to this file after being serialize in custom.js.
error_reporting(E_ALL ^ E_NOTICE); // hide all basic notices from PHP
//If the form is submitted
if(isset($_POST['submitted'])) {  
    // require a name from user
    if(trim($_POST['contactName']) === '') {
        $nameError =  'You forgot your name!'; 
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
    }
    // subject
    $subject = trim($_POST['subject']);
    //You should insert elements name from Form. Then you should add this data to $body variable below
    //$checkbox1 = trim($_POST['checkbox1']);
    // need valid email
    if(trim($_POST['email']) === '')  {
        $emailError = 'You forgot to enter in your e-mail address.';
        $hasError = true;
    } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
        $emailError = 'You entered an invalid email address.';
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }    
    // we need at least some content
    if(trim($_POST['comments']) === '') {
        $commentError = 'You forgot to write a message!';
        $hasError = true;
    } else {
        if(function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['comments']));
        } else {
            $comments = trim($_POST['comments']);
        }
    }  
    // upon no failure errors let's email now!
    if(!isset($hasError)) {
        $emailTo = $contactmail;
        $subject = 'Submitted message from '.$name;
        $sendCopy = trim($_POST['sendCopy']);
        $body = "Name: $name \n\nEmail: $email \n\nMessage: $comments \n\nSubject: $subject \n\nCheckbox: $checkbox1";
        $headers = 'From: ' .' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
        mail($emailTo, $subject, $body, $headers);
        // set our boolean completion value to TRUE
        $emailSent = true;
    }
}
?>
            <!-- PAGE TITLE -->
            <div class="titlebg">
                <h1 class="regular-size lh fleft">
                <?php if (is_home()) { ?>
                    <?php echo get_option('sosq_blog_main_title'); ?>
                <?php } else { ?>
                    <?php the_title(); ?>
                <?php } ?></h1>
                <ul class="breadcrumbs">
                    <?php kriesi_breadcrumb(); ?>
                </ul>
                <div class="clear"></div>
            </div>
            <!-- END PAGE TITLE -->
            <!-- PAGE CONTENT -->
            <div class="container contact">
             <?php if($sidebarcontact == 'sidebarleft') { ?>
                <!-- SIDEBAR -->
                <div class="columns four row">
                    <div class="sidebarleft">
                      <?php generated_dynamic_sidebar(); ?> 
                    </div><!-- End .sidebar -->
                </div><!-- End .columns .four .omega .row -->
                <?php wp_reset_query(); ?>
            <?php } ?>
                <!-- CONTACT PAGE LEFT-->
                <div class="columns eight row <?php if($sidebarcontact == 'sidebarleft') { ?> <?php echo "omega"; ?> <?php } ?>">
                    <?php if($maps != '') { ?>
                    <!-- EMBED CONTAINER -->
                    <div class="embed-container line-zero row"> 
                    <?php $smaps = stripslashes( $maps ); echo $smaps  ?>
                    </div>
                    <!-- END EMBED CONTAINER -->
                    <?php } ?>
                    <!-- CONTACT CONTENT -->
                    <div class="contact-page-container">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php edit_post_link(__('Edit', 'sosthemes'),'<p class="entry-edit">','</p>'); ?>
                    <?php the_content(); ?>
                    <?php endwhile; endif; ?>                     
                    </div>  
                    <!-- END CONTACT CONTENT --> 
                <!-- CONTACT FORM -->
                <div class="form-contact-page">
                    <form action="<?php the_permalink(); ?>" method="post" id="contactform">
                       <p class="input-float">
                           <label for="author" class="input-label">Your name ( * )</label> 
                           <input class="comment-form-inputs radius required" name="contactName" id="contactName" value="" type="text">
                       </p> 
                       <p class="input-float">
                           <label for="email" class="input-label">Email ( * ) </label>
                           <input class="comment-form-inputs radius required email" name="email" id="email" value="" type="text">
                       </p>                   
                       <p class="input-float omega">
                           <label for="url" class="input-label omega">Subject ( Optional )</label> 
                           <input class="comment-form-inputs radius omega" name="subject" id="subject" value="" type="text">
                       </p> 
                       <div class="clear"></div> 
                       <label for="comment" class="input-textarea"><b>Message</b> ( * )</label>
                       <div class="clear"></div>
                       <textarea class="comment-form-textarea radius required" name="comments" id="commentsText"></textarea> 
                       <p class="form-submit">
                           <input name="submit" type="submit" id="submit" value="Submit">
                           <input type="hidden" name="submitted" id="submitted" value="true" />
                       </p>
                     </form>
                 </div>
                 <!-- END CONTACT FORM -->
              </div>
              <!-- END CONTACT PAGE LEFT-->
                <?php if($sidebarcontact == 'sidebarright') { ?>
                <!-- SIDEBAR -->
                <div class="columns four omega row">
                    <div class="sidebar">
                     <?php generated_dynamic_sidebar(); ?> 
                    </div><!-- End .sidebar -->
                </div><!-- End .columns .four .omega .row -->
               <?php } ?>
            </div> <!-- End .container -->
            <div class="clear"></div>
            <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('form#contactform').submit(function() {
                        var hasError = false;
                            $('.required').each(function() {
                                    if($.trim($(this).val()) == '') {
                                        hasError = true;
                                    }
                                });
                            if(!hasError) {
                                var formInput = $(this).serialize();
                                $.post('<?php the_permalink(); ?>',formInput, function(data){
                                    $('form#contactform').slideUp("fast", function() {                 
                                        $(this).before('<div class="b_green">Yay! If you see this message box, that means everything went good.</div>');
                                    });
                                });
                            }
                        return false;   
                    }); 
                });
            </script>
<?php get_footer(); ?>