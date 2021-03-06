<?php
/**
 * Summary File Contains Class for Beaver Builder Table of Content
 *
 * Description. Contains class for Table of Content.
 *
 * @link URL
 *
 * @package multi-button
 *
 * @since 1.0.0
 */

/**
 * Summary. TCTableContent Class inherits from Beaver Builder Class
 *
 * Description The class that extends to Beaver Builder Class for Table of Content.
 *
 * @since 1.0.0
 */
class ToCModule extends FLBuilderModule {

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
				'name'            => __( 'Table of Content', 'multi-button-plugin' ),
				'description'     => __( 'Table of Content', 'multi-button-plugin' ),
				'group'           => __( 'Table of Content', 'multi-button-plugin' ),
				'category'        => __( 'Table of Content', 'multi-button-plugin' ),
				'dir'             => MULTI_BUTTON_DIR . 'table-of-content/',
				'url'             => MULTI_BUTTON_URL . 'table-of-content/',
				'icon'            => 'button.svg',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
		$this->add_js( 'pptableofcontent', $this->url . 'js/jquery.toc.js', array(), '', true );
		$this->add_css( 'font-awesome-5' );
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
	'ToCModule',
	array(
		'content' => array(
			'title'    => __( 'Content', 'multi-button-plugin' ),
			'sections' => array(
				'tc_content'         => array(
					'title'  => __( 'Table of Content', 'multi-button-plugin' ),
					'fields' => array(
						'heading_title' => array(
							'type'    => 'text',
							'label'   => __( 'Title', 'multi-button-plugin' ),
							'default' => '',
						),
						// 'html_tag'      => array(
						// 'type'    => 'select',
						// 'label'   => __( 'HTML Tag', 'multi-button-plugin' ),
						// 'default' => 'h2',
						// 'options' => array(
						// 'h2'  => __( 'H2', 'multi-button-plugin' ),
						// 'h3'  => __( 'H3', 'multi-button-plugin' ),
						// 'h4'  => __( 'H3', 'multi-button-plugin' ),
						// 'h5'  => __( 'H3', 'multi-button-plugin' ),
						// 'h6'  => __( 'H3', 'multi-button-plugin' ),
						// 'div' => __( 'Div', 'multi-button-plugin' ),
						// ),
						// ),
						'list_style'    => array(
							'type'    => 'select',
							'label'   => __( 'List Style', 'multi-button-plugin' ),
							'default' => 'numbers',
							'options' => array(
								// 'none'    => __( 'None', 'multi-button-plugin' ),
								'numbers' => __( 'Numbers', 'multi-button-plugin' ),
								'bullets' => __( 'Bullets', 'multi-button-plugin' ),
							),
							'toggle'  => array(
								'bullets' => array(
									'fields'   => array( 'marker_field' ),
									'sections' => array(),
									'tabs'     => array(),
								),
							),
						),
						// 'marker_field'  => array(
						// 'type'        => 'icon',
						// 'label'       => __( 'Icon', 'multi-button-plugin' ),
						// 'show_remove' => true,
						// ),
					),
				),
				'include'            => array(
					'title'  => __( 'Include', 'multi-button-plugin' ),
					'fields' => array(
						'anchor_tag'        => array(
							'type'         => 'select',
							'label'        => __( 'Anchors By Tags', 'multi-button-plugin' ),
							'default'      => 'h2',
							'options'      => array(
								'h2' => __( 'H2', 'multi-button-plugin' ),
								'h3' => __( 'H3', 'multi-button-plugin' ),
								'h4' => __( 'H4', 'multi-button-plugin' ),
								'h5' => __( 'H5', 'multi-button-plugin' ),
								'h6' => __( 'H6', 'multi-button-plugin' ),
							),
							'multi-select' => true,
							'help'         => __( 'Select multiple headings you want to include with Shift + click', 'multi-button-plugin' ),
						),
						'include_container' => array(
							'type'        => 'text',
							'default'     => 'body',
							'label'       => __( 'Container', 'multi-button-plugin' ),
							'help'        => __( 'Type in the container you want to include the headings from. Remember to use period(.) before a class and (#) before an ID you want to include from', 'multi-button-plugin' ),
							'description' => __( 'Ex: body or .container-class or #container-id', 'multi-button-plugin' ),
						),
					),
				),
				'exclude'            => array(
					'title'  => __( 'Exclude', 'multi-button-plugin' ),
					'fields' => array(
						'exclude_container' => array(
							'type'        => 'text',
							'label'       => __( 'Container', 'multi-button-plugin' ),
							'default'     => '',
							'help'        => __( 'Use (.) before classname and (#) before ID and seperate multiple elements with a comma(,) and a single space afterward', 'multi-button-plugin' ),
							'description' => __( 'Ex: .container-class, #container-id', 'multi-button-plugin' ),
						),
					),
				),
				'additional_options' => array(
					'title'  => __( 'Additional Options', 'multi-button-plugin' ),
					'fields' => array(
						'word_wrap'           => array(
							'type'    => 'select',
							'label'   => __( 'Word Wrap', 'multi-button-plugin' ),
							'default' => 'no',
							'options' => array(
								'no'  => __( 'No', 'multi-button-plugin' ),
								'yes' => __( 'Yes', 'multi-button-plugin' ),
							),
						),
						'collapsable_toc'     => array(
							'type'    => 'select',
							'label'   => __( 'Collapsable TOC', 'multi-button-plugin' ),
							'default' => 'yes',
							'options' => array(
								'no'  => __( 'No', 'multi-button-plugin' ),
								'yes' => __( 'Yes', 'multi-button-plugin' ),
							),
						),
						'collapse_icon_field' => array(
							'type'        => 'icon',
							'label'       => __( 'Collapse Icon', 'multi-button-plugin' ),
							'default'     => 'fa fa-plus',
							'show_remove' => true,
						),
						'expand_icon_field'   => array(
							'type'        => 'icon',
							'label'       => __( 'Expand Icon', 'multi-button-plugin' ),
							'default'     => 'fa fa-minus',
							'show_remove' => true,
						),
						'collapse_on'         => array(
							'type'    => 'select',
							'label'   => __( 'Collapse On', 'multi-button-plugin' ),
							'default' => 'none',
							'options' => array(
								'none'    => __( 'None', 'multi-button-plugin' ),
								'mobile'  => __( 'Mobile(< 768px)', 'multi-button-plugin' ),
								'tablet'  => __( 'Tablet(< 1025px)', 'multi-button-plugin' ),
								'desktop' => __( 'Desktop(< 1600px)', 'multi-button-plugin' ),
							),
						),
						'hierarchical_view'   => array(
							'type'    => 'select',
							'label'   => __( 'Hierarchical View', 'multi-button-plugin' ),
							'default' => 'yes',
							'options' => array(
								'no'  => __( 'No', 'multi-button-plugin' ),
								'yes' => __( 'Yes', 'multi-button-plugin' ),
							),
						),
						// 'collapse_sub_heading' => array(
						// 'type'    => 'select',
						// 'label'   => __( 'Collapse Sub Headings', 'multi-button-plugin' ),
						// 'default' => 'yes',
						// 'options' => array(
						// 'no'  => __( 'No', 'multi-button-plugin' ),
						// 'yes' => __( 'Yes', 'multi-button-plugin' ),
						// ),
						// ),
						'sticky_toc'          => array(
							'type'    => 'select',
							'label'   => __( 'Sticky TOC on Scroll', 'multi-button-plugin' ),
							'default' => 'no',
							'options' => array(
								'no'  => __( 'No', 'multi-button-plugin' ),
								'yes' => __( 'Yes', 'multi-button-plugin' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields'   => array(),
									'sections' => array( 'sticky_toc_section', 'sticky_style_section' ),
									'tabs'     => array(),
								),
							),
						),
						'scroll_top'          => array(
							'type'    => 'select',
							'label'   => __( 'Scroll to Top', 'multi-button-plugin' ),
							'default' => 'no',
							'options' => array(
								'no'  => __( 'No', 'multi-button-plugin' ),
								'yes' => __( 'Yes', 'multi-button-plugin' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields'   => array(),
									'sections' => array( 'scroll_top_section', 'scroll_style_section' ),
									'tabs'     => array(),
								),
							),
						),
					),
				),
				'sticky_toc_section' => array(
					'title'  => __( 'Sticky TOC', 'multi-button-plugin' ),
					'fields' => array(
						'sticky_disable'        => array(
							'type'    => 'select',
							'label'   => __( 'Disabled On', 'multi-button-plugin' ),
							'default' => 'none',
							'options' => array(
								'none'    => __( 'None', 'multi-button-plugin' ),
								'mobile'  => __( 'Mobile(< 768px)', 'multi-button-plugin' ),
								'tablet'  => __( 'Tablet(< 1025px)', 'multi-button-plugin' ),
								'desktop' => __( 'Desktop(< 1600px)', 'multi-button-plugin' ),
							),
						),
						'sticky_type'           => array(
							'type'    => 'select',
							'label'   => __( 'Sticky TOC on Scroll', 'multi-button-plugin' ),
							'default' => 'custom',
							'options' => array(
								'custom' => __( 'Custom Position', 'multi-button-plugin' ),
								'fixed'  => __( 'Sticky in Place', 'multi-button-plugin' ),
							),
							'toggle'  => array(
								'custom' => array(
									'fields' => array( 'horizontal_position', 'vertical_position' ),
								),
								'fixed'  => array(
									'fields' => array( 'fixed_offset_position' ),
								),
							),
						),
						'horizontal_position'   => array(
							'type'         => 'unit',
							'label'        => __( 'Horizontal Position', 'multi-button-plugin' ),
							'units'        => array( 'px', 'vw', '%' ),
							'slider'       => true,
							'responsive'   => true,
							'default_unit' => '%', // Optional.
							'preview'      => array(
								'type'     => 'css',
								'selector' => '.tc-sticky-custom',
								'property' => 'left',
							),
						),
						'vertical_position'     => array(
							'type'         => 'unit',
							'label'        => __( 'Vertical Position', 'multi-button-plugin' ),
							'units'        => array( 'px', 'vw', '%' ),
							'slider'       => true,
							'responsive'   => true,
							'default_unit' => '%', // Optional.
							'preview'      => array(
								'type'     => 'css',
								'selector' => '.tc-sticky-custom',
								'property' => 'bottom',
							),
						),
						'fixed_offset_position' => array(
							'type'         => 'unit',
							'label'        => __( 'Offset Position', 'multi-button-plugin' ),
							'units'        => array( 'px', 'vw', '%' ),
							'slider'       => true,
							'responsive'   => true,
							'default_unit' => '%', // Optional.
							'preview'      => array(
								'type'     => 'css',
								'selector' => '.tc-sticky-fixed',
								'property' => 'left',
							),
						),
					),
				),
				'scroll_top_section' => array(
					'title'  => __( 'Scroll to Top', 'multi-button-plugin' ),
					'fields' => array(
						'scroll_to'                  => array(
							'type'    => 'select',
							'label'   => __( 'Scroll to', 'multi-button-plugin' ),
							'default' => 'window',
							'options' => array(
								'window' => __( 'Window Top', 'multi-button-plugin' ),
								'toc'    => __( 'Table of Contents', 'multi-button-plugin' ),
							),
						),
						'scroll_icon'                => array(
							'type'        => 'icon',
							'label'       => __( 'Icon', 'multi-button-plugin' ),
							'default'     => 'fas fa-arrow-up',
							'show_remove' => true,
						),
						'scroll_alignment'           => array(
							'type'    => 'align',
							'label'   => __( 'Alignment', 'multi-button-plugin' ),
							'default' => 'center',
							'preview' => array(
								'type'     => 'css',
								'selector' => '',
								'property' => '',
							),
						),
						'scroll_horizontal_position' => array(
							'type'         => 'unit',
							'label'        => __( 'Horizontal Position', 'multi-button-plugin' ),
							'units'        => array( 'px', 'vw', '%' ),
							'slider'       => true,
							'responsive'   => true,
							'default_unit' => '%', // Optional.
							'preview'      => array(
								'type'     => 'css',
								'selector' => '.tc-scroll-align-left',
								'property' => 'left',
							),
						),
						'scroll_vertical_position'   => array(
							'type'         => 'unit',
							'label'        => __( 'Vertical Position', 'multi-button-plugin' ),
							'units'        => array( 'px', 'vw', '%' ),
							'slider'       => true,
							'responsive'   => true,
							'default_unit' => '%', // Optional.
							'preview'      => array(
								'type'     => 'css',
								'selector' => '.tc-scroll-top-container',
								'property' => 'bottom',
							),
						),
						'scroll_z_index'             => array(
							'type'    => 'unit',
							'label'   => __( 'Z-Index', 'multi-button-plugin' ),
							'units'   => array( 'px' ),
							'slider'  => true,
							'preview' => array(
								'type'     => 'css',
								'selector' => '.tc-scroll-top-container',
								'property' => 'z-index',
							),
						),
					),
				),
			),
		),
		'style'   => array(
			'title'    => __( 'Style', 'multi-button-plugin' ),
			'sections' => array(
				'box_section'          => array(
					'title'  => __( 'Box', 'multi-button-plugin' ),
					'fields' => array(
						'box_bg_color'   => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'multi-button-plugin' ),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'box_border'     => array(
							'type'       => 'border',
							'label'      => __( 'Border', 'multi-button-plugin' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.tc-container',
							),
						),
						'box_min_height' => array(
							'type'         => 'unit',
							'label'        => __( 'Min Height', 'multi-button-plugin' ),
							'units'        => array( 'px', 'vw' ),
							'slider'       => true,
							'responsive'   => true,
							'default_unit' => 'px', // Optional.
							'preview'      => array(
								'type'     => 'css',
								'selector' => '.tc-container',
								'property' => 'height',
							),
						),
					),
				),
				'header_section'       => array(
					'title'  => __( 'Header', 'multi-button-plugin' ),
					'fields' => array(
						'header_alignment'       => array(
							'type'    => 'align',
							'label'   => __( 'Alignment', 'multi-button-plugin' ),
							'default' => 'left',
							'preview' => array(
								'type'     => 'css',
								'selector' => '.tc-header-title',
								'property' => 'text-align',
							),
						),
						'header_padding'         => array(
							'type'   => 'dimension',
							'label'  => __( 'Padding', 'multi-button-plugin' ),
							'slider' => true,
							'units'  => array( 'px' ),
						),
						'header_bg_color'        => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'multi-button-plugin' ),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'header_text_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Text Color', 'multi-button-plugin' ),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => false,
						),
						'header_text_typo'       => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'multi-button-plugin' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '',
							),
						),
						'header_icon_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Icon Color', 'multi-button-plugin' ),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => false,
						),
						'header_seperator_width' => array(
							'type'    => 'unit',
							'label'   => __( 'Seperator Width', 'multi-button-plugin' ),
							'units'   => array( 'px' ),
							'slider'  => true,
							'preview' => array(
								'type'     => 'css',
								'selector' => '.tc-seperator',
								'property' => 'height',
							),
						),
						'header_seperator_color' => array(
							'type'       => 'color',
							'label'      => __( 'Seperator Color', 'multi-button-plugin' ),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => false,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.tc-seperator',
								'property' => 'background-color',
							),
						),
					),
				),
				'list_section'         => array(
					'title'  => __( 'List', 'multi-button-plugin' ),
					'fields' => array(
						'list_padding'          => array(
							'type'   => 'dimension',
							'label'  => __( 'Padding', 'multi-button-plugin' ),
							'slider' => true,
							'units'  => array( 'px' ),
						),
						'list_typo'             => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'multi-button-plugin' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '',
							),
						),
						// 'list_heading_select'   => array(
						// 'type'    => 'select',
						// 'label'   => __( 'Heading Select', 'multi-button-plugin' ),
						// 'default' => 'h2',
						// 'options' => array(
						// 'h2' => __( 'H2', 'multi-button-plugin' ),
						// 'h3' => __( 'H3', 'multi-button-plugin' ),
						// 'h4' => __( 'H3', 'multi-button-plugin' ),
						// 'h5' => __( 'H3', 'multi-button-plugin' ),
						// 'h6' => __( 'H3', 'multi-button-plugin' ),
						// ),
						// ),
						// 'list_heading_typo'     => array(
						// 'type'       => 'typography',
						// 'label'      => __( 'Typography', 'multi-button-plugin' ),
						// 'responsive' => true,
						// 'preview'    => array(
						// 'type'     => 'css',
						// 'selector' => '',
						// ),
						// ),
						// 'list_indent'           => array(
						// 'type'       => 'unit',
						// 'label'      => __( 'Indent', 'multi-button-plugin' ),
						// 'units'      => array( 'px', 'em' ),
						// 'slider'     => true,
						// 'responsive' => true,
						// 'preview'    => array(
						// 'type'     => 'css',
						// 'selector' => '.my-class',
						// 'property' => 'width',
						// ),
						// ),
						'list_status'           => array(
							'type'    => 'select',
							'label'   => __( 'List Items Status', 'multi-button-plugin' ),
							'default' => 'normal',
							'options' => array(
								'normal' => __( 'Normal', 'multi-button-plugin' ),
								'hover'  => __( 'Hover', 'multi-button-plugin' ),
								'active' => __( 'Active', 'multi-button-plugin' ),
							),
							'toggle'  => array(
								'normal' => array(
									'fields'   => array( 'list_normal_color', 'list_normal_underline' ),
									'sections' => array(),
									'tabs'     => array(),
								),
								'hover'  => array(
									'fields'   => array( 'list_hover_color', 'list_hover_underline' ),
									'sections' => array(),
									'tabs'     => array(),
								),
								'active' => array(
									'fields'   => array( 'list_active_color', 'list_active_underline' ),
									'sections' => array(),
									'tabs'     => array(),
								),
							),
						),
						'list_normal_color'     => array(
							'type'       => 'color',
							'label'      => __( 'Text Color', 'multi-button-plugin' ),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => false,
						),
						'list_hover_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Text Color', 'multi-button-plugin' ),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => false,
						),
						'list_active_color'     => array(
							'type'       => 'color',
							'label'      => __( 'Text Color', 'multi-button-plugin' ),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => false,
						),
						'list_normal_underline' => array(
							'type'    => 'select',
							'label'   => __( 'Underline', 'multi-button-plugin' ),
							'default' => 'no',
							'options' => array(
								'no'  => __( 'No', 'multi-button-plugin' ),
								'yes' => __( 'Yes', 'multi-button-plugin' ),
							),
						),
						'list_hover_underline'  => array(
							'type'    => 'select',
							'label'   => __( 'Underline', 'multi-button-plugin' ),
							'default' => 'no',
							'options' => array(
								'no'  => __( 'No', 'multi-button-plugin' ),
								'yes' => __( 'Yes', 'multi-button-plugin' ),
							),
						),
						'list_active_underline' => array(
							'type'    => 'select',
							'label'   => __( 'Underline', 'multi-button-plugin' ),
							'default' => 'no',
							'options' => array(
								'no'  => __( 'No', 'multi-button-plugin' ),
								'yes' => __( 'Yes', 'multi-button-plugin' ),
							),
						),
						// 'list_marker_color'     => array(
						// 'type'       => 'color',
						// 'label'      => __( 'Marker Color', 'multi-button-plugin' ),
						// 'default'    => '',
						// 'show_reset' => true,
						// 'show_alpha' => false,
						// ),
						// 'list_marker_size'      => array(
						// 'type'       => 'unit',
						// 'label'      => __( 'Marker Size', 'multi-button-plugin' ),
						// 'units'      => array( 'px', 'em' ),
						// 'slider'     => true,
						// 'responsive' => true,
						// 'preview'    => array(
						// 'type'     => 'css',
						// 'selector' => '.my-class',
						// 'property' => '',
						// ),
						// ),
					),
				),
				'sticky_style_section' => array(
					'title'  => __( 'Sticky TOC', 'multi-button-plugin' ),
					'fields' => array(
						'sticky_toc_width'   => array(
							'type'         => 'unit',
							'label'        => __( 'Width', 'multi-button-plugin' ),
							'units'        => array( 'px', 'vw', '%' ),
							'slider'       => true,
							'responsive'   => true,
							'default_unit' => '%', // Optional.
							'preview'      => array(
								'type'     => 'css',
								'selector' => '.tc-sticky-custom, .tc-sticky-fixed',
								'property' => 'width',
							),
						),
						'sticky_toc_opacity' => array(
							'type'    => 'unit',
							'label'   => __( 'Background Opacity', 'multi-button-plugin' ),
							'units'   => array( 'px' ),
							'slider'  => array(
								'min'  => 0,
								'max'  => 1,
								'step' => .10,
							),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.tc-sticky-custom',
								'property' => 'opacity',
							),
						),
						'sticky_toc_shadow'  => array(
							'type'        => 'shadow',
							'label'       => __( 'Box Shadow', 'multi-button-plugin' ),
							'show_spread' => true,
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.tc-sticky-custom',
								'property' => 'box-shadow',
							),
						),
					),
				),
				'scroll_style_section' => array(
					'title'  => __( 'Scroll to Top', 'multi-button-plugin' ),
					'fields' => array(
						'scroll_icon_size'   => array(
							'type'       => 'unit',
							'label'      => __( 'Icon Size', 'multi-button-plugin' ),
							'units'      => array( 'px', 'em' ),
							'slider'     => true,
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.tc-scroll-top-icon',
								'property' => 'font-size',
							),
						),
						'scroll_top_padding' => array(
							'type'    => 'unit',
							'label'   => __( 'Padding', 'multi-button-plugin' ),
							'units'   => array( 'px' ),
							'slider'  => true,
							'preview' => array(
								'type'     => 'css',
								'selector' => '.tc-scroll-top-container',
								'property' => 'padding',
							),
						),
						'scroll_icon_color'  => array(
							'type'       => 'color',
							'label'      => __( 'Color', 'multi-button-plugin' ),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => false,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.tc-scroll-top-icon',
								'property' => 'color',
							),
						),
						'scroll_bg_color'    => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'multi-button-plugin' ),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.tc-scroll-top-container',
								'property' => 'background-color',
							),
						),
						'scroll_border'      => array(
							'type'       => 'border',
							'label'      => __( 'Border', 'multi-button-plugin' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.tc-scroll-top-container',
							),
						),
					),
				),
			),
		),
	)
);
