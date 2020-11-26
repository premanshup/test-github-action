/**
 * Astra Builder admin settings
 *
 * @package Astra Builder
 * @since  3.0.0
 */

(function( $ ) {

	/**
	 * AJAX Request Queue
	 *
	 * - add()
	 * - remove()
	 * - run()
	 * - stop()
	 *
	 * @since 3.0.0
	 */
	var AstraBuilderAjaxQueue = (function() {

		var requests = [];

		return {

			/**
			 * Add AJAX request
			 *
			 * @since 3.0.0
			 */
			add:  function(opt) {
			    requests.push(opt);
			},

			/**
			 * Remove AJAX request
			 *
			 * @since 3.0.0
			 */
			remove:  function(opt) {
			    if( jQuery.inArray(opt, requests) > -1 )
			        requests.splice($.inArray(opt, requests), 1);
			},

			/**
			 * Run / Process AJAX request
			 *
			 * @since 3.0.0
			 */
			run: function() {
			    var self = this,
			        oriSuc;

			    if( requests.length ) {
			        oriSuc = requests[0].complete;

			        requests[0].complete = function() {
						if( typeof(oriSuc) === 'function' ) oriSuc();
						requests.shift();
						self.run.apply(self, []);
			        };

			        jQuery.ajax(requests[0]);

			    } else {

			      self.tid = setTimeout(function() {
			         self.run.apply(self, []);
			      }, 1000);
			    }
			},

			/**
			 * Stop AJAX request
			 *
			 * @since 3.0.0
			 */
			stop:  function() {

			    requests = [];
			    clearTimeout(this.tid);
			}
		};

	}());

	/**
	 * Astra Builder Admin JS
	 *
	 * @since 3.0.0
	 */
	AstBuilderAdmin = {

		init: function() {
			$( document ).delegate( ".ast-builder-migrate", "click", AstBuilderAdmin.migrate );
		},

		migrate: function( e ) {

			e.stopPropagation();
			e.preventDefault();

			$this = $( this );

			if ( $this.hasClass( 'updating-message' ) ) {
				return;
			}

			$this.addClass( 'updating-message' );

			 var data = {
				action: 'ast-migrate-to-builder',
				value: $(this).attr( 'data-value' ),
				nonce: astraBuilderModules.ajax_nonce,
			};

			$.ajax({
				url: astraBuilderModules.ajaxurl,
				type: 'POST',
				data: data,
				success: function( response ) {
					$this.removeClass( 'updating-message' );
					if ( response.success ) {
						if ( data.value == '1' ) {
							// Change button classes & text.
							$this.text( astraBuilderModules.old_header_footer );
							$this.attr( 'data-value', '0' );
						} else {
							// Change button classes & text.
							$this.text( astraBuilderModules.migrate_to_builder );
							$this.attr( 'data-value', '1' );
						}
					}
				}
			})
		},
	}

	$( document ).ready(function() {
		AstBuilderAdmin.init();
	});

})( jQuery );
