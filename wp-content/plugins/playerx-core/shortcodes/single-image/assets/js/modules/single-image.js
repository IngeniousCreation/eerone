(function($) {
    'use strict';

    var singleImage = {};
    edgtf.modules.singleImage = singleImage;


    singleImage.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);
    $(window).on('load',edgtfOnWindowLoad);

    /**
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {

    }
    /**
     All functions to be called on $(window).on('load',) should be in this function
     */
    function edgtfOnWindowLoad() {
        edgtfElementorSingleImage();
    }

    /**
     * Elementor
     */
    function edgtfElementorSingleImage(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_single_image.default', function() {
                edgtf.modules.common.edgtfPrettyPhoto();
            } );
        });
    }

})(jQuery);