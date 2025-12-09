<?php
/**
 * Default theme options.
 *
 * @package Mavix Marketing
 */

if ( ! function_exists( 'mavix_marketing_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function mavix_marketing_get_default_theme_options() {

	$mavix_marketing_defaults = array();

	// Contact Details
	$mavix_marketing_defaults['mavix_marketing_show_contact_details'] 		= true;
	$mavix_marketing_defaults['mavix_marketing_address_one']				= esc_html__('214 West Arnold St','mavix-marketing');
	$mavix_marketing_defaults['mavix_marketing_address_two']				= esc_html__('New York, NY 10002','mavix-marketing');
	$mavix_marketing_defaults['mavix_marketing_phone_number']				= esc_html__('(007) 123 456 7890','mavix-marketing');
	$mavix_marketing_defaults['mavix_marketing_opening_time']				= esc_html__('Mon-Fri 10:00am-7:30pm','mavix-marketing');
	$mavix_marketing_defaults['mavix_marketing_email_id']					= esc_html__('info@example.com','mavix-marketing');
	$mavix_marketing_defaults['mavix_marketing_support_text']				= esc_html__('24 X 7 online support','mavix-marketing');

	// Menu
	$mavix_marketing_defaults['mavix_marketing_show_menu_button'] 			= true;
	$mavix_marketing_defaults['mavix_marketing_menu_button_text']			= esc_html__('Get Started','mavix-marketing');
	$mavix_marketing_defaults['mavix_marketing_menu_button_url']			= esc_url('#','mavix-marketing');

	//General Section
	$mavix_marketing_defaults['readmore_text']					= esc_html__('Read More','mavix-marketing');
	$mavix_marketing_defaults['your_latest_posts_title']			= esc_html__('Blog','mavix-marketing');
	$mavix_marketing_defaults['excerpt_length']					= 10;
	$mavix_marketing_defaults['layout_options_blog']				= 'no-sidebar';
	$mavix_marketing_defaults['layout_options_archive']			= 'no-sidebar';
	$mavix_marketing_defaults['layout_options_page']				= 'no-sidebar';	
	$mavix_marketing_defaults['layout_options_single']			= 'right-sidebar';	

	//Footer section 		
	$mavix_marketing_defaults['copyright_text']					= esc_html__( 'Copyright &copy; All rights reserved.', 'mavix-marketing' );

	// Pass through filter.
	$mavix_marketing_defaults = apply_filters( 'mavix_marketing_filter_default_theme_options', $mavix_marketing_defaults );
	return $mavix_marketing_defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'mavix_marketing_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function mavix_marketing_get_option( $key ) {

		$mavix_marketing_default_options = mavix_marketing_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$mavix_marketing_theme_options = (array)get_theme_mod( 'theme_options' );
		$mavix_marketing_theme_options = wp_parse_args( $mavix_marketing_theme_options, $mavix_marketing_default_options );

		$value = null;

		if ( isset( $mavix_marketing_theme_options[ $key ] ) ) {
			$value = $mavix_marketing_theme_options[ $key ];
		}

		return $value;

	}

endif;