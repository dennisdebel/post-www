<?php get_header(); ?>




	
	<div class="footer">
	<?php the_title(); ?>
	</div>

	
	<div class="single_post_container">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<center><div class="post_thumbnail">
		<?php if (has_post_thumbnail( $post->ID ) ): ?> 
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

			<img id="caption_image" src="<?php echo $image[0]; ?>">
			<?php endif; ?>

		</div></center>

		<div class="entry">
			<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
			
			<?php the_tags( 'Tags: ', ', ', ''); ?>
		</div>
				
		<div class="post_content"			
			<?php $content = get_the_content();
				$content = apply_filters('the_content', $content);
				echo wpautop($content);?>
			<!--<?php the_content(); ?>-->
		</div>
		<br><br>
		
		<?php edit_post_link('Edit this entry','','.'); ?>
		<?php endwhile; endif; ?>


			</div>
			
				
				
					
	</div>


	











<?php get_footer(); ?>
