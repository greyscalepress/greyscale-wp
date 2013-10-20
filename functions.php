<?php


if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'thumb-squared', 120, 120, true ); //(cropped)
}


function new_excerpt_length($length) {
	return 10; //number of words 
	}
add_filter('excerpt_length', 'new_excerpt_length'); 

// function af_titledespacer($title) {
// 	return trim($title);
// }
// add_filter('wp_title', 'af_titledespacer');
//source: http://www.ardamis.com/2006/07/03/optimizing-the-syntax-in-the-wordpress-title-tag/

// custom menus
// http://justintadlock.com/?p=2413
// http://codex.wordpress.org/Function_Reference/wp_nav_menu

if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'primary-menu', 'Primary Menu' );
}

// add_action( 'init', 'register_my_menu' );
// function register_my_menu() {
// 	register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
// }


/* Dashboard improvement
******************************/

function tabula_remove_dashboard_widgets()
{
	// Globalize the metaboxes array, this holds all the widgets for wp-admin
	global $wp_meta_boxes;
	
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
		
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	// RSS feeds:
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	
}
add_action('wp_dashboard_setup', 'tabula_remove_dashboard_widgets' );


/**
 * Show recent posts : 
 * https://gist.github.com/ms-studio/6069116
 */

function wps_recent_posts_dw() {
?>
   <ul style="list-style-type: disc;padding-left: 1.5em;">
     <?php
          global $post;
          $args = array( 'numberposts' => 5 );
          $myposts = get_posts( $args );
                foreach( $myposts as $post ) :  setup_postdata($post); ?>
                    <li> <? the_time('j F Y'); ?> – <a href="<?php echo admin_url(); ?>post.php?post=<?php the_ID(); ?>&action=edit"><?php the_title(); ?></a> (<a href="<?php the_permalink(); ?>">visiter</a>)</li>
          <?php endforeach; ?>
   </ul>
<?php
}
function add_wps_recent_posts_dw() {
       wp_add_dashboard_widget( 'wps_recent_posts_dw', __( 'Recent Posts' ), 'wps_recent_posts_dw' );
}
add_action('wp_dashboard_setup', 'add_wps_recent_posts_dw' );




function slidesh0w() {

		// Get the post ID
		// $iPostID = $postId;
		$iPostID = get_the_ID();

		//Put images from post in to array $images. Order by menu order defined in post gallery
		$images = get_children( array('post_parent' => $iPostID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
		
		//check if there are any images attached to the post
		if (isset($images))
		{
				//set counter to 0
				$count=0;	
				//go through all images in array $images
				echo"<div class=\"greyscale-gallery\">
      <div class=\"ad-image-wrapper\">
      </div>
      <div id=\"navig\" class=\"ad-nav\">
        <div class=\"ad-thumbs\">
          <ul class=\"ad-thumb-list\">";
			foreach( $images as $image )
				{
					$imageID = $image->ID;
					//get medium and large image url for image
					$thumbImageSrc = wp_get_attachment_image_src($imageID, $size='thumb-squared', $icon = false); 
					$medImageSrc = wp_get_attachment_image_src($imageID, $size='medium', $icon = false); 
					$largeImageSrc = wp_get_attachment_image_src($imageID, $size='large', $icon = false); 
					$fullImageSrc = wp_get_attachment_image_src($imageID, $size='full', $icon = false); 
					
					// standard sizes: thumb, medium, large, full
					
					//echo"<a href='$largeImageSrc[0]' rel='shadowbox[Bilder]'><img src='$thumbImageSrc[0]' border='0'></a>";
					echo"<li><a href='$fullImageSrc[0]' class='thickbox' rel='rel-$iPostID' title='";
					echo esc_attr( get_the_title() );
					echo"'><img src='$thumbImageSrc[0]' alt='loading image'/></a></li>";
					//}
					//increase counter
					$count++;
				
				} //foreach
				//echo"end";
				echo"</ul>
        </div><!-- .ad-thumbs -->
      </div><!--#navig-->
    </div><!--#gallery-->";
		} // end if
		} // end function slidesh0w


function bxw_get_thumbs($myID) { //used in sidebar - can be used twice on a page...
    $myPostID = $myID;   
    $arrImages =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $myPostID . '&orderby=menu_order&order=ASC' );
    // If images exist for this page
    if($arrImages) {
        $arrKeys = array_keys($arrImages);  
        $iNum = $arrKeys[0];
        $sThumbUrl = wp_get_attachment_thumb_url($iNum);
        $sImgString = '<img src="' . $sThumbUrl . '" alt="loading image" />';
        echo $sImgString;
    }
}

function wp_get_attachment_medium_url($id){
 $medium_array = image_downsize( $id, 'medium' );
 $medium_path = $medium_array[0];
 return $medium_path;
}


function bxw_get_mediumimg($myID) { //used on homepage
    $myPostID = $myID;
    $arrImages =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $myPostID . '&orderby=menu_order&order=ASC' );
    if($arrImages) {
        $arrKeys = array_keys($arrImages);
        $iNum = $arrKeys[0];
        $sThumbUrl = wp_get_attachment_thumb_url($iNum);
        $sMediumUrl = wp_get_attachment_medium_url($iNum);
        $sImageUrl = wp_get_attachment_url($iNum);
        //$atttitle = apply_filters('the_title',$myPostID->post_title);
        //trim(strip_tags( $attachment->post_title ));
        // echo apply_filters( 'the_title', $attachment->post_title );
        // echo trim(strip_tags( $myID->post_title ));
        $booktitle = the_title('', '', false);
        $sImgString = '<img src="' . $sMediumUrl . '" alt="' . $booktitle .'" />';
        echo $sImgString;
        
    }
}

