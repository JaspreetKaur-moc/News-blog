<?php
if(($state['mchState'] == 'inprogress') || ($state['mchState'] == 'lunch') || ($state['mchState'] == 'tea') || ($state['mchState'] == 'stump')){
    $btTm = $match->mscr->btTm;
    $btTmInngs = $match->mscr->btTm->Inngs;
    $batsArr = array();
    foreach ($btTmInngs as $key => $inn) {
      $score = "";
      $score = $inn['r'].'/'.$inn['wkts'];
      if($inn['Decl'] == 1){
        $score .= 'D';
      }
      $score .= ' ('.$inn['ovrs'].')';
      array_push($batsArr, $score);
    }
    $batsArrList = implode(', ', array_reverse($batsArr));
    $blgTm = $match->mscr->blgTm;
    $blgTmInngs = $match->mscr->blgTm->Inngs;
    $blgsArr = array();
    foreach ($blgTmInngs as $key => $inn) {
      $score = "";
      $score = $inn['r'].'/'.$inn['wkts'];
      if($inn['Decl'] == 1){
        $score .= 'D';
      }
      $score .= ' ('.$inn['ovrs'].')';
      array_push($blgsArr, $score);
    }
    $blgsArrList = implode(', ', array_reverse($blgsArr));
    $matchStatus = "";
    if(($addnStatus != "") && ($addnStatus != $status)){
      $matchStatus .= $addnStatus.' - ';
    }
    $matchStatus .= $status;

  	printf( __( '<div class="clsw_single_container"><div class="clsw_full_width"><div class="clsw_team_titles">%1$s</div><div class="clsw_desc_container">%2$s</div></div><div class="clsw_full_width"><div class="clsw_team_titles">%3$s</div><div class="clsw_desc_container">%4$s</div><div class="clsw_full_width">%5$s', 'cricket-live-score-shortcode'), $btTm['sName'], $batsArrList, $blgTm['sName'], $blgsArrList, $matchStatus );

  	if($clsw_score_series == 'Yes'){
  		printf( __( '<br>%1$s', 'cricket-live-score-shortcode' ), $match['srs'] );
  	}
  	$matchStatus = "";
  	_e( '</div></div></div>', 'cricket-live-score-shortcode' );
}
?>