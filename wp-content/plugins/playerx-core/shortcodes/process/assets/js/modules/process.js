(function($) {
	'use strict';
	
	var process = {};
	edgtf.modules.process = process;
	
	process.edgtfInitProcess = edgtfInitProcess;
	
	
	process.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	$(window).on('load',edgtfOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfInitProcess()
	}

	/**
	 All functions to be called on $(window).on('load',) should be in this function
	 */
	function edgtfOnWindowLoad() {
		edgtfElementorProcess();
	}

	/**
	 * Elementor
	 */
	function edgtfElementorProcess(){
		$(window).on('elementor/frontend/init', function () {
			elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_process.default', function() {
				edgtfInitProcess();
			} );
		});
	}
	
	/**
	 * Inti process shortcode on appear
	 */
	function edgtfInitProcess() {
		var holder = $('.edgtf-process-holder');
		
		if(holder.length) {
			holder.each(function(){
				var thisHolder = $(this);
				
				thisHolder.appear(function(){
					thisHolder.addClass('edgtf-process-appeared');
				},{accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
			});
		}
	}
	
})(jQuery);