function gfx_get_medium_url($myID) {
    $myPostID = $myID;
    $arrImages =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $myPostID . '&orderby=menu_order&order=ASC' );
    if($arrImages) {
        $arrKeys = array_keys($arrImages);
        $iNum = $arrKeys[0];
        $sThumbUrl = wp_get_attachment_thumb_url($iNum);
        $sMediumUrl = wp_get_attachment_medium_url($iNum);
        echo $sThumbUrl;
    }
}

function image_toolbox($size = thumbnail, $howmany = 1, $link = no, $list = no) {
	if ( $images = get_children ( array (
		'post_parent'    => get_the_ID(),
		'post_type'      => 'attachment',
		'numberposts'    => $howmany , // -1 = show all
		'post_status'    => null,
		'post_mime_type' => 'image',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		// 'linked' => $link, // link = create link
	))) {
		foreach ( $images as $image ) {
			$attimg   = wp_get_attachment_image($image->ID,$size);
			$atturl   = wp_get_attachment_url($image->ID);
			$attlink  = get_attachment_link($image->ID);
			$postlink = get_permalink($image->post_parent);
			$atttitle = apply_filters('the_title',$image->post_title);

			//echo '<div class="image image-'.$size.'">'; // thumb needed for galleriffic
			if ( $list == li) { echo '<li>'; };
			if ( $link == link) {  echo '<a href="'.$atturl.'" class="thumb">';  };
			//if ($link == no) {echo 'no link'} ;  
			//end if;
			echo $attimg;
			if ( $link == link) {  echo '</a>';  };
			if ( $list == li) { echo '</li>'; };
			//echo '</div>';
		} // close foreach
	} // close if - else 
	else {
	
	echo '<div class="no-image"><!-- no image --></div>';
	}
} // close function

// Security:
add_filter('login_errors',create_function('$a', "return null;"));
// src: http://playground.ebiene.de/954/adminbereich-in-wordpress-schuetzen/


// // sanitize the gallery style
// see http://core.trac.wordpress.org/ticket/10734

add_filter( 'use_default_gallery_style', '__return_false' );

// http://wpengineer.com/1802/a-solution-for-the-wordpress-gallery/

//deactivate WordPress function
remove_shortcode('gallery', 'gallery_shortcode');

