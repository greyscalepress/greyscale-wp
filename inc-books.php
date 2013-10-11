<div id="content-books" class="list more">
	<h2>Customers Who Bought This Item Also Bought:</h2>
	<?php global $post; // 
		//
		// *****************
		//  OTHER BOOKS
		// *****************
		
			$currentID = get_the_ID();
			
			$args = array( 
				//'numberposts' => 5, 'orderby' => 'rand' 
				//'category_name' => 'books',
				'category_name' => 'copypaste,icty,other,zkp,aether-series,papurweb',
				'numberposts' => 3,
				'orderby' => 'rand',
				'exclude' => $currentID,
				// exclude papurweb cat ID = 29
				// 'category__not_in' => 29,
			);
			
			$postslist = get_posts( $args );
			
			foreach ($postslist as $post) : 
			setup_postdata($post)
			?> 
		<div class="block list">
			<div class="thumb"><a href="<?php the_permalink(); ?>" class="unstyled"><?php 
			
			// bxw_get_mediumimg($post->ID); 
			
			image_toolbox('medium',1); 
			
			?></a></div>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> by <?php $key="Author"; echo get_post_meta($post->ID, $key, true); ?><br/>
			<!--<?php the_excerpt(); ?>-->
		</div><!--.block-->
	<?php endforeach; ?>
	
</div><!--#more-books-->