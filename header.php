<?php /** @package WordPress **/

// Set the right CORS header, so that AJAX calls
// from api.eurega.(dev|org) could be made.
$protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
if (strpos($_SERVER['HTTP_HOST'], 'eurega.dev') !== false) {
    $apiHost = "api.eurega.dev";
} else {
    $apiHost = "api.eurega.org";
}

header("Access-Control-Allow-Origin: " . $protocol . $apiHost);

?><!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		
		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />
			<!--[if IE]>
				<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
			<![endif]-->
			<meta name="msapplication-TileColor" content="#f01d4f">
			<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/win8-tile-icon.png">
	    	<meta name="theme-color" content="#121212">
	    <?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

		<!-- Drop Google Analytics here -->
		<!-- end analytics -->

	</head>
	
	<!-- Uncomment this line if using the Off-Canvas Menu --> 
		
	<body <?php body_class(); ?>>

		<div class="off-canvas-wrapper">
			
			<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
				
				<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
				
				<div class="off-canvas-content" data-off-canvas-content>
					
					<header id="eurega-header" class="header" role="banner">
						<div id="inner-header" class="row">
							<div class="large-12 medium-12 columns">
								<h1>
									<a href="<?php echo home_url(); ?>">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="EUREGA-Logo" style="width: 14%;" />
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/EUREGA-Schriftzug-blau.png" alt="EUREGA-Schriftzug" style="width: 30%;" />
									</a>
									<small class="anmeldung-subtitle"><?php  bloginfo('name'); ?></small>
								</h1>
							</div>
						</div>

						 <!-- This navs will be applied to the topbar, above all content 
							  To see additional nav styles, visit the /parts directory -->
						 <?php get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>
		 	
					</header> <!-- end .header -->