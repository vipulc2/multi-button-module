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
$btn_list = $settings->button_list;

// Condition to check if the value is an array and is not empty.
// COMMON CSS style for the module.
?>

	.fl-node-<?php echo $id; ?> .mb-btn-uniform {

		<?php
		if ( isset( $settings->mb_bg_color_uniform ) && ! empty( $settings->mb_bg_color_uniform ) ) {

			if ( strpos( $settings->mb_bg_color_uniform, 'rgb' ) === false ) {
				?>
			background-color: #<?php echo $settings->mb_bg_color_uniform; ?>;
				<?php
			}
			if ( strpos( $settings->mb_bg_color_uniform, 'rgb' ) !== false ) {
				?>
			background-color: <?php echo $settings->mb_bg_color_uniform; ?>;
				<?php
			}
		}
		?>

		<?php if ( isset( $settings->mb_btn_width_uniform ) && '' !== ( $settings->mb_btn_width_uniform ) ) { ?>
			width: <?php echo $settings->mb_btn_width_uniform; ?>px;
			<?php } ?>
		<?php if ( isset( $settings->mb_btn_height_uniform ) && '' !== ( $settings->mb_btn_height_uniform ) ) { ?>
			height: <?php echo $settings->mb_btn_height_uniform; ?>px;
			<?php } ?>

			<?php if ( isset( $settings->mb_text_color_uniform ) && ! empty( $settings->mb_text_color_uniform ) ) { ?>
			color: #<?php echo $settings->mb_text_color_uniform; ?>;
			<?php } ?>

	}

	.fl-node-<?php echo $id; ?> .mb-btn-uniform:hover {
		<?php
		if ( isset( $settings->mb_hover_color_uniform ) && ! empty( $settings->mb_hover_color_uniform ) ) {

			if ( strpos( $settings->mb_hover_color_uniform, 'rgb' ) === false ) {
				?>
			background-color: #<?php echo $settings->mb_hover_color_uniform; ?>;
				<?php
			}
			if ( strpos( $settings->mb_hover_color_uniform, 'rgb' ) !== false ) {
				?>
			background-color: <?php echo $settings->mb_hover_color_uniform; ?>;
				<?php
			}
		}
		if ( isset( $settings->mb_text_hover_color_uniform ) && ! empty( $settings->mb_text_hover_color_uniform ) ) {
			?>
			color: #<?php echo $settings->mb_text_hover_color_uniform; ?>;
			<?php } ?>
	}

	.fl-node-<?php echo $id; ?> .mb-title-uniform {

	}

	.fl-node-<?php echo $id; ?> .mb-title-uniform:hover {

	}

	.fl-node-<?php echo $id; ?> .mb-icon-before {
		margin: auto 0 auto auto;
		margin-right: <?php echo $settings->mb_icon_spacing_uniform; ?>px;

	}

	.fl-node-<?php echo $id; ?> .mb-icon-after {
		margin: auto auto auto 0;
		margin-left: <?php echo $settings->mb_icon_spacing_uniform; ?>px;
	}

	.fl-node-<?php echo $id; ?> .mb-img-uniform {

		<?php if ( isset( $settings->mb_icon_size_uniform ) && '' !== ( $settings->mb_icon_size_uniform ) ) { ?>
			width: <?php echo $settings->mb_icon_size_uniform; ?>px;
			height: calc( <?php echo $settings->mb_icon_size_uniform; ?>px - 10px );
			<?php } ?>

		<?php if ( isset( $settings->mb_image_border_radius_uniform ) && '' !== ( $settings->mb_image_border_radius_uniform ) ) { ?>
			border-radius: <?php echo $settings->mb_image_border_radius_uniform; ?>px;
			<?php } ?>
	}

	.fl-node-<?php echo $id; ?> .mb-title-after {
		margin: auto auto auto 0;
	}

	.fl-node-<?php echo $id; ?> .mb-title-before {
		margin: auto 0 auto auto;
	}

	.fl-node-<?php echo $id; ?> .mb-icon-uniform {

		<?php if ( isset( $settings->mb_icon_size_uniform ) && '' !== ( $settings->mb_icon_size_uniform ) ) { ?>
			font-size: <?php echo $settings->mb_icon_size_uniform; ?>px;
			<?php } ?>
	}

		<?php
		// Border Button.
		FLBuilderCSS::border_field_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'mb_button_border_uniform',
				'selector'     => ".fl-node-$id .mb-btn-uniform",
			)
		);

		// Typography Title.
		FLBuilderCSS::typography_field_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'mb_title_typography_uniform',
				'selector'     => ".fl-node-$id .mb-title-uniform",
			)
		);

		// Button Padding.
		FLBuilderCSS::dimension_field_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'mb_btn_padding_uniform',
				'selector'     => ".fl-node-$id .mb-btn-uniform",
				'unit'         => 'px',
				'props'        => array(
					'padding-top'    => 'mb_btn_padding_uniform_top',
					'padding-right'  => 'mb_btn_padding_uniform_right',
					'padding-bottom' => 'mb_btn_padding_uniform_bottom',
					'padding-left'   => 'mb_btn_padding_uniform_left',
				),
			)
		);
		?>

