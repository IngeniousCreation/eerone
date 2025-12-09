<?php
class ElementorEdgtfButton extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_button'; 
	}

	public function get_title() {
		return esc_html__( 'Button', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-button';
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
					'solid' => esc_html__( 'Solid', 'playerx-core'), 
					'outline' => esc_html__( 'Outline', 'playerx-core'), 
					'simple' => esc_html__( 'Simple', 'playerx-core')
				),
				'default' => 'solid'
			]
		);

		$this->add_control(
			'trapeze_button',
			[
				'label'     => esc_html__( 'Trapeze shape', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'playerx-core'), 
					'yes' => esc_html__( 'Yes', 'playerx-core')
				),
				'default' => 'no',
				'condition' => [
					'type' => array( 'solid' )
				]
			]
		);

		$this->add_control(
			'glow_effect',
			[
				'label'     => esc_html__( 'Enable Glow Effect', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'If this setting is enabled, hover settings are bypassed.', 'playerx-core' ),
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'button_shadow',
			[
				'label'     => esc_html__( 'Enable Button Shadow', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'playerx-core'), 
					'yes' => esc_html__( 'Yes', 'playerx-core')
				),
				'default' => 'no',
				'condition' => [
					'type' => array( 'solid' )
				]
			]
		);

		$this->add_control(
			'size',
			[
				'label'     => esc_html__( 'Size', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'), 
					'small' => esc_html__( 'Small', 'playerx-core'), 
					'medium' => esc_html__( 'Medium', 'playerx-core'), 
					'large' => esc_html__( 'Large', 'playerx-core'), 
					'huge' => esc_html__( 'Huge', 'playerx-core')
				),
				'default' => '',
				'condition' => [
					'type' => array( 'solid', 'outline' )
				]
			]
		);

		$this->add_control(
			'text',
			[
				'label'     => esc_html__( 'Text', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'link',
			[
				'label'     => esc_html__( 'Link', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'target',
			[
				'label'     => esc_html__( 'Link Target', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'_self' => esc_html__( 'Same Window', 'playerx-core'), 
					'_blank' => esc_html__( 'New Window', 'playerx-core')
				),
				'default' => '_self'
			]
		);

		playerx_edge_icon_collections()->getElementorParamsArray( $this, '', '' );
		$this->add_control(
			'text_transform',
			[
				'label'     => esc_html__( 'Text Transform', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'), 
					'none' => esc_html__( 'None', 'playerx-core'), 
					'capitalize' => esc_html__( 'Capitalize', 'playerx-core'), 
					'uppercase' => esc_html__( 'Uppercase', 'playerx-core'), 
					'lowercase' => esc_html__( 'Lowercase', 'playerx-core'), 
					'initial' => esc_html__( 'Initial', 'playerx-core'), 
					'inherit' => esc_html__( 'Inherit', 'playerx-core')
				),
				'default' => ''
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'design_options',
			[
				'label' => esc_html__( 'Design Options', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'color',
			[
				'label'     => esc_html__( 'Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label'     => esc_html__( 'Hover Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'background_color',
			[
				'label'     => esc_html__( 'Background Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => array( 'solid' )
				]
			]
		);

		$this->add_control(
			'hover_background_color',
			[
				'label'     => esc_html__( 'Hover Background Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => array( 'solid', 'outline' )
				]
			]
		);

		$this->add_control(
			'border_color',
			[
				'label'     => esc_html__( 'Border Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => array( 'solid', 'outline' )
				]
			]
		);

		$this->add_control(
			'hover_border_color',
			[
				'label'     => esc_html__( 'Hover Border Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => array( 'solid', 'outline' )
				]
			]
		);

		$this->add_control(
			'font_size',
			[
				'label'     => esc_html__( 'Font Size (px)', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'font_weight',
			[
				'label'     => esc_html__( 'Font Weight', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'), 
					'100' => esc_html__( '100 Thin', 'playerx-core'), 
					'200' => esc_html__( '200 Thin-Light', 'playerx-core'), 
					'300' => esc_html__( '300 Light', 'playerx-core'), 
					'400' => esc_html__( '400 Normal', 'playerx-core'), 
					'500' => esc_html__( '500 Medium', 'playerx-core'), 
					'600' => esc_html__( '600 Semi-Bold', 'playerx-core'), 
					'700' => esc_html__( '700 Bold', 'playerx-core'), 
					'800' => esc_html__( '800 Extra-Bold', 'playerx-core'), 
					'900' => esc_html__( '900 Ultra-Bold', 'playerx-core')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'margin',
			[
				'label'     => esc_html__( 'Margin', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'playerx-core' )
			]
		);

		$this->add_control(
			'padding',
			[
				'label'     => esc_html__( 'Button Padding', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Insert padding in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'playerx-core' ),
				'condition' => [
					'type' => array( 'solid', 'outline' )
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();
		$params['html_type'] = 'anchor';
		
		if ( $params['html_type'] !== 'input' ) {
			$iconPackName   = playerx_edge_icon_collections()->getIconCollectionParamNameByKey( $params['icon_pack'] );
			$params['icon'] = $iconPackName ? $params[ $iconPackName ] : '';
		}
		
		$params['size'] = ! empty( $params['size'] ) ? $params['size'] : 'medium';
		$params['type'] = ! empty( $params['type'] ) ? $params['type'] : 'solid';
		
		$params['link']   = ! empty( $params['link'] ) ? $params['link'] : '#';
		$params['target'] = ! empty( $params['target'] ) ? $params['target'] : '_self';
		
		$params['button_classes']      = $this->getButtonClasses( $params );
		$params['button_custom_attrs'] = ! empty( $params['custom_attrs'] ) ? $params['custom_attrs'] : 
		$params['button_styles']       = $this->getButtonStyles( $params );
		$params['button_trapeze_styles'] = $this->getButtonTrapezeStyles( $params );
		$params['button_data']         = $this->getButtonDataAttr( $params );
		
		echo playerx_core_get_shortcode_module_template_part( 'templates/' . $params['html_type'], 'button', '', $params );
	}

	private function getButtonStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['color'] ) ) {
			$styles[] = 'color: ' . $params['color'];
		}
		
		if ( ! empty( $params['background_color'] ) && $params['type'] !== 'outline' ) {
			$styles[] = 'background-color: ' . $params['background_color'];
		}
		
		if ( ! empty( $params['border_color'] ) ) {
			$styles[] = 'border-color: ' . $params['border_color'];
		}
		
		if ( ! empty( $params['font_size'] ) ) {
			$styles[] = 'font-size: ' . playerx_edge_filter_px( $params['font_size'] ) . 'px';
		}
		
		if ( ! empty( $params['font_weight'] ) && $params['font_weight'] !== '' ) {
			$styles[] = 'font-weight: ' . $params['font_weight'];
		}
		
		if ( ! empty( $params['text_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['text_transform'];
		}
		
		if ( $params['margin'] !== '' ) {
			$styles[] = 'margin: ' . $params['margin'];
		}
		
		if ( $params['padding'] !== '' ) {
			$styles[] = 'padding: ' . $params['padding'];
		}
		
		return $styles;
	}

	private function getButtonTrapezeStyles($params) {

	    $styles = array();

        if ( ! empty( $params['background_color'] ) && $params['type'] === 'solid' && $params['trapeze_button'] === 'yes') {
            $styles[] = 'border-top-color: ' . $params['background_color'];
        }

	    return $styles;
    }

	private function getButtonDataAttr( $params ) {
		$data = array();
		
		if ( ! empty( $params['hover_color'] ) ) {
			$data['data-hover-color'] = $params['hover_color'];
		}
		
		if ( ! empty( $params['hover_background_color'] ) ) {
			$data['data-hover-bg-color'] = $params['hover_background_color'];
		}
		
		if ( ! empty( $params['hover_border_color'] ) ) {
			$data['data-hover-border-color'] = $params['hover_border_color'];
		}
		
		return $data;
	}

	private function getButtonClasses( $params ) {
		$buttonClasses = array(
			'edgtf-btn',
			'edgtf-btn-' . $params['size'],
			'edgtf-btn-' . $params['type']
		);
		
		if ( ! empty( $params['hover_background_color'] ) ) {
			$buttonClasses[] = 'edgtf-btn-custom-hover-bg';
		}
		
		if ( ! empty( $params['hover_border_color'] ) ) {
			$buttonClasses[] = 'edgtf-btn-custom-border-hover';
		}
		
		if ( ! empty( $params['hover_color'] ) ) {
			$buttonClasses[] = 'edgtf-btn-custom-hover-color';
		}
		
		if ( ! empty( $params['icon'] ) ) {
			$buttonClasses[] = 'edgtf-btn-icon';
		}

		if( !empty($params['trapeze_button']) && $params['trapeze_button'] === 'yes') {
		    $buttonClasses[] = 'edgtf-btn-trapeze-shape';
        }

        if( !empty($params['button_shadow']) && $params['button_shadow'] === 'yes') {
		    $buttonClasses[] ='edgtf-solid-btn-with-shadow';
		}
		
        if( !empty($params['glow_effect']) && $params['glow_effect'] === 'yes') {
		    $buttonClasses[] ='edgtf-btn-glow';
        }
		
		if ( ! empty( $params['custom_class'] ) ) {
			$buttonClasses[] = esc_attr( $params['custom_class'] );
		}
		
		return $buttonClasses;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfButton() );
