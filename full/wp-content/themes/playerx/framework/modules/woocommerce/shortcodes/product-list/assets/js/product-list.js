(function($) {
	"use strict";

	var productList = {};
	edgtf.modules.productList = productList;

	productList.edgtfOnWindowLoad = edgtfOnWindowLoad;

	$(window).on('load',edgtfOnWindowLoad);

	/*
	 All functions to be called on $(window).on('load',) should be in this function
	 */
	function edgtfOnWindowLoad() {
		edgtfElementorProductList();
	}

	/**
	 * Elementor Product List
	 */
	function edgtfElementorProductList() {
		$(window).on('elementor/frontend/init', function () {
			elementorFrontend.hooks.addAction('frontend/element_ready/edgtf_product_list.default', function () {
				edgtf.modules.common.edgtfInitGridMasonryListLayout();
			});
		});
	}

})(jQuery);
