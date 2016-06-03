<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/styles/reset.css" />
	<?php 
	//Necessary in <head> for JS and plugins to work. 
	//I like it before style.css loads so the theme stylesheet is more specific than all others.
	wp_head();  ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
</head>
<body <?php body_class(); ?> >	
	<div id="wrapper">
	<header role="banner">
		<div class="top-bar clearfix">

		<?php if( ! has_custom_logo() ){ ?>
			<h1 class="site-name">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ) ?>" rel="home"> 
					<?php bloginfo('name'); ?> 
				</a>
			</h1>
		<?php }else{
			//see functions.php 
			the_custom_logo();
			} ?>

			<h2 class="site-description"> <?php bloginfo('description'); ?> </h2>
			
			<?php wp_nav_menu( array(
				'theme_location' => 'main_nav', //registered in functions.php
				'fallback_cb' 	 => false,  	//do nothing by default
				'container' 	 => 'nav',  	//wrap with <nav>
				'menu_class'	 => 'nav', 		//<ul class="nav">
			) ); ?>

		</div><!-- end .top-bar -->
		
		
		<?php wp_nav_menu( array(
				'theme_location' => 'utilities', //registered in functions.php
				'fallback_cb' 	 => false,  	//do nothing by default
				'container' 	 => false,  	//no wrapper
				'menu_class'	 => 'utilities', //<ul class="utilities">
			) ); ?>


		<?php get_search_form(); //includes searchform.php if it exists, if not, this outputs the default search bar ?>	
		
		<?php 
		//just demonstrating the custom header (see functions.php) 
		if( is_front_page() ){ 
		?>

		<img src="<?php header_image(); ?>">

		<?php } //end if is front page ?>


	</header>
