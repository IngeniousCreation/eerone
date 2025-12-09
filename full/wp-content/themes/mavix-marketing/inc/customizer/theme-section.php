<?php
/**
 * Theme Options.
 *
 * @package Mavix Marketing
 */

$mavix_marketing_default = mavix_marketing_get_default_theme_options();

//For General Option
$wp_customize->add_section('section_general', array(    
'title'       => __('Sidebar Layout Options', 'mavix-marketing'),
));

//Layout Options for Blog
$wp_customize->add_setting('theme_options[layout_options_blog]', 
	array(
	'default' 			=> $mavix_marketing_default['layout_options_blog'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'mavix_marketing_sanitize_select'
	)
);

$wp_customize->add_control(new mavix_marketing_Image_Radio_Control($wp_customize, 'theme_options[layout_options_blog]', 
	array(		
	'label' 	=> __('Blog Layout', 'mavix-marketing'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[layout_options_blog]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/left-sidebar.png',						
		'right-sidebar' => esc_url(get_template_directory_uri()) . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/no-sidebar.png',
		),	
	))
);

//Layout Options for Archive
$wp_customize->add_setting('theme_options[layout_options_archive]', 
	array(
	'default' 			=> $mavix_marketing_default['layout_options_archive'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'mavix_marketing_sanitize_select'
	)
);

$wp_customize->add_control(new mavix_marketing_Image_Radio_Control($wp_customize, 'theme_options[layout_options_archive]', 
	array(		
	'label' 	=> __('Archive Layout', 'mavix-marketing'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[layout_options_archive]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/left-sidebar.png',						
		'right-sidebar' => esc_url(get_template_directory_uri()) . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/no-sidebar.png',
		),	
	))
);


//Layout Options for Pages
$wp_customize->add_setting('theme_options[layout_options_page]', 
	array(
	'default' 			=> $mavix_marketing_default['layout_options_page'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'mavix_marketing_sanitize_select'
	)
);

$wp_customize->add_control(new mavix_marketing_Image_Radio_Control($wp_customize, 'theme_options[layout_options_page]', 
	array(		
	'label' 	=> __('Page Layout', 'mavix-marketing'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[layout_options_page]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/left-sidebar.png',						
		'right-sidebar' => esc_url(get_template_directory_uri()) . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/no-sidebar.png',
		),	
	))
);

//Layout Options for Single Post
$wp_customize->add_setting('theme_options[layout_options_single]', 
	array(
	'default' 			=> $mavix_marketing_default['layout_options_single'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'mavix_marketing_sanitize_select'
	)
);

$wp_customize->add_control(new mavix_marketing_Image_Radio_Control($wp_customize, 'theme_options[layout_options_single]', 
	array(		
	'label' 	=> __('Single Post Layout', 'mavix-marketing'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[layout_options_single]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/left-sidebar.png',						
		'right-sidebar' => esc_url(get_template_directory_uri()) . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/no-sidebar.png',
		),	
	))
);

// Blog Page Options
$wp_customize->add_section('section_blog_options', 
	array(    
	'title'       => __('Blog Page Options', 'mavix-marketing'),
	)
);

$wp_customize->add_setting( 'theme_options[your_latest_posts_title]',
	array(
	'default'           => $mavix_marketing_default['your_latest_posts_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'refresh',
	)
);
$wp_customize->add_control( 'theme_options[your_latest_posts_title]',
	array(
	'label'    => __( 'Blog Page Title', 'mavix-marketing' ),
	'section'  => 'section_blog_options',
	'type'     => 'text',
	)
);

// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[excerpt_length]', array(
	'default'           => $mavix_marketing_default['excerpt_length'],
	'sanitize_callback' => 'mavix_marketing_sanitize_number_range',
) );
$wp_customize->add_control( 'theme_options[excerpt_length]', array(
	'label'       => __( 'Excerpt Length', 'mavix-marketing' ),
	'description' => __( 'in words', 'mavix-marketing' ),
	'section'     => 'section_blog_options',
	'type'        => 'number',
	'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 75px;' ),
) );

// Setting Read More Text.
$wp_customize->add_setting( 'theme_options[readmore_text]',
	array(
	'default'           => $mavix_marketing_default['readmore_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'mavix_marketing_sanitize_textarea_content',
	'transport'         => 'refresh',
	)
);
$wp_customize->add_control( 'theme_options[readmore_text]',
	array(
	'label'    => __( 'Read More Text', 'mavix-marketing' ),
	'section'  => 'section_blog_options',
	'type'     => 'text',
	)
);

// Footer Setting Section starts
$wp_customize->add_section('section_footer', 
	array(    
	'title'       => __('Footer Options', 'mavix-marketing'),
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $mavix_marketing_default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'refresh',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => __( 'Copyright Text', 'mavix-marketing' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);