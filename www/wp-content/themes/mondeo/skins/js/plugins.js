/*******************************************************************************
 * 01. DDsmoothmenu v1.5
 * The drop menu for theme.
 * Smooth Navigational Menu- By Dynamic Drive DHTML code library: http://www.dynamicdrive.com
 * Script Download/ instructions page: http://www.dynamicdrive.com/dynamicindex1/ddlevelsmenu/
 * Dec 17th, 10" (v1.5): Updated menu shadow to use CSS3 box shadows when the browser is FF3.5+, IE9+, Opera9.5+, or Safari3+/Chrome. Only .js file *changed.
*******************************************************************************/

var ddsmoothmenu={arrowimages:{down:['downarrowclass','down.gif',0],right:['rightarrowclass','right.gif']},transition:{overtime:300,outtime:300},shadow:{enable:false,offsetx:5,offsety:5},showhidedelay:{showdelay:100,hidedelay:200},detectwebkit:navigator.userAgent.toLowerCase().indexOf("applewebkit")!=-1,detectie6:document.all&&!window.XMLHttpRequest,css3support:window.msPerformance||(!document.all&&document.querySelector),getajaxmenu:function($,setting){var $menucontainer=$('#'+setting.contentsource[0])
$menucontainer.html("Loading Menu...")
$.ajax({url:setting.contentsource[1],async:true,error:function(ajaxrequest){$menucontainer.html('Error fetching content. Server Response: '+ajaxrequest.responseText)},success:function(content){$menucontainer.html(content)
ddsmoothmenu.buildmenu($,setting)}})},buildmenu:function($,setting){var smoothmenu=ddsmoothmenu
var $mainmenu=$("#"+setting.mainmenuid+">ul")
$mainmenu.parent().get(0).className=setting.classname||"ddsmoothmenu"
var $headers=$mainmenu.find("ul").parent()
$headers.hover(function(e){$(this).children('a:eq(0)').addClass('selected')},function(e){$(this).children('a:eq(0)').removeClass('selected')})
$headers.each(function(i){var $curobj=$(this).css({zIndex:100-i})
var $subul=$(this).find('ul:eq(0)').css({display:'block'})
$subul.data('timers',{})
this._dimensions={w:this.offsetWidth,h:this.offsetHeight,subulw:$subul.outerWidth(),subulh:$subul.outerHeight()}
this.istopheader=$curobj.parents("ul").length==1?true:false
$subul.css({top:this.istopheader&&setting.orientation!='v'?this._dimensions.h+"px":0})
$curobj.children("a:eq(0)").css(this.istopheader?{paddingRight:smoothmenu.arrowimages.down[2]}:{}).append('<div class="'+(this.istopheader&&setting.orientation!='v'?smoothmenu.arrowimages.down[0]:smoothmenu.arrowimages.right[0])+'"></div>')
if(smoothmenu.shadow.enable&&!smoothmenu.css3support){this._shadowoffset={x:(this.istopheader?$subul.offset().left+smoothmenu.shadow.offsetx:this._dimensions.w),y:(this.istopheader?$subul.offset().top+smoothmenu.shadow.offsety:$curobj.position().top)}
if(this.istopheader)
$parentshadow=$(document.body)
else{var $parentLi=$curobj.parents("li:eq(0)")
$parentshadow=$parentLi.get(0).$shadow}
this.$shadow=$('<div class="ddshadow'+(this.istopheader?' toplevelshadow':'')+'"></div>').prependTo($parentshadow).css({left:this._shadowoffset.x+'px',top:this._shadowoffset.y+'px'})}
$curobj.hover(function(e){var $targetul=$subul
var header=$curobj.get(0)
clearTimeout($targetul.data('timers').hidetimer)
$targetul.data('timers').showtimer=setTimeout(function(){header._offsets={left:$curobj.offset().left,top:$curobj.offset().top}
var menuleft=header.istopheader&&setting.orientation!='v'?0:header._dimensions.w
menuleft=(header._offsets.left+menuleft+header._dimensions.subulw>$(window).width())?(header.istopheader&&setting.orientation!='v'?-header._dimensions.subulw+header._dimensions.w:-header._dimensions.w):menuleft
if($targetul.queue().length<=1){$targetul.css({left:menuleft+"px",width:header._dimensions.subulw+'px'}).animate({height:'show',opacity:'show'},ddsmoothmenu.transition.overtime)
if(smoothmenu.shadow.enable&&!smoothmenu.css3support){var shadowleft=header.istopheader?$targetul.offset().left+ddsmoothmenu.shadow.offsetx:menuleft
var shadowtop=header.istopheader?$targetul.offset().top+smoothmenu.shadow.offsety:header._shadowoffset.y
if(!header.istopheader&&ddsmoothmenu.detectwebkit){header.$shadow.css({opacity:1})}
header.$shadow.css({overflow:'',width:header._dimensions.subulw+'px',left:shadowleft+'px',top:shadowtop+'px'}).animate({height:header._dimensions.subulh+'px'},ddsmoothmenu.transition.overtime)}}},ddsmoothmenu.showhidedelay.showdelay)},function(e){var $targetul=$subul
var header=$curobj.get(0)
clearTimeout($targetul.data('timers').showtimer)
$targetul.data('timers').hidetimer=setTimeout(function(){$targetul.animate({height:'hide',opacity:'hide'},ddsmoothmenu.transition.outtime)
if(smoothmenu.shadow.enable&&!smoothmenu.css3support){if(ddsmoothmenu.detectwebkit){header.$shadow.children('div:eq(0)').css({opacity:0})}
header.$shadow.css({overflow:'hidden'}).animate({height:0},ddsmoothmenu.transition.outtime)}},ddsmoothmenu.showhidedelay.hidedelay)})})
if(smoothmenu.shadow.enable&&smoothmenu.css3support){var $toplevelul=$('#'+setting.mainmenuid+' ul li ul')
var css3shadow=parseInt(smoothmenu.shadow.offsetx)+"px "+parseInt(smoothmenu.shadow.offsety)+"px 5px #aaa"
var shadowprop=["boxShadow","MozBoxShadow","WebkitBoxShadow","MsBoxShadow"]
for(var i=0;i<shadowprop.length;i++){$toplevelul.css(shadowprop[i],css3shadow)}}
$mainmenu.find("ul").css({display:'none',visibility:'visible'})},init:function(setting){if(typeof setting.customtheme=="object"&&setting.customtheme.length==2){var mainmenuid='#'+setting.mainmenuid
var mainselector=(setting.orientation=="v")?mainmenuid:mainmenuid+', '+mainmenuid
document.write('<style type="text/css">\n'
+mainselector+' ul li a {background:'+setting.customtheme[0]+';}\n'
+mainmenuid+' ul li a:hover {background:'+setting.customtheme[1]+';}\n'
+'</style>')}
this.shadow.enable=(document.all&&!window.XMLHttpRequest)?false:this.shadow.enable
jQuery(document).ready(function($){if(typeof setting.contentsource=="object"){ddsmoothmenu.getajaxmenu($,setting)}
else{ddsmoothmenu.buildmenu($,setting)}})}};



/*******************************************************************************
  * 02. jQuery Nivo Slider v2.5.1
  * http://nivo.dev7studios.com
  *
  * Copyright 2011, Gilbert Pellegrom
  * Free to use and abuse under the MIT license.
  * http://www.opensource.org/licenses/mit-license.php
  * 
  * March 2010
  slider.append($('<div class="nivo-caption"><p></p></div>').css({display:'none',opacity:settings.captionOpacity}));
  ->
   var styles={display:'none'};if(settings.captionOpacity*1<1)styles.opacity=settings.captionOpacity;slider.append($('<div class="nivo-caption"><p></p></div>').css(styles));
*******************************************************************************/
(function($){var NivoSlider=function(element,options){var settings=$.extend({},$.fn.nivoSlider.defaults,options);var vars={currentSlide:0,currentImage:'',totalSlides:0,randAnim:'',running:false,paused:false,stop:false};var slider=$(element);slider.data('nivo:vars',vars);slider.css('position','relative');slider.addClass('nivoSlider');var kids=slider.children();kids.each(function(){var child=$(this);var link='';if(!child.is('img')){if(child.is('a')){child.addClass('nivo-imageLink');link=child;}
child=child.find('img:first');}
var childWidth=child.width();if(childWidth==0)childWidth=child.attr('width');var childHeight=child.height();if(childHeight==0)childHeight=child.attr('height');if(childWidth>slider.width()){slider.width(childWidth);}
if(childHeight>slider.height()){slider.height(childHeight);}
if(link!=''){link.css('display','none');}
child.css('display','none');vars.totalSlides++;});if(settings.startSlide>0){if(settings.startSlide>=vars.totalSlides)settings.startSlide=vars.totalSlides-1;vars.currentSlide=settings.startSlide;}
if($(kids[vars.currentSlide]).is('img')){vars.currentImage=$(kids[vars.currentSlide]);}else{vars.currentImage=$(kids[vars.currentSlide]).find('img:first');}
if($(kids[vars.currentSlide]).is('a')){$(kids[vars.currentSlide]).css('display','block');}
slider.css('background','url("'+vars.currentImage.attr('src')+'") no-repeat');var styles={display:'none'};if(settings.captionOpacity*1<1)styles.opacity=settings.captionOpacity;slider.append($('<div class="nivo-caption"><p></p></div>').css(styles));var processCaption=function(settings){var nivoCaption=$('.nivo-caption',slider);if(vars.currentImage.attr('title')!=''){var title=vars.currentImage.attr('title');if(title.substr(0,1)=='#')title=$(title).html();if(nivoCaption.css('display')=='block'){nivoCaption.find('p').fadeOut(settings.animSpeed,function(){$(this).html(title);$(this).fadeIn(settings.animSpeed);});}else{nivoCaption.find('p').html(title);}
nivoCaption.fadeIn(settings.animSpeed);}else{nivoCaption.fadeOut(settings.animSpeed);}}
processCaption(settings);var timer=0;if(!settings.manualAdvance&&kids.length>1){timer=setInterval(function(){nivoRun(slider,kids,settings,false);},settings.pauseTime);}
if(settings.directionNav){slider.append('<div class="nivo-directionNav"><a class="nivo-prevNav">'+settings.prevText+'</a><a class="nivo-nextNav">'+settings.nextText+'</a></div>');if(settings.directionNavHide){$('.nivo-directionNav',slider).hide();slider.hover(function(){$('.nivo-directionNav',slider).show();},function(){$('.nivo-directionNav',slider).hide();});}
$('a.nivo-prevNav',slider).live('click',function(){if(vars.running)return false;clearInterval(timer);timer='';vars.currentSlide-=2;nivoRun(slider,kids,settings,'prev');});$('a.nivo-nextNav',slider).live('click',function(){if(vars.running)return false;clearInterval(timer);timer='';nivoRun(slider,kids,settings,'next');});}
if(settings.controlNav){var nivoControl=$('<div class="nivo-controlNav"></div>');slider.append(nivoControl);for(var i=0;i<kids.length;i++){if(settings.controlNavThumbs){var child=kids.eq(i);if(!child.is('img')){child=child.find('img:first');}
if(settings.controlNavThumbsFromRel){nivoControl.append('<a class="nivo-control" rel="'+i+'"><img src="'+child.attr('rel')+'" alt="" /></a>');}else{nivoControl.append('<a class="nivo-control" rel="'+i+'"><img src="'+child.attr('src').replace(settings.controlNavThumbsSearch,settings.controlNavThumbsReplace)+'" alt="" /></a>');}}else{nivoControl.append('<a class="nivo-control" rel="'+i+'">'+(i+1)+'</a>');}}
$('.nivo-controlNav a:eq('+vars.currentSlide+')',slider).addClass('active');$('.nivo-controlNav a',slider).live('click',function(){if(vars.running)return false;if($(this).hasClass('active'))return false;clearInterval(timer);timer='';slider.css('background','url("'+vars.currentImage.attr('src')+'") no-repeat');vars.currentSlide=$(this).attr('rel')-1;nivoRun(slider,kids,settings,'control');});}
if(settings.keyboardNav){$(window).keypress(function(event){if(event.keyCode=='37'){if(vars.running)return false;clearInterval(timer);timer='';vars.currentSlide-=2;nivoRun(slider,kids,settings,'prev');}
if(event.keyCode=='39'){if(vars.running)return false;clearInterval(timer);timer='';nivoRun(slider,kids,settings,'next');}});}
if(settings.pauseOnHover){slider.hover(function(){vars.paused=true;clearInterval(timer);timer='';},function(){vars.paused=false;if(timer==''&&!settings.manualAdvance){timer=setInterval(function(){nivoRun(slider,kids,settings,false);},settings.pauseTime);}});}
slider.bind('nivo:animFinished',function(){vars.running=false;$(kids).each(function(){if($(this).is('a')){$(this).css('display','none');}});if($(kids[vars.currentSlide]).is('a')){$(kids[vars.currentSlide]).css('display','block');}
if(timer==''&&!vars.paused&&!settings.manualAdvance){timer=setInterval(function(){nivoRun(slider,kids,settings,false);},settings.pauseTime);}
settings.afterChange.call(this);});var createSlices=function(slider,settings,vars){for(var i=0;i<settings.slices;i++){var sliceWidth=Math.round(slider.width()/settings.slices);if(i==settings.slices-1){slider.append($('<div class="nivo-slice"></div>').css({left:(sliceWidth*i)+'px',width:(slider.width()-(sliceWidth*i))+'px',height:'0px',opacity:'0',background:'url("'+vars.currentImage.attr('src')+'") no-repeat -'+((sliceWidth+(i*sliceWidth))-sliceWidth)+'px 0%'}));}else{slider.append($('<div class="nivo-slice"></div>').css({left:(sliceWidth*i)+'px',width:sliceWidth+'px',height:'0px',opacity:'0',background:'url("'+vars.currentImage.attr('src')+'") no-repeat -'+((sliceWidth+(i*sliceWidth))-sliceWidth)+'px 0%'}));}}}
var createBoxes=function(slider,settings,vars){var boxWidth=Math.round(slider.width()/settings.boxCols);var boxHeight=Math.round(slider.height()/settings.boxRows);for(var rows=0;rows<settings.boxRows;rows++){for(var cols=0;cols<settings.boxCols;cols++){if(cols==settings.boxCols-1){slider.append($('<div class="nivo-box"></div>').css({opacity:0,left:(boxWidth*cols)+'px',top:(boxHeight*rows)+'px',width:(slider.width()-(boxWidth*cols))+'px',height:boxHeight+'px',background:'url("'+vars.currentImage.attr('src')+'") no-repeat -'+((boxWidth+(cols*boxWidth))-boxWidth)+'px -'+((boxHeight+(rows*boxHeight))-boxHeight)+'px'}));}else{slider.append($('<div class="nivo-box"></div>').css({opacity:0,left:(boxWidth*cols)+'px',top:(boxHeight*rows)+'px',width:boxWidth+'px',height:boxHeight+'px',background:'url("'+vars.currentImage.attr('src')+'") no-repeat -'+((boxWidth+(cols*boxWidth))-boxWidth)+'px -'+((boxHeight+(rows*boxHeight))-boxHeight)+'px'}));}}}}
var nivoRun=function(slider,kids,settings,nudge){var vars=slider.data('nivo:vars');if(vars&&(vars.currentSlide==vars.totalSlides-1)){settings.lastSlide.call(this);}
if((!vars||vars.stop)&&!nudge)return false;settings.beforeChange.call(this);if(!nudge){slider.css('background','url("'+vars.currentImage.attr('src')+'") no-repeat');}else{if(nudge=='prev'){slider.css('background','url("'+vars.currentImage.attr('src')+'") no-repeat');}
if(nudge=='next'){slider.css('background','url("'+vars.currentImage.attr('src')+'") no-repeat');}}
vars.currentSlide++;if(vars.currentSlide==vars.totalSlides){vars.currentSlide=0;settings.slideshowEnd.call(this);}
if(vars.currentSlide<0)vars.currentSlide=(vars.totalSlides-1);if($(kids[vars.currentSlide]).is('img')){vars.currentImage=$(kids[vars.currentSlide]);}else{vars.currentImage=$(kids[vars.currentSlide]).find('img:first');}
if(settings.controlNav){$('.nivo-controlNav a',slider).removeClass('active');$('.nivo-controlNav a:eq('+vars.currentSlide+')',slider).addClass('active');}
processCaption(settings);$('.nivo-slice',slider).remove();$('.nivo-box',slider).remove();if(settings.effect=='random'){var anims=new Array('sliceDownRight','sliceDownLeft','sliceUpRight','sliceUpLeft','sliceUpDown','sliceUpDownLeft','fold','fade','boxRandom','boxRain','boxRainReverse','boxRainGrow','boxRainGrowReverse');vars.randAnim=anims[Math.floor(Math.random()*(anims.length+1))];if(vars.randAnim==undefined)vars.randAnim='fade';}
if(settings.effect.indexOf(',')!=-1){var anims=settings.effect.split(',');vars.randAnim=anims[Math.floor(Math.random()*(anims.length))];if(vars.randAnim==undefined)vars.randAnim='fade';}
vars.running=true;if(settings.effect=='sliceDown'||settings.effect=='sliceDownRight'||vars.randAnim=='sliceDownRight'||settings.effect=='sliceDownLeft'||vars.randAnim=='sliceDownLeft'){createSlices(slider,settings,vars);var timeBuff=0;var i=0;var slices=$('.nivo-slice',slider);if(settings.effect=='sliceDownLeft'||vars.randAnim=='sliceDownLeft')slices=$('.nivo-slice',slider)._reverse();slices.each(function(){var slice=$(this);slice.css({'top':'0px'});if(i==settings.slices-1){setTimeout(function(){slice.animate({height:'100%',opacity:'1.0'},settings.animSpeed,'',function(){slider.trigger('nivo:animFinished');});},(100+timeBuff));}else{setTimeout(function(){slice.animate({height:'100%',opacity:'1.0'},settings.animSpeed);},(100+timeBuff));}
timeBuff+=50;i++;});}
else if(settings.effect=='sliceUp'||settings.effect=='sliceUpRight'||vars.randAnim=='sliceUpRight'||settings.effect=='sliceUpLeft'||vars.randAnim=='sliceUpLeft'){createSlices(slider,settings,vars);var timeBuff=0;var i=0;var slices=$('.nivo-slice',slider);if(settings.effect=='sliceUpLeft'||vars.randAnim=='sliceUpLeft')slices=$('.nivo-slice',slider)._reverse();slices.each(function(){var slice=$(this);slice.css({'bottom':'0px'});if(i==settings.slices-1){setTimeout(function(){slice.animate({height:'100%',opacity:'1.0'},settings.animSpeed,'',function(){slider.trigger('nivo:animFinished');});},(100+timeBuff));}else{setTimeout(function(){slice.animate({height:'100%',opacity:'1.0'},settings.animSpeed);},(100+timeBuff));}
timeBuff+=50;i++;});}
else if(settings.effect=='sliceUpDown'||settings.effect=='sliceUpDownRight'||vars.randAnim=='sliceUpDown'||settings.effect=='sliceUpDownLeft'||vars.randAnim=='sliceUpDownLeft'){createSlices(slider,settings,vars);var timeBuff=0;var i=0;var v=0;var slices=$('.nivo-slice',slider);if(settings.effect=='sliceUpDownLeft'||vars.randAnim=='sliceUpDownLeft')slices=$('.nivo-slice',slider)._reverse();slices.each(function(){var slice=$(this);if(i==0){slice.css('top','0px');i++;}else{slice.css('bottom','0px');i=0;}
if(v==settings.slices-1){setTimeout(function(){slice.animate({height:'100%',opacity:'1.0'},settings.animSpeed,'',function(){slider.trigger('nivo:animFinished');});},(100+timeBuff));}else{setTimeout(function(){slice.animate({height:'100%',opacity:'1.0'},settings.animSpeed);},(100+timeBuff));}
timeBuff+=50;v++;});}
else if(settings.effect=='fold'||vars.randAnim=='fold'){createSlices(slider,settings,vars);var timeBuff=0;var i=0;$('.nivo-slice',slider).each(function(){var slice=$(this);var origWidth=slice.width();slice.css({top:'0px',height:'100%',width:'0px'});if(i==settings.slices-1){setTimeout(function(){slice.animate({width:origWidth,opacity:'1.0'},settings.animSpeed,'',function(){slider.trigger('nivo:animFinished');});},(100+timeBuff));}else{setTimeout(function(){slice.animate({width:origWidth,opacity:'1.0'},settings.animSpeed);},(100+timeBuff));}
timeBuff+=50;i++;});}
else if(settings.effect=='fade'||vars.randAnim=='fade'){createSlices(slider,settings,vars);var firstSlice=$('.nivo-slice:first',slider);firstSlice.css({'height':'100%','width':slider.width()+'px'});firstSlice.animate({opacity:'1.0'},(settings.animSpeed*2),'',function(){slider.trigger('nivo:animFinished');});}
else if(settings.effect=='slideInRight'||vars.randAnim=='slideInRight'){createSlices(slider,settings,vars);var firstSlice=$('.nivo-slice:first',slider);firstSlice.css({'height':'100%','width':'0px','opacity':'1'});firstSlice.animate({width:slider.width()+'px'},(settings.animSpeed*2),'',function(){slider.trigger('nivo:animFinished');});}
else if(settings.effect=='slideInLeft'||vars.randAnim=='slideInLeft'){createSlices(slider,settings,vars);var firstSlice=$('.nivo-slice:first',slider);firstSlice.css({'height':'100%','width':'0px','opacity':'1','left':'','right':'0px'});firstSlice.animate({width:slider.width()+'px'},(settings.animSpeed*2),'',function(){firstSlice.css({'left':'0px','right':''});slider.trigger('nivo:animFinished');});}
else if(settings.effect=='boxRandom'||vars.randAnim=='boxRandom'){createBoxes(slider,settings,vars);var totalBoxes=settings.boxCols*settings.boxRows;var i=0;var timeBuff=0;var boxes=shuffle($('.nivo-box',slider));boxes.each(function(){var box=$(this);if(i==totalBoxes-1){setTimeout(function(){box.animate({opacity:'1'},settings.animSpeed,'',function(){slider.trigger('nivo:animFinished');});},(100+timeBuff));}else{setTimeout(function(){box.animate({opacity:'1'},settings.animSpeed);},(100+timeBuff));}
timeBuff+=20;i++;});}
else if(settings.effect=='boxRain'||vars.randAnim=='boxRain'||settings.effect=='boxRainReverse'||vars.randAnim=='boxRainReverse'||settings.effect=='boxRainGrow'||vars.randAnim=='boxRainGrow'||settings.effect=='boxRainGrowReverse'||vars.randAnim=='boxRainGrowReverse'){createBoxes(slider,settings,vars);var totalBoxes=settings.boxCols*settings.boxRows;var i=0;var timeBuff=0;var rowIndex=0;var colIndex=0;var box2Darr=new Array();box2Darr[rowIndex]=new Array();var boxes=$('.nivo-box',slider);if(settings.effect=='boxRainReverse'||vars.randAnim=='boxRainReverse'||settings.effect=='boxRainGrowReverse'||vars.randAnim=='boxRainGrowReverse'){boxes=$('.nivo-box',slider)._reverse();}
boxes.each(function(){box2Darr[rowIndex][colIndex]=$(this);colIndex++;if(colIndex==settings.boxCols){rowIndex++;colIndex=0;box2Darr[rowIndex]=new Array();}});for(var cols=0;cols<(settings.boxCols*2);cols++){var prevCol=cols;for(var rows=0;rows<settings.boxRows;rows++){if(prevCol>=0&&prevCol<settings.boxCols){(function(row,col,time,i,totalBoxes){var box=$(box2Darr[row][col]);var w=box.width();var h=box.height();if(settings.effect=='boxRainGrow'||vars.randAnim=='boxRainGrow'||settings.effect=='boxRainGrowReverse'||vars.randAnim=='boxRainGrowReverse'){box.width(0).height(0);}
if(i==totalBoxes-1){setTimeout(function(){box.animate({opacity:'1',width:w,height:h},settings.animSpeed/1.3,'',function(){slider.trigger('nivo:animFinished');});},(100+time));}else{setTimeout(function(){box.animate({opacity:'1',width:w,height:h},settings.animSpeed/1.3);},(100+time));}})(rows,prevCol,timeBuff,i,totalBoxes);i++;}
prevCol--;}
timeBuff+=100;}}}
var shuffle=function(arr){for(var j,x,i=arr.length;i;j=parseInt(Math.random()*i),x=arr[--i],arr[i]=arr[j],arr[j]=x);return arr;}
var trace=function(msg){if(this.console&&typeof console.log!="undefined")
console.log(msg);}
this.stop=function(){if(!$(element).data('nivo:vars').stop){$(element).data('nivo:vars').stop=true;trace('Stop Slider');}}
this.start=function(){if($(element).data('nivo:vars').stop){$(element).data('nivo:vars').stop=false;trace('Start Slider');}}
settings.afterLoad.call(this);return this;};$.fn.nivoSlider=function(options){return this.each(function(key,value){var element=$(this);if(element.data('nivoslider'))return element.data('nivoslider');var nivoslider=new NivoSlider(this,options);element.data('nivoslider',nivoslider);});};$.fn.nivoSlider.defaults={effect:'random',slices:15,boxCols:8,boxRows:4,animSpeed:500,pauseTime:3000,startSlide:0,directionNav:true,directionNavHide:true,controlNav:true,controlNavThumbs:false,controlNavThumbsFromRel:false,controlNavThumbsSearch:'.jpg',controlNavThumbsReplace:'_thumb.jpg',keyboardNav:true,pauseOnHover:true,manualAdvance:false,captionOpacity:0.8,prevText:'Prev',nextText:'Next',beforeChange:function(){},afterChange:function(){},slideshowEnd:function(){},lastSlide:function(){},afterLoad:function(){}};$.fn._reverse=[].reverse;})(jQuery);




