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

$wrapper_classes = array(
	'mb-buttons',
);
if ( 'row' === $settings->mb_button_layout ) {
	$wrapper_classes[] = 'mb-layout-row';
}
if ( 'column' === $settings->mb_button_layout ) {
	$wrapper_classes[] = 'mb-layout-column';
}
?>
<div class="<?php echo implode( ' ', $wrapper_classes ); ?>">

<?php
$buttons = $settings->button_list;

if ( is_array( $buttons ) && '' !== ( $buttons ) ) {

	foreach ( $buttons as $index => $button ) {
		if ( ! is_object( $button ) ) {
			continue;
		}

		$button_classes = array(
			"mb-button-$index",
			'mb-button',
		);

		if ( 'none' !== $button->mb_icon_type ) {
			$button_classes[] = 'mb-button-icon-' . $button->mb_icon_position;
		}

		$nofollow = isset( $button->btn_link_nofollow ) && 'yes' === $button->btn_link_nofollow ? ' rel="nofollow"' : '';
		$target   = isset( $button->btn_link_target ) ? ' target="' . $button->btn_link_target . '"' : '';
		?>

		<a class="<?php echo implode( ' ', $button_classes ); ?>" href="<?php echo $button->btn_link; ?>" <?php echo $target; ?><?php echo $nofollow; ?>>
		<?php
		if ( 'icon' === ( $button->mb_icon_type ) ) {
			?>
			<span class="<?php echo $button->mb_icon_field; ?> mb-icon"></span>
			<?php
		}
		if ( 'image' === ( $button->mb_icon_type ) ) {
			?>
			<img class="mb-image" src="<?php echo $button->mb_image_field_src; ?>">
		<?php } ?>
		<span class="mb-title"><?php echo $button->btn_title; ?></span>
		</a>

		<?php
	}
}

?>


</div>
