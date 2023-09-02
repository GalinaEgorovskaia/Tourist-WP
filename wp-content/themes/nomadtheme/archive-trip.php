<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NomadTheme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
				<form id = "filter" action="#">
					<?php

					if($terms = get_terms( array('taxonomy' => 'trip_type', 'orderby' => 'name', 'hide_empty' => false))):
						echo '<select name="categoryfilter"><option value="">Тип путешествия</option>';
						foreach ( $terms as $term) :
							echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
						endforeach;
						echo '</select>';
					endif;

					?>
					<input type="hidden" name="action" value="tripfilter">
				</form>
			</header><!-- .page-header -->
			<div class="container-trips">

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
			echo '</div>';

			if ( $wp_query->max_num_pages > 1) :
				echo '<div id="loadmore">Загрузить еще</div>';
			endif;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