//activate own function
add_shortcode('gallery', 'n3kr_gallery_shortcode');
//the own renamed function
function n3kr_gallery_shortcode($attr) {
$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		//'size'       => 'thumbnail',
		'link' 		=> 'file', 
		'size'       => 'thumb-squared',
		'include'    => '',
		'exclude'    => ''
	), $attr, 'gallery'));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$icontag = tag_escape($icontag);
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) )
		$itemtag = 'dl';
	if ( ! isset( $valid_tags[ $captiontag ] ) )
		$captiontag = 'dd';
	if ( ! isset( $valid_tags[ $icontag ] ) )
		$icontag = 'dt';

	$columns = intval($columns);
	// $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
				border: 2px solid #cfcfcf;
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
		</style>
		<!-- see gallery_shortcode() in wp-includes/media.php -->";
	$size_class = sanitize_html_class( $size );
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-size-{$size_class}'>";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, false, false);
		
		$image_meta  = wp_get_attachment_metadata( $id );
		$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';

		$output .= "<{$itemtag} class='gallery-item'>";
		$output .= "
			<{$icontag} class='gallery-icon {$orientation}'>
				$link
			</{$icontag}>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>";
		}
		$output .= "</{$itemtag}>";
		if ( $columns > 0 && ++$i % $columns == 0 )
			$output .= '';
	}

	$output .= "</div>\n";

	return $output;
}


// Disable pings to self
// source: http://www.allwebmaster.com/wordpress-tip-disable-self-pingbacks/
function no_self_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );



//MediaPlayer shortcode
// [playmp3 mp3=http://my.mp3]

function playmp3_funkt($atts, $content = null) {
		extract(shortcode_atts(array(
                "mp3" => '',
                "width" => '290',
                "height" => '24',
                "duration" => ''
        ), $atts));
  //process plugin
  $n3krmp3_output = '<div class="audio-player">		
  <object id="video-player-flash" type="application/x-shockwave-flash" data="http://greyscalepress.com/wp-content/themes/greyscale/mediaplayer/player.swf" width="'.$width.'" height="'.$height.'" bgcolor="#000000" name="video-player-flash">
	  <param name="movie" value="http://greyscalepress.com/wp-content/themes/greyscale/mediaplayer/player.swf" />
	  <param name="allowfullscreen" value="true">
	  <param name="allowscriptaccess" value="always">
	  <param name="seamlesstabbing" value="true">
	  <param name="wmode" value="opaque">					 		
	  <param name="flashvars" value="id=video-player-flash&autostart=false&file='.$mp3.'&duration='.$duration.'">
		  <audio id="movie" width="'.$width.'" height="'.$height.'" controls preload="metadata">
		  <source src="'.$mp3.'" type="audio/mpeg">
		  </audio>
		  <script>		var v = document.getElementById("movie");
		  				v.onclick = function() {
		  				if (v.paused) {
		  				  v.play();
		  				} else {
		  				  v.pause();
		  				}
		  				});
		  </script>
  </object>
  </div>';
  //send back text to calling function
  return $n3krmp3_output;
}
add_shortcode('playmp3', 'playmp3_funkt');


// Admin Interface improvement

function nfo_admin_styles() {
   echo '<style type="text/css">
                      
                               
           </style>';  
}

// The current year variable
// ******************************
// loaded in the header.php

function nfo_date_of_today() {
    
   global $nfo_aujourdhui_now;
   $nfo_aujourdhui_now = date_i18n( "j F Y - H:i:s"); 
       
   global $nfo_aujourdhui;
   $nfo_aujourdhui = date_i18n( "j F Y");
   
   global $nfo_aujourdhui_short;
   $nfo_aujourdhui_short = date_i18n( "Y-m-d");
   
   global $nfo_isoweek;
   $nfo_isoweek = date_i18n( "W");
   
   global $nfo_unix_now;
   $nfo_unix_now = strtotime( $nfo_aujourdhui_short );
   
   global $nfo_current_year;
   $nfo_current_year = date_i18n( "Y");
   
   global $nfo_current_year_string;
   $nfo_current_year_string = $nfo_current_year . "-01-01";
   
   global $nfo_current_year_end;
   $nfo_current_year_end = $nfo_current_year . "-12-31 23:59";
   
}

add_action('admin_head', 'nfo_admin_styles');

function my_mem_settings() {
  mem_plugin_settings( array( 'post' ), 'full' );
}
add_action( 'mem_init', 'my_mem_settings' );

?>