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
	<?php the_title(); ?>
	</div>

	
	<div id="container">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!--			<div <?php post_class() ?> id="post-<?php the_ID(); ?>"> -->
			<br />
	
			<!-- <div class="hr_single_fat"> </div> -->
			<div class="singlepost"><a href="<?php echo get_permalink(); ?>"><? if ( has_post_thumbnail() ) {
		the_post_thumbnail('large');
	} ?></a>
	
	
				<!--<div class="thedate"><?php the_date(); ?></div>-->
				<br />
				
						
			


				<div class="entry">
					
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
					
					<?php the_tags( 'Tags: ', ', ', ''); ?>
				</div>
				
				
			
		
		
		<?php the_content(); ?>
		<br><br>
		
		<?php edit_post_link('Edit this entry','','.'); ?>
		<?php endwhile; endif; ?>


			</div>
			
				
				
					
	</div>


	











<?php get_footer(); ?>
