<?php
if($state['mchState'] == 'preview'){
	$matchStatus = "";
	if($state['addnStatus'] != ""){
		$matchStatus .= $state['addnStatus'].' - ';
	}
	$matchStatus .= $state['status'];

	printf( __( '<div class="clsw_single_container"><div class="clsw_full_width"><div class="clsw_desc_container">%1$s<br></div><div class="clsw_desc_container"></div></div><div class="clsw_full_width">%2$s<br>%3$s', 'cricket-live-score-shortcode' ), $match['mchDesc'], $mnum, $matchStatus );

	if($clsw_result_series == 'Yes'){
		printf( __( '<br>%1$s', 'cricket-live-score-shortcode' ), $match['srs'] );
	}		  					
	$matchStatus = "";
	_e( '</div></div></div>', 'cricket-live-score-shortcode' );
}
?>