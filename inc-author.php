<div id="author-img">
	<?php bxw_get_mediumimg($post->ID); ?><img src="<?php bloginfo('stylesheet_directory'); ?>/images/unknown.jpg" />
	
	
</div>

<h2 <?php post_class() ?> >					
	<?php the_title(); ?></h2>
							
<div class="format_text author-bio">
	<?php the_content('[Read more &rarr;]'); ?>
</div>

<div class="auth-rel">

	<?php global $post; // 
		// *****************
		//  RELATED BOOKS
		// ***************** 
		$slug = $post->post_name; // define slug as $slug
		//echo $slug;
			$postslist = get_posts('tag='. $slug .'&category_name=books&numberposts=1');
			
			foreach ($postslist as $post) : 
			setup_postdata($post);
			echo '<h3>Publications</h3>';
			endforeach; 
			wp_reset_postdata();
    		wp_reset_query();
	?>

	<?php global $post; // 
		// *****************
		//  RELATED BOOKS
		// ***************** 
		$slug = $post->post_name; // define slug as $slug
		//echo $slug;
			$postslist = get_posts('tag='. $slug .'&category_name=books');
						
			foreach ($postslist as $post) : 
			setup_postdata($post);
			
			$proj_author = get_post_meta($post->ID, 'Author', true);
			$proj_authlink = get_post_meta($post->ID, 'AuthorLink', true);
			$proj_pubdate = get_post_meta($post->ID, 'PubDate', true);
			
			?> 
			<div class="related-book-item">
				<div class="bookcover">
				<a href="<?php the_permalink(); ?>"><?php bxw_get_mediumimg($post->ID); ?><img src="<?php bloginfo('stylesheet_directory'); ?>/images/cover_dummy.png" /></a>
				</div>
			
			<p class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
			<?php // Author
				if($proj_author !== '') { ?>
				<p class="author">by <?php 
				echo $proj_author; ?></p>
		<?php } ?>
				
		<?php // Date
				if($proj_pubdate !== '') { ?>
				<p class="date"><?php 
				echo $proj_pubdate; ?></p>
		<?php } ?>
			</div>
	<?php endforeach; 
	wp_reset_postdata();
    wp_reset_query();
    ?>
</div>