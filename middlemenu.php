<p id="sitetitleSmall">
 <a href="<?php echo site_url(); ?>">T.I.T.L.E  SUBTITLE FOR SUBTITLES</a>
</p>
<p id="menu">
<?php 
  
  $args = array(
	'sort_order' => 'ASC',
	'sort_column' => 'post_title',
	'hierarchical' => 1,
	'exclude' => '32, 35, 2, 34, 30',
	'include' => '',
	'meta_key' => '',
	'meta_value' => '',
	'authors' => '',
	'child_of' => 0,
	'parent' => -1,
	'exclude_tree' => '',
	'number' => '',
	'offset' => 0,
	'post_type' => 'page',
	'post_status' => 'publish'
); 


  $pages = get_pages($args); 

  foreach ( $pages as $page ) {
  	$option = '<a href="' . get_page_link( $page->ID ) . '">';
	$option .= $page->post_title;
	$option .= '</a> ';
	echo $option;
  }


 ?>	
 </p>


