<?php

/**
 * ranker functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage ranker
 * @since ranker 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since ranker 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/**
 * ranker only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'ranker_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since ranker 1.0
 */
function ranker_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/ranker
	 * If you're building a theme based on ranker, use a find and replace
	 * to change 'ranker' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ranker' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu'	=> __( 'Primary Menu', 'ranker' ),
		'social-menu'  => __( 'Social Links Menu', 'ranker' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	/*
	 * Enable support for custom logo.
	 *
	 * @since ranker 1.5
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 248,
		'width'       => 248,
		'flex-height' => true,
	) );

	$color_scheme  = ranker_get_color_scheme();
	$default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.

	/**
	 * Filter ranker custom-header support arguments.
	 *
	 * @since ranker 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-color     		Default color of the header.
	 *     @type string $default-attachment     Default attachment of the header.
	 * }
	 */
	add_theme_support( 'custom-background', apply_filters( 'ranker_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', ranker_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // ranker_setup
add_action( 'after_setup_theme', 'ranker_setup' );

/**
 * Register widget area.
 *
 * @since ranker 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function ranker_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'ranker' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'ranker' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s pd-0 mr-0 ">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="mr-0 widget-title text-capitalize">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer One', 'ranker' ),
		'id'            => 'footer-one',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'ranker' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s pd-0 mr-0 ">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="mr-0 widget-title text-capitalize">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Bottom Copy Right', 'ranker' ),
		'id'            => 'footer-copy-right',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'ranker' ),
		'before_widget' => '<aside id="%1$s" class="%2$s pd-0 mr-0 ">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Right Company Name', 'ranker' ),
		'id'            => 'footer-company-text',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'ranker' ),
		'before_widget' => '<aside id="%1$s" class="%2$s pd-0 mr-0 ">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ranker_widgets_init' );

if ( ! function_exists( 'ranker_fonts_url' ) ) :
/**
 * Register Google fonts for ranker.
 *
 * @since ranker 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function ranker_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'ranker' ) ) {
		$fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'ranker' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'ranker' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'ranker' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since ranker 1.1
 */
function ranker_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'ranker_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since ranker 1.0
 */
function ranker_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'ranker-fonts', ranker_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'ranker-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'ranker-ie', get_template_directory_uri() . '/css/ie.css', array( 'ranker-style' ), '20141010' );
	wp_style_add_data( 'ranker-ie', 'conditional', 'lt IE 9' );
	wp_enqueue_style( 'old-style', get_template_directory_uri() . '/css/old-style.css', array(), '3.7' );

	wp_enqueue_style( 'Bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.7' );
	
//wp_enqueue_style( 'fontawesome-style',  'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7' );
	
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', array(), '' );
	wp_enqueue_style( 'sm-theme', get_template_directory_uri() . '/css/theme.css', array(), '' );


	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'jquery-cookie-script', get_template_directory_uri() . '/js/jquery.cookie.min.js', array( 'jquery' ), '', true );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'ranker-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'ranker-style' ), '20141010' );
	wp_style_add_data( 'ranker-ie7', 'conditional', 'lt IE 8' );

	//wp_enqueue_script( 'ranker-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
	//	wp_enqueue_script( 'ranker-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}

	wp_enqueue_script( 'ranker-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
	wp_localize_script( 'ranker-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'ranker' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'ranker' ) . '</span>',
	) );
}
add_action( 'wp_enqueue_scripts', 'ranker_scripts' );

/**
 * Add preconnect for Google Fonts.
 *
 * @since ranker 1.7
 *
 * @param array   $urls          URLs to print for resource hints.
 * @param string  $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function ranker_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'ranker-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '>=' ) ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		} else {
			$urls[] = 'https://fonts.gstatic.com';
		}
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'ranker_resource_hints', 10, 2 );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since ranker 1.0
 *
 * @see wp_add_inline_style()
 */
function ranker_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'ranker-style', $css );
}
add_action( 'wp_enqueue_scripts', 'ranker_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 * @since ranker 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function ranker_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'ranker_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since ranker 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function ranker_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'ranker_search_form_modify' );

/**
 * Implement the Custom Header feature.
 *
 * @since ranker 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since ranker 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since ranker 1.0
 */
require get_template_directory() . '/inc/customizer.php';


/*get taxonomy object with count post function by @mahendra 22-mar-2017*/
function get_CategoyIds($array,$taxtval){
    foreach ($array as $key => $value) {
    	if($value->slug == $taxtval){return $value;}	
    } 
}

//blank image set variable by @mahendra;
define('BLANKIMAGE',get_template_directory_uri().'/img/404.png');
define('BLANKIMAGEBIG',get_template_directory_uri().'/img/404_big.png');
define('BLANKIMAGESMALL',get_template_directory_uri().'/img/404_small.png');
define('DEFAULT_LOGO_DARK',get_template_directory_uri().'/img/transparent-logo.png');
define('DEFAULT_LOGO',get_template_directory_uri().'/img/transparent-logo.png');

function the_404_big_image(){echo BLANKIMAGEBIG;}
function the_404_image(){echo BLANKIMAGE;}
function the_404__small_image(){echo BLANKIMAGESMALL;}


/**
 * Created for the home page blocks
 */

function cptui_register_my_cpts() {

    /**
     * Post Type: Home Blocks.
     */

    $labels = array(
        "name" => __( 'Home Blocks', 'ranker' ),
        "singular_name" => __( 'Home Blocks', 'ranker' ),
    );

    $args = array(
        "label" => __( 'Home Blocks', 'ranker' ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "featured", "with_front" => true ),
        "query_var" => true,
        "supports" => array( "title", "editor", "thumbnail" ),
    );

    register_post_type( "featured", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

