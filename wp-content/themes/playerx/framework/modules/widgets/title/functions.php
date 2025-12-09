<?php

if ( ! function_exists( 'playerx_edge_register_title_widget' ) ) {
	/**
	 * Function that register title widget
	 */
	function playerx_edge_register_title_widget( $widgets ) {
		$widgets[] = 'PlayerxEdgeClassTitleWidget';
		
		return $widgets;
	}
	
	add_filter( 'playerx_edge_filter_register_widgets', 'playerx_edge_register_title_widget' );
}
