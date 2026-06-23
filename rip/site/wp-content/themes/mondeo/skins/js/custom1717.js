/*******************************************************************************
 * 01. DDsmoothmenu
 * The drop menu for theme.
*******************************************************************************/
ddsmoothmenu.init({
	mainmenuid: "header-menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
});




/*******************************************************************************
 * 02. Open links in new window
*******************************************************************************/
jQuery(function() {
	jQuery('a[rel*=external]').click( function() {
		window.open(this.href);
		return false;
	});
});



/*******************************************************************************
 * 03. Tooltips for SocialMedia
*******************************************************************************/
jQuery(document).ready(function($){
	jQuery('#topmedia li').hover(function(){
		jQuery('.tooltip', this).css({
			opacity: 0.5,
			display: 'block',
			top: '5px'
		}).animate({
			opacity: 1,
			top: '0px'
		},{
			duration: 300
		});
	},function(){
		jQuery('.tooltip', this).animate({
			opacity: 0,
			top: '-5px'
		},{
			duration: 300,
			complete: function(){
				jQuery(this).hide();
			}
		});
	});
});



/*******************************************************************************
 * 05. Lightbox Image Hover 
*******************************************************************************/
/*Normal Lightbox Image Hover */
function ht_fade() {

	jQuery(document).ready(function(){
			jQuery(".thumb-fade .fade-hover").hover(function(){
			jQuery(this).fadeTo(500, 0.6); // This should set the opacity to 100% on hover
			},function(){
			jQuery(this).fadeTo(600, 0); // This should set the opacity back to 60% on mouseout
			}).fadeTo(0, 0);
	});

}
ht_fade();



/* Flickr Lightbox */
jQuery(document).ready(function() {
	jQuery('.flickr_badge_image a').each(function(i){
		var src = jQuery(this).find('img').attr('src');
		var title = jQuery(this).find('img').attr('title');
		var src2 = src.replace(/_s.jpg/g, '.jpg');
		jQuery(this).removeAttr('href');
		jQuery(this).attr({
			href: src2,
			title: title,
			rel: 'tag[Flickr]'
		});
	});
});




/*******************************************************************************
 * 06. Lists Lightbox
*******************************************************************************/

function ht_move() {

	jQuery(document).ready(function () {

		//Hoverflow
		jQuery('.thumb-move figure')
		.hover(function(e) {
			jQuery(this).hoverFlow(e.type, { top: -10 }, 500);
		}, function(e) {
			jQuery(this).hoverFlow(e.type, { top: 0 }, 300);
		});

	});	

}

ht_move();


/*******************************************************************************
 * 07. Image Preloader
*******************************************************************************/
/*Flickr image preloader*/
jQuery(function () {
		jQuery('.flickr_badge_image img').hide();//hide all the images on the page
		});
		
		var i = 0;//initialize
		var int=0;//Internet Explorer Fix
		jQuery(window).bind("load", function() {//The load event will only fire if the entire page or document is fully loaded
			var int = setInterval("doThis(i)",300);//500 is the fade in speed in milliseconds
		});

		function doThis() {
			var imgs = jQuery('.flickr_badge_image img').length;//count the number of images on the page
			if (i >= imgs) {// Loop the images
				clearInterval(int);//When it reaches the last image the loop ends
		}
		jQuery('.flickr_badge_image img:hidden').eq(0).fadeIn(300);//fades in the hidden images one by one
		i++;//add 1 to the count
}


/*All image preloader*/
jQuery(function(){
	var $imgContainerClass = '.thumb-preloader';
	var $images = jQuery($imgContainerClass+' a img');
	var $max = $images.length;
	jQuery('a.preloader').each(function(){
		jQuery('<span class="image-loading" />').prependTo(jQuery(this));
	});
	$images.remove();
	if ($max > 0){
		LoadImage(0, $max);
	}
	function LoadImage(index, $max){
		if (index < $max){
			jQuery('<span id="img'+(index+1)+'" />').each(function(){
				jQuery(this).prependTo(jQuery('a.preloader .image-loading').eq(index));
			});
			var $img = new Image();
			var $curr = jQuery('#img'+(index+1));
			jQuery($img).load(function(){
				jQuery(this).css({display: 'none', opacity: 0});
				jQuery($curr).append(this);
				jQuery(this).css({display: 'block'}).animate({opacity: 1}, 300, function(){
					jQuery(this).parent().css({backgroundImage: 'none'});
					if (index == ($max-1)){
					} else {
						LoadImage(index+1, $max);
					}
				});
			}).error(function(){
				jQuery($curr).remove();
				LoadImage(index+1, $max);
			}).attr({
				src: jQuery($images[index]).attr('src'), 
				title: jQuery($images[index]).attr('title'), 
				alt: jQuery($images[index]).attr('alt')
			}).addClass(jQuery($images[index]).attr('class'));
		}
	}
});



/*******************************************************************************
 * 08. Pretty Photo Lighbox 
 animationSpeed:'slow', 
 opacity: 0.5, 
 slideshow:2000, 
 autoplay_slideshow: true,
 allowresize: true,
 show_title:false,
 deeplinking: false,
*******************************************************************************/

