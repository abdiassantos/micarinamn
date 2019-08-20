<?php
	// Main Text
	$livesay_need_copyright = cs_get_option('need_copyright');
	$livesay_footer_copyright_layout = cs_get_option('footer_copyright_layout');
  if ($livesay_footer_copyright_layout === 'copyright-1') {
		$livesay_copyright_layout_class = 'col-sm-6';
		$livesay_copyright_seclayout_class = 'text-right';
	} elseif ($livesay_footer_copyright_layout === 'copyright-2') {
		$livesay_copyright_layout_class = 'col-sm-6 pull-right text-right';
		$livesay_copyright_seclayout_class = 'text-left';
	} elseif ($livesay_footer_copyright_layout === 'copyright-3') {
		$livesay_copyright_layout_class = 'col-sm-12 text-center';
	} else {
		$livesay_copyright_layout_class = '';
		$livesay_copyright_seclayout_class = '';
	}
	if (isset($livesay_need_copyright)) {
?>

<!-- Copyright Bar -->
<div class="lvsy-copyright">
	<div class="container">
	  <div class="row">
			<div class="cprt-left <?php echo esc_attr($livesay_copyright_layout_class); ?>">
			<?php
				$livesay_copyright_text = cs_get_option('copyright_text');
				if($livesay_copyright_text){
					echo '<p>'. do_shortcode($livesay_copyright_text) .'</p>';
				} else {
					echo '<p>'. esc_html__('&copy; 2017 VictorThemes - Elite Themeforest Author.', 'livesay') .'</p>';
				}
			?>
			</div>
		</div>
	</div>
</div>

<!-- Copyright Bar -->
<?php }
