<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Kalni
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="container-85">
			<section class="error-404 not-found">
				<header class="page-header grid error-page-header bg-white">
					<!-- <h1 class="page-title"><?php //esc_html_e( 'Oops! That page can&rsquo;t be found.', 'kalni' ); ?></h1> -->
					<img src="/wp-content/uploads/2024/03/404.png" alt="404">
					<p class="fz-20 fw-700 lh-24 clr-black-dark"><?php esc_html_e( 'The page you are looking for it’s not here...', 'kalni' ); ?></p>

					<a href="/" class="button fz-14 fw-700 tt-capitalize lh-42 clr-white bg-blue br-3"><?php esc_html_e( 'Back to home', 'kalni' ); ?></a>
				</header><!-- .page-header -->

				<div class="page-content">
					

				<?php echo do_shortcode( '[product_card_slider count="4"]' ); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div>
	</main><!-- #main -->

<?php
get_footer();
