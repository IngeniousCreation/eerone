<?php
class ElementorEdgtfBlogList extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_blog_list'; 
	}

	public function get_title() {
		return esc_html__( 'Blog List', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-blog-list';
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
			'type',
			[
				'label'     => esc_html__( 'Type', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'standard' => esc_html__( 'Standard', 'playerx-core'), 
					'boxed' => esc_html__( 'Boxed', 'playerx-core'), 
					'masonry' => esc_html__( 'Masonry', 'playerx-core'), 
					'simple' => esc_html__( 'Simple', 'playerx-core'), 
					'minimal' => esc_html__( 'Minimal', 'playerx-core')
				),
				'default' => 'standard'
			]
		);

		$this->add_control(
			'number_of_posts',
			[
				'label'     => esc_html__( 'Number of Posts', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'number_of_columns',
			[
				'label'     => esc_html__( 'Number of Columns', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'), 
					'one' => esc_html__( 'One', 'playerx-core'), 
					'two' => esc_html__( 'Two', 'playerx-core'), 
					'three' => esc_html__( 'Three', 'playerx-core'), 
					'four' => esc_html__( 'Four', 'playerx-core'), 
					'five' => esc_html__( 'Five', 'playerx-core'), 
					'six' => esc_html__( 'Six', 'playerx-core')
				),
				'default' => 'three',
				'condition' => [
					'type' => array( 'standard', 'boxed', 'masonry' )
				]
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
				'default' => 'no',
				'condition' => [
					'type' => array( 'standard', 'boxed', 'masonry' )
				]
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
				'default' => 'title'
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
			'category',
			[
				'label'     => esc_html__( 'Category', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'playerx-core' )
			]
		);

		$this->add_control(
			'image_size',
			[
				'label'     => esc_html__( 'Image Size', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'full' => esc_html__( 'Original', 'playerx-core'), 
					'playerx_edge_image_square' => esc_html__( 'Square', 'playerx-core'), 
					'playerx_edge_image_landscape' => esc_html__( 'Landscape', 'playerx-core'), 
					'playerx_edge_image_portrait' => esc_html__( 'Portrait', 'playerx-core'), 
					'thumbnail' => esc_html__( 'Thumbnail', 'playerx-core'), 
					'medium' => esc_html__( 'Medium', 'playerx-core'), 
					'large' => esc_html__( 'Large', 'playerx-core')
				),
				'default' => 'full',
				'condition' => [
					'type' => array( 'standard', 'boxed', 'masonry' )
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'post_info',
			[
				'label' => esc_html__( 'Post Info', 'playerx-core' ),
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
				'default' => 'h5'
			]
		);

		$this->add_control(
			'title_transform',
			[
				'label'     => esc_html__( 'Title Text Transform', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'), 
					'none' => esc_html__( 'None', 'playerx-core'), 
					'capitalize' => esc_html__( 'Capitalize', 'playerx-core'), 
					'uppercase' => esc_html__( 'Uppercase', 'playerx-core'), 
					'lowercase' => esc_html__( 'Lowercase', 'playerx-core'), 
					'initial' => esc_html__( 'Initial', 'playerx-core'), 
					'inherit' => esc_html__( 'Inherit', 'playerx-core')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'post_info_image',
			[
				'label'     => esc_html__( 'Enable Post Info Image', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes',
				'condition' => [
					'type' => array( 'standard', 'boxed', 'masonry' )
				]
			]
		);

		$this->add_control(
			'post_info_section',
			[
				'label'     => esc_html__( 'Enable Post Info Section', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes',
				'condition' => [
					'type' => array( 'standard', 'boxed', 'masonry' )
				]
			]
		);

		$this->add_control(
			'post_info_author',
			[
				'label'     => esc_html__( 'Enable Post Info Author', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'no',
				'condition' => [
					'post_info_section' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'post_info_date',
			[
				'label'     => esc_html__( 'Enable Post Info Date', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes',
				'condition' => [
					'post_info_section' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'post_info_category',
			[
				'label'     => esc_html__( 'Enable Post Info Category', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes',
				'condition' => [
					'post_info_section' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'post_info_excerpt',
			[
				'label'     => esc_html__( 'Enable Post Info Excerpt', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'playerx-core'), 
					'yes' => esc_html__( 'Yes', 'playerx-core')
				),
				'default' => 'no',
				'condition' => [
					'post_info_section' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'excerpt_length',
			[
				'label'     => esc_html__( 'Text Length', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Number of words', 'playerx-core' ),
				'condition' => [
					'post_info_excerpt' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'post_info_comments',
			[
				'label'     => esc_html__( 'Enable Post Info Comments', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'playerx-core'), 
					'yes' => esc_html__( 'Yes', 'playerx-core')
				),
				'default' => 'no',
				'condition' => [
					'post_info_section' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'post_info_like',
			[
				'label'     => esc_html__( 'Enable Post Info Like', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'playerx-core'), 
					'yes' => esc_html__( 'Yes', 'playerx-core')
				),
				'default' => 'no',
				'condition' => [
					'post_info_section' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'post_info_share',
			[
				'label'     => esc_html__( 'Enable Post Info Share', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'playerx-core'), 
					'yes' => esc_html__( 'Yes', 'playerx-core')
				),
				'default' => 'no',
				'condition' => [
					'post_info_section' => array( 'yes' )
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'additional_features',
			[
				'label' => esc_html__( 'Additional Features', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'pagination_type',
			[
				'label'     => esc_html__( 'Pagination Type', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no-pagination' => esc_html__( 'None', 'playerx-core'), 
					'standard-shortcodes' => esc_html__( 'Standard', 'playerx-core'), 
					'load-more' => esc_html__( 'Load More', 'playerx-core'), 
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'playerx-core')
				),
				'default' => 'no-pagination'
			]
		);


		$this->end_controls_section();
	}
	public function render() {
		$default_atts = array(
			'type'                  => 'standard',
			'number_of_posts'       => '-1',
			'number_of_columns'     => 'four',
			'space_between_items'   => 'normal',
			'category'              => '',
			'orderby'               => 'title',
			'order'                 => 'ASC',
			'image_size'            => 'full',
			'custom_image_width'    => '',
			'custom_image_height'   => '',
			'title_tag'             => 'h3',
			'title_transform'       => '',
			'excerpt_length'        => '40',
			'post_info_section'     => 'yes',
			'post_info_image'       => 'yes',
			'post_info_author'      => 'yes',
			'post_info_date'        => 'yes',
			'post_info_category'    => 'yes',
			'post_info_comments'    => 'no',
			'post_info_excerpt'     => 'no',
			'post_info_like'        => 'no',
			'post_info_share'       => 'no',
			'pagination_type'       => 'no-pagination'
		);
		$params       = shortcode_atts( $default_atts, $this->get_settings_for_display() );

		$queryArray             = $this->generateQueryArray( $params );
		$query_result           = new \WP_Query( $queryArray );
		$params['query_result'] = $query_result;
		
		$params['holder_data']    = $this->getHolderData( $params );
		$params['holder_classes'] = $this->getHolderClasses( $params, $default_atts );
		$params['module']         = 'list';
		
		$params['max_num_pages'] = $query_result->max_num_pages;
		$params['paged']         = isset( $query_result->query['paged'] ) ? $query_result->query['paged'] : 1;
		
		$params['this_object'] = $this;
		
		ob_start();
		
		playerx_edge_get_module_template_part( 'shortcodes/blog-list/holder', 'blog', $params['type'], $params );
		
		$html = ob_get_contents();
		
		ob_end_clean();

		echo playerx_edge_get_module_part($html);
	}

	public function getHolderClasses( $params, $default_atts ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['type'] ) ? 'edgtf-bl-' . $params['type'] : 'edgtf-bl-' . $default_atts['type'];
		$holderClasses[] = ! empty( $params['number_of_columns'] ) ? 'edgtf-' . $params['number_of_columns'] . '-columns' : 'edgtf-' . $default_atts['number_of_columns'] . '-columns';
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'edgtf-' . $params['space_between_items'] . '-space' : 'edgtf-' . $default_atts['space_between_items'] . '-space';
		$holderClasses[] = ! empty( $params['pagination_type'] ) ? 'edgtf-bl-pag-' . $params['pagination_type'] : 'edgtf-bl-pag-' . $default_atts['pagination_type'];
		
		return implode( ' ', $holderClasses );
	}

	public function getHolderData( $params ) {
		$dataString = '';
		
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
		
		$query_result = $params['query_result'];
		
		$params['max_num_pages'] = $query_result->max_num_pages;
		
		if ( ! empty( $paged ) ) {
			$params['next-page'] = $paged + 1;
		}
		
		foreach ( $params as $key => $value ) {
			if ( $key !== 'query_result' && $value !== '' ) {
				$new_key = str_replace( '_', '-', $key );
				
				$dataString .= ' data-' . $new_key . '=' . esc_attr( str_replace( ' ', '', $value ) );
			}
		}
		
		return $dataString;
	}

	public function generateQueryArray( $params ) {
		$queryArray = array(
			'post_status'    => 'publish',
			'post_type'      => 'post',
			'orderby'        => $params['orderby'],
			'order'          => $params['order'],
			'posts_per_page' => $params['number_of_posts'],
			'post__not_in'   => get_option( 'sticky_posts' )
		);
		
		if ( ! empty( $params['category'] ) ) {
			$queryArray['category_name'] = $params['category'];
		}
		
		if ( ! empty( $params['next_page'] ) ) {
			$queryArray['paged'] = $params['next_page'];
		} else {
			$query_array['paged'] = 1;
		}
		
		return $queryArray;
	}

	public function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['title_transform'];
		}
		
		return implode( ';', $styles );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfBlogList() );
