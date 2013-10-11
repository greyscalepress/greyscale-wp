<?php

// Open Graph Meta Tags
 
if ( is_single() && in_category( 'books' )) {
	?>
	<!-- 
		Open Graph protocol meta tags
	-->		
 <?php // Start the Loop.
 	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<meta property="og:title" content="<?php the_title(); ?>"/>
    <meta property="og:type" content="book"/>
    <meta property="og:url" content="<?php echo get_permalink(); ?>"/>
    <meta property="og:image" content="<?php gfx_get_medium_url($post->ID); ?>"/>
    <meta property="og:site_name" content="GreyscalePress.com"/>
    <?php 
    
    //Check for ISBN
    				$proj_isbn = get_post_meta($post->ID, 'ISBN', true);
					if($proj_isbn !== '') {
						?><meta property="og:isbn" content="<?php
						echo $proj_isbn; ?>"/>
	<?php
					} // end ISBN check
					 ?>
    <meta property="og:description" content="<?php 
    			$proj_author = get_post_meta($post->ID, 'Author', true);
					if($proj_author !== '') {
						echo 'A book by ';
						echo $proj_author;
						echo '. ';
						the_excerpt_rss(220);
					} else { 
						the_excerpt_rss(220);
					} ?>"/>
	<meta property="fb:admins" content="1547671117,1623181120" />
	<?php endwhile; else: ?>
 	<?php endif; ?>
		<?php
	} // check if this is an Author page
elseif ( is_page() && $post->post_parent == '5' ) {
	?>
	<meta property="og:title" content="<?php the_title(); ?>"/>
    <meta property="og:type" content="author"/>
    <meta property="og:url" content="<?php echo get_permalink(); ?>"/>
    <meta property="og:image" content="<?php gfx_get_medium_url($post->ID); ?>"/>
    <meta property="og:site_name" content="GreyscalePress.com"/>
    <meta property="og:description" content="<?php the_excerpt_rss(220); ?>"/>
	<meta property="fb:admins" content="1547671117,1623181120" />
		<?php
	}
elseif ( is_home() ) { 
	?>
	<meta property="og:title" content="Greyscale Press"/>
    <meta property="og:type" content="product"/>
    <meta property="og:url" content="http://www.greyscalepress.com/"/>
    <meta property="og:image" content="http://www.greyscalepress.com/greyscale-logo.gif"/>
    <meta property="og:site_name" content="GreyscalePress.com"/>
    <meta property="og:description" content="72 DPI, Open-Source, Creative Commons, Web-to-Print."/>
	<meta property="fb:admins" content="1547671117,1623181120" />
	<?php
	}	; ?>