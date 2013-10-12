<?php 
/**
 * greyscale theme
 */
 get_header(); ?>

	<div id="content_box" class="single">	
		<div id="left_box" class="single">
			<div id="content" class="content single <?php 
if (in_category( 'interviews' )) { echo "interviews"; } ;
if (in_category( 'news' )) { echo "news"; } ; ?>">
<?php 		if (have_posts()) : ?>
		
<?php 
				while (have_posts()) : the_post(); 
				
				// check for meta fields : Title, Year, Type
				$proj_price = get_post_meta($post->ID, 'Price', true);
				$proj_author = get_post_meta($post->ID, 'Author', true);
				$proj_format = get_post_meta($post->ID, 'Format', true);
				$proj_amazon = get_post_meta($post->ID, 'Amazon', true);
				$proj_openlib = get_post_meta($post->ID, 'OpenLibrary', true);
				$proj_googlebooks = get_post_meta($post->ID, 'GoogleBooks', true);
				$proj_weread = get_post_meta($post->ID, 'weRead', true);
				$proj_issn = get_post_meta($post->ID, 'ISSN', true);
				$proj_isbn = get_post_meta($post->ID, 'ISBN', true);
				$proj_pubdate = get_post_meta($post->ID, 'PubDate', true);
				$proj_lulu = get_post_meta($post->ID, 'Lulu', true);
				$proj_readme = get_post_meta($post->ID, 'ReadmeCC', true);
				$proj_authlink = get_post_meta($post->ID, 'AuthorLink', true);
				$proj_FB_href = get_post_meta($post->ID, 'FB_href', true);
				?>
				
				
					
				<?php if (in_category( 'books' )) {
						include( TEMPLATEPATH . '/inc-book.php' );
					}
						elseif (in_category( 'authors' )) {
						include( TEMPLATEPATH . '/inc-author.php' );
					}
 	  					else { 
 	  					include( TEMPLATEPATH . '/inc-article.php' );
					}
				; ?> 	
					
<?php endwhile; ?>
							
<?php else : ?>		
				<div class="content_inner">
					<h2 class="top">There's nothing here.</h2>
					<div class="format_text">
						<p class="center">Sorry, but you are looking for something that isn't here.</p>
						<?php get_search_form(); ?>
					</div>
				</div>
<?php endif; ?>
	
<?php if (in_category('books')) {
			include( TEMPLATEPATH . '/inc-books.php' );
			}
 	  else {
 	  		// create specific include;
			}
; ?> 	
	
			</div><!--#content-->
		</div><!--#left_box-->
		
		<div id="right_box" class="index right_box">
			<?php get_sidebar(); ?>
		</div><!--#right_box-->
	</div><!--#content_box-->

<?php get_footer(); ?>