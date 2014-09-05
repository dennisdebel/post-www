<?php
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator'); //remove wp version from head (hide version for hackers)
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }

// Enable support for post-thumbnails

add_theme_support('post-thumbnails');

if ( function_exists('add_theme_support') ) {
	add_theme_support('post-thumbnails');
}

// remove ":" from the_meta

function remove_colons_from_meta( $meta, $key, $value ) {
    return str_replace( ">$key:</span>", ">$key</span>", $meta );
}
add_filter( 'the_meta_key', 'remove_colons_from_meta', null, 3);


//hide admin bar
add_filter('show_admin_bar', '__return_false');



// get shopping cart link, if set
function get_cart_link(){
    global $blog_id, $eshopoptions;
        if(isset($_SESSION['eshopcart'.$blog_id])) {
            echo "<a href='".get_permalink($eshopoptions['cart'])."'>cart</a>";
        }
}


/*
//EDIT THIS exclude BLOG categorie (id = 6)
function exclude_category($query) {
if ( $query->is_home() ) {
$query->set('cat', '-33, -4');
}
return $query;
}
add_filter('pre_get_posts', 'exclude_category');
*/



/* custom excerpt length */

function custom_excerpt_length( $length ) {
    return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 20 );


// /* give thumb captions some space to live filter */

// //DOESNT WORK

// function replace_content($content)
// {
// $content = str_replace("<p class='wp-caption-text'>", "<br><br><p class='wp-caption-text'>",$content); 
// return $content;
// }
// add_filter('the_content','replace_content');

/*
 * Fix the extra 10 pixel width issue for image captions
 */
// add_filter('wp_caption', 'fixed_img_caption_shortcode');
// add_filter('caption', 'fixed_img_caption_shortcode');
// function fixed_img_caption_shortcode($attr, $content = null) {
//     // Allow plugins/themes to override the default caption template.
//     $output = apply_filters('img_caption_shortcode', '', $attr, $content);
//     if ( $output != '' ) return $output;
//     extract(shortcode_atts(array(
//         'id'=> '',
//         'align' => 'alignnone',
//         'width' => '',
//         'caption' => ''), $attr));
//     if ( 1 > (int) $width || empty($caption) )
//     return $content;
//     if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
//     return '<div ' . $id . 'class="wp-caption ' . esc_attr($align)
//     . '" style="width: ' . ((int) $width) . 'px">'
//     . do_shortcode( $content ) . '<p class="wp-caption-text">'
//     . $caption . '</p></div>';
// }

//  function replace_content($content)
//  {

// // // $old_content = 'Hello [caption id="attachment_367" align="aligncenter" width="432" caption="Version 2010!!"] World!';
// // // $new_content = preg_replace('/\[.*?\]/', '', $old_content);
// // // echo $new_content; // result: "Hello World!"

// // //filter captioned images..

//  preg_match_all('/\[caption[^\]]*](.*)\[\/caption[^\]]*]/im', $content, $matches);
 
//  //return array($matches);
// // $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/ii', $post->post_content, $matches);
//  //$content = preg_replace('/<img.+src=[\'"]([^\'"]+)[\'"].*>/ii', 'lol', $content);


// // //if($match) echo "result=".$match[1];


// // //preg_match_all('/\[.*?\]/', $content, $matches);
// // //echo "<div";
//  return $matches;
//  }
//  add_filter('the_content','replace_content');

?>