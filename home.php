<?php 
/**
 * greyscale theme
 */
 get_header(); ?>

	<div id="content_box" class="home content_box">	
		<div id="left_box" class="home left_box">
			<div id="home-right" class="home home-right">
			
<?php 		//The Query

				// Date range: 
				// we could define + / - 3 months...
				
				global $nfo_unix_now; // = YYYY-mm-dd
				
				
				$nfo_date_expiration =   ( 2 * DAY_IN_SECONDS ); // 2 jours
				
				$nfo_unix_limit = ( $nfo_unix_now - $nfo_date_expiration );

				$nfo_age_limit = date_i18n( "Y-m-d", $nfo_unix_limit);

				global $wp_query;
				$args = array_merge( $wp_query->query, array( 
						'posts_per_page' => 5,
						'meta_key' => '_mem_start_date',
						'meta_value'	=> $nfo_age_limit,
						'meta_compare'	=> '>=',
						'orderby'  => 'meta_value',
						'order'  => 'DESC',
				
				 ) );
				
				// query_posts('category_name=news,interviews&posts_per_page=5');
				
				query_posts( $args );
				
				$exclude_id = array();
				// create an array to prevent stuff from appearing two times
				
				// cat 6 = news, 27 = interviews
				if (have_posts()) : 
				
				?>
				<h1>Current Events</h1>
<?php 

				while (have_posts()) : the_post(); ?>

					<h2 <?php post_class() ?> >
					
					<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

					<div class="format_text">
					<?php the_excerpt(); ?>
					</div><!--.format_text-->
					
					<?php
					
					// add ID into array
					$exclude_id[] = get_the_ID();
					
					 ?>
					
<?php endwhile; ?>
							
<?php else : ?>		
<?php endif; 

							// Second Loop 
														
							$second_query = new WP_Query( array(
								 	'category_name' => 'news,interviews', // 'news','interviews'
									'posts_per_page' => 5,
									'post__not_in' => $exclude_id,
								 	) ); 
								 	
							//query_posts('category_name=news,interviews&posts_per_page=5');
							
							if ($second_query->have_posts()) : 
							?>
							<h1><a href="/newsfeed/" class="rss-icon unstyled">Newsfeed</a></h1>
							<?php
								
								while( $second_query->have_posts() ) : $second_query->the_post();
								
								?>
								<h2 <?php post_class() ?> >
													
													<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
													<?php if (in_category('archives')) {
														echo"<span class=\"date bold\">Date: ";
														the_time('F jS, Y');
														echo"</span>";
															}
								 	  					else { 
								 	  					// nothing
																}
								
															?> 
								
													<div class="format_text">
													<?php the_excerpt(); ?>
													</div><!--.format_text-->
								
								<?php
								endwhile; 

							endif;
						
							wp_reset_postdata(); 


?>
	
				<div id="right_authors" class="home">
				<h3 class="home">Some of our authors</h3>
						<?php global $post; // 
					// *****************
					//  Authors
					// *****************
						$postslist = get_posts('post_type=page&post_parent=5&numberposts=8&orderby=rand');
						foreach ($postslist as $post) : 
						setup_postdata($post)
						?> 
						<div class="author_home">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php bxw_get_thumbs($post->ID); ?><img src="<?php bloginfo('stylesheet_directory'); ?>/images/unknown.jpg" /></a>
						</div>
						<?php endforeach; ?>
				</div><!--#right_authors-->
				</div><!--#home-right-->
			
			<div id="home-left">
				<div id="right_books">
				<h2>Recent Publications</h2>
							<?php global $post; // 
						// *****************
						//  RECENT BOOKS
						// *****************
						
						$args = array( 
						//'category_name' => 'books',
						'category_name' => 'copypaste,icty,other,zkp,aether-series,free-speech',
						'numberposts' => 6,
						'orderby' => 'date',
									);
									
						$postslist = get_posts( $args );
						$evenodd = 'odd';
						
						foreach ($postslist as $post) : 
						setup_postdata($post)
						?>
							<div class="home_book<?php 
							
							echo ' book_'.$evenodd;
							
							// invert even-odd:
							if ( $evenodd == "odd" ) {
							  $evenodd = "even";
							} else {
							  $evenodd = "odd";
							}
							 ?>">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php bxw_get_mediumimg($post->ID); ?><img src="<?php bloginfo('stylesheet_directory'); ?>/images/cover_dummy.png" /></a>
							</div>
							<div class="home_book_txt">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							by <?php $key="Author"; echo get_post_meta($post->ID, $key, true); ?><br/><br/>
							<?php $key="Format"; echo get_post_meta($post->ID, $key, true); ?>
							</div>

						<?php endforeach; ?>
				</div><!--#right_books-->
			</div><!--#home-right-->
		</div><!--#left_box-->
		
		
	</div><!--#content_box-->

<?php get_footer(); ?>