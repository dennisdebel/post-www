<?php
/*
Single Post Template: Shop Single Item
Description: This part is optional, but helpful for describing the Post Template
*/
?>

<!-- CUSTOM HEADER -->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 TRANSITIONAL//EN">
<html>

	<head>
		<title>Aai Papergoods by Chiara Arkesteijn</title>
		
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

/* image gallery */
	$('#thumbs img').css( 'cursor', 'pointer' );
	$('#thumbs img').click(function(){
    $('#largeImage').attr('src',$(this).attr('src').replace('thumb','large'));
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


<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/shop.css" type="text/css" />


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
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.jpg"><br><br>
			papergoods by Chiara Arkesteijn</a>
		</div>

		<div id="mainMenu">
			<a href="<?php echo get_permalink( get_page_by_path( 'about-aai' ) ) ?>">about</a>
			<a href="<?php echo get_permalink( get_page_by_path( 'collection' ) ) ?>">collection</a>
			<a href="<?php echo get_permalink( get_page_by_path( 'shop' ) ) ?>">shop</a>
			<?php get_cart_link(); ?>
		</div>


	</div>
	<!-- End of the blog header-->
	 
	<!-- The blog posts -->
	<div id="blogContent">


	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



		


			<div class="post clear">
			
				
			

				<div class="blogImg">


						
					<!-- get featured image (with url for css styling) -->
						
					<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

					<img id="largeImage" src="<?php echo $image[0]; ?>">
					<?php endif; ?>
						
				
				
					<!-- get all other images (define maximun at numberposts) -->
						<div id="thumbs">
						<?
						$args = array(
							'post_type'   => 'attachment',
							'numberposts' => 4,
							'post_status' => 'any',
							'post_parent' => $post->ID,
						
							);
						$attachments = get_posts( $args );

						// if attachements is set and there are more than one images diplay them as thumbs:
						if ( $attachments && count($attachments) > 1) {
							$i = 0;
						

							foreach ( $attachments as $attachment ) {
								//get attachment urls
					

								echo "<img id='thumb' src='";
								echo wp_get_attachment_url( $attachment->ID, 'medium');
								echo "'>";
							

							// $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
							 //echo "<img id='largeImage' src='$image[0]'";
					
								
								
								$i++;
							}
						}	else {
								//of no images are found, align content in center by adding empty div
								echo "<div class='emptyContainer'> </div>";}
					
				
						?>
						</div>
	
				</div>

				<div class="blogPostText">

					
						<p class="blogPostTitle">
							<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a> 
						</p>
					
	
					
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
					
					<!-- echo raw description -->
					<?php
					$the_content = get_the_content();
					$the_content = preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '', $the_content);  # strip shortcodes, (shop etc)
					$the_content = str_replace("&nbsp;", "<br>", $the_content);
					echo $the_content;
					?>
					
					<!-- echo clean shop -->

					<!-- if only one choice of product, no dropdown is shown, so check for this and else only echo price -->

						<!-- echo the price from product -->
								<!-- echo the price from product -->
						<?php 
						$output_details=maybe_unserialize(get_post_meta( $post->ID, '_eshop_product' ));
						
						if (isset($output_details[0]['products'][2]['option']['price'])){

							//if more than one option, echo dropdown

							echo do_shortcode ('[eshop_show_product id="'.get_the_ID().'" class="hilite" panels="yes" form="yes"]');

						} else {
							
							// echo only price, no dropdown
							if(isset($output_details[0]['products'][1]['price'])){
								//only print price, if price is set...
								echo "<br><br><p>From € ";
								print_r($output_details[0]['products'][1]['price']);
								echo "</p>";
							}
							echo do_shortcode ('[eshop_show_product id="'.get_the_ID().'" class="hilite" panels="yes" form="yes"]');
						}
							
						?>


					<?php ?>


					





						


						


						<br>
						<!--
					<div class="blogSocial">
						
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
						 -->
					</div>

					</div>
				
			
			</div>
			   
			
				<?php endwhile; ?>

	</div><!-- End of the blog posts -->

	<!-- The blog sidebar 
	<div id="blogSidebar">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/profile.jpg">
		<br>
		<br>
		Pharmacie dailie is a daily updated blog showcasing watercolors by Chiara Arkesteijn. Everyday a new beauty item will be added to the Pharmacie. 
		
		<p><a href="http://www.chiaraarkesteijn.nl/" target="_blank">chiaraarkesteijn.nl</a> </p>
	

	</div>-->

	<div id="blogFooter">
		

		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
		<br><br><br>
		<p>
		Return Policy | Shipping info | Terms of Service | Contact | Privacy Statement | All rights reserved, copyright <?php echo date('Y'); ?> ChiaraArkesteijn.nl
		</p>
	</div>


	

	<?php else : ?>

		<h2>Not Found</h2>

	<?php endif; ?>
	


	</div>


	











<?php get_footer(); ?>
