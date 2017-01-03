// When DOM is fully loaded
jQuery(document).ready(function($) {


/*	--------------------------------------------------------------
	:: Seolimit (Eburhan jquery limit)
	-------------------------------------------------------------- */

	eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(2($){$.v.w=2(g){m={8:x,9:\'y z: #1\',5:\'<n></n>\',o:2(){}};3 h=$.A({},m,g);p.B(2(i,a){3 b=$(a).4(\'6\');3 c=C h.5;3 d=(c==\'D\')?h.5:$(h.5);3 e=d.4(\'6\');7(!a){b=\'E\'+(q.F()*q.G(H,I));$(a).4(\'6\',b)}j(a);3 f=k(a);7(!e){e=\'J\'+b;d.4(e)}7(c==\'K\')$(a).L(d);d.4(\'6\',e).r(h.9.s(/#1/,f));$(a).M(2(){t(e,a)})});2 j(a){$(a).l($(a).l().N(0,h.8))}2 k(a){u h.8-$(a).l().O}2 t(a,b){3 c=k(b);7(c<0){j(b);c=0;h.o()}$(\'#\'+a).r(h.9.s(/#1/,c))}u p}})(P);',52,52,'||function|var|attr|kapsa|id|if|limit|mesaj||||||||||kalanKarakterKontrol|kalanKarakterSayisi|val|def|div|uyari|this|Math|html|replace|kalanKarakterYazdir|return|fn|kalanKarakter|250|kalan|karakter|extend|each|typeof|object|text_|random|pow|10|18|JKK_|string|after|keyup|substr|length|jQuery'.split('|'),0,{}))
	

	$('#sosq_main_seo_title , #sosq_inpost_seo_title').kalanKarakter({
            limit: 70,
            mesaj: ' Remaining character count : <strong>#1</strong>',
            kapsa: '<div class="seotrue"></div>',
            uyari: (function(){
            })	
        });

	$('#sosq_main_seo_desc , #sosq_inpost_seo_desc ').kalanKarakter({
            limit: 160,
            mesaj: ' Remaining character count :  <strong>#1</strong>',
            kapsa: '<div class="seotrue"></div>',
            uyari: (function(){
            })	
        });
		
	$('#sosq_main_seo_key , #sosq_inpost_seo_key').kalanKarakter({
            limit: 260,
            mesaj: ' Remaining character count : <strong>#1</strong>',
            kapsa: '<div class="seotrue"></div>',
            uyari: (function(){
            })	
        });


		$(".cb-enable").click(function(){
		var parent = $(this).parents('.switch');
		$('.cb-disable',parent).removeClass('selected');
		$(this).addClass('selected');
		$('.checkbox',parent).attr('checked', true);
	});
	$(".cb-disable").click(function(){
		var parent = $(this).parents('.switch');
		$('.cb-enable',parent).removeClass('selected');
		$(this).addClass('selected');
		$('.checkbox',parent).attr('checked', false);
	});

/*	--------------------------------------------------------------
	:: Page Trigger
	-------------------------------------------------------------- */

	var homepage1 = jQuery('#metabox_homepage');
	homepage1.css('display', 'none');
	
    jQuery('[name="page_template"]').change(function () {
    	  jQuery('[name="page_template"] option:selected').each(function () {
    			if (jQuery(this).val() == 'template-home.php') {
    				homepage1.css('display', 'block');
    			
    			} 
    			else if (jQuery(this).text() == 'EmbedSlider') {

    			}
    			else {homepage1.css('display', 'none');
				
    			}
    		  });
	}).trigger('change');

/*	--------------------------------------------------------------
	:: Portfolio Trigger
	-------------------------------------------------------------- */

	var portfolio1 = jQuery('#sosq_portfolio_img');
	portfolio1.css('display', 'none');
	
	var portfolio2 = jQuery('#sosq_portfolio_embed');
	portfolio2.css('display', 'none');
		
	jQuery('[name="sosq_portfolio_type"]').change(function () {
		  jQuery('[name="sosq_portfolio_type"] option:selected').each(function () {
				if (jQuery(this).text() == 'Image') {
					portfolio1.css('display', 'block');
					portfolio2.css('display', 'none');
				
				} 
				else if (jQuery(this).text() == 'Video') {
					portfolio1.css('display', 'none');
					portfolio2.css('display', 'block');
				
				}
				else {portfolio1.css('display', 'none');
					portfolio2.css('display', 'none');
				}
			  });
	}).trigger('change');
	
/*	--------------------------------------------------------------
	:: Postformat Trigger
	-------------------------------------------------------------- */

	var blog_desc = jQuery('#blog_desc_trigger');
	blog_desc.css('display', 'none');
	blog_desc_check = jQuery('#post-format-0');

	var blog_embed = jQuery('#blog_embed');
	blog_embed.css('display', 'none');
	blog_embed_check = jQuery('#post-format-video');

	var blog_gallery = jQuery('#blog_gallery');
	blog_gallery.css('display', 'none');
	blog_gallery_check = jQuery('#post-format-gallery');
	
	/*checked control*/
	if(blog_desc_check.is(':checked'))
	blog_desc.css('display', 'block');
	
	if(blog_embed_check.is(':checked'))
	blog_embed.css('display', 'block');
	
	if(blog_gallery_check.is(':checked'))
	blog_gallery.css('display', 'block');
	
jQuery('#post-formats-select input').change(function () {

			if (jQuery(this).val() == 'gallery') {
					blog_embed.css('display', 'none');
					blog_gallery.css('display', 'block');
					blog_desc.css('display', 'none');
			} 
			
			else if (jQuery(this).val() == 'video') {
					blog_embed.css('display', 'block');
					blog_gallery.css('display', 'none');

					blog_desc.css('display', 'none');
			}
					
			else {
					
					blog_embed.css('display', 'none');
					blog_gallery.css('display', 'none');
					blog_desc.css('display', 'block');
			}
	});
});
	
/*	--------------------------------------------------------------
	:: Colorpicker
	-------------------------------------------------------------- */

// When DOM is fully loaded
jQuery(document).ready(function($) {

	$(".color-picker").miniColors({
					
	});
});
				