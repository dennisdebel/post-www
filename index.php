<?php get_header(); ?>




	
	<!--site logo title home link -->
	<div class="siteTitle">
	<a href="<? echo site_url(); ?>">
	chiara arkesteijn</a>
	</div>

	<div id="middlemenu">
	<? include('middlemenu.php'); 
	?>
	</div>
	
	
	<div id="overlay"></div>

	<div class="clouds">
		<div id="cloudLeft"></div>      
	  	<div id="cloudRight"></div>  
	</div>    

	
	<div class="footer">
	editions - design
	</div>

	
	<div id="container">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



		<div class="post">

			<a href="<?php echo get_permalink();?>"> <?
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('medium');
					} 
					?> 
				</div></a>
			
			   
			
		
			
		<?php endwhile; ?>

	<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

	<?php else : ?>

		<h2>Not Found</h2>

	<?php endif; ?>
	


	</div>


	











<?php get_footer(); ?>
