<?php

$head = $settings->anchor_tag;

foreach ( $head as $h ) {
	$head_value .= $h;
}

$headings       = str_split( $head_value, 2 );
$select_heading = implode( ',', $headings );

?>

jQuery(document).ready(function() {

	new PPTableofContent({
		id: '<?php echo esc_attr( $id ); ?>',
		heading_title:'<?php echo esc_attr( $settings->heading_title ); ?>',
		head_data: '<?php echo esc_attr( $select_heading ); ?>',
		container: '<?php echo esc_attr( $settings->include_container ); ?>',
		collapsable_toc: '<?php echo esc_attr( $settings->collapsable_toc ); ?>',
		hierarchical_view: '<?php echo esc_attr( $settings->hierarchical_view ); ?>',
		sticky_toc: '<?php echo esc_attr( $settings->sticky_toc ); ?>',
		sticky_type: '<?php echo esc_attr( $settings->sticky_type ); ?>',
		scroll_top: '<?php echo esc_attr( $settings->scroll_top ); ?>',
		scroll_to: '<?php echo esc_attr( $settings->scroll_to ); ?>',
		scroll_alignment: '<?php echo esc_attr( $settings->scroll_alignment ); ?>',
	});

});