/*******************************************************************************
* jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2008 George McGinley Smith
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
*******************************************************************************/
jQuery.easing['jswing']=jQuery.easing['swing'];jQuery.extend(jQuery.easing,{def:'easeOutQuad',swing:function(x,t,b,c,d){return jQuery.easing[jQuery.easing.def](x,t,b,c,d);},easeInQuad:function(x,t,b,c,d){return c*(t/=d)*t+b;},easeOutQuad:function(x,t,b,c,d){return-c*(t/=d)*(t-2)+b;},easeInOutQuad:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t+b;return-c/2*((--t)*(t-2)-1)+b;},easeInCubic:function(x,t,b,c,d){return c*(t/=d)*t*t+b;},easeOutCubic:function(x,t,b,c,d){return c*((t=t/d-1)*t*t+1)+b;},easeInOutCubic:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t+b;return c/2*((t-=2)*t*t+2)+b;},easeInQuart:function(x,t,b,c,d){return c*(t/=d)*t*t*t+b;},easeOutQuart:function(x,t,b,c,d){return-c*((t=t/d-1)*t*t*t-1)+b;},easeInOutQuart:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t*t+b;return-c/2*((t-=2)*t*t*t-2)+b;},easeInQuint:function(x,t,b,c,d){return c*(t/=d)*t*t*t*t+b;},easeOutQuint:function(x,t,b,c,d){return c*((t=t/d-1)*t*t*t*t+1)+b;},easeInOutQuint:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t*t*t+b;return c/2*((t-=2)*t*t*t*t+2)+b;},easeInSine:function(x,t,b,c,d){return-c*Math.cos(t/d*(Math.PI/2))+c+b;},easeOutSine:function(x,t,b,c,d){return c*Math.sin(t/d*(Math.PI/2))+b;},easeInOutSine:function(x,t,b,c,d){return-c/2*(Math.cos(Math.PI*t/d)-1)+b;},easeInExpo:function(x,t,b,c,d){return(t==0)?b:c*Math.pow(2,10*(t/d-1))+b;},easeOutExpo:function(x,t,b,c,d){return(t==d)?b+c:c*(-Math.pow(2,-10*t/d)+1)+b;},easeInOutExpo:function(x,t,b,c,d){if(t==0)return b;if(t==d)return b+c;if((t/=d/2)<1)return c/2*Math.pow(2,10*(t-1))+b;return c/2*(-Math.pow(2,-10*--t)+2)+b;},easeInCirc:function(x,t,b,c,d){return-c*(Math.sqrt(1-(t/=d)*t)-1)+b;},easeOutCirc:function(x,t,b,c,d){return c*Math.sqrt(1-(t=t/d-1)*t)+b;},easeInOutCirc:function(x,t,b,c,d){if((t/=d/2)<1)return-c/2*(Math.sqrt(1-t*t)-1)+b;return c/2*(Math.sqrt(1-(t-=2)*t)+1)+b;},easeInElastic:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d)==1)return b+c;if(!p)p=d*.3;if(a<Math.abs(c)){a=c;var s=p/4;}
else var s=p/(2*Math.PI)*Math.asin(c/a);return-(a*Math.pow(2,10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p))+b;},easeOutElastic:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d)==1)return b+c;if(!p)p=d*.3;if(a<Math.abs(c)){a=c;var s=p/4;}
else var s=p/(2*Math.PI)*Math.asin(c/a);return a*Math.pow(2,-10*t)*Math.sin((t*d-s)*(2*Math.PI)/p)+c+b;},easeInOutElastic:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d/2)==2)return b+c;if(!p)p=d*(.3*1.5);if(a<Math.abs(c)){a=c;var s=p/4;}
else var s=p/(2*Math.PI)*Math.asin(c/a);if(t<1)return-.5*(a*Math.pow(2,10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p))+b;return a*Math.pow(2,-10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p)*.5+c+b;},easeInBack:function(x,t,b,c,d,s){if(s==undefined)s=1.70158;return c*(t/=d)*t*((s+1)*t-s)+b;},easeOutBack:function(x,t,b,c,d,s){if(s==undefined)s=1.70158;return c*((t=t/d-1)*t*((s+1)*t+s)+1)+b;},easeInOutBack:function(x,t,b,c,d,s){if(s==undefined)s=1.70158;if((t/=d/2)<1)return c/2*(t*t*(((s*=(1.525))+1)*t-s))+b;return c/2*((t-=2)*t*(((s*=(1.525))+1)*t+s)+2)+b;},easeInBounce:function(x,t,b,c,d){return c-jQuery.easing.easeOutBounce(x,d-t,0,c,d)+b;},easeOutBounce:function(x,t,b,c,d){if((t/=d)<(1/2.75)){return c*(7.5625*t*t)+b;}else if(t<(2/2.75)){return c*(7.5625*(t-=(1.5/2.75))*t+.75)+b;}else if(t<(2.5/2.75)){return c*(7.5625*(t-=(2.25/2.75))*t+.9375)+b;}else{return c*(7.5625*(t-=(2.625/2.75))*t+.984375)+b;}},easeInOutBounce:function(x,t,b,c,d){if(t<d/2)return jQuery.easing.easeInBounce(x,t*2,0,c,d)*.5+b;return jQuery.easing.easeOutBounce(x,t*2-d,0,c,d)*.5+c*.5+b;}});




/***************************************************************************************************************************
 * 04 Kwicks Slider
 *Kwicks for jQuery (version 2.0 ) 
 *Copyright (c) 2008 Jeremy Martin
 *http://www.jeremymartin.name/projects.php?project=kwicks
 *Licensed under the MIT license:
 *http://www.opensource.org/licenses/mit-license.php
 *Any and all use of this script must be accompanied by this copyright/license notice in its present form.
*******************************************************************************************************************************/
(function(h){h.kwicks=function(j,n){var a=this;a.$el=h(j).addClass("kwicks");a.el=j;a.$el.data("kwicks",a);a.init=function(){a.options=h.extend({},h.kwicks.defaultOptions,n);a.$kwicks=a.$el.children("li");a.$el.addClass(a.options.isVertical?"vertical":"horizontal");a.size=a.$kwicks.size();a.lastActive=a.options.defaultKwick;a.active=a.options.defaultKwick;a.$active=a.$kwicks.eq(a.active);a.WoH=a.options.isVertical?"height":"width";a.LoT=a.options.isVertical?"top":"left";a.normWoH=parseInt(a.$kwicks.eq(0).css(a.WoH), 10);a.preCalcLoTs=[];a.aniObj={};if(a.options.max)a.options.min=(a.normWoH*a.size-a.options.max)/(a.size-1);else a.options.max=a.normWoH*a.size-a.options.min*(a.size-1);a.options.isVertical?a.$el.css({width:a.$kwicks.eq(0).css("width"),height:a.normWoH*a.size+a.options.spacing*(a.size-1)}):a.$el.css({width:a.normWoH*a.size+a.options.spacing*(a.size-1),height:a.$kwicks.eq(0).css("height")});for(var b=0;b<a.size;b++){a.preCalcLoTs[b]=[];for(var f=1;f<a.size-1;f++)a.preCalcLoTs[b][f]=b==f?a.options.isVertical? f*a.options.min+f*a.options.spacing:f*a.options.min+f*a.options.spacing:(f<=b?f*a.options.min:(f-1)*a.options.min+a.options.max)+f*a.options.spacing}a.$kwicks.each(function(c){var d=h(this);d.addClass("kwick-panel kwick"+(c+1));if(c===0)d.css(a.LoT,0);else if(c==a.size-1)d.css(a.options.isVertical?"bottom":"right",0);else a.options.sticky?d.css(a.LoT,Math.ceil(a.preCalcLoTs[a.options.defaultKwick][c])):d.css(a.LoT,Math.ceil(c*a.normWoH+c*a.options.spacing));if(a.options.sticky)if(a.options.defaultKwick== c){d.css(a.WoH,a.options.max);d.addClass(a.options.activeClass)}else d.css(a.WoH,a.options.min);d.css({margin:0,position:"absolute"});d.bind(a.options.event,function(g){if(!d.is("."+a.options.activeClass)){a.$kwicks.stop().removeClass(a.options.activeClass);a.lastActive=a.active;a.$active=d;a.active=a.$kwicks.index(d);d.addClass(a.options.activeClass);a.triggerEvent("init");a.lastEvent=g.timeStamp;var e=[],k=[];for(g=0;g<a.size;g++){e[g]=parseInt(a.$kwicks.eq(g).css(a.WoH),10);k[g]=parseInt(a.$kwicks.eq(g).css(a.LoT), 10)}a.aniObj[a.WoH]=a.options.max;var l=a.options.max-e[c],o=e[c]/l;a.triggerEvent("expanding");d.animate(a.aniObj,{step:function(p){var m=l!==0?p/l-o:1;a.$kwicks.each(function(i){i!=c&&a.$kwicks.eq(i).css(a.WoH,Math.ceil(e[i]-(e[i]-a.options.min)*m));i>0&&i<a.size-1&&a.$kwicks.eq(i).css(a.LoT,Math.ceil(k[i]-(k[i]-a.preCalcLoTs[c][i])*m))})},duration:a.options.duration,easing:a.options.easing,complete:function(){a.triggerEvent("completed")}})}})});a.options.sticky||a.$el.bind(a.options.eventClose, function(c){if(!(c.timeStamp-a.lastEvent<200)){a.lastEvent=c.timeStamp;a.triggerEvent("init");a.closeKwick()}})};a.openKwick=function(b){if(/\d/.test(b)&&!isNaN(b)){b=parseInt(h.trim(b),10);b<0||b>a.size-1||a.$kwicks.eq(b).trigger(a.options.event)}};a.closeKwick=function(){if(!a.options.sticky){for(var b=[],f=[],c=0;c<a.size;c++){b[c]=parseInt(a.$kwicks.eq(c).css(a.WoH),10);f[c]=parseInt(a.$kwicks.eq(c).css(a.LoT),10)}a.aniObj[a.WoH]=a.normWoH;var d=a.normWoH-b[0];a.triggerEvent("collapsing");a.$kwicks.stop().removeClass(a.options.activeClass).eq(0).animate(a.aniObj, {step:function(g){g=d!==0?(g-b[0])/d:1;for(var e=1;e<a.size;e++){a.$kwicks.eq(e).css(a.WoH,Math.ceil(b[e]-(b[e]-a.normWoH)*g));e<a.size-1&&a.$kwicks.eq(e).css(a.LoT,Math.ceil(f[e]-(f[e]-(e*a.normWoH+e*a.options.spacing))*g))}},duration:a.options.duration,easing:a.options.easing,complete:function(){a.triggerEvent("completed")}})}};a.triggerEvent=function(b){a.$el.trigger("kwicks-"+b,a);h.isFunction(a.options[b])&&a.options[b](a)};a.isActive=function(){return a.$kwicks.is(".active")};a.getActive=function(){return a.isActive()? a.active:-1};a.init()};h.kwicks.defaultOptions={isVertical:false,sticky:false,defaultKwick:0,activeClass:"active",event:"mouseenter",eventClose:"mouseleave",spacing:0,duration:500,easing:"swing",max:null,min:null,init:null,expanding:null,collapsing:null,completed:null};h.fn.kwicks=function(j){return this.each(function(){h(this).data("kwicks")||new h.kwicks(this,j)})};h.fn.getkwicks=function(){this.data("kwicks")}})(jQuery);






