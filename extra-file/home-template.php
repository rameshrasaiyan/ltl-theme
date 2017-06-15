<?php
/**
 * Template Name: Home Page
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage ranker
 * @since ranker 1.0
 */

get_header();
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		ranker_post_thumbnail();
	?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'ranker' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'ranker' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit', 'ranker' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

</article>
<!-- #post-## -->

<!-- nerd life slider ## -->

<section class="featuredCollection nerl-slider home__section layout--adjust width100 relative" style="background-image: url( 'https://imgix.ranker.com/collection_img/1/2066/original/nerd-life-u4?w=1350&amp;h=321&amp;fit=crop&amp;q=50&amp;fm=jpg' )">
    <div class="featuredCollection__numLists relative block center uppercase white robotoC">24 LISTS</div> 
    <div class="container">
        <h2 class="featuredCollection__title relative center white robotoC"> Nerd Life</h2>
        <?php 
	    	//table data exist
	    	$custom_terms = get_terms('nerd_life_taxonomy');
	    	$arr = get_CategoyIds($custom_terms,"near-life");
	    	if($arr->count != 0){
	    	foreach($custom_terms as $custom_term) {
				    wp_reset_query();
				    $args = array(
				    	'post_type' => 'nerd_life',
				    	'post_per_page' => 4,
				        'tax_query' => array(
				            array(
				                'taxonomy' => 'nerd_life_taxonomy',
				            	'category' => $arr->slug,
				                'field' => 'slug',
				                'terms' => $custom_term->slug,
				            ),
				        ),
				     );
				     $loop = new WP_Query($args);
				     if($loop->have_posts()) {
				     	if($custom_term->slug == $arr->slug){
				     		 while($loop->have_posts()) : $loop->the_post();
				     		 	if ( has_post_thumbnail() ) { //$path = the_post_thumbnail_url(); 
				     		 	}?> 
						     	 <div class="col-md-3 p-0 col-sm-3 col-xs-6"> 
						        	<div class="slider-img">
<!--						        		<a href="#" class="featuredCollection__list featuredCollection__list--margin relative inlineFlex float center white robotoC $eiv white" data-eiv-params="&amp;rt=hp_collection&amp;ri=2521031&amp;p=1&amp;a=0" data-eiv-namespace="RUtils" data-eiv-callback="trackElementView" style="background-image: url( 'https://imgix.ranker.com/list_img_v2/1031/2521031/original/nerdy-things-with-annoying-fans?w=283&amp;h=146&amp;fit=crop&amp;q=60&amp;fm=jpg' )" data-eiv-completed="true">  	-->
        	
						        		<a href="#" class="featuredCollection__list featuredCollection__list--margin relative inlineFlex float center white robotoC $eiv white" data-eiv-params="&amp;rt=hp_collection&amp;ri=2521031&amp;p=1&amp;a=0" data-eiv-namespace="RUtils" data-eiv-callback="trackElementView" style="background-image: url( <?php the_post_thumbnail_url()?> )" data-eiv-completed="true"> 
						        			<span class="featuredCollection__listTitle relative">
						        				<?php the_title();?>
						        			</span> 
						        		</a> 	
						        	</div>
						    	</div>
					     <?php 	endwhile;
				     	}//end if slug
				     }
				}
	    	}
	    ?>
       
    	<!--
    	<div class="col-md-3 p-0 col-sm-3 col-xs-6"> 
        	<div class="slider-img">
        		<a href="#" class="featuredCollection__list featuredCollection__list--margin relative inlineFlex float center white robotoC $eiv white" data-eiv-params="&amp;rt=hp_collection&amp;ri=2521031&amp;p=1&amp;a=0" data-eiv-namespace="RUtils" data-eiv-callback="trackElementView" style="background-image: url( 'https://imgix.ranker.com/list_img_v2/1031/2521031/original/nerdy-things-with-annoying-fans?w=283&amp;h=146&amp;fit=crop&amp;q=60&amp;fm=jpg' )" data-eiv-completed="true"> <span class="featuredCollection__listTitle relative">The Most Annoying Nerd Fan Bases</span> </a> 	
        	</div>
    	</div>
    	<div class="col-md-3 p-0 col-sm-3 col-xs-6"> 
        	<div class="slider-img">
        		<a href="#" class="featuredCollection__list featuredCollection__list--margin relative inlineFlex float center white robotoC $eiv white" data-eiv-params="&amp;rt=hp_collection&amp;ri=2521031&amp;p=1&amp;a=0" data-eiv-namespace="RUtils" data-eiv-callback="trackElementView" style="background-image: url( 'https://imgix.ranker.com/list_img_v2/1031/2521031/original/nerdy-things-with-annoying-fans?w=283&amp;h=146&amp;fit=crop&amp;q=60&amp;fm=jpg' )" data-eiv-completed="true"> <span class="featuredCollection__listTitle relative">The Most Annoying Nerd Fan Bases</span> </a> 	
        	</div>
    	</div>
    	<div class="col-md-3 p-0 col-sm-3 col-xs-6"> 
        	<div class="slider-img">
        		<a href="#" class="featuredCollection__list featuredCollection__list--margin relative inlineFlex float center white robotoC $eiv white" data-eiv-params="&amp;rt=hp_collection&amp;ri=2521031&amp;p=1&amp;a=0" data-eiv-namespace="RUtils" data-eiv-callback="trackElementView" style="background-image: url( 'https://imgix.ranker.com/list_img_v2/1031/2521031/original/nerdy-things-with-annoying-fans?w=283&amp;h=146&amp;fit=crop&amp;q=60&amp;fm=jpg' )" data-eiv-completed="true"> <span class="featuredCollection__listTitle relative">The Most Annoying Nerd Fan Bases</span> </a> 	
        	</div>
    	</div>
    	<div class="col-md-3 p-0 col-sm-3 col-xs-6"> 
        	<div class="slider-img">
        		<a href="#" class="featuredCollection__list featuredCollection__list--margin relative inlineFlex float center white robotoC $eiv white" data-eiv-params="&amp;rt=hp_collection&amp;ri=2521031&amp;p=1&amp;a=0" data-eiv-namespace="RUtils" data-eiv-callback="trackElementView" style="background-image: url( 'https://imgix.ranker.com/list_img_v2/1031/2521031/original/nerdy-things-with-annoying-fans?w=283&amp;h=146&amp;fit=crop&amp;q=60&amp;fm=jpg' )" data-eiv-completed="true"> <span class="featuredCollection__listTitle relative">The Most Annoying Nerd Fan Bases</span> </a> 	
        	</div>
    	</div>
    	<div class="col-md-12 text-center">        
    		<a class="featuredCollection__collectionBtn relative inlineBlock white lowercase robotoC" href="#">view collection</a>
    	</div>	    
    -->
    </div>     
</section>


<?php echo get_footer();?>