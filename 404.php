<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage ranker
 * @since ranker 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<div class="text-404">
						<h1>404</h1>
					</div>
					<h1 class="page-title">Oops! That page can't be found.</h1>
				</header>   

				<?php /*
					<div class="page-content">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'ranker' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .page-content -->
				*/?>
			</section><!-- .error-404 -->
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
