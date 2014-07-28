<?php get_header(); ?>




	
	<div class="footer">
	<?php the_title(); ?>
	</div>

	
	<div id="container">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

					<img id="largeImage" src="<?php echo $image[0]; ?>">
					<?php endif; ?>



				<div class="entry">
					
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
					
					<?php the_tags( 'Tags: ', ', ', ''); ?>
				</div>
				
				
			
			<?php $content = get_the_content(); echo $content;?>


		<!--<?php the_content(); ?>-->
		<br><br>
		
		<?php edit_post_link('Edit this entry','','.'); ?>
		<?php endwhile; endif; ?>


			</div>
			
				
				
					
	</div>


	











<?php get_footer(); ?>
