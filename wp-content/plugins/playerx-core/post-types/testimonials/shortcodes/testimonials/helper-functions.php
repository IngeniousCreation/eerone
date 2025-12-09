<?php
if ( ! function_exists( 'playerx_core_add_testimonials_shortcode' ) ) {
	function playerx_core_add_testimonials_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'PlayerxCore\CPT\Shortcodes\Testimonials\Testimonials'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'playerx_core_filter_add_vc_shortcode', 'playerx_core_add_testimonials_shortcode' );
}

if ( ! function_exists( 'playerx_core_set_testimonials_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for testimonials shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function playerx_core_set_testimonials_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-testimonials';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'playerx_core_filter_add_vc_shortcodes_custom_icon_class', 'playerx_core_set_testimonials_icon_class_name_for_vc_shortcodes' );
}

// Load testimonials elementor widgets
if ( ! function_exists( 'playerx_core_include_testimonials_elementor_widgets_files' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function playerx_core_include_testimonials_elementor_widgets_files() {
		if ( playerx_core_theme_installed() && playerx_edge_is_plugin_installed('elementor') && playerx_core_is_theme_registered() ) {
			foreach (glob(PLAYERX_CORE_CPT_PATH . '/testimonials/shortcodes/*/elementor-*.php') as $shortcode_load) {
				include_once $shortcode_load;
			}
		}
	}

	add_action( 'elementor/widgets/widgets_registered', 'playerx_core_include_testimonials_elementor_widgets_files' );
}
