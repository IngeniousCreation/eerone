<?php
class ElementorEdgtfVerticalSplitSlider extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_vertical_split_slider'; 
	}

	public function get_title() {
		return esc_html__( 'Vertical Split Slider', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-vertical-split-slider';
	}

	public function get_categories() {
		return [ 'edge' ];
	}

	public function get_script_depends() {
		return array(
			'multiscroll'
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
			'enable_scrolling_animation',
			[
				'label'     => esc_html__( 'Enable Scrolling Animation', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'playerx-core'), 
					'yes' => esc_html__( 'Yes', 'playerx-core')
				),
				'default' => 'no'
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'left_sliding_panel',
			[
				'label' => esc_html__( 'Left Sliding Panel', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater1 = new \Elementor\Repeater();

		$repeater1->add_control(
			'background_color',
			[
				'label' => esc_html__( 'Background Color', 'playerx-core' ),
				'type'  => \Elementor\Controls_Manager::COLOR,
			]
		);

		$repeater1->add_control(
			'background_image',
			[
				'label' => esc_html__( 'Background Image', 'playerx-core' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$repeater1->add_control(
			'item_padding',
			[
				'label'       => esc_html__( 'Padding', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Insert padding in format: Top Right Bottom Left (e.g. 0px 0px 1px 0px)', 'playerx-core' )
			]
		);

		$repeater1->add_control(
			'alignment',
			[
				'label'       => esc_html__( 'Content Alignment', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::SELECT,
				'options' => [
					''       => esc_html__( 'Default', 'playerx-core' ),
					'left'   => esc_html__( 'Left', 'playerx-core' ),
					'right'  => esc_html__( 'Right', 'playerx-core' ),
					'center' => esc_html__( 'Center', 'playerx-core' ),
				],
			]
		);

		$repeater1->add_control(
			'header_style',
			[
				'label'       => esc_html__( 'Header/Bullets Style', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::SELECT,
				'options' => [
					''      => esc_html__( 'Default', 'playerx-core' ),
					'light' => esc_html__( 'Light', 'playerx-core' ),
					'dark'  => esc_html__( 'Dark', 'playerx-core' )
				],
			]
		);

		playerx_core_generate_elementor_templates_control( $repeater1 );

		$this->add_control(
			'left_slide_content_item',
			[
				'label'       => esc_html__( 'Left Slide Content Items', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater1->get_controls(),
				'title_field' => esc_html__( 'Left Slide Content Item' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'right_sliding_panel',
			[
				'label' => esc_html__( 'Right Sliding Panel', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater2 = new \Elementor\Repeater();

		$repeater2->add_control(
			'background_color',
			[
				'label' => esc_html__( 'Background Color', 'playerx-core' ),
				'type'  => \Elementor\Controls_Manager::COLOR,
			]
		);

		$repeater2->add_control(
			'background_image',
			[
				'label' => esc_html__( 'Background Image', 'playerx-core' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$repeater2->add_control(
			'item_padding',
			[
				'label'       => esc_html__( 'Padding', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Insert padding in format: Top Right Bottom Left (e.g. 0px 0px 1px 0px)', 'playerx-core' )
			]
		);

		$repeater2->add_control(
			'alignment',
			[
				'label'       => esc_html__( 'Content Alignment', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::SELECT,
				'options' => [
					''       => esc_html__( 'Default', 'playerx-core' ),
					'left'   => esc_html__( 'Left', 'playerx-core' ),
					'right'  => esc_html__( 'Right', 'playerx-core' ),
					'center' => esc_html__( 'Center', 'playerx-core' ),
				],
			]
		);

		$repeater2->add_control(
			'header_style',
			[
				'label'       => esc_html__( 'Header/Bullets Style', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::SELECT,
				'options' => [
					''      => esc_html__( 'Default', 'playerx-core' ),
					'light' => esc_html__( 'Light', 'playerx-core' ),
					'dark'  => esc_html__( 'Dark', 'playerx-core' )
				],
			]
		);

		playerx_core_generate_elementor_templates_control( $repeater2 );

		$this->add_control(
			'right_slide_content_item',
			[
				'label'       => esc_html__( 'Right Slide Content Items', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater2->get_controls(),
				'title_field' => esc_html__( 'Right Slide Content Item' ),
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();
		$holder_classes = $this->getHolderClasses( $params );
		?>
		<div class="edgtf-vertical-split-slider <?php echo esc_attr( $holder_classes ); ?>">
			<div class="edgtf-vss-ms-left">
				<?php foreach ( $params['left_slide_content_item'] as $left ) {
					$left['background_image'] = !empty($left['background_image']['id']) ? $left['background_image']['id'] : '';
					$left['content_data']     = $this->getContentData( $left );
					$left['content_style']    = $this->getContentStyles( $left );
					$left['content']          = Elementor\Plugin::instance()->frontend->get_builder_content_for_display($left['template_id']);

					echo playerx_core_get_shortcode_module_template_part( 'templates/vertical-split-slider-content-item-template', 'vertical-split-slider', '', $left );
				} ?>
			</div>

			<div class="edgtf-vss-ms-right">
				<?php foreach ( $params['right_slide_content_item'] as $right ) {
					$right['background_image'] = !empty($right['background_image']['id']) ? $right['background_image']['id'] : '';
					$right['content_data']     = $this->getContentData( $right );
					$right['content_style']    = $this->getContentStyles( $right );
					$right['content']          = Elementor\Plugin::instance()->frontend->get_builder_content_for_display($right['template_id']);

					echo playerx_core_get_shortcode_module_template_part( 'templates/vertical-split-slider-content-item-template', 'vertical-split-slider', '', $right );
				} ?>
			</div>
			<div class="edgtf-vss-horizontal-mask"></div>
			<div class="edgtf-vss-vertical-mask"></div>
		</div>
	<?php }

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = $params['enable_scrolling_animation'] === 'yes' ? 'edgtf-vss-scrolling-animation' : '';
		
		return implode( ' ', $holderClasses );
	}

	private function getContentData( $params ) {
		$data = array();

		if ( ! empty( $params['header_style'] ) ) {
			$data['data-header-style'] = $params['header_style'];
		}

		return $data;
	}

	private function getContentStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['background_color'];
		}

		if ( ! empty( $params['background_image'] ) ) {
			$url      = wp_get_attachment_url( $params['background_image'] );
			$styles[] = 'background-image: url(' . $url . ')';
		}

		if ( ! empty( $params['item_padding'] ) ) {
			$styles[] = 'padding: ' . $params['item_padding'];
		}

		if ( ! empty( $params['alignment'] ) ) {
			$styles[] = 'text-align: ' . $params['alignment'];
		}

		return implode( ';', $styles );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfVerticalSplitSlider() );
