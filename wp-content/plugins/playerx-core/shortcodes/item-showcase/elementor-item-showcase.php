<?php
class ElementorEdgtfItemShowcase extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_item_showcase'; 
	}

	public function get_title() {
		return esc_html__( 'Item Showcase', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-item-showcase';
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
			'item_image',
			[
				'label'     => esc_html__( 'Image', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$this->add_control(
			'image_top_offset',
			[
				'label'     => esc_html__( 'Image Top Offset', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'item_position',
			[
				'label'     => esc_html__( 'Item Position', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'left' => esc_html__( 'Left', 'playerx-core'), 
					'right' => esc_html__( 'Right', 'playerx-core')
				),
				'default' => 'left'
			]
		);

		$repeater->add_control(
			'item_title',
			[
				'label'     => esc_html__( 'Item Title', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'item_link',
			[
				'label'     => esc_html__( 'Item Link', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'item_title!' => ''
				]
			]
		);

		$repeater->add_control(
			'item_target',
			[
				'label'     => esc_html__( 'Item Target', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'_self' => esc_html__( 'Same Window', 'playerx-core'), 
					'_blank' => esc_html__( 'New Window', 'playerx-core')
				),
				'default' => '_self',
				'condition' => [
					'item_link!' => ''
				]
			]
		);

		$repeater->add_control(
			'item_title_tag',
			[
				'label'     => esc_html__( 'Item Title Tag', 'playerx-core' ),
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
					'item_title!' => ''
				]
			]
		);

		$repeater->add_control(
			'item_title_color',
			[
				'label'     => esc_html__( 'Item Title Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'item_title!' => ''
				]
			]
		);

		$repeater->add_control(
			'item_text',
			[
				'label'     => esc_html__( 'Item Text', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA
			]
		);

		$repeater->add_control(
			'item_text_color',
			[
				'label'     => esc_html__( 'Item Text Color', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'item_text!' => ''
				]
			]
		);

		$this->add_control(
			'item_showcase_item',
			[
				'label'     => esc_html__( 'Item Showcase List Item', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::REPEATER,
				'fields'     => $repeater->get_controls(),
				'title_field'     => esc_html__( 'Item', 'playerx-core' )
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();
		extract( $params );
		
		$item_image_style = '';
		if ( ! empty( $image_top_offset ) ) {
			$item_image_style = 'margin-top: ' . playerx_edge_filter_px( $image_top_offset ) . 'px';
		}
		?>
		<div class="edgtf-item-showcase-holder clearfix">
            <?php foreach ( $params['item_showcase_item'] as $isi ) {

                $isi['showcase_item_class'] = $this->getShowcaseItemClasses( $isi );
                $isi['item_title_styles']   = $this->getTitleStyles( $isi );
                $isi['item_text_styles']    = $this->getTextStyles( $isi );
                $isi['item_position']         = ! empty( $isi['item_position'] ) ? $isi['item_position'] : 'left';
                $isi['item_target']         = ! empty( $isi['item_target'] ) ? $isi['item_target'] : '_slef';
                $isi['item_title_tag']      = ! empty( $isi['item_title_tag'] ) ? $isi['item_title_tag'] : 'h4';

                echo playerx_core_get_shortcode_module_template_part( 'templates/item-showcase-item', 'item-showcase', '', $isi );
            }
            if ( ! empty( $params['item_image'] ) ) {
                $params['item_image'] = $params['item_image']['id'];
                ?>
                <div class="edgtf-is-image" <?php echo playerx_edge_get_inline_style( $item_image_style ); ?>>
                    <?php echo wp_get_attachment_image( $params['item_image'], 'full' ); ?>
                </div>
            <?php } ?>
        </div>
        <?php
	}

	private function getShowcaseItemClasses( $params ) {
		$itemClass = array();

		if ( ! empty( $params['item_position'] ) ) {
			$itemClass[] = 'edgtf-is-' . $params['item_position'];
		}

		return implode( ' ', $itemClass );
	}

	private function getTitleStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['item_title_color'] ) ) {
			$styles[] = 'color: ' . $params['item_title_color'];
		}

		return implode( ';', $styles );
	}

	private function getTextStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['item_text_color'] ) ) {
			$styles[] = 'color: ' . $params['item_text_color'];
		}

		return implode( ';', $styles );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfItemShowcase() );
