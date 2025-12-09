(function($) {
	'use strict';
	
	var button = {};
	edgtf.modules.button = button;
	
	
	button.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	$(window).on('load',edgtfOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfButton().init();
	}

	function edgtfOnWindowLoad() {
		edgtfElementorButton();
	}

	/**
	 * Elementor
	 */
	function edgtfElementorButton(){
		$(window).on('elementor/frontend/init', function () {
			elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_button.default', function() {
				edgtfButton().init();
			} );
		});
	}
	
	/**
	 * Button object that initializes whole button functionality
	 * @type {Function}
	 */
	var edgtfButton = function() {
		//all buttons on the page
		var buttons = $('.edgtf-btn');
		
		/**
		 * Initializes button hover color
		 * @param button current button
		 */
		var buttonHoverColor = function(button) {
			if(typeof button.data('hover-color') !== 'undefined') {
				var changeButtonColor = function(event) {
					event.data.button.css('color', event.data.color);
				};
				
				var originalColor = button.css('color');
				var hoverColor = button.data('hover-color');
				
				button.on('mouseenter', { button: button, color: hoverColor }, changeButtonColor);
				button.on('mouseleave', { button: button, color: originalColor }, changeButtonColor);
			}
		};
		
		/**
		 * Initializes button hover background color
		 * @param button current button
		 */
		var buttonHoverBgColor = function(button) {
			if(typeof button.data('hover-bg-color') !== 'undefined') {
				var changeButtonBg = function(event) {
					event.data.button.css('background-color', event.data.color);
				};
                var changeButtonTriangleColor = function(event) {
                    event.data.button.css('border-top-color', event.data.color);
                };
				
				var originalBgColor = button.css('background-color');
				var hoverBgColor = button.data('hover-bg-color');
				
				button.on('mouseenter', { button: button, color: hoverBgColor }, changeButtonBg);
				button.on('mouseleave', { button: button, color: originalBgColor }, changeButtonBg);

				if(button.hasClass('edgtf-btn-trapeze-shape')) {
                    button.on('mouseenter', { button: button.find('span[class*="trapeze"]'), color: hoverBgColor }, changeButtonTriangleColor);
                    button.on('mouseleave', { button: button.find('span[class*="trapeze"]'), color: originalBgColor }, changeButtonTriangleColor);
				}
			}
		};
		
		/**
		 * Initializes button border color
		 * @param button
		 */
		var buttonHoverBorderColor = function(button) {
			if(typeof button.data('hover-border-color') !== 'undefined') {
				var changeBorderColor = function(event) {
					event.data.button.css('border-color', event.data.color);
				};
				
				var originalBorderColor = button.css('borderTopColor'); //take one of the four sides
				var hoverBorderColor = button.data('hover-border-color');
				
				button.on('mouseenter', { button: button, color: hoverBorderColor }, changeBorderColor);
				button.on('mouseleave', { button: button, color: originalBorderColor }, changeBorderColor);
			}
		};
		
		return {
			init: function() {
				if(buttons.length) {
					buttons.not('.edgtf-btn-glow').each(function() {
						buttonHoverColor($(this));
						buttonHoverBgColor($(this));
						buttonHoverBorderColor($(this));
					});
				}
			}
		};
	};
	
})(jQuery);
