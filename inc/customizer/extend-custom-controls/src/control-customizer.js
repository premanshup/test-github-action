(function ($, api) {

	api.bind('ready', function () {

		sessionStorage.removeItem('astPartialContentRendered')

		/**
		 * Trigger on Above header column or layout change.
		 */
		api('astra-settings[hba-footer-column]', function (value) {
			value.bind(function (columns) {

				let event = new CustomEvent(
					'AstraBuilderChangeRowLayout', {
						'detail': {
							'columns': columns,
							'layout': api.value('astra-settings[hba-footer-layout]').get(),
							'type': 'above'
						}
					});
				document.dispatchEvent(event);
			});
		});

		/**
		 * Trigger on Primary header column or layout change.
		 */
		api('astra-settings[hb-footer-column]', function (value) {
			value.bind(function (columns) {

				let event = new CustomEvent(
					'AstraBuilderChangeRowLayout', {
						'detail': {
							'columns': columns,
							'layout': api.value('astra-settings[hb-footer-layout]').get(),
							'type': 'primary'
						}
					});
				document.dispatchEvent(event);
			});
		});

		/**
		 * Trigger on Below header column or layout change.
		 */
		api('astra-settings[hbb-footer-column]', function (value) {
			value.bind(function (columns) {

				let event = new CustomEvent(
					'AstraBuilderChangeRowLayout', {
						'detail': {
							'columns': columns,
							'layout': api.value('astra-settings[hbb-footer-layout]').get(),
							'type': 'below'
						}
					});
				document.dispatchEvent(event);
			});
		});

		/**
		 * Pass data to previewer when device changed.
		 */

		api.previewedDevice.bind(function(new_device, old_device) {

			api.previewer.send( 'astPreviewDeviceChanged', { 'device' : new_device } );

			let partialRendered = sessionStorage.getItem('astPartialContentRendered'),
				isCustomizerSaved = api.state('saved').get();

			if( ! partialRendered || isCustomizerSaved ) {
				return ;
			}

			let id = ( 'desktop' === new_device ) ? 'astra-settings[header-desktop-items]' : 'astra-settings[header-mobile-items]';
			api(id).set( { ...api(id).get(), ...[], flag: !api(id).get().flag } );

		});

	});

})(jQuery, wp.customize);
