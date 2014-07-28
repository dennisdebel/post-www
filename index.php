<?php get_header(); ?>




	
	


	
	<div class="footer">
	
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
