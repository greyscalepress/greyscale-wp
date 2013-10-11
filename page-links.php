<?php 
/**
 * greyscale theme
 */
 get_header(); ?>

	<div id="content_box" class="single">	
		<div id="left_box" class="single">
			<div id="content" class="content single links">
<?php 		if (have_posts()) : ?>
		
<?php 
				while (have_posts()) : the_post(); 
							
				?>
					
				<h1 class="links-page">:: <?php the_title(); ?></h1>
					
				<?php if (in_category( 'books' )) {
						include( TEMPLATEPATH . '/inc-book.php' );
					}
						elseif (in_category( 'authors' )) {
						include( TEMPLATEPATH . '/inc-author.php' );
					}
 	  					else { 
 	  					//include( TEMPLATEPATH . '/inc-article.php' );
					}
				; ?> 	
					
				
			<h2 class="h3liens">Book publishers we like</h2>
					<ul class="liste-liens clean">
					<?php
$bm = get_bookmarks( array(
            'orderby'        => 'name', 
            'order'          => 'ASC',
            'limit'          => -1, 
            'category'       => 26,
            'hide_invisible' => 1,
            'show_updated'   => 0, 
            'include'        => null,
            'exclude'        => null,
            'search'         => '.'));
      foreach ($bm as $bookmark){ 
                echo "<li>{$bookmark->link_name} <br/> <a id='relatedlinks' href='{$bookmark->link_url}' target=_blank>
                          {$bookmark->link_url}
                      </a></li>";
       		   } ?></ul> 
					
			<h2 class="h3liens">Authors and designers we like</h2>		
					<ul class="liste-liens clean">
					<?php
$bm = get_bookmarks( array(
            'orderby'        => 'name', 
            'order'          => 'ASC',
            'limit'          => -1, 
            'category'       => 25,
            //'category_name'  => 'Related Sites', 
            'hide_invisible' => 1,
            'show_updated'   => 0, 
            'include'        => null,
            'exclude'        => null,
            'search'         => '.'));
      foreach ($bm as $bookmark){ 
                echo "<li>{$bookmark->link_name} <br/> <a id='relatedlinks' href='{$bookmark->link_url}' target=_blank>
                          {$bookmark->link_url}
                      </a></li>"; 
					} ?></ul>
					
			<h2 class="h3liens">Software and resources</h2>		
					<ul class="liste-liens clean">
					<?php
$bm = get_bookmarks( array(
            'orderby'        => 'name', 
            'order'          => 'ASC',
            'limit'          => -1, 
            'category'       => 28,
            //'category_name'  => 'Related Sites', 
            'hide_invisible' => 1,
            'show_updated'   => 0, 
            'include'        => null,
            'exclude'        => null,
            'search'         => '.'));
      foreach ($bm as $bookmark){ 
                echo "<li>{$bookmark->link_name} <br/> <a id='relatedlinks' href='{$bookmark->link_url}' target=_blank>
                          {$bookmark->link_url}
                      </a></li>"; 
					} ?></ul>
					
			<h2 class="h3liens">Online platforms</h2>		
					<ul class="liste-liens clean">
					<?php
$bm = get_bookmarks( array(
            'orderby'        => 'name', 
            'order'          => 'ASC',
            'limit'          => -1, 
            'category'       => 27,
            //'category_name'  => 'Related Sites', 
            'hide_invisible' => 1,
            'show_updated'   => 0, 
            'include'        => null,
            'exclude'        => null,
            'search'         => '.'));
      foreach ($bm as $bookmark){ 
                echo "<li>{$bookmark->link_name} <br/> <a id='relatedlinks' href='{$bookmark->link_url}' target=_blank>
                          {$bookmark->link_url}
                      </a></li>";
       		   } ?></ul>
				
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