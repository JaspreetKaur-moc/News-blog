<?php

if($state['mchState'] == 'Result'){
	$matchStatus = "";
	if($state['addnStatus'] != ""){
		$matchStatus .= $state['addnStatus'].' - ';
	}
	$matchStatus .= $state['status'];

	printf( __( '<div class="clsw_single_container"><div class="clsw_full_width"><div class="clsw_desc_container">%1$s<br></div><div class="clsw_desc_container"></div></div><div class="clsw_full_width"><div class="clsw_full_width">%2$s<br>', 'cricket-live-score-shortcode' ), $match['mchDesc'], $matchStatus );
	
	$mamName = $match->manofthematch->mom;
	if($mamName){
		printf( __( 'Man of the Match: %1$s<br>', 'cricket-live-score-shortcode' ), $mamName['Name'] );
	}
	if($clsw_result_series == 'Yes'){
		printf( __( '%1$s', 'cricket-live-score-shortcode' ), $match['srs'] );
	}		  					
	$matchStatus = "";
	_e( '</div></div></div>', 'cricket-live-score-shortcode' );
}
?>