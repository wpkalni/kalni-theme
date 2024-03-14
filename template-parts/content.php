<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kalni
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php kalni_post_thumbnail(); ?>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title fz-24 fw-600 lh-28 clr-black">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title fz-16 fw-500 lh-24 text-center"><a class="clr-black" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta text-center">
				<?php
				kalni_posted_by();
				kalni_posted_on();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content fz-16 fw-400 lh-20 clr-black">
		<?php
		if ( is_single() ) :
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kalni' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
		else : 
			echo '<p class="readmore-wrap"><a href="' . esc_url( get_permalink() ) . '" class="read-more flex justify-center align-center f-gap-5 fz-16 fw-400 lh-24 clr-black">Read more <i class="fa fa-long-arrow-right"></i></a></p>';
		endif;

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kalni' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
	<?php if ( is_single() ) : ?>
		<footer class="entry-footer">
			<?php kalni_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
