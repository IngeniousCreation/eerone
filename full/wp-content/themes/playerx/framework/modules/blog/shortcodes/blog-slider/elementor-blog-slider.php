<?php
class ElementorEdgtfBlogSlider extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_blog_slider'; 
	}

	public function get_title() {
		return esc_html__( 'Blog Slider', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-blog-slider';
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
			'slider_type',
			[
				'label'     => esc_html__( 'Type', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'slider' => esc_html__( 'Slider', 'playerx-core'), 
					'carousel' => esc_html__( 'Carousel', 'playerx-core'), 
					'carousel-centered' => esc_html__( 'Carousel Centered', 'playerx-core')
				),
				'default' => 'slider'
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
				'default' => 'full'
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
			'post_info_category',
			[
				'label'     => esc_html__( 'Enable Post Info Category', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes'
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
				'default' => 'yes'
			]
		);

		$this->add_control(
			'post_info_excerpt',
			[
				'label'     => esc_html__( 'Enable Post Info Excerpt', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes'
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


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();
		
		$queryArray             = $this->generateBlogQueryArray( $params );
		$query_result           = new \WP_Query( $queryArray );
		$params['query_result'] = $query_result;
		
		$params['slider_type']    = ! empty( $params['slider_type'] ) ? $params['slider_type'] : 'slider';
		$params['slider_classes'] = $this->getSliderClasses( $params );
		$params['slider_data']    = $this->getSliderData( $params );
		
		ob_start();
		
		playerx_edge_get_module_template_part( 'shortcodes/blog-slider/holder', 'blog', '', $params );
		
		$html = ob_get_contents();
		
		ob_end_clean();

		echo playerx_edge_get_module_part($html);
	}

	public function generateBlogQueryArray( $params ) {
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
		
		return $queryArray;
	}

	public function getSliderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = 'edgtf-bs-' . $params['slider_type'];
		
		return implode( ' ', $holderClasses );
	}

	private function getSliderData( $params ) {
		$type        = $params['slider_type'];
		$slider_data = array();
		
		$slider_data['data-post-info-excerpt']   = $params['post_info_excerpt'];
		
		if($type == 'carousel') {
			$slider_data['data-number-of-items']   = '2';
			$slider_data['data-slider-margin']     = '80';
			$slider_data['data-slider-padding']    = 'yes';
			$slider_data['data-enable-navigation'] = 'no';
		} else if ($type == 'carousel-centered') {
			$slider_data['data-number-of-items']   = '2';
			$slider_data['data-slider-margin']     = '30';
			$slider_data['data-enable-center']     = 'yes';
			$slider_data['data-enable-navigation'] = 'no';
			$slider_data['data-enable-pagination'] = 'no';
		} else {
			$slider_data['data-number-of-items']   = '1';
			$slider_data['data-enable-pagination'] = 'no';
            $slider_data['data-enable-navigation'] = 'no';
		}
		
		return $slider_data;
	}
}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfBlogSlider() );
