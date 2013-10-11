<?php 
/**
Template Name: novelties
**/
 get_header(); ?>

	<div id="content_box" class="list">	
		<div id="left_box" class="list">
			<div id="content" class="content list">
			
<?php 		//The Query
				query_posts('category_name=news,interviews&showposts=25&paged=$page');
			if (have_posts()) : ?>
		
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
					<h2 class="top">There's nothing here.</h2>
					<div class="format_text">
						<p class="center">Sorry, but you are looking for something that isn't here.</p>
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