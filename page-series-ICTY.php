<?php 
/**
Template Name: series-ICTY
**/
 get_header(); ?>

	<div id="content_box" class="list">	
		<div id="left_box" class="list">
			<div id="content" class="content list">
			
			
			<?php 		if (have_posts()) : ?>
			<?php 
				while (have_posts()) : the_post(); ?>
								
				<h2 <?php post_class() ?> ><?php the_title(); ?></h2>
				
				<div class="format_text series">
					<?php the_content('[Read more &rarr;]'); ?>
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
			
			<!-- BOOKS LIST -->
			
			<div id="content-books" class="list triade">
			
<?php 		//The Query
				query_posts('category_name=ICTY&numberposts=10&orderby=date');
			if (have_posts()) : ?>
<?php 
				while (have_posts()) : the_post(); ?>
			<div class="block list">
				<div class="thumb"><a href="<?php the_permalink(); ?>" class="unstyled"><?php 
				
					// bxw_get_mediumimg($post->ID);
				
				image_toolbox('medium',1); 
				
				 ?></a></div>
				<div class="txt"><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<!--<ul>
					<li><?php $key="Author"; echo get_post_meta($post->ID, $key, true); ?></li>
					</ul>-->
				</div>
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
	
			</div><!--#books-->
			</div><!--#content-->
		</div><!--#left_box-->
		
		<div id="right_box" class="index right_box">
			<?php get_sidebar(); ?>
		</div><!--#right_box-->
	</div><!--#content_box-->

<?php get_footer(); ?>