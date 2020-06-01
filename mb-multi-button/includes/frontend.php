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

		$icon_classes = array(
			"mb-icon-$index",
			'mb-icon',
			"$button->mb_icon_field",
		);

		$image_classes = array(
			"mb-image-$index",
			'mb-image',
		);

		$title_classes = array(
			"mb-title-$index",
			'mb-title',
		);

		if ( ( 'icon' === ( $button->mb_icon_type ) || 'image' === ( $button->mb_icon_type ) ) && 'before' === ( $button->mb_icon_position ) ) {
			$icon_classes[]  = 'mb-icon-before';
			$image_classes[] = 'mb-icon-before';
			$title_classes[] = 'mb-title-after';
		}
		if ( ( 'icon' === ( $button->mb_icon_type ) || 'image' === ( $button->mb_icon_type ) ) && 'after' === ( $button->mb_icon_position ) ) {
			$icon_classes[]  = 'mb-icon-after';
			$image_classes[] = 'mb-icon-after';
			$title_classes[] = 'mb-title-before';
		}
		?>

		<a class="mb-button-<?php echo $index; ?> mb-button" href="<?php echo $button->btn_link; ?>">
		<?php
		if ( 'icon' === ( $button->mb_icon_type ) ) {
			?>
			<span class="<?php echo implode( ' ', $icon_classes ); ?>"></span>
			<?php
		}
		if ( 'image' === ( $button->mb_icon_type ) ) {
			?>
			<img class="<?php echo implode( ' ', $image_classes ); ?>" src="<?php echo $button->mb_image_field_src; ?>">
		<?php } ?>
		<span class="<?php echo implode( ' ', $title_classes ); ?>"><?php echo $button->btn_title; ?></span>
		</a>

		<?php
	}
}

?>


</div>
