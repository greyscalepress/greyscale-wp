			<h2 <?php post_class() ?> >					
						<?php the_title(); ?></h2>	
						
			<p class="date">Published <?php the_date() ?></p>

			<div class="format_text">
				<?php the_content('[Read more &rarr;]'); ?>
								
				<div class="format_text next-prev">
				  <?php previous_post_link('&larr; %link') ?> | 
				  <?php next_post_link('%link &rarr;') ?>
				</div>	
				
			</div>
			
			