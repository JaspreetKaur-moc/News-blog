<?php settings_fields('clsw_settings_group');
if ( !current_user_can( 'manage_options' ) ) {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
}
printf( __( '<div class="wrap"><h2>%1$s</h2><h4>%2$s</h4>', 'cricket-live-score-shortcode' ), 'Cricket Live Score Settings', 'Settings for Live Score Shortcode' );

	if(isset($_POST['clsw_save_settings'])){
		$clsw_display_results = sanitize_text_field( stripslashes( $_POST['clsw_display_results']) );
		$clsw_score_series_name = sanitize_text_field( stripslashes( $_POST['clsw_score_series_name']) );
		$clsw_result_series_name = sanitize_text_field( stripslashes( $_POST['clsw_result_series_name']) );
		$clsw_preview_series_name = sanitize_text_field( stripslashes( $_POST['clsw_preview_series_name']) );
		$clsw_auto_refresh_option = sanitize_text_field( stripslashes( $_POST['clsw_auto_refresh_option']) );
		$clsw_auto_refresh_select = sanitize_text_field( stripslashes( $_POST['clsw_auto_refresh_select']) );
		$clsw_current_time = sanitize_text_field( stripslashes( $_POST['clsw_current_time']) );
		$clsw_current_time_text = sanitize_text_field( stripslashes( $_POST['clsw_current_time_text']) );
		//$clsw_auto_refresh_custom = sanitize_text_field( stripslashes( $_POST['clsw_auto_refresh_custom']) );
		update_option('clsw_auto_refresh_option_settings', $clsw_auto_refresh_option);
		update_option('clsw_auto_refresh_select_settings', $clsw_auto_refresh_select);
		//update_option('clsw_auto_refresh_custom_settings', $clsw_auto_refresh_custom);
		update_option('clsw_results_setting', $clsw_display_results);
		update_option('clsw_score_series_settings', $clsw_score_series_name);
		update_option('clsw_result_series_settings', $clsw_result_series_name);
		update_option('clsw_preview_series_settings', $clsw_preview_series_name);
		update_option('clsw_current_time', $clsw_current_time);
		update_option('clsw_current_time_text', $clsw_current_time_text);
	}

	$clsw_auto_refresh_option = get_option('clsw_auto_refresh_option_settings', true);
	$clsw_auto_refresh_select = get_option('clsw_auto_refresh_select_settings', true);
	//$clsw_auto_refresh_custom = get_option('clsw_auto_refresh_custom', true);
	$clsw_results = get_option('clsw_results_setting', true);
	$clsw_score_series = get_option('clsw_score_series_settings', true);
	$clsw_result_series = get_option('clsw_result_series_settings', true);
	$clsw_preview_series = get_option('clsw_preview_series_settings', true);
	$clsw_current_time = get_option('clsw_current_time', true);
	$clsw_current_time_text = get_option('clsw_current_time_text', true);

	_e( '<form action="" method="post">', 'cricket-live-score-shortcode' );
	$clsw_auto_refresh_option_val = ($clsw_auto_refresh_option == 'Yes' ? 'checked' : '');
	$clsw_auto_refresh_option_check = ($clsw_auto_refresh_option == 'Yes' ? '' : 'disabled=""');
	$clsw_auto_refresh_select_1 = ($clsw_auto_refresh_select == 1 ? 'selected' : '');
	$clsw_auto_refresh_select_2 = ($clsw_auto_refresh_select == 2 ? 'selected' : '');
	$clsw_auto_refresh_select_3 = ($clsw_auto_refresh_select == 3 ? 'selected' : '');
	$clsw_auto_refresh_select_4 = ($clsw_auto_refresh_select == 4 ? 'selected' : '');
	$clsw_auto_refresh_select_5 = ($clsw_auto_refresh_select == 5 ? 'selected' : '');
	$clsw_auto_refresh_select_6 = ($clsw_auto_refresh_select == 6 ? 'selected' : '');
	$clsw_auto_refresh_select_7 = ($clsw_auto_refresh_select == 7 ? 'selected' : '');
	$clsw_auto_refresh_select_8 = ($clsw_auto_refresh_select == 8 ? 'selected' : '');
	$clsw_auto_refresh_select_9 = ($clsw_auto_refresh_select == 9 ? 'selected' : '');
	$clsw_auto_refresh_select_10 = ($clsw_auto_refresh_select == 10 ? 'selected' : '');
	//$clsw_auto_refresh_custom_val = ($clsw_auto_refresh_custom ? $clsw_auto_refresh_custom : '');
	$clsw_results_check = ($clsw_results == 'Yes' ? 'checked' : '');
	$clsw_score_series_check = ($clsw_score_series == 'Yes' ? 'checked' : '');
	$clsw_result_series_check = ($clsw_result_series == 'Yes' ? 'checked' : '');
	$clsw_preview_series_check = ($clsw_preview_series == 'Yes' ? 'checked' : '');
	$clsw_current_time_check = ($clsw_current_time == 'Yes' ? 'checked' : '');

	printf( __( '<div><input value="Yes" type="checkbox" name="clsw_auto_refresh_option" id="clsw_auto_refresh_option" %1$s>%2$s<select name="clsw_auto_refresh_select" id="clsw_auto_refresh_select" %3$s><option value="1" %4$s>1 Minute</option><option value="2" %5$s>2 Minutes</option><option value="3" %6$s>3 Minutes</option><option value="4" %7$s>4 Minutes</option><option value="5" %8$s>5 Minutes</option><option value="6" %9$s>6 Minutes</option><option value="7" %10$s>7 Minutes</option><option value="8" %11$s>8 Minutes</option><option value="9" %12$s>9 Minutes</option><option value="10" %13$s>10 Minutes</option></select></div>', 'cricket-live-score-shortcode' ), $clsw_auto_refresh_option_val, 'Enable auto refresh live score', $clsw_auto_refresh_option_check, $clsw_auto_refresh_select_1, $clsw_auto_refresh_select_2, $clsw_auto_refresh_select_3, $clsw_auto_refresh_select_4, $clsw_auto_refresh_select_5, $clsw_auto_refresh_select_6, $clsw_auto_refresh_select_7, $clsw_auto_refresh_select_8, $clsw_auto_refresh_select_9, $clsw_auto_refresh_select_10 );

	//printf( __(	'<div><input style="display: none;" min="1" step="1	" type="number" name="clsw_auto_refresh_custom" id="clsw_auto_refresh_custom" value="" disabled=""></div>', 'cricket-live-score-shortcode' ) );

	printf( __(	'<div><input value="Yes" type="checkbox" name="clsw_display_results" %1$s>%2$s</div>', 'cricket-live-score-shortcode' ), $clsw_results_check, 'Display recent matches result with live scores' );

	printf( __(	'<div><input value="Yes" type="checkbox" name="clsw_score_series_name" %1$s>%2$s</div>', 'cricket-live-score-shortcode' ), $clsw_score_series_check, 'Display series name with live scores' );

	printf( __(	'<div><input value="Yes" type="checkbox" name="clsw_result_series_name" %1$s>%2$s</div>', 'cricket-live-score-shortcode' ), $clsw_result_series_check, 'Display series name with recent results' );

	printf( __(	'<div><input value="Yes" type="checkbox" name="clsw_preview_series_name" %1$s>%2$s</div>', 'cricket-live-score-shortcode' ), $clsw_preview_series_check, 'Display upcoming match details with live scores');

	printf( __(	'<div><input value="Yes" type="checkbox" name="clsw_current_time" %1$s>%2$s</div>', 'cricket-live-score-shortcode' ), $clsw_current_time_check, 'Display current time');

	printf( __(	'<div>%1$s: <input value="%2$s" type="text" name="clsw_current_time_text"></div>', 'cricket-live-score-shortcode' ), 'Display text with current time', $clsw_current_time_text );

	printf( __(	'<div><input type="submit" name="clsw_save_settings" value="%1$s"></div>', 'cricket-live-score-shortcode' ), 'Submit' );

	_e('</form>
	<script type="text/javascript">
	jQuery(document).ready(function($){
		$("#clsw_auto_refresh_option").click(function() {
			if($("#clsw_auto_refresh_option").is(":checked")){
		    	//$("#clsw_auto_refresh_select").toggle(this.checked);
		    	$("#clsw_auto_refresh_select").prop("disabled", false);
		    }else{
		    	$("#clsw_auto_refresh_select").prop("disabled", true);
		    	//$("#clsw_auto_refresh_custom").prop("disabled", true);
		    }
		});
	});
	</script>
</div>', 'cricket-live-score-shortcode' );