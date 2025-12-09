<?php
class PlayerxEdgeElementorProductListSimple extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_product_list_simple';
	}

	public function get_title() {
		return esc_html__( 'Product List - Simple', 'playerx' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-product-list-simple';
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
					'sale' => esc_html__( 'Sale', 'playerx'),
					'best-sellers' => esc_html__( 'Best Sellers', 'playerx'),
					'featured' => esc_html__( 'Featured', 'playerx')
				),
				'default' => 'sale'
			]
		);

		$this->add_control(
			'number',
			[
				'label'     => esc_html__( 'Number of Products', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Number of products to show (default value is 4)', 'playerx' ),
				'default'   => 4
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
					'title' => esc_html__( 'Title', 'playerx')
				),
				'default' => 'title',
				'condition' => [
					'type' => array( 'sale', 'featured' )
				]
			]
		);

		$this->add_control(
			'sort_order',
			[
				'label'     => esc_html__( 'Order', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'ASC' => esc_html__( 'ASC', 'playerx'),
					'DESC' => esc_html__( 'DESC', 'playerx')
				),
				'default' => 'ASC',
				'condition' => [
					'type' => array( 'sale', 'featured' )
				]
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
				'default' => 'uppercase',
				'condition' => [
					'display_title' => array( 'yes' )
				]
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
				'default' => 'yes'
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


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['class_name']     = 'pls';

		$params['title_tag']    = ! empty( $params['title_tag'] ) ? $params['title_tag'] : 'h5';
		$params['title_styles'] = $this->getTitleStyles( $params );

		$queryArray             = $this->generateProductQueryArray( $params );
		$query_result           = new \WP_Query( $queryArray );
		$params['query_result'] = $query_result;

		echo playerx_edge_get_woo_shortcode_module_template_part( 'templates/product-list-template', 'product-list-simple', '', $params );

	}

	private function getHolderClasses( $params ) {
		$holderClasses   = '';
		$productListType = $params['type'];

		switch ( $productListType ) {
			case 'sale':
				$holderClasses = 'edgtf-pls-sale';
				break;
			case 'best-sellers':
				$holderClasses = 'edgtf-pls-best-sellers';
				break;
			case 'featured':
				$holderClasses = 'edgtf-pls-featured';
				break;
			default:
				$holderClasses = 'edgtf-pls-sale';
				break;
		}

		return $holderClasses;
	}

	private function generateProductQueryArray( $params ) {
		switch ( $params['type'] ) {
			case 'sale':
				$args = array(
					'post_status'    => 'publish',
					'post_type'      => 'product',
					'posts_per_page' => $params['number'],
					'orderby'        => $params['orderby'],
					'order'          => $params['sort_order'],
					'no_found_rows'  => 1,
					'post__in'       => array_merge( array( 0 ), wc_get_product_ids_on_sale() )
				);
				break;
			case 'best-sellers':
				$args = array(
					'post_status'         => 'publish',
					'post_type'           => 'product',
					'ignore_sticky_posts' => 1,
					'posts_per_page'      => $params['number'],
					'meta_key'            => 'total_sales',
					'orderby'             => 'meta_value_num'
				);
				break;
			case 'featured':
				$args = array(
					'post_status'    => 'publish',
					'post_type'      => 'product',
					'posts_per_page' => $params['number'],
					'orderby'        => $params['orderby'],
					'order'          => $params['sort_order'],
					'tax_query' => array(
						array(
							'taxonomy' => 'product_visibility',
							'field'    => 'name',
							'terms'    => 'featured',
						),
					),
				);
				break;
		}

		return $args;
	}

	private function getTitleStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['title_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['title_transform'];
		}

		return implode( ';', $styles );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new PlayerxEdgeElementorProductListSimple() );
