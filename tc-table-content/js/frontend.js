(function($) {

	PPTableofContent = function( settings ) {
		this.settings = settings;
		this.id = settings.id;
		// this.head = settings.head;
		this.head_data = settings.head_data;
		this.nodeClass = '.fl-node-' + settings.id;
		this.container = settings.container;
		this.collapsable_toc = settings.collapsable_toc;
		this.hierarchical_view = settings.hierarchical_view;
		this.sticky_toc = settings.sticky_toc;
		this.sticky_type = settings.sticky_type;
		this.scroll_top = settings.scroll_top;
		this.scroll_to = settings.scroll_to;
		this.scroll_alignment = settings.scroll_alignment;
		this.init();
	}
	
	PPTableofContent.prototype = {
		settings: {},
		node: "",
		nodeClass: "",
	
		init: function() {

			// var heading_array = (this.head).split(",");
			var nodeClass = jQuery(this.nodeClass);
			var node_id = this.id;
			// var content_selector = nodeClass.find( '#uabb-toc-toggle' );
			var selected_head = this.head_data;
			var container = this.container;
			var collapsable_toc = this.collapsable_toc;
			var hierarchical_view = this.hierarchical_view;
			var sticky_toc = this.sticky_toc;
			var sticky_type = this.sticky_type;
			var scroll_top = this.scroll_top;
			var scroll_to = this.scroll_to;
			$this = this;

			if ( 0 === container.length ) {
				container = $( 'body' ).find( '.fl-builder-content' );
			  }

			if ( 'yes' === hierarchical_view ) {
				nodeClass.find( '#tc-list-wrapper' ).toc({
					content: container,
					headings: selected_head,
					scope: node_id
				  });
			}

			if ( 'no' === hierarchical_view ) {
				this.hierarchicalToggle();
			}

			  if ('yes' === collapsable_toc) {
				  $('.tc-header').click(function() {
					  $('.header-icon-expand').toggleClass('active');
					  $('.header-icon-collapse').toggleClass('active');
					  $('.tc-body').slideToggle(500);
				  });
				  
			  } else {
				  $('.tc-header').css('cursor', 'default');
				  $('.header-icon-expand').removeClass('active');
				  $('.header-icon-collapse').removeClass('active');
			  }

			if ( 'yes' === sticky_toc ) {
				if( 'fixed' === sticky_type ) {
					this.stickyTocInit(true);
				} else {
					this.stickyTocInit(false);
				}
			}

			if ( 'yes' === scroll_top ) {
				if( 'window' === scroll_to ) {
					this.scrollTopInit(true);
				} else {
					this.scrollTopInit(false);
				}
			}

		},

		hierarchicalToggle: function() {
			var nodeClass = jQuery(this.nodeClass);
			var node_id = this.id;
			var selected_head = this.head_data;
			var container = this.container;
			$(container).find(selected_head).each(function(index){

				var anchor = "<a name='" + index + "'></a>";
				$(this).before(anchor);
				var li = "<li><a href='#" + index + "'>" + $(this).text() + "</a></li>";
				listItems = $(li);
				listItems.appendTo('#tc-list-wrapper');

			});
		},

		stickyTocInit: function(isFixed) {

			var stickyOffset = $('.tc-container').offset().top;
			stickyOffset = stickyOffset + $('.tc-container').height();

			$('.tc-container').wrap('<div class="tc-container-placeholder"></div>');
			$('.tc-container-placeholder').height($('.tc-container').outerHeight());

			$(window).scroll(function() {
				var scrollPos = $(window).scrollTop();
				
				if ( scrollPos >= stickyOffset) {
					if ( true === isFixed ) {
						$('.tc-container').removeClass('tc-sticky-custom');
						$('.tc-container').addClass('tc-sticky-fixed');
					} else {
						$('.tc-container').removeClass('tc-sticky-fixed');
						$('.tc-container').addClass('tc-sticky-custom');
					}
				} else {
					$('.tc-container').removeClass('tc-sticky-fixed');
					$('.tc-container').removeClass('tc-sticky-custom');
				}

			});

		},

		scrollTopInit: function(isWindow) {
			var scrollOffset = $('.tc-container').offset().top;

			var scroll_alignment = this.scroll_alignment;

			if( 'right' === scroll_alignment ) {
				$('.tc-scroll-top-container').removeClass('tc-scroll-align-left ');
				$('.tc-scroll-top-container').addClass('tc-scroll-align-right ');
			} else {
				$('.tc-scroll-top-container').removeClass('tc-scroll-align-right ');
				$('.tc-scroll-top-container').addClass('tc-scroll-align-left ');
				
			}

			// Fade In and Out as per the selected scroll type
			$(window).scroll(function() {
				if(true === isWindow) {
					if($(this).scrollTop() > 1) {
						$('.tc-scroll-top-container').fadeIn();
					} else {
						$('.tc-scroll-top-container').fadeOut();
					}
				} else {
					if($(this).scrollTop() > scrollOffset) {
						$('.tc-scroll-top-container').fadeIn();
					} else {
						$('.tc-scroll-top-container').fadeOut();
					}
				}
			});

			// Scroll Till Top or ToC Function.
			$('.tc-scroll-top-container').click(function(){
				if(true === isWindow) {
					$('html, body').animate({scrollTop : 0}, 800);
				} else {
					$('html, body').animate({scrollTop : scrollOffset}, 800);
				}
			});
		}
	
	}

})(jQuery);

