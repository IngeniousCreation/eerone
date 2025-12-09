<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package News Brick Kit
 */
?>
	<div class="elementor-section elementor-section-boxed theme-container">
		<footer id="colophon" class="site-footer">
			<div class="nekit-container">
				<div class ="footer-container">
					<div class="row">
						<div class="theme-footer-wrap">
							<?php
								if( get_custom_logo() ) :
									the_custom_logo();
								else:
									if ( is_front_page() && is_home() ) :
										echo '<h1 class="site-title"><a href="', esc_url( home_url( '/' ) ), ' rel="home">', bloginfo( 'name' ), '</a></h1>';
									else :
										echo '<p class="site-title"><a href="', esc_url( home_url( '/' ) ), '" rel="home">', bloginfo( 'name' ), '</a></p>';
									endif;
								endif;

								wp_nav_menu(
									array(
										'theme_location' => 'menu-2'
									)
								);
							?>
						</div>
						<div class="site-info">
								<?php
								/* translators: %s: CMS name, i.e. WordPress. */
								printf( esc_html__( 'Proudly powered by %s', 'news-brick-kit' ), 'WordPress' );
								?>
							<span class="sep"> | </span>
								<?php
								/* translators: 1: Theme name, 2: Theme author. */
								printf( esc_html__( 'Theme : %1$s by %2$s', 'news-brick-kit' ), ' News Brick Kit', '<a href="https://blazethemes.com/">BlazeThemes</a>' );
								?>
						</div><!-- .site-info -->
					</div>
				</div>
			</div>
		</footer><!-- #colophon -->
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>