<?php get_header(); ?>


	
	<div class="footer">
	
	</div>

	
	<div id="container">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php if ( in_category('2')) { ?>
<div class="zooi">
<a href="<?php echo get_permalink();?>"> 

					<!--<?
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('full');
					} 
					?> -->
					<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

					<!--	<img id="largeImage" src="<?php echo $image[0]; ?>"> -->
					<?php endif; ?>
						
					<ul class="masonaryZooi">
				
					<!-- get all other images (define maximun at numberposts) -->
						
						<?
						$args = array(
							'post_type'   => 'attachment',
							'numberposts' => -1,
							'post_status' => 'any',
							'post_parent' => $post->ID,
						
							);
						$attachments = get_posts( $args );

						// if attachements is set and there are more than one images diplay them as thumbs:
						if ( $attachments) {
							//$width = 500/count($attachments)."%";

							// count images and define img size to fill the 33% zooi container
						

							foreach ( $attachments as $attachment ) {
								//get attachment urls
					

								echo "<li><img id='thumb' src='";
								echo wp_get_attachment_url( $attachment->ID, 'medium');
								echo "'></li>";
							

							// $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
							 //echo "<img id='largeImage' src='$image[0]'";
					
								
								
								//$i++;
							}
						}	else {
								//of no images are found, align content in center by adding empty div
								echo "<div class='emptyContainer'> no images found </div>";}
					
				
						?>


</ul>
					<br>
					 <?php the_title(); ?> </a><br>
					 <?php the_excerpt(); ?> 
		
</div>
<?php } else { ?>
<div class="featured">
<a href="<?php echo get_permalink();?>"> <?
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('full');
					} 
					?><br> 
					 <?php the_title(); ?> </a><br>
					 <?php the_excerpt(); ?> 
		
</div>
<?php } ?>

		
			
			   
			
		
			
		<?php endwhile; ?>

	<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

	<?php else : ?>

		<h2>Not Found</h2>

	<?php endif; ?>
	


	</div>


	











<?php get_footer(); ?>
