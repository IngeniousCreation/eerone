(function($) {
	'use strict';

	var imageGallery = {};
	edgtf.modules.imageGallery = imageGallery;

	imageGallery.edgtfInitImageGalleryCarouselResponsiveStyle = edgtfInitImageGalleryCarouselResponsiveStyle;


	imageGallery.edgtfOnDocumentReady = edgtfOnDocumentReady;

	$(document).ready(edgtfOnDocumentReady);
	$(window).on('load',edgtfOnWindowLoad);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfInitImageGalleryCarouselResponsiveStyle();
	}

	/**
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnWindowLoad() {
		edgtfElementorImageGallery();
	}

	/**
	 * Elementor
	 */
	function edgtfElementorImageGallery() {
		$(window).on('elementor/frontend/init', function () {
			elementorFrontend.hooks.addAction('frontend/element_ready/edgtf_image_gallery.default', function () {
				edgtf.modules.common.edgtfOwlSlider();
				edgtf.modules.common.edgtfInitGridMasonryListLayout();
				edgtf.modules.common.edgtfPrettyPhoto();
				edgtfInitImageGalleryCarouselResponsiveStyle();
			});
		});
	}

	/*
	 **	Elements Holder responsive style
	 */
	function edgtfInitImageGalleryCarouselResponsiveStyle(){
		var imageGallery = $('.edgtf-image-gallery.edgtf-ig-carousel-type');

		if(imageGallery.length){
			imageGallery.each(function() {
				var thisImageGallery = $(this),
					imageGalleryItem = thisImageGallery.children('.edgtf-ig-slider'),
					style = '',
					responsiveStyle = '';

				imageGalleryItem.each(function() {
					var thisItem = $(this),
						ipadLandscape = '',
						mobileLandscape = '';


					if (typeof thisItem.data('768-1024') !== 'undefined' && thisItem.data('768-1024') !== false) {
						ipadLandscape = thisItem.data('768-1024');
					}

					if (typeof thisItem.data('767') !== 'undefined' && thisItem.data('767') !== false) {
						mobileLandscape = thisItem.data('767');
					}

					if( ipadLandscape.length || mobileLandscape.length ) {

						if(ipadLandscape.length) {
							responsiveStyle += "@media only screen and (min-width: 768px) and (max-width: 1024px) {.owl-stage-outer { height: "+ipadLandscape+" !important; } }";
						}

						if(mobileLandscape.length) {
							responsiveStyle += "@media only screen and (max-width: 767px) {.owl-stage-outer { height: "+mobileLandscape+" !important; } }";
						}
					}

					if (typeof edgtf.modules.common.edgtfOwlSlider === "function") { // if owl function exist
						var owl = thisItem.find('.edgtf-owl-slider');
						if (owl.length) { // if owl is in elements holder
							setTimeout(function () {
								owl.trigger('refresh.owl.carousel'); // reinit owl
							}, 100);
						}
					}

				});

				if(responsiveStyle.length) {
					style = '<style type="text/css">'+responsiveStyle+'</style>';
				}

				if(style.length) {
					$('head').append(style);
				}

			});
		}
	}

})(jQuery);
