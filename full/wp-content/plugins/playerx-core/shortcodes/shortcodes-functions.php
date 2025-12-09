<?php

if ( ! function_exists( 'playerx_core_include_shortcodes_file' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function playerx_core_include_shortcodes_file() {
        if ( playerx_core_theme_installed() && playerx_core_is_theme_registered() ) {
            foreach ( glob( PLAYERX_CORE_SHORTCODES_PATH . '/*/load.php' ) as $shortcode_load ) {
                include_once $shortcode_load;
            }
        }

		
		do_action( 'playerx_core_action_include_shortcodes_file' );
	}
	
	add_action( 'init', 'playerx_core_include_shortcodes_file', 6 ); // permission 6 is set to be before vc_before_init hook that has permission 9
}

if ( ! function_exists( 'playerx_core_load_shortcodes' ) ) {
	function playerx_core_load_shortcodes() {
		include_once PLAYERX_CORE_ABS_PATH . '/lib/shortcode-loader.php';
		
		PlayerxCore\Lib\ShortcodeLoader::getInstance()->load();
	}
	
	add_action( 'init', 'playerx_core_load_shortcodes', 7 ); // permission 7 is set to be before vc_before_init hook that has permission 9 and after playerx_core_include_shortcodes_file hook
}

if ( ! function_exists( 'playerx_core_add_admin_shortcodes_styles' ) ) {
	/**
	 * Function that includes shortcodes core styles for admin
	 */
	function playerx_core_add_admin_shortcodes_styles() {
		
		//include shortcode styles for Visual Composer
		wp_enqueue_style( 'playerx-core-vc-shortcodes', PLAYERX_CORE_ASSETS_URL_PATH . '/css/admin/playerx-vc-shortcodes.css' );
	}
	
	add_action( 'playerx_edge_action_admin_scripts_init', 'playerx_core_add_admin_shortcodes_styles' );
}

if ( ! function_exists( 'playerx_core_add_admin_shortcodes_custom_styles' ) ) {
	/**
	 * Function that print custom vc shortcodes style
	 */
	function playerx_core_add_admin_shortcodes_custom_styles() {
		$style                  = apply_filters( 'playerx_core_filter_add_vc_shortcodes_custom_style', $style = '' );
		$shortcodes_icon_styles = array();
		$shortcode_icon_size    = 32;
		$shortcode_position     = 0;
		
		$shortcodes_icon_class_array = apply_filters( 'playerx_core_filter_add_vc_shortcodes_custom_icon_class', $shortcodes_icon_class_array = array() );
		sort( $shortcodes_icon_class_array );
		
		if ( ! empty( $shortcodes_icon_class_array ) ) {
			foreach ( $shortcodes_icon_class_array as $shortcode_icon_class ) {
				$mark = $shortcode_position != 0 ? '-' : '';
				
				$shortcodes_icon_styles[] = '.vc_element-icon.extended-custom-icon' . esc_attr( $shortcode_icon_class ) . ' {
					background-position: ' . $mark . esc_attr( $shortcode_position * $shortcode_icon_size ) . 'px 0;
				}';
				
				$shortcode_position ++;
			}
		}
		
		if ( ! empty( $shortcodes_icon_styles ) ) {
			$style .= implode( ' ', $shortcodes_icon_styles );
		}
		
		if ( ! empty( $style ) ) {
			wp_add_inline_style( 'playerx-core-vc-shortcodes', $style );
		}
	}
	
	add_action( 'playerx_edge_action_admin_scripts_init', 'playerx_core_add_admin_shortcodes_custom_styles' );
}

if ( ! function_exists( 'playerx_core_load_elementor_shortcodes' ) ) {
	/**
	 * Function that loads elementor files inside shortcodes folder
	 */
	function playerx_core_load_elementor_shortcodes() {
		if ( playerx_core_theme_installed() ) {
			foreach ( glob( PLAYERX_CORE_SHORTCODES_PATH . '/*/elementor-*.php' ) as $shortcode_load ) {
				include_once $shortcode_load;
			}
		}
	}

	add_action( 'elementor/widgets/widgets_registered', 'playerx_core_load_elementor_shortcodes' );
}

