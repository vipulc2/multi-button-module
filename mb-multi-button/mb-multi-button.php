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
		'button_content_tab'       => array(
			'title'    => __( 'Button Content', 'fl-builder' ), // Name of First Tab.
			'sections' => array(
				'select_button' => array(
					'title'  => 'Select Button',
					'fields' => array(
						'button_list' => array(
							'type'     => 'form',
							'label'    => __( 'Button', 'fl-builder' ),
							'form'     => 'mb_multi_btn_form',
							'multiple' => true,
						),
					),
				),
			),
		),
		'button_container_spacing' => array(
			'title'    => __( 'Spacing', 'fl-builder' ), // Name of Second Tab.
			'sections' => array(
				'spacing_of_button' => array(
					'title'  => '',
					'fields' => array(
						'spacing_between_button' => array(
							'type'        => 'unit',
							'label'       => 'Spacing Between Buttons',
							'slider'      => true,
							'description' => 'px',
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.mb-btn-container',
								'property' => 'margin-right',
							),
						),
						'mb_btn_alignment'       => array(
							'type'    => 'select',
							'label'   => __( 'Select Type', 'fl-builder' ),
							'default' => 'none',
							'options' => array(
								'left'          => __( 'Left', 'fl-builder' ),
								'right'         => __( 'Right', 'fl-builder' ),
								'center'        => __( 'Center', 'fl-builder' ),
								'space_between' => __( 'Space Between', 'fl-builder' ),
								'space_around'  => __( 'Space Around', 'fl-builder' ),
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
		'title' => __( 'Button Content', 'fl-builder' ),
		'tabs'  => array(
			'general'         => array(
				'title'    => __( 'Button Content', 'fl-builder' ),
				'sections' => array(
					'general' => array(
						'title'  => '',
						'fields' => array(
							'btn_title'      => array(
								'type'    => 'text',
								'default' => 'Button',
								'label'   => __( 'Button Title', 'fl-builder' ),
							),
							'btn_link'       => array(
								'type'    => 'link',
								'default' => '#',
								'label'   => __( 'Button Link', 'fl-builder' ),
							),
							'mb_btn_type'    => array(
								'type'    => 'select',
								'label'   => __( 'Select Type', 'fl-builder' ),
								'default' => 'none',
								'options' => array(
									'none'  => __( 'None', 'fl-builder' ),
									'icon'  => __( 'Icon', 'fl-builder' ),
									'image' => __( 'Image', 'fl-builder' ),
								),
								'toggle'  => array(
									'none'  => array(
										'fields'   => array(),
										'sections' => array(),
										'tabs'     => array(),
									),
									'icon'  => array(
										'fields'   => array( 'mb_icon_field', 'mb_icon_size', 'mb_icon_color', 'mb_icon_hover_color', 'mb_icon_spacing' ),
										'sections' => array(),
										'tabs'     => array(),
									),
									'image' => array(
										'fields'   => array( 'mb_image_field', 'mb_image_size', 'mb_image_spacing', 'mb_image_border_radius' ),
										'sections' => array(),
										'tabs'     => array(),
									),
								),
							),
							'mb_icon_field'  => array(
								'type'        => 'icon',
								'label'       => __( 'Icon Field', 'fl-builder' ),
								'show_remove' => true,
							),
							'mb_image_field' => array(
								'type'        => 'photo',
								'label'       => __( 'Photo Field', 'fl-builder' ),
								'show_remove' => true,
							),
						),
					),
				),
			),
			'btn_styling'     => array(
				'title'    => __( 'Style Button', 'fl-builder' ),
				'sections' => array(
					'style_section'  => array(
						'title'  => '',
						'fields' => array(
							'mb_color_field'      => array(
								'type'       => 'color',
								'label'      => __( 'Button Background Color', 'fl-builder' ),
								'default'    => '',
								'show_reset' => true,
								'show_alpha' => true,
								'preview'    => array(
									'type'     => 'css',
									'selector' => '.mb-each-btn',
									'property' => 'background-color',
								),
							),
							'mb_hover_color'      => array(
								'type'       => 'color',
								'label'      => __( 'Button Hover Color', 'fl-builder' ),
								'default'    => '',
								'show_reset' => true,
								'show_alpha' => true,
								'preview'    => array(
									'type'     => 'css',
									'selector' => '.mb-each-btn',
									'property' => 'background-color',
								),
							),
							'mb_text_color'       => array(
								'type'       => 'color',
								'label'      => __( 'Button Text Color', 'fl-builder' ),
								'default'    => 'ffffff',
								'show_reset' => true,
								'show_alpha' => false,
								'preview'    => array(
									'type'     => 'css',
									'selector' => '.mb-each-btn',
									'property' => 'color',
								),
							),
							'mb_text_hover_color' => array(
								'type'       => 'color',
								'label'      => __( 'Button Hover Text Color', 'fl-builder' ),
								'default'    => '',
								'show_reset' => true,
								'show_alpha' => false,
								'preview'    => array(
									'type'     => 'css',
									'selector' => '.mb-each-btn',
									'property' => 'color',
								),
							),
							'mb_icon_color'       => array(
								'type'       => 'color',
								'label'      => __( 'Icon Color', 'fl-builder' ),
								'default'    => '444444',
								'show_reset' => true,
								'show_alpha' => false,
								'preview'    => array(
									'type'     => 'css',
									'selector' => '.mb-each-btn',
									'property' => 'color',
								),
							),
							'mb_icon_hover_color' => array(
								'type'       => 'color',
								'label'      => __( 'Icon Hover Color', 'fl-builder' ),
								'default'    => '333333',
								'show_reset' => true,
								'show_alpha' => false,
								'preview'    => array(
									'type'     => 'css',
									'selector' => '.mb-each-btn',
									'property' => 'color',
								),
							),
						),
					),
					'sizing_section' => array(
						'title'  => 'Sizing',
						'fields' => array(
							'mb_btn_width'     => array(
								'type'        => 'unit',
								'label'       => 'Button Width',
								'slider'      => true,
								'default'     => 150,
								'description' => 'px',
							),
							'mb_btn_height'    => array(
								'type'        => 'unit',
								'label'       => 'Button Height',
								'slider'      => true,
								'default'     => 80,
								'description' => 'px',
							),
							'mb_icon_size'     => array(
								'type'        => 'unit',
								'label'       => 'Icon Size',
								'slider'      => true,
								'description' => 'px',
							),
							'mb_icon_spacing'  => array(
								'type'        => 'unit',
								'label'       => 'Icon Spacing',
								'slider'      => true,
								'description' => 'px',
							),
							'mb_image_size'    => array(
								'type'        => 'unit',
								'label'       => 'Image Size',
								'slider'      => true,
								'description' => 'px',
							),
							'mb_image_spacing' => array(
								'type'        => 'unit',
								'label'       => 'Image Spacing',
								'slider'      => true,
								'description' => 'px',
							),
							'mb_btn_margin'    => array(
								'type'        => 'dimension',
								'label'       => 'Button Margin',
								'slider'      => true,
								'description' => 'px',
							),
							'mb_btn_padding'   => array(
								'type'        => 'dimension',
								'label'       => 'Button Padding',
								'slider'      => true,
								'description' => 'px',
							),
						),
					),
				),
			),
			'btn_typo_border' => array(
				'title'    => __( 'Border & Typography', 'fl-builder' ),
				'sections' => array(
					'border_section' => array(
						'title'  => '',
						'fields' => array(
							'mb_button_border'       => array(
								'type'       => 'border',
								'label'      => 'Button Border',
								'responsive' => true,
								'preview'    => array(
									'type'     => 'css',
									'selector' => '.mb-btn-preset',
								),
							),
							'mb_image_border_radius' => array(
								'type'        => 'unit',
								'label'       => 'Image Border Radius',
								'slider'      => true,
								'description' => 'px',
							),
						),
					),
					'typo_section'   => array(
						'title'  => 'Typography',
						'fields' => array(
							'mb_title_typography' => array(
								'type'       => 'typography',
								'label'      => 'Title Typography',
								'responsive' => true,
								'preview'    => array(
									'type'     => 'css',
									'selector' => '.mb-title-preset',
								),
							),
						),
					),
				),
			),
		),
	)
);
