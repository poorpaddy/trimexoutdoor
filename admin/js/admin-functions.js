var sostheme_admin_panel;
(function($){sostheme_admin_panel={
	init:function(){
		var sos_title;
		$('#sos-admin .sos-admin-menu-link:first').addClass('visible');
		$('#sos-admin .sos-admin-content-box:first').addClass('visible');
		$('.sos-admin-menu-link').click(function(event) {
			event.preventDefault();
		});
		$('.sos-admin-menu-link').click(function() {
			sos_title = $(this).attr("id").replace('sos-admin-menu-', '');
			$('.sos-admin-menu-link').removeClass('visible');
			$('#sos-admin-menu-' + sos_title).addClass('visible');
			$('.sos-admin-content-box').removeClass('visible');
			$('.sos-admin-content-box').hide();
			$('#sos-admin-content-' + sos_title).fadeIn("fast");
			$('.sos-admin-content-box').removeClass('visible');
		});
		//submit
		$('#sosthemeform').submit(function(){
			function newValues() {
				var serializedValues = $("#sosthemeform").serialize();
				return serializedValues;
			}
			var serializedReturn = newValues();
			var data = {
				action: 'sostheme_ajax_post_action',
				data: serializedReturn,
				sostheme_nonce: $('#sostheme_nonce').val()
			};
			$.post(ajaxurl, data,function(data) {
					if(data == 0) {
						$('#yaytrue').html(' ');
						$('#yaybottom').html(' ');
						$('#yaytrue').fadeIn(400);
						$('#yaybottom').fadeIn(400);
						$('#yaytrue').html('&rarr; Settings have beeen successfully saved!');
						$('#yaybottom').html('&rarr; Settings have beeen successfully saved!');
						
						
					setTimeout(function(){
						location.reload();
						}, 2000);

					}
					else {
						$('#yaytrue').html(' ');
						$('#yaybottom').html(' ');
						$('#yaytrue').fadeIn(400);
						$('#yaybottom').fadeIn(400);
						$('#yaytrue').html(' &rarr; A problem has occurred while saving your settings, please try again.');
						$('#yaybottom').html(' &rarr; A problem has occurred while saving your settings, please try again.');
						setTimeout(function(){
						$('#yaytrue,#yaybottom').fadeOut(400);
						}, 5000);
						
						
						
					}
				  
				}
			);
			
			return false;
		
		});
	}
};


$(document).ready(function(){
	sostheme_admin_panel.init()
})})(jQuery);
