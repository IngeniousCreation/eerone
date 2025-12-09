<?php
class ElementorEdgtfClientsGrid extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_clients_grid'; 
	}

	public function get_title() {
		return esc_html__( 'Clients Grid', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-clients-grid';
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
			'number_of_columns',
			[
				'label'   => esc_html__( 'Number of Columns', 'playerx-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					''      => esc_html__( 'Default', 'playerx-core'),
					'one'   => esc_html__( 'One', 'playerx-core'),
					'two'   => esc_html__( 'Two', 'playerx-core'),
					'three' => esc_html__( 'Three', 'playerx-core'), 
					'four'  => esc_html__( 'Four', 'playerx-core'),
					'five'  => esc_html__( 'Five', 'playerx-core'),
					'six'   => esc_html__( 'Six', 'playerx-core')
				),
				'default' => 'three'
			]
		);

		$this->add_control(
			'space_between_items',
			[
				'label'   => esc_html__( 'Space Between Items', 'playerx-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'huge'   => esc_html__( 'Huge', 'playerx-core'),
					'large'  => esc_html__( 'Large', 'playerx-core'),
					'medium' => esc_html__( 'Medium', 'playerx-core'), 
					'normal' => esc_html__( 'Normal', 'playerx-core'), 
					'small'  => esc_html__( 'Small', 'playerx-core'),
					'tiny'   => esc_html__( 'Tiny', 'playerx-core'),
					'no'     => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'normal'
			]
		);

		$this->add_control(
			'image_alignment',
			[
				'label'   => esc_html__( 'Items Horizontal Alignment', 'playerx-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					''      => esc_html__( 'Default Center', 'playerx-core'),
					'left'  => esc_html__( 'Left', 'playerx-core'),
					'right' => esc_html__( 'Right', 'playerx-core')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'items_hover_animation',
			[
				'label'   => esc_html__( 'Items Hover Animation', 'playerx-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'switch-images' => esc_html__( 'Switch Images', 'playerx-core'), 
					'roll-over'     => esc_html__( 'Roll Over', 'playerx-core')
				),
				'default' => 'switch-images'
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'image',
			[
				'label'       => esc_html__( 'Image', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( 'Select image from media library', 'playerx-core' )
			]
		);

		$repeater->add_control(
			'hover_image',
			[
				'label'       => esc_html__( 'Hover Image', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( 'Select image from media library', 'playerx-core' )
			]
		);

		$repeater->add_control(
			'image_size',
			[
				'label'       => esc_html__( 'Image Size', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use &quot;thumbnail&quot; size', 'playerx-core' )
			]
		);

		$repeater->add_control(
			'link',
			[
				'label' => esc_html__( 'Custom Link', 'playerx-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'target',
			[
				'label'     => esc_html__( 'Custom Link Target', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => array(
					'_self'  => esc_html__( 'Same Window', 'playerx-core'),
					'_blank' => esc_html__( 'New Window', 'playerx-core')
				),
				'default'   => '_self'
			]
		);

		$this->add_control(
			'clients_carousel_item',
			[
				'label'       => esc_html__( 'Clients Carousel Item', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => esc_html__( 'Item', 'playerx-core' )
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();
		$params['holder_classes'] = $this->getHolderClasses( $params );
		?>
		<div class="edgtf-clients-grid-holder edgtf-grid-list edgtf-disable-bottom-space <?php echo esc_attr( $params['holder_classes'] ); ?>">
			<div class="edgtf-cg-inner edgtf-outer-space">
				<?php foreach ( $params['clients_carousel_item'] as $client ) {

					$client['holder_classes']   = $this->getItemHolderClasses( $client );
					$client['image']            = $this->getItemCarouselImage( $client );
					$client['hover_image']      = $this->getItemCarouselHoverImage( $client );

					echo playerx_core_get_shortcode_module_template_part( 'templates/clients-carousel-item', 'clients-carousel', '', $client );
				} ?>
			</div>
		</div>
		<?php
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['number_of_columns'] ) ? 'edgtf-' . $params['number_of_columns'] . '-columns' : 'edgtf-' . $args['number_of_columns'] . '-columns';
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'edgtf-' . $params['space_between_items'] . '-space' : 'edgtf-' . $args['space_between_items'] . '-space';
		$holderClasses[] = ! empty( $params['image_alignment'] ) ? 'edgtf-cg-alignment-' . $params['image_alignment'] : '';
		$holderClasses[] = ! empty( $params['items_hover_animation'] ) ? 'edgtf-cc-hover-' . $params['items_hover_animation'] : 'edgtf-cc-hover-' . $args['items_hover_animation'];
		
		return implode( ' ', $holderClasses );
	}

	private function getItemHolderClasses( $params ) {
		$holderClasses = array();

		$holderClasses[] = ! empty( $params['link'] ) ? 'edgtf-cci-has-link' : 'edgtf-cci-no-link';

		return implode( ' ', $holderClasses );
	}

	private function getItemCarouselImage( $params ) {
		$image_meta = array();

		if ( ! empty( $params['image'] ) ) {
			$image_size     = $this->getItemCarouselImageSize( $params['image_size'] );
			$image_id       = $params['image']['id'];
			$image_original = wp_get_attachment_image_src( $image_id, $image_size );
			$image['url']   = $image_original[0];
			$image['alt']   = get_post_meta( $image_id, '_wp_attachment_image_alt', true );

			$image_meta = $image;
		}

		return $image_meta;
	}

	private function getItemCarouselHoverImage( $params ) {
		$image_meta = array();

		if ( ! empty( $params['hover_image'] ) ) {
			$image_size     = $this->getItemCarouselImageSize( $params['image_size'] );
			$image_id       = $params['hover_image']['id'];
			$image_original = wp_get_attachment_image_src( $image_id, $image_size );
			$image['url']   = $image_original[0];
			$image['alt']   = get_post_meta( $image_id, '_wp_attachment_image_alt', true );

			$image_meta = $image;
		}

		return $image_meta;
	}

	private function getItemCarouselImageSize( $image_size ) {
		$image_size = trim( $image_size );

		//Find digits
		preg_match_all( '/\d+/', $image_size, $matches );

		if ( in_array( $image_size, array( 'thumbnail', 'thumb', 'medium', 'large', 'full' ) ) ) {
			return $image_size;
		} elseif ( ! empty( $matches[0] ) ) {
			return array(
				$matches[0][0],
				$matches[0][1]
			);
		} else {
			return 'full';
		}
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfClientsGrid() );
