(function ($) {
	'use strict';

	var clientsCarousel = {};
	edgtf.modules.clientsCarousel = clientsCarousel;


	clientsCarousel.edgtfOnWindowLoad = edgtfOnWindowLoad;

	$(window).on('load',edgtfOnWindowLoad);

	/**
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnWindowLoad() {
		edgtfElementorClientsCarousel();
	}

	/**
	 * Elementor
	 */
	function edgtfElementorClientsCarousel() {
		$(window).on('elementor/frontend/init', function () {
			elementorFrontend.hooks.addAction('frontend/element_ready/edgtf_clients_carousel.default', function () {
				edgtf.modules.common.edgtfOwlSlider();
			});
		});
	}

})(jQuery);
