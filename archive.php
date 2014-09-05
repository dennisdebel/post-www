<?php get_header(); ?>

		<?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<!-- <h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2> -->

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<!-- <h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 -->
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<!-- <h2>Archive for <?php the_time('F jS, Y'); ?></h2> -->

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<!-- <h2>Archive for <?php the_time('F, Y'); ?></h2> -->

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<!-- <h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
 -->
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<!-- <h2 class="pagetitle">Author Archive</h2> -->

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<!-- <h2 class="pagetitle">Blog Archives</h2> -->
			
			<?php } ?>

			<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	
	<?php  while (have_posts()) : the_post(); ?>

		<?php if ( in_category('2')) { ?>
		<div class="post">
			<div class="zooi">
			<a href="<?php echo get_permalink();?>" class="postTitles"> 


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
					'numberposts' => 18,
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

						echo  wp_get_attachment_thumb_url( $attachment->ID);
						echo "'></li>";
					

					// $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
					 //echo "<img id='largeImage' src='$image[0]'";
			
						
						
						//$i++;
					}
				}	else {
						//of no images are found, align content in center by adding empty div
						echo "<div class='emptyContainer'> </div>";}
			

				?>


		</ul>
							 <br><span><?php the_title(); ?></span></a><br>

							 <?php the_excerpt(); ?> 
				
		</div>
	</div>
<?php } else {   if ( in_category('4')) { ?>
	<div class="post">
	<div class="netniet"> 

	<a href="<?php echo get_permalink();?>" class="postTitles"> <?
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('full');
						} 
						?><br> 
						 <span><?php the_title(); ?> </span></a><br>
						 <?php the_excerpt(); ?> 
			
	</div>
</div>
		<?php } else { ?>
	<div class="post">
		<div class="featured">

			<a href="<?php echo get_permalink();?>" class="postTitles"> 
			
				<?
				if ( has_post_thumbnail() ) {
					//the_post_thumbnail('full');
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
					$url = $thumb['0'];
				} 
				?>
			<div class="featuredCrop" style="background-image:url(<? echo $url;?>);">
			</div>
				<br> 
			 	<span><?php the_title(); ?> </span></a><br>
				 <?php the_excerpt(); ?> 
				
		</div>
	</div>
	<?php } ?>
<?php } ?>

		
			
			   
			
		
			
		<?php endwhile; ?>



	<?php else : ?>

		<h2>Not Found</h2>

	<?php endif; ?>
	


	</div>

	<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
	










<?php get_footer(); ?>