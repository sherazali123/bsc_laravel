jQuery.noConflict();

jQuery(document).ready(function(){
	
	prettyPrint();			//syntax highlighter
	mainwrapperHeight();
	responsive();
	
	
	// animation
	if(!jQuery('.showmenu').hasClass('clicked')) {
		var anicount = 4;	
		jQuery('.leftmenu .nav-tabs > li').each(function(){										   
			//jQuery(this).addClass('animate'+anicount+' fadeInUp');
			anicount++;
		});
		
		jQuery('.leftmenu .nav-tabs > li a').hover(function(){
			//jQuery(this).find('span').addClass('animate0 swing');
		},function(){
			//jQuery(this).find('span').removeClass('animate0 swing');
		});
		
		//jQuery('.logopanel').addClass('animate0 fadeInUp');
		//jQuery('.datewidget, .headerpanel').addClass('animate1 fadeInUp');
		//jQuery('.searchwidget, .breadcrumbwidget').addClass('animate2 fadeInUp'); 
		//jQuery('.plainwidget, .pagetitle').addClass('animate3 fadeInUp');
		//jQuery('.maincontent').addClass('animate4 fadeInUp');
	}
	
	// widget icons dashboard
	if(jQuery('.widgeticons').length > 0) {
		jQuery('.widgeticons a').hover(function(){
			//jQuery(this).find('img').addClass('animate0 bounceIn');
		},function(){
			//jQuery(this).find('img').removeClass('animate0 bounceIn');
		});	
	}


	// adjust height of mainwrapper when 
	// it's below the document height
	function mainwrapperHeight() {
		var windowHeight = jQuery(window).height();
		var mainWrapperHeight = jQuery('.mainwrapper').height();
		var leftPanelHeight = jQuery('.leftpanel').height();
		if(leftPanelHeight > mainWrapperHeight)
			jQuery('.mainwrapper').css({minHeight: leftPanelHeight});	
		if(jQuery('.mainwrapper').height() < windowHeight)
			jQuery('.mainwrapper').css({minHeight: windowHeight});
	}
	
	function responsive() {
		
		var windowWidth = jQuery(window).width();
		
		// hiding and showing left menu
		if(!jQuery('.showmenu').hasClass('clicked')) {
			
			if(windowWidth < 960)
				hideLeftPanel();
			else
				showLeftPanel();
		}
		
		// rearranging widget icons in dashboard
		if(windowWidth < 768) {
			if(jQuery('.widgeticons .one_third').length == 0) {
				var count = 0;
				jQuery('.widgeticons li').each(function(){
					jQuery(this).removeClass('one_fifth last').addClass('one_third');
					if(count == 2) {
						jQuery(this).addClass('last');
						count = 0;
					} else { count++; }
				});	
			}
		} else {
			if(jQuery('.widgeticons .one_firth').length == 0) {
				var count = 0;
				jQuery('.widgeticons li').each(function(){
					jQuery(this).removeClass('one_third last').addClass('one_fifth');
					if(count == 4) {
						jQuery(this).addClass('last');
						count = 0;
					} else { count++; }
				});	
			}
		}
	}
	
	// when resize window event fired
	jQuery(window).resize(function(){
		mainwrapperHeight();
		responsive();
	});
	
	// dropdown in leftmenu
	jQuery('.leftmenu .dropdown > a').click(function(){
		if(!jQuery(this).next().is(':visible'))
			jQuery(this).next().slideDown('slow');
		else
			jQuery(this).next().slideUp('slow');	
		return false;
	});
	
	// hide left panel
	function hideLeftPanel() {
		jQuery('.leftpanel').css({marginLeft: '-260px'}).addClass('hide');
		jQuery('.rightpanel').css({marginLeft: 0});
		jQuery('.mainwrapper').css({backgroundPosition: '-260px 0'});
		jQuery('.footerleft').hide();
		jQuery('.footerright').css({marginLeft: 0});
	}
	
	// show left panel
	function showLeftPanel() {
		jQuery('.leftpanel').css({marginLeft: '0px'}).removeClass('hide');
		jQuery('.rightpanel').css({marginLeft: '260px'});
		jQuery('.mainwrapper').css({backgroundPosition: '0 0'});
		jQuery('.footerleft').show();
		jQuery('.footerright').css({marginLeft: '260px'});
	}
	
	// show and hide left panel
	jQuery('.showmenu').click(function() {
		jQuery(this).addClass('clicked');
		if(jQuery('.leftpanel').hasClass('hide'))
			showLeftPanel();
		else
			hideLeftPanel();
		return false;
	});
	
	// transform checkbox and radio box using uniform plugin
	if(jQuery().uniform)
		jQuery('input:checkbox, input:radio, select.uniformselect').uniform();
	
	
	// show/hide widget content or widget content's child	
	if(jQuery('.showhide').length > 0 ) {
		jQuery('.showhide').click(function(){
			var t = jQuery(this);
			var p = t.parent();
			var target = t.attr('href');
			target = (!target)? p.next() :	p.next().find('.'+target);
			t.text((target.is(':visible'))? 'View Source' : 'Hide Source');
			(target.is(':visible'))? target.hide() : target.show(100);
			return false;
		});
	}
	
	
	// check all checkboxes in table
	if(jQuery('.checkall').length > 0) {
		jQuery('.checkall').click(function(){
			var parentTable = jQuery(this).parents('table');										   
			var ch = parentTable.find('tbody input[type=checkbox]');										 
			if(jQuery(this).is(':checked')) {
			
				//check all rows in table
				ch.each(function(){ 
					jQuery(this).attr('checked',true);
					jQuery(this).parent().addClass('checked');	//used for the custom checkbox style
					jQuery(this).parents('tr').addClass('selected'); // to highlight row as selected
				});
							
			
			} else {
				
				//uncheck all rows in table
				ch.each(function(){ 
					jQuery(this).attr('checked',false); 
					jQuery(this).parent().removeClass('checked');	//used for the custom checkbox style
					jQuery(this).parents('tr').removeClass('selected');
				});	
				
			}
		});
	}
	
	
	// delete row in a table
	if(jQuery('.deleterow').length > 0) {
		jQuery('.deleterow').click(function(){
			var conf = confirm('Continue delete?');
			if(conf)
				jQuery(this).parents('tr').fadeOut(function(){
					jQuery(this).remove();
					// do some other stuff here
				});
			return false;
		});	
	}
	
	
	// dynamic table
	if(jQuery('#dyntable').length > 0) {
		jQuery('#dyntable').dataTable({
			"sPaginationType": "full_numbers",
			"aaSortingFixed": [[0,'asc']],
			"fnDrawCallback": function(oSettings) {
				jQuery.uniform.update();
			}
		});
	}
	
	
	/////////////////////////////// ELEMENTS.HTML //////////////////////////////
	
	
	// tabbed widget
	jQuery('#tabs, #tabs2').tabs();
	
	// accordion widget
	// jQuery('#accordion, #accordion2').accordion({heightStyle: "content"});
	
	// make to keep multiple open
	jQuery('#accordion, #accordion2').accordion({
    collapsible:true,
    heightStyle: "content",
    beforeActivate: function(event, ui) {
         // The accordion believes a panel is being opened
        if (ui.newHeader[0]) {
            var currHeader  = ui.newHeader;
            var currContent = currHeader.next('.ui-accordion-content');
         // The accordion believes a panel is being closed
        } else {
            var currHeader  = ui.oldHeader;
            var currContent = currHeader.next('.ui-accordion-content');
        }
         // Since we've changed the default behavior, this detects the actual status
        var isPanelSelected = currHeader.attr('aria-selected') == 'true';

         // Toggle the panel's header
        currHeader.toggleClass('ui-corner-all',isPanelSelected).toggleClass('accordion-header-active ui-state-active ui-corner-top',!isPanelSelected).attr('aria-selected',((!isPanelSelected).toString()));

        // Toggle the panel's icon
        currHeader.children('.ui-icon').toggleClass('ui-icon-triangle-1-e',isPanelSelected).toggleClass('ui-icon-triangle-1-s',!isPanelSelected);

         // Toggle the panel's content
        currContent.toggleClass('accordion-content-active',!isPanelSelected)    
        if (isPanelSelected) { currContent.slideUp(); }  else { currContent.slideDown(); }

        return false; // Cancel the default action
    }
});




	
	// color picker
	if(jQuery('#colorpicker').length > 0) {
		jQuery('#colorSelector').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				jQuery('#colorSelector span').css('backgroundColor', '#' + hex);
				jQuery('#colorpicker').val('#'+hex);
			}
		});
	}

	
	// date picker
	if(jQuery('#datepicker').length > 0)
		jQuery( "#datepicker" ).datepicker();
		
	
	// growl notification
	if(jQuery('#growl').length > 0) {
		jQuery('#growl').click(function(){
			jQuery.jGrowl("Hello world!");
		});
	}
	
	// another growl notification
	if(jQuery('#growl2').length > 0) {
		jQuery('#growl2').click(function(){
			var msg = "This notification will live a little longer.";
			jQuery.jGrowl(msg, { life: 5000});
		});
	}

	// basic alert box
	if(jQuery('.alertboxbutton').length > 0) {
		jQuery('.alertboxbutton').click(function(){
			jAlert('This is a custom alert box', 'Alert Dialog');
		});
	}
	
	// confirm box
	if(jQuery('.confirmbutton').length > 0) {
		jQuery('.confirmbutton').click(function(){
			jConfirm('Can you confirm this?', 'Confirmation Dialog', function(r) {
				jAlert('Confirmed: ' + r, 'Confirmation Results');
			});
		});
	}
	
	// promptbox
	if(jQuery('.promptbutton').length > 0) {
		jQuery('.promptbutton').click
		(function(){
			jPrompt('Type something:', 'Prefilled value', 'Prompt Dialog', function(r) {
				if( r ) alert('You entered ' + r);
			});
		});
	}
	
	// alert with html
	if(jQuery('.alerthtmlbutton').length > 0) {
		jQuery('.alerthtmlbutton').click(function(){
			jAlert('You can use HTML, such as <strong>bold</strong>, <em>italics</em>, and <u>underline</u>!');
		});
	}
	
	// sortable list
	if(jQuery('#sortable').length > 0)
		jQuery("#sortable").sortable();
	
	// sortable list with content-->
	if(jQuery('#sortable2').length > 0) {
		jQuery("#sortable2").sortable();
		jQuery('.showcnt').click(function(){
			var t = jQuery(this);
			var det = t.parents('li').find('.details');
			if(!det.is(':visible')) {
				det.slideDown();
				t.removeClass('icon-arrow-down').addClass('icon-arrow-up');
			} else {
				det.slideUp();
				t.removeClass('icon-arrow-up').addClass('icon-arrow-down');
			}
		});
	}
	
	// tooltip sample
	if(jQuery('.tooltipsample').length > 0)
		jQuery('.tooltipsample').tooltip({selector: "a[rel=tooltip]"});
		
	jQuery('.popoversample').popover({selector: 'a[rel=popover]', trigger: 'hover'});
	
	
	
	///// MESSAGES /////	
	
	if(jQuery('.mailinbox').length > 0) {
		
		// star
		jQuery('.msgstar').click(function(){
			if(jQuery(this).hasClass('starred'))
				jQuery(this).removeClass('starred');
			else
				jQuery(this).addClass('starred');
		});
		
		//add class selected to table row when checked
		jQuery('.mailinbox tbody input:checkbox').click(function(){
			if(jQuery(this).is(':checked'))
				jQuery(this).parents('tr').addClass('selected');
			else
				jQuery(this).parents('tr').removeClass('selected');
		});
		
		// trash
		if(jQuery('.msgtrash').length > 0) {
			jQuery('.msgtrash').click(function(){
				var c = false;
				var cn = 0;
				var o = new Array();
				jQuery('.mailinbox input:checkbox').each(function(){
					if(jQuery(this).is(':checked')) {
						c = true;
						o[cn] = jQuery(this);
						cn++;
					}
				});
				if(!c) {
					alert('No selected message');	
				} else {
					var msg = (o.length > 1)? 'messages' : 'message';
					if(confirm('Delete '+o.length+' '+msg+'?')) {
						for(var a=0;a<cn;a++) {
							jQuery(o[a]).parents('tr').remove();	
						}
					}
				}
			});
		}
	}

	
	// change layout
	jQuery('.skin-layout').click(function(){
		jQuery('.skin-layout').each(function(){ jQuery(this).parent().removeClass('selected'); });
		jQuery(this).parent().addClass('selected');
		if(jQuery(this).hasClass('fixed'))
			jQuery('.mainwrapper').removeClass('fullwrapper');
		else
			jQuery('.mainwrapper').addClass('fullwrapper');
		return false;
	});
	
	// change skin color
	jQuery('.skin-color').click(function(){
		var s = jQuery(this).attr('href');
		if(jQuery('#skinstyle').length > 0) {
			if(s!='default')
				jQuery('#skinstyle').attr('href','css/style.'+s+'.css');	
			else
				jQuery('#skinstyle').remove();
		} else {
			if(s!='default')
				jQuery('head').append('<link id="skinstyle" rel="stylesheet" href="css/style.'+s+'.css" type="text/css" />');
		}
		return false;
	});

    jQuery('.leftmenu .nav-tabs > li').click(function(){
         
        jQuery('.leftmenu .nav-tabs li').removeClass('active');
        jQuery(this).addClass('active');
    });
});