/****************************************************************************************************************************
 * 05 Swfobject Slider
 *SWFObject v2.1 <http://code.google.com/p/swfobject/>
	Copyright (c) 2007-2008 Geoff Stearns, Michael Williams, and Bobby van der Sluis
	This software is released under the MIT License <http://www.opensource.org/licenses/mit-license.php>
*****************************************************************************************************************************/
var swfobject=function(){var b="undefined",Q="object",n="Shockwave Flash",p="ShockwaveFlash.ShockwaveFlash",P="application/x-shockwave-flash",m="SWFObjectExprInst",j=window,K=document,T=navigator,o=[],N=[],i=[],d=[],J,Z=null,M=null,l=null,e=false,A=false;var h=function(){var v=typeof K.getElementById!=b&&typeof K.getElementsByTagName!=b&&typeof K.createElement!=b,AC=[0,0,0],x=null;if(typeof T.plugins!=b&&typeof T.plugins[n]==Q){x=T.plugins[n].description;if(x&&!(typeof T.mimeTypes!=b&&T.mimeTypes[P]&&!T.mimeTypes[P].enabledPlugin)){x=x.replace(/^.*\s+(\S+\s+\S+$)/,"$1");AC[0]=parseInt(x.replace(/^(.*)\..*$/,"$1"),10);AC[1]=parseInt(x.replace(/^.*\.(.*)\s.*$/,"$1"),10);AC[2]=/r/.test(x)?parseInt(x.replace(/^.*r(.*)$/,"$1"),10):0}}else{if(typeof j.ActiveXObject!=b){var y=null,AB=false;try{y=new ActiveXObject(p+".7")}catch(t){try{y=new ActiveXObject(p+".6");AC=[6,0,21];y.AllowScriptAccess="always"}catch(t){if(AC[0]==6){AB=true}}if(!AB){try{y=new ActiveXObject(p)}catch(t){}}}if(!AB&&y){try{x=y.GetVariable("$version");if(x){x=x.split(" ")[1].split(",");AC=[parseInt(x[0],10),parseInt(x[1],10),parseInt(x[2],10)]}}catch(t){}}}}var AD=T.userAgent.toLowerCase(),r=T.platform.toLowerCase(),AA=/webkit/.test(AD)?parseFloat(AD.replace(/^.*webkit\/(\d+(\.\d+)?).*$/,"$1")):false,q=false,z=r?/win/.test(r):/win/.test(AD),w=r?/mac/.test(r):/mac/.test(AD);/*@cc_on q=true;@if(@_win32)z=true;@elif(@_mac)w=true;@end@*/return{w3cdom:v,pv:AC,webkit:AA,ie:q,win:z,mac:w}}();var L=function(){if(!h.w3cdom){return }f(H);if(h.ie&&h.win){try{K.write("<script id=__ie_ondomload defer=true src=//:><\/script>");J=C("__ie_ondomload");if(J){I(J,"onreadystatechange",S)}}catch(q){}}if(h.webkit&&typeof K.readyState!=b){Z=setInterval(function(){if(/loaded|complete/.test(K.readyState)){E()}},10)}if(typeof K.addEventListener!=b){K.addEventListener("DOMContentLoaded",E,null)}R(E)}();function S(){if(J.readyState=="complete"){J.parentNode.removeChild(J);E()}}function E(){if(e){return }if(h.ie&&h.win){var v=a("span");try{var u=K.getElementsByTagName("body")[0].appendChild(v);u.parentNode.removeChild(u)}catch(w){return }}e=true;if(Z){clearInterval(Z);Z=null}var q=o.length;for(var r=0;r<q;r++){o[r]()}}function f(q){if(e){q()}else{o[o.length]=q}}function R(r){if(typeof j.addEventListener!=b){j.addEventListener("load",r,false)}else{if(typeof K.addEventListener!=b){K.addEventListener("load",r,false)}else{if(typeof j.attachEvent!=b){I(j,"onload",r)}else{if(typeof j.onload=="function"){var q=j.onload;j.onload=function(){q();r()}}else{j.onload=r}}}}}function H(){var t=N.length;for(var q=0;q<t;q++){var u=N[q].id;if(h.pv[0]>0){var r=C(u);if(r){N[q].width=r.getAttribute("width")?r.getAttribute("width"):"0";N[q].height=r.getAttribute("height")?r.getAttribute("height"):"0";if(c(N[q].swfVersion)){if(h.webkit&&h.webkit<312){Y(r)}W(u,true)}else{if(N[q].expressInstall&&!A&&c("6.0.65")&&(h.win||h.mac)){k(N[q])}else{O(r)}}}}else{W(u,true)}}}function Y(t){var q=t.getElementsByTagName(Q)[0];if(q){var w=a("embed"),y=q.attributes;if(y){var v=y.length;for(var u=0;u<v;u++){if(y[u].nodeName=="DATA"){w.setAttribute("src",y[u].nodeValue)}else{w.setAttribute(y[u].nodeName,y[u].nodeValue)}}}var x=q.childNodes;if(x){var z=x.length;for(var r=0;r<z;r++){if(x[r].nodeType==1&&x[r].nodeName=="PARAM"){w.setAttribute(x[r].getAttribute("name"),x[r].getAttribute("value"))}}}t.parentNode.replaceChild(w,t)}}function k(w){A=true;var u=C(w.id);if(u){if(w.altContentId){var y=C(w.altContentId);if(y){M=y;l=w.altContentId}}else{M=G(u)}if(!(/%$/.test(w.width))&&parseInt(w.width,10)<310){w.width="310"}if(!(/%$/.test(w.height))&&parseInt(w.height,10)<137){w.height="137"}K.title=K.title.slice(0,47)+" - Flash Player Installation";var z=h.ie&&h.win?"ActiveX":"PlugIn",q=K.title,r="MMredirectURL="+j.location+"&MMplayerType="+z+"&MMdoctitle="+q,x=w.id;if(h.ie&&h.win&&u.readyState!=4){var t=a("div");x+="SWFObjectNew";t.setAttribute("id",x);u.parentNode.insertBefore(t,u);u.style.display="none";var v=function(){u.parentNode.removeChild(u)};I(j,"onload",v)}U({data:w.expressInstall,id:m,width:w.width,height:w.height},{flashvars:r},x)}}function O(t){if(h.ie&&h.win&&t.readyState!=4){var r=a("div");t.parentNode.insertBefore(r,t);r.parentNode.replaceChild(G(t),r);t.style.display="none";var q=function(){t.parentNode.removeChild(t)};I(j,"onload",q)}else{t.parentNode.replaceChild(G(t),t)}}function G(v){var u=a("div");if(h.win&&h.ie){u.innerHTML=v.innerHTML}else{var r=v.getElementsByTagName(Q)[0];if(r){var w=r.childNodes;if(w){var q=w.length;for(var t=0;t<q;t++){if(!(w[t].nodeType==1&&w[t].nodeName=="PARAM")&&!(w[t].nodeType==8)){u.appendChild(w[t].cloneNode(true))}}}}}return u}function U(AG,AE,t){var q,v=C(t);if(v){if(typeof AG.id==b){AG.id=t}if(h.ie&&h.win){var AF="";for(var AB in AG){if(AG[AB]!=Object.prototype[AB]){if(AB.toLowerCase()=="data"){AE.movie=AG[AB]}else{if(AB.toLowerCase()=="styleclass"){AF+=' class="'+AG[AB]+'"'}else{if(AB.toLowerCase()!="classid"){AF+=" "+AB+'="'+AG[AB]+'"'}}}}}var AD="";for(var AA in AE){if(AE[AA]!=Object.prototype[AA]){AD+='<param name="'+AA+'" value="'+AE[AA]+'" />'}}v.outerHTML='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"'+AF+">"+AD+"</object>";i[i.length]=AG.id;q=C(AG.id)}else{if(h.webkit&&h.webkit<312){var AC=a("embed");AC.setAttribute("type",P);for(var z in AG){if(AG[z]!=Object.prototype[z]){if(z.toLowerCase()=="data"){AC.setAttribute("src",AG[z])}else{if(z.toLowerCase()=="styleclass"){AC.setAttribute("class",AG[z])}else{if(z.toLowerCase()!="classid"){AC.setAttribute(z,AG[z])}}}}}for(var y in AE){if(AE[y]!=Object.prototype[y]){if(y.toLowerCase()!="movie"){AC.setAttribute(y,AE[y])}}}v.parentNode.replaceChild(AC,v);q=AC}else{var u=a(Q);u.setAttribute("type",P);for(var x in AG){if(AG[x]!=Object.prototype[x]){if(x.toLowerCase()=="styleclass"){u.setAttribute("class",AG[x])}else{if(x.toLowerCase()!="classid"){u.setAttribute(x,AG[x])}}}}for(var w in AE){if(AE[w]!=Object.prototype[w]&&w.toLowerCase()!="movie"){F(u,w,AE[w])}}v.parentNode.replaceChild(u,v);q=u}}}return q}function F(t,q,r){var u=a("param");u.setAttribute("name",q);u.setAttribute("value",r);t.appendChild(u)}function X(r){var q=C(r);if(q&&(q.nodeName=="OBJECT"||q.nodeName=="EMBED")){if(h.ie&&h.win){if(q.readyState==4){B(r)}else{j.attachEvent("onload",function(){B(r)})}}else{q.parentNode.removeChild(q)}}}function B(t){var r=C(t);if(r){for(var q in r){if(typeof r[q]=="function"){r[q]=null}}r.parentNode.removeChild(r)}}function C(t){var q=null;try{q=K.getElementById(t)}catch(r){}return q}function a(q){return K.createElement(q)}function I(t,q,r){t.attachEvent(q,r);d[d.length]=[t,q,r]}function c(t){var r=h.pv,q=t.split(".");q[0]=parseInt(q[0],10);q[1]=parseInt(q[1],10)||0;q[2]=parseInt(q[2],10)||0;return(r[0]>q[0]||(r[0]==q[0]&&r[1]>q[1])||(r[0]==q[0]&&r[1]==q[1]&&r[2]>=q[2]))?true:false}function V(v,r){if(h.ie&&h.mac){return }var u=K.getElementsByTagName("head")[0],t=a("style");t.setAttribute("type","text/css");t.setAttribute("media","screen");if(!(h.ie&&h.win)&&typeof K.createTextNode!=b){t.appendChild(K.createTextNode(v+" {"+r+"}"))}u.appendChild(t);if(h.ie&&h.win&&typeof K.styleSheets!=b&&K.styleSheets.length>0){var q=K.styleSheets[K.styleSheets.length-1];if(typeof q.addRule==Q){q.addRule(v,r)}}}function W(t,q){var r=q?"visible":"hidden";if(e&&C(t)){C(t).style.visibility=r}else{V("#"+t,"visibility:"+r)}}function g(s){var r=/[\\\"<>\.;]/;var q=r.exec(s)!=null;return q?encodeURIComponent(s):s}var D=function(){if(h.ie&&h.win){window.attachEvent("onunload",function(){var w=d.length;for(var v=0;v<w;v++){d[v][0].detachEvent(d[v][1],d[v][2])}var t=i.length;for(var u=0;u<t;u++){X(i[u])}for(var r in h){h[r]=null}h=null;for(var q in swfobject){swfobject[q]=null}swfobject=null})}}();return{registerObject:function(u,q,t){if(!h.w3cdom||!u||!q){return }var r={};r.id=u;r.swfVersion=q;r.expressInstall=t?t:false;N[N.length]=r;W(u,false)},getObjectById:function(v){var q=null;if(h.w3cdom){var t=C(v);if(t){var u=t.getElementsByTagName(Q)[0];if(!u||(u&&typeof t.SetVariable!=b)){q=t}else{if(typeof u.SetVariable!=b){q=u}}}}return q},embedSWF:function(x,AE,AB,AD,q,w,r,z,AC){if(!h.w3cdom||!x||!AE||!AB||!AD||!q){return }AB+="";AD+="";if(c(q)){W(AE,false);var AA={};if(AC&&typeof AC===Q){for(var v in AC){if(AC[v]!=Object.prototype[v]){AA[v]=AC[v]}}}AA.data=x;AA.width=AB;AA.height=AD;var y={};if(z&&typeof z===Q){for(var u in z){if(z[u]!=Object.prototype[u]){y[u]=z[u]}}}if(r&&typeof r===Q){for(var t in r){if(r[t]!=Object.prototype[t]){if(typeof y.flashvars!=b){y.flashvars+="&"+t+"="+r[t]}else{y.flashvars=t+"="+r[t]}}}}f(function(){U(AA,y,AE);if(AA.id==AE){W(AE,true)}})}else{if(w&&!A&&c("6.0.65")&&(h.win||h.mac)){A=true;W(AE,false);f(function(){var AF={};AF.id=AF.altContentId=AE;AF.width=AB;AF.height=AD;AF.expressInstall=w;k(AF)})}}},getFlashPlayerVersion:function(){return{major:h.pv[0],minor:h.pv[1],release:h.pv[2]}},hasFlashPlayerVersion:c,createSWF:function(t,r,q){if(h.w3cdom){return U(t,r,q)}else{return undefined}},removeSWF:function(q){if(h.w3cdom){X(q)}},createCSS:function(r,q){if(h.w3cdom){V(r,q)}},addDomLoadEvent:f,addLoadEvent:R,getQueryParamValue:function(v){var u=K.location.search||K.location.hash;if(v==null){return g(u)}if(u){var t=u.substring(1).split("&");for(var r=0;r<t.length;r++){if(t[r].substring(0,t[r].indexOf("="))==v){return g(t[r].substring((t[r].indexOf("=")+1)))}}}return""},expressInstallCallback:function(){if(A&&M){var q=C(m);if(q){q.parentNode.replaceChild(M,q);if(l){W(l,true);if(h.ie&&h.win){M.style.display="block"}}M=null;l=null;A=false}}}}}();




/****************************************************************************************************************************
 * 06  jQuery Roundabout - v1.1
 * http://fredhq.com/projects/roundabout/
 *
 * Moves list-items of enabled ordered and unordered lists long
 * a chosen path. Includes the default "lazySusan" path, that
 * moves items long a spinning turntable.
 *
 * Terms of Use // jQuery Roundabout
 * 
 * Open source under the BSD license
 *
 * Copyright (c) 2010, Fred LeBlanc
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without 
 * modification, are permitted provided that the following conditions are met:
 * 
 *   - Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *   - Redistributions in binary form must reproduce the above 
 *     copyright notice, this list of conditions and the following 
 *     disclaimer in the documentation and/or other materials provided 
 *     with the distribution.
 *   - Neither the name of the author nor the names of its contributors 
 *     may be used to endorse or promote products derived from this 
 *     software without specific prior written permission.
 *
*****************************************************************************************************************************/
jQuery.extend({roundabout_shape:{def:'lazySusan',lazySusan:function(r,a,t){return{x:Math.sin(r+a),y:(Math.sin(r+3*Math.PI/2+a)/8)*t,z:(Math.cos(r+a)+1)/2,scale:(Math.sin(r+Math.PI/2+a)/2)+0.5}}}});jQuery.fn.roundabout=function(){var options=(typeof arguments[0]!='object')?{}:arguments[0];options={bearing:(typeof options.bearing=='undefined')?0.0:jQuery.roundabout_toFloat(options.bearing%360.0),tilt:(typeof options.tilt=='undefined')?0.0:jQuery.roundabout_toFloat(options.tilt),minZ:(typeof options.minZ=='undefined')?100:parseInt(options.minZ,10),maxZ:(typeof options.maxZ=='undefined')?400:parseInt(options.maxZ,10),minOpacity:(typeof options.minOpacity=='undefined')?0.40:jQuery.roundabout_toFloat(options.minOpacity),maxOpacity:(typeof options.maxOpacity=='undefined')?1.00:jQuery.roundabout_toFloat(options.maxOpacity),minScale:(typeof options.minScale=='undefined')?0.40:jQuery.roundabout_toFloat(options.minScale),maxScale:(typeof options.maxScale=='undefined')?1.00:jQuery.roundabout_toFloat(options.maxScale),duration:(typeof options.duration=='undefined')?600:parseInt(options.duration,10),btnNext:options.btnNext||null,btnPrev:options.btnPrev||null,easing:options.easing||'swing',clickToFocus:(options.clickToFocus!==false),focusBearing:(typeof options.focusBearing=='undefined')?0.0:jQuery.roundabout_toFloat(options.focusBearing%360.0),shape:options.shape||'lazySusan',debug:options.debug||false,childSelector:options.childSelector||'li',startingChild:(typeof options.startingChild=='undefined')?null:parseInt(options.startingChild,10),reflect:(typeof options.reflect=='undefined'||options.reflect===false)?false:true};this.each(function(i){var ref=jQuery(this);var period=jQuery.roundabout_toFloat(360.0/ref.children(options.childSelector).length);var startingBearing=(options.startingChild===null)?options.bearing:options.startingChild*period;ref.addClass('roundabout-holder').css('padding',0).css('position','relative').css('z-index',options.minZ);ref.data('roundabout',{'bearing':startingBearing,'tilt':options.tilt,'minZ':options.minZ,'maxZ':options.maxZ,'minOpacity':options.minOpacity,'maxOpacity':options.maxOpacity,'minScale':options.minScale,'maxScale':options.maxScale,'duration':options.duration,'easing':options.easing,'clickToFocus':options.clickToFocus,'focusBearing':options.focusBearing,'animating':0,'childInFocus':-1,'shape':options.shape,'period':period,'debug':options.debug,'childSelector':options.childSelector,'reflect':options.reflect});if(options.clickToFocus===true){ref.children(options.childSelector).each(function(i){jQuery(this).click(function(e){var degrees=(options.reflect===true)?360.0-(period*i):period*i;degrees=jQuery.roundabout_toFloat(degrees);if(!jQuery.roundabout_isInFocus(ref,degrees)){e.preventDefault();if(ref.data('roundabout').animating===0){ref.roundabout_animateAngleToFocus(degrees)}return false}})})}if(options.btnNext){jQuery(options.btnNext).bind('click.roundabout',function(e){e.preventDefault();if(ref.data('roundabout').animating===0){ref.roundabout_animateToNextChild()}return false})}if(options.btnPrev){jQuery(options.btnPrev).bind('click.roundabout',function(e){e.preventDefault();if(ref.data('roundabout').animating===0){ref.roundabout_animateToPreviousChild()}return false})}});this.roundabout_startChildren();if(typeof arguments[1]==='function'){var callback=arguments[1],ref=this;setTimeout(function(){callback(ref)},0)}return this};jQuery.fn.roundabout_startChildren=function(){this.each(function(i){var ref=jQuery(this);var data=ref.data('roundabout');var children=ref.children(data.childSelector);children.each(function(i){var degrees=(data.reflect===true)?360.0-(data.period*i):data.period*i;jQuery(this).addClass('roundabout-moveable-item').css('position','absolute');jQuery(this).data('roundabout',{'startWidth':jQuery(this).width(),'startHeight':jQuery(this).height(),'startFontSize':parseInt(jQuery(this).css('font-size'),10),'degrees':degrees})});ref.roundabout_updateChildPositions()});return this};jQuery.fn.roundabout_setTilt=function(newTilt){this.each(function(i){jQuery(this).data('roundabout').tilt=newTilt;jQuery(this).roundabout_updateChildPositions()});if(typeof arguments[1]==='function'){var callback=arguments[1],ref=this;setTimeout(function(){callback(ref)},0)}return this};jQuery.fn.roundabout_setBearing=function(newBearing){this.each(function(i){jQuery(this).data('roundabout').bearing=jQuery.roundabout_toFloat(newBearing%360,2);jQuery(this).roundabout_updateChildPositions()});if(typeof arguments[1]==='function'){var callback=arguments[1],ref=this;setTimeout(function(){callback(ref)},0)}return this};jQuery.fn.roundabout_adjustBearing=function(delta){delta=jQuery.roundabout_toFloat(delta);if(delta!==0){this.each(function(i){jQuery(this).data('roundabout').bearing=jQuery.roundabout_getBearing(jQuery(this))+delta;jQuery(this).roundabout_updateChildPositions()})}if(typeof arguments[1]==='function'){var callback=arguments[1],ref=this;setTimeout(function(){callback(ref)},0)}return this};jQuery.fn.roundabout_adjustTilt=function(delta){delta=jQuery.roundabout_toFloat(delta);if(delta!==0){this.each(function(i){jQuery(this).data('roundabout').tilt=jQuery.roundabout_toFloat(jQuery(this).roundabout_get('tilt')+delta);jQuery(this).roundabout_updateChildPositions()})}if(typeof arguments[1]==='function'){var callback=arguments[1],ref=this;setTimeout(function(){callback(ref)},0)}return this};jQuery.fn.roundabout_animateToBearing=function(bearing){bearing=jQuery.roundabout_toFloat(bearing);var currentTime=new Date();var duration=(typeof arguments[1]=='undefined')?null:arguments[1];var easingType=(typeof arguments[2]=='undefined')?null:arguments[2];var passedData=(typeof arguments[3]!=='object')?null:arguments[3];this.each(function(i){var ref=jQuery(this),data=ref.data('roundabout'),timer,easingFn,newBearing;var thisDuration=(duration===null)?data.duration:duration;var thisEasingType=(easingType!==null)?easingType:data.easing||'swing';if(passedData===null){passedData={timerStart:currentTime,start:jQuery.roundabout_getBearing(ref),totalTime:thisDuration}}timer=currentTime-passedData.timerStart;if(timer<thisDuration){data.animating=1;if(typeof jQuery.easing.def=='string'){easingFn=jQuery.easing[thisEasingType]||jQuery.easing[jQuery.easing.def];newBearing=easingFn(null,timer,passedData.start,bearing-passedData.start,passedData.totalTime)}else{newBearing=jQuery.easing[thisEasingType]((timer/passedData.totalTime),timer,passedData.start,bearing-passedData.start,passedData.totalTime)}ref.roundabout_setBearing(newBearing,function(){ref.roundabout_animateToBearing(bearing,thisDuration,thisEasingType,passedData)})}else{bearing=(bearing<0)?bearing+360:bearing%360;data.animating=0;ref.roundabout_setBearing(bearing)}});return this};jQuery.fn.roundabout_animateToDelta=function(delta){var duration=arguments[1],easing=arguments[2];this.each(function(i){delta=jQuery.roundabout_getBearing(jQuery(this))+jQuery.roundabout_toFloat(delta);jQuery(this).roundabout_animateToBearing(delta,duration,easing)});return this};jQuery.fn.roundabout_animateToChild=function(childPos){var duration=arguments[1],easing=arguments[2];this.each(function(i){var ref=jQuery(this),data=ref.data('roundabout');if(data.childInFocus!==childPos&&data.animating===0){var child=jQuery(ref.children(data.childSelector)[childPos]);ref.roundabout_animateAngleToFocus(child.data('roundabout').degrees,duration,easing)}});return this};jQuery.fn.roundabout_animateToNearbyChild=function(passedArgs,which){var duration=passedArgs[0],easing=passedArgs[1];this.each(function(i){var data=jQuery(this).data('roundabout');var bearing=jQuery.roundabout_toFloat(360.0-jQuery.roundabout_getBearing(jQuery(this)));var period=data.period,j=0,range;var reflect=data.reflect;var length=jQuery(this).children(data.childSelector).length;bearing=(reflect===true)?bearing%360.0:bearing;if(data.animating===0){if((reflect===false&&which==='next')||(reflect===true&&which!=='next')){bearing=(bearing===0)?360:bearing;while(true&&j<length){range={lower:jQuery.roundabout_toFloat(period*j),upper:jQuery.roundabout_toFloat(period*(j+1))};range.upper=(j==length-1)?360.0:range.upper;if(bearing<=range.upper&&bearing>range.lower){jQuery(this).roundabout_animateToDelta(bearing-range.lower,duration,easing);break}j++}}else{while(true){range={lower:jQuery.roundabout_toFloat(period*j),upper:jQuery.roundabout_toFloat(period*(j+1))};range.upper=(j==length-1)?360.0:range.upper;if(bearing>=range.lower&&bearing<range.upper){jQuery(this).roundabout_animateToDelta(bearing-range.upper,duration,easing);break}j++}}}});return this};jQuery.fn.roundabout_animateToNextChild=function(){return this.roundabout_animateToNearbyChild(arguments,'next')};jQuery.fn.roundabout_animateToPreviousChild=function(){return this.roundabout_animateToNearbyChild(arguments,'previous')};jQuery.fn.roundabout_animateAngleToFocus=function(target){var duration=arguments[1],easing=arguments[2];this.each(function(i){var delta=jQuery.roundabout_getBearing(jQuery(this))-target;delta=(Math.abs(360.0-delta)<Math.abs(0.0-delta))?360.0-delta:0.0-delta;delta=(delta>180)?-(360.0-delta):delta;if(delta!==0){jQuery(this).roundabout_animateToDelta(delta,duration,easing)}});return this};jQuery.fn.roundabout_updateChildPositions=function(){this.each(function(i){var ref=jQuery(this),data=ref.data('roundabout');var inFocus=-1;var info={bearing:jQuery.roundabout_getBearing(ref),tilt:data.tilt,stage:{width:Math.floor(ref.width()*0.9),height:Math.floor(ref.height()*0.9)},animating:data.animating,inFocus:data.childInFocus,focusBearingRad:jQuery.roundabout_degToRad(data.focusBearing),shape:jQuery.roundabout_shape[data.shape]||jQuery.roundabout_shape[jQuery.roundabout_shape.def]};info.midStage={width:info.stage.width/2,height:info.stage.height/2};info.nudge={width:info.midStage.width+info.stage.width*0.05,height:info.midStage.height+info.stage.height*0.05};info.zValues={min:data.minZ,max:data.maxZ,diff:data.maxZ-data.minZ};info.opacity={min:data.minOpacity,max:data.maxOpacity,diff:data.maxOpacity-data.minOpacity};info.scale={min:data.minScale,max:data.maxScale,diff:data.maxScale-data.minScale};ref.children(data.childSelector).each(function(i){if(jQuery.roundabout_updateChildPosition(jQuery(this),ref,info,i)&&info.animating===0){inFocus=i;jQuery(this).addClass('roundabout-in-focus')}else{jQuery(this).removeClass('roundabout-in-focus')}});if(inFocus!==info.inFocus){jQuery.roundabout_triggerEvent(ref,info.inFocus,'blur');if(inFocus!==-1){jQuery.roundabout_triggerEvent(ref,inFocus,'focus')}data.childInFocus=inFocus}});return this};jQuery.roundabout_getBearing=function(el){return jQuery.roundabout_toFloat(el.data('roundabout').bearing)%360};jQuery.roundabout_degToRad=function(degrees){return(degrees%360.0)*Math.PI/180.0};jQuery.roundabout_isInFocus=function(el,target){return(jQuery.roundabout_getBearing(el)%360===(target%360))};jQuery.roundabout_triggerEvent=function(el,child,eventType){return(child<0)?this:jQuery(el.children(el.data('roundabout').childSelector)[child]).trigger(eventType)};jQuery.roundabout_toFloat=function(number){number=Math.round(parseFloat(number)*1000)/1000;return parseFloat(number.toFixed(2))};jQuery.roundabout_updateChildPosition=function(child,container,info,childPos){var ref=jQuery(child),data=ref.data('roundabout'),out=[];var rad=jQuery.roundabout_degToRad((360.0-ref.data('roundabout').degrees)+info.bearing);while(rad<0){rad=rad+Math.PI*2}while(rad>Math.PI*2){rad=rad-Math.PI*2}var factors=info.shape(rad,info.focusBearingRad,info.tilt);factors.scale=(factors.scale>1)?1:factors.scale;factors.adjustedScale=(info.scale.min+(info.scale.diff*factors.scale)).toFixed(4);factors.width=(factors.adjustedScale*data.startWidth).toFixed(4);factors.height=(factors.adjustedScale*data.startHeight).toFixed(4);ref.css('left',((factors.x*info.midStage.width+info.nudge.width)-factors.width/2.0).toFixed(1)+'px').css('top',((factors.y*info.midStage.height+info.nudge.height)-factors.height/2.0).toFixed(1)+'px').css('width',factors.width+'px').css('height',factors.height+'px').css('opacity',(info.opacity.min+(info.opacity.diff*factors.scale)).toFixed(2)).css('z-index',Math.round(info.zValues.min+(info.zValues.diff*factors.z))).css('font-size',(factors.adjustedScale*data.startFontSize).toFixed(2)+'px').attr('current-scale',factors.adjustedScale);if(container.data('roundabout').debug===true){out.push('<div style="font-weight: normal; font-size: 10px; padding: 2px; width: '+ref.css('width')+'; background-color: #ffc;">');out.push('<strong style="font-size: 12px; white-space: nowrap;">Child '+childPos+'</strong><br />');out.push('<strong>left:</strong> '+ref.css('left')+'<br /><strong>top:</strong> '+ref.css('top')+'<br />');out.push('<strong>width:</strong> '+ref.css('width')+'<br /><strong>opacity:</strong> '+ref.css('opacity')+'<br />');out.push('<strong>z-index:</strong> '+ref.css('z-index')+'<br /><strong>font-size:</strong> '+ref.css('font-size')+'<br />');out.push('<strong>scale:</strong> '+ref.attr('current-scale'));out.push('</div>');ref.html(out.join(''))}return jQuery.roundabout_isInFocus(container,ref.data('roundabout').degrees)};



/* -------------------------------------------------------------------------------------------------------------------------------------
 07、	Class: prettyPhoto
	Use: Lightbox clone for jQuery
	Author: Stephane Caron (http://www.no-margin-for-errors.com)
	Version: 3.1
----------------------------------------------------------------------------------------------------------------------------------------- */
(function($){$.prettyPhoto={version:'3.1'};$.fn.prettyPhoto=function(pp_settings){pp_settings=jQuery.extend({animation_speed:'fast',slideshow:5000,autoplay_slideshow:false,opacity:0.80,show_title:true,allow_resize:true,default_width:500,default_height:344,counter_separator_label:'/',theme:'pp_default',horizontal_padding:20,hideflash:false,wmode:'opaque',autoplay:true,modal:false,overlay_gallery:true,keyboard_shortcuts:true,changepicturecallback:function(){},callback:function(){},ie6_fallback:true,markup:'<div class="pp_pic_holder"> \
      <div class="ppt">&nbsp;</div> \
      <div class="pp_top"> \
       <div class="pp_left"></div> \
       <div class="pp_middle"></div> \
       <div class="pp_right"></div> \
      </div> \
      <div class="pp_content_container"> \
       <div class="pp_left"> \
       <div class="pp_right"> \
        <div class="pp_content"> \
         <div class="pp_loaderIcon"></div> \
         <div class="pp_fade"> \
          <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
          <div class="pp_hoverContainer"> \
           <a class="pp_next" href="#">next</a> \
           <a class="pp_previous" href="#">previous</a> \
          </div> \
          <div id="pp_full_res"></div> \
          <div class="pp_details"> \
           <div class="pp_nav"> \
            <a href="#" class="pp_arrow_previous">Previous</a> \
            <p class="currentTextHolder">0/0</p> \
            <a href="#" class="pp_arrow_next">Next</a> \
           </div> \
           <p class="pp_description"></p> \
           <a class="pp_close" href="#">Close</a> \
          </div> \
         </div> \
        </div> \
       </div> \
       </div> \
      </div> \
      <div class="pp_bottom"> \
       <div class="pp_left"></div> \
       <div class="pp_middle"></div> \
       <div class="pp_right"></div> \
      </div> \
     </div> \
     <div class="pp_overlay"></div>',gallery_markup:'<div class="pp_gallery"> \
        <a href="#" class="pp_arrow_previous">Previous</a> \
        <div> \
         <ul> \
          {gallery} \
         </ul> \
        </div> \
        <a href="#" class="pp_arrow_next">Next</a> \
       </div>',image_markup:'<img id="fullResImage" src="{path}" />',flash_markup:'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"><param name="wmode" value="{wmode}" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed></object>',quicktime_markup:'<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}"><param name="src" value="{path}"><param name="autoplay" value="{autoplay}"><param name="type" value="video/quicktime"><embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>',iframe_markup:'<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>',inline_markup:'<div class="pp_inline">{content}</div>',custom_markup:''},pp_settings);var matchedObjects=this,percentBased=false,pp_dimensions,pp_open,pp_contentHeight,pp_contentWidth,pp_containerHeight,pp_containerWidth,windowHeight=$(window).height(),windowWidth=$(window).width(),pp_slideshow;doresize=true,scroll_pos=_get_scroll();$(window).unbind('resize.prettyphoto').bind('resize.prettyphoto',function(){_center_overlay();_resize_overlay();});if(pp_settings.keyboard_shortcuts){$(document).unbind('keydown.prettyphoto').bind('keydown.prettyphoto',function(e){if(typeof $pp_pic_holder!='undefined'){if($pp_pic_holder.is(':visible')){switch(e.keyCode){case 37:$.prettyPhoto.changePage('previous');e.preventDefault();break;case 39:$.prettyPhoto.changePage('next');e.preventDefault();break;case 27:if(!settings.modal)
$.prettyPhoto.close();e.preventDefault();break;};};};});}
$.prettyPhoto.initialize=function(){settings=pp_settings;if(settings.theme=='pp_default')settings.horizontal_padding=16;if(settings.ie6_fallback&&$.browser.msie&&parseInt($.browser.version)==6)settings.theme="light_square";theRel=$(this).attr('rel');galleryRegExp=/\[(?:.*)\]/;isSet=(galleryRegExp.exec(theRel))?true:false;pp_images=(isSet)?jQuery.map(matchedObjects,function(n,i){if($(n).attr('rel').indexOf(theRel)!=-1)return $(n).attr('href');}):$.makeArray($(this).attr('href'));pp_titles=(isSet)?jQuery.map(matchedObjects,function(n,i){if($(n).attr('rel').indexOf(theRel)!=-1)return($(n).find('img').attr('alt'))?$(n).find('img').attr('alt'):"";}):$.makeArray($(this).find('img').attr('alt'));pp_descriptions=(isSet)?jQuery.map(matchedObjects,function(n,i){if($(n).attr('rel').indexOf(theRel)!=-1)return($(n).attr('title'))?$(n).attr('title'):"";}):$.makeArray($(this).attr('title'));set_position=jQuery.inArray($(this).attr('href'),pp_images);_build_overlay(this);if(settings.allow_resize)
$(window).bind('scroll.prettyphoto',function(){_center_overlay();});$.prettyPhoto.open();return false;}
$.prettyPhoto.open=function(event){if(typeof settings=="undefined"){settings=pp_settings;if($.browser.msie&&$.browser.version==6)settings.theme="light_square";pp_images=$.makeArray(arguments[0]);pp_titles=(arguments[1])?$.makeArray(arguments[1]):$.makeArray("");pp_descriptions=(arguments[2])?$.makeArray(arguments[2]):$.makeArray("");isSet=(pp_images.length>1)?true:false;set_position=0;_build_overlay(event.target);}
if($.browser.msie&&$.browser.version==6)$('select').css('visibility','hidden');if(settings.hideflash)$('object,embed').css('visibility','hidden');_checkPosition($(pp_images).size());$('.pp_loaderIcon').show();if($ppt.is(':hidden'))$ppt.css('opacity',0).show();$pp_overlay.show().fadeTo(settings.animation_speed,settings.opacity);$pp_pic_holder.find('.currentTextHolder').text((set_position+1)+settings.counter_separator_label+$(pp_images).size());$pp_pic_holder.find('.pp_description').show().html(unescape(pp_descriptions[set_position]));movie_width=(parseFloat(grab_param('width',pp_images[set_position])))?grab_param('width',pp_images[set_position]):settings.default_width.toString();movie_height=(parseFloat(grab_param('height',pp_images[set_position])))?grab_param('height',pp_images[set_position]):settings.default_height.toString();if(movie_height.indexOf('%')!=-1){movie_height=parseFloat(($(window).height()*parseFloat(movie_height)/100)-150);percentBased=true;}
if(movie_width.indexOf('%')!=-1){movie_width=parseFloat(($(window).width()*parseFloat(movie_width)/100)-150);percentBased=true;}
$pp_pic_holder.fadeIn(function(){(settings.show_title&&pp_titles[set_position]!=""&&typeof pp_titles[set_position]!="undefined")?$ppt.html(unescape(pp_titles[set_position])):$ppt.html('&nbsp;');imgPreloader="";skipInjection=false;switch(_getFileType(pp_images[set_position])){case'image':imgPreloader=new Image();nextImage=new Image();if(isSet&&set_position<$(pp_images).size()-1)nextImage.src=pp_images[set_position+1];prevImage=new Image();if(isSet&&pp_images[set_position-1])prevImage.src=pp_images[set_position-1];$pp_pic_holder.find('#pp_full_res')[0].innerHTML=settings.image_markup.replace(/{path}/g,pp_images[set_position]);imgPreloader.onload=function(){pp_dimensions=_fitToViewport(imgPreloader.width,imgPreloader.height);_showContent();};imgPreloader.onerror=function(){alert('Image cannot be loaded. Make sure the path is correct and image exist.');$.prettyPhoto.close();};imgPreloader.src=pp_images[set_position];break;case'youtube':pp_dimensions=_fitToViewport(movie_width,movie_height);movie='http://www.youtube.com/embed/'+grab_param('v',pp_images[set_position]);if(settings.autoplay)movie+="?autoplay=1";toInject=settings.iframe_markup.replace(/{width}/g,pp_dimensions['width']).replace(/{height}/g,pp_dimensions['height']).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,movie);break;case'vimeo':pp_dimensions=_fitToViewport(movie_width,movie_height);movie_id=pp_images[set_position];var regExp=/http:\/\/(www\.)?vimeo.com\/(\d+)/;var match=movie_id.match(regExp);movie='http://player.vimeo.com/video/'+match[2]+'?title=0&amp;byline=0&amp;portrait=0';if(settings.autoplay)movie+="&autoplay=1;";vimeo_width=pp_dimensions['width']+'/embed/?moog_width='+pp_dimensions['width'];toInject=settings.iframe_markup.replace(/{width}/g,vimeo_width).replace(/{height}/g,pp_dimensions['height']).replace(/{path}/g,movie);break;case'quicktime':pp_dimensions=_fitToViewport(movie_width,movie_height);pp_dimensions['height']+=15;pp_dimensions['contentHeight']+=15;pp_dimensions['containerHeight']+=15;toInject=settings.quicktime_markup.replace(/{width}/g,pp_dimensions['width']).replace(/{height}/g,pp_dimensions['height']).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,pp_images[set_position]).replace(/{autoplay}/g,settings.autoplay);break;case'flash':pp_dimensions=_fitToViewport(movie_width,movie_height);flash_vars=pp_images[set_position];flash_vars=flash_vars.substring(pp_images[set_position].indexOf('flashvars')+10,pp_images[set_position].length);filename=pp_images[set_position];filename=filename.substring(0,filename.indexOf('?'));toInject=settings.flash_markup.replace(/{width}/g,pp_dimensions['width']).replace(/{height}/g,pp_dimensions['height']).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,filename+'?'+flash_vars);break;case'iframe':pp_dimensions=_fitToViewport(movie_width,movie_height);frame_url=pp_images[set_position];frame_url=frame_url.substr(0,frame_url.indexOf('iframe')-1);toInject=settings.iframe_markup.replace(/{width}/g,pp_dimensions['width']).replace(/{height}/g,pp_dimensions['height']).replace(/{path}/g,frame_url);break;case'ajax':doresize=false;pp_dimensions=_fitToViewport(movie_width,movie_height);doresize=true;skipInjection=true;$.get(pp_images[set_position],function(responseHTML){toInject=settings.inline_markup.replace(/{content}/g,responseHTML);$pp_pic_holder.find('#pp_full_res')[0].innerHTML=toInject;_showContent();});break;case'custom':pp_dimensions=_fitToViewport(movie_width,movie_height);toInject=settings.custom_markup;break;case'inline':myClone=$(pp_images[set_position]).clone().append('<br clear="all" />').css({'width':settings.default_width}).wrapInner('<div id="pp_full_res"><div class="pp_inline"></div></div>').appendTo($('body')).show();doresize=false;pp_dimensions=_fitToViewport($(myClone).width(),$(myClone).height());doresize=true;$(myClone).remove();toInject=settings.inline_markup.replace(/{content}/g,$(pp_images[set_position]).html());break;};if(!imgPreloader&&!skipInjection){$pp_pic_holder.find('#pp_full_res')[0].innerHTML=toInject;_showContent();};});return false;};$.prettyPhoto.changePage=function(direction){currentGalleryPage=0;if(direction=='previous'){set_position--;if(set_position<0){set_position=$(pp_images).size()-1;};}else if(direction=='next'){set_position++;if(set_position>$(pp_images).size()-1){set_position=0;}}else{set_position=direction;};if(!doresize)doresize=true;$('.pp_contract').removeClass('pp_contract').addClass('pp_expand');_hideContent(function(){$.prettyPhoto.open();});};$.prettyPhoto.changeGalleryPage=function(direction){if(direction=='next'){currentGalleryPage++;if(currentGalleryPage>totalPage){currentGalleryPage=0;};slide_speed=settings.animation_speed;}else if(direction=='previous'){currentGalleryPage--;if(currentGalleryPage<0){currentGalleryPage=totalPage;};slide_speed=settings.animation_speed;}else{currentGalleryPage=direction;slide_speed=0;};slide_to=currentGalleryPage*(itemsPerPage*itemWidth);itemsToSlide=(currentGalleryPage==totalPage)?pp_images.length-((totalPage)*itemsPerPage):itemsPerPage;$pp_gallery.find('ul').animate({left:-slide_to},slide_speed);};$.prettyPhoto.startSlideshow=function(){if(typeof pp_slideshow=='undefined'){$pp_pic_holder.find('.pp_play').unbind('click').removeClass('pp_play').addClass('pp_pause').click(function(){$.prettyPhoto.stopSlideshow();return false;});pp_slideshow=setInterval($.prettyPhoto.startSlideshow,settings.slideshow);}else{$.prettyPhoto.changePage('next');};}
$.prettyPhoto.stopSlideshow=function(){$pp_pic_holder.find('.pp_pause').unbind('click').removeClass('pp_pause').addClass('pp_play').click(function(){$.prettyPhoto.startSlideshow();return false;});clearInterval(pp_slideshow);pp_slideshow=undefined;}
$.prettyPhoto.close=function(){if($pp_overlay.is(":animated"))return;$.prettyPhoto.stopSlideshow();$pp_pic_holder.stop().find('object,embed').css('visibility','hidden');$('div.pp_pic_holder,div.ppt,.pp_fade').fadeOut(settings.animation_speed,function(){$(this).remove();});$pp_overlay.fadeOut(settings.animation_speed,function(){if($.browser.msie&&$.browser.version==6)$('select').css('visibility','visible');if(settings.hideflash)$('object,embed').css('visibility','visible');$(this).remove();$(window).unbind('scroll.prettyphoto');settings.callback();doresize=true;pp_open=false;delete settings;});};function _showContent(){$('.pp_loaderIcon').hide();$ppt.fadeTo(settings.animation_speed,1);projectedTop=scroll_pos['scrollTop']+((windowHeight/2)-(pp_dimensions['containerHeight']/2));if(projectedTop<0)projectedTop=0;$pp_pic_holder.find('.pp_content').animate({height:pp_dimensions['contentHeight'],width:pp_dimensions['contentWidth']},settings.animation_speed);$pp_pic_holder.animate({'top':projectedTop,'left':(windowWidth/2)-(pp_dimensions['containerWidth']/2),width:pp_dimensions['containerWidth']},settings.animation_speed,function(){$pp_pic_holder.find('.pp_hoverContainer,#fullResImage').height(pp_dimensions['height']).width(pp_dimensions['width']);$pp_pic_holder.find('.pp_fade').fadeIn(settings.animation_speed);if(isSet&&_getFileType(pp_images[set_position])=="image"){$pp_pic_holder.find('.pp_hoverContainer').show();}else{$pp_pic_holder.find('.pp_hoverContainer').hide();}
if(pp_dimensions['resized']){$('a.pp_expand,a.pp_contract').show();}else{$('a.pp_expand').hide();}
if(settings.autoplay_slideshow&&!pp_slideshow&&!pp_open)$.prettyPhoto.startSlideshow();settings.changepicturecallback();pp_open=true;});_insert_gallery();};function _hideContent(callback){$pp_pic_holder.find('#pp_full_res object,#pp_full_res embed').css('visibility','hidden');$pp_pic_holder.find('.pp_fade').fadeOut(settings.animation_speed,function(){$('.pp_loaderIcon').show();callback();});};function _checkPosition(setCount){(setCount>1)?$('.pp_nav').show():$('.pp_nav').hide();};function _fitToViewport(width,height){resized=false;_getDimensions(width,height);imageWidth=width,imageHeight=height;if(((pp_containerWidth>windowWidth)||(pp_containerHeight>windowHeight))&&doresize&&settings.allow_resize&&!percentBased){resized=true,fitting=false;while(!fitting){if((pp_containerWidth>windowWidth)){imageWidth=(windowWidth-200);imageHeight=(height/width)*imageWidth;}else if((pp_containerHeight>windowHeight)){imageHeight=(windowHeight-200);imageWidth=(width/height)*imageHeight;}else{fitting=true;};pp_containerHeight=imageHeight,pp_containerWidth=imageWidth;};_getDimensions(imageWidth,imageHeight);if((pp_containerWidth>windowWidth)||(pp_containerHeight>windowHeight)){_fitToViewport(pp_containerWidth,pp_containerHeight)};};return{width:Math.floor(imageWidth),height:Math.floor(imageHeight),containerHeight:Math.floor(pp_containerHeight),containerWidth:Math.floor(pp_containerWidth)+(settings.horizontal_padding*2),contentHeight:Math.floor(pp_contentHeight),contentWidth:Math.floor(pp_contentWidth),resized:resized};};function _getDimensions(width,height){width=parseFloat(width);height=parseFloat(height);$pp_details=$pp_pic_holder.find('.pp_details');$pp_details.width(width);detailsHeight=parseFloat($pp_details.css('marginTop'))+parseFloat($pp_details.css('marginBottom'));$pp_details=$pp_details.clone().addClass(settings.theme).width(width).appendTo($('body')).css({'position':'absolute','top':-10000});detailsHeight+=$pp_details.height();detailsHeight=(detailsHeight<=34)?36:detailsHeight;if($.browser.msie&&$.browser.version==7)detailsHeight+=8;$pp_details.remove();$pp_title=$pp_pic_holder.find('.ppt');$pp_title.width(width);titleHeight=parseFloat($pp_title.css('marginTop'))+parseFloat($pp_title.css('marginBottom'));$pp_title=$pp_title.clone().appendTo($('body')).css({'position':'absolute','top':-10000});titleHeight+=$pp_title.height();$pp_title.remove();pp_contentHeight=height+detailsHeight;pp_contentWidth=width;pp_containerHeight=pp_contentHeight+titleHeight+$pp_pic_holder.find('.pp_top').height()+$pp_pic_holder.find('.pp_bottom').height();pp_containerWidth=width;}
function _getFileType(itemSrc){if(itemSrc.match(/youtube\.com\/watch/i)){return'youtube';}else if(itemSrc.match(/vimeo\.com/i)){return'vimeo';}else if(itemSrc.match(/\b.mov\b/i)){return'quicktime';}else if(itemSrc.match(/\b.swf\b/i)){return'flash';}else if(itemSrc.match(/\biframe=true\b/i)){return'iframe';}else if(itemSrc.match(/\bajax=true\b/i)){return'ajax';}else if(itemSrc.match(/\bcustom=true\b/i)){return'custom';}else if(itemSrc.substr(0,1)=='#'){return'inline';}else{return'image';};};function _center_overlay(){if(doresize&&typeof $pp_pic_holder!='undefined'){scroll_pos=_get_scroll();contentHeight=$pp_pic_holder.height(),contentwidth=$pp_pic_holder.width();projectedTop=(windowHeight/2)+scroll_pos['scrollTop']-(contentHeight/2);if(projectedTop<0)projectedTop=0;if(contentHeight>windowHeight)
return;$pp_pic_holder.css({'top':projectedTop,'left':(windowWidth/2)+scroll_pos['scrollLeft']-(contentwidth/2)});};};function _get_scroll(){if(self.pageYOffset){return{scrollTop:self.pageYOffset,scrollLeft:self.pageXOffset};}else if(document.documentElement&&document.documentElement.scrollTop){return{scrollTop:document.documentElement.scrollTop,scrollLeft:document.documentElement.scrollLeft};}else if(document.body){return{scrollTop:document.body.scrollTop,scrollLeft:document.body.scrollLeft};};};function _resize_overlay(){windowHeight=$(window).height(),windowWidth=$(window).width();if(typeof $pp_overlay!="undefined")$pp_overlay.height($(document).height()).width(windowWidth);};function _insert_gallery(){if(isSet&&settings.overlay_gallery&&_getFileType(pp_images[set_position])=="image"&&(settings.ie6_fallback&&!($.browser.msie&&parseInt($.browser.version)==6))){itemWidth=52+5;navWidth=(settings.theme=="facebook"||settings.theme=="pp_default")?50:30;itemsPerPage=Math.floor((pp_dimensions['containerWidth']-100-navWidth)/itemWidth);itemsPerPage=(itemsPerPage<pp_images.length)?itemsPerPage:pp_images.length;totalPage=Math.ceil(pp_images.length/itemsPerPage)-1;if(totalPage==0){navWidth=0;$pp_gallery.find('.pp_arrow_next,.pp_arrow_previous').hide();}else{$pp_gallery.find('.pp_arrow_next,.pp_arrow_previous').show();};galleryWidth=itemsPerPage*itemWidth;fullGalleryWidth=pp_images.length*itemWidth;$pp_gallery.css('margin-left',-((galleryWidth/2)+(navWidth/2))).find('div:first').width(galleryWidth+5).find('ul').width(fullGalleryWidth).find('li.selected').removeClass('selected');goToPage=(Math.floor(set_position/itemsPerPage)<totalPage)?Math.floor(set_position/itemsPerPage):totalPage;$.prettyPhoto.changeGalleryPage(goToPage);$pp_gallery_li.filter(':eq('+set_position+')').addClass('selected');}else{$pp_pic_holder.find('.pp_content').unbind('mouseenter mouseleave');}}
function _build_overlay(caller){$('body').append(settings.markup);$pp_pic_holder=$('.pp_pic_holder'),$ppt=$('.ppt'),$pp_overlay=$('div.pp_overlay');if(isSet&&settings.overlay_gallery){currentGalleryPage=0;toInject="";for(var i=0;i<pp_images.length;i++){if(!pp_images[i].match(/\b(jpg|jpeg|png|gif)\b/gi)){classname='default';img_src='';}else{classname='';img_src=pp_images[i];}
toInject+="<li class='"+classname+"'><a href='#'><img src='"+img_src+"' width='50' alt='' /></a></li>";};toInject=settings.gallery_markup.replace(/{gallery}/g,toInject);$pp_pic_holder.find('#pp_full_res').after(toInject);$pp_gallery=$('.pp_pic_holder .pp_gallery'),$pp_gallery_li=$pp_gallery.find('li');$pp_gallery.find('.pp_arrow_next').click(function(){$.prettyPhoto.changeGalleryPage('next');$.prettyPhoto.stopSlideshow();return false;});$pp_gallery.find('.pp_arrow_previous').click(function(){$.prettyPhoto.changeGalleryPage('previous');$.prettyPhoto.stopSlideshow();return false;});$pp_pic_holder.find('.pp_content').hover(function(){$pp_pic_holder.find('.pp_gallery:not(.disabled)').fadeIn();},function(){$pp_pic_holder.find('.pp_gallery:not(.disabled)').fadeOut();});itemWidth=52+5;$pp_gallery_li.each(function(i){$(this).find('a').click(function(){$.prettyPhoto.changePage(i);$.prettyPhoto.stopSlideshow();return false;});});};if(settings.slideshow){$pp_pic_holder.find('.pp_nav').prepend('<a href="#" class="pp_play">Play</a>')
$pp_pic_holder.find('.pp_nav .pp_play').click(function(){$.prettyPhoto.startSlideshow();return false;});}
$pp_pic_holder.attr('class','pp_pic_holder '+settings.theme);$pp_overlay.css({'opacity':0,'height':$(document).height(),'width':$(window).width()}).bind('click',function(){if(!settings.modal)$.prettyPhoto.close();});$('a.pp_close').bind('click',function(){$.prettyPhoto.close();return false;});$('a.pp_expand').bind('click',function(e){if($(this).hasClass('pp_expand')){$(this).removeClass('pp_expand').addClass('pp_contract');doresize=false;}else{$(this).removeClass('pp_contract').addClass('pp_expand');doresize=true;};_hideContent(function(){$.prettyPhoto.open();});return false;});$pp_pic_holder.find('.pp_previous, .pp_nav .pp_arrow_previous').bind('click',function(){$.prettyPhoto.changePage('previous');$.prettyPhoto.stopSlideshow();return false;});$pp_pic_holder.find('.pp_next, .pp_nav .pp_arrow_next').bind('click',function(){$.prettyPhoto.changePage('next');$.prettyPhoto.stopSlideshow();return false;});_center_overlay();};return this.unbind('click.prettyphoto').bind('click.prettyphoto',$.prettyPhoto.initialize);};function grab_param(name,url){name=name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");var regexS="[\\?&]"+name+"=([^&#]*)";var regex=new RegExp(regexS);var results=regex.exec(url);return(results==null)?"":results[1];}})(jQuery);





/* -------------------------------------------------------------------------------------------------------------------------------------
 08,hoverFlow - A Solution to Animation Queue Buildup in jQuery
* Version 1.00
*
* Copyright (c) 2009 Ralf Stoltze, http://www.2meter3.de/code/hoverFlow/
* Dual-licensed under the MIT and GPL licenses.
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
----------------------------------------------------------------------------------------------------------------------------------------- */
(function($){$.fn.hoverFlow=function(c,d,e,f,g){if($.inArray(c,['mouseover','mouseenter','mouseout','mouseleave'])==-1){return this}var h=typeof e==='object'?e:{complete:g||!g&&f||$.isFunction(e)&&e,duration:e,easing:g&&f||f&&!$.isFunction(f)&&f};h.queue=false;var i=h.complete;h.complete=function(){$(this).dequeue();if($.isFunction(i)){i.call(this)}};return this.each(function(){var b=$(this);if(c=='mouseover'||c=='mouseenter'){b.data('jQuery.hoverFlow',true)}else{b.removeData('jQuery.hoverFlow')}b.queue(function(){var a=(c=='mouseover'||c=='mouseenter')?b.data('jQuery.hoverFlow')!==undefined:b.data('jQuery.hoverFlow')===undefined;if(a){b.animate(d,h)}else{b.queue([])}})})}})(jQuery);





/* -------------------------------------------------------------------------------------------------------------------------------------
 09
 * jQuery Form Plugin
 * version: 2.07 (03/04/2008)
 * @requires jQuery v1.2.2 or later
 *
 * Examples at: http://malsup.com/jquery/form/
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 *
 * Revision: $Id$
----------------------------------------------------------------------------------------------------------------------------------------- */
 (function($) {
/**
 * ajaxSubmit() provides a mechanism for submitting an HTML form using AJAX.
 *
 * ajaxSubmit accepts a single argument which can be either a success callback function
 * or an options Object.  If a function is provided it will be invoked upon successful
 * completion of the submit and will be passed the response from the server.
 * If an options Object is provided, the following attributes are supported:
 *
 *  target:   Identifies the element(s) in the page to be updated with the server response.
 *            This value may be specified as a jQuery selection string, a jQuery object,
 *            or a DOM element.
 *            default value: null
 *
 *  url:      URL to which the form data will be submitted.
 *            default value: value of form's 'action' attribute
 *
 *  type:     The method in which the form data should be submitted, 'GET' or 'POST'.
 *            default value: value of form's 'method' attribute (or 'GET' if none found)
 *
 *  data:     Additional data to add to the request, specified as key/value pairs (see $.ajax).
 *
 *  beforeSubmit:  Callback method to be invoked before the form is submitted.
 *            default value: null
 *
 *  success:  Callback method to be invoked after the form has been successfully submitted
 *            and the response has been returned from the server
 *            default value: null
 *
 *  dataType: Expected dataType of the response.  One of: null, 'xml', 'script', or 'json'
 *            default value: null
 *
 *  semantic: Boolean flag indicating whether data must be submitted in semantic order (slower).
 *            default value: false
 *
 *  resetForm: Boolean flag indicating whether the form should be reset if the submit is successful
 *
 *  clearForm: Boolean flag indicating whether the form should be cleared if the submit is successful
 *
 *
 * The 'beforeSubmit' callback can be provided as a hook for running pre-submit logic or for
 * validating the form data.  If the 'beforeSubmit' callback returns false then the form will
 * not be submitted. The 'beforeSubmit' callback is invoked with three arguments: the form data
 * in array format, the jQuery object, and the options object passed into ajaxSubmit.
 * The form data array takes the following form:
 *
 *     [ { name: 'username', value: 'jresig' }, { name: 'password', value: 'secret' } ]
 *
 * If a 'success' callback method is provided it is invoked after the response has been returned
 * from the server.  It is passed the responseText or responseXML value (depending on dataType).
 * See jQuery.ajax for further details.
 *
 *
 * The dataType option provides a means for specifying how the server response should be handled.
 * This maps directly to the jQuery.httpData method.  The following values are supported:
 *
 *      'xml':    if dataType == 'xml' the server response is treated as XML and the 'success'
 *                   callback method, if specified, will be passed the responseXML value
 *      'json':   if dataType == 'json' the server response will be evaluted and passed to
 *                   the 'success' callback, if specified
 *      'script': if dataType == 'script' the server response is evaluated in the global context
 *
 *
 * Note that it does not make sense to use both the 'target' and 'dataType' options.  If both
 * are provided the target will be ignored.
 *
 * The semantic argument can be used to force form serialization in semantic order.
 * This is normally true anyway, unless the form contains input elements of type='image'.
 * If your form must be submitted with name/value pairs in semantic order and your form
 * contains an input of type='image" then pass true for this arg, otherwise pass false
 * (or nothing) to avoid the overhead for this logic.
 *
 *
 * When used on its own, ajaxSubmit() is typically bound to a form's submit event like this:
 *
 * $("#form-id").submit(function() {
 *     $(this).ajaxSubmit(options);
 *     return false; // cancel conventional submit
 * });
 *
 * When using ajaxForm(), however, this is done for you.
 *
 * @example
 * $('#myForm').ajaxSubmit(function(data) {
 *     alert('Form submit succeeded! Server returned: ' + data);
 * });
 * @desc Submit form and alert server response
 *
 *
 * @example
 * var options = {
 *     target: '#myTargetDiv'
 * };
 * $('#myForm').ajaxSubmit(options);
 * @desc Submit form and update page element with server response
 *
 *
 * @example
 * var options = {
 *     success: function(responseText) {
 *         alert(responseText);
 *     }
 * };
 * $('#myForm').ajaxSubmit(options);
 * @desc Submit form and alert the server response
 *
 *
 * @example
 * var options = {
 *     beforeSubmit: function(formArray, jqForm) {
 *         if (formArray.length == 0) {
 *             alert('Please enter data.');
 *             return false;
 *         }
 *     }
 * };
 * $('#myForm').ajaxSubmit(options);
 * @desc Pre-submit validation which aborts the submit operation if form data is empty
 *
 *
 * @example
 * var options = {
 *     url: myJsonUrl.php,
 *     dataType: 'json',
 *     success: function(data) {
 *        // 'data' is an object representing the the evaluated json data
 *     }
 * };
 * $('#myForm').ajaxSubmit(options);
 * @desc json data returned and evaluated
 *
 *
 * @example
 * var options = {
 *     url: myXmlUrl.php,
 *     dataType: 'xml',
 *     success: function(responseXML) {
 *        // responseXML is XML document object
 *        var data = $('myElement', responseXML).text();
 *     }
 * };
 * $('#myForm').ajaxSubmit(options);
 * @desc XML data returned from server
 *
 *
 * @example
 * var options = {
 *     resetForm: true
 * };
 * $('#myForm').ajaxSubmit(options);
 * @desc submit form and reset it if successful
 *
 * @example
 * $('#myForm).submit(function() {
 *    $(this).ajaxSubmit();
 *    return false;
 * });
 * @desc Bind form's submit event to use ajaxSubmit
 *
 *
 * @name ajaxSubmit
 * @type jQuery
 * @param options  object literal containing options which control the form submission process
 * @cat Plugins/Form
 * @return jQuery
 */
$.fn.ajaxSubmit = function(options) {
    if (typeof options == 'function')
        options = { success: options };

    options = $.extend({
        url:  this.attr('action') || window.location.toString(),
        type: this.attr('method') || 'GET'
    }, options || {});

    // hook for manipulating the form data before it is extracted;
    // convenient for use with rich editors like tinyMCE or FCKEditor
    var veto = {};
    this.trigger('form-pre-serialize', [this, options, veto]);
    if (veto.veto) return this;

    var a = this.formToArray(options.semantic);
    if (options.data) {
        options.extraData = options.data;
        for (var n in options.data)
            a.push( { name: n, value: options.data[n] } );
    }

    // give pre-submit callback an opportunity to abort the submit
    if (options.beforeSubmit && options.beforeSubmit(a, this, options) === false) return this;

    // fire vetoable 'validate' event
    this.trigger('form-submit-validate', [a, this, options, veto]);
    if (veto.veto) return this;

    var q = $.param(a);

    if (options.type.toUpperCase() == 'GET') {
        options.url += (options.url.indexOf('?') >= 0 ? '&' : '?') + q;
        options.data = null;  // data is null for 'get'
    }
    else
        options.data = q; // data is the query string for 'post'

    var $form = this, callbacks = [];
    if (options.resetForm) callbacks.push(function() { $form.resetForm(); });
    if (options.clearForm) callbacks.push(function() { $form.clearForm(); });

    // perform a load on the target only if dataType is not provided
    if (!options.dataType && options.target) {
        var oldSuccess = options.success || function(){};
        callbacks.push(function(data) {
            $(options.target).html(data).each(oldSuccess, arguments);
        });
    }
    else if (options.success)
        callbacks.push(options.success);

    options.success = function(data, status) {
        for (var i=0, max=callbacks.length; i < max; i++)
            callbacks[i](data, status, $form);
    };

    // are there files to upload?
    var files = $('input:file', this).fieldValue();
    var found = false;
    for (var j=0; j < files.length; j++)
        if (files[j])
            found = true;

    // options.iframe allows user to force iframe mode
   if (options.iframe || found) { 
       // hack to fix Safari hang (thanks to Tim Molendijk for this)
       // see:  http://groups.google.com/group/jquery-dev/browse_thread/thread/36395b7ab510dd5d
       if ($.browser.safari && options.closeKeepAlive)
           $.get(options.closeKeepAlive, fileUpload);
       else
           fileUpload();
       }
   else
       $.ajax(options);

    // fire 'notify' event
    this.trigger('form-submit-notify', [this, options]);
    return this;


    // private function for handling file uploads (hat tip to YAHOO!)
    function fileUpload() {
        var form = $form[0];
        var opts = $.extend({}, $.ajaxSettings, options);

        var id = 'jqFormIO' + (new Date().getTime());
        var $io = $('<iframe id="' + id + '" name="' + id + '" />');
        var io = $io[0];
        var op8 = $.browser.opera && window.opera.version() < 9;
        if ($.browser.msie || op8) io.src = 'javascript:false;document.write("");';
        $io.css({ position: 'absolute', top: '-1000px', left: '-1000px' });

        var xhr = { // mock object
            responseText: null,
            responseXML: null,
            status: 0,
            statusText: 'n/a',
            getAllResponseHeaders: function() {},
            getResponseHeader: function() {},
            setRequestHeader: function() {}
        };

        var g = opts.global;
        // trigger ajax global events so that activity/block indicators work like normal
        if (g && ! $.active++) $.event.trigger("ajaxStart");
        if (g) $.event.trigger("ajaxSend", [xhr, opts]);

        var cbInvoked = 0;
        var timedOut = 0;

        // take a breath so that pending repaints get some cpu time before the upload starts
        setTimeout(function() {
            // make sure form attrs are set
            var t = $form.attr('target'), a = $form.attr('action');
            $form.attr({
                target:   id,
                encoding: 'multipart/form-data',
                enctype:  'multipart/form-data',
                method:   'POST',
                action:   opts.url
            });

            // support timout
            if (opts.timeout)
                setTimeout(function() { timedOut = true; cb(); }, opts.timeout);

            // add "extra" data to form if provided in options
            var extraInputs = [];
            try {
                if (options.extraData)
                    for (var n in options.extraData)
                        extraInputs.push(
                            $('<input type="hidden" name="'+n+'" value="'+options.extraData[n]+'" />')
                                .appendTo(form)[0]);
            
                // add iframe to doc and submit the form
                $io.appendTo('body');
                io.attachEvent ? io.attachEvent('onload', cb) : io.addEventListener('load', cb, false);
                form.submit();
            }
            finally {
                // reset attrs and remove "extra" input elements
                $form.attr('action', a);
                t ? $form.attr('target', t) : $form.removeAttr('target');
                $(extraInputs).remove();
            }
        }, 10);

        function cb() {
            if (cbInvoked++) return;

            io.detachEvent ? io.detachEvent('onload', cb) : io.removeEventListener('load', cb, false);

            var ok = true;
            try {
                if (timedOut) throw 'timeout';
                // extract the server response from the iframe
                var data, doc;
                doc = io.contentWindow ? io.contentWindow.document : io.contentDocument ? io.contentDocument : io.document;
                xhr.responseText = doc.body ? doc.body.innerHTML : null;
                xhr.responseXML = doc.XMLDocument ? doc.XMLDocument : doc;
                xhr.getResponseHeader = function(header){
                    var headers = {'content-type': opts.dataType};
                    return headers[header];
                };

                if (opts.dataType == 'json' || opts.dataType == 'script') {
                    var ta = doc.getElementsByTagName('textarea')[0];
                    xhr.responseText = ta ? ta.value : xhr.responseText;
                }
                else if (opts.dataType == 'xml' && !xhr.responseXML && xhr.responseText != null) {
                    xhr.responseXML = toXml(xhr.responseText);
                }
                data = $.httpData(xhr, opts.dataType);
            }
            catch(e){
                ok = false;
                $.handleError(opts, xhr, 'error', e);
            }

            // ordering of these callbacks/triggers is odd, but that's how $.ajax does it
            if (ok) {
                opts.success(data, 'success');
                if (g) $.event.trigger("ajaxSuccess", [xhr, opts]);
            }
            if (g) $.event.trigger("ajaxComplete", [xhr, opts]);
            if (g && ! --$.active) $.event.trigger("ajaxStop");
            if (opts.complete) opts.complete(xhr, ok ? 'success' : 'error');

            // clean up
            setTimeout(function() {
                $io.remove();
                xhr.responseXML = null;
            }, 100);
        };

        function toXml(s, doc) {
            if (window.ActiveXObject) {
                doc = new ActiveXObject('Microsoft.XMLDOM');
                doc.async = 'false';
                doc.loadXML(s);
            }
            else
                doc = (new DOMParser()).parseFromString(s, 'text/xml');
            return (doc && doc.documentElement && doc.documentElement.tagName != 'parsererror') ? doc : null;
        };
    };
};

/**
 * ajaxForm() provides a mechanism for fully automating form submission.
 *
 * The advantages of using this method instead of ajaxSubmit() are:
 *
 * 1: This method will include coordinates for <input type="image" /> elements (if the element
 *    is used to submit the form).
 * 2. This method will include the submit element's name/value data (for the element that was
 *    used to submit the form).
 * 3. This method binds the submit() method to the form for you.
 *
 * Note that for accurate x/y coordinates of image submit elements in all browsers
 * you need to also use the "dimensions" plugin (this method will auto-detect its presence).
 *
 * The options argument for ajaxForm works exactly as it does for ajaxSubmit.  ajaxForm merely
 * passes the options argument along after properly binding events for submit elements and
 * the form itself.  See ajaxSubmit for a full description of the options argument.
 *
 *
 * @example
 * var options = {
 *     target: '#myTargetDiv'
 * };
 * $('#myForm').ajaxSForm(options);
 * @desc Bind form's submit event so that 'myTargetDiv' is updated with the server response
 *       when the form is submitted.
 *
 *
 * @example
 * var options = {
 *     success: function(responseText) {
 *         alert(responseText);
 *     }
 * };
 * $('#myForm').ajaxSubmit(options);
 * @desc Bind form's submit event so that server response is alerted after the form is submitted.
 *
 *
 * @example
 * var options = {
 *     beforeSubmit: function(formArray, jqForm) {
 *         if (formArray.length == 0) {
 *             alert('Please enter data.');
 *             return false;
 *         }
 *     }
 * };
 * $('#myForm').ajaxSubmit(options);
 * @desc Bind form's submit event so that pre-submit callback is invoked before the form
 *       is submitted.
 *
 *
 * @name   ajaxForm
 * @param  options  object literal containing options which control the form submission process
 * @return jQuery
 * @cat    Plugins/Form
 * @type   jQuery
 */
$.fn.ajaxForm = function(options) {
    return this.ajaxFormUnbind().bind('submit.form-plugin',function() {
        $(this).ajaxSubmit(options);
        return false;
    }).each(function() {
        // store options in hash
        $(":submit,input:image", this).bind('click.form-plugin',function(e) {
            var $form = this.form;
            $form.clk = this;
            if (this.type == 'image') {
                if (e.offsetX != undefined) {
                    $form.clk_x = e.offsetX;
                    $form.clk_y = e.offsetY;
                } else if (typeof $.fn.offset == 'function') { // try to use dimensions plugin
                    var offset = $(this).offset();
                    $form.clk_x = e.pageX - offset.left;
                    $form.clk_y = e.pageY - offset.top;
                } else {
                    $form.clk_x = e.pageX - this.offsetLeft;
                    $form.clk_y = e.pageY - this.offsetTop;
                }
            }
            // clear form vars
            setTimeout(function() { $form.clk = $form.clk_x = $form.clk_y = null; }, 10);
        });
    });
};


/**
 * ajaxFormUnbind unbinds the event handlers that were bound by ajaxForm
 *
 * @name   ajaxFormUnbind
 * @return jQuery
 * @cat    Plugins/Form
 * @type   jQuery
 */
$.fn.ajaxFormUnbind = function() {
    this.unbind('submit.form-plugin');
    return this.each(function() {
        $(":submit,input:image", this).unbind('click.form-plugin');
    });

};

/**
 * formToArray() gathers form element data into an array of objects that can
 * be passed to any of the following ajax functions: $.get, $.post, or load.
 * Each object in the array has both a 'name' and 'value' property.  An example of
 * an array for a simple login form might be:
 *
 * [ { name: 'username', value: 'jresig' }, { name: 'password', value: 'secret' } ]
 *
 * It is this array that is passed to pre-submit callback functions provided to the
 * ajaxSubmit() and ajaxForm() methods.
 *
 * The semantic argument can be used to force form serialization in semantic order.
 * This is normally true anyway, unless the form contains input elements of type='image'.
 * If your form must be submitted with name/value pairs in semantic order and your form
 * contains an input of type='image" then pass true for this arg, otherwise pass false
 * (or nothing) to avoid the overhead for this logic.
 *
 * @example var data = $("#myForm").formToArray();
 * $.post( "myscript.cgi", data );
 * @desc Collect all the data from a form and submit it to the server.
 *
 * @name formToArray
 * @param semantic true if serialization must maintain strict semantic ordering of elements (slower)
 * @type Array<Object>
 * @cat Plugins/Form
 */
$.fn.formToArray = function(semantic) {
    var a = [];
    if (this.length == 0) return a;

    var form = this[0];
    var els = semantic ? form.getElementsByTagName('*') : form.elements;
    if (!els) return a;
    for(var i=0, max=els.length; i < max; i++) {
        var el = els[i];
        var n = el.name;
        if (!n) continue;

        if (semantic && form.clk && el.type == "image") {
            // handle image inputs on the fly when semantic == true
            if(!el.disabled && form.clk == el)
                a.push({name: n+'.x', value: form.clk_x}, {name: n+'.y', value: form.clk_y});
            continue;
        }

        var v = $.fieldValue(el, true);
        if (v && v.constructor == Array) {
            for(var j=0, jmax=v.length; j < jmax; j++)
                a.push({name: n, value: v[j]});
        }
        else if (v !== null && typeof v != 'undefined')
            a.push({name: n, value: v});
    }

    if (!semantic && form.clk) {
        // input type=='image' are not found in elements array! handle them here
        var inputs = form.getElementsByTagName("input");
        for(var i=0, max=inputs.length; i < max; i++) {
            var input = inputs[i];
            var n = input.name;
            if(n && !input.disabled && input.type == "image" && form.clk == input)
                a.push({name: n+'.x', value: form.clk_x}, {name: n+'.y', value: form.clk_y});
        }
    }
    return a;
};


/**
 * Serializes form data into a 'submittable' string. This method will return a string
 * in the format: name1=value1&amp;name2=value2
 *
 * The semantic argument can be used to force form serialization in semantic order.
 * If your form must be submitted with name/value pairs in semantic order then pass
 * true for this arg, otherwise pass false (or nothing) to avoid the overhead for
 * this logic (which can be significant for very large forms).
 *
 * @example var data = $("#myForm").formSerialize();
 * $.ajax('POST', "myscript.cgi", data);
 * @desc Collect all the data from a form into a single string
 *
 * @name formSerialize
 * @param semantic true if serialization must maintain strict semantic ordering of elements (slower)
 * @type String
 * @cat Plugins/Form
 */
$.fn.formSerialize = function(semantic) {
    //hand off to jQuery.param for proper encoding
    return $.param(this.formToArray(semantic));
};


/**
 * Serializes all field elements in the jQuery object into a query string.
 * This method will return a string in the format: name1=value1&amp;name2=value2
 *
 * The successful argument controls whether or not serialization is limited to
 * 'successful' controls (per http://www.w3.org/TR/html4/interact/forms.html#successful-controls).
 * The default value of the successful argument is true.
 *
 * @example var data = $("input").fieldSerialize();
 * @desc Collect the data from all successful input elements into a query string
 *
 * @example var data = $(":radio").fieldSerialize();
 * @desc Collect the data from all successful radio input elements into a query string
 *
 * @example var data = $("#myForm :checkbox").fieldSerialize();
 * @desc Collect the data from all successful checkbox input elements in myForm into a query string
 *
 * @example var data = $("#myForm :checkbox").fieldSerialize(false);
 * @desc Collect the data from all checkbox elements in myForm (even the unchecked ones) into a query string
 *
 * @example var data = $(":input").fieldSerialize();
 * @desc Collect the data from all successful input, select, textarea and button elements into a query string
 *
 * @name fieldSerialize
 * @param successful true if only successful controls should be serialized (default is true)
 * @type String
 * @cat Plugins/Form
 */
$.fn.fieldSerialize = function(successful) {
    var a = [];
    this.each(function() {
        var n = this.name;
        if (!n) return;
        var v = $.fieldValue(this, successful);
        if (v && v.constructor == Array) {
            for (var i=0,max=v.length; i < max; i++)
                a.push({name: n, value: v[i]});
        }
        else if (v !== null && typeof v != 'undefined')
            a.push({name: this.name, value: v});
    });
    //hand off to jQuery.param for proper encoding
    return $.param(a);
};


/**
 * Returns the value(s) of the element in the matched set.  For example, consider the following form:
 *
 *  <form><fieldset>
 *      <input name="A" type="text" />
 *      <input name="A" type="text" />
 *      <input name="B" type="checkbox" value="B1" />
 *      <input name="B" type="checkbox" value="B2"/>
 *      <input name="C" type="radio" value="C1" />
 *      <input name="C" type="radio" value="C2" />
 *  </fieldset></form>
 *
 *  var v = $(':text').fieldValue();
 *  // if no values are entered into the text inputs
 *  v == ['','']
 *  // if values entered into the text inputs are 'foo' and 'bar'
 *  v == ['foo','bar']
 *
 *  var v = $(':checkbox').fieldValue();
 *  // if neither checkbox is checked
 *  v === undefined
 *  // if both checkboxes are checked
 *  v == ['B1', 'B2']
 *
 *  var v = $(':radio').fieldValue();
 *  // if neither radio is checked
 *  v === undefined
 *  // if first radio is checked
 *  v == ['C1']
 *
 * The successful argument controls whether or not the field element must be 'successful'
 * (per http://www.w3.org/TR/html4/interact/forms.html#successful-controls).
 * The default value of the successful argument is true.  If this value is false the value(s)
 * for each element is returned.
 *
 * Note: This method *always* returns an array.  If no valid value can be determined the
 *       array will be empty, otherwise it will contain one or more values.
 *
 * @example var data = $("#myPasswordElement").fieldValue();
 * alert(data[0]);
 * @desc Alerts the current value of the myPasswordElement element
 *
 * @example var data = $("#myForm :input").fieldValue();
 * @desc Get the value(s) of the form elements in myForm
 *
 * @example var data = $("#myForm :checkbox").fieldValue();
 * @desc Get the value(s) for the successful checkbox element(s) in the jQuery object.
 *
 * @example var data = $("#mySingleSelect").fieldValue();
 * @desc Get the value(s) of the select control
 *
 * @example var data = $(':text').fieldValue();
 * @desc Get the value(s) of the text input or textarea elements
 *
 * @example var data = $("#myMultiSelect").fieldValue();
 * @desc Get the values for the select-multiple control
 *
 * @name fieldValue
 * @param Boolean successful true if only the values for successful controls should be returned (default is true)
 * @type Array<String>
 * @cat Plugins/Form
 */
$.fn.fieldValue = function(successful) {
    for (var val=[], i=0, max=this.length; i < max; i++) {
        var el = this[i];
        var v = $.fieldValue(el, successful);
        if (v === null || typeof v == 'undefined' || (v.constructor == Array && !v.length))
            continue;
        v.constructor == Array ? $.merge(val, v) : val.push(v);
    }
    return val;
};

/**
 * Returns the value of the field element.
 *
 * The successful argument controls whether or not the field element must be 'successful'
 * (per http://www.w3.org/TR/html4/interact/forms.html#successful-controls).
 * The default value of the successful argument is true.  If the given element is not
 * successful and the successful arg is not false then the returned value will be null.
 *
 * Note: If the successful flag is true (default) but the element is not successful, the return will be null
 * Note: The value returned for a successful select-multiple element will always be an array.
 * Note: If the element has no value the return value will be undefined.
 *
 * @example var data = jQuery.fieldValue($("#myPasswordElement")[0]);
 * @desc Gets the current value of the myPasswordElement element
 *
 * @name fieldValue
 * @param Element el The DOM element for which the value will be returned
 * @param Boolean successful true if value returned must be for a successful controls (default is true)
 * @type String or Array<String> or null or undefined
 * @cat Plugins/Form
 */
$.fieldValue = function(el, successful) {
    var n = el.name, t = el.type, tag = el.tagName.toLowerCase();
    if (typeof successful == 'undefined') successful = true;

    if (successful && (!n || el.disabled || t == 'reset' || t == 'button' ||
        (t == 'checkbox' || t == 'radio') && !el.checked ||
        (t == 'submit' || t == 'image') && el.form && el.form.clk != el ||
        tag == 'select' && el.selectedIndex == -1))
            return null;

    if (tag == 'select') {
        var index = el.selectedIndex;
        if (index < 0) return null;
        var a = [], ops = el.options;
        var one = (t == 'select-one');
        var max = (one ? index+1 : ops.length);
        for(var i=(one ? index : 0); i < max; i++) {
            var op = ops[i];
            if (op.selected) {
                // extra pain for IE...
                var v = $.browser.msie && !(op.attributes['value'].specified) ? op.text : op.value;
                if (one) return v;
                a.push(v);
            }
        }
        return a;
    }
    return el.value;
};


/**
 * Clears the form data.  Takes the following actions on the form's input fields:
 *  - input text fields will have their 'value' property set to the empty string
 *  - select elements will have their 'selectedIndex' property set to -1
 *  - checkbox and radio inputs will have their 'checked' property set to false
 *  - inputs of type submit, button, reset, and hidden will *not* be effected
 *  - button elements will *not* be effected
 *
 * @example $('form').clearForm();
 * @desc Clears all forms on the page.
 *
 * @name clearForm
 * @type jQuery
 * @cat Plugins/Form
 */
$.fn.clearForm = function() {
    return this.each(function() {
        $('input,select,textarea', this).clearFields();
    });
};

/**
 * Clears the selected form elements.  Takes the following actions on the matched elements:
 *  - input text fields will have their 'value' property set to the empty string
 *  - select elements will have their 'selectedIndex' property set to -1
 *  - checkbox and radio inputs will have their 'checked' property set to false
 *  - inputs of type submit, button, reset, and hidden will *not* be effected
 *  - button elements will *not* be effected
 *
 * @example $('.myInputs').clearFields();
 * @desc Clears all inputs with class myInputs
 *
 * @name clearFields
 * @type jQuery
 * @cat Plugins/Form
 */
$.fn.clearFields = $.fn.clearInputs = function() {
    return this.each(function() {
        var t = this.type, tag = this.tagName.toLowerCase();
        if (t == 'text' || t == 'password' || tag == 'textarea')
            this.value = '';
        else if (t == 'checkbox' || t == 'radio')
            this.checked = false;
        else if (tag == 'select')
            this.selectedIndex = -1;
    });
};


/**
 * Resets the form data.  Causes all form elements to be reset to their original value.
 *
 * @example $('form').resetForm();
 * @desc Resets all forms on the page.
 *
 * @name resetForm
 * @type jQuery
 * @cat Plugins/Form
 */
$.fn.resetForm = function() {
    return this.each(function() {
        // guard against an input with the name of 'reset'
        // note that IE reports the reset function as an 'object'
        if (typeof this.reset == 'function' || (typeof this.reset == 'object' && !this.reset.nodeType))
            this.reset();
    });
};


/**
 * Enables or disables any matching elements.
 *
 * @example $(':radio').enabled(false);
 * @desc Disables all radio buttons
 *
 * @name select
 * @type jQuery
 * @cat Plugins/Form
 */
$.fn.enable = function(b) { 
    if (b == undefined) b = true;
    return this.each(function() { 
        this.disabled = !b 
    });
};

/**
 * Checks/unchecks any matching checkboxes or radio buttons and
 * selects/deselects and matching option elements.
 *
 * @example $(':checkbox').select();
 * @desc Checks all checkboxes
 *
 * @name select
 * @type jQuery
 * @cat Plugins/Form
 */
$.fn.select = function(select) {
    if (select == undefined) select = true;
    return this.each(function() { 
        var t = this.type;
        if (t == 'checkbox' || t == 'radio')
            this.checked = select;
        else if (this.tagName.toLowerCase() == 'option') {
            var $sel = $(this).parent('select');
            if (select && $sel[0] && $sel[0].type == 'select-one') {
                // deselect all other options
                $sel.find('option').select(false);
            }
            this.selected = select;
        }
    });
};

})(jQuery);



/* -------------------------------------------------------------------------------------------------------------------------------------
* 10 .jQuery Tools @VERSION Tabs- The basics of UI design. For Tabs
*
* NO COPYRIGHTS OR LICENSES. DO WHAT YOU LIKE.
*
* http://flowplayer.org/tools/tabs/
*
* Since: November 2008
* Date: @DATE
----------------------------------------------------------------------------------------------------------------------------------------- */
(function($){$.tools=$.tools||{version:'@VERSION'};$.tools.tabs={conf:{tabs:'a',current:'current',onBeforeClick:null,onClick:null,effect:'default',initialIndex:0,event:'click',rotate:false,history:false},addEffect:function(name,fn){effects[name]=fn;}};var effects={'default':function(i,done){this.getPanes().hide().eq(i).show();done.call();},fade:function(i,done){var conf=this.getConf(),speed=conf.fadeOutSpeed,panes=this.getPanes();if(speed){panes.fadeOut(speed);}else{panes.hide();}
panes.eq(i).fadeIn(conf.fadeInSpeed,done);},slide:function(i,done){this.getPanes().slideUp(200);this.getPanes().eq(i).slideDown(400,done);},ajax:function(i,done){this.getPanes().eq(0).load(this.getTabs().eq(i).attr("href"),done);}};var w;$.tools.tabs.addEffect("horizontal",function(i,done){if(!w){w=this.getPanes().eq(0).width();}
this.getCurrentPane().animate({width:0},function(){$(this).hide();});this.getPanes().eq(i).animate({width:w},function(){$(this).show();done.call();});});function Tabs(root,paneSelector,conf){var self=this,trigger=root.add(this),tabs=root.find(conf.tabs),panes=paneSelector.jquery?paneSelector:root.children(paneSelector),current;if(!tabs.length){tabs=root.children();}
if(!panes.length){panes=root.parent().find(paneSelector);}
if(!panes.length){panes=$(paneSelector);}
$.extend(this,{click:function(i,e){var tab=tabs.eq(i);if(typeof i=='string'&&i.replace("#","")){tab=tabs.filter("[href*="+i.replace("#","")+"]");i=Math.max(tabs.index(tab),0);}
if(conf.rotate){var last=tabs.length-1;if(i<0){return self.click(last,e);}
if(i>last){return self.click(0,e);}}
if(!tab.length){if(current>=0){return self;}
i=conf.initialIndex;tab=tabs.eq(i);}
if(i===current){return self;}
e=e||$.Event();e.type="onBeforeClick";trigger.trigger(e,[i]);if(e.isDefaultPrevented()){return;}
effects[conf.effect].call(self,i,function(){e.type="onClick";trigger.trigger(e,[i]);});current=i;tabs.removeClass(conf.current);tab.addClass(conf.current);return self;},getConf:function(){return conf;},getTabs:function(){return tabs;},getPanes:function(){return panes;},getCurrentPane:function(){return panes.eq(current);},getCurrentTab:function(){return tabs.eq(current);},getIndex:function(){return current;},next:function(){return self.click(current+1);},prev:function(){return self.click(current-1);},destroy:function(){tabs.unbind(conf.event).removeClass(conf.current);panes.find("a[href^=#]").unbind("click.T");return self;}});$.each("onBeforeClick,onClick".split(","),function(i,name){if($.isFunction(conf[name])){$(self).bind(name,conf[name]);}
self[name]=function(fn){if(fn){$(self).bind(name,fn);}
return self;};});if(conf.history&&$.fn.history){$.tools.history.init(tabs);conf.event='history';}
tabs.each(function(i){$(this).bind(conf.event,function(e){self.click(i,e);return e.preventDefault();});});panes.find("a[href^=#]").bind("click.T",function(e){self.click($(this).attr("href"),e);});if(location.hash&&conf.tabs=="a"&&root.find("[href="+location.hash+"]").length){self.click(location.hash);}else{if(conf.initialIndex===0||conf.initialIndex>0){self.click(conf.initialIndex);}}}
$.fn.jttabs=function(paneSelector,conf){var el=this.data("tabs");if(el){el.destroy();this.removeData("tabs");}
if($.isFunction(conf)){conf={onBeforeClick:conf};}
conf=$.extend({},$.tools.tabs.conf,conf);this.each(function(){el=new Tabs($(this),paneSelector,conf);$(this).data("tabs",el);});return conf.api?el:this;};})(jQuery);



/* -------------------------------------------------------------------------------------------------------------------------------------
11
 * Isotope v1.1.110426
 * An exquisite jQuery plugin for magical layouts
 * http://isotope.metafizzy.co
 *
 * Commercial use requires one-time license fee
 * http://metafizzy.co/#licenses
 *
 * Copyright 2011 David DeSandro / Metafizzy
----------------------------------------------------------------------------------------------------------------------------------------- */
(function(l,f,s){var m=function(){var a=["Moz","Webkit","Khtml","O","Ms"],b={};return function(c,d){d=d||document.documentElement;var e=d.style,g,h,i,t;if(arguments.length===1&&typeof b[c]==="string")return b[c];if(typeof e[c]==="string")return b[c]=c;h=c.charAt(0).toUpperCase()+c.slice(1);i=0;for(t=a.length;i<t;i++){g=a[i]+h;if(typeof e[g]==="string")return b[c]=g}}}(),u=document.documentElement,w=" -o- -moz- -ms- -webkit- -khtml- ".split(" "),o=[{name:"csstransforms",getResult:function(){return!!m("transform")}},
{name:"csstransforms3d",getResult:function(){var a=!!m("perspective");if(a){var b=document.createElement("style"),c=document.createElement("div");a="@media ("+w.join("transform-3d),(")+"modernizr)";b.textContent=a+"{#modernizr{height:3px}}";(document.head||document.getElementsByTagName("head")[0]).appendChild(b);c.id="modernizr";u.appendChild(c);a=c.offsetHeight===3;b.parentNode.removeChild(b);c.parentNode.removeChild(c)}return!!a}},{name:"csstransitions",getResult:function(){return!!m("transitionProperty")}}],
j,v=o.length;if(l.Modernizr)for(j=0;j<v;j++){var p=o[j];Modernizr.hasOwnProperty(p.name)||Modernizr.addTest(p.name,p.getResult)}else l.Modernizr=function(){var a={_version:"1.6ish: miniModernizr for Isotope"},b=[],c,d;for(j=0;j<v;j++){c=o[j];d=c.getResult();a[c.name]=d;c=(d?"":"no-")+c.name;b.push(c)}u.className+=" "+b.join(" ");return a}();var k={transformProp:m("transform"),fnUtils:Modernizr.csstransforms3d?{translate:function(a){return"translate3d("+a[0]+"px, "+a[1]+"px, 0) "},scale:function(a){return"scale3d("+
a+", "+a+", 1) "}}:{translate:function(a){return"translate("+a[0]+"px, "+a[1]+"px) "},scale:function(a){return"scale("+a+") "}},set:function(a,b,c){var d=f(a),e=d.data("isoTransform")||{},g={},h,i={};g[b]=c;f.extend(e,g);for(h in e)i[h]=(0,k.fnUtils[h])(e[h]);b=(i.translate||"")+(i.scale||"");d.data("isoTransform",e);a.style[k.transformProp]=b}};f.cssNumber.scale=true;f.cssHooks.scale={set:function(a,b){if(typeof b==="string")b=parseFloat(b);k.set(a,"scale",b)},get:function(a){return(a=f.data(a,"transform"))&&
a.scale?a.scale:1}};f.fx.step.scale=function(a){f.cssHooks.scale.set(a.elem,a.now+a.unit)};f.cssNumber.translate=true;f.cssHooks.translate={set:function(a,b){k.set(a,"translate",b)},get:function(a){return(a=f.data(a,"transform"))&&a.translate?a.translate:[0,0]}};var q=f.event,r;q.special.smartresize={setup:function(){f(this).bind("resize",q.special.smartresize.handler)},teardown:function(){f(this).unbind("resize",q.special.smartresize.handler)},handler:function(a,b){var c=this,d=arguments;a.type=
"smartresize";r&&clearTimeout(r);r=setTimeout(function(){jQuery.event.handle.apply(c,d)},b==="execAsap"?0:100)}};f.fn.smartresize=function(a){return a?this.bind("smartresize",a):this.trigger("smartresize",["execAsap"])};f.Isotope=function(a,b){this.element=f(b);this._create(a);this._init()};var n=["overflow","position","width","height"];f.Isotope.prototype={options:{resizable:true,layoutMode:"masonry",containerClass:"isotope",itemClass:"isotope-item",hiddenClass:"isotope-hidden",hiddenStyle:Modernizr.csstransforms&&
!f.browser.opera?{opacity:0,scale:0.0010}:{opacity:0},visibleStyle:Modernizr.csstransforms&&!f.browser.opera?{opacity:1,scale:1}:{opacity:1},animationEngine:f.browser.opera?"jquery":"best-available",animationOptions:{queue:false,duration:800},sortBy:"original-order",sortAscending:true,resizesContainer:true,transformsEnabled:true,itemPositionDataEnabled:false},_filterFind:function(a,b){return b?a.filter(b).add(a.find(b)):a},_create:function(a){this.options=f.extend(true,{},this.options,a);this.isNew=
{};this.styleQueue=[];this.elemCount=0;this.$allAtoms=this._filterFind(this.element.children(),this.options.itemSelector);a=this.element[0].style;this.originalStyle={};for(var b=0,c=n.length;b<c;b++){var d=n[b];this.originalStyle[d]=a[d]||null}this.element.css({overflow:"hidden",position:"relative"});a=false;switch(this.options.animationEngine.toLowerCase().replace(/[ _\-]/g,"")){case "css":case "none":this.applyStyleFnName="css";break;case "jquery":this.applyStyleFnName="animate";a=true;break;default:this.applyStyleFnName=
Modernizr.csstransitions?"css":"animate"}this.getPositionStyles=(this.usingTransforms=this.options.transformsEnabled&&Modernizr.csstransforms&&Modernizr.csstransitions&&!a)?this._translate:this._positionAbs;this.options.getSortData=f.extend(this.options.getSortData,{"original-order":function(g,h){return h.elemCount}});this._setupAtoms(this.$allAtoms);a=f(document.createElement("div"));this.element.prepend(a);this.posTop=Math.round(a.position().top);this.posLeft=Math.round(a.position().left);a.remove();
var e=this;setTimeout(function(){e.element.addClass(e.options.containerClass)},0);this.options.resizable&&f(l).bind("smartresize.isotope",function(){e.element.isotope("resize")})},_isNewProp:function(a){return this.prevOpts?this.options[a]!==this.prevOpts[a]:true},_init:function(a){var b=this;f.each(["filter","sortBy","sortAscending"],function(c,d){b.isNew[d]=b._isNewProp(d)});this.$filteredAtoms=this.isNew.filter?this._filter(this.$allAtoms):this.$allAtoms;if(this.isNew.filter||this.isNew.sortBy||
this.isNew.sortAscending)this._sort();this.reLayout(a)},option:function(a,b){if(f.isPlainObject(a))this.options=f.extend(true,this.options,a);else if(a&&typeof b==="undefined")return this.options[a];else this.options[a]=b;return this},_setupAtoms:function(a){var b={position:"absolute"};if(this.usingTransforms){b.left=0;b.top=0}a.css(b).addClass(this.options.itemClass);this.updateSortData(a,true)},_filter:function(a){var b=this.options.filter===""?"*":this.options.filter;if(b){var c=this.options.hiddenClass,
d="."+c,e=a.not(d),g=a.filter(d);d=g;a=a.filter(b);if(b!=="*"){d=g.filter(b);b=e.not(b).toggleClass(c);b.addClass(c);this.styleQueue.push({$el:b,style:this.options.hiddenStyle})}this.styleQueue.push({$el:d,style:this.options.visibleStyle});d.removeClass(c)}return a},updateSortData:function(a,b){var c=this,d=this.options.getSortData,e,g;a.each(function(){e=f(this);g={};for(var h in d)g[h]=d[h](e,c);e.data("isotope-sort-data",g);b&&c.elemCount++})},_sort:function(){var a=this,b=function(d){return f(d).data("isotope-sort-data")[a.options.sortBy]},
c=this.options.sortAscending?1:-1;this.$filteredAtoms.sort(function(d,e){var g=b(d),h=b(e);return(g>h?1:g<h?-1:0)*c});return this},_translate:function(a,b){return{translate:[a,b]}},_positionAbs:function(a,b){return{left:a,top:b}},_pushPosition:function(a,b,c){var d=this.getPositionStyles(b,c);this.styleQueue.push({$el:a,style:d});this.options.itemPositionDataEnabled&&a.data("isotope-item-position",{x:b,y:c})},layout:function(a,b){var c=this.options.layoutMode;this["_"+c+"Layout"](a);this.options.resizesContainer&&
this.styleQueue.push({$el:this.element,style:this["_"+c+"GetContainerSize"]()});var d=this.applyStyleFnName==="animate"&&!this.isLaidOut?"css":this.applyStyleFnName,e=this.options.animationOptions;f.each(this.styleQueue,function(g,h){h.$el[d](h.style,e)});this.styleQueue=[];b&&b.call(a);this.isLaidOut=true;return this},resize:function(){return this["_"+this.options.layoutMode+"Resize"]()},reLayout:function(a){return this["_"+this.options.layoutMode+"Reset"]().layout(this.$filteredAtoms,a)},addItems:function(a,
b){var c=this._filterFind(a,this.options.itemSelector);this._setupAtoms(c);this.$allAtoms=this.$allAtoms.add(c);b&&b(c)},insert:function(a,b){this.element.append(a);var c=this;this.addItems(a,function(d){d=c._filter(d);c.$filteredAtoms=c.$filteredAtoms.add(d)});this._sort().reLayout(b)},appended:function(a,b){var c=this;this.addItems(a,function(d){c.$filteredAtoms=c.$filteredAtoms.add(d);c.layout(d,b)})},remove:function(a){this.$allAtoms=this.$allAtoms.not(a);this.$filteredAtoms=this.$filteredAtoms.not(a);
a.remove()},_shuffleArray:function(a){var b,c,d=a.length;if(d)for(;--d;){c=~~(Math.random()*(d+1));b=a[c];a[c]=a[d];a[d]=b}return a},shuffle:function(a){this.options.sortBy="shuffle";this.$allAtoms=this._shuffleArray(this.$allAtoms);this.$filteredAtoms=this._filter(this.$allAtoms);return this.reLayout(a)},destroy:function(){var a=this.usingTransforms;this.$allAtoms.removeClass(this.options.hiddenClass+" "+this.options.itemClass).each(function(){this.style.position=null;this.style.top=null;this.style.left=
null;this.style.opacity=null;if(a)this.style[k.transformProp]=null});for(var b=this.element[0].style,c=0,d=n.length;c<d;c++){var e=n[c];b[e]=this.originalStyle[e]}this.element.unbind(".isotope").removeClass(this.options.containerClass).removeData("isotope");f(l).unbind(".isotope")},_getSegments:function(a,b){var c=b?"rowHeight":"columnWidth",d=b?"height":"width",e=b?"Height":"Width",g=b?"rows":"cols";this[d]=this.element[d]();e=this.options[a]&&this.options[a][c]||this.$filteredAtoms["outer"+e](true)||
this[d];d=Math.floor(this[d]/e);d=Math.max(d,1);this[a][g]=d;this[a][c]=e;return this},_masonryPlaceBrick:function(a,b,c){b=Math.min.apply(Math,c);for(var d=b+a.outerHeight(true),e=c.length,g=e,h=this.masonry.cols+1-e;e--;)if(c[e]===b)g=e;this._pushPosition(a,this.masonry.columnWidth*g+this.posLeft,b);for(e=0;e<h;e++)this.masonry.colYs[g+e]=d},_masonryLayout:function(a){var b=this;a.each(function(){var c=f(this),d=Math.ceil(c.outerWidth(true)/b.masonry.columnWidth);d=Math.min(d,b.masonry.cols);if(d===
1)b._masonryPlaceBrick(c,b.masonry.cols,b.masonry.colYs);else{var e=b.masonry.cols+1-d,g=[],h,i;for(i=0;i<e;i++){h=b.masonry.colYs.slice(i,i+d);g[i]=Math.max.apply(Math,h)}b._masonryPlaceBrick(c,e,g)}});return this},_masonryReset:function(){this.masonry={};this._getSegments("masonry");var a=this.masonry.cols;for(this.masonry.colYs=[];a--;)this.masonry.colYs.push(this.posTop);return this},_masonryResize:function(){var a=this.masonry.cols;this._getSegments("masonry");this.masonry.cols!==a&&this.reLayout();
return this},_masonryGetContainerSize:function(){return{height:Math.max.apply(Math,this.masonry.colYs)-this.posTop}},_fitRowsLayout:function(a){this.width=this.element.width();var b=this;a.each(function(){var c=f(this),d=c.outerWidth(true),e=c.outerHeight(true);if(b.fitRows.x!==0&&d+b.fitRows.x>b.width){b.fitRows.x=0;b.fitRows.y=b.fitRows.height}b._pushPosition(c,b.fitRows.x+b.posLeft,b.fitRows.y+b.posTop);b.fitRows.height=Math.max(b.fitRows.y+e,b.fitRows.height);b.fitRows.x+=d});return this},_fitRowsReset:function(){this.fitRows=
{x:0,y:0,height:0};return this},_fitRowsGetContainerSize:function(){return{height:this.fitRows.height}},_fitRowsResize:function(){return this.reLayout()},_cellsByRowReset:function(){this.cellsByRow={};this._getSegments("cellsByRow");this.cellsByRow.rowHeight=this.options.cellsByRow.rowHeight||this.$allAtoms.outerHeight(true);return this},_cellsByRowLayout:function(a){var b=this,c=this.cellsByRow.cols;this.cellsByRow.atomsLen=a.length;a.each(function(d){var e=f(this),g=(d%c+0.5)*b.cellsByRow.columnWidth-
e.outerWidth(true)/2+b.posLeft;d=(~~(d/c)+0.5)*b.cellsByRow.rowHeight-e.outerHeight(true)/2+b.posTop;b._pushPosition(e,g,d)});return this},_cellsByRowGetContainerSize:function(){return{height:Math.ceil(this.cellsByRow.atomsLen/this.cellsByRow.cols)*this.cellsByRow.rowHeight+this.posTop}},_cellsByRowResize:function(){var a=this.cellsByRow.cols;this._getSegments("cellsByRow");this.cellsByRow.cols!==a&&this.reLayout();return this},_straightDownReset:function(){this.straightDown={y:0};return this},_straightDownLayout:function(a){var b=
this;a.each(function(){var c=f(this);b._pushPosition(c,b.posLeft,b.straightDown.y+b.posTop);b.straightDown.y+=c.outerHeight(true)});return this},_straightDownGetContainerSize:function(){return{height:this.straightDown.y+this.posTop}},_straightDownResize:function(){this.reLayout();return this},_masonryHorizontalPlaceBrick:function(a,b,c){b=Math.min.apply(Math,c);for(var d=b+a.outerWidth(true),e=c.length,g=e,h=this.masonryHorizontal.rows+1-e;e--;)if(c[e]===b)g=e;this._pushPosition(a,b,this.masonryHorizontal.rowHeight*
g+this.posTop);for(e=0;e<h;e++)this.masonryHorizontal.rowXs[g+e]=d},_masonryHorizontalLayout:function(a){var b=this;a.each(function(){var c=f(this),d=Math.ceil(c.outerHeight(true)/b.masonryHorizontal.rowHeight);d=Math.min(d,b.masonryHorizontal.rows);if(d===1)b._masonryHorizontalPlaceBrick(c,b.masonryHorizontal.rows,b.masonryHorizontal.rowXs);else{var e=b.masonryHorizontal.rows+1-d,g=[],h,i;for(i=0;i<e;i++){h=b.masonryHorizontal.rowXs.slice(i,i+d);g[i]=Math.max.apply(Math,h)}b._masonryHorizontalPlaceBrick(c,
e,g)}});return this},_masonryHorizontalReset:function(){this.masonryHorizontal={};this._getSegments("masonryHorizontal",true);var a=this.masonryHorizontal.rows;for(this.masonryHorizontal.rowXs=[];a--;)this.masonryHorizontal.rowXs.push(this.posLeft);return this},_masonryHorizontalResize:function(){var a=this.masonryHorizontal.rows;this._getSegments("masonryHorizontal",true);this.masonryHorizontal.rows!==a&&this.reLayout();return this},_masonryHorizontalGetContainerSize:function(){return{width:Math.max.apply(Math,
this.masonryHorizontal.rowXs)-this.posLeft}},_fitColumnsReset:function(){this.fitColumns={x:0,y:0,width:0};return this},_fitColumnsLayout:function(a){var b=this;this.height=this.element.height();a.each(function(){var c=f(this),d=c.outerWidth(true),e=c.outerHeight(true);if(b.fitColumns.y!==0&&e+b.fitColumns.y>b.height){b.fitColumns.x=b.fitColumns.width;b.fitColumns.y=0}b._pushPosition(c,b.fitColumns.x+b.posLeft,b.fitColumns.y+b.posTop);b.fitColumns.width=Math.max(b.fitColumns.x+d,b.fitColumns.width);
b.fitColumns.y+=e});return this},_fitColumnsGetContainerSize:function(){return{width:this.fitColumns.width}},_fitColumnsResize:function(){return this.reLayout()},_cellsByColumnReset:function(){this.cellsByColumn={};this._getSegments("cellsByColumn",true);this.cellsByColumn.columnWidth=this.options.cellsByColumn.columnWidth||this.$allAtoms.outerHeight(true);return this},_cellsByColumnLayout:function(a){var b=this,c=this.cellsByColumn.rows;this.cellsByColumn.atomsLen=a.length;a.each(function(d){var e=
f(this),g=(~~(d/c)+0.5)*b.cellsByColumn.columnWidth-e.outerWidth(true)/2+b.posLeft;d=(d%c+0.5)*b.cellsByColumn.rowHeight-e.outerHeight(true)/2+b.posTop;b._pushPosition(e,g,d)});return this},_cellsByColumnGetContainerSize:function(){return{width:Math.ceil(this.cellsByColumn.atomsLen/this.cellsByColumn.rows)*this.cellsByColumn.columnWidth+this.posLeft}},_cellsByColumnResize:function(){var a=this.cellsByColumn.rows;this._getSegments("cellsByColumn",true);this.cellsByColumn.rows!==a&&this.reLayout();
return this}};f.fn.imagesLoaded=function(a){var b=this.find("img"),c=b.length,d=this;b.length||a.call(this);b.bind("load",function(){--c<=0&&a.call(d)}).each(function(){if(this.complete||this.complete===s){var e=this.src;this.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";this.src=e}});return this};f.widget=f.widget||{};f.widget.bridge=f.widget.bridge||function(a,b){f.fn[a]=function(c){var d=typeof c==="string",e=Array.prototype.slice.call(arguments,1),g=this;c=!d&&e.length?
f.extend.apply(null,[true,c].concat(e)):c;if(d&&c.charAt(0)==="_")return g;d?this.each(function(){var h=f.data(this,a);if(!h)return f.error("cannot call methods on "+a+" prior to initialization; attempted to call method '"+c+"'");if(!f.isFunction(h[c]))return f.error("no such method '"+c+"' for "+a+" widget instance");var i=h[c].apply(h,e);if(i!==h&&i!==s){g=i;return false}}):this.each(function(){var h=f.data(this,a);h?h.option(c||{})._init():f.data(this,a,new b(c,this))});return g}};f.widget.bridge("isotope",
f.Isotope)})(window,jQuery);