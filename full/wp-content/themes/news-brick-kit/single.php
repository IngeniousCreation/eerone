<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package News Brick Kit
 */

get_header();
?>	
	<div class="theme-container">
		<div class="nekit-container">
			<div class="row">
				<header class="entry-header">
					<?php if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta">
							<?php
								/* Categories */
								news_brick_kit_get_post_categories( get_the_ID() );
							?>
						</div><!-- .entry-meta -->
					<?php endif; 
						if ( is_singular() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;
					?>
				</header><!-- .entry-header -->
				<div class="content-wrapper">
					<main id="primary" class="site-main">
						<div class="primary-content">
							<div class="nekit-single-wrap">
								<?php
									while ( have_posts() ) :
										the_post();

										get_template_part( 'template-parts/content', 'single' );

										the_post_navigation(
											array(
												'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous Post:', 'news-brick-kit' ) . '</span> <span class="nav-title">%title</span>',
												'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next Post:', 'news-brick-kit' ) . '</span> <span class="nav-title">%title</span>',
											)
										);

										?>
											<div class="post-card author-wrap">
												<div class="bmm-author-thumb-wrap">
													<?php
														$figureClass = 'post-thumb';
														echo '<figure class="'. esc_attr( $figureClass ) .'">'. get_avatar( get_the_author_meta( 'ID' ) ) .'</figure>';
													?>
													<div class="author-elements">
														<?php
															echo '<h2 class="author-name"><a href="'. esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) .'">'. get_the_author() .'</a></h2>';
															if( ! empty( get_the_author_meta( 'description' ) ) ) echo '<div class="author-desc">'. get_the_author_meta( 'description' ) .'</div>';
														?>
													</div>
												</div>
											</div>
										<?php

										// If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;

									endwhile; // End of the loop.
								?>
							</div>
						</div>
					</main><!-- #main -->
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>
	<?php
get_footer();