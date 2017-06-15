<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<nav id="site-navigations" class="main-navigations" role="navigation" aria-label="<?php _e( 'Top Menu', 'twentyseventeen' ); ?>">
	<?php wp_nav_menu( array(
		'theme_location' => 'mainmenu',
		'menu_id'        => 'mainmenu',
	) ); ?>
</nav><!-- #site-navigation -->

<div id="siteNavCategories" class="float fixed" style="left: 68px;display: block;">
    <ul class="float relative lowercase main">
        <li class="block"> <a role="link" id="nav_people_cat" class="block grey active" href="#" data-navid="1" data-navtagid="367"> People</a> </li>
        <li class="block"> <a role="link" id="nav_film_cat" class="block grey" href="#" data-navid="4" data-navtagid="5"> Film</a> </li>
        <li class="block"> <a role="link" id="nav_tv_cat" class="block grey" href="#" data-navid="3" data-navtagid="368"> TV</a> </li>
        <li class="block"> <a role="link" id="nav_music_cat" class="block grey" href="#" data-navid="2" data-navtagid="3"> Music</a> </li>
        <li class="block"> <a role="link" id="nav_sports_cat" class="block grey" href="#" data-navid="8" data-navtagid="6"> Sports</a> </li>
        <li class="block"> <a role="link" id="nav_video-games_cat" class="block grey active" href="#" data-navid="75" data-navtagid="139"> Gaming</a> </li>
        <li class="block"> <a role="link" id="nav_funny_cat" class="block grey" href="#" data-navid="47" data-navtagid="28"> funny</a> </li>
        <li class="block"> <a role="link" id="nav_business_cat" class="block grey" href="#" data-navid="60" data-navtagid="46"> Biz</a> </li>
        <li class="block"> <a role="link" id="nav_places-and-travel_cat" class="block grey" href="#" data-navid="46" data-navtagid="8"> Travel</a> </li>
        <li class="block"> <a role="link" id="nav_lifestyle_cat" class="block grey" href="#" data-navid="78" data-navtagid="1169"> lifestyle</a> </li>
        <li class="block"> <a role="link" id="nav_food-and-drink_cat" class="block grey" href="#" data-navid="64" data-navtagid="7"> Food/Drink</a> </li>
        <li class="block"> <a role="link" id="nav_science_cat" class="block grey" href="#" data-navid="65" data-navtagid="376"> Science</a> </li>
        <li class="block"> <a role="link" id="nav_politics--and--history_cat" class="block grey" href="/#" data-navid="79" data-navtagid="57"> Politics &amp; History</a> </li>
        <li class="hidden"> <a role="link" id="nav_more_cat" class="block grey" href="#" data-navid="71" data-navtagid="0"> more</a> </li>
    </ul>
    <div id="siteNavCatSubs" class="float relative visible">
        <div class="float absolute titleGroup visible">
            <i class="relative inlineFlex left category white rnkrVideoGamesBg">v</i><strong class="relative title robotoC rnkrVideoGames visible"> Gaming</strong>
            <ul class="clear block subs">
                <li class="block"><a role="link" href="#" title="best characters">best characters</a></li>
                <li class="block"><a role="link" href="#" title="board/card games">board/card games</a></li>
                <li class="block"><a role="link" href="#" title="gadgets">gadgets</a></li>
                <li class="block"><a role="link" href="#" title="gambling">gambling</a></li>
                <li class="block"><a role="link" href="#" title="game consoles">game consoles</a></li>
                <li class="block"><a role="link" href="#" title="gamers">gamers</a></li>
                <li class="block"><a role="link" href="#" title="internet">internet</a></li>
                <li class="block"><a role="link" href="#" title="kids">kids</a></li>
                <li class="block"><a role="link" href="#" title="nintendo">nintendo</a></li>
                <li class="block"><a role="link" href="#" title="playstation">playstation</a></li>
                <li class="block"><a role="link" href="#" title="retro">retro</a></li>
                <li class="block"><a role="link" href="#" title="rpgs">rpgs</a></li>
                <li class="block"><a role="link" href="#" title="xbox">xbox</a></li>
            </ul>
        </div>
    </div>
    <div id="siteNavCatLists" class="floatRight relative">
        <a role="link" href="#" class="floatRight relative black pointer clear seeAll robotoC uppercase">see all  Gaming <i class="rnkrBlue">&gt;</i></a>
        <ul class="floatRight relative clear block">
            <li class="float relative block">
            	<a href="#">
            		<img src="<?php echo get_template_directory_uri();?>/img/img1.jpg" onerror="RUtils.image.error(this,null,1191);">
            		<span class="float absolute flex title whiteBg black robotoC center">The Best Final Fantasy Characters of All Time</span>
            	</a>
            </li>
            <li class="float relative block">
            	<a href="#">
            		<img src="<?php echo get_template_directory_uri();?>/img/img2.jpg" onerror="RUtils.image.error(this,null,1191);">
            		<span class="float absolute flex title whiteBg black robotoC center">The Best Stealth-Based Games of All Time</span>
            	</a>
            </li>
            <li class="float relative block">
            	<a href="#">
            		<img src="<?php echo get_template_directory_uri();?>/img/img3.jpg" onerror="RUtils.image.error(this,null,1191);">
            		<span class="float absolute flex title whiteBg black robotoC center">The Best Final Fantasy Games</span>
            	</a>
            </li>
            <li class="float relative block">
            	<a href="#">
            		<img src="<?php echo get_template_directory_uri();?>/img/img4.jpg" onerror="RUtils.image.error(this,null,1191);">
            		<span class="float absolute flex title whiteBg black robotoC center">The Most Hardcore Video Game Heroes of All Time</span>
            	</a>
            </li>
            <li class="float relative block">
            	<a href="#">
            		<img src="<?php echo get_template_directory_uri();?>/img/img5.jpg" onerror="RUtils.image.error(this,null,1191);">
            		<span class="float absolute flex title whiteBg black robotoC center">The Best Robot Video Games of All Time</span>
            	</a>
            </li>
            <li class="float relative block">
            	<a href="h#">
            		<img src="<?php echo get_template_directory_uri();?>/img/img6.jpg" onerror="RUtils.image.error(this,null,1191);">
            		<span class="float absolute flex title whiteBg black robotoC center">The Best Action Role-Playing Games of All Time</span>
            	</a>
            </li>
        </ul>
    </div>
    <div id="siteNavCatAll" class="float absolute width50"> 
    	<a role="link" href="#" class="floatRight relative black uppercase pointer clear robotoC seeAll" rel="nofollow">
    	 	all ranker topics <i class="rnkrBlue">&gt;</i>
    	</a> 
    </div>
</div>