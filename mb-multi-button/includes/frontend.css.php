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
}
// Variable that is received from the form of each Button.
$btn_list = $settings->button_list;

// Condition to check if the value is an array and is not empty.
// The following code is used to output CSS to the module.
if ( is_array( $btn_list ) && '' !== ( $btn_list ) ) {
	foreach ( $btn_list as $btn_id => $each_btn ) {

		echo '.fl-node-' . $id . ' .mb-each-btn-' . $btn_id . ' {' .

			check_bg_color_value( $btn_list[ $btn_id ]->mb_color_field ) .
			'color: #' . $btn_list[ $btn_id ]->mb_text_color . ';

			width: ' . $btn_list[ $btn_id ]->mb_btn_width . 'px;
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
			color: #' . $btn_list[ $btn_id ]->mb_icon_color . 'px;' .
			check_spacing_value( $btn_list[ $btn_id ]->mb_icon_spacing, 'margin', 'right' ) .
		'}';
		// Icon Hover Color.
		echo '.fl-node-' . $id . ' .mb-icon-style-' . $btn_id . ':hover {
			color: #' . $btn_list[ $btn_id ]->mb_icon_hover_color . 'px;
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


