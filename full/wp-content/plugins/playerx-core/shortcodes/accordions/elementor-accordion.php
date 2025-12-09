<?php
class ElementorEdgtfAccordion extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_accordion'; 
	}

	public function get_title() {
		return esc_html__( 'Accordion', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-accordions';
	}

	public function get_categories() {
		return [ 'edge' ];
	}

	public function get_script_depends() {
		return array('jquery-ui-accordion');
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
				'label'       => esc_html__( 'Custom CSS Class', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'playerx-core' )
			]
		);

		$this->add_control(
			'style',
			[
				'label'     => esc_html__( 'Style', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => array(
					'accordion' => esc_html__( 'Accordion', 'playerx-core'), 
					'toggle'    => esc_html__( 'Toggle', 'playerx-core')
				),
				'default'   => 'accordion'
			]
		);

		$this->add_control(
			'layout',
			[
				'label'   => esc_html__( 'Layout', 'playerx-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'boxed'  => esc_html__( 'Boxed', 'playerx-core'),
					'simple' => esc_html__( 'Simple', 'playerx-core')
				),
				'default' => 'boxed'
			]
		);

		$this->add_control(
			'background_skin',
			[
				'label'   => esc_html__( 'Background Skin', 'playerx-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					''      => esc_html__( 'Default', 'playerx-core'),
					'white' => esc_html__( 'White', 'playerx-core')
				),
				'default' => ''
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter accordion section title', 'playerx-core' )
			]
		);

		$repeater->add_control(
			'title_tag',
			[
				'label'   => esc_html__( 'Title Tag', 'playerx-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					''   => esc_html__( 'Default', 'playerx-core'),
					'h1' => esc_html__( 'h1', 'playerx-core'), 
					'h2' => esc_html__( 'h2', 'playerx-core'), 
					'h3' => esc_html__( 'h3', 'playerx-core'), 
					'h4' => esc_html__( 'h4', 'playerx-core'), 
					'h5' => esc_html__( 'h5', 'playerx-core'), 
					'h6' => esc_html__( 'h6', 'playerx-core'), 
					'p'  => esc_html__( 'p', 'playerx-core')
				),
				'default' => ''
			]
		);

		$repeater->add_control(
			'text',
			[
				'label' => esc_html__( 'Text', 'playerx-core' ),
				'type'  => \Elementor\Controls_Manager::WYSIWYG,
			]
		);

		$this->add_control(
			'accordion_tab',
			[
				'label'       => esc_html__( 'Accordion Tab', 'playerx-core' ),
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

		<div class="edgtf-accordion-holder <?php echo esc_attr( $params['holder_classes'] ); ?> clearfix">
			<?php foreach ( $params['accordion_tab'] as $tab ) {
				$tab['content'] = $tab['text'];
				$tab['title_tag'] = ! empty( $tab['title_tag'] ) ? $tab['title_tag'] : 'p';
				echo playerx_core_get_shortcode_module_template_part( 'templates/accordion-template', 'accordions', '', $tab );
			} ?>
		</div>
		<?php
	}

	private function getHolderClasses( $params ) {
		$holder_classes = array( 'edgtf-ac-default' );
		
		$holder_classes[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holder_classes[] = $params['style'] == 'toggle' ? 'edgtf-toggle' : 'edgtf-accordion';
		$holder_classes[] = ! empty( $params['layout'] ) ? 'edgtf-ac-' . esc_attr( $params['layout'] ) : '';
		$holder_classes[] = ! empty( $params['background_skin'] ) ? 'edgtf-' . esc_attr( $params['background_skin'] ) . '-skin' : '';
		
		return implode( ' ', $holder_classes );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfAccordion() );
