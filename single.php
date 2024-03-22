<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Kalni
 */

get_header();

if (have_posts()):
	$mainGridItem = '';
	$postGridItem = '';

	if (!wp_is_mobile()):
		$mainGridItem = 'grid-1-3 ';
	else:
		$mainGridItem = 'grid-1 ';
	endif;
	?>
		<div class="container-85">
			<div class="woo-breadcrumb-area flex justify-between aling-center">
			<div class="wp-breadcrumb"><?php //echo get_breadcrumb(); ?></div>
				<?php echo kalni_prev_next_post(); ?>
			</div>
		</div>
		<main id="primary" class="site-main">
			<div class="container-85">
				<div class="kalni-blog-single grid <?php echo esc_attr($mainGridItem); ?>g-gap-50">
					<div class="blog-page-sidebar">
						<?php get_sidebar(); ?>
					</div>
					<div class="blog-single-content bg-white br-3 overflow-hidden">
						<?php
						while (have_posts()):
							the_post();

							get_template_part('template-parts/content', get_post_type());

							the_post_navigation(
								array(
									'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'kalni') . '</span> <span class="nav-title">%title</span>',
									'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'kalni') . '</span> <span class="nav-title">%title</span>',
								)
							);

							?>

							<?php $author_link = get_author_posts_url(get_the_author_meta('ID')); ?>
							<?php if ($author_link): ?>
								<div class="author-box grid g-gap-20 align-center">
									<div class="author-avatar">
										<a href="<?php echo esc_url($author_link); ?>" target="_blank">
											<?php echo get_avatar(get_the_author_meta('ID'), 100); ?>
										</a>
									</div>
									<div class="author-content">
										<h5 class="fz-18 lh-22 fw-700 clr-black"><?php esc_html_e('Share this post:', 'kalni'); ?></h5>
										<?php echo wpautop(get_the_author_meta('description')); ?>
										<a class="author-posts fz-14 fw-600 lh-24 clr-blue flex align-center f-gap-5" href="<?php echo esc_url($author_link); ?>"><?php esc_html_e('See all author posts ', 'kalni'); ?><i class="fa-solid fa-arrow-right-long"></i></a>
									</div>
								</div> <!-- end author-box -->
							<?php endif; ?>

							<?php

							// If comments are open or we have at least one comment, load up the comment template.
							if (comments_open() || get_comments_number()):
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
					</div>
				</div>
			</main><!-- #main -->
		<?php
endif;
get_footer();
