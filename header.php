<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://opengraphprotocol.org/schema/"
      xmlns:fb="http://www.facebook.com/2008/fbml">
<!--
	*******************************************
	v.3.0 Thanks for your interest in the source code
	All content & design (C) 1904.CC
	*******************************************
-->
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		
	<title><?php // ** TITLE v.0.1 **
	if(is_front_page()){
		echo 'Greyscale Press - an experiment in online publishing';}
	elseif ( is_page() && $post->post_parent ) {
		echo get_the_title($post->post_parent);
		echo ' | ';
		wp_title('|',true,'right');
		echo 'Greyscale Press';
	} 
	elseif (is_category()) {
		echo 'Category :';
		wp_title('|',true,'right');
		echo 'Greyscale Press';
	}
	elseif (is_archive()) {
		echo 'Archives :';
		wp_title('|',true,'right');
		echo 'Greyscale Press';
	}
	else {
		//echo '!';
		wp_title('|',true,'right');
		echo 'Greyscale Press';
	} ?></title>
	<?php // ** DESCRIPTION v.0.1 **
	if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	?><meta name="description" content="<?php 
				$descr = get_the_excerpt();
		  	$text = str_replace( "\r\n", ', ', trim($descr) ); 
		  	echo esc_attr($text); 
	?>" />
	<?php endwhile; endif; elseif(is_home()) : 
	?><meta name="description" content="Greyscale Press is an experiment in online publishing. 72 DPI, Open-Source, Creative Commons, Web2Print, Print-on-Demand." />
	<?php endif; ?>
	
	
	
	<?php // ** SEO OPTIMIZATION v.0.2 **
	if ( is_attachment() ) {
	?><meta name="robots" content="noindex,follow" /><?php
	} else if( is_single() || is_page() || is_home() ) { 
	?><meta name="robots" content="all,index,follow" /><?php 
	} elseif ( is_category() || is_archive() ) { 
	?><meta name="robots" content="noindex,follow" /><?php } 
	?>
	
	<meta name="google-site-verification" content="9PweehBrYdFFv3Ogt53qzJTVH4Y2Yib84eux8alAIQE" />	
	<link rel="icon" type="image/vnd.microsoft.icon" href="http://ooo.greyscalepress.com/wp-content/themes/greyscale/images/favicon.ico" />
	<link rel="icon" type="image/gif" href="http://ofo.greyscalepress.com/wp-content/themes/greyscale/images/favicon.gif" />
	<link rel="shortcut icon" href="http://ofo.greyscalepress.com/wp-content/themes/greyscale/images/favicon.ico"/>

	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/greyscale-131012.min.css" type="text/css" />
	
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="author" href="https://plus.google.com/106992163017699413658/posts"/>
	
	<?php include( TEMPLATEPATH . '/inc-opengraph.php' ); ?>

	<?php wp_head(); 
	
	nfo_date_of_today();
	
	?>	
</head>
<body <?php body_class(); ?>>

<div id="container">
<div id="page">

	<div id="menu">
		<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '' ) ); ?> 
		
		<div id="header">
		<a href="<?php bloginfo('url'); ?>"<?php if (is_home()) echo(' rel="nofollow"'); ?>><img src="http://ooo.greyscalepress.com/wp-content/themes/greyscale/images/logo2.png" alt="greyscale logo"/></a>
		</div>
	</div>

	