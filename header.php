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


if(!empty($theme_settings['header_account_color']) ) : 
	$account_clr = esc_attr( $theme_settings['header_account_color'] );
else: 
	$account_clr = esc_attr( '#354054' );
endif;

if(!empty($theme_settings['header_wish_color']) ) : 
	$wish_clr = esc_attr( $theme_settings['header_wish_color'] );
else: 
	$wish_clr = esc_attr( '#354054' );
endif;

if(!empty($theme_settings['header_shuffle_color']) ) : 
	$shuffle_clr = esc_attr( $theme_settings['header_shuffle_color'] );
else: 
	$shuffle_clr = esc_attr( '#354054' );
endif;

if(!empty($theme_settings['header_cart_color']) ) : 
	$cart_clr = esc_attr( $theme_settings['header_cart_color'] );
else: 
	$cart_clr = esc_attr( '#354054' );
endif;

?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'kalni' ); ?></a>

	<header id="masthead" class="site-header">
		<?php if(! $theme_settings['hide_header_top'] ) : ?>
		<div class="header-top bg-blue">
			<div class="container-95">
				<div class="grid grid-4 align-center g-gap-20">
					<?php if(!empty($theme_settings['header_top_content1']) ) : ?>
						<div class="ht-grid-content clr-white flex f-gap-5 fz-14 fw-400 lh-18">
							<i class="fa-solid fa-bolt"></i>
							<?php echo esc_html( $theme_settings['header_top_content1'] ); ?>
						</div>
					<?php endif; if(!empty($theme_settings['header_top_content2']) ) : ?>
						<div class="ht-grid-content clr-white flex f-gap-5 fz-14 fw-400 lh-18">
							<i class="fa-solid fa-bolt"></i>
							<?php echo esc_html( $theme_settings['header_top_content2'] ); ?>
						</div>
					<?php endif; if(!empty($theme_settings['header_top_content3']) ) : ?>
						<div class="ht-grid-content clr-white flex f-gap-5 fz-14 fw-400 lh-18">
							<i class="fa-solid fa-bolt"></i>
							<?php echo esc_html( $theme_settings['header_top_content3'] ); ?>
						</div>
					<?php endif; if(!empty($theme_settings['header_top_content4']) ) : ?>
						<div class="ht-grid-content clr-white flex f-gap-5 fz-14 fw-400 lh-18 justify-end">
							<i class="fa-solid fa-bolt"></i>
							<?php echo esc_html( $theme_settings['header_top_content4'] ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
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
							<?php if(! $theme_settings['hide_header_search'] ) : ?>
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
							<?php endif; ?>
							<div class="hm-right-last flex f-gap-40 align-center justify-end">
								<?php if(! $theme_settings['hide_header_account'] ) : ?>
									<div class="hm-user flex align-center f-gap-5">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="27" viewBox="0 0 24 27" fill="none">
											<path d="M17.5097 26.7901H6.48972C4.58972 26.7901 2.88972 26.0101 1.11972 24.3301C0.279717 23.5301 -0.100284 22.6601 0.0197165 21.7601C0.259716 19.8401 2.65972 18.4901 4.24972 17.5901C4.46972 17.4701 4.66972 17.3501 4.83972 17.2501C9.18972 14.6601 14.8097 14.6601 19.1597 17.2501C19.3297 17.3501 19.5297 17.4701 19.7497 17.5901C21.3397 18.4901 23.7397 19.8501 23.9797 21.7601C24.0897 22.6601 23.7197 23.5201 22.8797 24.3301C21.1097 26.0101 19.4097 26.7901 17.5097 26.7901ZM5.60972 18.5401C5.42972 18.6501 5.21972 18.7701 4.98972 18.8901C3.73972 19.6001 1.64972 20.7801 1.50972 21.9401C1.48972 22.0901 1.42972 22.5501 2.15972 23.2401C3.64972 24.6601 4.97972 25.2901 6.48972 25.2901H17.5097C19.0197 25.2901 20.3497 24.6601 21.8397 23.2401C22.5697 22.5501 22.5097 22.0901 22.4897 21.9401C22.3497 20.7701 20.2597 19.5901 19.0097 18.8901C18.7797 18.7601 18.5697 18.6401 18.3897 18.5401C14.5097 16.2301 9.48972 16.2301 5.60972 18.5401Z" fill="<?php echo $account_clr; ?>"/>
											<path d="M11.9989 13.04C8.47891 13.04 5.62891 10.18 5.62891 6.66004C5.62891 3.14004 8.48891 0.290039 11.9989 0.290039C15.5189 0.290039 18.3789 3.15004 18.3789 6.67004C18.3789 10.19 15.5189 13.04 11.9989 13.04ZM11.9989 1.79004C9.30891 1.79004 7.12891 3.98004 7.12891 6.67004C7.12891 9.36004 9.31891 11.55 11.9989 11.55C14.6889 11.55 16.8789 9.36004 16.8789 6.67004C16.8789 3.98004 14.6889 1.79004 11.9989 1.79004Z" fill="<?php echo $account_clr; ?>"/>
										</svg>
										<a href="#" class="user-link clr-black fz-12 fw-500 lh-16">
											<span class="clr-black-light">Login</span><br>Account
										</a>
									</div>
								<?php endif; if(! $theme_settings['hide_header_wish'] ) : ?>
									<div class="hm-heart relative">
										<svg xmlns="http://www.w3.org/2000/svg" width="28" height="25" viewBox="0 0 28 25" fill="none">
											<path d="M13.7807 24.5798C11.8607 24.5798 10.7607 23.7698 8.76068 22.2898C3.33068 18.2698 0.340678 13.2498 0.540678 8.49979C0.660678 5.66979 1.98068 3.20979 4.06068 1.92979C7.06068 0.0897923 10.3807 0.139792 12.9407 2.05979C13.2607 2.29979 13.5907 2.54979 13.7807 2.66979C13.9707 2.54979 14.3007 2.29979 14.6207 2.05979C17.1807 0.139792 20.5007 0.0897923 23.5007 1.92979C25.5807 3.20979 26.9007 5.65979 27.0207 8.49979C27.2307 13.2398 24.2307 18.2698 18.8007 22.2898C16.8007 23.7598 15.7007 24.5798 13.7807 24.5798ZM8.51067 2.06979C7.45068 2.06979 6.21068 2.35979 4.84068 3.19979C3.18068 4.21979 2.14068 6.21979 2.03068 8.54979C1.85068 12.7898 4.62068 17.3498 9.64068 21.0698C11.4907 22.4398 12.3407 23.0698 13.7707 23.0698C15.2007 23.0698 16.0407 22.4398 17.9007 21.0698C22.9307 17.3498 25.7007 12.7898 25.5207 8.54979C25.4207 6.20979 24.3707 4.20979 22.7107 3.19979C19.1707 1.02979 16.5007 2.50979 15.5207 3.24979C14.6107 3.92979 14.2407 4.20979 13.7807 4.20979C13.3207 4.20979 12.9407 3.92979 12.0407 3.24979C11.4307 2.80979 10.2007 2.06979 8.51067 2.06979Z" fill="<?php echo $wish_clr; ?>"/>
											<path d="M13.7807 24.5798C11.8607 24.5798 10.7607 23.7698 8.76068 22.2898C3.33068 18.2698 0.340678 13.2498 0.540678 8.49979C0.660678 5.66979 1.98068 3.20979 4.06068 1.92979C7.06068 0.0897923 10.3807 0.139792 12.9407 2.05979C13.3307 2.34979 13.7307 2.64979 13.8807 2.72979C14.2507 2.77979 14.5307 3.08979 14.5307 3.46979C14.5307 3.87979 14.1907 4.21979 13.7807 4.21979C13.3207 4.21979 12.9407 3.93979 12.0407 3.25979C11.0607 2.51979 8.39068 1.02979 4.85068 3.20979C3.19068 4.22979 2.15068 6.22979 2.04068 8.55979C1.86068 12.7998 4.63068 17.3598 9.65068 21.0798C11.5007 22.4498 12.3507 23.0798 13.7807 23.0798C14.1907 23.0798 14.5307 23.4198 14.5307 23.8298C14.5307 24.2398 14.1907 24.5798 13.7807 24.5798Z" fill="<?php echo $wish_clr; ?>"/>
											</svg>
										<span class="heart-count absolute bg-red clr-white br-100 text-center">0</span>
									</div>
								<?php endif; if(! $theme_settings['hide_header_product_list'] ) : ?>
									<div class="hm-shuffle relative">
										<svg xmlns="http://www.w3.org/2000/svg" width="25" height="22" viewBox="0 0 25 22" fill="none">
											<path d="M2.73 18.9981H0.75C0.34 18.9981 0 18.6581 0 18.2481C0 17.8381 0.34 17.4981 0.75 17.4981H2.73C5 17.4981 6.14 17.4981 6.98 17.0081C7.7 16.5881 8.26 15.8081 9.31 14.1081C9.53 13.7581 9.99 13.6481 10.34 13.8681C10.69 14.0881 10.8 14.5481 10.59 14.8981C9.54 16.5981 8.81999 17.6781 7.73999 18.3081C6.54999 18.9981 5.27 18.9981 2.73 18.9981ZM14.55 7.74808C14.42 7.74808 14.28 7.70808 14.16 7.63808C13.81 7.41808 13.7 6.95808 13.92 6.60808C14.97 4.90808 15.69 3.82808 16.77 3.19808C18.14 2.39808 19.77 2.44808 21.2 2.48808C21.49 2.48808 21.77 2.49808 22.04 2.49808C22.03 2.48808 22.03 2.47808 22.02 2.47808L20.9 1.25808C20.62 0.958082 20.64 0.478082 20.94 0.198082C21.25 -0.0819184 21.72 -0.0619185 22 0.238082L23.12 1.45808C23.74 2.12808 24.18 2.61808 23.93 3.27808C23.66 3.99808 22.93 3.99808 22.08 3.99808C21.78 3.99808 21.47 3.98808 21.15 3.97808C19.85 3.93808 18.52 3.89808 17.51 4.48808C16.79 4.90808 16.23 5.68808 15.18 7.38808C15.05 7.61808 14.8 7.74808 14.55 7.74808Z" fill="<?php echo $shuffle_clr; ?>"/>
											<path d="M21.4498 21.498C21.2698 21.498 21.0898 21.428 20.9398 21.298C20.6398 21.018 20.6198 20.548 20.8998 20.238L22.0198 19.018C22.0298 19.008 22.0298 18.998 22.0398 18.998C21.7698 18.998 21.4898 19.008 21.1998 19.018C19.7598 19.058 18.1398 19.108 16.7698 18.308C15.5898 17.618 14.8898 16.478 13.4898 14.198L9.74977 8.09805C8.47977 6.02805 7.83976 4.98805 6.98976 4.49805C6.14976 4.00805 5.00976 4.00805 2.73976 4.00805H0.759766C0.349766 4.00805 0.00976562 3.66805 0.00976562 3.25805C0.00976562 2.84805 0.339771 2.49805 0.749771 2.49805H2.72977C5.26977 2.49805 6.54976 2.49805 7.73976 3.18805C8.91976 3.87805 9.61976 5.01805 11.0198 7.29805L14.7598 13.398C16.0298 15.468 16.6698 16.508 17.5198 17.008C18.5198 17.588 19.8598 17.548 21.1598 17.518C21.4798 17.508 21.7898 17.498 22.0898 17.498C22.9398 17.498 23.6698 17.498 23.9398 18.218C24.1898 18.878 23.7498 19.368 23.1298 20.038L22.0098 21.258C21.8498 21.418 21.6498 21.498 21.4498 21.498Z" fill="<?php echo $shuffle_clr; ?>"/>
										</svg>
										<span class="shuffle-count absolute bg-red clr-white br-100 text-center">0</span>
									</div>
								<?php endif; if(! $theme_settings['hide_header_cart'] ) : ?>
									<div class="shoping-cart flex align-center f-gap-10">
										<!-- <div class="hm-cart relative">
											<img src="/wp-content/uploads/2024/03/shopping-cart.png" alt="" width="30">
											<span class="cart-count absolute bg-red clr-white br-100 text-center">0</span>
										</div>
										<div class="cart-content clr-black fz-12 fw-500 lh-16">
											<span class="clr-black-light">Your Cart</span> <br> $0.00
										</div> -->

										<?php 
											if ( class_exists( 'WooCommerce' )) :
												echo do_shortcode('[kalni_mini_cart]');
												// echo kalni_woocommerce_header_cart();
											endif;
										?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header-bottom bg-white">
			<div class="container-85">
				<div class="grid grid-1-3-1 g-gap-50 align-center">
					<?php if(! $theme_settings['hide_header_cats'] ) : ?>
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
					<?php endif; ?>
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
					<?php if(! $theme_settings['hide_header_discount'] ) : ?>
						<div class="hb-discount flex align-center f-gap-5 justify-end">
							<img src="/wp-content/uploads/2024/03/badge-discount-alt.png" width="23" alt="Discount">
							$20 Off Your First Order
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

		
	</header><!-- #masthead -->
