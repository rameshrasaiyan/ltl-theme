<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,500,700" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class('light-theme-body'); ?> > <!-- light-theme-body  dark-theme-body -->

<header id="masthead" role="banner">
	<div class="container-fluid">
		<div class="row">
			<div class="topbar-header text-right header-fix">
				<div class="navbar-header navbar-right">
			    	<ul class="nav navbar-nav">
				        <li class="dis-flex"><label>Text Size:</label></li>
				        <li class="dis-flex"><button class="small-font">A</button></li>
				        <li class="dis-flex"><button class="big-font">A</button></li>
				        <li class="dis-flex"><label>Theme:</label></li>
				        <li class="dis-flex"><button class="dark-theme-btn">DARK</button></li>
				        <li class="dis-flex"><button class="light-theme-btn">LIGHT</button></li>
				    </ul>
			    </div>		
			</div>    
		</div>	
	</div>	
	<div class="main-header">
		<nav class="navbar  col-md-12 primary-header-default pd-0 header-fix">
		  <div class="container-fluid">

		  	<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 text-center">
		  		<div class="header-logo light-logo">
		  		<?php if(has_post_thumbnail('the_custom_logo')){ ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="home-logo">
						<?php the_custom_logo(); ?>
					</a>
				<?php }else{ ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php echo DEFAULT_LOGO;?>" alt="logo"></a>	
				<?php } ?>
		  		</div>
		  		<div class="header-logo dark-logo">	
		  			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo DEFAULT_LOGO_DARK;?>" alt="logo"></a>	
		  		</div>	
		  	</div>

		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse text-uppercase navbar-left col-md-9 b-pd-0 col-sm-9 col-lg-9 col-xs-12" id="main-menu">
		      <?php
		      	if(has_nav_menu('primary-menu')){
		      		wp_nav_menu(
						array(
							'theme_location'  => 'primary-menu',
							'menu'            => '',
							'container'       => false,
							'container_class' => 'menu-{menu slug}-container',
							'container_id'    => '',
							'menu_class'      => 'menu',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul class="nav navbar-nav main-header-ul">%3$s</ul>',
							'depth'           => 0,
							'walker'          => ''
							)
						);
		      	}else{?>
		      		<h2 style="color:#f00;" class="text-center">No Found Menu</h2>
		      	<?php }?>
		    </div><!-- /.navbar-collapse -->
		 </div><!-- /.container-fluid -->
		</nav>
	</div><!-- .custom-header -->
</header><!-- #masthead -->
