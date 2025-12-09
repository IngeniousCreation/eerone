(function($) {
	'use strict';

	var portfolioSlider = {};
	edgtf.modules.portfolioSlider = portfolioSlider;

	portfolioSlider.edgtfOnWindowLoad = edgtfOnWindowLoad;

	$(window).on('load',edgtfOnWindowLoad);


	/*
	 All functions to be called on $(window).on('load',) should be in this function
	 */
	function edgtfOnWindowLoad() {
		edgtfElementorPortfolioSlider();
	}

	/**
	 * Elementor
	 */
	function edgtfElementorPortfolioSlider(){
		$(window).on('elementor/frontend/init', function () {
			elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_portfolio_slider.default', function() {
				edgtf.modules.common.edgtfOwlSlider();
				edgtf.modules.common.edgtfPrettyPhoto();
			} );
		});
	}

})(jQuery);
