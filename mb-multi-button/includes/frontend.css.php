<?php

/**
 * Summary. function that defines the name, group of module
 *
 * Description This function sets the name, group, category, directory of the custom module.
 *
 * @since 1.0.0
 *
 * @param string $color_type Color of background.
 */
function verify_color_type( $color_type ) {
	if ( strpos( $color_type, 'rgb' ) === false ) {
		return '#' . $color_type;
	}
	if ( strpos( $color_type, 'rgb' ) !== false ) {
		return $color_type;
	}
}
/**
 * Summary. Function that checks of background color is set by the user
 *
 * Description The function helps to check if the background color value is present.
 *
 * @since 1.0.0
 *
 * @param string $bg_color_instance The value provided by the user for the specific button.
 */
function check_bg_color_value( $bg_color_instance ) {
	if ( isset( $bg_color_instance ) && ! empty( $bg_color_instance ) ) {
		return 'background-color: ' . verify_color_type( $bg_color_instance ) . ';';
	}
}
/**
 * Summary. Function checks the value for margin, padding, border set by the user.
 *
 * Description The function checks if the value is there and is correct for the specific spacing and border.
 *
 * @since 1.0.0
 *
 * @param string $spacing_instance The value received by the user for the specific button.
 * @param string $spacing_type The type of spacing or css property like margin, padding, border.
 * @param string $spacing_direction The direction which will take the value for change.
 */
function check_spacing_value( $spacing_instance, $spacing_type, $spacing_direction ) {
	if ( isset( $spacing_instance ) && '' !== ( $spacing_instance ) ) {

		if ( 'padding' === $spacing_type ) {
			if ( 'top' === $spacing_direction ) {
				return 'padding-top: ' . $spacing_instance . 'px;';
			}
			if ( 'right' === $spacing_direction ) {
				return 'padding-right: ' . $spacing_instance . 'px;';
			}
			if ( 'bottom' === $spacing_direction ) {
				return 'padding-bottom: ' . $spacing_instance . 'px;';
			}
			if ( 'left' === $spacing_direction ) {
				return 'padding-left: ' . $spacing_instance . 'px;';
			}
		}
		if ( 'margin' === $spacing_type ) {
			if ( 'top' === $spacing_direction ) {
				return 'margin-top: ' . $spacing_instance . 'px;';
			}
			if ( 'right' === $spacing_direction ) {
				return 'margin-right: ' . $spacing_instance . 'px;';
			}
			if ( 'bottom' === $spacing_direction ) {
				return 'margin-bottom: ' . $spacing_instance . 'px;';
			}
			if ( 'left' === $spacing_direction ) {
				return 'margin-left: ' . $spacing_instance . 'px;';
			}
		}
		if ( 'border' === $spacing_type ) {
			if ( 'radius' === $spacing_direction ) {
				return 'border-radius: ' . $spacing_instance . 'px;';
			}
		}
	}
} ?>

.fl-node-<?php $id; ?> .mb-btn-uniform {
<?php if ( isset( $settings->mb_btn_width_uniform ) && '' !== ( $settings->mb_btn_width_uniform ) ) { ?>
	width: <?php echo $settings->mb_btn_width_uniform; ?>px;
<?php } ?>

<?php if ( isset( $settings->mb_btn_height_uniform ) && '' !== ( $settings->mb_btn_height_uniform ) ) { ?>
	height: <?php echo $settings->mb_btn_height_uniform; ?>px;
<?php } ?>

<?php if ( isset( $settings->mb_btn_padding_uniform_top ) && '' !== ( $settings->mb_btn_padding_uniform_top ) ) { ?>
	padding-top: <?php echo $settings->mb_btn_width_uniform_top; ?>px;
<?php } ?>

<?php if ( isset( $settings->mb_btn_padding_uniform_right ) && '' !== ( $settings->mb_btn_padding_uniform_right ) ) { ?>
	padding-right: <?php echo $settings->mb_btn_padding_uniform_right; ?>px;
<?php } ?>

<?php if ( isset( $settings->mb_btn_padding_uniform_bottom ) && '' !== ( $settings->mb_btn_padding_uniform_bottom ) ) { ?>
	padding-bottom: <?php echo $settings->mb_btn_padding_uniform_bottom; ?>px;
<?php } ?>

<?php if ( isset( $settings->mb_btn_padding_uniform_left ) && '' !== ( $settings->mb_btn_padding_uniform_left ) ) { ?>
	padding-left: <?php echo $settings->mb_btn_padding_uniform_left; ?>px;
<?php } ?>

<?php if ( isset( $settings->mb_bg_color_uniform ) && ! empty( $settings->mb_bg_color_uniform ) ) { ?>
	background-color: <?php echo verify_color_type( $settings->mb_bg_color_uniform ); ?>;
<?php } ?>

<?php if ( isset( $settings->mb_text_color_uniform ) && ! empty( $settings->mb_text_color_uniform ) ) { ?>
	color: #<?php echo ( $settings->mb_text_color_uniform ); ?>;
<?php } ?>

}

