<?php
class ElementorEdgtfCallToAction extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_call_to_action'; 
	}

	public function get_title() {
		return esc_html__( 'Call To Action', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-call-to-action';
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
			'layout',
			[
				'label'     => esc_html__( 'Layout', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'normal' => esc_html__( 'Normal', 'playerx-core'), 
					'simple' => esc_html__( 'Simple', 'playerx-core')
				),
				'default' => 'normal'
			]
		);

		$this->add_control(
			'content_in_grid',
			[
				'label'     => esc_html__( 'Set Content In Grid', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'playerx-core'), 
					'yes' => esc_html__( 'Yes', 'playerx-core')
				),
				'default' => 'no',
				'condition' => [
					'layout' => array( 'normal' )
				]
			]
		);

		$this->add_control(
			'content_elements_proportion',
			[
				'label'     => esc_html__( 'Content Elements Proportion', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'80' => esc_html__( '80/20', 'playerx-core'), 
					'75' => esc_html__( '75/25', 'playerx-core'), 
					'66' => esc_html__( '66/33', 'playerx-core'), 
					'50' => esc_html__( '50/50', 'playerx-core')
				),
				'default' => '75',
				'condition' => [
					'layout' => array( 'normal' )
				]
			]
		);

		$this->add_control(
			'button_text',
			[
				'label'     => esc_html__( 'Button Text', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'content',
			[
				'label'     => esc_html__( 'Content', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__( 'Button Style', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'button_top_margin',
			[
				'label'     => esc_html__( 'Button Top Margin (px)', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'layout' => array( 'simple' )
				]
			]
		);

		$this->add_control(
			'button_type',
			[
				'label'     => esc_html__( 'Button Type', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'solid' => esc_html__( 'Solid', 'playerx-core'), 
					'outline' => esc_html__( 'Outline', 'playerx-core')
				),
				'default' => 'solid'
			]
		);

		$this->add_control(
			'button_size',
			[
				'label'     => esc_html__( 'Button Size', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'), 
					'small' => esc_html__( 'Small', 'playerx-core'), 
					'medium' => esc_html__( 'Medium', 'playerx-core'), 
					'large' => esc_html__( 'Large', 'playerx-core')
				),
				'default' => 'medium',
				'condition' => [
					'button_type' => array( 'solid', 'outline' )
				]
			]
		);

		$this->add_control(
			'button_link',
			[
				'label'     => esc_html__( 'Button Link', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'button_target',
			[
				'label'     => esc_html__( 'Button Link Target', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'_self' => esc_html__( 'Same Window', 'playerx-core'), 
					'_blank' => esc_html__( 'New Window', 'playerx-core')
				),
				'default' => '_self'
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'     => esc_html__( 'Button Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label'     => esc_html__( 'Button Hover Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label'     => esc_html__( 'Button Background Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'button_type' => array( 'solid' )
				]
			]
		);

		$this->add_control(
			'button_hover_background_color',
			[
				'label'     => esc_html__( 'Button Hover Background Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'button_border_color',
			[
				'label'     => esc_html__( 'Button Border Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label'     => esc_html__( 'Button Hover Border Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();
		$params['holder_classes']       = $this->getHolderClasses( $params );
		$params['inner_classes']        = $this->getInnerClasses( $params );
		$params['button_holder_styles'] = $this->getButtonHolderStyles( $params );
		$params['button_parameters']    = $this->getButtonParameters( $params );

		echo playerx_core_get_shortcode_module_template_part( 'templates/call-to-action', 'call-to-action', '', $params );
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['layout'] ) ? 'edgtf-' . $params['layout'] . '-layout' : '';
		$holderClasses[] = $params['content_in_grid'] === 'yes' && $params['layout'] === 'normal' ? 'edgtf-content-in-grid' : '';
		
		$content_elements_proportion = $params['content_elements_proportion'];
		if ( $params['layout'] === 'normal' ) {
			switch ( $content_elements_proportion ):
				case '80':
					$holderClasses[] = 'edgtf-four-fifths-columns';
					break;
				case '75':
					$holderClasses[] = 'edgtf-three-quarters-columns';
					break;
				case '66':
					$holderClasses[] = 'edgtf-two-thirds-columns';
					break;
				case '50':
					$holderClasses[] = 'edgtf-two-halves-columns';
					break;
				default:
					$holderClasses[] = 'edgtf-three-quarters-columns';
					break;
			endswitch;
		}
		
		return implode( ' ', $holderClasses );
	}

	private function getInnerClasses( $params ) {
		$innerClasses = array();
		
		$innerClasses[] = $params['layout'] === 'normal' && $params['content_in_grid'] === 'yes' ? 'edgtf-grid' : '';
		
		return implode( ' ', $innerClasses );
	}

	private function getButtonHolderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['button_top_margin'] ) && $params['layout'] === 'simple' ) {
			$styles[] = 'margin-top: ' . playerx_edge_filter_px( $params['button_top_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}

	private function getButtonParameters( $params ) {
		$button_params_array = array();
		
		if ( ! empty( $params['button_text'] ) ) {
			$button_params_array['text'] = $params['button_text'];
		}
		
		if ( ! empty( $params['button_type'] ) ) {
			$button_params_array['type'] = $params['button_type'];
		}
		
		if ( ! empty( $params['button_size'] ) ) {
			$button_params_array['size'] = $params['button_size'];
		}
		
		if ( ! empty( $params['button_link'] ) ) {
			$button_params_array['link'] = $params['button_link'];
		}
		
		$button_params_array['target'] = ! empty( $params['button_target'] ) ? $params['button_target'] : '_self';
		
		if ( ! empty( $params['button_color'] ) ) {
			$button_params_array['color'] = $params['button_color'];
		}
		
		if ( ! empty( $params['button_hover_color'] ) ) {
			$button_params_array['hover_color'] = $params['button_hover_color'];
		}
		
		if ( ! empty( $params['button_background_color'] ) ) {
			$button_params_array['background_color'] = $params['button_background_color'];
		}
		
		if ( ! empty( $params['button_hover_background_color'] ) ) {
			$button_params_array['hover_background_color'] = $params['button_hover_background_color'];
		}
		
		if ( ! empty( $params['button_border_color'] ) ) {
			$button_params_array['border_color'] = $params['button_border_color'];
		}
		
		if ( ! empty( $params['button_hover_border_color'] ) ) {
			$button_params_array['hover_border_color'] = $params['button_hover_border_color'];
		}
		
		return $button_params_array;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfCallToAction() );
