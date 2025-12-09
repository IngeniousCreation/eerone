(function($) {
	"use strict";

	var blogSliderSC = {};
	edgtf.modules.blogSliderSC = blogSliderSC;

	blogSliderSC.edgtfOnWindowLoad = edgtfOnWindowLoad;

	$(window).on('load',edgtfOnWindowLoad);

	/*
	 All functions to be called on $(window).on('load',) should be in this function
	 */
	function edgtfOnWindowLoad() {
		edgtfElementorBlogSlider();
	}

	/**
	 * Elementor Blog List
	 */
	function edgtfElementorBlogSlider() {
		$(window).on('elementor/frontend/init', function () {
			elementorFrontend.hooks.addAction('frontend/element_ready/edgtf_blog_slider.default', function () {
				edgtf.modules.common.edgtfOwlSlider();
			});
		});
	}

})(jQuery);