if ( ! function_exists( 'playerx_core_add_elementor_widget_categories' ) ) {
	/**
	 * Registers category group
	 */
	function playerx_core_add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'edge',
			[
				'title' => esc_html__( 'Edge', 'playerx-core' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}

	add_action( 'elementor/elements/categories_registered', 'playerx_core_add_elementor_widget_categories' );
}

if( ! function_exists( 'playerx_core_remove_widgets_for_elementor') ) {
	function playerx_core_remove_widgets_for_elementor( $black_list ) {
		$black_list[] = 'PlayerxEdgeClassAuthorInfoWidget';
		$black_list[] = 'PlayerxEdgeClassBlogListWidget';
		$black_list[] = 'PlayerxEdgeClassButtonWidget';
		$black_list[] = 'PlayerxEdgeClassContactForm7Widget';
		$black_list[] = 'PlayerxEdgeClassCustomFontWidget';
		$black_list[] = 'PlayerxEdgeClassImageGalleryWidget';
		$black_list[] = 'PlayerxEdgeClassRecentPosts';
		$black_list[] = 'PlayerxEdgeClassSearchOpener';
		$black_list[] = 'PlayerxEdgeClassSearchPostType';
		$black_list[] = 'PlayerxEdgeClassSeparatorWidget';
		$black_list[] = 'PlayerxEdgeClassSideAreaOpener';
		$black_list[] = 'PlayerxEdgeClassSocialIconWidget';
		$black_list[] = 'PlayerxEdgeClassClassIconsGroupWidget';
		$black_list[] = 'PlayerxEdgeClassStickySidebar';
		$black_list[] = 'PlayerxEdgeClassWoocommerceDropdownCart';

		return $black_list;
	}

	add_filter('elementor/widgets/black_list', 'playerx_core_remove_widgets_for_elementor');
}

if ( ! function_exists( 'playerx_core_return_elementor_templates' ) ) {
	/**
	 * Function that returns all Elementor saved templates
	 */
	function playerx_core_return_elementor_templates() {
		return Elementor\Plugin::instance()->templates_manager->get_source( 'local' )->get_items();
	}
}

if ( ! function_exists( 'playerx_core_generate_elementor_templates_control' ) ) {
	/**
	 * Function that adds Template Elementor Control
	 */
	function playerx_core_generate_elementor_templates_control( $object, $dependency_array = array() , $control_name = 'template_id' ) {
		$templates = playerx_core_return_elementor_templates();

		if ( ! empty( $templates ) ) {
			$options = [
				'0' => '— ' . esc_html__( 'Select', 'playerx-core' ) . ' —',
			];

			$types = [];

			foreach ( $templates as $template ) {
				$options[ $template['template_id'] ] = $template['title'] . ' (' . $template['type'] . ')';
				$types[ $template['template_id'] ]   = $template['type'];
			}

			$control_options_array = [
				'label'       => esc_html__( 'Choose Template', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::SELECT,
				'default'     => '0',
				'options'     => $options,
				'types'       => $types,
				'label_block' => 'true'
			];

			if( is_array( $dependency_array ) && count( $dependency_array ) > 0 ){
				$control_options_array['condition'] = $dependency_array;
			}

			$object->add_control(
				$control_name, $control_options_array
			);

		};
	}
}



//function that maps "Anchor" option for section
if( ! function_exists('playerx_core_map_section_anchor_option') ){
	function playerx_core_map_section_anchor_option( $section, $args ){
		$section->start_controls_section(
			'section_edge_anchor',
			[
				'label' => esc_html__( 'Playerx Anchor', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_ADVANCED,
			]
		);

		$section->add_control(
			'anchor_id',
			[
				'label' => esc_html__( 'Playerx Anchor ID', 'playerx-core' ),
				'type'  => Elementor\Controls_Manager::TEXT,
			]
		);

		$section->end_controls_section();
	}

	add_action('elementor/element/section/_section_responsive/after_section_end', 'playerx_core_map_section_anchor_option', 10, 2);
}

//function that renders "Anchor" option for section
if( ! function_exists('playerx_core_render_section_anchor_option') ) {
	function playerx_core_render_section_anchor_option( $element )   {
		if( 'section' !== $element->get_name() ) {
			return;
		}

		$params = $element->get_settings_for_display();

		if( ! empty( $params['anchor_id'] ) ){
			$element->add_render_attribute( '_wrapper', 'data-edgtf-anchor', $params['anchor_id'] );
		}
	}

	add_action( 'elementor/frontend/section/before_render', 'playerx_core_render_section_anchor_option');
}

//function that maps "Parallax" option for section
if ( ! function_exists( 'playerx_core_map_section_parallax_option' ) ) {
	function playerx_core_map_section_parallax_option( $section, $args ) {
		$section->start_controls_section(
			'section_edge_parallax',
			[
				'label' => esc_html__( 'Playerx Parallax', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_ADVANCED,
			]
		);

		$section->add_control(
			'edge_enable_parallax',
			[
				'label'        => esc_html__( 'Enable Parallax', 'playerx-core' ),
				'type'         => Elementor\Controls_Manager::SELECT,
				'default'      => 'no',
				'options'      => [
					'no'     => esc_html__( 'No', 'playerx-core' ),
					'holder' => esc_html__( 'Yes', 'playerx-core' ),
				],
				'prefix_class' => 'edgtf-parallax-row-'
			]
		);

		$section->add_control(
			'edge_parallax_image',
			[
				'label'              => esc_html__( 'Parallax Image', 'playerx-core' ),
				'type'               => Elementor\Controls_Manager::MEDIA,
				'condition'          => [
					'edge_enable_parallax' => 'holder'
				],
				'frontend_available' => true,
			]
		);

		$section->add_control(
			'edge_parallax_speed',
			[
				'label'     => esc_html__( 'Parallax Speed', 'playerx-core' ),
				'type'      => Elementor\Controls_Manager::TEXT,
				'condition' => [
					'edge_enable_parallax' => 'holder'
				],
				'default'   => '0'
			]
		);

		$section->add_control(
			'edge_parallax_height',
			[
				'label'     => esc_html__( 'Parallax Section Height (px)', 'playerx-core' ),
				'type'      => Elementor\Controls_Manager::TEXT,
				'condition' => [
					'edge_enable_parallax' => 'holder'
				],
				'default'   => '0'
			]
		);

		$section->end_controls_section();
	}

	add_action( 'elementor/element/section/_section_responsive/after_section_end', 'playerx_core_map_section_parallax_option', 10, 2 );
}

//frontend function for "Parallax"
if ( ! function_exists( 'playerx_core_render_section_parallax_option' ) ) {
	function playerx_core_render_section_parallax_option( $element ) {
		if ( 'section' !== $element->get_name() ) {
			return;
		}

		$params = $element->get_settings_for_display();

		if ( ! empty( $params['edge_parallax_image']['id'] ) ) {
			$parallax_image_src = $params['edge_parallax_image']['url'];
			$parallax_speed     = ! empty( $params['edge_parallax_speed'] ) ? $params['edge_parallax_speed'] : '1';
			$parallax_height    = ! empty( $params['edge_parallax_height'] ) ? $params['edge_parallax_height'] : 0;

			$element->add_render_attribute( '_wrapper', 'class', 'edgtf-parallax-row-holder' );
			$element->add_render_attribute( '_wrapper', 'data-parallax-bg-speed', $parallax_speed );
			$element->add_render_attribute( '_wrapper', 'data-parallax-bg-image', $parallax_image_src );
			$element->add_render_attribute( '_wrapper', 'data-parallax-bg-height', $parallax_height );
		}
	}

	add_action( 'elementor/frontend/section/before_render', 'playerx_core_render_section_parallax_option' );
}

//function that renders helper hidden input for parallax data attribute section
if ( ! function_exists( 'playerx_core_generate_parallax_helper' ) ) {
	function playerx_core_generate_parallax_helper( $template, $widget ) {
		if ( 'section' === $widget->get_name() ) {
			$template_preceding = "
            <# if( settings.edge_enable_parallax == 'holder' ){
		        let parallaxSpeed = settings.edge_parallax_speed !== '' ? settings.edge_parallax_speed : '0';
	            let parallaxImage = settings.edge_parallax_image.url !== '' ? settings.edge_parallax_image.url : '0'
	            let parallaxHeight = settings.edge_parallax_height !== '' ? settings.edge_parallax_height : '0'
	        #>
		        <input type='hidden' class='edgtf-parallax-helper-holder' data-parallax-bg-speed='{{ parallaxSpeed }}' data-parallax-bg-image='{{ parallaxImage }}' data-parallax-bg-height='{{ parallaxHeight }}'/>
		    <# } #>";
			$template           = $template_preceding . " " . $template;
		}

		return $template;
	}

	add_action( 'elementor/section/print_template', 'playerx_core_generate_parallax_helper', 10, 2 );
}


//function that maps "Section Background" option for section
if ( ! function_exists( 'playerx_core_map_section_section_shadow_option' ) ) {
	function playerx_core_map_section_section_shadow_option( $section, $args ) {
		$section->start_controls_section(
			'edge_section_section_shadow',
			[
				'label' => esc_html__( 'Playerx Section Shadow', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_ADVANCED,
			]
		);

		$section->add_control(
			'edge_section_shadow',
			[
				'label'        => esc_html__( 'Section Shadow', 'playerx-core' ),
				'type'         => Elementor\Controls_Manager::SELECT,
				'default'      => 'shadow-disabled',
				'options'      => [
					'shadow-disabled' => esc_html__( 'Disable', 'playerx-core' ),
					'shadow'          => esc_html__( 'Enable', 'playerx-core' ),
				],
				'prefix_class' => 'edgtf-row-with-'
			]
		);

		$section->end_controls_section();
	}

	add_action( 'elementor/element/section/_section_responsive/after_section_end', 'playerx_core_map_section_section_shadow_option', 10, 2 );
}


//function that maps "Content Alignment" option for section
if ( ! function_exists( 'playerx_core_map_section_content_alignment_option' ) ) {
	function playerx_core_map_section_content_alignment_option( $section, $args ) {
		$section->start_controls_section(
			'edge_section_content_alignment',
			[
				'label' => esc_html__( 'Playerx Content Alignment', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_ADVANCED,
			]
		);

		$section->add_control(
			'edge_content_alignment',
			[
				'label'        => esc_html__( 'Content Alignment', 'playerx-core' ),
				'type'         => Elementor\Controls_Manager::SELECT,
				'default'      => 'left',
				'options'      => [
					'left'   => esc_html__( 'Left', 'playerx-core' ),
					'center' => esc_html__( 'Center', 'playerx-core' ),
					'right'  => esc_html__( 'Right', 'playerx-core' )
				],
				'prefix_class' => 'edgtf-content-aligment-'
			]
		);

		$section->end_controls_section();
	}

	add_action( 'elementor/element/section/_section_responsive/after_section_end', 'playerx_core_map_section_content_alignment_option', 10, 2 );
}

//function that maps "Grid" option for section
if ( ! function_exists( 'playerx_core_map_section_grid_option' ) ) {
	function playerx_core_map_section_grid_option( $section, $args ) {
		$section->start_controls_section(
			'edge_section_grid_row',
			[
				'label' => esc_html__( 'Playerx Grid', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_ADVANCED,
			]
		);

		$section->add_control(
			'edge_enable_grid_row',
			[
				'label'        => esc_html__( 'Make this row "In Grid"', 'playerx-core' ),
				'type'         => Elementor\Controls_Manager::SELECT,
				'default'      => 'no',
				'options'      => [
					'no'      => esc_html__( 'No', 'playerx-core' ),
					'section' => esc_html__( 'Yes', 'playerx-core' ),
				],
				'prefix_class' => 'edgtf-elementor-row-grid-'
			]
		);

		$section->end_controls_section();
	}

	add_action( 'elementor/element/section/_section_responsive/after_section_end', 'playerx_core_map_section_grid_option', 10, 2 );
}




if( ! function_exists('playerx_core_elementor_icons_style') ){
	function playerx_core_elementor_icons_style(){

		wp_enqueue_style( 'playerx-core-elementor', PLAYERX_CORE_ASSETS_URL_PATH . '/css/admin/playerx-elementor.css');

	}

	add_action( 'elementor/editor/before_enqueue_scripts', 'playerx_core_elementor_icons_style' );
}

if ( ! function_exists( 'playerx_core_get_elementor_shortcodes_path' ) ) {
	function playerx_core_get_elementor_shortcodes_path() {
		$shortcodes       = array();
		$shortcodes_paths = array(
			PLAYERX_CORE_SHORTCODES_PATH . '/*' => PLAYERX_CORE_URL_PATH,
			PLAYERX_CORE_ABS_PATH . '/**/shortcodes/*' => PLAYERX_CORE_URL_PATH,
			PLAYERX_CORE_CPT_PATH . '/**/shortcodes/*' => PLAYERX_CORE_URL_PATH,
			EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/**/shortcodes/*' => EDGE_FRAMEWORK_ROOT . '/'
		);

		if ( playerx_edge_instagram_feed() ) {
            $shortcodes_paths = array(
                PLAYERX_INSTAGRAM_SHORTCODES_PATH . '/*' => PLAYERX_INSTAGRAM_URL_PATH,
            );
        }

		if ( playerx_edge_twitter_feed() ) {
            $shortcodes_paths = array(
                PLAYERX_TWITTER_SHORTCODES_PATH . '/*' => PLAYERX_TWITTER_URL_PATH,
            );
        }

		foreach ( $shortcodes_paths as $dir_path => $url_path ) {
			foreach ( glob( $dir_path, GLOB_ONLYDIR ) as $shortcode_dir_path ) {
				$shortcode_name     = basename( $shortcode_dir_path );
				$shortcode_url_path = $url_path . substr( $shortcode_dir_path, strpos( $shortcode_dir_path, basename( $url_path ) ) + strlen( basename( $url_path ) ) + 1 );

				$shortcodes[ $shortcode_name ] = array(
					'dir_path' => $shortcode_dir_path,
					'url_path' => $shortcode_url_path
				);
			}
		}

		return $shortcodes;
	}
}

if ( ! function_exists( 'playerx_core_add_elementor_shortcodes_custom_styles' ) ) {
	function playerx_core_add_elementor_shortcodes_custom_styles() {
		$style                  = '';
		$shortcodes_icon_styles = array();

		$shortcodes_icon_class_array = apply_filters( 'playerx_core_filter_add_vc_shortcodes_custom_icon_class', $shortcodes_icon_class_array = array() );
		sort( $shortcodes_icon_class_array );

		$shortcodes_path = playerx_core_get_elementor_shortcodes_path();
		if ( ! empty( $shortcodes_icon_class_array ) ) {
			foreach ( $shortcodes_icon_class_array as $shortcode_icon_class ) {

				$shortcode_name = str_replace( '.icon-wpb-', '', esc_attr( $shortcode_icon_class ) );

				if ( key_exists( $shortcode_name, $shortcodes_path ) && file_exists( $shortcodes_path[ $shortcode_name ]['dir_path'] . '/assets/img/dashboard_icon.png' ) ) {
					$shortcodes_icon_styles[] = '.playerx-elementor-custom-icon.playerx-elementor-' . $shortcode_name . ' {
                        background-image: url( "' . $shortcodes_path[ $shortcode_name ]['url_path'] . '/assets/img/dashboard_icon.png" );
                    }';
				}
			}
		}

		if ( ! empty( $shortcodes_icon_styles ) ) {
			$style = implode( ' ', $shortcodes_icon_styles );
		}
		if ( ! empty( $style ) ) {
			wp_add_inline_style( 'playerx-core-elementor', $style );
		}
	}

	add_action( 'elementor/editor/before_enqueue_scripts', 'playerx_core_add_elementor_shortcodes_custom_styles', 15 );
}
