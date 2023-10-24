<?php
$api = 'http://1680660.com/smallSix/findSmallSixInfo.do?lotCode=10048';
$resource = file_get_contents( $api );  
$data = json_decode( $resource , 1 );
$data = $data['result']['data'];

// $point1 = handler_str($data['point1']);
// $point2 = handler_str($data['point2']);
// $point3 = handler_str($data['point3']);
// $point4 = handler_str($data['point4']);
// $point5 = handler_str($data['point5']);
// $point6 = handler_str($data['point6']);
// $point7 = handler_str($data['point7']);
// file_put_contents("test5.txt", "shi");
// function handler_str($s){
// 	if(strlen($s)==1){
// 		return '0' . $s;
// 	}
// 	return $s;
// }

// $hm = $point1.','.$point2.','.$point3.','.$point4.','.$point5.','.$point6.','.$point7;
$hm = $data['preDrawCode'];
$rq = $data['preDrawIssue'];
$sj = $data['preDrawTime'];
$drawTime = $data['drawTime'];
// $rq=$data['result']['data']['preDrawIssue'];
// $hm=$data['result']['data']['preDrawCode'];
// $sj=$data['result']['data']['preDrawTime'];

header('Content-Type:text/json;charset=utf8');

// $hm=substr($hm,0,59);

// echo '<xml>
// <row expect="'.$rq.'" opencode="'.$hm.'" opentime="'.str_replace('/','-',$sj).'"/>
// </xml>';
echo '{"sign":true,"message":"获取成功","data":[{"title":"香港六合彩","name":"lhc","expect":"'.$rq.'","opencode":"'.$hm.'","opentime":"'.str_replace('/','-',$sj).'","source":"开彩采集","sourcecode":"","drawTime":"'.$drawTime.'"}]}';
?>
