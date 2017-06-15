<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage ranker
 * @since ranker 1.0
 */
?>

	</div><!-- .site-content -->

	<footer id="colophon" class="container-fluid pd-0" role="contentinfo">
		<div class="container" style="margin:0px auto !important;">
			<div id="commonFootWrap" class="relative footermenu">
				<div class="col-md-4 col-lg-4 firstmenu col-sm-4 col-xs-12 p-0 m-center">
					<?php if ( is_active_sidebar( 'footer-one' ) ) : ?>
						<ul id="sidebar1">
							<?php dynamic_sidebar( 'footer-one' ); ?>
						</ul>
					<?php endif; ?>
					<?php
			      	if(has_nav_menu('social-menu')){
			      		wp_nav_menu(
							array(
								'theme_location'  => 'social-menu',
								'menu'            => '',
								'container'       => false,
								'container_class' => 'menu-{menu slug}-container',
								'container_id'    => '',
								'menu_class'      => 'menu',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu_footer',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ul class="nav navbar-nav main-footer-ul">%3$s</ul>',
								'depth'           => 0,
								'walker'          => ''
								)
							);
			      	}else{?>
			      		<h2 style="color:#f00;" class="text-center">No Found Menu</h2>
			      	<?php }?>
				</div>
				<div class="clearfix"></div>
			</div>			
		</div>
		<div class="second-footer">
			<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
				<div class="col-md-6 text-left copy-rtext col-xs-12 col-lg-6 col-sm-6 m-center">
					<?php if ( is_active_sidebar( 'footer-copy-right' ) ) : ?>
						<ul id="sidebar1">
							<?php dynamic_sidebar( 'footer-copy-right' ); ?>
						</ul>
					<?php endif; ?>	
				</div>
				<div class="col-md-6 text-right col-xs-12 col-lg-6 col-sm-6 m-center">
					<?php if ( is_active_sidebar( 'footer-company-text' ) ) : ?>
						<ul id="sidebar1">
							<?php dynamic_sidebar( 'footer-company-text' ); ?>
						</ul>
					<?php endif; ?>		
				</div>
			</div>
		</div>	
	</footer><!-- .site-footer -->

<?php wp_footer(); ?>
<script type="text/javascript">
var themes = getCookie("theme_color");
if(themes == "dark-theme-body" && themes != undefined){
	jQuery('body').removeClass('light-theme-body');
    jQuery('body').addClass(themes);
}else if(themes == "light-theme-body" && themes != undefined && themes !=  null){
	jQuery('body').removeClass('dark-theme-body');
    jQuery('body').addClass(themes);
}

var themes_fonts = getCookie("theme_fonts");
if(themes_fonts == "large-font-body" && themes_fonts != undefined){
    jQuery('body').addClass(themes_fonts);
}else if(themes_fonts == "" && themes_fonts != undefined && themes_fonts !=  null){
	jQuery('body').removeClass('large-font-body');
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) { 
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var switch_theme = getCookie("theme_color"); 
    if (switch_theme != "" && switch_theme == "undefined" && switch_theme == null ) {
        setCookie("theme_color", switch_theme, 365);
    } 
}




jQuery(function($){

	$('.dark-theme-btn').click(function(){
		checkCookie();
		setCookie("theme_color", "dark-theme-body", 365);
		$('body').removeClass('light-theme-body');
		$('body').addClass('dark-theme-body');
	});
	$('.light-theme-btn').click(function(){
		checkCookie();
		setCookie("theme_color", "light-theme-body", 365);
		$('body').removeClass('dark-theme-body');
		$('body').addClass('light-theme-body');
	});		

	//font size increase script
	$('.small-font').click(function(){
		checkCookie();
		setCookie("theme_fonts", "",365);
		$('body').removeClass('large-font-body');
	});
	$('.big-font').click(function(){
		checkCookie();
		setCookie("theme_fonts", "large-font-body",365);
		$('body').addClass('large-font-body');
	});		
	
	});	
</script>
</body>
</html>
