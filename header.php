<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kalni
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
wp_body_open(); 
$theme_settings = kalni_get_theme_settings();
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'kalni' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header-top bg-blue">
			<div class="container-95">
				<div class="grid grid-4 align-center g-gap-20">
					<div class="ht-grid-content clr-white flex f-gap-5 fz-14 fw-400 lh-18">
						<i class="fa-solid fa-bolt"></i>
						Special offer: enjoy 3 months of shopify for $1/month
					</div>
					<div class="ht-grid-content clr-white flex f-gap-5 fz-14 fw-400 lh-18">
						<i class="fa-solid fa-bolt"></i>
						Special offer: enjoy 3 months of shopify for $1/month
					</div>
					<div class="ht-grid-content clr-white flex f-gap-5 fz-14 fw-400 lh-18">
						<i class="fa-solid fa-bolt"></i>
						Special offer: enjoy 3 months of shopify for $1/month
					</div>
					<div class="ht-grid-content clr-white flex f-gap-5 fz-14 fw-400 lh-18 justify-end">
						<i class="fa-solid fa-bolt"></i>
						Special offer: enjoy 3 months of shopify for $1/month
					</div>
				</div>
			</div>
		</div>
		<div class="header-middle bg-white">
			<div class="container-85">
				<div class="grid grid-1-5 g-gap-60 align-center">
					<div class="site-branding">
						<?php
							$custom_logo_id = the_custom_logo( 'custom_logo' );
							if ( !empty($custom_logo_id) ) : 
								the_custom_logo(); 
							else :
							?>
								<p class="site-title">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
										<?php bloginfo( 'name' ); ?>
									</a>
								</p>
							<?php
							endif; 
						?>
					</div><!-- .site-branding -->
					<div class="hm-right-content">
						<div class="grid grid-2-1 align-center g-gap-10">
							<div class="header-search">
								<form action="/" class="hm-search-form flex align-center bg-white relative br-4">
									<select name="allcats" id="allcats" class="select-cats fz-14 fw-500 lh-18 relative">
										<option value="">All categories</option>
										<option value="T-shirt">T-shirt</option>
										<option value="T-shirt">T-shirt</option>
										<option value="T-shirt">T-shirt</option>
										<option value="T-shirt">T-shirt</option>
									</select>
									<input type="search" name="s" id="s" class="fz-14 lh-18 clr-black-light" placeholder="Search for products...">
									<input type="submit" class="bg-blue clr-white fz-14 fw-500 lh-18 text-center absolute" value="Search">
								</form>
							</div>
							<div class="hm-right-last flex f-gap-40 align-center justify-end">
								<div class="hm-user flex align-center f-gap-5">
									<img src="/wp-content/uploads/2024/03/user.png" width="30" alt="User">
									<a href="#" class="user-link clr-black fz-12 fw-500 lh-16">
										<span class="clr-black-light">Login</span><br>Account
									</a>
								</div>
								<div class="hm-heart relative">
									<img src="/wp-content/uploads/2024/03/heart.png" alt="" width="30">
									<span class="heart-count absolute bg-red clr-white br-100 text-center">0</span>
								</div>
								<div class="hm-shuffle relative">
									<img src="/wp-content/uploads/2024/03/shuffle.png" alt="" width="30">
									<span class="shuffle-count absolute bg-red clr-white br-100 text-center">0</span>
								</div>
								<div class="shoping-cart flex align-center f-gap-10">
									<div class="hm-cart relative">
										<img src="/wp-content/uploads/2024/03/shopping-cart.png" alt="" width="30">
										<span class="cart-count absolute bg-red clr-white br-100 text-center">0</span>
									</div>
									<div class="cart-content clr-black fz-12 fw-500 lh-16">
										<span class="clr-black-light">Your Cart</span> <br> $0.00
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header-bottom bg-white">
			<div class="container-85">
				<div class="grid grid-1-3-1 g-gap-50 align-center">
					<div class="cat-menus">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-2',
									'menu_id'        => 'categories',
								)
							);
						?>
					</div>
					<nav id="site-navigation" class="main-navigation">
						<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'kalni' ); ?></button> -->
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
						?>
					</nav><!-- #site-navigation -->
					<div class="hb-discount flex align-center f-gap-5 justify-end">
						<img src="/wp-content/uploads/2024/03/badge-discount-alt.png" width="23" alt="Discount">
						$20 Off Your First Order
					</div>
				</div>
			</div>
		</div>

		
	</header><!-- #masthead -->
