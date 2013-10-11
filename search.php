<?php 
/**
**/
 get_header(); ?>

	<div id="content_box" class="list">	
		<div id="left_box" class="list">
			<div id="content" class="content list">
			
			
			
<?php 		//The Query
			query_posts($query_string . '&showposts=-1');
			if (have_posts()) : ?>
			
			<h1 class="links-page">Search Results for "<?php printf(get_search_query()); ?>"</h1>
		
<?php 
				while (have_posts()) : the_post(); ?>
				
			
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="format_text news">
					<p class="date"><?php the_date() ?></p>
					<?php the_excerpt(); ?>
				</div>
									
<?php endwhile; ?>
							
<?php else : ?>		
				<div class="content_inner">
					<h2 class="center">No posts found. Try a different search? </h2>
					<div class="format_text">
						
						<?php get_search_form(); ?>
					</div>
				</div>
<?php endif; ?>
			</div><!--#content-->
		</div><!--#left_box-->
		
		<div id="right_box" class="index right_box">
			<?php get_sidebar(); ?>
		</div><!--#right_box-->
	</div><!--#content_box-->

<?php get_footer(); ?>