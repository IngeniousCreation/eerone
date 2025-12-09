<?php
class ElementorEdgtfFullScreenImageSlider extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_full_screen_image_slider'; 
	}

	public function get_title() {
		return esc_html__( 'Full Screen Image Slider', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-full-screen-image-slider';
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
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes'
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'custom_class',
			[
				'label'     => esc_html__( 'Custom CSS Class', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'playerx-core' )
			]
		);

		$repeater->add_control(
			'background_image',
			[
				'label'     => esc_html__( 'Background Image', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$repeater->add_control(
			'image_top',
			[
				'label'     => esc_html__( 'Content Image Top', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( 'Select image from media library', 'playerx-core' )
			]
		);

		$repeater->add_control(
			'image_left',
			[
				'label'     => esc_html__( 'Content Image Left', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( 'Select image from media library', 'playerx-core' )
			]
		);

		$repeater->add_control(
			'image_right',
			[
				'label'     => esc_html__( 'Content Image Right', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( 'Select image from media library', 'playerx-core' )
			]
		);

		$repeater->add_control(
			'title',
			[
				'label'     => esc_html__( 'Title', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
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
				'default' => '',
				'condition' => [
					'title!' => ''
				]
			]
		);

		$repeater->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'title!' => ''
				]
			]
		);

		$repeater->add_control(
			'subtitle',
			[
				'label'     => esc_html__( 'Subitle', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'subtitle_tag',
			[
				'label'     => esc_html__( 'Subitle Tag', 'playerx-core' ),
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
				'default' => '',
				'condition' => [
					'subtitle!' => ''
				]
			]
		);

		$repeater->add_control(
			'subtitle_color',
			[
				'label'     => esc_html__( 'Subitle Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'subtitle!' => ''
				]
			]
		);

		$this->add_control(
			'full_screen_image_slider_item',
			[
				'label'     => esc_html__( 'Full Screen Image Slider Item', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::REPEATER,
				'fields'     => $repeater->get_controls(),
				'title_field'     => esc_html__( 'Item', 'playerx-core' )
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$args   = array(
			'slider_speed'            => '5000',
			'slider_speed_animation'  => '500'
		);
		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['slider_data']    = $this->getSliderData( $params, $args );
		?>

		<div class="edgtf-full-screen-image-slider <?php echo esc_attr( $params['holder_classes'] ); ?>">
			<div class="edgtf-fsis-slider edgtf-owl-slider" <?php echo playerx_edge_get_inline_attrs( $params['slider_data'] ); ?>>
				<?php foreach ( $params['full_screen_image_slider_item'] as $fsisi ) {

					$fsisi['holder_classes']  = $this->getItemHolderClasses( $fsisi );
					$fsisi['image_styles']    = $this->getItemImageStyles( $fsisi );
					$fsisi['title_styles']    = $this->getItemTitleStyles( $fsisi );
					$fsisi['subtitle_styles'] = $this->getItemSubitleStyles( $fsisi );
					$fsisi['title_tag']       = ! empty( $fsisi['title_tag'] ) ? $fsisi['title_tag'] : 'h1';
					$fsisi['subtitle_tag']    = ! empty( $fsisi['subtitle_tag'] ) ? $fsisi['subtitle_tag'] : 'h5';
					$fsisi['image_top']       = ! empty( $fsisi['image_top'] ) ? $fsisi['image_top']['id'] : '';
					$fsisi['image_left']      = ! empty( $fsisi['image_left'] ) ? $fsisi['image_left']['id'] : '';
					$fsisi['image_right']     = ! empty( $fsisi['image_right'] ) ? $fsisi['image_right']['id'] : '';

					echo playerx_core_get_shortcode_module_template_part( 'templates/full-screen-image-slider-item', 'full-screen-image-slider', '', $fsisi  );
				} ?>
			</div>
			<div class="edgtf-fsis-thumb-nav edgtf-fsis-prev-nav"></div>
			<div class="edgtf-fsis-thumb-nav edgtf-fsis-next-nav"></div>
			<div class="edgtf-fsis-slider-mask"></div>
		</div>

	<?php
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		
		return implode( ' ', $holderClasses );
	}

	private function getSliderData( $params, $args ) {
		$slider_data = array();
		
		$slider_data['data-number-of-items']             = '1';
		$slider_data['data-enable-loop']                 = 'yes';
		$slider_data['data-enable-autoplay']             = 'yes';
		$slider_data['data-enable-autoplay-hover-pause'] = 'yes';
		$slider_data['data-slider-padding']              = 'no';
		$slider_data['data-slider-speed']                = ! empty( $params['slider_speed'] ) ? $params['slider_speed'] : $args['slider_speed'];
		$slider_data['data-slider-speed-animation']      = ! empty( $params['slider_speed_animation'] ) ? $params['slider_speed_animation'] : $args['slider_speed_animation'];
		$slider_data['data-enable-navigation']           = ! empty( $params['slider_navigation'] ) ? $params['slider_navigation'] : $args['slider_navigation'];
		$slider_data['data-enable-pagination']           = ! empty( $params['slider_pagination'] ) ? $params['slider_pagination'] : $args['slider_pagination'];
		
		return $slider_data;
	}

	private function getItemHolderClasses( $params ) {
		$holderClasses = array();

		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';

		return implode( ' ', $holderClasses );
	}

	private function getItemImageStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['background_image'] ) ) {
			$styles[] = 'background-image: url(' . wp_get_attachment_url( $params['background_image']['id'] ) . ')';
		}

		return implode( ';', $styles );
	}

	private function getItemTitleStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}

		return implode( ';', $styles );
	}

	private function getItemSubitleStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['subtitle_color'] ) ) {
			$styles[] = 'color: ' . $params['subtitle_color'];
		}

		return implode( ';', $styles );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfFullScreenImageSlider() );
