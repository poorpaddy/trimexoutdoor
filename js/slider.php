<?php 
header('Content-type: text/javascript');

if(file_exists('../../../../wp-load.php')) :
	include '../../../../wp-load.php';
else:
	include '../../../../../wp-load.php';
endif; 

?>
<?php
//Main
$flexslider_second		= get_option('sosq_hp_fslider_second'); 
$flexslider_effect 		= get_option('sosq_hp_fslider_slidefade');
$flexslider_contnav 	= get_option('sosq_hp_fslider_contnav');
$flexslider_directnav 	= get_option('sosq_hp_fslider_directnav');
$flexslider_pause 		= get_option('sosq_hp_fslider_pausemouse');
$flexslider_slideshow 	= get_option('sosq_hp_fslider_slideshow');
//EmbedSlider
$embedslider_second 	= get_option('sosq_hp_fslider_essecond');
$embedslider_slideshow 	= get_option('sosq_hp_fslider_psslideshow');
//Portfolio
$flexslider_psslideshow = get_option('sosq_hp_fslider_psslideshow');
$flexslider_pseffect 	= get_option('sosq_hp_fslider_psslidefade');
$flexslider_pssecond 	= get_option('sosq_hp_fslider_pssecond');
$playout = get_option('sosq_portfoliomain_layout');
//Testimonials
$flexslider_tmsecond 	= get_option('sosq_hp_fslider_tmsecond');
//Blog
$flexslider_blgsecond 	= get_option('sosq_hp_fslider_blgsecond');

if ($flexslider_contnav == 'true') { $flex_contnav = 'true'; } else { $flex_contnav = 'false';}
if ($flexslider_directnav == 'true') { $flex_directnav = 'true'; } else { $flex_directnav = 'false';}
if ($flexslider_pause == 'true') { $flex_pause = 'true'; } else { $flex_pause = 'false';}
if ($flexslider_slideshow == 'true') { $flex_slideshow = 'true'; } else { $flex_slideshow = 'false';}
if ($embedslider_slideshow == 'true') { $embed_slideshow = 'true'; } else { $embed_slideshow = 'false';}
if ($flexslider_psslideshow == 'true') { $flex_psslideshow = 'true'; } else { $flex_psslideshow = 'false';}
?>

jQuery(document).ready(function($) {
/*  --------------------------------------------------------------
    :: Portfolio No Filter - Change Layout
    -------------------------------------------------------------- */
//default Portfolio Layout
$('#porfolionf li.element').children('.three').removeClass('three').addClass('<?php echo $playout ?>');
$('#porfolionf li.element').children('.four').removeClass('four').addClass('<?php echo $playout ?>');
$('#porfolionf li.element').children('.six').removeClass('six').addClass('<?php echo $playout ?>');
/*  --------------------------------------------------------------
    :: FlexSlider
    -------------------------------------------------------------- */
	$(window).load(function() {
	    $('.sliderblog').flexslider({       
	            controlNav: true,
	            pauseOnHover: true,
	            slideshowSpeed: <?php echo $flexslider_blgsecond ?>,
	            start: function(slider) {
	            slider.removeClass('loading');} 
	    });      
	    $('.common').flexslider({
	            controlNav: true,
	            pauseOnHover: true,
	            slideshowSpeed: <?php echo $flexslider_pssecond ?>,
	            smoothHeight: true,
                animation: "<?php echo $flexslider_pseffect ?>",
                slideshow: <?php echo $flex_psslideshow ?>,
	            start: function(slider) {
	            slider.removeClass('loading');}
	    });    
	    $('.slidetestimonials').flexslider({
	            controlNav: false,
	            directionNav: false,
	            pauseOnHover: true,
	            slideshowSpeed: <?php echo $flexslider_tmsecond ?>,        
	            start: function(slider) {
	            slider.removeClass('loading');} 
	    });
	    $('#slider3').flexslider({      
	            directionNav: false,
	            slideshow: false,   
	            animation: "slide",
	            animationLoop: false,
	            itemWidth: 155,
	            itemMargin: 0,
	            minItems: 1,
	            maxItems: 6,
	            start: function(slider) {
	            slider.removeClass('loading');} });
	    $('#slider2').flexslider({
	            directionNav: false,
	            slideshow: <?php echo $embed_slideshow ?>, 
                slideshowSpeed: <?php echo $embedslider_second ?>,
	            start: function(slider) {
	            slider.removeClass('loading');}
	    }); 
	    $('#slider1').flexslider({
	            controlNav: <?php echo $flex_contnav ?>,
	            pauseOnHover: <?php echo $flex_pause ?>,
	            slideshowSpeed: <?php echo $flexslider_second ?>,
                directionNav: <?php echo $flex_directnav ?>,
                animation: "<?php echo $flexslider_effect ?>",
                slideshow: <?php echo $flex_slideshow ?>,
                 
	          start: function(slider) {
	            slider.removeClass('loading');
	            $('.caption-title').stop().animate({left:0},500);
	            $('.caption-subtitle').stop().animate({left:0},600);
	            $('.caption-title2').stop().animate({right:0},500);
	            $('.caption-subtitle2').stop().animate({right:0},600);
	          },
	           before: function(slider) {
	            $('.caption-title').stop().animate({left:100,opacity:0},500);
	            $('.caption-subtitle').stop().animate({left:100,opacity:0},600);
	            $('.caption-title2').stop().animate({right:100,opacity:0},500);
	            $('.caption-subtitle2').stop().animate({right:100,opacity:0},600);
	          },
	          after: function(slider) {
	            $('.caption-title').stop().animate({left:0,opacity:1},500);
	            $('.caption-subtitle').stop().animate({left:0,opacity:0.8},600);
	            $('.caption-title2').stop().animate({right:0,opacity:1},500);
	            $('.caption-subtitle2').stop().animate({right:0,opacity:0.8},600);
	          }
	    });
	    $('.slider-wrapper').find('.flex-direction-nav li a').animate({ opacity: 0 }, 0);
	    $('.sliderblog').find('.flex-direction-nav li a').animate({ opacity: 0 }, 0);
	    $('.slider-wrapper , .sliderblog').hover(function () {
	        $(this).find('.flex-direction-nav li a').animate({ opacity: 1 }, 500);
	        }, function () { 
	        $(this).find('.flex-direction-nav li a').animate({ opacity: 0 }, 500);  
	    });
	});
});
