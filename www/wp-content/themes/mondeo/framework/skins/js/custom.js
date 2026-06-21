/*******************************************************************************
 * 01. Tabs
 *
*******************************************************************************/ 
jQuery(document).ready(function($){
        
        // Navigation Tabs
         jQuery("a.ht-nav").click(function () {
        	 jQuery(".ht-nav-active").removeClass("ht-nav-active");
        	 jQuery(this).addClass("ht-nav-active");
        	 jQuery(".ht-tab").hide();
        	var change_content= $(this).attr("id");
        	 jQuery("."+change_content).fadeIn();
			 return false;
        });

});



/*******************************************************************************
 * 02. IMAGE SELECT
 *
*******************************************************************************/
jQuery(document).ready(function(){
	jQuery('.ht-radio-img-img').click(function(){
			jQuery(this).parent().parent().find('.ht-radio-img-img').removeClass('ht-radio-img-selected');
			jQuery(this).addClass('ht-radio-img-selected');
			
		});
		jQuery('.ht-radio-img-label').hide();
		jQuery('.ht-radio-img-img').show();
		jQuery('.ht-radio-img-radio').hide();
});



/*******************************************************************************
 * 03. ON OFF CheckBox
 *
*******************************************************************************/
jQuery(window).load(function() {
		jQuery('.section-on-off :checkbox').iphoneStyle();
});



/*******************************************************************************
 * 04. Range Input
 *
*******************************************************************************/
jQuery(document).ready(function(){
		jQuery(".range-input-wrap :range").rangeinput();
});


/*******************************************************************************
 * 05. New Blank
 *
*******************************************************************************/
jQuery(function() {
	jQuery('a[rel*=external]').click( function() {
		window.open(this.href);
		return false;
	});
});



/*******************************************************************************
 * 06. Font Preview
 *
*******************************************************************************/
jQuery.noConflict()(function($){

    jQuery(document).ready(function(){
        
        //Body font preview
		var body_fonts = new Array();
		
		body_fonts['arial'] = 'Arial, "Helvetica Neue", Helvetica, sans-serif';
		body_fonts['baskerville'] = 'Baskerville, "Times New Roman", Times, serif';
		body_fonts['cambria'] = 'Cambria, Georgia, Times, "Times New Roman", serif';
		body_fonts['century-gothic'] = '"Century Gothic", "Apple Gothic", sans-serif';
		body_fonts['consolas'] = 'Consolas, "Lucida Console", Monaco, monospace';
		body_fonts['copperplate-light'] = '"Copperplate Light", "Copperplate Gothic Light", serif';
		body_fonts['courier-new'] = '"Courier New", Courier, monospace';
		body_fonts['droid-sans'] = '"Droid Sans",Arial,Verdana,sans-serif';
		body_fonts['franklin'] = '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif';
		body_fonts['futura'] = 'Futura, "Century Gothic", AppleGothic, sans-serif';
		body_fonts['garamond'] = 'Garamond, "Hoefler Text", Times New Roman, Times, serif';
		body_fonts['geneva'] = 'Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif';
		body_fonts['georgia'] = 'Georgia, Palatino," Palatino Linotype", Times, "Times New Roman", serif';
		body_fonts['gill-sans'] = '"Gill Sans", Calibri, "Trebuchet MS", sans-serif';
		body_fonts['helvetica'] = '"Helvetica Neue", Arial, Helvetica, sans-serif';
		body_fonts['impact'] = 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif';
		body_fonts['lucida'] = '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif'
		body_fonts['palatino'] = 'Palatino, "Palatino Linotype", Georgia, Times, "Times New Roman", serif';
		body_fonts['tahoma'] = 'Tahoma, Geneva, Verdana';
		body_fonts['times'] = 'Times, "Times New Roman", Georgia, serif';
		body_fonts['trebuchet'] = '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif';
		body_fonts['verdana'] = 'Verdana, Geneva, Tahoma, sans-serif';
		
		jQuery('#ht_mon_body_font_family_preview select').change(function() {
		  	
		  	var selected_body_font = jQuery('#ht_mon_body_font_family_preview select option:selected').val();
		  	jQuery('#ht_mon_body_font_family_preview .ht-font-preview').css('font-family', body_fonts[selected_body_font] );
		  	
        });
        
        //Header font preview
		jQuery('#ht_mon_headers_font_family_preview select').change(function() {

			jQuery('.temp-header-font').remove();

		  	var selected_header_font = $('#ht_mon_headers_font_family_preview select option:selected').val();
		  	
		  	if(selected_header_font == 'none'){
		  		
		  		if(!selected_body_font){
		  			var selected_body_font = $('#ht_mon_headers_font_family_preview select option:selected').val();
		  		}
		  		
		  		jQuery('#ht_mon_headers_font_family_preview .ht-header-font-preview').css('font-family', body_fonts[selected_body_font] );
		  		
		  	} else {
		  	
		  		var google_include = '<link href="https://fonts.googleapis.com/css?family=' + selected_header_font + '" rel="stylesheet" type="text/css" class="temp-header-font" />';
		  	
			  	jQuery('#ht_mon_headers_font_family_preview').prepend(google_include);
			  	
			  	selected_header_font = selected_header_font.replace(/\+/g, " ");
			  	selected_header_font = selected_header_font.split(":");
			  	selected_header_font = selected_header_font[0];
			  	
			  	jQuery('#ht_mon_headers_font_family_preview .ht-header-font-preview').css('font-family', selected_header_font );
		  	
		  	}
		  	
        });

		
    });

});
