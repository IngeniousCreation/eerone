<?php

if ( ! function_exists( 'playerx_edge_include_blog_shortcodes' ) ) {
	function playerx_edge_include_blog_shortcodes() {
        if( playerx_core_is_theme_registered() ) {
            foreach ( glob( EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/*/load.php' ) as $shortcode_load ) {
                include_once $shortcode_load;
            }
        }

	}
	
	if ( playerx_edge_core_plugin_installed() ) {
		add_action( 'playerx_core_action_include_shortcodes_file', 'playerx_edge_include_blog_shortcodes' );
	}
}

// Load blog elementor widgets
if ( ! function_exists( 'playerx_edge_include_blog_elementor_widgets_files' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function playerx_edge_include_blog_elementor_widgets_files() {
		if ( playerx_edge_is_plugin_installed('core') && playerx_core_is_theme_registered() ) {
			foreach (glob(EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/*/elementor-*.php') as $shortcode_load) {
				include_once $shortcode_load;
			}
		}
	}
	if ( playerx_edge_is_plugin_installed('elementor') && playerx_edge_is_plugin_installed( 'core' ) ) {
		add_action('elementor/widgets/widgets_registered', 'playerx_edge_include_blog_elementor_widgets_files');
	}
}
