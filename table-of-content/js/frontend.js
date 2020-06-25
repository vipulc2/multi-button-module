(function($) {

	PPToCModule = function( settings ) {
		this.settings = settings;
		this.id = settings.id;
		// this.head = settings.head;
		this.head_data = settings.head_data;
		this.nodeClass = '.fl-node-' + settings.id;
		this.container = settings.container;
		this.exclude = settings.exclude;
		this.collapsable_toc = settings.collapsable_toc;
		this.hierarchical_view = settings.hierarchical_view;
		this.sticky_toc = settings.sticky_toc;
		this.sticky_type = settings.sticky_type;
		this.scroll_top = settings.scroll_top;
		this.scroll_to = settings.scroll_to;
		this.scroll_alignment = settings.scroll_alignment;
		this.collapse_on = settings.collapse_on;
		this.sticky_disable = settings.sticky_disable;
		this.init();
	}
	
	PPToCModule.prototype = {
		settings: {},
		node: "",
		nodeClass: "",
	
		init: function() {

			// var heading_array = (this.head).split(",");
			var nodeClass = jQuery(this.nodeClass);
			var node_id = this.id;
			var selected_head = this.head_data;
			var container = this.container;
			var exclude = this.exclude;
			var collapsable_toc = this.collapsable_toc;
			var hierarchical_view = this.hierarchical_view;
			var sticky_toc = this.sticky_toc;
			var sticky_type = this.sticky_type;
			var scroll_top = this.scroll_top;
			var scroll_to = this.scroll_to;
			var scroll_to = this.scroll_to;
			var collapse_on = this.collapse_on;
			var sticky_disable = this.sticky_disable;
			$this = this;

			// This function adds a class to the specific heading that is excluded by the user
			this.excludeSetting();

			// Checks for container value
			if ( 0 === container.length || 'body' === container ) {
				container = $( 'body' ).find( '.fl-builder-content:not(header):not(footer)' );
			  }

			//   If nested/hierarchical view is true then it goes to the jquery.toc.js plugin
			if ( 'yes' === hierarchical_view ) {
				nodeClass.find( '#tc-list-wrapper' ).toc({
					content: container,
					headings: selected_head,
					scope: node_id
				  });
			}

			// Check for nested or simple population of the List Items
			if ( 'no' === hierarchical_view ) {
				this.hierarchicalToggle();
			}

			// Disable on Mobiles, Tabs, Desktops check.
			if (this.disableOnDevices(collapse_on) === false) {

				// Check for collapsible setting of ToC
				if ('yes' === collapsable_toc) {
					$('.fl-node-' + node_id + ' .tc-header').click(function() {
						$('.fl-node-' + node_id + ' .header-icon-expand').toggleClass('active');
						$('.fl-node-' + node_id + ' .header-icon-collapse').toggleClass('active');
						$('.fl-node-' + node_id + ' .tc-body').slideToggle(500);
					});
					
				} else {
					$('.fl-node-' + node_id + ' .tc-header').css('cursor', 'default');
					$('.fl-node-' + node_id + ' .header-icon-expand').removeClass('active');
					$('.fl-node-' + node_id + ' .header-icon-collapse').removeClass('active');
				}
				
			} else {
				$('.fl-node-' + node_id + ' .tc-header').css('cursor', 'default');
				$('.fl-node-' + node_id + ' .header-icon-expand').removeClass('active');
				$('.fl-node-' + node_id + ' .header-icon-collapse').removeClass('active');
			}

			// Sticky ToC check for disable on specific Device.
			if ( this.disableOnDevices(sticky_disable) === false) {
				if ( 'yes' === sticky_toc ) {
					if( 'fixed' === sticky_type ) {
						this.stickyTocInit(true);
					} else {
						this.stickyTocInit(false);
					}
				}
			}

			// Scroll to Top function Initiation condition check.
			if ( 'yes' === scroll_top ) {
				if( 'window' === scroll_to ) {
					this.scrollTopInit(true);
				} else {
					this.scrollTopInit(false);
				}
			}
		},

		// Non-nested function initiation
		hierarchicalToggle: function() {
			var nodeClass = jQuery(this.nodeClass);
			var node_id = this.id;
			var selected_head = this.head_data;
			var container = this.container;
			$(container).find(selected_head).not('.tc-exclude-element').each(function(index){

				var anchor = "<a name='" + index + "'></a>";
				$(this).before(anchor);
				var li = "<li><a href='#" + index + "'>" + $(this).text() + "</a></li>";
				listItems = $(li);
				listItems.appendTo('#tc-list-wrapper');

			});
		},

		// Exclude function that adds a class to the excluded headings
		excludeSetting: function() {
			var exclude = this.exclude;
			if ( '' !== exclude ) {
				$(exclude).find('h2,h3,h4,h5,h6').each(function(i){
					$(this).addClass('tc-exclude-element');
				});		
			}
		},

		// Sticky ToC function
		stickyTocInit: function(isFixed) {

			var node_id = this.id;
			var stickyOffset = $('.fl-node-' + node_id + ' .tc-container').offset().top;
			stickyOffset = stickyOffset + $('.fl-node-' + node_id + ' .tc-container').height();

			$('.fl-node-' + node_id + ' .tc-container').wrap('<div class="fl-node-'+ node_id + ' tc-container-placeholder"></div>');
			$('.fl-node-' + node_id + ' .tc-container-placeholder').height($('.fl-node-' + node_id + ' .tc-container').outerHeight());

			$(window).scroll(function() {
				var scrollPos = $(window).scrollTop();
				
				if ( scrollPos >= stickyOffset) {
					if ( true === isFixed ) {
						$('.fl-node-' + node_id + ' .tc-container').removeClass('tc-sticky-custom');
						$('.fl-node-' + node_id + ' .tc-container').addClass('tc-sticky-fixed');
					} else {
						$('.fl-node-' + node_id + ' .tc-container').removeClass('tc-sticky-fixed');
						$('.fl-node-' + node_id + ' .tc-container').addClass('tc-sticky-custom');
					}
				} else {
					$('.fl-node-' + node_id + ' .tc-container').removeClass('tc-sticky-fixed');
					$('.fl-node-' + node_id + ' .tc-container').removeClass('tc-sticky-custom');
				}

			});

		},

		// Scroll to top Function
		scrollTopInit: function(isWindow) {

			var node_id = this.id;
			var scrollOffset = $('.fl-node-' + node_id + ' .tc-container').offset().top;
			var scroll_alignment = this.scroll_alignment;

			if( 'right' === scroll_alignment ) {
				$('.fl-node-' + node_id + ' .tc-scroll-top-container').removeClass('tc-scroll-align-left ');
				$('.fl-node-' + node_id + ' .tc-scroll-top-container').addClass('tc-scroll-align-right ');
			} else {
				$('.fl-node-' + node_id + ' .tc-scroll-top-container').removeClass('tc-scroll-align-right ');
				$('.fl-node-' + node_id + ' .tc-scroll-top-container').addClass('tc-scroll-align-left ');		
			}

			// Fade In and Out as per the selected scroll type
			$(window).scroll(function() {
				if(true === isWindow) {
					if($(this).scrollTop() > 1) {
						$('.fl-node-' + node_id + ' .tc-scroll-top-container').fadeIn();
					} else {
						$('.fl-node-' + node_id + ' .tc-scroll-top-container').fadeOut();
					}
				} else {
					if($(this).scrollTop() > scrollOffset) {
						$('.fl-node-' + node_id + ' .tc-scroll-top-container').fadeIn();
					} else {
						$('.fl-node-' + node_id + ' .tc-scroll-top-container').fadeOut();
					}
				}
			});

			// Click Event for Scroll Till Top or ToC.
			$('.tc-scroll-top-container').click(function(){
				if(true === isWindow) {
					$('html, body').animate({scrollTop : 0}, 800);
				} else {
					$('html, body').animate({scrollTop : scrollOffset}, 800);
				}
			});
		},

		// Function to check the disable setting for any device.
		disableOnDevices: function(disableOn) {
			var disableSetting;
			if ( 'none' === disableOn ) {
				disableSetting = false;
			}
			// Mobile check
			else if ( ( 'mobile' === disableOn ) && ( $(window).width() < 768 ) ) {
				disableSetting = true;
			}
			// Tablet check
			else if ( ( 'tablet' === disableOn ) && ( $(window).width() < 1025 ) ) {
				disableSetting = true;
			}
			// Desktop check
			else if ( ( 'desktop' === disableOn ) && ( $(window).width() < 1600 ) ) {
				disableSetting = true;
			}
			else {
				disableSetting = false;
			}

			var disableReturn = disableSetting;
			return disableReturn;
		}
	
	}

})(jQuery);

