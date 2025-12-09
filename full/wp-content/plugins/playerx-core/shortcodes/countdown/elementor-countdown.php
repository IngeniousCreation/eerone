<?php
class ElementorEdgtfCountdown extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_countdown'; 
	}

	public function get_title() {
		return esc_html__( 'Countdown', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-countdown';
	}

	public function get_categories() {
		return [ 'edge' ];
	}

	public function get_script_depends() {
		return array(
			'jquery-plugin',
			'countdown'
		);
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
			'skin',
			[
				'label'     => esc_html__( 'Skin', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'), 
					'edgtf-dark-skin' => esc_html__( 'Dark', 'playerx-core')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'year',
			[
				'label'     => esc_html__( 'Year', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'2018' => esc_html__( '2018', 'playerx-core'), 
					'2019' => esc_html__( '2019', 'playerx-core'), 
					'2020' => esc_html__( '2020', 'playerx-core'), 
					'2021' => esc_html__( '2021', 'playerx-core'), 
					'2022' => esc_html__( '2022', 'playerx-core'),
					'2023' => esc_html__( '2023', 'playerx-core'),
					'2024' => esc_html__( '2024', 'playerx-core'),
					'2025' => esc_html__( '2025', 'playerx-core'),
				),
				'default' => '2018'
			]
		);

		$this->add_control(
			'month',
			[
				'label'     => esc_html__( 'Month', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'1' => esc_html__( 'January', 'playerx-core'), 
					'2' => esc_html__( 'February', 'playerx-core'), 
					'3' => esc_html__( 'March', 'playerx-core'), 
					'4' => esc_html__( 'April', 'playerx-core'), 
					'5' => esc_html__( 'May', 'playerx-core'), 
					'6' => esc_html__( 'June', 'playerx-core'), 
					'7' => esc_html__( 'July', 'playerx-core'), 
					'8' => esc_html__( 'August', 'playerx-core'), 
					'9' => esc_html__( 'September', 'playerx-core'), 
					'10' => esc_html__( 'October', 'playerx-core'), 
					'11' => esc_html__( 'November', 'playerx-core'), 
					'12' => esc_html__( 'December', 'playerx-core')
				),
				'default' => '1'
			]
		);

		$this->add_control(
			'day',
			[
				'label'     => esc_html__( 'Day', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'1' => esc_html__( '1', 'playerx-core'), 
					'2' => esc_html__( '2', 'playerx-core'), 
					'3' => esc_html__( '3', 'playerx-core'), 
					'4' => esc_html__( '4', 'playerx-core'), 
					'5' => esc_html__( '5', 'playerx-core'), 
					'6' => esc_html__( '6', 'playerx-core'), 
					'7' => esc_html__( '7', 'playerx-core'), 
					'8' => esc_html__( '8', 'playerx-core'), 
					'9' => esc_html__( '9', 'playerx-core'), 
					'10' => esc_html__( '10', 'playerx-core'), 
					'11' => esc_html__( '11', 'playerx-core'), 
					'12' => esc_html__( '12', 'playerx-core'), 
					'13' => esc_html__( '13', 'playerx-core'), 
					'14' => esc_html__( '14', 'playerx-core'), 
					'15' => esc_html__( '15', 'playerx-core'), 
					'16' => esc_html__( '16', 'playerx-core'), 
					'17' => esc_html__( '17', 'playerx-core'), 
					'18' => esc_html__( '18', 'playerx-core'), 
					'19' => esc_html__( '19', 'playerx-core'), 
					'20' => esc_html__( '20', 'playerx-core'), 
					'21' => esc_html__( '21', 'playerx-core'), 
					'22' => esc_html__( '22', 'playerx-core'), 
					'23' => esc_html__( '23', 'playerx-core'), 
					'24' => esc_html__( '24', 'playerx-core'), 
					'25' => esc_html__( '25', 'playerx-core'), 
					'26' => esc_html__( '26', 'playerx-core'), 
					'27' => esc_html__( '27', 'playerx-core'), 
					'28' => esc_html__( '28', 'playerx-core'), 
					'29' => esc_html__( '29', 'playerx-core'), 
					'30' => esc_html__( '30', 'playerx-core'), 
					'31' => esc_html__( '31', 'playerx-core')
				),
				'default' => '1'
			]
		);

		$this->add_control(
			'hour',
			[
				'label'     => esc_html__( 'Hour', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'0' => esc_html__( '0', 'playerx-core'), 
					'1' => esc_html__( '1', 'playerx-core'), 
					'2' => esc_html__( '2', 'playerx-core'), 
					'3' => esc_html__( '3', 'playerx-core'), 
					'4' => esc_html__( '4', 'playerx-core'), 
					'5' => esc_html__( '5', 'playerx-core'), 
					'6' => esc_html__( '6', 'playerx-core'), 
					'7' => esc_html__( '7', 'playerx-core'), 
					'8' => esc_html__( '8', 'playerx-core'), 
					'9' => esc_html__( '9', 'playerx-core'), 
					'10' => esc_html__( '10', 'playerx-core'), 
					'11' => esc_html__( '11', 'playerx-core'), 
					'12' => esc_html__( '12', 'playerx-core'), 
					'13' => esc_html__( '13', 'playerx-core'), 
					'14' => esc_html__( '14', 'playerx-core'), 
					'15' => esc_html__( '15', 'playerx-core'), 
					'16' => esc_html__( '16', 'playerx-core'), 
					'17' => esc_html__( '17', 'playerx-core'), 
					'18' => esc_html__( '18', 'playerx-core'), 
					'19' => esc_html__( '19', 'playerx-core'), 
					'20' => esc_html__( '20', 'playerx-core'), 
					'21' => esc_html__( '21', 'playerx-core'), 
					'22' => esc_html__( '22', 'playerx-core'), 
					'23' => esc_html__( '23', 'playerx-core'), 
					'24' => esc_html__( '24', 'playerx-core')
				),
				'default' => '0'
			]
		);

		$this->add_control(
			'minute',
			[
				'label'     => esc_html__( 'Minute', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'0' => esc_html__( '0', 'playerx-core'), 
					'1' => esc_html__( '1', 'playerx-core'), 
					'2' => esc_html__( '2', 'playerx-core'), 
					'3' => esc_html__( '3', 'playerx-core'), 
					'4' => esc_html__( '4', 'playerx-core'), 
					'5' => esc_html__( '5', 'playerx-core'), 
					'6' => esc_html__( '6', 'playerx-core'), 
					'7' => esc_html__( '7', 'playerx-core'), 
					'8' => esc_html__( '8', 'playerx-core'), 
					'9' => esc_html__( '9', 'playerx-core'), 
					'10' => esc_html__( '10', 'playerx-core'), 
					'11' => esc_html__( '11', 'playerx-core'), 
					'12' => esc_html__( '12', 'playerx-core'), 
					'13' => esc_html__( '13', 'playerx-core'), 
					'14' => esc_html__( '14', 'playerx-core'), 
					'15' => esc_html__( '15', 'playerx-core'), 
					'16' => esc_html__( '16', 'playerx-core'), 
					'17' => esc_html__( '17', 'playerx-core'), 
					'18' => esc_html__( '18', 'playerx-core'), 
					'19' => esc_html__( '19', 'playerx-core'), 
					'20' => esc_html__( '20', 'playerx-core'), 
					'21' => esc_html__( '21', 'playerx-core'), 
					'22' => esc_html__( '22', 'playerx-core'), 
					'23' => esc_html__( '23', 'playerx-core'), 
					'24' => esc_html__( '24', 'playerx-core'), 
					'25' => esc_html__( '25', 'playerx-core'), 
					'26' => esc_html__( '26', 'playerx-core'), 
					'27' => esc_html__( '27', 'playerx-core'), 
					'28' => esc_html__( '28', 'playerx-core'), 
					'29' => esc_html__( '29', 'playerx-core'), 
					'30' => esc_html__( '30', 'playerx-core'), 
					'31' => esc_html__( '31', 'playerx-core'), 
					'32' => esc_html__( '32', 'playerx-core'), 
					'33' => esc_html__( '33', 'playerx-core'), 
					'34' => esc_html__( '34', 'playerx-core'), 
					'35' => esc_html__( '35', 'playerx-core'), 
					'36' => esc_html__( '36', 'playerx-core'), 
					'37' => esc_html__( '37', 'playerx-core'), 
					'38' => esc_html__( '38', 'playerx-core'), 
					'39' => esc_html__( '39', 'playerx-core'), 
					'40' => esc_html__( '40', 'playerx-core'), 
					'41' => esc_html__( '41', 'playerx-core'), 
					'42' => esc_html__( '42', 'playerx-core'), 
					'43' => esc_html__( '43', 'playerx-core'), 
					'44' => esc_html__( '44', 'playerx-core'), 
					'45' => esc_html__( '45', 'playerx-core'), 
					'46' => esc_html__( '46', 'playerx-core'), 
					'47' => esc_html__( '47', 'playerx-core'), 
					'48' => esc_html__( '48', 'playerx-core'), 
					'49' => esc_html__( '49', 'playerx-core'), 
					'50' => esc_html__( '50', 'playerx-core'), 
					'51' => esc_html__( '51', 'playerx-core'), 
					'52' => esc_html__( '52', 'playerx-core'), 
					'53' => esc_html__( '53', 'playerx-core'), 
					'54' => esc_html__( '54', 'playerx-core'), 
					'55' => esc_html__( '55', 'playerx-core'), 
					'56' => esc_html__( '56', 'playerx-core'), 
					'57' => esc_html__( '57', 'playerx-core'), 
					'58' => esc_html__( '58', 'playerx-core'), 
					'59' => esc_html__( '59', 'playerx-core'), 
					'60' => esc_html__( '60', 'playerx-core')
				),
				'default' => '0'
			]
		);

		$this->add_control(
			'month_label',
			[
				'label' => esc_html__( 'Month Label', 'playerx-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'day_label',
			[
				'label' => esc_html__( 'Day Label', 'playerx-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'hour_label',
			[
				'label' => esc_html__( 'Hour Label', 'playerx-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'minute_label',
			[
				'label' => esc_html__( 'Minute Label', 'playerx-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'second_label',
			[
				'label' => esc_html__( 'Second Label', 'playerx-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'digit_font_size',
			[
				'label' => esc_html__( 'Digit Font Size (px)', 'playerx-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'label_font_size',
			[
				'label' => esc_html__( 'Label Font Size (px)', 'playerx-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['id']             = mt_rand( 1000, 9999 );
		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['holder_data']    = $this->getHolderData( $params );

		echo playerx_core_get_shortcode_module_template_part( 'templates/countdown', 'countdown', '', $params );
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['skin'] ) ? $params['skin'] : '';
		
		return implode( ' ', $holderClasses );
	}

	private function getHolderData( $params ) {
		$holderData = array();
		
		$holderData['data-year']         = ! empty( $params['year'] ) ? $params['year'] : '';
		$holderData['data-month']        = ! empty( $params['month'] ) ? $params['month'] : '';
		$holderData['data-day']          = ! empty( $params['day'] ) ? $params['day'] : '';
		$holderData['data-hour']         = $params['hour'] !== '' ? $params['hour'] : '';
		$holderData['data-minute']       = $params['minute'] !== '' ? $params['minute'] : '';
		$holderData['data-month-label']  = ! empty( $params['month_label'] ) ? $params['month_label'] : esc_html__( 'Months', 'playerx-core' );
		$holderData['data-day-label']    = ! empty( $params['day_label'] ) ? $params['day_label'] : esc_html__( 'Days', 'playerx-core' );
		$holderData['data-hour-label']   = ! empty( $params['hour_label'] ) ? $params['hour_label'] : esc_html__( 'Hours', 'playerx-core' );
		$holderData['data-minute-label'] = ! empty( $params['minute_label'] ) ? $params['minute_label'] : esc_html__( 'Minutes', 'playerx-core' );
		$holderData['data-second-label'] = ! empty( $params['second_label'] ) ? $params['second_label'] : esc_html__( 'Seconds', 'playerx-core' );
		$holderData['data-digit-size']   = ! empty( $params['digit_font_size'] ) ? $params['digit_font_size'] : '';
		$holderData['data-label-size']   = ! empty( $params['label_font_size'] ) ? $params['label_font_size'] : '';
		
		return $holderData;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfCountdown() );
