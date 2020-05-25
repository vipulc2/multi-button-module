<?php
/**
 * Summary File Contains Frontend HTML for the module
 *
 * Description. Contains HTML code for frontend.
 *
 * @link URL
 *
 * @package mb-multi-button
 *
 * @since 1.0.0
 */

$btn_list = $settings->button_list;

if ( is_array( $btn_list ) && '' !== ( $btn_list ) ) { ?>

	<?php if ( 'row' === ( $settings->mb_button_layout_union ) ) { ?>
	<div class="mb-btn-group-row">
		<?php
	}
	if ( 'column' === ( $settings->mb_button_layout_union ) ) {
		?>
	<div class="mb-btn-group-column">
		<?php
	}
	foreach ( $btn_list as $btn_id => $each_btn ) {
		?>


			<div class="mb-btn-container">
				<?php if ( isset( $each_btn->mb_btn_type ) && 'none' === ( $each_btn->mb_btn_type ) ) { ?>

					<a class="mb-each-btn-<?php echo $btn_id; ?> mb-btn-preset mb-btn-uniform" href="<?php echo $each_btn->btn_link; ?>"><span class="mb-title-preset mp-title-none-preset mb-title-uniform mb-title-typo-<?php echo $btn_id; ?>"><?php echo $each_btn->btn_title; ?></span>
					</a>

				<?php } ?>

				<?php if ( isset( $each_btn->mb_btn_type ) && 'icon' === ( $each_btn->mb_btn_type ) ) { ?>

					<a class="mb-each-btn-<?php echo $btn_id; ?> mb-btn-preset mb-btn-uniform" href="<?php echo $each_btn->btn_link; ?>"><span class="<?php echo $each_btn->mb_icon_field; ?> mb-icon-style-<?php echo $btn_id; ?>  mb-icon-preset mb-icon-uniform"></span><span class="mb-title-preset mb-title-uniform mb-title-typo-<?php echo $btn_id; ?>"><?php echo $each_btn->btn_title; ?></span>
					</a>

				<?php } ?>

				<?php if ( isset( $each_btn->mb_btn_type ) && 'image' === ( $each_btn->mb_btn_type ) ) { ?>

					<a class="mb-each-btn-<?php echo $btn_id; ?> mb-btn-preset mb-btn-uniform" href="<?php echo $each_btn->btn_link; ?>"><img class="mb-img-style-<?php echo $btn_id; ?> mb-img-preset mb-img-uniform" src="<?php echo $each_btn->mb_image_field_src; ?>"><span class="mb-title-preset mb-title-uniform mb-title-typo-<?php echo $btn_id; ?>"><?php echo $each_btn->btn_title; ?></span>
					</a>

				<?php } ?>
			</div>


			<?php
	}
	?>
	</div>
	<?php
}

