<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NomadTheme
 */

get_header();
?>

	<main id="primary" class="site-main">
		<section class="welcome">
			<div class="block">
				<div class="greeting">
					<h1>Начни свое путешествие</h1>
					<p>Ты ищешь приключений. Мечтаешь о местах, где еще не бывал. Но путешествие надо тщательно
						продумывать.
						Доверь все нам и ты не пожалеешь.</p>
					<a href="#" class="m-button">Начать</a>
				</div>
			</div>

		</section>
		<section class="trips">
			<div class="head-section">
				<h2>Выбери свое путешествие</h2>
				<a href="<?php echo get_post_type_archive_link('trip'); ?>"><i class="fas fa-arrow-right"></i></a>
			</div>
			<div class="container-trips">
				<?php
					$posts = get_posts( array(
						'post_per_page' => 3,
						'post_type' => 'trip'
					));
					foreach($posts as $post) {
						setup_postdata( $post );
				?>
				<a href="<?php the_permalink(); ?>" class="trip">
					<div class="trip-header">
						<h3><?php the_title(); ?></h3>
						<?php the_excerpt(); ?>
					</div>

					<?php the_post_thumbnail(); ?>
					<div class="trip-footer">
						<div class="country"><i class="fas fa-globe-americas"></i> <?php echo carbon_get_post_meta( get_the_ID(), 'crb_country' ); ?></div>
						<div class="time"><i class="far fa-clock"></i> <?php echo carbon_get_post_meta( get_the_ID(), 'crb_date' ); ?></div>
					</div>
				</a>
				<?php }
				wp_reset_postdata(); ?>
			</div>


		</section>
		<section class="about">
				<div class="head-section">
						<h2>О проекте</h2>
						<a href="#"><i class="fas fa-arrow-right"></i></a>
					</div>
			<div class="container-about">
					<div class="about-preview"><img src="<?php echo get_template_directory_uri(); ?> /assets/img/@1x/about.jpg" alt="">
							<p>Мы исследовали самые интересные места нашей планеты. И можем помочь тебе организовать идеальное приключение. Подберем тебе маршут на любой бюджет, расскажем о секретных местах, предоставим всю необходимую информацию. Остальное все сам. Дерзай!</p>
							
						</div>
				<div class="about-card">
					<div class="blank"><img src="<?php echo get_template_directory_uri(); ?> /assets/img/palm.svg" alt="">
						<p>Выбери или создай вместе с нами свое путешествие</p>
					</div>
					<div class="blank"><img src="<?php echo get_template_directory_uri(); ?> /assets/img/surf.svg" alt="">
						<p>Получи всю необходимую информацию и отправляйся</p>
					</div>
					<div class="blank"><img src="<?php echo get_template_directory_uri(); ?> /assets/img/cocos.svg" alt="">
						<p>Наслаждайся и не переживай, мы будем на связи</p>
					</div>
				</div>
			</div>
		</section>
	</main>

<?php
get_footer();