<?php
// Variable that is received from the form of each Button.
$btn_list = $settings->button_list;

// Condition to check if the value is an array and is not empty.
// SPECIFIC CSS style to the module.
if ( is_array( $btn_list ) && '' !== ( $btn_list ) ) {
	foreach ( $btn_list as $btn_id => $each_btn ) {
		?>

	.fl-node-<?php echo $id; ?> .mb-each-btn-<?php echo $btn_id; ?> {

		<?php
		if ( isset( $btn_list[ $btn_id ]->mb_color_field ) && ! empty( $btn_list[ $btn_id ]->mb_color_field ) ) {

			if ( strpos( $btn_list[ $btn_id ]->mb_color_field, 'rgb' ) === false ) {
				?>
			background-color: #<?php echo $btn_list[ $btn_id ]->mb_color_field; ?>;
				<?php
			}
			if ( strpos( $btn_list[ $btn_id ]->mb_color_field, 'rgb' ) !== false ) {
				?>
			background-color: <?php echo $btn_list[ $btn_id ]->mb_color_field; ?>;
				<?php
			}
		}
		?>
		<?php if ( isset( $btn_list[ $btn_id ]->mb_btn_width ) && '' !== ( $btn_list[ $btn_id ]->mb_btn_width ) ) { ?>
			width: <?php echo $btn_list[ $btn_id ]->mb_btn_width; ?>px;
			<?php } ?>
		<?php if ( isset( $btn_list[ $btn_id ]->mb_btn_height ) && '' !== ( $btn_list[ $btn_id ]->mb_btn_height ) ) { ?>
			height: <?php echo $btn_list[ $btn_id ]->mb_btn_height; ?>px;
			<?php } ?>

			<?php if ( isset( $btn_list[ $btn_id ]->mb_text_color ) && ! empty( $btn_list[ $btn_id ]->mb_text_color ) ) { ?>
			color: #<?php echo $btn_list[ $btn_id ]->mb_text_color; ?>;
			<?php } ?>

	}

	.fl-node-<?php echo $id; ?> .mb-each-btn-<?php echo $btn_id; ?>:hover {
		<?php
		if ( isset( $btn_list[ $btn_id ]->mb_hover_color ) && ! empty( $btn_list[ $btn_id ]->mb_hover_color ) ) {

			if ( strpos( $btn_list[ $btn_id ]->mb_hover_color, 'rgb' ) === false ) {
				?>
			background-color: #<?php echo $btn_list[ $btn_id ]->mb_hover_color; ?>;
				<?php
			}
			if ( strpos( $btn_list[ $btn_id ]->mb_hover_color, 'rgb' ) !== false ) {
				?>
			background-color: <?php echo $btn_list[ $btn_id ]->mb_hover_color; ?>;
				<?php
			}
		}

		if ( isset( $btn_list[ $btn_id ]->mb_text_hover_color ) && ! empty( $btn_list[ $btn_id ]->mb_text_hover_color ) ) {
			?>
		color: #<?php echo $btn_list[ $btn_id ]->mb_text_hover_color; ?>;
		<?php } ?>

		}


	.fl-node-<?php echo $id; ?> .mb-img-style-<?php echo $btn_id; ?> {

		<?php if ( isset( $btn_list[ $btn_id ]->mb_image_size ) && '' !== ( $btn_list[ $btn_id ]->mb_image_size ) ) { ?>
			width: <?php echo $btn_list[ $btn_id ]->mb_image_size; ?>px;
			height: calc( <?php echo $btn_list[ $btn_id ]->mb_image_size; ?>px - 10px );
			<?php } ?>

		<?php if ( isset( $btn_list[ $btn_id ]->mb_image_border_radius ) && '' !== ( $btn_list[ $btn_id ]->mb_image_border_radius ) ) { ?>
			border-radius: <?php echo $btn_list[ $btn_id ]->mb_image_border_radius; ?>px;
			<?php } ?>

		<?php if ( isset( $btn_list[ $btn_id ]->mb_icon_position ) && '' !== ( $btn_list[ $btn_id ]->mb_icon_position ) && 'before' === ( $btn_list[ $btn_id ]->mb_icon_position ) ) { ?>
			order: 1;
			<?php } ?>
		<?php if ( isset( $btn_list[ $btn_id ]->mb_icon_position ) && '' !== ( $btn_list[ $btn_id ]->mb_icon_position ) && 'after' === ( $btn_list[ $btn_id ]->mb_icon_position ) ) { ?>
			order: 2;
			<?php } ?>

		<?php if ( isset( $btn_list[ $btn_id ]->mb_image_spacing ) && '' !== ( $btn_list[ $btn_id ]->mb_image_spacing ) && 'before' === ( $btn_list[ $btn_id ]->mb_icon_position ) ) { ?>
			margin: auto 0 auto auto;
			<?php } ?>
		<?php if ( isset( $btn_list[ $btn_id ]->mb_image_spacing ) && '' !== ( $btn_list[ $btn_id ]->mb_image_spacing ) && 'after' === ( $btn_list[ $btn_id ]->mb_icon_position ) ) { ?>
			margin: auto auto auto 0;
			<?php } ?>

		<?php if ( isset( $btn_list[ $btn_id ]->mb_image_spacing ) && '' !== ( $btn_list[ $btn_id ]->mb_image_spacing ) && 'before' === ( $btn_list[ $btn_id ]->mb_icon_position ) ) { ?>
			margin-right: <?php echo $btn_list[ $btn_id ]->mb_image_spacing; ?>px;
			<?php } ?>
		<?php if ( isset( $btn_list[ $btn_id ]->mb_image_spacing ) && '' !== ( $btn_list[ $btn_id ]->mb_image_spacing ) && 'after' === ( $btn_list[ $btn_id ]->mb_icon_position ) ) { ?>
			margin-left: <?php echo $btn_list[ $btn_id ]->mb_image_spacing; ?>px;
			<?php } ?>
	}


	.fl-node-<?php echo $id; ?> .mb-icon-style-<?php echo $btn_id; ?> {

		<?php if ( isset( $btn_list[ $btn_id ]->mb_icon_size ) && '' !== ( $btn_list[ $btn_id ]->mb_icon_size ) ) { ?>
			font-size: <?php echo $btn_list[ $btn_id ]->mb_icon_size; ?>px;
			<?php } ?>
		<?php if ( isset( $btn_list[ $btn_id ]->mb_icon_color ) && ! empty( $btn_list[ $btn_id ]->mb_icon_color ) ) { ?>
			color: #<?php echo $btn_list[ $btn_id ]->mb_icon_color; ?> ;
			<?php } ?>

		<?php if ( isset( $btn_list[ $btn_id ]->mb_icon_position ) && '' !== ( $btn_list[ $btn_id ]->mb_icon_position ) && 'before' === ( $btn_list[ $btn_id ]->mb_icon_position ) ) { ?>
			order: 1;
			<?php } ?>
		<?php if ( isset( $btn_list[ $btn_id ]->mb_icon_position ) && '' !== ( $btn_list[ $btn_id ]->mb_icon_position ) && 'after' === ( $btn_list[ $btn_id ]->mb_icon_position ) ) { ?>
			order: 2;
			<?php } ?>

		<?php if ( isset( $btn_list[ $btn_id ]->mb_icon_spacing ) && '' !== ( $btn_list[ $btn_id ]->mb_icon_spacing ) && 'before' === ( $btn_list[ $btn_id ]->mb_icon_position ) ) { ?>
			margin: auto 0 auto auto;
			<?php } ?>
		<?php if ( isset( $btn_list[ $btn_id ]->mb_icon_spacing ) && '' !== ( $btn_list[ $btn_id ]->mb_icon_spacing ) && 'after' === ( $btn_list[ $btn_id ]->mb_icon_position ) ) { ?>
			margin: auto auto auto 0;
			<?php } ?>

		<?php if ( isset( $btn_list[ $btn_id ]->mb_icon_spacing ) && '' !== ( $btn_list[ $btn_id ]->mb_icon_spacing ) && 'before' === ( $btn_list[ $btn_id ]->mb_icon_position ) ) { ?>
			margin-right: <?php echo $btn_list[ $btn_id ]->mb_icon_spacing; ?>px;
			<?php } ?>
		<?php if ( isset( $btn_list[ $btn_id ]->mb_icon_spacing ) && '' !== ( $btn_list[ $btn_id ]->mb_icon_spacing ) && 'after' === ( $btn_list[ $btn_id ]->mb_icon_position ) ) { ?>
			margin-left: <?php echo $btn_list[ $btn_id ]->mb_icon_spacing; ?>px;
			<?php } ?>

		}

	.fl-node-<?php echo $id; ?> .mb-title-typo-<?php echo $btn_id; ?> {

		<?php if ( isset( $btn_list[ $btn_id ]->mb_icon_position ) && '' !== ( $btn_list[ $btn_id ]->mb_icon_position ) && 'before' === ( $btn_list[ $btn_id ]->mb_icon_position ) ) { ?>
			order: 2;
			<?php } ?>
		<?php if ( isset( $btn_list[ $btn_id ]->mb_icon_position ) && '' !== ( $btn_list[ $btn_id ]->mb_icon_position ) && 'after' === ( $btn_list[ $btn_id ]->mb_icon_position ) ) { ?>
			order: 1;
			<?php } ?>

		<?php if ( isset( $btn_list[ $btn_id ]->mb_icon_position ) && '' !== ( $btn_list[ $btn_id ]->mb_icon_position ) && 'before' === ( $btn_list[ $btn_id ]->mb_icon_position ) && ( ( 'icon' === ( $btn_list[ $btn_id ]->mb_btn_type ) ) || ( 'image' === ( $btn_list[ $btn_id ]->mb_btn_type ) ) ) ) { ?>
			margin: auto auto auto 0;
			<?php } ?>
		<?php if ( isset( $btn_list[ $btn_id ]->mb_icon_position ) && '' !== ( $btn_list[ $btn_id ]->mb_icon_position ) && 'after' === ( $btn_list[ $btn_id ]->mb_icon_position ) && ( ( 'icon' === ( $btn_list[ $btn_id ]->mb_btn_type ) ) || ( 'image' === ( $btn_list[ $btn_id ]->mb_btn_type ) ) ) ) { ?>
			margin: auto 0 auto auto;
			<?php } ?>

		}

	.fl-node-<?php echo $id; ?> .mb-icon-style-<?php echo $btn_id; ?>:hover {
		<?php if ( isset( $btn_list[ $btn_id ]->mb_icon_hover_color ) && ! empty( $btn_list[ $btn_id ]->mb_icon_hover_color ) ) { ?>
			color: #<?php echo $btn_list[ $btn_id ]->mb_icon_hover_color; ?>;
			<?php } ?>
		}

		<?php
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

		// Button padding.
		FLBuilderCSS::dimension_field_rule(
			array(
				'settings'     => $btn_list[ $btn_id ],
				'setting_name' => 'mb_btn_padding',
				'selector'     => ".fl-node-$id .mb-each-btn-$btn_id",
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

.fl-node-<?php echo $id; ?> .mb-btn-group-row {
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

.fl-node-<?php echo $id; ?> .mb-btn-group-column {
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

.fl-node-<?php echo $id; ?> .mb-btn-container {
	<?php if ( isset( $settings->horizontal_spacing_between_button ) && '' !== ( $settings->horizontal_spacing_between_button ) && 'row' === ( $settings->mb_button_layout_union ) ) { ?>
	margin-right: <?php echo $settings->horizontal_spacing_between_button; ?>px;
<?php } ?>

	<?php if ( isset( $settings->vertical_spacing_between_button ) && '' !== ( $settings->vertical_spacing_between_button ) && 'column' === ( $settings->mb_button_layout_union ) ) { ?>
	margin-bottom: <?php echo $settings->vertical_spacing_between_button; ?>px;
<?php } ?>

}
