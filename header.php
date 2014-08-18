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
        var posBottom = (sticky.position().top + sticky.outerHeight());
        
		//posLeft = 400*Math.sin((posBottom*0.01) % (Math.PI * 2)) - (Math.PI / 2);
		//posRight = 400*Math.sin((posBottom*0.01) % (Math.PI * 2)) - (Math.PI / 2);		
		//debug: 
		

		var opacity = 1/posBottom*300;

		//make sure it stays non-opaque
		if(opacity > 0.1){
			opacity = 0.1;
		}


		//console.log(opacity	);
		//diagonal overlay
		//$('#overlay').css("margin-top", (posBottom*0.7)+'px');
		
		//clouds
		if(posBottom > 26){

			$('#middlemenu').css("position","fixed");
			$('#middlemenu').css("top","0");
			$('#middlemenu').css("padding-top","10");
			$('#middlemenu').css("height","20px");
			//$('#middlemenu').css("border-bottom-color","#666");
			$( "#middlemenu" ).addClass( "shadow" );

			$('.siteTitle').css("opacity", "0.1");
			$('.siteTitle').css("opacity", opacity);
			//$('#siteTitle').css("position","fixed");


		} else {
			if(posBottom < 26){

				$('#middlemenu').css("position","relative");
				$('#middlemenu').css("top","30px");
				$('#middlemenu').css("border-bottom-color","#fff");
				$( "#middlemenu" ).removeClass( "shadow" );
				$('.siteTitle').css("opacity", "0.1");
				//$('#siteTitle').css("position","relative");


			}
		}
		//$('#middlemenu').css("border-bottom","1px solid rgb("+posBottom/200+","+posBottom/200+","+posBottom/200+");
		
		


    });

	
	
	


	// //make sticky footer
	// var docHeight = $(window).height();
 //   var footerHeight = $('.footer').height();
 //   var footerTop = $('.footer').position().top + footerHeight;
   
 //   if (footerTop < docHeight) {
 //    $('.footer').css('margin-top', 10 + (docHeight - footerTop) + 'px');
 //   }




//automatic citation/footnotes
 $(".post_content").append("<ol id=\"footnotes\"></ol>");
   footnote = 1;
   $("q[cite],q[title],blockquote[cite],blockquote[title]").addClass("footnote");
   $(".footnote").each(function() {
      
      cite="<a name='"+footnote+"'><li>";
      url=$(this).attr("cite");
      title=$(this).attr("title");
      $(this).append("<a href='#"+footnote+"'><sup>"+footnote+"</sup></a>");

      if(title && url) {
         cite+="<a href=\""+url+"\" target='_blank'>"+title+"</a>";
      } else if(title) {
         cite+=title;
      } else if(url) {
         cite+="<a href=\""+url+"\"target='_blank'>"+url+"</a>";
      }
      cite+="</li></a>";
      $("#footnotes").append(cite);
      footnote++;
   });

   
});









           
    
</script>		 


<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- <meta name="viewport" content="user-scalable=yes" > -->




</head>
	<title></title>
	<body>
		
	<div class="fixed"><!-- needed for overlay --></div>

	
	<!--site logo title home link -->
	<div class="siteTitle">
	near future communication logbook </br>
	a project by </br>
	dennis de bel and </br>
	roel roscam abbing </br>
	2014

	</div>

	<div id="middlemenu">
	<!--about contact --><p>
	<? include('middlemenu.php'); 
	?></p>
	</div>