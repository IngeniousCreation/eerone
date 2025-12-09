<?php
$page_ids = array_filter(array(
	get_theme_mod('slider_page1'),
	get_theme_mod('slider_page2'),
	get_theme_mod('slider_page3'),
	get_theme_mod('slider_page4'),
));

// ✅ Slider settings
$data_banner = array(
	'effect'        => 'fade',
	'fadeEffect'    => array( 'crossFade' => true ),
	'slidesPerView' => 1,
	'centeredSlides'=> true,
	'keyboard'      => array( 'enabled' => true ),
	'spaceBetween'  => 20,
	'pagination'    => array(
		'el'        => '.swiper-pagination',
		'clickable' => true,
	),
	'navigation'    => array(
		'nextEl' => '.swiper-button-next',
		'prevEl' => '.swiper-button-prev',
	),
	'autoplay' => array(
		'delay'                => 9000,
		'disableOnInteraction' => false,
	),
);
?> 

<?php
	$slider_subtitle_text  = get_theme_mod( 'slider_subtitle_text','Take Your Business' );
	$slider_heading_text  = get_theme_mod( 'slider_heading_text','You Memorable' );
?>

<section class="siaracorporatebusiness-section-banner-wrapper boxed as-carousel style_1 em-animate-content">
	<div class="siaracorporatebusiness-section-banner">
		<div class="row g-1">
			<div class="col-lg-12">
				<div class="siaracorporatebusiness-banner-wrapper siaracorporatebusiness-swiper-outer-bullets swiper"
					 data-banner='<?php echo esc_attr( json_encode( $data_banner ) ); ?>'>
					<div class="siaracorporatebusiness-banner swiper-wrapper">

						<?php if ( ! empty( $page_ids ) ) :
							$args = array(
								'post_type'      => 'page',
								'post__in'       => $page_ids,
								'orderby'        => 'post__in',
								'posts_per_page' => count($page_ids),
							);
							$banner_query = new WP_Query( $args );
							if ( $banner_query->have_posts() ) :
								while ( $banner_query->have_posts() ) : $banner_query->the_post(); 
									$featured_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
									$background_style = $featured_image ? "background-image: url('" . esc_url( $featured_image ) . "')" : "";
								?>
									<div class="swiper-slide" style="<?php echo $background_style; ?>">
										<div class="banner-block-wrapper">
											<div class="banner-content-section">
												<div class="banner-content-inner">
													<div class="banner-sub-text">
														<?php echo esc_html( $slider_subtitle_text ); ?>
													</div>
													<h2 class="banner-title">
														<?php the_title(); ?>
													</h2>
													<div class="banner-subtitle">
														<?php echo esc_html( $slider_heading_text ); ?>
													</div>
													<div class="banner-excerpt">
														<p><?php echo wp_trim_words( get_the_excerpt(), 25, '&hellip;' ); ?></p>
													</div>
													<div class="banner-read-more">
														<a href="<?php the_permalink(); ?>" class="banner-cta-button">
															<?php esc_html_e( 'Get Started', 'siara-marketing-agency' ); ?>
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 256 256">
																<path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"/>
															</svg>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endwhile; wp_reset_postdata();
							endif;
						else :
							// Static default slider items
							$default_slides = array(
								array(
									'image' => get_template_directory_uri() . '/assets/images/slider-default1.jpg',
									'sub_text' => 'Take Your Business',
									'title' => 'Marketing That Makes',
									'subtitle' => 'You Memorable',
									'desc'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.',
									'link'  => '#',
								),
								array(
									'image' => get_template_directory_uri() . '/assets/images/slider-default2.jpg',
									'sub_text' => 'Take Your Business',
									'title' => 'Marketing That Makes',
									'subtitle' => 'You Memorable',
									'desc'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.',
									'link'  => '#',
								),
							);

							foreach ( $default_slides as $slide ) : ?>
								<div class="swiper-slide" style="background-image: url('<?php echo esc_url( $slide['image'] ); ?>');">
									<div class="banner-block-wrapper">
										<div class="banner-content-section">
											<div class="banner-content-inner">
												<div class="banner-sub-text">
													<?php echo esc_html( $slide['sub_text'] ); ?>
												</div>
												<h2 class="banner-title">
													<?php echo esc_html( $slide['title'] ); ?>
												</h2>
												<div class="banner-subtitle">
													<?php echo esc_html( $slide['subtitle'] ); ?>
												</div>
												<div class="banner-excerpt">
													<p><?php echo esc_html( $slide['desc'] ); ?></p>
												</div>
												<div class="banner-read-more">
													<a href="<?php echo esc_url( $slide['link'] ); ?>" class="banner-cta-button">
														<?php esc_html_e( 'Get Started', 'siara-marketing-agency' ); ?>
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 256 256">
															<path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"/>
														</svg>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach;
						endif; ?>
					</div>

					<div class="swiper-pagination"></div>
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			</div>
		</div>
	</div>
</section>
