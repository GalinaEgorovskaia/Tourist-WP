<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NomadTheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('trip'); ?>>

	<a href="<?php the_permalink(); ?>" class="link-trip">
		<header class="entry-header trip-header">
		<?php
			the_title( '<h2 class="entry-title">', '</h2>' );
		?>
							
		</header>

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div>

		<?php the_post_thumbnail(); ?>
		<footer class="entry-footer trip-footer">
			<div class="country"><i class="fas fa-globe-americas"></i> <?php echo carbon_get_post_meta( get_the_ID(), 'crb_country' ); ?></div>
			<div class="time"><i class="far fa-clock"></i> <?php echo carbon_get_post_meta( get_the_ID(), 'crb_date' ); ?></div>
		</footer>
	</a>
	
</article><!-- #post-<?php the_ID(); ?> -->
