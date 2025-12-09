<?php
class ElementorEdgtfProcess extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_process'; 
	}

	public function get_title() {
		return esc_html__( 'Process', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-process';
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
			'number_of_columns',
			[
				'label'     => esc_html__( 'Number Of Columns', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'two' => esc_html__( 'Two', 'playerx-core'), 
					'three' => esc_html__( 'Three', 'playerx-core'), 
					'four' => esc_html__( 'Four', 'playerx-core')
				),
				'default' => 'three'
			]
		);

		$this->add_control(
			'switch_to_one_column',
			[
				'label'     => esc_html__( 'Switch to One Column', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Choose on which stage item will be in one column', 'playerx-core' ),
				'options' => array(
					'' => esc_html__( 'Default None', 'playerx-core'), 
					'1366' => esc_html__( 'Below 1366px', 'playerx-core'), 
					'1024' => esc_html__( 'Below 1024px', 'playerx-core'), 
					'768' => esc_html__( 'Below 768px', 'playerx-core'), 
					'680' => esc_html__( 'Below 680px', 'playerx-core'), 
					'480' => esc_html__( 'Below 480px', 'playerx-core')
				),
				'default' => ''
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
			'title',
			[
				'label'     => esc_html__( 'Title', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
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
				'default' => '',
				'condition' => [
					'title!' => ''
				]
			]
		);

		$repeater->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'title!' => ''
				]
			]
		);

		$repeater->add_control(
			'text',
			[
				'label'     => esc_html__( 'Text', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA
			]
		);

		$repeater->add_control(
			'text_color',
			[
				'label'     => esc_html__( 'Text Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'text!' => ''
				]
			]
		);

		$repeater->add_control(
			'text_top_margin',
			[
				'label'     => esc_html__( 'Text Top Margin (px)', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'text!' => ''
				]
			]
		);

		$this->add_control(
			'process_item',
			[
				'label'     => esc_html__( 'Process Item', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::REPEATER,
				'fields'     => $repeater->get_controls(),
				'title_field'     => esc_html__( 'Item', 'playerx-core' )
			]
		);


		$this->end_controls_section();
	}
	public function render() {
		$args   = array(
			'custom_class'         => '',
			'number_of_columns'    => 'three',
			'switch_to_one_column' => ''
		);

		$params = $this->get_settings_for_display();
		$params['holder_classes']  = $this->getHolderClasses( $params, $args );
		$params['number_of_items'] = $this->getNumberOfItems( $params['number_of_columns'] );
		?>
		<div class="edgtf-process-holder <?php echo esc_attr( $params['holder_classes'] ); ?>">
			<div class="edgtf-mark-horizontal-holder">
				<?php for ( $i = 1; $i <= $params['number_of_items']; $i ++ ) { ?>
					<div class="edgtf-process-mark">
						<div class="edgtf-process-line"></div>
						<div class="edgtf-process-circle"><?php echo esc_attr( $i ); ?></div>
					</div>
				<?php } ?>
			</div>
			<div class="edgtf-mark-vertical-holder">
				<?php for ( $i = 1; $i <= $params['number_of_items']; $i ++ ) { ?>
					<div class="edgtf-process-mark">
						<div class="edgtf-process-line"></div>
						<div class="edgtf-process-circle"><?php echo esc_attr( $i ); ?></div>
					</div>
				<?php } ?>
			</div>
			<div class="edgtf-process-inner">
				<?php foreach ( $params['process_item'] as $pi ) {
					$pi['image'] = !empty($pi['image']['id']) ? $pi['image']['id'] : '';
					$pi['holder_classes']   = $this->getItemHolderClasses( $pi );
					$pi['title_tag']        = ! empty( $pi['title_tag'] ) ? $pi['title_tag'] : 'h4';
					$pi['title_styles']     = $this->getItemTitleStyles( $pi );
					$pi['text_styles']      = $this->getItemTextStyles( $pi );

					echo playerx_core_get_shortcode_module_template_part( 'templates/process-item-template', 'process', '', $pi );
				} ?>
			</div>
		</div>
	<?php }

	private function getHolderClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['number_of_columns'] ) ? 'edgtf-' . $params['number_of_columns'] . '-columns' : 'edgtf-' . $args['number_of_columns'] . '-columns';
		$holderClasses[] = ! empty( $params['switch_to_one_column'] ) ? 'edgtf-responsive-' . $params['switch_to_one_column'] : '';
		
		return implode( ' ', $holderClasses );
	}

	private function getNumberOfItems( $params ) {
		$number = 3;
		
		switch ($params) {
			case 'two':
				$number = 2;
				break;
			case 'three':
				$number = 3;
				break;
			case 'four':
				$number = 4;
				break;
		}
		
		return $number;
	}

	private function getItemHolderClasses( $params ) {
		$holderClasses = array();

		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';

		return implode( ' ', $holderClasses );
	}

	private function getItemTitleStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}

		return implode( ';', $styles );
	}

	private function getItemTextStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['text_color'] ) ) {
			$styles[] = 'color: ' . $params['text_color'];
		}

		if ( $params['text_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . playerx_edge_filter_px( $params['text_top_margin'] ) . 'px';
		}

		return implode( ';', $styles );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfProcess() );
