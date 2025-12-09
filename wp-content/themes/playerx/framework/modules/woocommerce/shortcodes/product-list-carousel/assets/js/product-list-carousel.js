(function($) {
	"use strict";

	var productListCarousel = {};
	edgtf.modules.productListCarousel = productListCarousel;

	productListCarousel.edgtfOnWindowLoad = edgtfOnWindowLoad;

	$(window).on('load',edgtfOnWindowLoad);

	/*
	 All functions to be called on $(window).on('load',) should be in this function
	 */
	function edgtfOnWindowLoad() {
		edgtfElementorProductListCarousel();
	}

	/**
	 * Elementor Blog List
	 */
	function edgtfElementorProductListCarousel() {
		$(window).on('elementor/frontend/init', function () {
			elementorFrontend.hooks.addAction('frontend/element_ready/edgtf_product_list_carousel.default', function () {
				edgtf.modules.common.edgtfOwlSlider();
			});
		});
	}

})(jQuery);
