<?php 
/**
Template Name: Custom Page
 */
 
 // define the current page slug:
 
 $gsp_slug = $post->post_name;

if (in_category( 'books' )) {

	include( TEMPLATEPATH . '/inc-book.php' );

} elseif (in_category( 'authors' )) {

	include( TEMPLATEPATH . '/inc-author.php' ); 	
 		
} elseif ( $gsp_slug == 'libre-type-specimens' ) { 

	include( TEMPLATEPATH . '/microsites/font-spec-workshop.php' );

} else { 

	include( TEMPLATEPATH . '/single.php' );

}

?> 
