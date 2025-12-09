<?php
class ElementorEdgtfCounter extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_counter'; 
	}

	public function get_title() {
		return esc_html__( 'Counter', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-counter';
	}

	public function get_categories() {
		return [ 'edge' ];
	}

	public function get_script_depends() {
		return array(
			'jquery-plugin',
			'countdown'
		);
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
					'edgtf-zero-counter' => esc_html__( 'Zero Counter', 'playerx-core'), 
					'edgtf-random-counter' => esc_html__( 'Random Counter', 'playerx-core')
				),
				'default' => 'edgtf-zero-counter'
			]
		);

		$this->add_control(
			'digit',
			[
				'label'     => esc_html__( 'Digit', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'digit_font_size',
			[
				'label'     => esc_html__( 'Digit Font Size (px)', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'digit!' => ''
				]
			]
		);

		$this->add_control(
			'digit_color',
			[
				'label'     => esc_html__( 'Digit Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'digit!' => ''
				]
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
				'default' => 'h6',
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
			'title_font_weight',
			[
				'label'     => esc_html__( 'Title Font Weight', 'playerx-core' ),
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
				'default' => '',
				'condition' => [
					'title!' => ''
				]
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
			'text_color',
			[
				'label'     => esc_html__( 'Text Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'text!' => ''
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();


		
		$params['holder_classes']       = $this->getHolderClasses( $params );
		$params['counter_styles']       = $this->getCounterStyles( $params );
		$params['counter_title_styles'] = $this->getCounterTitleStyles( $params );
		$params['counter_text_styles']  = $this->getCounterTextStyles( $params );
		
		$params['title_tag'] = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $params['title_tag'];

		echo playerx_core_get_shortcode_module_template_part( 'templates/counter', 'counter', '', $params );
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		
		return implode( ' ', $holderClasses );
	}

	private function getCounterStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['digit_font_size'] ) ) {
			$styles[] = 'font-size: ' . playerx_edge_filter_px( $params['digit_font_size'] ) . 'px';
		}
		
		if ( ! empty( $params['digit_color'] ) ) {
			$styles[] = 'color: ' . $params['digit_color'];
		}
		
		return implode( ';', $styles );
	}

	private function getCounterTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}
		
		if ( ! empty( $params['title_font_weight'] ) ) {
			$styles[] = 'font-weight: ' . $params['title_font_weight'];
		}
		
		return implode( ';', $styles );
	}

	private function getCounterTextStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['text_color'] ) ) {
			$styles[] = 'color: ' . $params['text_color'];
		}
		
		return implode( ';', $styles );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfCounter() );
