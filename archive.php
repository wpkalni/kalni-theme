<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kalni
 */

get_header();
	$mainGridItem = '';
	$postGridItem = '';

	if ( !wp_is_mobile() ) :
		$mainGridItem = 'grid-1-3 ';
		$postGridItem = 'grid-3 ';
	else:
		$mainGridItem = 'grid-1 ';
		$postGridItem = 'grid-1 ';
	endif;
	?>

	<main id="primary" class="site-main">
		<div class="container-85">
			<div class="kalni-blog archive-content grid <?php echo esc_attr($mainGridItem); ?>g-gap-50">
				<div class="blog-page-sidebar">
					<?php get_sidebar(); ?>
				</div>
				<div class="blog-page-content">
					<?php if ( have_posts() ) : ?>
						<header class="page-header archive-header">
							<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
							?>
						</header><!-- .page-header -->
						<div class="blog-post-content grid <?php echo esc_attr($postGridItem); ?>g-gap-32">
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', get_post_type() );
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
