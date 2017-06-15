<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="site-branding animated fadeInDown">
	<div class="wrap">
	<?php if (is_front_page() ) { ?>
		<div class="site-branding-logo">
			<?php if(the_custom_logo()): ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="home-logo">
				<?php the_custom_logo() ?>
			</a>
		<?php else: ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="home-logo">
				<img src="<?php echo get_template_directory_uri();?>/img/logo.svg">	
			</a>	
		<?php endif; ?>
		</div>
	<?php }else { ?>
		<div class="site-branding-logo">
			<?php if(the_custom_logo()): ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-logo">
				<?php the_custom_logo() ?>
			</a>
		<?php else: ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-logo">
				<img src="<?php echo get_template_directory_uri();?>/img/logo-fixed.svg">	
			</a>	
		<?php endif; ?>
	<?php } ?>
	</div><!-- .wrap -->
</div><!-- .site-branding -->
