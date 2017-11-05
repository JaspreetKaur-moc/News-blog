<?php
$clsw_auto_refresh_option = get_option('clsw_auto_refresh_option_settings', true);
  if($clsw_auto_refresh_option == 'Yes'){
  		$clsw_auto_refresh_select = get_option('clsw_auto_refresh_select_settings', true);
  		$clsw_auto_refresh_sec = $clsw_auto_refresh_select * 60 * 1000;

	  printf( __( '<script type="text/javascript">
	    setInterval("clsw_auto_refresh();", %1$s); 
	    function clsw_auto_refresh(){
	      jQuery("#refresh").load(location.href + " #refresh");
	    }
	  </script>', 'cricket-live-score-shortcode'), $clsw_auto_refresh_sec );
  } 
  $url = 'http://synd.cricbuzz.com/j2me/1.0/livematches.xml';
  $xml = simplexml_load_file($url) or die("feed not loading");
  $matches = $xml->match;
   $clsw_timezone_string = get_option('timezone_string');
   $clsw_gmt_offset = get_option('gmt_offset');

  date_default_timezone_set($clsw_timezone_string);
  _e('<div class="clsw_wrapper" id="refresh"><div class="clsw_inner_container">', 'cricket-live-score-shortcode');

  $clsw_current_time = get_option('clsw_current_time', true);
  if($clsw_current_time){
    $clsw_current_time_text = get_option('clsw_current_time_text', true);
    printf( __( '<div class="match_body">%1$s %2$s</div>', 'cricket-live-score-shortcode'), $clsw_current_time_text, date('H:i:s') );
  }

  foreach ($matches as $key => $match) {
  	$clsw_results = get_option('clsw_results_setting', true);
  	$clsw_score_series = get_option('clsw_score_series_settings', true);
	$clsw_result_series = get_option('clsw_result_series_settings', true);
	$clsw_preview_series = get_option('clsw_preview_series_settings', true);
  	$state = $match->state;
	$mnum = $match['mnum'];
  	$addnStatus = (string) $state['addnStatus'];
  	$status = (string) $state['status'];
  	$Tm = $match->Tm;
  	include 'clsw-running.php';
  	include 'clsw-completed.php';
  	if($clsw_results == 'Yes'){
  		include 'clsw-results.php';
  	}
  	if($clsw_preview_series == 'Yes'){
  		include 'clsw-upcoming.php';
  	}
  }
  _e('</div></div>', 'cricket-live-score-shortcode' );
  ?>