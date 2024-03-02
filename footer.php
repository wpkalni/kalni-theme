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

?>
	<div class="newsletter-wrap bg-blue">
		<div class="container-85">
			<div class="grid grid-2-2-1 align-center g-gap-30">
				<div class="newsletter-left-content">
					<p class="fz-16 fw-500 lh-24 clr-white">SALE 20% OFF ALL STORE</p>
					<h2 class="fz-32 fw-600 clr-white">Subscribe our Newsletter</h2>
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
						<div class="widget-4">
							<h3 class="fw-600 fz-24 clr-black">Talk To Us</h3>
							<p class="fw-500 fz-16 lh-16">Got Questions? Call us</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom container-85">
			<div class="flex justify-between align-center">
				<div class="copyright fw-400 fz-16 clr-black lh-26">© 2024 All Rights Reserved </div>
				<div class="payment-cards flex align-center f-gap-10">
					<img src="/wp-content/uploads/2024/03/visa.png" width="34" alt="">
					<img src="/wp-content/uploads/2024/03/pay.png" width="34" alt="">
					<img src="/wp-content/uploads/2024/03/gpay.png" width="34" alt="">
					<img src="/wp-content/uploads/2024/03/mastercard.png" width="34" alt="">
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
