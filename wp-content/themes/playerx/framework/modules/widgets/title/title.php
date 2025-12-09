<?php

class PlayerxEdgeClassTitleWidget extends PlayerxEdgeClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_title_widget',
			esc_html__( 'Playerx Title Widget', 'playerx' ),
			array( 'description' => esc_html__( 'Add a title element to your widget areas', 'playerx' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'title',
				'title' => esc_html__( 'Title', 'masterds-core' ),
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'title_tag',
				'title'   => esc_html__( 'Title Tag', 'masterds-core' ),
				'options' => playerx_edge_get_title_tag( true ),
			),
			array(
				'type'  => 'textfield',
				'name'  => 'margin_bottom',
				'title' => esc_html__( 'Margin Bottom (px or em)', 'masterds-core' ),
			),
		);
	}
	
	public function widget( $args, $instance ) {
		extract( $args );

		$title = '';
		if ( ! empty( $instance['title'] ) ) {
			$title = $instance['title'];
		}

		$title_tag = 'h5';
		if ( ! empty( $instance['title_tag'] ) ) {
			$title_tag = $instance['title_tag'];
		}

		$margin_bottom = '';
		$title_styles  = array();
		if ( ! empty( $instance['margin_bottom'] ) ) {
			$margin_bottom  = $instance['margin_bottom'];
			$title_styles[] = 'margin-bottom: ' . $margin_bottom . '!important';
		}
		?>

		<?php
		if ( ! empty( $title ) ) { ?>
			<div class="widget edgtf-title-widget" <?php echo playerx_edge_get_inline_style( $title_styles ); ?>>
				<?php echo '<' . esc_attr( $title_tag ); ?> class="edgtf-widget-title">
				<?php echo esc_html( $title ); ?>
				<?php echo '</' . esc_attr( $title_tag ); ?>>
			</div>
		<?php } ?>
<?php
	}
}
