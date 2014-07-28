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

	
	<!--site logo title home link -->
	<div class="siteTitle">
	<a href="<? echo site_url(); ?>">
	<?php $blog_title = get_bloginfo('name'); echo $blog_title; ?></a>
	</div>

	<div id="middlemenu">
	<? include('middlemenu.php'); 
	?>
	</div>