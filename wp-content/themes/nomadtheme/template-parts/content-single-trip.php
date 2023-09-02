<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NomadTheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
		?>
	</header><!-- .entry-header -->

	<?php nomadtheme_post_thumbnail(); ?>
	<div class="about-trip">
		<div class="country"><i class="fas fa-globe-americas"></i> <?php echo carbon_get_post_meta( get_the_ID(), 'crb_country' ); ?></div>
		<div class="time"><i class="far fa-clock"></i> <?php echo carbon_get_post_meta( get_the_ID(), 'crb_date' ); ?></div>
	</div>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'nomadtheme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="container-type">
			<div class="head-type">Тип путешествия</div>
			<div class="content_type"><?php echo get_the_term_list(get_the_ID(), 'trip_type'); ?></div>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
