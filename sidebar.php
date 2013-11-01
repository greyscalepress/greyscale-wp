<div id="right_news" class="right_news">

			<h2><a href="<?php bloginfo('wpurl'); ?>/newsfeed/">Greyscale Newsfeed</a></h2>
					<ul class="newsfeed txt">
						<?php 
					// *****************
					//  RECENT NEWS
					// *****************
						$postslist = get_posts('category_name=news,interviews&numberposts=5&orderby=date');
						// cat 6 = news, 27 = interviews
						foreach ($postslist as $post) : 
						setup_postdata($post)
						?> 
						<li><!--<span class="date"><?php the_time('d-M-y'); ?>:</span>&nbsp;--><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/>
						<!--<?php the_excerpt(); ?>-->
						</li>
						<?php endforeach; ?>
					</ul>
					
			</div><!--#right_news-->
			
			<div id="right_books" class="right_books">
			<h2>Recent Publications</h2>
						<?php
					// *****************
					//  RECENT BOOKS
					// *****************
						$args = array( 
			//'category_name' => 'books',
			'category_name' => 'copypaste,icty,other,zkp,aether-series,free-speech',
//			'category__not_in' => array( 29 ),
			'numberposts' => 6,
			'orderby' => 'date',
			// 'exclude' => $currentID,
						);
						
						$postslist = get_posts( $args );
					
						foreach ($postslist as $post) : 
						setup_postdata($post)
						?>
						<div>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php 
							// bxw_get_mediumimg($post->ID); 
							image_toolbox('medium',1);
							
							?></a>
						</div>
						<?php endforeach; ?>
			</div><!--#right_books-->
			<div id="right_authors" class="right_authors">
			<h2>Some of our authors</h2>
						<?php global $post; // 
					// *****************
					//  Authors
					// *****************
						$postslist = get_posts('post_type=page&post_parent=5&numberposts=5&orderby=rand');
						foreach ($postslist as $post) : 
						setup_postdata($post)
						?> 
						<div>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php bxw_get_thumbs($post->ID); ?><img src="<?php bloginfo('stylesheet_directory'); ?>/images/unknown.jpg" /></a>
						</div>
						<?php endforeach; ?>
			</div><!--#right_authors-->
			
			