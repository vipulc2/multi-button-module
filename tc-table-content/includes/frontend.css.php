.fl-node-<?php echo $id; ?> .tc-body {
	<?php if ( isset( $settings->box_bg_color ) && ! empty( $settings->box_bg_color ) ) { ?>
	background-color: <?php echo $module->get_color( $settings->box_bg_color ); ?>;
	<?php } ?>
}

.fl-node-<?php echo $id; ?> .tc-header-title {
	<?php if ( isset( $settings->header_alignment ) && ! empty( $settings->header_alignment ) ) { ?>
	text-align: <?php echo $settings->header_alignment; ?>;
	<?php } ?>
	<?php if ( isset( $settings->header_text_color ) && ! empty( $settings->header_text_color ) ) { ?>
	color: #<?php echo ( $settings->header_text_color ); ?>;
	<?php } ?>
}

.fl-node-<?php echo $id; ?> .tc-header {
	<?php if ( isset( $settings->header_bg_color ) && ! empty( $settings->header_bg_color ) ) { ?>
	background-color: <?php echo $module->get_color( $settings->header_bg_color ); ?>;
	<?php } ?>
	<?php if ( isset( $settings->header_seperator_width ) && ( '' !== ( $settings->header_seperator_width ) ) ) { ?>
	border-bottom: <?php echo $settings->header_seperator_width; ?>px;
	<?php } ?>
	<?php if ( isset( $settings->header_seperator_color ) && ( '' !== ( $settings->header_seperator_color ) ) ) { ?>
	border-bottom: <?php echo $settings->header_seperator_color; ?>;
	<?php } ?>
}

.fl-node-<?php echo $id; ?> .header-icon-collapse {
	<?php if ( isset( $settings->header_icon_color ) && ! empty( $settings->header_icon_color ) ) { ?>
	color: #<?php echo $settings->header_icon_color; ?>;
	<?php } ?>
}
.fl-node-<?php echo $id; ?> .header-icon-expand {
	<?php if ( isset( $settings->header_icon_color ) && ! empty( $settings->header_icon_color ) ) { ?>
	color: #<?php echo $settings->header_icon_color; ?>;
	<?php } ?>
}

.fl-node-<?php echo $id; ?> .tc-lists li {
	<?php if ( isset( $settings->list_normal_color ) && ! empty( $settings->list_normal_color ) ) { ?>
	color: #<?php echo $settings->list_normal_color; ?>;
	<?php } ?>

	<?php if ( 'yes' === ( $settings->list_normal_underline ) ) { ?>
	text-decoration: underline;
	<?php } ?>

	<?php if ( 'no' === ( $settings->list_normal_underline ) ) { ?>
	text-decoration: none;
	<?php } ?>
}


.fl-node-<?php echo $id; ?> .tc-lists:hover {
	<?php if ( isset( $settings->list_hover_color ) && ! empty( $settings->list_hover_color ) ) { ?>
	color: #<?php echo $settings->list_hover_color; ?>;
	<?php } ?>

	<?php if ( 'yes' === ( $settings->list_hover_underline ) ) { ?>
	text-decoration: underline;
	<?php } ?>

	<?php if ( 'no' === ( $settings->list_hover_underline ) ) { ?>
	text-decoration: none;
	<?php } ?>
}

.fl-node-<?php echo $id; ?> .tc-lists:active {
	<?php if ( isset( $settings->list_active_color ) && ! empty( $settings->list_active_color ) ) { ?>
	color: #<?php echo $settings->list_active_color; ?>;
	<?php } ?>

	<?php if ( 'yes' === ( $settings->list_active_underline ) ) { ?>
	text-decoration: underline;
	<?php } ?>

	<?php if ( 'no' === ( $settings->list_active_underline ) ) { ?>
	text-decoration: none;
	<?php } ?>
}


.fl-node-<?php echo $id; ?> .tc-sticky-fixed {
	<?php if ( isset( $settings->sticky_toc_opacity ) && '' !== ( $settings->sticky_toc_opacity ) ) { ?>
	opacity: <?php echo $settings->sticky_toc_opacity; ?>;
	<?php } ?>
	<?php if ( isset( $settings->sticky_toc_shadow ) && ! empty( $settings->sticky_toc_shadow ) ) { ?>
	box-shadow: <?php echo FLBuilderColor::shadow( $settings->sticky_toc_shadow ); ?>
	<?php } ?>

}

