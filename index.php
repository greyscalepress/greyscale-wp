<?php 
/**
 * greyscale theme
 */
 get_header(); ?>

	<div id="content_box" class="index">	
		<div id="left_box" class="index">
			<div id="content" class="content index">
<?php 		if (have_posts()) : ?>
		
<?php 
				while (have_posts()) : the_post(); ?>

					<h2 <?php post_class() ?> >					
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					
					<?php if (in_category('archives')) {
						echo"<span class=\"date bold\">Date: ";
						the_time('F jS, Y');
						echo"</span>";
							}
 	  					else { 
								}
							; ?> 

					<div class="format_text">
					<?php the_content('[Read more &rarr;]'); ?>
					
					<!--<p>Categories: <?php the_category(', '); ?></p>-->
					<p><?php the_tags('<strong>Performers:</strong> ',', ',''); ?></p>
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