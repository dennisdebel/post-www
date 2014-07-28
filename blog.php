<?php
/*
Template Name: Blog
*/
?>

<!-- CUSTOM HEADER -->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 TRANSITIONAL//EN">
<html>

	<head>
		<title>Pharmacy Dailie</title>
		
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
	  var numRand = Math.floor(Math.random()*200);
	  $(this).css({'top' : '+' + numRand});
	  $(this).css({'left' : '+' + numRand});
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


<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/blog.css" type="text/css" />


<meta meta name="viewport" content="width=device-width, initial-scale=0.1">
<meta name="viewport" content="user-scalable=yes" >




</head>
	
	<body>
		

	
	
<!-- END OF CUSTOM HTML HEADER -->

<!-- The blog containr -->
<div id="blogContainer">

	<!-- The blog header -->
	<div id="blogHeader">
	
		<div id="blogTitle">
		<a href="<? echo site_url(); ?>">
		PHARMACIE<br>dailie</a>
		</div>

		<div id="blogName">
		<a href="<? echo site_url(); ?>">
		Chiara Arkesteijn</a>
		</div>
	</div>
	<!-- End of the blog header-->
	 
	<!-- The blog posts -->
	<div id="blogContent">

	
		<!-- only show posts from the blog category (id=6 in my case) -->
		<?php query_posts('cat=6'); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



			<div class="post">
				
				<div class="blogPostTitle">
					<p><?php the_title(); 
					//permalink to add...
					?> </p>
				</div>

				<!-- The blog posts metadata-->
				<div class="blogMeta">
					<?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
				</div>

				<div class="blogImg">
					
					<!--<a href="<?php echo get_permalink();?>">-->
					 <?
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('large');
						} 
						?> 
					<!--</a>-->
					


					<div class="blogPostText">
						<?php

						 	$content = get_the_content();
							$content = preg_replace('/(<)([img])(\w+)([^>]*>)/', "", $content);
							$content = apply_filters('the_content', $content);
							$content = str_replace(']]>', ']]&gt;', $content);
							echo $content;
						?>

						<div class="blogTags">
						tags: <?php
						$posttags = get_the_tags();
						if ($posttags) {
						  foreach($posttags as $tag) {
						  	echo $tag->name . '';
						    //echo "<a href=".get_tag_link($tag).">".$tag->name."</a>";
						      
						  }
						}
						?>
						</div>

						<br>
					<div class="blogSocial">
						<!-- AddThis Button BEGIN -->
						<div class="addthis_toolbox addthis_default_style ">
						<a class="addthis_button_preferred_1"></a>
						<a class="addthis_button_preferred_2"></a>
						<a class="addthis_button_preferred_7"></a>
						<a class="addthis_button_preferred_5"></a>
						<a class="addthis_button_preferred_8"></a>
						<a class="addthis_button_preferred_9"></a>
						<a class="addthis_button_compact"></a>
						
						</div>
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-525d546b612ef330"></script>
						<!-- AddThis Button END -->
					</div>

					</div>
				</div>
			
			</div>
			   
			
				<?php endwhile; ?>

	</div><!-- End of the blog posts -->

	<!-- The blog sidebar -->
	<div id="blogSidebar">
	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/profile.jpg">
	<br>
	<br>
	Pharmacie dailie is a daily updated blog showcasing watercolors by Chiara Arkesteijn. Everyday a new beauty item will be added to the Pharmacie. 
	<!--<p><a href="about">about</a></p>-->
	<p><a href="http://www.chiaraarkesteijn.nl/" target="_blank">chiaraarkesteijn.nl</a> </p>
	<!--<p><a href="about">archive</a> </p>-->

	</div>

	<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

	<?php else : ?>

		<h2>Not Found</h2>

	<?php endif; ?>
	


	</div>


	











<?php get_footer(); ?>
