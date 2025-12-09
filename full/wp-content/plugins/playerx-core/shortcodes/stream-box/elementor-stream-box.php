<?php
class ElementorEdgtfStreamBox extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_stream_box'; 
	}

	public function get_title() {
		return esc_html__( 'Stream Box', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-stream-box';
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
				'label'     => esc_html__( 'Layout', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'standard' => esc_html__( 'Standard (three streams)', 'playerx-core'), 
					'minimal' => esc_html__( 'Minimal (one stream)', 'playerx-core')
				),
				'default' => 'standard'
			]
		);

		$this->add_control(
			'main_stream_image',
			[
				'label'     => esc_html__( 'Main Stream Image', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( 'Select image from media library', 'playerx-core' )
			]
		);

		$this->add_control(
			'main_stream_title',
			[
				'label'     => esc_html__( 'Main Stream Title', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'main_stream_link',
			[
				'label'     => esc_html__( 'Main Stream Link', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'main_stream_platform',
			[
				'label'     => esc_html__( ' Streaming video platform ', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'main_stream_channel',
			[
				'label'     => esc_html__( ' Streaming video platform channel name', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'stream_background_image',
			[
				'label'     => esc_html__( 'Stream Background Image', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$repeater->add_control(
			'stream_title',
			[
				'label'     => esc_html__( 'Stream Title', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'stream_link',
			[
				'label'     => esc_html__( 'Stream link', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'items',
			[
				'label'     => esc_html__( 'Additional Stream Items', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::REPEATER,
				'fields'     => $repeater->get_controls(),
				'title_field'     => esc_html__( 'Item', 'playerx-core' )
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'developer_tools',
			[
				'label' => esc_html__( 'Developer Tools', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'shortcode_snippet',
			array(
				'label'   => esc_html__( 'Show Shortcode Snippet', 'playerx-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'no',
				'options' => array(
					'no'  => esc_html__( 'No', 'playerx-core' ),
					'yes' => esc_html__( 'Yes', 'playerx-core' ),
				),
			)
		);

		$this->end_controls_section();
	}

	public function render() {
		$params = $this->get_settings_for_display();

		$params['main_stream_image'] = !empty($params['main_stream_image']) ? $params['main_stream_image'] : '';
		$params['stream_background_image'] = !empty($params['stream_background_image']) ? $params['stream_background_image'] : '';

		if ( isset( $params['shortcode_snippet'] ) && 'yes' === $params['shortcode_snippet'] ) {
			echo $this->get_shortcode_snippet( $this, array_filter( $params ) );
		} elseif ( isset( $params['content'] ) ) { // Handle nested shortcodes
			echo $this->render( $params, $params['content'] );
		} else {

        $params['holder_classes'] = $this->getHolderClasses( $params );
        $params['items'] = $this->getSingleStreamParams($params);
?>

			<div class="edgtf-stream-box-holder <?php echo esc_attr($params['holder_classes']); ?>">
				<?php
				$main_bgrnd_img_style = '';
				if(!empty($params['main_stream_image'])) {
					$main_bgrnd_img_style .= "background-image: url(" . wp_get_attachment_url($params['main_stream_image']['id']) . ");";
				}
				?>
				<div class="edgtf-sb-main-stream-item">
					<div class="edgtf-sb-main-stream-holder">
						<a class="edgtf-sb-link" href="<?php echo esc_url($params['main_stream_link']); ?>" target="_blank"></a>
						<div class="edgtf-sb-main-image">
							<?php echo wp_get_attachment_image($params['main_stream_image']['id'], 'full'); ?>
						</div>
						<a class="edgtf-video-button-play" href="<?php echo esc_url($params['main_stream_link']); ?>" target="_blank">
				<span class="edgtf-video-button-play-inner">
					<i class="fas fa-play"></i>
				</span>
						</a>
						<div class="edgtf-sb-text-holder">
							<?php if(!empty($params['main_stream_title'])) { ?>
								<a href="<?php echo esc_url($params['main_stream_link']); ?>" target="_blank">
									<h5 class="edgtf-sb-title"><?php echo esc_html($params['main_stream_title']); ?></h5>
								</a>
							<?php } ?>
							<?php if(!empty($params['main_stream_platform'])) { ?>
								<div class="edgtf-sb-platform"><?php echo esc_html($params['main_stream_platform']); ?></div>
							<?php } ?>
							<?php if(!empty($params['main_stream_channel'])) { ?>
								<div class="edgtf-sb-channel"><?php echo esc_html($params['main_stream_channel']); ?></div>
							<?php } ?>
						</div>
					</div>
					<div class="edgtf-stream-bgrnd" <?php echo playerx_edge_get_inline_style($main_bgrnd_img_style); ?>></div>
				</div>
				<?php foreach ($params['items'] as $single_stream_item) { ?>
					<?php
					$bgrnd_img_style = '';

					if(!empty($single_stream_item['stream_background_image']['id'])) {
						$bgrnd_img_style .= "background-image: url(" . wp_get_attachment_url($single_stream_item['stream_background_image']['id']) . ");";
					}
					?>
					<div class="edgtf-sb-bottom-stream-item">
						<div class="edgtf-sb-bottom-stream-holder">
							<?php if($single_stream_item['stream_link'] !== '') { ?>
								<a class="edgtf-sb-link" href="<?php echo esc_url($single_stream_item['stream_link']); ?>" target="_blank"></a>
							<?php } ?>
							<div class="edgtf-sb-bottom-stream-image">
								<?php echo wp_get_attachment_image($single_stream_item['stream_background_image'], 'full'); ?>
							</div>
							<div class="edgtf-sb-text-holder">
								<?php if($single_stream_item['stream_title'] !== '') { ?>
									<h6 class="edgtf-sb-title"><?php echo esc_html($single_stream_item['stream_title']); ?></h6>
								<?php } ?>
							</div>
						</div>
						<div class="edgtf-stream-bgrnd" <?php echo playerx_edge_get_inline_style($bgrnd_img_style); ?>></div>
					</div>
				<?php } ?>
			</div>

<?php
		} // snippet check close
	}

    private function getHolderClasses( $params ) {
        $holderClasses = array();

        $holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
        $holderClasses[] = ! empty( $params['type'] ) ? 'edgtf-sb-' . $params['type'] : 'edgtf-st-' . 'standard';

        return implode( ' ', $holderClasses );
    }

	private function get_shortcode_snippet( $shortcode_object, $params ) {
		$atts = array();

		if ( empty( $shortcode_object ) || ! is_object( $shortcode_object ) ) {
			return '';
		}

		if ( ! empty( $params ) ) {
			foreach ( $params as $key => $value ) {
				if ( is_array( $value ) || 'shortcode_snippet' === $key ) {
					continue;
				}

				$atts[] = $key . '="' . esc_attr( $value ) . '"';
			}

			/* convert to image ID for WPBakery */
			if ( $params['main_stream_image'] ) {
				$atts[] = 'main_stream_image' . '="' . esc_attr( $params['main_stream_image']['id'] ) . '"';
			}

			if ( ! empty( $params['items'] ) ) {

				// convert stream_background_image array values to just image ID
				$counter = 0;
				foreach ($params['items'] as $single_stream) {
					if ( ! empty( $params['items'][$counter]['stream_background_image'] ) ) {
						$params['items'][$counter]['stream_background_image'] = $params['items'][$counter]['stream_background_image']['id'];
					}

					$counter++;
				}

				$atts[] = 'items' . '="' . urlencode(json_encode( $params['items'], true )) . '"';
			}
		}

		return sprintf(
			'<textarea rows="3" readonly>[%s %s]</textarea>',
			$shortcode_object->get_name(),
			implode( ' ', $atts )
		);
	}

    private function getSingleStreamParams($params) {

	    // convert stream_background_image array values to just image ID
	    $counter = 0;
	    foreach ($params['items'] as $single_stream) {
	    	if ( ! empty( $params['items'][$counter]['stream_background_image'] ) ) {
			    $params['items'][$counter]['stream_background_image'] = $params['items'][$counter]['stream_background_image']['id'];
		    }

	    	$counter++;
	    }

	    $single_stream = $params['items'];
        $single_items = array();

        foreach ($single_stream as $single_stream_item) {

            $single_items[] = $single_stream_item;
        }

        return $single_items;

    }

	private function getSingleStreamParamsForSnippet($params) {
		$single_stream = json_decode( $params['items'], true );
		$single_items = array();

		foreach ($single_stream as $single_stream_item) {

			$single_items[] = $single_stream_item;
		}

		return $single_items;

	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfStreamBox() );
