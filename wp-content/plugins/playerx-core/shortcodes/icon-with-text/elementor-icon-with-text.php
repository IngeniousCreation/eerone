<?php
class ElementorEdgtfIconWithText extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_icon_with_text'; 
	}

	public function get_title() {
		return esc_html__( 'Icon With Text', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-icon-with-text';
	}

	public function get_categories() {
		return [ 'edge' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'general',
			[
				'label' => esc_html__( 'General', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'custom_class',
			[
				'label'     => esc_html__( 'Custom CSS Class', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'playerx-core' )
			]
		);

		$this->add_control(
			'type',
			[
				'label'     => esc_html__( 'Type', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'icon-left' => esc_html__( 'Icon Left From Text', 'playerx-core'), 
					'icon-left-from-title' => esc_html__( 'Icon Left From Title', 'playerx-core'), 
					'icon-top' => esc_html__( 'Icon Top', 'playerx-core')
				),
				'default' => 'icon-left'
			]
		);

		playerx_edge_icon_collections()->getElementorParamsArray( $this, '', '' );
		$this->add_control(
			'custom_icon',
			[
				'label'     => esc_html__( 'Custom Icon', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$this->add_control(
			'title',
			[
				'label'     => esc_html__( 'Title', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'text',
			[
				'label'     => esc_html__( 'Text', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA
			]
		);

		$this->add_control(
			'link',
			[
				'label'     => esc_html__( 'Link', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Set link around icon and title', 'playerx-core' )
			]
		);

		$this->add_control(
			'target',
			[
				'label'     => esc_html__( 'Target', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'_self' => esc_html__( 'Same Window', 'playerx-core'), 
					'_blank' => esc_html__( 'New Window', 'playerx-core')
				),
				'default' => '_self',
				'condition' => [
					'link!' => ''
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'icon_settings',
			[
				'label' => esc_html__( 'Icon Settings', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'icon_type',
			[
				'label'     => esc_html__( 'Icon Type', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'edgtf-normal' => esc_html__( 'Normal', 'playerx-core'), 
					'edgtf-circle' => esc_html__( 'Circle', 'playerx-core'), 
					'edgtf-square' => esc_html__( 'Square', 'playerx-core')
				),
				'default' => 'edgtf-normal'
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label'     => esc_html__( 'Icon Size', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'edgtf-icon-medium' => esc_html__( 'Medium', 'playerx-core'), 
					'edgtf-icon-tiny' => esc_html__( 'Tiny', 'playerx-core'), 
					'edgtf-icon-small' => esc_html__( 'Small', 'playerx-core'), 
					'edgtf-icon-large' => esc_html__( 'Large', 'playerx-core'), 
					'edgtf-icon-huge' => esc_html__( 'Very Large', 'playerx-core')
				),
				'default' => 'edgtf-icon-medium'
			]
		);

		$this->add_control(
			'custom_icon_size',
			[
				'label'     => esc_html__( 'Custom Icon Size (px)', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'shape_size',
			[
				'label'     => esc_html__( 'Shape Size (px)', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label'     => esc_html__( 'Icon Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'label'     => esc_html__( 'Icon Hover Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'icon_background_color',
			[
				'label'     => esc_html__( 'Icon Background Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'icon_type' => array( 'edgtf-square', 'edgtf-circle' )
				]
			]
		);

		$this->add_control(
			'icon_hover_background_color',
			[
				'label'     => esc_html__( 'Icon Hover Background Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'icon_type' => array( 'edgtf-square', 'edgtf-circle' )
				]
			]
		);

		$this->add_control(
			'icon_border_color',
			[
				'label'     => esc_html__( 'Icon Border Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'icon_type' => array( 'edgtf-square', 'edgtf-circle' )
				]
			]
		);

		$this->add_control(
			'icon_border_hover_color',
			[
				'label'     => esc_html__( 'Icon Border Hover Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'icon_type' => array( 'edgtf-square', 'edgtf-circle' )
				]
			]
		);

		$this->add_control(
			'icon_border_width',
			[
				'label'     => esc_html__( 'Border Width (px)', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'icon_type' => array( 'edgtf-square', 'edgtf-circle' )
				]
			]
		);

		$this->add_control(
			'icon_animation',
			[
				'label'     => esc_html__( 'Icon Animation', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'playerx-core'), 
					'yes' => esc_html__( 'Yes', 'playerx-core')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'icon_animation_delay',
			[
				'label'     => esc_html__( 'Icon Animation Delay (ms)', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'icon_animation' => array( 'yes' )
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'text_settings',
			[
				'label' => esc_html__( 'Text Settings', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label'     => esc_html__( 'Title Tag', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'), 
					'h1' => esc_html__( 'h1', 'playerx-core'), 
					'h2' => esc_html__( 'h2', 'playerx-core'), 
					'h3' => esc_html__( 'h3', 'playerx-core'), 
					'h4' => esc_html__( 'h4', 'playerx-core'), 
					'h5' => esc_html__( 'h5', 'playerx-core'), 
					'h6' => esc_html__( 'h6', 'playerx-core')
				),
				'default' => 'h4',
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'title_top_margin',
			[
				'label'     => esc_html__( 'Title Top Margin (px)', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'text_color',
			[
				'label'     => esc_html__( 'Text Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'text!' => ''
				]
			]
		);

		$this->add_control(
			'text_top_margin',
			[
				'label'     => esc_html__( 'Text Top Margin (px)', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'text!' => ''
				]
			]
		);

		$this->add_control(
			'text_padding',
			[
				'label'     => esc_html__( 'Text Padding (px)', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Set left or top padding dependence of type for your text holder. Default value is 13 for left type and 25 for top icon with text type', 'playerx-core' ),
				'condition' => [
					'type' => array( 'icon-left', 'icon-top' )
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();



		$params['type'] = ! empty( $params['type'] ) ? $params['type'] : 'icon-left';
		$params['custom_icon'] = !empty($params['custom_icon']) ? $params['custom_icon']['id'] : $params['custom_icon'];
		
		$params['icon_parameters'] = $this->getIconParameters( $params );
		$params['holder_classes']  = $this->getHolderClasses( $params );
		$params['content_styles']  = $this->getContentStyles( $params );
		$params['title_styles']    = $this->getTitleStyles( $params );
		$params['title_tag']       = ! empty( $params['title_tag'] ) ? $params['title_tag'] : 'h4';
		$params['icon_type']       = ! empty( $params['icon_type'] ) ? $params['icon_type'] : 'edgtf-normal';
		$params['icon_size']       = ! empty( $params['icon_size'] ) ? $params['icon_size'] : 'edgtf-icon-medium';
		$params['text_styles']     = $this->getTextStyles( $params );
		$params['target']          = ! empty( $params['target'] ) ? $params['target'] : '_self';
		
		echo playerx_core_get_shortcode_module_template_part( 'templates/iwt', 'icon-with-text', $params['type'], $params );
	}

	private function getIconParameters( $params ) {
		$params_array = array();
		
		if ( empty( $params['custom_icon'] ) ) {
			$iconPackName = playerx_edge_icon_collections()->getIconCollectionParamNameByKey( $params['icon_pack'] );
			
			$params_array['icon_pack']     = $params['icon_pack'];
			$params_array[ $iconPackName ] = $params[ $iconPackName ];
			
			if ( ! empty( $params['icon_size'] ) ) {
				$params_array['size'] = $params['icon_size'];
			}
			
			if ( ! empty( $params['custom_icon_size'] ) ) {
				$params_array['custom_size'] = playerx_edge_filter_px( $params['custom_icon_size'] ) . 'px';
			}
			
			if ( ! empty( $params['icon_type'] ) ) {
				$params_array['type'] = $params['icon_type'];
			}
			
			if ( ! empty( $params['shape_size'] ) ) {
				$params_array['shape_size'] = playerx_edge_filter_px( $params['shape_size'] ) . 'px';
			}
			
			if ( ! empty( $params['icon_border_color'] ) ) {
				$params_array['border_color'] = $params['icon_border_color'];
			}
			
			if ( ! empty( $params['icon_border_hover_color'] ) ) {
				$params_array['hover_border_color'] = $params['icon_border_hover_color'];
			}
			
			if ( $params['icon_border_width'] !== '' ) {
				$params_array['border_width'] = playerx_edge_filter_px( $params['icon_border_width'] ) . 'px';
			}
			
			if ( ! empty( $params['icon_background_color'] ) ) {
				$params_array['background_color'] = $params['icon_background_color'];
			}
			
			if ( ! empty( $params['icon_hover_background_color'] ) ) {
				$params_array['hover_background_color'] = $params['icon_hover_background_color'];
			}
			
			$params_array['icon_color'] = $params['icon_color'];
			
			if ( ! empty( $params['icon_hover_color'] ) ) {
				$params_array['hover_icon_color'] = $params['icon_hover_color'];
			}
			
			$params_array['icon_animation']       = $params['icon_animation'];
			$params_array['icon_animation_delay'] = $params['icon_animation_delay'];
		}
		
		return $params_array;
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array( 'edgtf-iwt', 'clearfix' );
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['type'] ) ? 'edgtf-iwt-' . $params['type'] : '';
		$holderClasses[] = ! empty( $params['icon_size'] ) ? 'edgtf-iwt-' . str_replace( 'edgtf-', '', $params['icon_size'] ) : '';
		
		return $holderClasses;
	}

	private function getContentStyles( $params ) {
		$styles = array();
		
		if ( $params['text_padding'] !== '' && $params['type'] === 'icon-left' ) {
			$styles[] = 'padding-left: ' . playerx_edge_filter_px( $params['text_padding'] ) . 'px';
		}
		
		if ( $params['text_padding'] !== '' && $params['type'] === 'icon-top' ) {
			$styles[] = 'padding-top: ' . playerx_edge_filter_px( $params['text_padding'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}

	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}
		
		if ( $params['title_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . playerx_edge_filter_px( $params['title_top_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}

	private function getTextStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['text_color'] ) ) {
			$styles[] = 'color: ' . $params['text_color'];
		}
		
		if ( $params['text_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . playerx_edge_filter_px( $params['text_top_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfIconWithText() );
