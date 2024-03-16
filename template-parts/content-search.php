<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kalni
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php kalni_post_thumbnail(); ?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title fz-16 fw-500 lh-24 text-center"><a class="clr-black" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			kalni_posted_by();
			kalni_posted_on();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php kalni_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
