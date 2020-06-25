<div class="fl-node-<?php echo $id; ?> tc-container">
	<div class="tc-header">
		<div class="tc-header-title"><?php echo ( esc_html( $settings->heading_title ) ); ?></div>
		<span class="header-icon-collapse">
			<span class="<?php echo ( $settings->collapse_icon_field ); ?>"></span>
		</span>
		<span class="header-icon-expand active">
			<span class="<?php echo ( $settings->expand_icon_field ); ?>"></span>
		</span>
	</div>
	<div class="tc-seperator"></div>
	<div class="tc-body">
			<?php
			$selected_list = $settings->list_style;
			if ( 'bullets' === $selected_list ) {
				?>
				<ul id="tc-list-wrapper" class="tc-lists tc-ul"></ul>
			<?php } elseif ( 'numbers' === $selected_list ) { ?>
				<ol id="tc-list-wrapper" class="tc-lists tc-ol"></ol>
			<?php } else { ?>
				<ul id="tc-list-wrapper" class="tc-lists tc_none_bullet" ></ul>
				<?php
			}
			?>
	</div>

</div>

<?php
if ( 'yes' === $settings->scroll_top ) {
	?>
		<div class="fl-node-<?php echo $id; ?> tc-scroll-top-container">
			<span class="<?php echo ( $settings->scroll_icon ); ?> tc-scroll-top-icon" ></span>
		</div>
<?php } ?>
