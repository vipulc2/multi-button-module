<?php
/**
 * Summary File Contains CSS which is to be injected into the module
 *
 * Description. Contains CSS code for the module to include it dynamically.
 *
 * @link URL
 *
 * @package mb-multi-button
 *
 * @since 1.0.0
 */

// Variable that is received from the form of each Button.
$buttons = $settings->button_list;

// Condition to check if the value is an array and is not empty.
// COMMON CSS style for the module.
?>

	.fl-node-<?php echo $id; ?> .mb-button {

		<?php
		if ( isset( $settings->mb_common_bg_color ) && ! empty( $settings->mb_common_bg_color ) ) {
			?>
			background-color: <?php echo $module->get_color( $settings->mb_common_bg_color ); ?>;
		<?php } ?>

		<?php if ( isset( $settings->mb_common_btn_width ) && '' !== ( $settings->mb_common_btn_width ) ) { ?>
			width: <?php echo $settings->mb_common_btn_width; ?>px;
			<?php } ?>
		<?php if ( isset( $settings->mb_common_btn_height ) && '' !== ( $settings->mb_common_btn_height ) ) { ?>
			height: <?php echo $settings->mb_common_btn_height; ?>px;
			<?php } ?>

			<?php if ( isset( $settings->mb_common_text_color ) && ! empty( $settings->mb_common_text_color ) ) { ?>
			color: #<?php echo $settings->mb_common_text_color; ?>;
			<?php } ?>

	}

	.fl-node-<?php echo $id; ?> .mb-button:hover {
		<?php
		if ( isset( $settings->mb_common_bg_hover ) && ! empty( $settings->mb_common_bg_hover ) ) {
			?>
			background-color: <?php echo $module->get_color( $settings->mb_common_bg_hover ); ?>;
			<?php
		}
		if ( isset( $settings->mb_common_text_hover ) && ! empty( $settings->mb_common_text_hover ) ) {
			?>
			color: #<?php echo $settings->mb_common_text_hover; ?>;
			<?php } ?>
	}

	.fl-node-<?php echo $id; ?> .mb-button-icon-before .mb-icon {
		<?php if ( isset( $settings->mb_common_icon_space ) && '' !== ( $settings->mb_common_icon_space ) ) { ?>
			margin-right: <?php echo $settings->mb_common_icon_space; ?>px;
			<?php } ?>
	}

	.fl-node-<?php echo $id; ?> .mb-button-icon-after .mb-icon {
		<?php if ( isset( $settings->mb_common_icon_space ) && '' !== ( $settings->mb_common_icon_space ) ) { ?>
			margin-left: <?php echo $settings->mb_common_icon_space; ?>px;
			<?php } ?>
	}

	.fl-node-<?php echo $id; ?> .mb-button-icon-before .mb-image {
		<?php if ( isset( $settings->mb_common_icon_space ) && '' !== ( $settings->mb_common_icon_space ) ) { ?>
			margin-right: <?php echo $settings->mb_common_icon_space; ?>px;
			<?php } ?>
	}

	.fl-node-<?php echo $id; ?> .mb-button-icon-after .mb-image {
		<?php if ( isset( $settings->mb_common_icon_space ) && '' !== ( $settings->mb_common_icon_space ) ) { ?>
			margin-left: <?php echo $settings->mb_common_icon_space; ?>px;
			<?php } ?>
	}

	.fl-node-<?php echo $id; ?> .mb-image {

		<?php if ( isset( $settings->mb_common_icon_size ) && '' !== ( $settings->mb_common_icon_size ) ) { ?>
			width: <?php echo $settings->mb_common_icon_size; ?>px;
			height: calc( <?php echo $settings->mb_common_icon_size; ?>px - 10px );
			<?php } ?>

		<?php if ( isset( $settings->mb_common_image_border ) && '' !== ( $settings->mb_common_image_border ) ) { ?>
			border-radius: <?php echo $settings->mb_common_image_border; ?>px;
			<?php } ?>
	}

	.fl-node-<?php echo $id; ?> .mb-icon {

		<?php if ( isset( $settings->mb_common_icon_size ) && '' !== ( $settings->mb_common_icon_size ) ) { ?>
			font-size: <?php echo $settings->mb_common_icon_size; ?>px;
			<?php } ?>
	}

		<?php
		// Border Button.
		FLBuilderCSS::border_field_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'mb_common_border',
				'selector'     => ".fl-node-$id .mb-button",
			)
		);

		// Typography Title.
		FLBuilderCSS::typography_field_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'mb_common_typography',
				'selector'     => ".fl-node-$id .mb-title",
			)
		);

		// Button Padding.
		FLBuilderCSS::dimension_field_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'mb_common_padding',
				'selector'     => ".fl-node-$id .mb-button",
				'unit'         => 'px',
				'props'        => array(
					'padding-top'    => 'mb_common_padding_top',
					'padding-right'  => 'mb_common_padding_right',
					'padding-bottom' => 'mb_common_padding_bottom',
					'padding-left'   => 'mb_common_padding_left',
				),
			)
		);
		?>

