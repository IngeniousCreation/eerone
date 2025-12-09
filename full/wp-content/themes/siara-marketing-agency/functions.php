<?php
/**
 * Siaramarketingagency functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Siaramarketingagency
 */

/**
 * Enqueue parent and child theme stylesheets
 */
function siaramarketingagency_enqueue_styles() {
    // Enqueue parent theme stylesheet
    wp_enqueue_style( 'siara-corporate-business-style', get_template_directory_uri() . '/style.css' );
    
    // Enqueue child theme stylesheet
    wp_enqueue_style( 'siara-marketing-agency-style', get_stylesheet_directory_uri() . '/style.css', array( 'siara-corporate-business-style' ), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'siaramarketingagency_enqueue_styles' );

if ( ! function_exists( 'siaracorporatebusiness_add_new_read_more_styles' ) ) :
	function siaracorporatebusiness_add_new_read_more_styles( $styles ) {
		return array_merge(
			$styles,
			array(
				'style_4' => __( 'Style 4', 'siara-marketing-agency' ),
			)
		);
	}
endif;
add_filter( 'siaracorporatebusiness_read_more_styles', 'siaracorporatebusiness_add_new_read_more_styles' );

$fresh_site_activate = get_option( 'siaramarketingagency_site_activate' );
if ( (bool) $fresh_site_activate === false ) {

    $options = array(
        'accent_color'                               => '#c69d6d',

    );

    foreach ( $options as $key => $value ) {
        set_theme_mod( $key, $value );
    }

	update_option( 'siaramarketingagency_site_activate', true );
}



/**
 * Child theme: make "Header Style 3" the default (without locking it).
 * - Sets it once in DB so you see it immediately.
 * - Keeps Customizer + front-end default as Style 3 if unset.
 */

/* 1) Front-end fallback: use Style 3 when no value is saved */
add_filter( 'theme_mod_header_style', function( $value ) {
	if ( empty( $value ) ) {
		return 'header_style_3';
	}
	return $value; // respect saved choice
} );

/* 2) Customizer UI default: preselect Style 3 */
add_action( 'customize_register', function( $wp_customize ) {
	$setting = $wp_customize->get_setting( 'header_style' );
	if ( $setting ) {
		$setting->default = 'header_style_3';
	}
}, 99 );

/* 3) One-time seed: set Style 3 now (does NOT keep forcing it) */
add_action( 'init', function() {
	$flag = 'child_seed_header_style3_done';
	if ( ! get_option( $flag ) ) {
		set_theme_mod( 'header_style', 'header_style_3' ); // write once
		update_option( $flag, 1 );
	}
} );


/**
 * Child theme: Add Services Heading Text setting
 */
function siaramarketingagency_customize_register( $wp_customize ) {


	// slider subtitle text
	$wp_customize->add_setting(
		'slider_subtitle_text',
		array(
			'default'           => __( 'Take Your Business', 'siara-marketing-agency' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'slider_subtitle_text',
		array(
			'label'           => __( 'Sub Title Text', 'siara-marketing-agency' ),
			'section'         => 'home_slider_options',
			'type'            => 'text',
			'active_callback' => 'siaracorporatebusiness_is_slider_posts_enabled',
			'priority'        => 11,
		)
	);

	// slider heading text
	$wp_customize->add_setting(
		'slider_heading_text',
		array(
			'default'           => __( 'You Memorable', 'siara-marketing-agency' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'slider_heading_text',
		array(
			'label'           => __( 'Heading Text', 'siara-marketing-agency' ),
			'section'         => 'home_slider_options',
			'type'            => 'text',
			'active_callback' => 'siaracorporatebusiness_is_slider_posts_enabled',
			'priority'        => 11,
		)
	);

	// aboutus box1 heading
	$wp_customize->add_setting(
		'aboutus_box1_heading',
		array(
			'default'           => __( 'Property Acquisition', 'siara-marketing-agency' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'aboutus_box1_heading',
		array(
			'label'           => __( 'Box 1 Heading', 'siara-marketing-agency' ),
			'section'         => 'home_aboutus_options',
			'type'            => 'text',
			'active_callback' => 'siaracorporatebusiness_is_slider_posts_enabled',
			'priority'        => 16,
		)
	);

	// aboutus box1 description
	$wp_customize->add_setting(
		'aboutus_box1_description',
		array(
			'default'           => __( 'There are many variations of passages of Lorem Ipsum', 'siara-marketing-agency' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'aboutus_box1_description',
		array(
			'label'           => __( 'Box 1 Description', 'siara-marketing-agency' ),
			'section'         => 'home_aboutus_options',
			'type'            => 'text',
			'active_callback' => 'siaracorporatebusiness_is_slider_posts_enabled',
			'priority'        => 16,
		)
	);

	// aboutus box2 heading
	$wp_customize->add_setting(
		'aboutus_box2_heading',
		array(
			'default'           => __( 'Market Analysis', 'siara-marketing-agency' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'aboutus_box2_heading',
		array(
			'label'           => __( 'Box 2 Heading', 'siara-marketing-agency' ),
			'section'         => 'home_aboutus_options',
			'type'            => 'text',
			'active_callback' => 'siaracorporatebusiness_is_slider_posts_enabled',
			'priority'        => 16,
		)
	);

	// aboutus box2 description
	$wp_customize->add_setting(
		'aboutus_box2_description',
		array(
			'default'           => __( 'There are many variations of passages of Lorem Ipsu', 'siara-marketing-agency' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'aboutus_box2_description',
		array(
			'label'           => __( 'Box 2 Description', 'siara-marketing-agency' ),
			'section'         => 'home_aboutus_options',
			'type'            => 'text',
			'active_callback' => 'siaracorporatebusiness_is_slider_posts_enabled',
			'priority'        => 16,
		)
	);
	
	// Services heading.
	$wp_customize->add_setting(
		'services_heading',
		array(
			'default'           => __( 'Experts In Business, Promote', 'siara-marketing-agency' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'services_heading',
		array(
			'label'           => __( 'Services Heading', 'siara-marketing-agency' ),
			'section'         => 'home_services_options',
			'type'            => 'text',
			'active_callback' => 'siaracorporatebusiness_is_services_posts_enabled',
			'priority'        => 11,
		)
	);


}
add_action( 'customize_register', 'siaramarketingagency_customize_register', 20 );


function siaramarketingagency_theme_setup() {
    // Let WordPress manage document title
    add_theme_support( 'title-tag' );

	// Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

}
add_action( 'after_setup_theme', 'siaramarketingagency_theme_setup' );


function siaramarketingagency_child_enqueue_scripts() {


    //  Load custom swiper script (depends on swiper-js)
    wp_enqueue_script(
        'custom-swiper',
        get_template_directory_uri() . '/assets/custom/js/custom-swiper-script.js',
        array('swiper-js'), // ✅ ensures swiper loads first
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'siaramarketingagency_child_enqueue_scripts' );



/**
 * Remove unwanted Customizer settings/controls in child theme
 */

function siaramarketingagency_child_customize_remove( $wp_customize ) {

    // ✅ Remove a whole section
    // $wp_customize->remove_section( 'section_id_here' );

    // ✅ Remove a specific setting (optional, usually removing control is enough)
    // $wp_customize->remove_setting( 'services_heading_text' );

	$wp_customize->remove_section( 'global_buttons_options' );


    // ✅ Remove specific controls by ID
    //$wp_customize->remove_control( 'header_topbar_joinwithus_text' );
    //$wp_customize->remove_control( 'header_topbar_joinwithus_link' );

	// About us
	$wp_customize->remove_control( 'aboutus_reviewnum' );
	$wp_customize->remove_control( 'aboutus_reviewnumtext' );
	$wp_customize->remove_control( 'aboutus_growthnum' );
	$wp_customize->remove_control( 'aboutus_growthtext' );


    // Example: remove service pages selectors
    // $wp_customize->remove_control( 'services_page1' );
    // $wp_customize->remove_control( 'services_page2' );

}
add_action( 'customize_register', 'siaramarketingagency_child_customize_remove', 20 );


/**
 * Add inline JavaScript for search toggle
 */
function siaramarketingagency_inline_scripts() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchToggle = document.getElementById('searchToggle');
        const searchForm = document.getElementById('searchForm');
        
        if (searchToggle && searchForm) {
            searchToggle.addEventListener('click', function(e) {
                e.preventDefault();
                searchForm.classList.toggle('active');
                
                // Focus on search input when opened
                if (searchForm.classList.contains('active')) {
                    const searchInput = searchForm.querySelector('input[type="search"]');
                    if (searchInput) {
                        setTimeout(() => searchInput.focus(), 100);
                    }
                }
            });
            
            // Close search form when clicking outside
            document.addEventListener('click', function(e) {
                if (!searchToggle.contains(e.target) && !searchForm.contains(e.target)) {
                    searchForm.classList.remove('active');
                }
            });
            
            // Close search form on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && searchForm.classList.contains('active')) {
                    searchForm.classList.remove('active');
                }
            });
        }
    });
    </script>
    <?php
}
add_action( 'wp_footer', 'siaramarketingagency_inline_scripts' );
