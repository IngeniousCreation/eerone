<?php
class PlayerxEdgeElementorProductList extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_product_list';
	}

	public function get_title() {
		return esc_html__( 'Product List', 'playerx' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-product-list';
	}

	public function get_categories() {
		return [ 'edge' ];
	}

	public function get_style_depends() {
		return array(
			'playerx-edge-woo'
		);
	}

	protected function register_controls() {

		$this->start_controls_section(
			'general',
			[
				'label' => esc_html__( 'General', 'playerx' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'type',
			[
				'label'     => esc_html__( 'Type', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'standard' => esc_html__( 'Standard', 'playerx'),
					'masonry' => esc_html__( 'Masonry', 'playerx')
				),
				'default' => 'standard'
			]
		);

		$this->add_control(
			'info_position',
			[
				'label'     => esc_html__( 'Product Info Position', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'info-on-image' => esc_html__( 'Info On Image Hover', 'playerx'),
					'info-below-image' => esc_html__( 'Info Below Image', 'playerx')
				),
				'default' => 'info-on-image'
			]
		);

		$this->add_control(
			'number_of_posts',
			[
				'label'     => esc_html__( 'Number of Products', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'default'   => 8
			]
		);

		$this->add_control(
			'number_of_columns',
			[
				'label'     => esc_html__( 'Number of Columns', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx'),
					'one' => esc_html__( 'One', 'playerx'),
					'two' => esc_html__( 'Two', 'playerx'),
					'three' => esc_html__( 'Three', 'playerx'),
					'four' => esc_html__( 'Four', 'playerx'),
					'five' => esc_html__( 'Five', 'playerx'),
					'six' => esc_html__( 'Six', 'playerx')
				),
				'default' => 'three'
			]
		);

		$this->add_control(
			'space_between_items',
			[
				'label'     => esc_html__( 'Space Between Items', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx'),
					'huge' => esc_html__( 'Huge', 'playerx'),
					'large' => esc_html__( 'Large', 'playerx'),
					'medium' => esc_html__( 'Medium', 'playerx'),
					'normal' => esc_html__( 'Normal', 'playerx'),
					'small' => esc_html__( 'Small', 'playerx'),
					'tiny' => esc_html__( 'Tiny', 'playerx'),
					'no' => esc_html__( 'No', 'playerx')
				),
				'default' => 'normal'
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'     => esc_html__( 'Order By', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'date' => esc_html__( 'Date', 'playerx'),
					'ID' => esc_html__( 'ID', 'playerx'),
					'menu_order' => esc_html__( 'Menu Order', 'playerx'),
					'name' => esc_html__( 'Post Name', 'playerx'),
					'rand' => esc_html__( 'Random', 'playerx'),
					'title' => esc_html__( 'Title', 'playerx'),
					'on-sale' => esc_html__( 'On Sale', 'playerx')
				),
				'default' => 'date'
			]
		);

		$this->add_control(
			'order',
			[
				'label'     => esc_html__( 'Order', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'ASC' => esc_html__( 'ASC', 'playerx'),
					'DESC' => esc_html__( 'DESC', 'playerx')
				),
				'default' => 'ASC'
			]
		);

		$this->add_control(
			'taxonomy_to_display',
			[
				'label'     => esc_html__( 'Choose Sorting Taxonomy', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'playerx' ),
				'options' => array(
					'category' => esc_html__( 'Category', 'playerx'),
					'tag' => esc_html__( 'Tag', 'playerx'),
					'id' => esc_html__( 'Id', 'playerx')
				),
				'default' => 'category'
			]
		);

		$this->add_control(
			'taxonomy_values',
			[
				'label'     => esc_html__( 'Enter Taxonomy Values', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Separate values (category slugs, tags, or post IDs) with a comma', 'playerx' )
			]
		);

		$this->add_control(
			'image_size',
			[
				'label'     => esc_html__( 'Image Proportions', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx'),
					'full' => esc_html__( 'Original', 'playerx'),
					'square' => esc_html__( 'Square', 'playerx'),
					'landscape' => esc_html__( 'Landscape', 'playerx'),
					'portrait' => esc_html__( 'Portrait', 'playerx'),
					'medium' => esc_html__( 'Medium', 'playerx'),
					'large' => esc_html__( 'Large', 'playerx'),
					'woocommerce_single' => esc_html__( 'Shop Single', 'playerx'),
					'woocommerce_thumbnail' => esc_html__( 'Shop Thumbnail', 'playerx')
				),
				'default' => 'full'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'product_info',
			[
				'label' => esc_html__( 'Product Info', 'playerx' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'display_title',
			[
				'label'     => esc_html__( 'Display Title', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx'),
					'no' => esc_html__( 'No', 'playerx')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'display_category',
			[
				'label'     => esc_html__( 'Display Category', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'playerx'),
					'yes' => esc_html__( 'Yes', 'playerx')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'display_excerpt',
			[
				'label'     => esc_html__( 'Display Excerpt', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'playerx'),
					'yes' => esc_html__( 'Yes', 'playerx')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'display_rating',
			[
				'label'     => esc_html__( 'Display Rating', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx'),
					'no' => esc_html__( 'No', 'playerx')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'display_price',
			[
				'label'     => esc_html__( 'Display Price', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx'),
					'no' => esc_html__( 'No', 'playerx')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'display_button',
			[
				'label'     => esc_html__( 'Display Button', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx'),
					'no' => esc_html__( 'No', 'playerx')
				),
				'default' => 'yes'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'product_info_style',
			[
				'label' => esc_html__( 'Product Info Style', 'playerx' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label'     => esc_html__( 'Title Tag', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx'),
					'h1' => esc_html__( 'h1', 'playerx'),
					'h2' => esc_html__( 'h2', 'playerx'),
					'h3' => esc_html__( 'h3', 'playerx'),
					'h4' => esc_html__( 'h4', 'playerx'),
					'h5' => esc_html__( 'h5', 'playerx'),
					'h6' => esc_html__( 'h6', 'playerx')
				),
				'default' => 'h5',
				'condition' => [
					'display_title' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'title_transform',
			[
				'label'     => esc_html__( 'Title Text Transform', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx'),
					'none' => esc_html__( 'None', 'playerx'),
					'capitalize' => esc_html__( 'Capitalize', 'playerx'),
					'uppercase' => esc_html__( 'Uppercase', 'playerx'),
					'lowercase' => esc_html__( 'Lowercase', 'playerx'),
					'initial' => esc_html__( 'Initial', 'playerx'),
					'inherit' => esc_html__( 'Inherit', 'playerx')
				),
				'default' => '',
				'condition' => [
					'display_title' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'excerpt_length',
			[
				'label'     => esc_html__( 'Excerpt Length', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Number of characters', 'playerx' ),
				'condition' => [
					'display_excerpt' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'button_skin',
			[
				'label'     => esc_html__( 'Button Skin', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'default' => esc_html__( 'Default', 'playerx'),
					'light' => esc_html__( 'Light', 'playerx'),
					'dark' => esc_html__( 'Dark', 'playerx')
				),
				'default' => 'default',
				'condition' => [
					'display_button' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'shader_background_color',
			[
				'label'     => esc_html__( 'Shader Background Color', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'info_bottom_text_align',
			[
				'label'     => esc_html__( 'Product Info Text Alignment', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx'),
					'left' => esc_html__( 'Left', 'playerx'),
					'center' => esc_html__( 'Center', 'playerx'),
					'right' => esc_html__( 'Right', 'playerx')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'info_bottom_margin',
			[
				'label'     => esc_html__( 'Product Info Bottom Margin (px)', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['class_name']     = 'pli';
		$params['type']           = ! empty( $params['type'] ) ? $params['type'] : 'standard';
		$params['info_position']  = ! empty( $params['info_position'] ) ? $params['info_position'] : 'info-on-image';
		$params['title_tag']      = ! empty( $params['title_tag'] ) ? $params['title_tag'] : 'h5';

		$additional_params                   = array();
		$additional_params['holder_classes'] = $this->getHolderClasses( $params );

		$queryArray                        = $this->generateProductQueryArray( $params );
		$query_result                      = new \WP_Query( $queryArray );
		$additional_params['query_result'] = $query_result;

		$params['this_object'] = $this;

		echo playerx_edge_get_woo_shortcode_module_template_part( 'templates/product-list', 'product-list', $params['type'], $params, $additional_params );

	}

	private function getHolderClasses( $params ) {
		$holderClasses   = array();
		$holderClasses[] = ! empty( $params['type'] ) ? 'edgtf-' . $params['type'] . '-layout' : '';
		$holderClasses[] = ! empty( $params['number_of_columns'] ) ? 'edgtf-' . $params['number_of_columns'] . '-columns' : '';
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'edgtf-' . $params['space_between_items'] . '-space' : '';
		$holderClasses[] = ! empty( $params['info_position'] ) ? 'edgtf-' . $params['info_position'] : '';
		$holderClasses[] = ! empty( $params['product_info_skin'] ) ? 'edgtf-product-info-' . $params['product_info_skin'] : '';

		return implode( ' ', $holderClasses );
	}

	private function generateProductQueryArray( $params ) {
		$queryArray = array(
			'post_status'         => 'publish',
			'post_type'           => 'product',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $params['number_of_posts'],
			'orderby'             => $params['orderby'],
			'order'               => $params['order']
		);

		if ( $params['orderby'] === 'on-sale' ) {
			$queryArray['no_found_rows'] = 1;
			$queryArray['post__in']      = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
		}

		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category' ) {
			$queryArray['product_cat'] = $params['taxonomy_values'];
		}

		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag' ) {
			$queryArray['product_tag'] = $params['taxonomy_values'];
		}

		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id' ) {
			$idArray                = $params['taxonomy_values'];
			$ids                    = explode( ',', $idArray );
			$queryArray['orderby'] = 'post__in';
			$queryArray['post__in'] = $ids;
		}

		return $queryArray;
	}

	public function getItemClasses( $params ) {
		$itemClasses = array();

		$image_size_meta = get_post_meta( get_the_ID(), 'edgtf_product_featured_image_size', true );

		if ( ! empty( $image_size_meta ) ) {
			$itemClasses[] = 'edgtf-fixed-masonry-item edgtf-masonry-size-' . $image_size_meta;
		}

		return implode( ' ', $itemClasses );
	}

	public function getTitleStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['title_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['title_transform'];
		}

		return implode( ';', $styles );
	}

	public function getShaderStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['shader_background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['shader_background_color'];
		}

		return implode( ';', $styles );
	}

	public function getTextWrapperStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['info_bottom_text_align'] ) ) {
			$styles[] = 'text-align: ' . $params['info_bottom_text_align'];
		}

		if ( $params['info_bottom_margin'] !== '' ) {
			$styles[] = 'margin-bottom: ' . playerx_edge_filter_px( $params['info_bottom_margin'] ) . 'px';
		}

		return implode( ';', $styles );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new PlayerxEdgeElementorProductList() );
