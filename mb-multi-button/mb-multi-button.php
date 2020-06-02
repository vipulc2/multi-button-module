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
 * Summary. MBMultiButton Class inherits from Beaver Builder Class
 *
 * Description The class that extends to Beaver Builder Class for Multi Button Module.
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
				'name'            => __( 'Multiple Buttons Module', 'multi-button-plugin' ),
				'description'     => __( 'Multiple Button Module', 'multi-button-plugin' ),
				'group'           => __( 'Buttons', 'multi-button-plugin' ),
				'category'        => __( 'Buttons', 'multi-button-plugin' ),
				'dir'             => MULTI_BUTTON_DIR . 'mb-multi-button/',
				'url'             => MULTI_BUTTON_URL . 'mb-multi-button/',
				'icon'            => 'button.svg',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}

	/**
	 * Summary. Function checks the color type.
	 *
	 * Description This function checks the color type and returns a correct output.
	 *
	 * @since 1.0.0
	 *
	 * @param string $color_value holds the value of color.
	 */
	public function get_color( $color_value ) {
		if ( strpos( $color_value, 'rgb' ) !== false ) {
			return $color_value;
		} else {
			return '#' . $color_value;
		}
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'MBMultiButton',
	array(
		'button_content_tab' => array(
			'title'    => __( 'Content', 'multi-button-plugin' ), // Name of First Tab.
			'sections' => array(
				'select_button' => array(
					'title'  => '',
					'fields' => array(
						'mb_button_layout' => array(
							'type'    => 'select',
							'label'   => __( 'Select Layout Type', 'multi-button-plugin' ),
							'default' => 'row',
							'options' => array(
								'row'    => __( 'Horizontal', 'multi-button-plugin' ),
								'column' => __( 'Vertical', 'multi-button-plugin' ),
							),
							'toggle'  => array(
								'row'    => array(
									'fields'   => array(),
									'sections' => array(),
									'tabs'     => array(),
								),
								'column' => array(
									'fields'   => array(),
									'sections' => array(),
									'tabs'     => array(),
								),
							),
						),
						'button_list'      => array(
							'type'     => 'form',
							'label'    => __( 'Button', 'multi-button-plugin' ),
							'form'     => 'mb_multi_btn_form',
							'multiple' => true,
						),
					),
				),
			),
		),
		'button_style_tab'   => array(
			'title'    => __( 'Style', 'multi-button-plugin' ), // Name of Second Tab.
			'sections' => array(
				'button_style_color_uniform' => array(
					'title'  => 'Color',
					'fields' => array(
						'mb_common_bg_color'   => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'multi-button-plugin' ),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.mb-button',
								'property' => 'background-color',
							),
						),
						'mb_common_bg_hover'   => array(
							'type'       => 'color',
							'label'      => __( 'Hover Color', 'multi-button-plugin' ),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.mb-button',
								'property' => 'background-color',
							),
						),
						'mb_common_text_color' => array(
							'type'       => 'color',
							'label'      => __( 'Text Color', 'multi-button-plugin' ),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => false,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.mb-title',
								'property' => 'color',
							),
						),
						'mb_common_text_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Hover Text Color', 'multi-button-plugin' ),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => false,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.mb-button',
								'property' => 'color',
							),
						),
					),
				),
				'sizing_section_uniform'     => array(
					'title'  => 'Structure',
					'fields' => array(
						'mb_common_btn_width'  => array(
							'type'    => 'unit',
							'label'   => __( 'Width', 'multi-button-plugin' ),
							'slider'  => true,
							'default' => '',
							'units'   => array( 'px' ),
						),
						'mb_common_btn_height' => array(
							'type'    => 'unit',
							'label'   => __( 'Height', 'multi-button-plugin' ),
							'slider'  => true,
							'default' => '',
							'units'   => array( 'px' ),
						),
						'mb_common_icon_size'  => array(
							'type'   => 'unit',
							'label'  => __( 'Icon Size', 'multi-button-plugin' ),
							'slider' => true,
							'units'  => array( 'px' ),
						),
						'mb_common_icon_space' => array(
							'type'   => 'unit',
							'label'  => __( 'Icon Space from Text', 'multi-button-plugin' ),
							'slider' => true,
							'units'  => array( 'px' ),
						),
						'mb_common_padding'    => array(
							'type'   => 'dimension',
							'label'  => __( 'Button Padding', 'multi-button-plugin' ),
							'slider' => true,
							'units'  => array( 'px' ),
						),
					),
				),
				'border_section_uniform'     => array(
					'title'  => 'Border',
					'fields' => array(
						'mb_common_border'       => array(
							'type'       => 'border',
							'label'      => __( 'Border', 'multi-button-plugin' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.mb-button',
							),
						),
						'mb_common_image_border' => array(
							'type'   => 'unit',
							'label'  => __( 'Image Border Radius', 'multi-button-plugin' ),
							'slider' => true,
							'units'  => array( 'px' ),
						),
					),
				),
				'typo_section_uniform'       => array(
					'title'  => 'Typography',
					'fields' => array(
						'mb_common_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Title Typography', 'multi-button-plugin' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.mb-title',
							),
						),
					),
				),
				'spacing_of_button_uniform'  => array(
					'title'  => 'Spacing & Alignment',
					'fields' => array(
						'space_between_buttons' => array(
							'type'   => 'unit',
							'label'  => __( 'Spacing Between Buttons', 'multi-button-plugin' ),
							'slider' => true,
							'units'  => array( 'px' ),
						),
						'mb_btn_alignment'      => array(
							'type'    => 'align',
							'label'   => __( 'Button Align', 'multi-button-plugin' ),
							'default' => 'left',
							'preview' => array(
								'type'     => 'css',
								'selector' => '.mb-buttons',
								'property' => 'align-items',
							),
						),
					),
				),
			),
		),
	)
);
	// Register The form for each Button.
	FLBuilder::register_settings_form(
		'mb_multi_btn_form',
		array(
			'title' => __( 'Content', 'multi-button-plugin' ),
			'tabs'  => array(
				'general'     => array(
					'title'    => __( 'Content', 'multi-button-plugin' ),
					'sections' => array(
						'general' => array(
							'title'  => '',
							'fields' => array(
								'btn_title'        => array(
									'type'    => 'text',
									'default' => 'Button',
									'label'   => __( 'Title', 'multi-button-plugin' ),
								),
								'btn_link'         => array(
									'type'          => 'link',
									'default'       => '#',
									'label'         => __( 'Link', 'multi-button-plugin' ),
									'show_target'   => true,
									'show_nofollow' => true,
								),
								'mb_icon_type'     => array(
									'type'    => 'select',
									'label'   => __( 'Button Icon', 'multi-button-plugin' ),
									'default' => 'none',
									'options' => array(
										'none'  => __( 'None', 'multi-button-plugin' ),
										'icon'  => __( 'Icon', 'multi-button-plugin' ),
										'image' => __( 'Image', 'multi-button-plugin' ),
									),
									'toggle'  => array(
										'none'  => array(
											'fields'   => array(),
											'sections' => array(),
											'tabs'     => array(),
										),
										'icon'  => array(
											'fields'   => array( 'mb_icon_field', 'mb_icon_size', 'mb_icon_color', 'mb_icon_hover_color', 'mb_icon_spacing', 'mb_icon_position' ),
											'sections' => array(),
											'tabs'     => array(),
										),
										'image' => array(
											'fields'   => array( 'mb_image_field', 'mb_image_size', 'mb_image_spacing', 'mb_image_border_radius', 'mb_icon_position' ),
											'sections' => array(),
											'tabs'     => array(),
										),
									),
								),
								'mb_icon_field'    => array(
									'type'        => 'icon',
									'label'       => __( 'Icon Field', 'multi-button-plugin' ),
									'show_remove' => true,
								),
								'mb_image_field'   => array(
									'type'        => 'photo',
									'label'       => __( 'Photo Field', 'multi-button-plugin' ),
									'show_remove' => true,
								),
								'mb_icon_position' => array(
									'type'    => 'select',
									'label'   => __( 'Icon Position', 'multi-button-plugin' ),
									'default' => 'before',
									'options' => array(
										'before' => __( 'Before', 'multi-button-plugin' ),
										'after'  => __( 'After', 'multi-button-plugin' ),
									),
									'toggle'  => array(
										'before' => array(
											'fields'   => array(),
											'sections' => array(),
											'tabs'     => array(),
										),
										'after'  => array(
											'fields'   => array(),
											'sections' => array(),
											'tabs'     => array(),
										),
									),
								),
							),
						),
					),
				),
				'btn_styling' => array(
					'title'    => __( 'Style', 'multi-button-plugin' ),
					'sections' => array(
						'style_section'  => array(
							'title'  => '',
							'fields' => array(
								'mb_color_field'      => array(
									'type'       => 'color',
									'label'      => __( 'Background Color', 'multi-button-plugin' ),
									'default'    => '',
									'show_reset' => true,
									'show_alpha' => true,
									'preview'    => array(
										'type'     => 'css',
										'selector' => '.mb-button',
										'property' => 'background-color',
									),
								),
								'mb_hover_color'      => array(
									'type'       => 'color',
									'label'      => __( 'Hover Color', 'multi-button-plugin' ),
									'default'    => '',
									'show_reset' => true,
									'show_alpha' => true,
									'preview'    => array(
										'type'     => 'css',
										'selector' => '.mb-button',
										'property' => 'background-color',
									),
								),
								'mb_text_color'       => array(
									'type'       => 'color',
									'label'      => __( 'Text Color', 'multi-button-plugin' ),
									'default'    => '',
									'show_reset' => true,
									'show_alpha' => false,
									'preview'    => array(
										'type'     => 'css',
										'selector' => '.mb-button',
										'property' => 'color',
									),
								),
								'mb_text_hover_color' => array(
									'type'       => 'color',
									'label'      => __( 'Hover Text Color', 'multi-button-plugin' ),
									'default'    => '',
									'show_reset' => true,
									'show_alpha' => false,
									'preview'    => array(
										'type'     => 'css',
										'selector' => '.mb-button',
										'property' => 'color',
									),
								),
								'mb_icon_color'       => array(
									'type'       => 'color',
									'label'      => __( 'Icon Color', 'multi-button-plugin' ),
									'default'    => '',
									'show_reset' => true,
									'show_alpha' => false,
									'preview'    => array(
										'type'     => 'css',
										'selector' => '.mb-button',
										'property' => 'color',
									),
								),
								'mb_icon_hover_color' => array(
									'type'       => 'color',
									'label'      => __( 'Icon Hover Color', 'multi-button-plugin' ),
									'default'    => '',
									'show_reset' => true,
									'show_alpha' => false,
									'preview'    => array(
										'type'     => 'css',
										'selector' => '.mb-button',
										'property' => 'color',
									),
								),
							),
						),
						'sizing_section' => array(
							'title'  => 'Structure',
							'fields' => array(
								'mb_btn_width'     => array(
									'type'    => 'unit',
									'label'   => __( 'Width', 'multi-button-plugin' ),
									'slider'  => true,
									'default' => '',
									'units'   => array( 'px' ),
								),
								'mb_btn_height'    => array(
									'type'    => 'unit',
									'label'   => __( 'Height', 'multi-button-plugin' ),
									'slider'  => true,
									'default' => '',
									'units'   => array( 'px' ),
								),
								'mb_icon_size'     => array(
									'type'   => 'unit',
									'label'  => __( 'Icon Size', 'multi-button-plugin' ),
									'slider' => true,
									'units'  => array( 'px' ),
								),
								'mb_icon_spacing'  => array(
									'type'   => 'unit',
									'label'  => __( 'Icon Spacing', 'multi-button-plugin' ),
									'slider' => true,
									'units'  => array( 'px' ),
								),
								'mb_image_size'    => array(
									'type'   => 'unit',
									'label'  => __( 'Image Size', 'multi-button-plugin' ),
									'slider' => true,
									'units'  => array( 'px' ),
								),
								'mb_image_spacing' => array(
									'type'   => 'unit',
									'label'  => __( 'Image Spacing', 'multi-button-plugin' ),
									'slider' => true,
									'units'  => array( 'px' ),
								),
								'mb_btn_padding'   => array(
									'type'   => 'dimension',
									'label'  => __( 'Button Padding', 'multi-button-plugin' ),
									'slider' => true,
									'units'  => array( 'px' ),
								),
							),
						),
						'border_section' => array(
							'title'  => 'Border',
							'fields' => array(
								'mb_button_border'       => array(
									'type'       => 'border',
									'label'      => __( 'Border', 'multi-button-plugin' ),
									'responsive' => true,
									'preview'    => array(
										'type'     => 'css',
										'selector' => '.mb-button',
									),
								),
								'mb_image_border_radius' => array(
									'type'   => 'unit',
									'label'  => __( 'Image Border Radius', 'multi-button-plugin' ),
									'slider' => true,
									'units'  => array( 'px' ),
								),
							),
						),
						'typo_section'   => array(
							'title'  => 'Typography',
							'fields' => array(
								'mb_title_typography' => array(
									'type'       => 'typography',
									'label'      => __( 'Title Typography', 'multi-button-plugin' ),
									'responsive' => true,
									'preview'    => array(
										'type'     => 'css',
										'selector' => '.mb-title',
									),
								),
							),
						),
					),
				),
			),
		)
	);
