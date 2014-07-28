<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 TRANSITIONAL//EN">
<html>

	<head>
		<title></title>
		<!--<meta name="google-translate-customization" content="3a0041578e8a9762-28c938936e597088-g992a8e4cd7b5c560-17"></meta>-->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.infinitescroll.min.js"></script>


      
<script>           

$(function(){
    var sticky = $('.fixed');
    $(window).scroll(function(){
        var posBottom = (sticky.position().top + sticky.outerHeight()+370);
        
		posLeft = 400*Math.sin((posBottom*0.01) % (Math.PI * 2)) - (Math.PI / 2);
		posRight = 400*Math.sin((posBottom*0.01) % (Math.PI * 2)) - (Math.PI / 2);		
		//debug: 
		//sticky.text('posleftDebug: ' + posLeft);
		
		//diagonal overlay
		$('#overlay').css("margin-top", (posBottom*0.7)+'px');
		
		//clouds
		
		$('#cloudLeft').css("margin-left", posLeft/2);
		$('#cloudLeft').css("opacity", posLeft/1000);
		$('#cloudRight').css("margin-right", posRight/2);
		$('#cloudRight').css("opacity", posLeft/1000);
		


    });


	
	
	$('#middlemenu').fadeOut(0);
	
	//remove title (tooltips) attribute and stor in data array
	$('[title]').attr('title', function(i, title) {
    	$(this).data('title', title).removeAttr('title');
	});


	//position posts randomly
	$('.post').each(function() {
	  var numRandTop = Math.floor(Math.random()*500);
  	  var numRandLeft = Math.floor(Math.random()*100);
	  $(this).css({'top' : '+' + numRandTop});
	  $(this).css({'left' : '+' + numRandLeft});
	});
	
	
	//show.hide menu on scroll, of mouse hoover?
	$(window).scroll(function() {
		
		$('#middlemenu').slideDown(1000);
    });

	var interval = 1;

	setInterval(function(){
    if(interval == 3){ /* this is the user idle time out in sec */
		$("#middlemenu").slideUp(1000);
       	interval = 1; 
    }
    interval = interval+1;
    console.log(interval);
	},1000); //count in seconds

	//reset counter on scroll
	$(document).bind('mousemove keypress scroll', function() {
    interval = 1; 
    });




	//make sticky footer
	var docHeight = $(window).height();
   var footerHeight = $('.footer').height();
   var footerTop = $('.footer').position().top + footerHeight;
   
   if (footerTop < docHeight) {
    $('.footer').css('margin-top', 10 + (docHeight - footerTop) + 'px');
   }








});







 
	

			             
    
</script>		 


<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />


<meta meta name="viewport" content="width=device-width, initial-scale=0.1">
<meta name="viewport" content="user-scalable=yes" >




</head>
	<title></title>
	<body>
		
<div class="fixed"><!-- needed for overlay --></div>
	
	