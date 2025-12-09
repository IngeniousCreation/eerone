<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package News Brick Kit
 */

get_header();
	?>
		<div class="theme-container">
			<div class="nekit-container">
				<div class="row">
					<main id="primary" class="site-main">
						<div class="primary-content">
							<div class="nekit-news-list-wrap">
								<?php
									if ( have_posts() ) :
								?>
										<header class="page-header">
											<?php
											the_archive_title( '<h1 class="page-title">', '</h1>' );
											the_archive_description( '<div class="archive-description">', '</div>' );
											?>
										</header><!-- .page-header -->
										<div class="nekit-news-list-box-wrap">
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

									else :

										get_template_part( 'template-parts/content', 'none' );

									endif;
								?>
									<?php
										the_posts_navigation();
									?>
								</div>	
							</div>
							<div class="secondary-sidebar"><?php get_sidebar(); ?></div>
						</div>
					</main><!-- #main -->
				</div>
			</div>
		</div>
	<?php
	get_sidebar();
get_footer();
