<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package News Brick Kit
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function news_brick_kit_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	} else {
		$classes[] = 'right-sidebar';
	}

	if( isset( $_COOKIE['nekitThemeMode'] ) && $_COOKIE['nekitThemeMode'] == 'dark' ) $classes[] = 'news_brick_kit_dark_mode';
	return $classes;
}
add_filter( 'body_class', 'news_brick_kit_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function news_brick_kit_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'news_brick_kit_pingback_header' );

if( !function_exists( 'news_brick_kit_typo_fonts_url' ) ) :
	/**
	 * Filter and Enqueue typography fonts
	 * 
	 * @package News Elementor Pro
	 * @since 1.0.0
	 */
	function news_brick_kit_typo_fonts_url() {
		$typo1 = "Inter Tight:100,200,300,400,500,600,700,800,900";
		$typo2 = "Roboto Condensed:100,200,300,400,500,600,700,800,900";

		$get_fonts = apply_filters( 'news_brick_kit_get_fonts_toparse', [ $typo1, $typo2 ] );
		$font_weight_array = array();

		foreach ( $get_fonts as $fonts ) {
			$each_font = explode( ':', $fonts );
			if ( ! isset ( $font_weight_array[$each_font[0]] ) ) {
				$font_weight_array[$each_font[0]][] = $each_font[1];
			} else {
				if ( ! in_array( $each_font[1], $font_weight_array[$each_font[0]] ) ) {
					$font_weight_array[$each_font[0]][] = $each_font[1];
				}
			}
		}
		$final_font_array = array();
		foreach ( $font_weight_array as $font => $font_weight ) {
			$each_font_string = $font.':'.implode( ',', $font_weight );
			$final_font_array[] = $each_font_string;
		}

		$final_font_string = implode( '|', $final_font_array );
		$google_fonts_url = '';
		$subsets   = 'cyrillic,cyrillic-ext';
		if ( $final_font_string ) {
			$query_args = array(
				'family' => urlencode( $final_font_string ),
				'subset' => urlencode( $subsets )
			);
			$google_fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}
		return $google_fonts_url;
	}
endif;

if( ! function_exists( 'news_brick_kit_get_post_categories' ) ) :
    /**
     * Function contains post categories html
     * @return float
     */
    function news_brick_kit_get_post_categories( $post_id, $number = 1, $args = [] ) {
    	$n_categories = wp_get_post_categories( $post_id, [ 'number' => absint( $number ) ] );
		if( empty( $n_categories ) && ! is_array( $n_categories ) ) return;
		?>
			<ul class="post-categories">
				<?php
					foreach( $n_categories as $cat ) :
						$liClass = 'cat-item';
						$liClass .= ' cat-' . $cat;
						?>
							<li class="<?php echo esc_attr( $liClass );?>"><a href="<?php echo get_category_link( $cat )?>" rel="category tag"><?php echo esc_html( get_cat_name( $cat ) ); ?></a></li>
						<?php
					endforeach;
				?>
			</ul>
		<?php
    }
endif;