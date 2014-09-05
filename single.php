<?php get_header(); ?>




	
	<!-- <div class="footer">
	<span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
	</div> -->

	
	<div class="single_post_container">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<center>
			<div class="post_thumbnail">
			<?php if (has_post_thumbnail( $post->ID ) ): ?> 
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

				<img id="caption_image" src="<?php echo $image[0]; ?>">
				<?php endif; ?>

			</div>
		</center>

		<div class="entry">
			<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
			
			
		</div>
				
		<div class="singleTitle"><span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>	</div>
		<div class="post_content">	

			<?php $content = strip_shortcodes(get_the_content());
				$content = apply_filters('the_content', $content);
				$content = preg_replace("/<img[^>]+\>/i", "", $content); // strip images
				

				echo wpautop($content);

				?>
				<div id="imgs">
				<?
				$captionimg = get_the_content();
				
				preg_match_all('/\[caption[^\]]*](.*)\[\/caption[^\]]*]/im', $captionimg, $images);
				preg_match_all('/\](.*)\[/', $captionimg, $captions);

				foreach ($captions[0] as $key) {
					$key = str_replace("[", "", $key); // strip brackets
					$key = str_replace("]", "", $key); // strip brackets

					echo "<div class='captionedImgs'>".$key."</div>";
				}

				
			?>
			</div>
			<p class="tags"><?php the_tags( 'Keywords: ', ', ', ''); ?></p>
			

			<!--<?php the_content(); ?>-->

		</div>
		<br><br>
		
		<?php edit_post_link('Edit this entry','','.'); ?>
		<?php endwhile; endif; ?>


			</div>
			
				
				
					
	</div>


	



<?php get_footer(); ?>
