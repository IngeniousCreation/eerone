<?php
class ElementorEdgtfPortfolioSlider extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_portfolio_slider'; 
	}

	public function get_title() {
		return esc_html__( 'Portfolio Slider', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-portfolio-slider';
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
			'number_of_items',
			[
				'label'     => esc_html__( 'Number of Portfolios Items', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Set number of items for your portfolio slider. Enter -1 to show all', 'playerx-core' )
			]
		);

		$this->add_control(
			'item_type',
			[
				'label'     => esc_html__( 'Click Behavior', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Open portfolio single page on click', 'playerx-core'), 
					'gallery' => esc_html__( 'Open gallery in Pretty Photo on click', 'playerx-core')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'number_of_columns',
			[
				'label'     => esc_html__( 'Number of Columns', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Number of portfolios that are showing at the same time in slider (on smaller screens is responsive so there will be less items shown). Default value is Four', 'playerx-core' ),
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'), 
					'one' => esc_html__( 'One', 'playerx-core'), 
					'two' => esc_html__( 'Two', 'playerx-core'), 
					'three' => esc_html__( 'Three', 'playerx-core'), 
					'four' => esc_html__( 'Four', 'playerx-core'), 
					'five' => esc_html__( 'Five', 'playerx-core'), 
					'six' => esc_html__( 'Six', 'playerx-core')
				),
				'default' => 'four'
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
			'image_proportions',
			[
				'label'     => esc_html__( 'Image Proportions', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Set image proportions for your portfolio slider.', 'playerx-core' ),
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
			'category',
			[
				'label'     => esc_html__( 'One-Category Portfolio List', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'playerx-core' )
			]
		);

		$this->add_control(
			'selected_projects',
			[
				'label'     => esc_html__( 'Show Only Projects with Listed IDs', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Delimit ID numbers by comma (leave empty for all)', 'playerx-core' )
			]
		);

		$this->add_control(
			'tag',
			[
				'label'     => esc_html__( 'One-Tag Portfolio List', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter one tag slug (leave empty for showing all tags)', 'playerx-core' )
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
			'enable_fullheight',
			[
				'label'     => esc_html__( 'Fullheight slider?', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'portfolio_slider_full_height_decrease',
			[
				'label'     => esc_html__( 'Decrease Slider Height?', 'playerx-core' ),
				'description' => esc_html__( 'Decrease slider height for Header and Title areas height', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_layout',
			[
				'label' => esc_html__( 'Content Layout', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'item_style',
			[
				'label'     => esc_html__( 'Item Style', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'standard-shader' => esc_html__( 'Standard - Shader', 'playerx-core'), 
					'standard-switch-images' => esc_html__( 'Standard - Switch Featured Images', 'playerx-core'), 
					'gallery-overlay' => esc_html__( 'Gallery - Overlay', 'playerx-core'), 
					'gallery-slide-from-image-bottom' => esc_html__( 'Gallery - Slide From Image Bottom', 'playerx-core')
				),
				'default' => 'standard-shader'
			]
		);

		$this->add_control(
			'content_top_margin',
			[
				'label'     => esc_html__( 'Content Top Margin (px or %)', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'item_style' => array( 'standard-shader', 'standard-switch-images' )
				]
			]
		);

		$this->add_control(
			'content_bottom_margin',
			[
				'label'     => esc_html__( 'Content Bottom Margin (px or %)', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'item_style' => array( 'standard-shader', 'standard-switch-images' )
				]
			]
		);

		$this->add_control(
			'enable_title',
			[
				'label'     => esc_html__( 'Enable Title', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes'
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
				'default' => 'h4',
				'condition' => [
					'enable_title' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'title_text_transform',
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
				'default' => '',
				'condition' => [
					'enable_title' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'enable_category',
			[
				'label'     => esc_html__( 'Enable Category', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'enable_count_images',
			[
				'label'     => esc_html__( 'Enable Number of Images', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes',
				'condition' => [
					'item_type' => array( 'gallery' )
				]
			]
		);

		$this->add_control(
			'enable_excerpt',
			[
				'label'     => esc_html__( 'Enable Excerpt', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'playerx-core'), 
					'yes' => esc_html__( 'Yes', 'playerx-core')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'excerpt_length',
			[
				'label'     => esc_html__( 'Excerpt Length', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Number of characters', 'playerx-core' ),
				'condition' => [
					'enable_excerpt' => array( 'yes' )
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'slider_settings',
			[
				'label' => esc_html__( 'Slider Settings', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'enable_loop',
			[
				'label'     => esc_html__( 'Enable Slider Loop', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'playerx-core'), 
					'yes' => esc_html__( 'Yes', 'playerx-core')
				),
				'default' => 'no',
				'condition' => [
					'item_type' => array( '' )
				]
			]
		);

		$this->add_control(
			'enable_autoplay',
			[
				'label'     => esc_html__( 'Enable Slider Autoplay', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes'
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
			'enable-center',
			[
				'label'     => esc_html__( 'Enable Center Item', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'slider_padding',
			[
				'label'     => esc_html__( 'Enable Slider Padding', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Padding left and right on stage (can see neighbours).', 'playerx-core' ),
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
			'navigation_skin',
			[
				'label'     => esc_html__( 'Navigation Skin', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'), 
					'light' => esc_html__( 'Light', 'playerx-core'), 
					'dark' => esc_html__( 'Dark', 'playerx-core')
				),
				'default' => '',
				'condition' => [
					'enable_navigation' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'enable_pagination',
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

		$this->add_control(
			'pagination_skin',
			[
				'label'     => esc_html__( 'Pagination Skin', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'), 
					'light' => esc_html__( 'Light', 'playerx-core'), 
					'dark' => esc_html__( 'Dark', 'playerx-core')
				),
				'default' => '',
				'condition' => [
					'enable_pagination' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'pagination_position',
			[
				'label'     => esc_html__( 'Pagination Position', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'below-slider' => esc_html__( 'Below Slider', 'playerx-core'), 
					'on-slider' => esc_html__( 'On Slider', 'playerx-core')
				),
				'default' => 'below-slider',
				'condition' => [
					'enable_pagination' => array( 'yes' )
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$args   = array(
			'number_of_items'        => '9',
			'item_type'              => '',
			'number_of_columns'      => 'four',
			'space_between_items'    => 'normal',
			'image_proportions'      => 'full',
			'category'               => '',
			'selected_projects'      => '',
			'tag'                    => '',
			'orderby'                => 'date',
			'order'                  => 'ASC',
			'enable_fullheight'      => 'yes',
			'portfolio_slider_full_height_decrease' => 'yes',
			'item_style'             => 'standard-shader',
			'content_top_margin'     => '',
			'content_bottom_margin'  => '',
			'enable_title'           => 'yes',
			'title_tag'              => 'h4',
			'title_text_transform'   => '',
			'enable_category'        => 'yes',
			'enable_count_images'    => 'yes',
			'enable_excerpt'         => 'no',
			'excerpt_length'         => '20',
			'enable_loop'            => 'no',
			'enable_autoplay'        => 'yes',
			'slider_speed'           => '5000',
			'slider_speed_animation' => '600',
			'slider_padding'          => 'no',
			'enable-center'      => 'yes',
			'enable_navigation'      => 'yes',
			'navigation_skin'        => '',
			'enable_pagination'      => 'yes',
			'pagination_skin'        => '',
			'pagination_position'    => 'below-slider'
		);

		$params = shortcode_atts( $args, $this->get_settings_for_display() );

		$params['type']                = 'gallery';
		$params['portfolio_slider_on'] = 'yes';
		
		$html = '<div class="edgtf-portfolio-slider-holder">';
			$html .= playerx_edge_execute_shortcode( 'edgtf_portfolio_list', $params );
		$html .= '</div>';

		echo playerx_edge_get_module_part($html);
	}
}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfPortfolioSlider() );
