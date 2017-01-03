/*	--------------------------------------------------------------
	:: Table Of Content
	:: 
	:: Container
	:: Recent Portfolio
	:: Recent Post
	:: SosHR
	:: Embed/Iframe
	:: Lightbox Image
	:: Resonsive Image
	:: Iconic Boxes
	:: Announcement
	:: Team/Personels
	:: Tab Element
	:: Accordion Element
	:: Vertical Accordion
	:: Button
	:: Servicebox 2
	:: Slider
	:: Testimonials
	:: Title
	:: Alert
	:: Dropcap
	:: Columns 1/2
	:: Columns 1/3
	:: Columns 1/4
	:: Columns 2/4
	:: Columns 2/3
	:: Columns 3/4
	:: Hightlight
	::
	-------------------------------------------------------------- */
/*	--------------------------------------------------------------
	:: Container
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_container', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_container', {  
	                title : 'Add Container',  
	                image : url+'/sos-container.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[container row="yes"]...[/container]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_container', tinymce.plugins.sos_container);  
	})();
/*	--------------------------------------------------------------
	:: Recent Portfolio
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_recent_portfolio', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_recent_portfolio', {  
	                title : 'Add Recent Portfolio',  
	                image : url+'/sos-recent-portfolio.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[box title="Recent Portfolio"][recent-portfolio title="yes" thumb="yes" excerpt="yes" columns="4" number="4" filter="" last="last"][/recent-portfolio][/box]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_recent_portfolio', tinymce.plugins.sos_recent_portfolio);  
	})();
/*	--------------------------------------------------------------
	:: Recent Post
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_recent_post', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_recent_post', {  
	                title : 'Add Recent Post',  
	                image : url+'/sos-recent-post1.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[box title="Recent Blog Post"][recent-post title="yes" thumb="yes" excerpt="yes"  meta="yes" metafull="no" number="4" columns="4"  last="last" ][/box]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_recent_post', tinymce.plugins.sos_recent_post);  
	})();
/*	--------------------------------------------------------------
	:: Sos HR
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_aqua_hr', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_aqua_hr', {  
	                title : 'Add Seperator',  
	                image : url+'/sos-hr.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[hr margin="no"]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_aqua_hr', tinymce.plugins.sos_aqua_hr);  
	})();
/*	--------------------------------------------------------------
	:: Embed/Iframe
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_embed', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_embed', {  
	                title : 'Add Embed/Iframe',  
	                image : url+'/sos-embed.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[embeds] Please insert your embed code ( youtube , vimeo , google maps and any other embed/iframe codes )[/embeds]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_embed', tinymce.plugins.sos_embed);  
	})();
/*	--------------------------------------------------------------
	:: Lightbox Image
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_lightbox', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_lightbox', {  
	                title : 'Add Lightbox Image',  
	                image : url+'/sos-lightbox-image.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[lightbox src="Big Image Url" alt="" gallery="mygallery" row=""]...[/lightbox]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_lightbox', tinymce.plugins.sos_lightbox);  
	})();
/*	--------------------------------------------------------------
	:: Responsive Image
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_respons_image', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_respons_image', {  
	                title : 'Add Responsive Image',  
	                image : url+'/sos-responsive-image.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[img alt="" link="" row=""]...[/img]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_respons_image', tinymce.plugins.sos_respons_image);  
	})();
/*	--------------------------------------------------------------
	:: Iconic Boxes
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_iconic', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_iconic', {  
	                title : 'Add Iconic Boxes',  
	                image : url+'/sos-iconic.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[servicebox title="Powered with custom widgets." icon="bolt"]Take an in-depth look at Quickess! It has many awesome widgets to help you customize your theme easier![/servicebox]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_iconic', tinymce.plugins.sos_iconic);  
	})();
/*	--------------------------------------------------------------
	:: Announcement
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_announcement', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_announcement', {  
	                title : 'Add Announcement',  
	                image : url+'/sos-announcement.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[announcement title="Welcome to our office! How can we help you?" link="#" buttontext="Purchase Now"]We create WordPress themes for ThemeForest. All equipped with useful features to make them customize easier.[/announcement]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_announcement', tinymce.plugins.sos_announcement);  
	})();
/*	--------------------------------------------------------------
	:: Team/Personels
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_team', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_team', {  
	                title : 'Add Team/Personnels',  
	                image : url+'/sos-team.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[team img="YOUR PERSONNELS IMAGE" name="John Doe" position="Network Administrator" facebook="#" twitter="#" linkedin="#" link="#"]Lorem ipsum ex vix illud nonummy, novum tation et his. At vix scripta[/team]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_team', tinymce.plugins.sos_team);  
	})();
/*	--------------------------------------------------------------
	:: Tab Element
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_tabs', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_tabs', {  
	                title : 'Add Tabs Element',  
	                image : url+'/sos-tabs.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[tabs titles="title,title,title"][tab] Tab 1 [/tab][tab] tab 2 [/tab][tab] Tab 3 [/tab][/tabs]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_tabs', tinymce.plugins.sos_tabs);  
	})();
/*	--------------------------------------------------------------
	:: Accordion
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_accordion', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_accordion', {  
	                title : 'Add Accordion Element',  
	                image : url+'/sos-accordion.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[accordion][acc title="Title 1"]Content 1[/acc][acc title="Title 2"]Content 2[/acc][acc title="Title 3"]Content 3[/acc][acc title="Title 4"]Content 4[/acc][/accordion]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_accordion', tinymce.plugins.sos_accordion);  
	})();
/*	--------------------------------------------------------------
	:: Vertical Accordion
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_vaccordion', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_vaccordion', {  
	                title : 'Add Vertical Accordion Element',  
	                image : url+'/sos-vaccordion.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[accordionv titles="Title 1,Title 2,Title 3,Title 4,Title 5"][accv]Content 1[/accv][accv]Content 2[/accv][accv]Content 3[/accv][accv]Content 4[/accv][accv]Content 5[/accv][/accordionv]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_vaccordion', tinymce.plugins.sos_vaccordion);  
	})();
/*	--------------------------------------------------------------
	:: Button
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_button', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_button', {  
	                title : 'Add Button',  
	                image : url+'/sos-button.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[button color="Example of usage : red , green , teal , blue , orange , gray , violet , orchid , khaki , gold , black , lightgray" link="#"] Button Text [/button]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_button', tinymce.plugins.sos_button);  
	})();
/*	--------------------------------------------------------------
	:: Servicebox 2
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_servicebox', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_servicebox', {  
	                title : 'Add Service Boxes',  
	                image : url+'/sos-servicebox.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[servicebox2 img="" title="" moretext="" link="" showmore="yes or no"]...[/servicebox2]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_servicebox', tinymce.plugins.sos_servicebox);  
	})();
/*	--------------------------------------------------------------
	:: Slider
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_slider', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_slider', {  
	                title : 'Add Slider',  
	                image : url+'/sos-slider-icon.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[slider][slide] CONTENT 1 GOES HERE [/slide] [slide] CONTENT 2 GOES HERE[/slide][slide] CONTENT 3 GOES HERE[/slide][/slider]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_slider', tinymce.plugins.sos_slider);  
	})();
/*	--------------------------------------------------------------
	:: Testimonials
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_testimonials', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_testimonials', {  
	                title : 'Add Testimonials',  
	                image : url+'/sos-testimonials.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[testimonials][tlist name="John Doe"] Lorem ipsun dolor sit amet[/tlist][tlist name="Jane Doe"] Lorem ipsun dolor sit amet[/tlist][/testimonials]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_testimonials', tinymce.plugins.sos_testimonials);  
	})();
/*	--------------------------------------------------------------
	:: Title
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_title', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_title', {  
	                title : 'Add Seperate Title',  
	                image : url+'/sos-title.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[title] ... [/title]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_title', tinymce.plugins.sos_title);  
	})();
/*	--------------------------------------------------------------
	:: Alert
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_alert', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_alert', {  
	                title : 'Add Alert',  
	                image : url+'/sos-alert.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[alert color="example of usage : green , red , yellow , grey , white , "]...[/alert]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_alert', tinymce.plugins.sos_alert);  
	})();
/*	--------------------------------------------------------------
	:: Dropcap
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_dropcap', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_dropcap', {  
	                title : 'Add Dropcap',  
	                image : url+'/sos-dropcap.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[dropcap]...[/dropcap]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_dropcap', tinymce.plugins.sos_dropcap);  
	})();
/*	--------------------------------------------------------------
	:: Columns 1/2
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_columns12', {  
	        init : function(ed, url) {  
	            ed.addButton('sos_columns12', {  
	                title : 'Add Columns (1/2)',  
	                image : url+'/sos-columns-1-2.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[columns type="six" row="yes" last="no"]...[/columns]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_columns12', tinymce.plugins.sos_columns12);  
	})();
/*	--------------------------------------------------------------
	:: Columns 1/3
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_columns13', {
			  
	        init : function(ed, url) {  
	            ed.addButton('sos_columns13', {  
	                title : 'Add Columns (1/3)',  
	                image : url+'/sos-columns-1-3.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[columns type="four" row="yes" last="no"]...[/columns]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_columns13', tinymce.plugins.sos_columns13);  
	})();
/*	--------------------------------------------------------------
	:: Columns 1/4
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_columns14', {
			  
	        init : function(ed, url) {  
	            ed.addButton('sos_columns14', {  
	                title : 'Add Columns (1/4)',  
	                image : url+'/sos-columns-1-4.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[columns type="three" row="yes" last="no"]...[/columns]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_columns14', tinymce.plugins.sos_columns14);  
	})();
/*	--------------------------------------------------------------
	:: Columns 2/4
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_columns24', {
			  
	        init : function(ed, url) {  
	            ed.addButton('sos_columns24', {  
	                title : 'Add Columns (2/4)',  
	                image : url+'/sos-columns-2-4.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[columns type="six" row="yes" last="no"]...[/columns]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_columns24', tinymce.plugins.sos_columns24);  
	})();
/*	--------------------------------------------------------------
	:: Columns 2/3
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_columns23', {
			  
	        init : function(ed, url) {  
	            ed.addButton('sos_columns23', {  
	                title : 'Add Columns (2/3)',  
	                image : url+'/sos-columns-2-3.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[columns type="eight" row="yes" last="no"]...[/columns]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_columns23', tinymce.plugins.sos_columns23);  
	})();
/*	--------------------------------------------------------------
	:: Columns 3/4
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_columns34', {
			  
	        init : function(ed, url) {  
	            ed.addButton('sos_columns34', {  
	                title : 'Add Columns (3/4)',  
	                image : url+'/sos-columns-3-4.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[columns type="nine" row="yes" last="no"]...[/columns]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_columns34', tinymce.plugins.sos_columns34);  
	})();
/*	--------------------------------------------------------------
	:: Hightlight
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_highlight', {
			  
	        init : function(ed, url) {  
	            ed.addButton('sos_highlight', {  
	                title : 'Add Highlight Text',  
	                image : url+'/sos-highlight.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[highlight color=" Example of usage : red , green , teal , blue , orange , gray , violet , orchid , khaki , gold , black , lightgray"] Highlight Text [/highlight]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_highlight', tinymce.plugins.sos_highlight);  
	})();
/*	--------------------------------------------------------------
	:: Sos Tick
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_listtick', {
			  
	        init : function(ed, url) {  
	            ed.addButton('sos_listtick', {  
	                title : 'Add Tick List',  
	                image : url+'/sos-tick.png',  
	                onclick : function() {  
	                     ed.selection.setContent('<ul class="list-tick"><li>List item 1</li><li>List item 2</li><li>List item 3</li></ul>');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_listtick', tinymce.plugins.sos_listtick);  
	})();
/*	--------------------------------------------------------------
	:: Sos Cross
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_listcross', {
			  
	        init : function(ed, url) {  
	            ed.addButton('sos_listcross', {  
	                title : 'Add Cross List',  
	                image : url+'/sos-cross.png',  
	                onclick : function() {  
	                     ed.selection.setContent('<ul class="list-cross"><li>List item 1</li><li>List item 2</li><li>List item 3</li></ul>');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_listcross', tinymce.plugins.sos_listcross);  
	})();
/*	--------------------------------------------------------------
	:: Sos Clear
	-------------------------------------------------------------- */
	(function() {  
	    tinymce.create('tinymce.plugins.sos_erase', {
			  
	        init : function(ed, url) {  
	            ed.addButton('sos_erase', {  
	                title : 'Add Clear',  
	                image : url+'/sos-clear.png',  
	                onclick : function() {  
	                     ed.selection.setContent('[clear][/clear]');  
	                }  
	            });  
	        },  
	        createControl : function(n, cm) {  
	            return null;  
	        },  
	    });  
	    tinymce.PluginManager.add('sos_erase', tinymce.plugins.sos_erase);  
	})();