.fl-node-<?php $id; ?> .mb-btn-uniform:hover {

	<?php if ( isset( $settings->mb_hover_color_uniform ) && ! empty( $settings->mb_hover_color_uniform ) ) { ?>
	background-color: <?php echo verify_color_type( $settings->mb_hover_color_uniform ); ?>;
<?php } ?>

	<?php if ( isset( $settings->mb_hover_color_uniform ) && ! empty( $settings->mb_hover_color_uniform ) ) { ?>
	color: #<?php echo ( $settings->mb_hover_color_uniform ); ?>;
<?php } ?>
}

.fl-node-<?php $id; ?> .mb-title-uniform {

}
.fl-node-<?php $id; ?> .mb-icon-uniform {

<?php if ( isset( $settings->mb_icon_size_uniform ) && '' !== ( $settings->mb_icon_size_uniform ) ) { ?>
	font-size: <?php echo $settings->mb_icon_size_uniform; ?>px;
<?php } ?>

<?php if ( isset( $settings->mb_icon_spacing_uniform ) && '' !== ( $settings->mb_icon_spacing_uniform ) ) { ?>
	margin-right: <?php echo $settings->mb_icon_spacing_uniform; ?>px;
<?php } ?>

}
.fl-node-<?php $id; ?> .mb-img-uniform {

<?php if ( isset( $settings->mb_icon_size_uniform ) && '' !== ( $settings->mb_icon_size_uniform ) ) { ?>
	width: <?php echo $settings->mb_icon_size_uniform; ?>px;
	height: calc( 20px - <?php echo $settings->mb_icon_size_uniform; ?> )px;
<?php } ?>

<?php if ( isset( $settings->mb_icon_spacing_uniform ) && '' !== ( $settings->mb_icon_spacing_uniform ) ) { ?>
	margin-right: <?php echo $settings->mb_icon_spacing_uniform; ?>px;
<?php } ?>

<?php if ( isset( $settings->mb_image_border_radius_uniform ) && '' !== ( $settings->mb_image_border_radius_uniform ) ) { ?>
	border-radius: <?php echo $settings->mb_image_border_radius_uniform; ?>px;
<?php } ?>

}
<?php
// Typography Union.
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'typo_section_uniform',
			'selector'     => ".fl-node-$id .mb-title-uniform",
		)
	);

	// Button Border Union.
	FLBuilderCSS::border_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'mb_button_border_uniform',
			'selector'     => ".fl-node-$id .mb-btn-uniform",
		)
	);
	?>

<?php
// Variable that is received from the form of each Button.
$btn_list = $settings->button_list;

