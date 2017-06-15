<?php
/**
 * Displays home navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<nav id="site-navigations" class="main-navigations" role="navigation" aria-label="<?php _e( 'Top Menu', 'twentyseventeen' ); ?>">
	<?php wp_nav_menu( array(
		'theme_location' => 'welcome-menu',
		'menu_id'        => 'welcome-menu',
	) ); ?>
</nav><!-- #site-navigation -->
