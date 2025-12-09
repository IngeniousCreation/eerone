<?php
class ElementorEdgtfSplitSection extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_split_section'; 
	}

	public function get_title() {
		return esc_html__( 'Split Section', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-split-section';
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
			'image',
			[
				'label'     => esc_html__( 'Image', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$this->add_control(
			'image_position',
			[
				'label'     => esc_html__( 'Image Position', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'left' => esc_html__( 'Left', 'playerx-core'), 
					'right' => esc_html__( 'Right', 'playerx-core')
				),
				'default' => 'left'
			]
		);

		$this->add_control(
			'content_background',
			[
				'label'     => esc_html__( 'Content Background Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR
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
				'default' => 'h2',
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
			'text',
			[
				'label'     => esc_html__( 'Text', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'text_tag',
			[
				'label'     => esc_html__( 'Text Tag', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'), 
					'h1' => esc_html__( 'h1', 'playerx-core'), 
					'h2' => esc_html__( 'h2', 'playerx-core'), 
					'h3' => esc_html__( 'h3', 'playerx-core'), 
					'h4' => esc_html__( 'h4', 'playerx-core'), 
					'h5' => esc_html__( 'h5', 'playerx-core'), 
					'h6' => esc_html__( 'h6', 'playerx-core'), 
					'p' => esc_html__( 'p', 'playerx-core')
				),
				'default' => 'h5',
				'condition' => [
					'text!' => ''
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
				'label'     => esc_html__( 'Text Top Margin (px or %)', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'text!' => ''
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
			'breakpoint',
			[
				'label'     => esc_html__( 'Responsive Breakpoint', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Choose on which stage you want to break image and text content to be one under other', 'playerx-core' ),
				'options' => array(
					'' => esc_html__( 'Never', 'playerx-core'), 
					'1366' => esc_html__( 'Below 1366px', 'playerx-core'), 
					'1024' => esc_html__( 'Below 1024px', 'playerx-core'), 
					'768' => esc_html__( 'Below 768px', 'playerx-core'), 
					'680' => esc_html__( 'Below 680px', 'playerx-core'), 
					'480' => esc_html__( 'Below 480px', 'playerx-core')
				),
				'default' => ''
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
			'button_type',
			[
				'label'     => esc_html__( 'Button Type', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'solid' => esc_html__( 'Solid', 'playerx-core'), 
					'outline' => esc_html__( 'Outline', 'playerx-core'), 
					'simple' => esc_html__( 'Text', 'playerx-core')
				),
				'default' => 'outline',
				'condition' => [
					'button_text!' => ''
				]
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
					'large' => esc_html__( 'Large', 'playerx-core'), 
					'huge' => esc_html__( 'Huge', 'playerx-core')
				),
				'default' => 'normal',
				'condition' => [
					'button_text!' => ''
				]
			]
		);

		$this->add_control(
			'button_link',
			[
				'label'     => esc_html__( 'Button Link', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'button_text!' => ''
				]
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
				'default' => '_self',
				'condition' => [
					'button_link!' => ''
				]
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'     => esc_html__( 'Button Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'button_text!' => ''
				]
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label'     => esc_html__( 'Button Hover Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'button_text!' => ''
				]
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
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'button_type' => array( 'solid' )
				]
			]
		);

		$this->add_control(
			'button_border_color',
			[
				'label'     => esc_html__( 'Button Border Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'button_text!' => ''
				]
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label'     => esc_html__( 'Button Hover Border Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'button_text!' => ''
				]
			]
		);

		$this->add_control(
			'button_top_margin',
			[
				'label'     => esc_html__( 'Button Top Margin (px or %)', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'button_text!' => ''
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();


		
		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['content_style']  = $this->getContentStyles( $params );
		$params['image_styles']   = $this->getImageBackgroundStyles( $params );
		$params['title_tag']      = ! empty( $params['title_tag'] ) ? $params['title_tag'] : 'h2';
		$params['title_styles']   = $this->getTitleStyles( $params );
		$params['text_tag']       = ! empty( $params['text_tag'] ) ? $params['text_tag'] : 'h5';
		$params['text_styles']    = $this->getTextStyles( $params );

		echo playerx_core_get_shortcode_module_template_part( 'templates/split-section', 'split-section', '', $params );
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = 'edgtf-ss-image-' . $params['image_position'];
		$holderClasses[] = ! empty( $params['breakpoint'] ) ? 'edgtf-ss-break-' . $params['breakpoint'] : '';
		
		return implode( ' ', $holderClasses );
	}

	private function getImageBackgroundStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['image'] ) ) {
			$image_src = wp_get_attachment_image_src( $params['image']['id'], 'full' );
			
			if ( is_array( $image_src ) ) {
				$image_src = $image_src[0];
			}
			
			$styles[] = 'background-image: url(' . $image_src . ')';
		}
		
		return implode( ';', $styles );
	}

	private function getContentStyles($params) {
		$styles   = array();

		if(!empty($params['content_background'])) {
			$styles[] = 'background-color:'. $params['content_background'];
		}

		return implode( ';', $styles );
	}

	private function getTitleStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}

		return implode( ';', $styles );
	}

	private function getTextStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['text_color'] ) ) {
			$styles[] = 'color: ' . $params['text_color'];
		}

		if ( $params['text_top_margin'] !== '' ) {
			if ( playerx_edge_string_ends_with( $params['text_top_margin'], '%' ) || playerx_edge_string_ends_with( $params['text_top_margin'], 'px' ) ) {
				$styles[] = 'margin-top: ' . $params['width'];
			} else {
				$styles[] = 'margin-top: ' . $params['text_top_margin'] . 'px';
			}
		}

		return implode( ';', $styles );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfSplitSection() );