<?php
// Variable that is received from the form of each Button.
$buttons = $settings->button_list;

// Condition to check if the value is an array and is not empty.
// SPECIFIC CSS style to the module.
if ( is_array( $buttons ) && '' !== ( $buttons ) ) {
	foreach ( $buttons as $index => $button ) {
		if ( ! is_object( $button ) ) {
			continue;
		}
		?>

	.fl-node-<?php echo $id; ?> .mb-button-<?php echo $index; ?> {

		<?php
		if ( isset( $buttons[ $index ]->mb_color_field ) && ! empty( $buttons[ $index ]->mb_color_field ) ) {
			?>
			background-color: <?php echo $module->get_color( $buttons[ $index ]->mb_color_field ); ?>;
		<?php } ?>
		<?php if ( isset( $buttons[ $index ]->mb_btn_width ) && '' !== ( $buttons[ $index ]->mb_btn_width ) ) { ?>
			width: <?php echo $buttons[ $index ]->mb_btn_width; ?>px;
			<?php } ?>
		<?php if ( isset( $buttons[ $index ]->mb_btn_height ) && '' !== ( $buttons[ $index ]->mb_btn_height ) ) { ?>
			height: <?php echo $buttons[ $index ]->mb_btn_height; ?>px;
			<?php } ?>

			<?php if ( isset( $buttons[ $index ]->mb_text_color ) && ! empty( $buttons[ $index ]->mb_text_color ) ) { ?>
			color: #<?php echo $buttons[ $index ]->mb_text_color; ?>;
			<?php } ?>

	}

	.fl-node-<?php echo $id; ?> .mb-button-<?php echo $index; ?>:hover {
		<?php
		if ( isset( $buttons[ $index ]->mb_hover_color ) && ! empty( $buttons[ $index ]->mb_hover_color ) ) {
			?>
			background-color: <?php echo $module->get_color( $buttons[ $index ]->mb_hover_color ); ?>;

			<?php
		}

		if ( isset( $buttons[ $index ]->mb_text_hover_color ) && ! empty( $buttons[ $index ]->mb_text_hover_color ) ) {
			?>
		color: #<?php echo $buttons[ $index ]->mb_text_hover_color; ?>;
		<?php } ?>

		}


	.fl-node-<?php echo $id; ?> .mb-button-<?php echo $index; ?> img.mb-image {

		<?php if ( isset( $buttons[ $index ]->mb_image_size ) && '' !== ( $buttons[ $index ]->mb_image_size ) ) { ?>
			width: <?php echo $buttons[ $index ]->mb_image_size; ?>px;
			height: calc( <?php echo $buttons[ $index ]->mb_image_size; ?>px - 10px );
			<?php } ?>

		<?php if ( isset( $buttons[ $index ]->mb_image_border_radius ) && '' !== ( $buttons[ $index ]->mb_image_border_radius ) ) { ?>
			border-radius: <?php echo $buttons[ $index ]->mb_image_border_radius; ?>px;
			<?php } ?>

		<?php if ( isset( $buttons[ $index ]->mb_image_spacing ) && '' !== ( $buttons[ $index ]->mb_image_spacing ) && 'before' === ( $buttons[ $index ]->mb_icon_position ) ) { ?>
			margin: auto 0 auto auto;
			<?php } ?>
		<?php if ( isset( $buttons[ $index ]->mb_image_spacing ) && '' !== ( $buttons[ $index ]->mb_image_spacing ) && 'after' === ( $buttons[ $index ]->mb_icon_position ) ) { ?>
			margin: auto auto auto 0;
			<?php } ?>

		<?php if ( isset( $buttons[ $index ]->mb_image_spacing ) && '' !== ( $buttons[ $index ]->mb_image_spacing ) && 'before' === ( $buttons[ $index ]->mb_icon_position ) ) { ?>
			margin-right: <?php echo $buttons[ $index ]->mb_image_spacing; ?>px;
			<?php } ?>
		<?php if ( isset( $buttons[ $index ]->mb_image_spacing ) && '' !== ( $buttons[ $index ]->mb_image_spacing ) && 'after' === ( $buttons[ $index ]->mb_icon_position ) ) { ?>
			margin-left: <?php echo $buttons[ $index ]->mb_image_spacing; ?>px;
			<?php } ?>
	}


	.fl-node-<?php echo $id; ?> .mb-button-<?php echo $index; ?> span.mb-icon {

		<?php if ( isset( $buttons[ $index ]->mb_icon_size ) && '' !== ( $buttons[ $index ]->mb_icon_size ) ) { ?>
			font-size: <?php echo $buttons[ $index ]->mb_icon_size; ?>px;
			<?php } ?>
		<?php if ( isset( $buttons[ $index ]->mb_icon_color ) && ! empty( $buttons[ $index ]->mb_icon_color ) ) { ?>
			color: #<?php echo $buttons[ $index ]->mb_icon_color; ?> ;
			<?php } ?>

		<?php if ( isset( $buttons[ $index ]->mb_icon_spacing ) && '' !== ( $buttons[ $index ]->mb_icon_spacing ) && 'before' === ( $buttons[ $index ]->mb_icon_position ) ) { ?>
			margin: auto 0 auto auto;
			<?php } ?>
		<?php if ( isset( $buttons[ $index ]->mb_icon_spacing ) && '' !== ( $buttons[ $index ]->mb_icon_spacing ) && 'after' === ( $buttons[ $index ]->mb_icon_position ) ) { ?>
			margin: auto auto auto 0;
			<?php } ?>

		<?php if ( isset( $buttons[ $index ]->mb_icon_spacing ) && '' !== ( $buttons[ $index ]->mb_icon_spacing ) && 'before' === ( $buttons[ $index ]->mb_icon_position ) ) { ?>
			margin-right: <?php echo $buttons[ $index ]->mb_icon_spacing; ?>px;
			<?php } ?>
		<?php if ( isset( $buttons[ $index ]->mb_icon_spacing ) && '' !== ( $buttons[ $index ]->mb_icon_spacing ) && 'after' === ( $buttons[ $index ]->mb_icon_position ) ) { ?>
			margin-left: <?php echo $buttons[ $index ]->mb_icon_spacing; ?>px;
			<?php } ?>

		}

	.fl-node-<?php echo $id; ?> .mb-button-<?php echo $index; ?> span.mb-title {

		<?php if ( isset( $buttons[ $index ]->mb_icon_position ) && '' !== ( $buttons[ $index ]->mb_icon_position ) && 'before' === ( $buttons[ $index ]->mb_icon_position ) && ( ( 'icon' === ( $buttons[ $index ]->mb_icon_type ) ) || ( 'image' === ( $buttons[ $index ]->mb_icon_type ) ) ) ) { ?>
			margin: auto auto auto 0;
			<?php } ?>
		<?php if ( isset( $buttons[ $index ]->mb_icon_position ) && '' !== ( $buttons[ $index ]->mb_icon_position ) && 'after' === ( $buttons[ $index ]->mb_icon_position ) && ( ( 'icon' === ( $buttons[ $index ]->mb_icon_type ) ) || ( 'image' === ( $buttons[ $index ]->mb_icon_type ) ) ) ) { ?>
			margin: auto 0 auto auto;
			<?php } ?>

		}

	.fl-node-<?php echo $id; ?> .mb-button-<?php echo $index; ?> span.mb-icon:hover {
		<?php if ( isset( $buttons[ $index ]->mb_icon_hover_color ) && ! empty( $buttons[ $index ]->mb_icon_hover_color ) ) { ?>
			color: #<?php echo $buttons[ $index ]->mb_icon_hover_color; ?>;
			<?php } ?>
		}

		<?php
		// Border Button.
		FLBuilderCSS::border_field_rule(
			array(
				'settings'     => $buttons[ $index ],
				'setting_name' => 'mb_button_border',
				'selector'     => ".fl-node-$id .mb-button-$index",
			)
		);

		// Typography Title.
		FLBuilderCSS::typography_field_rule(
			array(
				'settings'     => $buttons[ $index ],
				'setting_name' => 'mb_title_typography',
				'selector'     => ".fl-node-$id .mb-title",
			)
		);

		// Button padding.
		FLBuilderCSS::dimension_field_rule(
			array(
				'settings'     => $buttons[ $index ],
				'setting_name' => 'mb_btn_padding',
				'selector'     => ".fl-node-$id .mb-button-$index",
				'unit'         => 'px',
				'props'        => array(
					'padding-top'    => 'mb_btn_padding_top',
					'padding-right'  => 'mb_btn_padding_right',
					'padding-bottom' => 'mb_btn_padding_bottom',
					'padding-left'   => 'mb_btn_padding_left',
				),
			)
		);
	}
}
?>

