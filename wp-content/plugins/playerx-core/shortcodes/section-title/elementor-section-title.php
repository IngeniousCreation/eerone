<?php
class ElementorEdgtfSectionTitle extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_section_title'; 
	}

	public function get_title() {
		return esc_html__( 'Section Title', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-section-title';
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
					'standard' => esc_html__( 'Standard', 'playerx-core'), 
					'minimal' => esc_html__( 'Minimal', 'playerx-core')
				),
				'default' => 'standard'
			]
		);

		$this->add_control(
			'position',
			[
				'label'     => esc_html__( 'Horizontal Position', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'), 
					'left' => esc_html__( 'Left', 'playerx-core'), 
					'center' => esc_html__( 'Center', 'playerx-core'), 
					'right' => esc_html__( 'Right', 'playerx-core')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'holder_padding',
			[
				'label'     => esc_html__( 'Holder Side Padding (px or %)', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'type' => array( 'standard' )
				]
			]
		);

		$this->add_control(
			'holder_background',
			[
				'label'     => esc_html__( 'Title Box Backaground Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => array( 'minimal' )
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
			'separator_type',
			[
				'label'     => esc_html__( 'Separator Type', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'image' => esc_html__( 'Image', 'playerx-core'), 
					'svg' => esc_html__( 'SVG', 'playerx-core')
				),
				'default' => 'image',
				'condition' => [
					'type' => array( 'standard' )
				]
			]
		);

		$this->add_control(
			'image',
			[
				'label'     => esc_html__( 'Bottom Image', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( 'Select image from media library', 'playerx-core' ),
				'condition' => [
					'separator_type' => array( 'image' )
				]
			]
		);

		$this->add_control(
			'svg',
			[
				'label'     => esc_html__( 'SVG Path Code', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA,
				'condition' => [
					'separator_type' => array( 'svg' )
				]
			]
		);

		$this->add_control(
			'separator_top_margin',
			[
				'label'     => esc_html__( 'Separator Top Margin', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter top margin in px for separator. Exampple: 20px', 'playerx-core' )
			]
		);

		$this->add_control(
			'text',
			[
				'label'     => esc_html__( 'Text', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA,
				'condition' => [
					'type' => array( 'standard' )
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_style',
			[
				'label' => esc_html__( 'Title Style', 'playerx-core' ),
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
				'default' => 'h3',
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
			'title_hightlight_words',
			[
				'label'     => esc_html__( 'Highlight Words', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter the positions of the words you would like to display in a most dominant color of your theme. Separate the positions with commas (e.g. if you would like the first, second, and third word to have a desired color, you would enter &quot;1,2,3&quot;)', 'playerx-core' ),
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'title_break_words',
			[
				'label'     => esc_html__( 'Position of Line Break', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter the position of the word after which you would like to create a line break (e.g. if you would like the line break after the 3rd word, you would enter &quot;3&quot;)', 'playerx-core' ),
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'second_title_break_words',
			[
				'label'     => esc_html__( 'Position of Second Line Break', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter the position of the second word after which you would like to create a line break (e.g. if you would like the line break after the 3rd word, you would enter &quot;3&quot;)', 'playerx-core' ),
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'disable_break_words',
			[
				'label'     => esc_html__( 'Disable Line Break for Smaller Screens', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'playerx-core'), 
					'yes' => esc_html__( 'Yes', 'playerx-core')
				),
				'default' => 'no',
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'text_style',
			[
				'label' => esc_html__( 'Text Style', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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
			'text_font_size',
			[
				'label'     => esc_html__( 'Text Font Size (px)', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'text!' => ''
				]
			]
		);

		$this->add_control(
			'text_line_height',
			[
				'label'     => esc_html__( 'Text Line Height (px)', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'text!' => ''
				]
			]
		);

		$this->add_control(
			'text_font_weight',
			[
				'label'     => esc_html__( 'Text Font Weight', 'playerx-core' ),
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
					'text!' => ''
				]
			]
		);

		$this->add_control(
			'text_margin',
			[
				'label'     => esc_html__( 'Text Top Margin (px)', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'text!' => ''
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();
		$params['is_elementor']     = true;
		$params['holder_classes']   = $this->getHolderClasses( $params );
		$params['holder_styles']    = $this->getHolderStyles( $params );
		$params['title']            = $this->getModifiedTitle( $params );
		$params['title_tag']        = ! empty( $params['title_tag'] ) ? $params['title_tag'] : 'h3';
		$params['title_styles']     = $this->getTitleStyles( $params );
		$params['text_styles']      = $this->getTextStyles( $params );
		$params['separator_styles'] = $this->getSeparatorStyles( $params );

		echo playerx_core_get_shortcode_module_template_part( 'templates/' . $params['type'], 'section-title', '', $params );
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();

		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['type'] ) ? 'edgtf-st-' . $params['type'] : 'edgtf-st-' . 'standard';
		$holderClasses[] = $params['disable_break_words'] === 'yes' ? 'edgtf-st-disable-title-break' : '';

		return implode( ' ', $holderClasses );
	}

	private function getHolderStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['holder_padding'] ) ) {
			$styles[] = 'padding: 0 ' . $params['holder_padding'];
		}

		if ( ! empty( $params['holder_background'] ) ) {
			$styles[] = 'background-color: ' . $params['holder_background'];
		}

		if ( ! empty( $params['position'] ) ) {
			$styles[] = 'text-align: ' . $params['position'];
		}

		return implode( ';', $styles );
	}

	private function getModifiedTitle( $params ) {
		$title                    = $params['title'];
		$title_hightlight_words   = str_replace( ' ', '', $params['title_hightlight_words'] );
		$title_break_words        = str_replace( ' ', '', $params['title_break_words'] );
		$second_title_break_words = str_replace( ' ', '', $params['second_title_break_words'] );

		if ( ! empty( $title ) ) {
			$hightlight_words = explode( ',', $title_hightlight_words );
			$split_title      = explode( ' ', $title );

			if ( ! empty( $title_hightlight_words ) ) {
				foreach ( $hightlight_words as $value ) {
					if ( ! empty( $split_title[ $value - 1 ] ) ) {
						$split_title[ $value - 1 ] = '<span class="edgtf-st-title-hightlight">' . $split_title[ $value - 1 ] . '</span>';
					}
				}
			}

			if ( ! empty( $title_break_words ) ) {
				if ( ! empty( $split_title[ $title_break_words - 1 ] ) ) {
					$split_title[ $title_break_words - 1 ] = $split_title[ $title_break_words - 1 ] . '<br />';
				}
			}

			if ( ! empty( $second_title_break_words ) ) {
				if ( ! empty( $split_title[ $second_title_break_words - 1 ] ) ) {
					$split_title[ $second_title_break_words - 1 ] = $split_title[ $second_title_break_words - 1 ] . '<br />';
				}
			}

			$title = implode( ' ', $split_title );
		}

		return $title;
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

		if ( ! empty( $params['text_font_size'] ) ) {
			$styles[] = 'font-size: ' . playerx_edge_filter_px( $params['text_font_size'] ) . 'px';
		}

		if ( ! empty( $params['text_line_height'] ) ) {
			$styles[] = 'line-height: ' . playerx_edge_filter_px( $params['text_line_height'] ) . 'px';
		}

		if ( ! empty( $params['text_font_weight'] ) ) {
			$styles[] = 'font-weight: ' . $params['text_font_weight'];
		}

		if ( $params['text_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . playerx_edge_filter_px( $params['text_margin'] ) . 'px';
		}

		return implode( ';', $styles );
	}

	private function getSeparatorStyles( $params ) {
		$styles = array();

		if ( $params['separator_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . playerx_edge_filter_px( $params['separator_top_margin'] ) . 'px';
		}

		return implode( ';', $styles );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfSectionTitle() );
