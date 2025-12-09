<?php
class ElementorEdgtfFullScreenSections extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_full_screen_sections'; 
	}

	public function get_title() {
		return esc_html__( 'Full Screen Sections', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-full-screen-sections';
	}

	public function get_categories() {
		return [ 'edge' ];
	}

	public function get_script_depends() {
		return array(
			'fullPage'
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
			'enable_continuous_vertical',
			[
				'label'     => esc_html__( 'Enable Continuous Scrolling', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Defines whether scrolling down in the last section or should scroll down to the first one and if scrolling up in the first section should scroll up to the last one', 'playerx-core' ),
				'options' => array(
					'no' => esc_html__( 'No', 'playerx-core'), 
					'yes' => esc_html__( 'Yes', 'playerx-core')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'enable_navigation',
			[
				'label'     => esc_html__( 'Enable Navigation Arrows', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'enable_pagination',
			[
				'label'     => esc_html__( 'Enable Pagination Dots', 'playerx-core' ),
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
			'background_color',
			[
				'label'     => esc_html__( 'Background Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR
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
			'background_position',
			[
				'label'     => esc_html__( 'Background Image Position', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Please insert position in format horizontal vertical position, example - center center', 'playerx-core' ),
				'condition' => [
					'background_image!' => ''
				]
			]
		);

		$repeater->add_control(
			'background_size',
			[
				'label'     => esc_html__( 'Background Image Size', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'cover' => esc_html__( 'Cover', 'playerx-core'),
					'contain' => esc_html__( 'Contain', 'playerx-core'),
					'inherit' => esc_html__( 'Inherit', 'playerx-core')
				),
				'default' => 'cover',
				'condition' => [
					'background_image!' => ''
				]
			]
		);

		$repeater->add_control(
			'padding',
			[
				'label'     => esc_html__( 'Content Padding', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Please insert padding in format top right bottom left. You can use px or %', 'playerx-core' )
			]
		);

		$repeater->add_control(
			'vertical_alignment',
			[
				'label'     => esc_html__( 'Content Vertical Alignment', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'),
					'top' => esc_html__( 'Top', 'playerx-core'),
					'middle' => esc_html__( 'Middle', 'playerx-core'),
					'bottom' => esc_html__( 'Bottom', 'playerx-core')
				),
				'default' => ''
			]
		);

		$repeater->add_control(
			'horizontal_alignment',
			[
				'label'     => esc_html__( 'Content Horizontal Alignment', 'playerx-core' ),
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

		$repeater->add_control(
			'link',
			[
				'label'     => esc_html__( 'Link', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Set custom link around item', 'playerx-core' )
			]
		);

		$repeater->add_control(
			'link_target',
			[
				'label'     => esc_html__( 'Custom Link Target', 'playerx-core' ),
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

		$repeater->add_control(
			'header_skin',
			[
				'label'     => esc_html__( 'Header and Navigation Skin', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Choose a predefined header style for header elements and for full screen sections navigation/pagination', 'playerx-core' ),
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'),
					'light' => esc_html__( 'Light', 'playerx-core'),
					'dark' => esc_html__( 'Dark', 'playerx-core')
				),
				'default' => ''
			]
		);

		$repeater->add_control(
			'image_laptop',
			[
				'label'     => esc_html__( 'Background Image for Laptops', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$repeater->add_control(
			'image_tablet',
			[
				'label'     => esc_html__( 'Background Image for Tablets - Landscape', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$repeater->add_control(
			'image_tablet_portrait',
			[
				'label'     => esc_html__( 'Background Image for Tablets - Portrait', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$repeater->add_control(
			'image_mobile',
			[
				'label'     => esc_html__( 'Background Image for Mobiles', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$repeater->add_control(
			'full_screen_sections_text',
			[
				'label'       => esc_html__( 'Text', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
			]
		);

		playerx_core_generate_elementor_templates_control( $repeater, array('full_screen_sections_text' => '') );

		$this->add_control(
			'full_screen_sections_item',
			[
				'label'     => esc_html__( 'Full Screen Sections Item', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field'     => esc_html__( 'Item', 'playerx-core' )
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();
		
		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['holder_data']    = $this->getHolderData( $params );
		?>

		<div class="edgtf-full-screen-sections <?php echo esc_attr( $params['holder_classes'] ); ?>" <?php echo playerx_edge_get_inline_attrs( $params['holder_data'] ); ?>>
			<div class="edgtf-fss-wrapper">
				<?php foreach ( $params['full_screen_sections_item'] as $fssi ) {

					$fssi['background_image']       = !empty($fssi['background_image']) ? $fssi['background_image']['id'] : '';
					$fssi['image_laptop']           = !empty($fssi['image_laptop']) ? $fssi['image_laptop']['id'] : '';
					$fssi['image_tablet']           = !empty($fssi['image_tablet']) ? $fssi['image_tablet']['id'] : '';
					$fssi['image_tablet_portrait']  = !empty($fssi['image_tablet_portrait']) ? $fssi['image_tablet_portrait']['id'] : '';
					$fssi['image_mobile']           = !empty($fssi['image_mobile']) ? $fssi['image_mobile']['id'] : '';


					$rand_class = 'eltdf-fss-custom-' . mt_rand(100000,1000000);
					$fssi['holder_unique_class'] = $rand_class;
					$fssi['holder_classes']      = $this->getItemHolderClasses( $fssi );
					$fssi['holder_data']         = $this->getItemHolderData( $fssi );
					$fssi['holder_styles']       = $this->getItemHolderStyles( $fssi );
					$fssi['item_inner_styles']   = $this->getItemInnerStyles( $fssi );
					if( ! empty( $fssi['full_screen_sections_text'] ) ){
						$fssi['content'] = $fssi['full_screen_sections_text'];
					} else if(empty( $fssi['full_screen_sections_text']) && ! empty($fssi['template_id'])) {
						$fssi['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display($fssi['template_id']);
					} else {
						$fssi['content'] = '';
					}

					echo playerx_core_get_shortcode_module_template_part( 'templates/full-screen-sections-item', 'full-screen-sections', '', $fssi );
				} ?>
			</div>
			<?php if($params['enable_navigation'] === 'yes') { ?>
				<div class="edgtf-fss-nav-holder">
					<a id="edgtf-fss-nav-up" href="#"><span class='icon-arrows-up'></span></a>
					<a id="edgtf-fss-nav-down" href="#"><span class='icon-arrows-down'></span></a>
				</div>
			<?php } ?>
		</div>

		<?php
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = $params['enable_navigation'] === 'yes' ? 'edgtf-fss-has-nav' : '';
		
		return implode( ' ', $holderClasses );
	}

	private function getHolderData( $params ) {
		$data = array();
		
		if ( ! empty( $params['enable_continuous_vertical'] ) ) {
			$data['data-enable-continuous-vertical'] = $params['enable_continuous_vertical'];
		}
		
		if ( ! empty( $params['enable_navigation'] ) ) {
			$data['data-enable-navigation'] = $params['enable_navigation'];
		}
		
		if ( ! empty( $params['enable_pagination'] ) ) {
			$data['data-enable-pagination'] = $params['enable_pagination'];
		}
		
		return $data;
	}

	private function getItemHolderClasses( $params ) {
		$holderClasses = array();

		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['holder_unique_class'] ) ? $params['holder_unique_class'] : '';
		$holderClasses[] = ! empty( $params['vertical_alignment'] ) ? 'edgtf-fss-item-va-' . $params['vertical_alignment'] : '';
		$holderClasses[] = ! empty( $params['horizontal_alignment'] ) ? 'edgtf-fss-item-ha-' . $params['horizontal_alignment'] : '';
		$holderClasses[] = ! empty( $params['link'] ) ? 'edgtf-fss-item-has-link' : '';
		$holderClasses[] = ! empty( $params['header_skin'] ) ? 'edgtf-fss-item-has-style' : '';

		return implode( ' ', $holderClasses );
	}

	private function getItemHolderData( $params ) {
		$data                    = array();
		$data['data-item-class'] = $params['holder_unique_class'];

		if ( ! empty( $params['header_skin'] ) ) {
			$data['data-header-style'] = $params['header_skin'];
		}

		if ( ! empty( $params['image_laptop'] ) ) {
			$image                     = wp_get_attachment_image_src( $params['image_laptop'], 'full' );
			$data['data-laptop-image'] = $image[0];
		}

		if ( ! empty( $params['image_tablet'] ) ) {
			$image                     = wp_get_attachment_image_src( $params['image_tablet'], 'full' );
			$data['data-tablet-image'] = $image[0];
		}

		if ( ! empty( $params['image_tablet_portrait'] ) ) {
			$image                              = wp_get_attachment_image_src( $params['image_tablet_portrait'], 'full' );
			$data['data-tablet-portrait-image'] = $image[0];
		}

		if ( ! empty( $params['image_mobile'] ) ) {
			$image                     = wp_get_attachment_image_src( $params['image_mobile'], 'full' );
			$data['data-mobile-image'] = $image[0];
		}

		return $data;
	}

	private function getItemHolderStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['background_color'];
		}

		if ( ! empty( $params['background_image'] ) ) {
			$styles[] = 'background-image: url(' . wp_get_attachment_url( $params['background_image'] ) . ')';

			if ( ! empty( $params['background_position'] ) ) {
				$styles[] = 'background-position:' . $params['background_position'];
			}

			if ( ! empty( $params['background_size'] ) ) {
				$styles[] = 'background-size:' . $params['background_size'];
			}
		}

		return implode( ';', $styles );
	}

	private function getItemInnerStyles( $params ) {
		$styles = array();

		if ( $params['padding'] !== '' ) {
			$styles[] = 'padding: ' . $params['padding'];
		}

		return implode( ';', $styles );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfFullScreenSections() );
