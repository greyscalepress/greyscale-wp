<?php
/**
 * The template for displaying search forms in Greyscale Press
 *
 * @package WordPress
 * @subpackage Greyscale Press
 */
?>

<form method="get" id="searchform" class="footer-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s" class="assistive-text hidden">Search</label>
	<input type="text" class="field" name="s" id="s" placeholder="Search" />
	<input type="submit" class="submit hidden" name="submit" id="searchsubmit" value="Search" />
</form>