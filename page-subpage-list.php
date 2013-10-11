<?php 
/**
Template Name: Subpage-Listing
**/
 get_header(); ?>

	<div id="content_box" class="list">	
		<div id="left_box" class="list">
			<div id="content" class="content list subpage-list">
			
				<h1 <?php post_class('h1') ?> ><?php the_title(); ?></h1>
				
				<?php 
				
				// check if there is a translation of this post...
				
				$trad_fr = get_post_meta($post->ID, 'Traduction_FR', true);
				$trad_en = get_post_meta($post->ID, 'Traduction_EN', true);
				
				if ( get_post_meta($post->ID, 'Traduction_FR', true) ) : ?>
				    <div class="translation">
				    <p>Cette page est également disponible <a href="<?php echo $trad_fr; ?>" rel="bookmark">en français</a>.</p></div>
				<?php endif; 
				
				if ( get_post_meta($post->ID, 'Traduction_EN', true) ) : ?>
				     <div class="translation">
				     <p>This page is also available <a href="<?php echo $trad_en; ?>" rel="bookmark">in English</a>.</p>
				     </div>
				<?php endif; ?>
				
				<div class="subpage-intro body-large"><?php the_content(); ?></div>
				
<?php 		

			//The Query
			
			//query_posts('category_name=books&numberposts=5&orderby=date');
				
				$current_id = get_the_ID();
				
				$args = array(
					//'post_type'=> 'movie',
					//'actor'    => 'Bruce Campbell, Chuck Norris',
					//'order'    => 'ASC'
					//'category_name' => 'books',
					'post_type' => 'page',
					'posts_per_page' => -1,
					'post_parent' => $current_id, // use page id
					'orderby' => 'menu_order',
					'order'    => 'ASC'
				);
				query_posts( $args );
				
				if (have_posts()) : ?>
		
<?php 
				while (have_posts()) : the_post(); ?>
			<div class="block-wide">
					<h2><?php the_title(); 
					edit_post_link('edit', ' <small>[', ']</small>'); 
					?></h2>
					<?php the_content(); ?>
					
					<?php 
					
					// image_toolbox('thumb-squared',-1); 
					
					slidesh0w();
					
					?>
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