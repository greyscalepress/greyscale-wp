<div id="book-text" class="format_text" itemscope itemtype="http://schema.org/Book">
	
	<h2 <?php post_class() ?> itemprop="name"><?php the_title(); ?></h2>
			
		<?php // Author
				if($proj_author !== '') { ?>
				<p class="author">by
		<?php } ?>
				
		<?php // Author-Link
				if($proj_authlink !== '') { ?>
				<a itemprop="author" href="<?php 
				echo $proj_authlink; ?>"><?php 
				echo $proj_author; ?></a></p>
			<?php } elseif($proj_author !== '') { ?>
				<?php 
				echo $proj_author; ?></p>
		<?php } ?>
			
		<?php // Date
				if($proj_pubdate !== '') { ?>
				<p itemprop="datePublished"><?php 
				echo $proj_pubdate; ?></p>
		<?php } ?>
		
		<?php // ISSN nr
				if($proj_issn !== '') { ?>
				<p class="issn">ISSN <?php 
				echo $proj_issn; ?></p>
		<?php } ?>
		
		<?php // ISBN nr
				if($proj_isbn !== '') { ?>
				<p class="isbn">ISBN <span itemprop="isbn"><?php 
				echo $proj_isbn; ?></span></p>
		<?php } ?>
		
			<?php the_content('[Read more &rarr;]'); ?>
			
			<?php // Author-Link
					if($proj_FB_href !== '') { 
					
					?>
					<div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=108713115873680";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
					<div class="fb-like" data-href="<?php echo $proj_FB_href; ?>" data-send="false" data-width="340" data-show-faces="true"></div>
			<?php
			
					 } else { // output the old code 
					 
					 // protect user privacy  - either do nothing, or use double click method from Golem.de
					 
					  } ?>
			
			<!--<p>Categories: <?php the_category(', '); ?></p>-->
			<!--<p><?php the_tags('<strong>Keywords:</strong> ',', ',''); ?></p>-->
</div>

<div id="bookcover">
	<?php bxw_get_mediumimg($post->ID); ?><img src="<?php bloginfo('stylesheet_directory'); ?>/images/cover_dummy.png" />
</div>

<div id="book-meta" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
				<?php // OPTIONAL META-TAG SECTION
				
				if( $proj_price !== '') {
					$show_meta = 'true';
				} else if ($proj_format !== '') {
					$show_meta = 'true';
				} else {
					$show_meta = 'false';
				}
				
				if( $show_meta == 'true') { ?>
				<ul class='post-meta'>
				<?php /*check if there is a price*/ if($proj_price !== '') { ?>
				<li><strong>Price: </strong><span itemprop="price"><?php echo $proj_price; ?></span></li>
				<?php } ?>
				<?php /*check if there is a format*/ if($proj_format !== '') { ?>
				<li><strong>Format: </strong><span><?php echo $proj_format; ?></span></li>
				<?php } ?>
				</ul>
			<?php } // end if statement
				//if there's no meta-tag
				else {} // end META-TAGS
			?>
			
			<?php // AMAZON LINK
			if($proj_amazon !== '') { ?>
			&rarr; this item on <a href="<?php 
			echo $proj_amazon; ?>" target="_blank" class="amazon">Amazon</a><br/>
			<?php } ?>
			
			<?php // LULU LINK
			if($proj_lulu !== '') { ?>
			<span>&rarr; this item on <a href="http://www.lulu.com/content/<?php 
			echo $proj_lulu; ?>" target="_blank" class="lulu">Lulu.com</a></span><br/>
			<?php } ?>
			
			<?php // OpenLibrary LINK
			if($proj_openlib !== '') { ?>
			&rarr; on <a href="<?php 
			echo $proj_openlib; ?>" target="_blank" class="openlib">OpenLibrary</a><br/>
			<?php } ?>
			
			<?php // GoogleBooks LINK
			if($proj_googlebooks !== '') { ?>
			&rarr; on <a href="<?php 
			echo $proj_googlebooks; ?>" target="_blank" class="openlib">GoogleBooks</a><br/>
			<?php } ?>
			
			<?php // weRead LINKS
			if($proj_weread !== '') { ?>
			&rarr; on <a href="<?php 
			echo $proj_weread; ?>" target="_blank" class="weread">weRead</a><br/>
			<?php } ?>
			
			<?php // Readme.CC LINKS
			if($proj_readme !== '') { ?>
			&rarr; on <a href="<?php 
			echo $proj_readme; ?>" target="_blank" class="weread">Readme.cc</a><br/>
			<?php } ?>
			
			<?php // LULU LINK 2
			if($proj_lulu !== '') { ?>
			<a href="http://www.lulu.com/commerce/index.php?fBuyContent=<?php 
			echo $proj_lulu; ?>" target="_blank" class="img-link"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/lulu-book.gif" alt="Lulu.com link"/></a>
			<?php } ?>
</div>