// Condition to check if the value is an array and is not empty.
// The following code is used to output CSS to the module.
if ( is_array( $btn_list ) && '' !== ( $btn_list ) ) {
	foreach ( $btn_list as $btn_id => $each_btn ) {

		echo '.fl-node-' . $id . ' .mb-each-btn-' . $btn_id . ' {' .

			check_bg_color_value( $btn_list[ $btn_id ]->mb_color_field ) .

			'width: ' . $btn_list[ $btn_id ]->mb_btn_width . 'px;
			height: ' . $btn_list[ $btn_id ]->mb_btn_height . 'px;' .

			check_spacing_value( $btn_list[ $btn_id ]->mb_btn_padding_top, 'padding', 'top' ) .
			check_spacing_value( $btn_list[ $btn_id ]->mb_btn_padding_right, 'padding', 'right' ) .
			check_spacing_value( $btn_list[ $btn_id ]->mb_btn_padding_bottom, 'padding', 'bottom' ) .
			check_spacing_value( $btn_list[ $btn_id ]->mb_btn_padding_top, 'padding', 'left' ) .

			check_spacing_value( $btn_list[ $btn_id ]->mb_btn_margin_top, 'margin', 'top' ) .
			check_spacing_value( $btn_list[ $btn_id ]->mb_btn_margin_right, 'margin', 'right' ) .
			check_spacing_value( $btn_list[ $btn_id ]->mb_btn_margin_bottom, 'margin', 'bottom' ) .
			check_spacing_value( $btn_list[ $btn_id ]->mb_btn_margin_top, 'margin', 'left' ) .

		'}';

		// Button Hover.
		echo '.fl-node-' . $id . ' .mb-each-btn-' . $btn_id . ':hover {' .
			check_bg_color_value( $btn_list[ $btn_id ]->mb_hover_color ) .
			'color: #' . $btn_list[ $btn_id ]->mb_text_hover_color . ';
		}';
		// Image Styling.
		echo '.fl-node-' . $id . ' .mb-img-style-' . $btn_id . ' {
			width: ' . $btn_list[ $btn_id ]->mb_image_size . 'px;
			height: calc( 20px - ' . $btn_list[ $btn_id ]->mb_image_size . ' ) px;' .
			check_spacing_value( $btn_list[ $btn_id ]->mb_image_spacing, 'margin', 'right' ) .
			check_spacing_value( $btn_list[ $btn_id ]->mb_image_border_radius, 'border', 'radius' ) .
		'}';
		// Icon Styling.
		echo '.fl-node-' . $id . ' .mb-icon-style-' . $btn_id . ' {
			font-size: ' . $btn_list[ $btn_id ]->mb_icon_size . 'px;
			color: #' . $btn_list[ $btn_id ]->mb_icon_color . ';' .
			check_spacing_value( $btn_list[ $btn_id ]->mb_icon_spacing, 'margin', 'right' ) .
		'}';
		// Title Styling.
		echo '.fl-node-' . $id . ' .mb-title-typo-' . $btn_id . ' {
			color: #' . $btn_list[ $btn_id ]->mb_text_color . ';' .
		'}';
		// Icon Hover Color.
		echo '.fl-node-' . $id . ' .mb-icon-style-' . $btn_id . ':hover {
			color: #' . $btn_list[ $btn_id ]->mb_icon_hover_color . ';
		}';

		// Border Button.
		FLBuilderCSS::border_field_rule(
			array(
				'settings'     => $btn_list[ $btn_id ],
				'setting_name' => 'mb_button_border',
				'selector'     => ".fl-node-$id .mb-each-btn-$btn_id",
			)
		);

		// Typography Title.
		FLBuilderCSS::typography_field_rule(
			array(
				'settings'     => $btn_list[ $btn_id ],
				'setting_name' => 'mb_title_typography',
				'selector'     => ".fl-node-$id .mb-title-typo-$btn_id",
			)
		);
	}
}
?>

.fl-node-<?php echo $id; ?> .mb-btn-group {
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
	if ( isset( $settings->mb_btn_alignment ) && 'space_between' === ( $settings->mb_btn_alignment ) ) {
		?>
			justify-content: space-between;
		<?php

	}
	if ( isset( $settings->mb_btn_alignment ) && 'space_around' === ( $settings->mb_btn_alignment ) ) {
		?>
			justify-content: space-around;
		<?php

	}
	?>
}

.fl-node-<?php echo $id; ?> .mb-btn-container {
	<?php if ( isset( $settings->horizontal_spacing_between_button ) && '' !== ( $settings->horizontal_spacing_between_button ) && 'row' === ( $settings->mb_button_layout_union ) ) { ?>
	margin-right: <?php echo $settings->horizontal_spacing_between_button; ?>px;
<?php } ?>

	<?php if ( isset( $settings->vertical_spacing_between_button ) && '' !== ( $settings->vertical_spacing_between_button ) && 'column' === ( $settings->mb_button_layout_union ) ) { ?>
	margin-bottom: <?php echo $settings->vertical_spacing_between_button; ?>px;
<?php } ?>

}
