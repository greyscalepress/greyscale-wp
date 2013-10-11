<?php 
/**
Template Name: authors
**/
 get_header(); ?>

	<div id="content_box" class="index">	
		<div id="left_box" class="index">
			<div id="content-authors" class="list">
			
				<div class="block list">
				Some of our Artists and Authors
				</div>
<?php 		//The Query
				query_posts('post_type=page&post_parent=5&numberposts=8&orderby=rand');
			if (have_posts()) : ?>
		
<?php 
				while (have_posts()) : the_post(); ?>
			<div class="block list">
				<div class="thumb"><a href="<?php the_permalink(); ?>"><?php bxw_get_mediumimg($post->ID); ?><img src="<?php bloginfo('stylesheet_directory'); ?>/images/unknown.jpg" /></a></div>
				<div class="txt"><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></div>
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