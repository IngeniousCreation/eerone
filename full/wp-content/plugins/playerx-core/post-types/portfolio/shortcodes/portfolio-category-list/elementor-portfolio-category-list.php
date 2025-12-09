<?php
class ElementorEdgtfPortfolioCategoryList extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_portfolio_category_list'; 
	}

	public function get_title() {
		return esc_html__( 'Portfolio Category List', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-portfolio-category-list';
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
				'label'     => esc_html__( 'Number of Columns', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Default value is Three', 'playerx-core' ),
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'), 
					'two' => esc_html__( 'Two', 'playerx-core'), 
					'three' => esc_html__( 'Three', 'playerx-core'), 
					'four' => esc_html__( 'Four', 'playerx-core'), 
					'five' => esc_html__( 'Five', 'playerx-core'), 
					'six' => esc_html__( 'Six', 'playerx-core')
				),
				'default' => 'three'
			]
		);

		$this->add_control(
			'space_between_items',
			[
				'label'     => esc_html__( 'Space Between Items', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'huge' => esc_html__( 'Huge', 'playerx-core'), 
					'large' => esc_html__( 'Large', 'playerx-core'), 
					'medium' => esc_html__( 'Medium', 'playerx-core'), 
					'normal' => esc_html__( 'Normal', 'playerx-core'), 
					'small' => esc_html__( 'Small', 'playerx-core'), 
					'tiny' => esc_html__( 'Tiny', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'normal'
			]
		);

		$this->add_control(
			'number_of_items',
			[
				'label'     => esc_html__( 'Number of Items Per Page', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Set number of items for your portfolio category list. Default value is 6', 'playerx-core' )
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'     => esc_html__( 'Order By', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'date' => esc_html__( 'Date', 'playerx-core'), 
					'ID' => esc_html__( 'ID', 'playerx-core'), 
					'menu_order' => esc_html__( 'Menu Order', 'playerx-core'), 
					'name' => esc_html__( 'Post Name', 'playerx-core'), 
					'rand' => esc_html__( 'Random', 'playerx-core'), 
					'title' => esc_html__( 'Title', 'playerx-core')
				),
				'default' => 'date'
			]
		);

		$this->add_control(
			'order',
			[
				'label'     => esc_html__( 'Order', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'ASC' => esc_html__( 'ASC', 'playerx-core'), 
					'DESC' => esc_html__( 'DESC', 'playerx-core')
				),
				'default' => 'ASC'
			]
		);

		$this->add_control(
			'image_proportions',
			[
				'label'     => esc_html__( 'Image Proportions', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Set image proportions for your portfolio category list', 'playerx-core' ),
				'options' => array(
					'full' => esc_html__( 'Original', 'playerx-core'), 
					'square' => esc_html__( 'Square', 'playerx-core'), 
					'landscape' => esc_html__( 'Landscape', 'playerx-core'), 
					'portrait' => esc_html__( 'Portrait', 'playerx-core'), 
					'medium' => esc_html__( 'Medium', 'playerx-core'), 
					'large' => esc_html__( 'Large', 'playerx-core')
				),
				'default' => 'full'
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
				'default' => 'h3'
			]
		);


		$this->end_controls_section();
	}
	public function render() {
		$args   = array(
			'number_of_columns'   => 'three',
			'space_between_items' => 'normal',
			'number_of_items'     => '6',
			'orderby'             => 'date',
			'order'               => 'ASC',
			'image_proportions'   => 'full',
			'title_tag'           => 'h3'
		);

		$params = $this->get_settings_for_display();

		$query_array              = $this->getQueryArray( $params );
		$params['query_results']  = get_terms( $query_array );
		$params['holder_classes'] = $this->getHolderClasses( $params, $args );
		$params['image_size']     = $this->getImageSize( $params );
		$params['title_tag']      = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];

		echo playerx_core_get_cpt_shortcode_module_template_part( 'portfolio', 'portfolio-category-list', 'portfolio-category-holder', '', $params );
	}

	public function getQueryArray( $params ) {
		$query_array = array(
			'taxonomy'   => 'portfolio-category',
			'number'     => $params['number_of_items'],
			'orderby'    => $params['orderby'],
			'order'      => $params['order'],
			'hide_empty' => true
		);
		
		return $query_array;
	}

	public function getHolderClasses( $params, $args ) {
		$classes = array();
		
		$classes[] = ! empty( $params['number_of_columns'] ) ? 'edgtf-' . $params['number_of_columns'] . '-columns' : 'edgtf-' . $args['number_of_columns'] . '-columns';
		$classes[] = ! empty( $params['space_between_items'] ) ? 'edgtf-' . $params['space_between_items'] . '-space' : 'edgtf-' . $args['space_between_items'] . '-space';
		
		return implode( ' ', $classes );
	}

	public function getImageSize( $params ) {
		$thumb_size = 'full';
		
		if ( ! empty( $params['image_proportions'] ) ) {
			$image_size = $params['image_proportions'];
			
			switch ( $image_size ) {
				case 'landscape':
					$thumb_size = 'playerx_edge_image_landscape';
					break;
				case 'portrait':
					$thumb_size = 'playerx_edge_image_portrait';
					break;
				case 'square':
					$thumb_size = 'playerx_edge_image_square';
					break;
				case 'medium':
					$thumb_size = 'medium';
					break;
				case 'large':
					$thumb_size = 'large';
					break;
				case 'full':
					$thumb_size = 'full';
					break;
			}
		}
		
		return $thumb_size;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfPortfolioCategoryList() );