.fl-node-<?php echo $id; ?> .mb-layout-row {
	<?php if ( isset( $settings->mb_btn_alignment ) && 'left' === ( $settings->mb_btn_alignment ) ) { ?>
			justify-content: flex-start;
		<?php

	}
	if ( isset( $settings->mb_btn_alignment ) && 'right' === ( $settings->mb_btn_alignment ) ) {
		?>
			justify-content: flex-end;
		<?php

	}

	if ( isset( $settings->mb_btn_alignment ) && 'center' === ( $settings->mb_btn_alignment ) ) {
		?>
			justify-content: center;
		<?php

	}
	?>

}

.fl-node-<?php echo $id; ?> .mb-layout-column {
	<?php if ( isset( $settings->mb_btn_alignment ) && 'left' === ( $settings->mb_btn_alignment ) ) { ?>
		align-items: flex-start;
		<?php

	}
	if ( isset( $settings->mb_btn_alignment ) && 'right' === ( $settings->mb_btn_alignment ) ) {
		?>
			align-items: flex-end;
		<?php

	}

	if ( isset( $settings->mb_btn_alignment ) && 'center' === ( $settings->mb_btn_alignment ) ) {
		?>
			align-items: center;
		<?php

	}
	?>

}

.fl-node-<?php echo $id; ?> .mb-button {
	<?php if ( isset( $settings->horizontal_spacing_between_button ) && '' !== ( $settings->horizontal_spacing_between_button ) && 'row' === ( $settings->mb_button_layout ) ) { ?>
	margin-right: <?php echo $settings->horizontal_spacing_between_button; ?>px;
<?php } ?>

	<?php if ( isset( $settings->vertical_spacing_between_button ) && '' !== ( $settings->vertical_spacing_between_button ) && 'column' === ( $settings->mb_button_layout ) ) { ?>
	margin-bottom: <?php echo $settings->vertical_spacing_between_button; ?>px;
<?php } ?>

}