function ht_prettyPhoto() {
	jQuery(document).ready(function() {
		jQuery(".widget a[rel^='tag'], .post-lists a[rel^='tag'], .related-posts a[rel^='tag'], .post-text a[rel^='tag'], .post-text a[rel^='prettyPhoto']").prettyPhoto({
				animationSpeed:'fast',
				slideshow:3000,
				show_title:false,
				deeplinking: false,
				opacity: 0.9
		});

		jQuery(".flickr_badge_image a[rel^='tag']").prettyPhoto({
				animationSpeed:'fast',
				slideshow:5000,
				autoplay_slideshow: true,
				show_title:false,
				deeplinking: false,
				opacity: 0.9
		});
		
		jQuery(".wp-caption a").attr("rel", "prettyPhoto[galeria]");

		jQuery(".gallery-icon a, .wp-caption a").prettyPhoto({
				animationSpeed:'fast',
				slideshow:5000,
				show_title:false,
				deeplinking: false,
				opacity: 0.9
		});
	});
}

ht_prettyPhoto();



/*******************************************************************************
 * 09. blockquote code
*******************************************************************************/
jQuery(document).ready(function(){

	if (jQuery('code').length > 0){ 
		jQuery('code').each(function(i){ 
			jQuery(this).html(jQuery(this).html().replace(/{/g, '[').replace(/}/g, ']')); 
		}); 
	} //Code

});




/*******************************************************************************
 * 10.Shortcodes Javascript 
*******************************************************************************/
//Scroll Top
jQuery(document).ready(function(){
	jQuery('.divider a').click(function(){
		jQuery('html, body').animate({scrollTop:0}, 'slow');
		return false;
	});
});


// Message box - close buttons
jQuery(document).ready(function(){
	jQuery('.message-box .closebox').click( function() {
		jQuery(this).parent('.message-box').fadeTo(400, 0.001).slideUp();
	});
});


// Tooltip & Learn more
(function($){
	//tooltip
	$et_tooltip = $('.tooltip');
	$et_tooltip.live('mouseover mouseout', function(event){
		if (event.type == 'mouseover') {
			$(this).find('.tooltip-box').animate({ opacity: 'show', bottom: '35px' }, 300);
		} else {
			$(this).find('.tooltip-box').animate({ opacity: 'hide', bottom: '45px' }, 300);
		}
	});
	
})(jQuery);


//Tabs &Toggle
jQuery(document).ready(function() {

	//Tabs
	jQuery(".tabs-wrap").each( function(e){
		jQuery("ul.tabs").jttabs("div.panes > div", {tabs:'li',effect: 'fade', fadeOutSpeed: -400});
		return false;
	});


	//Toggle	
    jQuery(".toggle").each(function(){		
		    jQuery(this).find(".inner").hide();		
	});
		
	jQuery(".toggle").each(function(){	
		
		 jQuery(this).find("h3").click(function() {
			jQuery(this).toggleClass("toggled").next().stop(true, true).slideToggle(100);
			return false;
		 });		
    });

});






/*******************************************************************************
 * 11. Input Text
 * Clear Default Text: functions for clearing and replacing default text in
 * <input> elements.
 * by Ross Shannon, http://www.yourhtmlsource.com/
*******************************************************************************/
//Cross-browser event handling, by Scott Andrew

function addEvent(element, eventType, lamdaFunction, useCapture) {
    if (element.addEventListener) {
        element.addEventListener(eventType, lamdaFunction, useCapture);
        return true;
    } else if (element.attachEvent) {
        var r = element.attachEvent('on' + eventType, lamdaFunction);
        return r;
    } else {
        return false;
    }
}


addEvent(window, 'load', init, false);

function init() {
    var formInputs = document.getElementsByTagName('input');
    for (var i = 0; i < formInputs.length; i++) {
        var theInput = formInputs[i];
        
        if (theInput.type == 'text' && theInput.className.match(/\bcleardefault\b/)) {  
            /* Add event handlers */          
            addEvent(theInput, 'focus', clearDefaultText, false);
            addEvent(theInput, 'blur', replaceDefaultText, false);
            
            /* Save the current value */
            if (theInput.value != '') {
                theInput.defaultText = theInput.value;
            }
        }
    }
}

function clearDefaultText(e) {
    var target = window.event ? window.event.srcElement : e ? e.target : null;
    if (!target) return;
    
    if (target.value == target.defaultText) {
        target.value = '';
    }
}

function replaceDefaultText(e) {
    var target = window.event ? window.event.srcElement : e ? e.target : null;
    if (!target) return;
    
    if (target.value == '' && target.defaultText) {
        target.value = target.defaultText;
    }
}



/*******************************************************************************
 * 12. Sortable Portfolio 
*******************************************************************************/
/*
jQuery(document).ready(function() {

	jQuery(".sortable > li:first > a").addClass('active');
	jQuery(".sortable > li > a").click(function(e){
		  e.preventDefault();
		  jQuery(".sortable > li > a").addClass("active").not(this).removeClass("active");
	});

});
*/


jQuery(window).load(function(){
        jQuery('#items').isotope({
            // options
            itemSelector : 'li'
        });
        jQuery('#filters a').click(function(){
            var selector = jQuery(this).attr('data-filter');
            jQuery('#items').isotope({ filter: selector });
            return false;
        });
        
});