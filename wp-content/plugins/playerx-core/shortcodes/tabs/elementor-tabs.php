<?php
class ElementorEdgtfTabs extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_tabs'; 
	}

	public function get_title() {
		return esc_html__( 'Tabs', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-tabs';
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
			'type',
			[
				'label'     => esc_html__( 'Type', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'standard' => esc_html__( 'Standard', 'playerx-core'), 
					'boxed' => esc_html__( 'Boxed', 'playerx-core'), 
					'simple' => esc_html__( 'Simple', 'playerx-core'), 
					'vertical' => esc_html__( 'Vertical', 'playerx-core')
				),
				'default' => 'standard'
			]
		);

		$this->add_control(
			'skin',
			[
				'label'     => esc_html__( 'Predefined Skin?', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Turn this option on in case of using dark background color', 'playerx-core' ),
				'options' => array(
					'' => esc_html__( 'Normal', 'playerx-core'), 
					'white' => esc_html__( 'White', 'playerx-core')
				),
				'default' => ''
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'tab_title',
			[
				'label'     => esc_html__( 'Title', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);
		$repeater->add_control(
			'tab_text',
			[
				'label'       => esc_html__( 'Text', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
			]
		);
		$this->add_control(
			'tabs_item',
			[
				'label'     => esc_html__( 'Tabs Item', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::REPEATER,
				'fields'     => $repeater->get_controls(),
				'title_field'     => esc_html__( 'Item', 'playerx-core' )
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();
		$params['holder_classes'] = $this->getHolderClasses( $params );
		
		// Extract tab titles
		/*$params['tabs_titles']    = $tab_title_array;
		$params['content']        = $content;*/
		?>

	<div class="edgtf-tabs <?php echo esc_attr( $params['holder_classes'] ); ?>">
		<ul class="edgtf-tabs-nav clearfix">
			<?php foreach ( $params['tabs_item'] as $tab ) { ?>
				<li>
					<?php if ( ! empty( $tab['tab_title'] ) ) { ?>
						<a href="#tab-<?php echo sanitize_title( $tab['tab_title'] ) ?>"><?php echo esc_html( $tab['tab_title'] ); ?></a>
					<?php } ?>
				</li>
			<?php } ?>
		</ul>

		<?php foreach ( $params['tabs_item'] as $tab ) {

			$rand_number         = rand( 0, 1000 );
			$tab['tab_title'] = $tab['tab_title'] . '-' . $rand_number;
			$tab['content'] = $tab['tab_text'];

		echo playerx_core_get_shortcode_module_template_part( 'templates/tab-content', 'tabs', '', $tab );
		} ?>

	</div>
		<?php
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['type'] ) ? 'edgtf-tabs-' . esc_attr( $params['type'] ) : 'edgtf-tabs-standard';
		$holderClasses[] = ( $params['skin'] == 'white') ? 'edgtf-tabs-white-skin' : '';

		return implode( ' ', $holderClasses );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfTabs() );