.fl-node-<?php echo $id; ?> .tc-sticky-custom {
	<?php if ( isset( $settings->sticky_toc_opacity ) && '' !== ( $settings->sticky_toc_opacity ) ) { ?>
	opacity: <?php echo $settings->sticky_toc_opacity; ?>;
	<?php } ?>
	<?php if ( isset( $settings->sticky_toc_shadow ) && ! empty( $settings->sticky_toc_shadow ) ) { ?>
	box-shadow: <?php echo FLBuilderColor::shadow( $settings->sticky_toc_shadow ); ?>
	<?php } ?>
}

.fl-node-<?php echo $id; ?> .tc-scroll-top-container {
	<?php if ( isset( $settings->scroll_bg_color ) && ! empty( $settings->scroll_bg_color ) ) { ?>
	background-color: <?php echo $module->get_color( $settings->scroll_bg_color ); ?>;
	<?php } ?>
	<?php if ( isset( $settings->scroll_icon_color ) && ! empty( $settings->scroll_icon_color ) ) { ?>
	color: #<?php echo ( $settings->scroll_icon_color ); ?>;
	<?php } ?>
	<?php if ( isset( $settings->scroll_top_padding ) && '' !== ( $settings->scroll_top_padding ) ) { ?>
	padding: <?php echo ( $settings->scroll_top_padding ); ?>px;
	<?php } ?>
	<?php if ( isset( $settings->scroll_z_index ) && '' !== ( $settings->scroll_z_index ) ) { ?>
	z-index: <?php echo ( $settings->scroll_z_index ); ?>;
	<?php } ?>
}


<?php
// ---------------------------------------
// Border Rules.
// ---------------------------------------
// Container Box Border.
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'box_border',
		'selector'     => ".fl-node-$id .tc-container",
	)
);

// Scroll to Top Border.
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'scroll_border',
		'selector'     => ".fl-node-$id .tc-scroll-top-container",
	)
);

// ---------------------------------------
// Typography Rules.
// ---------------------------------------
// Header Typography.
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'header_text_typo',
		'selector'     => ".fl-node-$id .tc-header-title",
	)
);

// List Typography.
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'list_typo',
		'selector'     => ".fl-node-$id .tc-lists",
	)
);

// ---------------------------------------
// Padding Rules.
// ---------------------------------------
// Header Padding.
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'header_padding',
		'selector'     => ".fl-node-$id .tc-header",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'header_padding_top',
			'padding-right'  => 'header_padding_right',
			'padding-bottom' => 'header_padding_bottom',
			'padding-left'   => 'header_padding_left',
		),
	)
);

// Body Padding.
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'list_padding',
		'selector'     => ".fl-node-$id .tc-body",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'list_padding_top',
			'padding-right'  => 'list_padding_right',
			'padding-bottom' => 'list_padding_bottom',
			'padding-left'   => 'list_padding_left',
		),
	)
);

// ---------------------------------------
// Responsive Rules.
// ---------------------------------------

// Container Min Height.
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'box_min_height',
		'selector'     => ".fl-node-$id .tc-container",
		'prop'         => 'min-height',
	)
);

// ------------------Sticky ToC-------------------------

// Horizontal Position (Available on Custom position).
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'horizontal_position',
		'selector'     => ".fl-node-$id .tc-sticky-custom",
		'prop'         => 'left',
	)
);

// Vertical Position (Available on Custom position).
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'vertical_position',
		'selector'     => ".fl-node-$id .tc-sticky-custom",
		'prop'         => 'bottom',
	)
);

// Offset (Available on Fixed position).
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'fixed_offset_position',
		'selector'     => ".fl-node-$id .tc-sticky-fixed",
		'prop'         => 'bottom',
	)
);

// Sticky ToC Width in Styling Section.
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'sticky_toc_width',
		'selector'     => ".fl-node-$id .tc-sticky-fixed",
		'prop'         => 'width',
	)
);
// Sticky Width for custom position.
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'sticky_toc_width',
		'selector'     => ".fl-node-$id .tc-sticky-custom",
		'prop'         => 'width',
	)
);

// -----------------------Scroll to Top----------------------

// Horizontal Position of Scroll to top button.
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'scroll_horizontal_position',
		'selector'     => ".fl-node-$id .tc-scroll-align-left",
		'prop'         => 'left',
	)
);

FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'scroll_horizontal_position',
		'selector'     => ".fl-node-$id .tc-scroll-align-right",
		'prop'         => 'right',
	)
);

// Vertical Position of Scroll to top button.
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'scroll_vertical_position',
		'selector'     => ".fl-node-$id .tc-scroll-top-container",
		'prop'         => 'bottom',
	)
);

// ----------Scroll Styling Section--------------

// Scroll to top Icon Size.
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'scroll_icon_size',
		'selector'     => ".fl-node-$id .tc-scroll-top-icon",
		'prop'         => 'font-size',
	)
);

