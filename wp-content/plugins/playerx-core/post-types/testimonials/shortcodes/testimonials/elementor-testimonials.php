<?php
class ElementorEdgtfTestimonials extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_testimonials'; 
	}

	public function get_title() {
		return esc_html__( 'Testimonials', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-testimonials';
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
			'skin',
			[
				'label'     => esc_html__( 'Skin', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'), 
					'dark' => esc_html__( 'Dark', 'playerx-core')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'number',
			[
				'label'     => esc_html__( 'Number of Testimonials', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'category',
			[
				'label'     => esc_html__( 'Category', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'playerx-core' )
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'slider_settings',
			[
				'label' => esc_html__( 'Slider Settings', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'slider_loop',
			[
				'label'     => esc_html__( 'Enable Slider Loop', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'slider_autoplay',
			[
				'label'     => esc_html__( 'Enable Slider Autoplay', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'slider_speed',
			[
				'label'     => esc_html__( 'Slide Duration', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Default value is 5000 (ms)', 'playerx-core' )
			]
		);

		$this->add_control(
			'slider_speed_animation',
			[
				'label'     => esc_html__( 'Slide Animation Duration', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 600.', 'playerx-core' )
			]
		);

		$this->add_control(
			'slider_navigation',
			[
				'label'     => esc_html__( 'Enable Slider Navigation Arrows', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'slider_pagination',
			[
				'label'     => esc_html__( 'Enable Slider Pagination', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'playerx-core'), 
					'yes' => esc_html__( 'Yes', 'playerx-core')
				),
				'default' => 'no'
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['type'] = ! empty( $params['type'] ) ? $params['type'] : 'standard';
		
		$params['holder_classes'] = $this->getHolderClasses( $params );

		$params['query_args']    = $this->getQueryParams( $params );
		$params['query_results'] = new \WP_Query( $params['query_args'] );
		
		$params['data_attr'] = $this->getSliderData( $params );

        echo playerx_core_get_cpt_shortcode_module_template_part( 'testimonials', 'testimonials', 'testimonials-' . $params['type'], '', $params );

	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = 'edgtf-testimonials-' . $params['type'];
		$holderClasses[] = ! empty( $params['skin'] ) ? 'edgtf-testimonials-' . $params['skin'] : '';
		
		return implode( ' ', $holderClasses );
	}

	private function getQueryParams( $params ) {
		$args = array(
			'post_status'    => 'publish',
			'post_type'      => 'testimonials',
			'orderby'        => 'date',
			'order'          => 'DESC',
			'posts_per_page' => $params['number']
		);
		
		if ( $params['category'] != '' ) {
			$args['testimonials-category'] = $params['category'];
		}
		
		return $args;
	}

	private function getSliderData( $params ) {
		$slider_data = array();
		
		$slider_data['data-enable-loop']            = ! empty( $params['slider_loop'] ) ? $params['slider_loop'] : '';
		$slider_data['data-enable-autoplay']        = ! empty( $params['slider_autoplay'] ) ? $params['slider_autoplay'] : '';
		$slider_data['data-slider-speed']           = ! empty( $params['slider_speed'] ) ? $params['slider_speed'] : '5000';
		$slider_data['data-slider-speed-animation'] = ! empty( $params['slider_speed_animation'] ) ? $params['slider_speed_animation'] : '600';
		$slider_data['data-enable-navigation']      = ! empty( $params['slider_navigation'] ) ? $params['slider_navigation'] : '';
		$slider_data['data-enable-pagination']      = ! empty( $params['slider_pagination'] ) ? $params['slider_pagination'] : '';

		return $slider_data;
	}
}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfTestimonials() );
