<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kalni
 */
$theme_settings = kalni_get_theme_settings();
?>
	<div class="newsletter-wrap bg-blue">
		<div class="container-85">
			<div class="grid grid-2-2-1 align-center g-gap-30">
				<div class="newsletter-left-content">
					<p class="fz-16 fw-500 lh-24 clr-white"><?php esc_html_e( 'SALE 20% OFF ALL STORE', 'kalni' ); ?></p>
					<h2 class="fz-32 fw-600 clr-white"><?php esc_html_e( 'Subscribe our Newsletter', 'kalni' ); ?></h2>
				</div>
				<div class="newsletter-form">
					<form action="/" class="newsletter flex align-center relative bg-white br-4">
						<input type="email" name="email" id="email" class="fz-16 fw-400 clr-black" placeholder="Enter your email address">
						<input type="submit" class="fz-14 fw-500 clr-white bg-blue absolute" value="Subscriber">
					</form>
				</div>
				<div class="newsletter-img">
					<img src="/wp-content/uploads/2024/03/newsletter.png" width="186" alt="">
				</div>
			</div>
		</div>
	</div>

	<footer id="colophon" class="site-footer">
		<div class="footer-top bg-white">
			<div class="container-85">
				<div class="widget-area grid grid-1-2 g-gap-80">
					<div class="widget-area-1">
						<?php if(is_active_sidebar( 'footer-1' )) : ?>
							<?php dynamic_sidebar( 'footer-1' ); ?>
						<?php endif; ?>
						<div class="socials flex align-center f-gap-10">
							<?php if ( $theme_settings['facebook_link'] ) : ?>
								<a href="<?php echo esc_url($theme_settings['facebook_link']); ?>">
									<i class="fa-brands fa-facebook-f"></i>
								</a>
							<?php endif; if ( $theme_settings['x_link'] ) : ?>
								<a href="<?php echo esc_url($theme_settings['x_link']); ?>">
									<i class="fa-brands fa-x-twitter"></i>
								</a>
							<?php endif; if ( $theme_settings['linkedin_link'] ) : ?>
								<a href="<?php echo esc_url($theme_settings['linkedin_link']); ?>">
									<i class="fa-brands fa-linkedin-in"></i>
								</a>
							<?php endif; if ( $theme_settings['insta_link'] ) : ?>
								<a href="<?php echo esc_url($theme_settings['insta_link']); ?>">
									<i class="fa-brands fa-instagram"></i>
								</a>
							<?php endif; if ( $theme_settings['youtube_link'] ) : ?>
								<a href="<?php echo esc_url($theme_settings['youtube_link']); ?>">
									<i class="fa-brands fa-youtube"></i>
								</a>
							<?php endif; if ( $theme_settings['pinterest_link'] ) : ?>
								<a href="<?php echo esc_url($theme_settings['pinterest_link']); ?>">
									<i class="fa-brands fa-pinterest"></i>
								</a>
							<?php endif; ?>
						</div>
					</div>
					<div class="widget-area-2 grid grid-3">
						<?php if(is_active_sidebar( 'footer-2' )) : ?>
							<div class="widget-2">
								<?php dynamic_sidebar( 'footer-2' ); ?>
							</div>
						<?php endif; ?>
						<?php if(is_active_sidebar( 'footer-3' )) : ?>
							<div class="widget-3">
								<?php dynamic_sidebar( 'footer-3' ); ?>
							</div>
						<?php endif; ?>
						<?php if (! $theme_settings['hide_footer_contact'] ) : ?>
							<div class="widget-4 footer-flex">
								<?php if ( $theme_settings['footer_contact_heading'] ) : ?>
									<h3 class="fw-600 fz-24 clr-black"><?php echo esc_html($theme_settings['footer_contact_heading']); ?></h3>
								<?php endif; if ( $theme_settings['footer_contact_heading_sub'] ) : ?>
									<p class="fw-500 fz-16 lh-16">
										<?php echo esc_html($theme_settings['footer_contact_heading_sub']); ?>
									</p>
								<?php endif; if ( $theme_settings['footer_phone'] ) : ?>
									<a href="<?php echo esc_url($theme_settings['footer_phone_link']); ?>" class="flex f-gap-10 align-centet fw-500 fz-16 lh-16">
										<i class="fa-solid fa-phone"></i>
										<?php echo esc_html($theme_settings['footer_phone']); ?>
									</a>
								<?php endif; if ( $theme_settings['footer_email'] ) : ?>
									<a href="<?php echo esc_url($theme_settings['footer_email_link']); ?>" class="flex f-gap-10 align-centet fw-500 fz-16 lh-16">
										<i class="fa-solid fa-envelope"></i>
										<?php echo esc_html($theme_settings['footer_email']); ?>
									</a>
								<?php endif; if ( $theme_settings['footer_address'] ) : ?>
									<p class="footer-address flex f-gap-10 fw-500 fz-16 lh-16">
										<i class="fa-solid fa-location-dot"></i>
										<span class="lh-32"><?php echo wp_kses_post( $theme_settings['footer_address'] ); ?></span>
									</p>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php if (! $theme_settings['hide_footer_bottom'] ) : ?>
			<div class="footer-bottom container-85">
				<div class="flex justify-between align-center">
					<?php if ( $theme_settings['copyright'] ) : ?>
						<div class="copyright fw-400 fz-16 clr-black lh-26">
							<?php echo wp_kses_post( $theme_settings['copyright'] ); ?>
						</div>
					<?php endif; if (! $theme_settings['hide_cards'] ) : ?>
						<div class="payment-cards flex align-center f-gap-10">
							<?php if( $theme_settings['footer_card1'] ) : ?>
								<img src="<?php echo esc_url($theme_settings['footer_card1']); ?>" width="34" alt="">
							<?php endif; if( $theme_settings['footer_card2'] ) : ?>
								<img src="<?php echo esc_url($theme_settings['footer_card2']); ?>" width="34" alt="">
							<?php endif; if( $theme_settings['footer_card3'] ) : ?>
								<img src="<?php echo esc_url($theme_settings['footer_card3']); ?>" width="34" alt="">
							<?php endif; if( $theme_settings['footer_card4'] ) : ?>
								<img src="<?php echo esc_url($theme_settings['footer_card4']); ?>" width="34" alt="">
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
