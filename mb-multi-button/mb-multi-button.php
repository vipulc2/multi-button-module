<?php
/**
 * Summary File Contains Class for Beaver Builder custom Multi Button Module
 *
 * Description. Contains class for Multi Button Module.
 *
 * @link URL
 *
 * @package mb-multi-button
 *
 * @since 1.0.0
 */

/**
 * Summary. VIconModule Class inherits from Beaver Builder Class
 *
 * Description The class that extends to Beaver Builder Class for VC Icon List.
 *
 * @since 1.0.0
 */
class MBMultiButton extends FLBuilderModule {

	/**
	 * Summary. Function that defines the name, group of module.
	 *
	 * Description This function sets the name, group, category, directory of the custom module.
	 *
	 * @since 1.0.0
	 *
	 * @method __construct
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Multiple Buttons Module', 'fl-builder' ),
				'description'     => __( 'Multiple Button Module', 'fl-builder' ),
				'group'           => __( 'Buttons', 'fl-builder' ),
				'category'        => __( 'Buttons', 'fl-builder' ),
				'dir'             => MULTI_BUTTON_DIR . 'mb-multi-button/',
				'url'             => MULTI_BUTTON_URL . 'mb-multi-button/',
				'icon'            => 'button.svg',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'MBMultiButton',
	array(
		'button_content_tab' => array(
			'title'    => __( 'Button Content', 'fl-builder' ), // Name of First Tab.
			'sections' => array(
				'select_button' => array(
					'title'  => 'Select Button',
					'fields' => array(
						'button_list' => array(
							'type'     => 'text',
							'label'    => __( 'Button', 'fl-builder' ),
							'multiple' => true,
						),
					),
				),
			),
		),
		( function() {
			$items = $settings->button_list;
		if ( is_array( $items ) && count( $items ) ) {

			for ( $i = 0; $i < count( $items ); $i++ ) {
				echo ( "'button_content_tab$i' => array(
					'title'    => __( 'Button Content', 'fl-builder' ), // Name of First Tab.
					'sections' => array(
						'select_button$i' => array(
							'title'  => 'Select Button',
							'fields' => array(
								'button_list$i' => array(
									'type'     => 'text',
									'label'    => __( 'Button Addition', 'fl-builder' ),
									'multiple' => true,
								),
							),
						),
					),
				)," );
			}
		}
		} )();

	)
);
