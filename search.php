<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Kalni
 */

get_header();	
$mainGridItem = '';
$postGridItem = '';

if (!wp_is_mobile()):
	$mainGridItem = 'grid-1-3 ';
	$postGridItem = 'grid-3 ';
else:
	$mainGridItem = 'grid-1 ';
	$postGridItem = 'grid-1 ';
endif;
?>

	<main id="primary" class="site-main">

		<div class="container-85">
			<div class="kalni-blog search-content grid <?php echo esc_attr($mainGridItem); ?>g-gap-50">
				<div class="blog-page-sidebar">
					<?php get_sidebar(); ?>
				</div>
				<div class="blog-page-content">
					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<h1 class="page-title">
								<?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for: %s', 'kalni' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h1>
						</header><!-- .page-header -->

						<div class="blog-post-content grid <?php echo esc_attr($postGridItem); ?>g-gap-32">
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

							endwhile;
							?>
						</div>
						<?php

						kalni_numeric_posts_nav();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
