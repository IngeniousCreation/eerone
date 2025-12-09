<?php
class ElementorEdgtfPricingTable extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_pricing_table'; 
	}

	public function get_title() {
		return esc_html__( 'Pricing Table', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-pricing-table';
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
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'), 
					'one' => esc_html__( 'One', 'playerx-core'), 
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
			'set_active_item',
			[
				'label'     => esc_html__( 'Set Item As Active', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'playerx-core'), 
					'yes' => esc_html__( 'Yes', 'playerx-core')
				),
				'default' => 'no'
			]
		);

		$repeater->add_control(
			'content_background_color',
			[
				'label'     => esc_html__( 'Content Background Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$repeater->add_control(
			'title',
			[
				'label'     => esc_html__( 'Title', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Basic Plan', 'playerx-core' ),
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
			'title_border_color',
			[
				'label'     => esc_html__( 'Title Bottom Border Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'title!' => ''
				]
			]
		);

		$repeater->add_control(
			'price',
			[
				'label'     => esc_html__( 'Price', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'price_color',
			[
				'label'     => esc_html__( 'Price Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'price!' => ''
				]
			]
		);

		$repeater->add_control(
			'currency',
			[
				'label'       => esc_html__( 'Currency', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Default mark is $', 'playerx-core' ),
				'default'     => esc_html__( '$', 'playerx-core' ),
			]
		);

		$repeater->add_control(
			'currency_color',
			[
				'label'     => esc_html__( 'Currency Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'currency!' => ''
				]
			]
		);

		$repeater->add_control(
			'price_period',
			[
				'label'       => esc_html__( 'Price Period', 'playerx-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'monthly', 'playerx-core' ),
				'description' => esc_html__( 'Default label is monthly', 'playerx-core' )
			]
		);

		$repeater->add_control(
			'price_period_color',
			[
				'label'     => esc_html__( 'Price Period Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'price_period!' => ''
				]
			]
		);

		$repeater->add_control(
			'button_text',
			[
				'label'   => esc_html__( 'Button Text', 'playerx-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'BUY NOW', 'playerx-core' ),
			]
		);

		$repeater->add_control(
			'link',
			[
				'label'     => esc_html__( 'Button Link', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'button_text!' => ''
				]
			]
		);

		$repeater->add_control(
			'button_type',
			[
				'label'     => esc_html__( 'Button Type', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'solid' => esc_html__( 'Solid', 'playerx-core'), 
					'outline' => esc_html__( 'Outline', 'playerx-core')
				),
				'default' => 'solid',
				'condition' => [
					'button_text!' => ''
				]
			]
		);

		$repeater->add_control(
			'content',
			[
				'label'     => esc_html__( 'Content', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA,
				'default'   => '<li>content content content</li><li>content content content</li><li>content content content</li>',
			]
		);

		$this->add_control(
			'pricing_table_item',
			[
				'label'     => esc_html__( 'Pricing Table Item', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::REPEATER,
				'fields'     => $repeater->get_controls(),
				'title_field'     => esc_html__( 'Item', 'playerx-core' )
			]
		);

		$this->end_controls_section();
	}

	public function render() {

		$args = array(
			'number_of_columns'   => 'three',
			'space_between_items' => 'normal'
		);

		$params = $this->get_settings_for_display();
		$holder_class = $this->getHolderClasses( $params, $args );
		?>

		<div class="edgtf-pricing-tables edgtf-grid-list edgtf-disable-bottom-space clearfix  <?php echo esc_attr( $holder_class ); ?>">
			<div class="edgtf-pt-wrapper edgtf-outer-space">
				<?php foreach ( $params['pricing_table_item'] as $pti ) {

					$pti['holder_classes']          = $this->getItemHolderClasses( $pti );
					$pti['holder_styles']           = $this->getItemHolderStyles( $pti );
					$pti['title_styles']            = $this->getItemTitleStyles( $pti );
					$pti['price_styles']            = $this->getItemPriceStyles( $pti );
					$pti['border_styles']           = $this->getItemAIBorderStyles( $pti );
					$pti['currency_styles']         = $this->getItemCurrencyStyles( $pti );
					$pti['price_period_styles']     = $this->getItemPricePeriodStyles( $pti );

					echo playerx_core_get_shortcode_module_template_part( 'templates/pricing-table-template', 'pricing-table', '', $pti );
				} ?>
			</div>
		</div>
	<?php }

	private function getHolderClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['number_of_columns'] ) ? 'edgtf-' . $params['number_of_columns'] . '-columns' : 'edgtf-' . $args['number_of_columns'] . '-columns';
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'edgtf-' . $params['space_between_items'] . '-space' : 'edgtf-' . $args['space_between_items'] . '-space';
		
		return implode( ' ', $holderClasses );
	}

	private function getItemHolderClasses( $params ) {
		$holderClasses = array();

		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = $params['set_active_item'] === 'yes' ? 'edgtf-pt-active-item' : '';

		return implode( ' ', $holderClasses );
	}

	private function getItemHolderStyles( $params ) {
		$itemStyle = array();

		if ( ! empty( $params['content_background_color'] ) ) {
			$itemStyle[] = 'background-color: ' . $params['content_background_color'];
		}

		return implode( ';', $itemStyle );
	}

	private function getItemTitleStyles( $params ) {
		$itemStyle = array();

		if ( ! empty( $params['title_color'] ) ) {
			$itemStyle[] = 'color: ' . $params['title_color'];
		}

		if ( ! empty( $params['title_border_color'] ) ) {
			$itemStyle[] = 'border-color: ' . $params['title_border_color'];
		}

		return implode( ';', $itemStyle );
	}

	private function getItemPriceStyles( $params ) {
		$itemStyle = array();

		if ( ! empty( $params['price_color'] ) ) {
			$itemStyle[] = 'color: ' . $params['price_color'];
		}

		return implode( ';', $itemStyle );
	}

	private function getItemAIBorderStyles( $params ) {
		$itemStyle = array();

		if ( ! empty( $params['currency_color'] ) ) {
			$itemStyle[] = 'color: ' . $params['currency_color'];
		}

		return implode( ';', $itemStyle );
	}

	private function getItemCurrencyStyles( $params ) {
		$itemStyle = array();

		if ( ! empty( $params['price_period_color'] ) ) {
			$itemStyle[] = 'color: ' . $params['price_period_color'];
		}

		return implode( ';', $itemStyle );
	}

	private function getItemPricePeriodStyles( $params ) {
		$itemStyle = array();

		if ( ! empty( $params['price_period_color'] ) ) {
			$itemStyle[] = 'color: ' . $params['price_period_color'];
		}

		return implode( ';', $itemStyle );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfPricingTable() );
