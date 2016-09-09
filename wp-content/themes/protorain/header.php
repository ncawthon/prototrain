<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name=viewport content="width=device-width, initial-scale=1.0">
	<title><?php wp_title(); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php global $adimworks; ?>
	<?php $favicon = $adimworks['favicon']['url'];?>
	<link rel="icon" type="image/png" href="<?php echo $favicon; ?>" sizes="32x32" />
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<?php global $adimworks; ?>
	<script>
		
	</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>			
			<!-- <div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas data-position="left"> -->
				<?php //wp_nav_menu(array(
				// 	'container' => false,
				// 	'menu' => __( 'Drill Menu', 'textdomain' ),
				// 	'menu_class' => 'vertical menu',
				// 	'theme_location' => 'offcanvas-left',
				// 	'items_wrap'      => '<ul id="%1$s" class="%2$s" data-drilldown="">%3$s</ul>',
				// 	'fallback_cb' => 'f6_drill_menu_fallback',
				// 	'walker' => new F6_DRILL_MENU_WALKER(),
				// 	)
				// );
				?>
				<!-- </div> -->
				<!-- off-canvas right menu -->
				<div class="off-canvas position-right" id="offCanvasRight" data-off-canvas data-position="right">
					<button class="close-button" aria-label="Close menu" type="button" data-close>
						<span aria-hidden="true">&times;</span>
					</button>
					<?php 
					wp_nav_menu(array(
						'container' => false,
						'menu' => __( 'Drill Menu', 'textdomain' ),
						'menu_class' => 'vertical menu',
						'theme_location' => 'offcanvas-right',
						'items_wrap'      => '<ul id="%1$s" class="%2$s" data-drilldown="">%3$s</ul>',
						'fallback_cb' => 'f6_drill_menu_fallback',
						'walker' => new F6_DRILL_MENU_WALKER(),
						)
					);
					?>
				</div>
				<header class="header">
					<div class="row">
						<!-- <div class="title-bar-left">
							<button class="menu-icon" data-open="offCanvasLeft"></button>
						</div> -->
						<div class="menu-main_left xsmall-8 small-6 medium-6 large-6 columns ">
							<?php //wp_nav_menu(array(
							// 	'container' => false,
							// 	'menu' => __( 'Top Bar Menu', 'textdomain' ),
							// 	'menu_class' => 'dropdown menu top-bar-left',
							// 	'theme_location' => 'primary-left',
							// 	'items_wrap'      => '<ul id="%1$s" class="%2$s align-left hide-for-small-only" data-dropdown-menu>%3$s</ul>',
							// 	'fallback_cb' => 'f6_topbar_menu_fallback',
							// 	'walker' => new F6_TOPBAR_MENU_WALKER(),
							// 	)
							// );
							?>
							<?php 
							$logoimage = $adimworks['logoimage']['url'];
							$logoalt =  $adimworks['logoalt']; 
							?>
							<a class="navbar-brand" href="<?php bloginfo('url'); ?>">
								<img src="<?php echo $logoimage; ?>" alt="<?php echo$logoalt; ?>"/>
							</a>
						</div>
						<div class="title-bar-right">
							<button class="menu-icon" data-open="offCanvasRight"></button>
						</div>
						<div class="menu-main_right xsmall-4 small-6 medium-6 large-6 columns hide-for-small-only">
							<?php wp_nav_menu(array(
								'container' => false,
								'menu' => __( 'Top Bar Menu', 'textdomain' ),
								'menu_class' => 'dropdown menu top-bar-right',
								'theme_location' => 'primary-right',
								'items_wrap'      => '<ul id="%1$s" class="%2$s align-left hide-for-small-only" data-dropdown-menu>%3$s</ul>',
								'fallback_cb' => 'f6_topbar_menu_fallback',
								'walker' => new F6_TOPBAR_MENU_WALKER(),
								)
							);
							?>
						</div>
					</div>
				</header>

				<!-- original content goes in this container -->
				<div class="off-canvas-content" data-off-canvas-content>