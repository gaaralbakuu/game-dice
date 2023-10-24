<?php
/**
$api = "http://api.api68.com/CQShiCai/getBaseCQShiCai.do?issue=&lotCode=10003";
$data = file_get_contents($api);
$data = json_decode($data,1);
$qh = $data['result']['data']['preDrawIssue'];
//$qh = str_split($qh);
//$qh1 = $qh[0].$qh[1].$qh[2].$qh[3].$qh[4].$qh[5].$qh[6].$qh[7].'0'.$qh[8].$qh[9];
//var_dump($qh);
//echo $qh1;
$hm = $data['result']['data']['preDrawCode'];

$rq = $data['result']['data']['preDrawTime'];
//$opentimestmp = strtotime($rq);
echo '{"sign":true,"message":"获取成功","data":[{"title":"腾讯分分彩","name":"tjssc","expect":"'.$qh.'","opencode":"'.$hm.'","opentime":"'.$rq.'","source":"开彩采集","sourcecode":""}]}';
**/
$api = 'https://api.api68.com/CQShiCai/getBaseCQShiCai.do?lotCode=10056';
$resource = file_get_contents_by_curl( $api );  
$data = json_decode( $resource , 1 );

header('Content-Type:text/json;charset=utf8');

$rq=$data['result']['data']['preDrawIssue'];
$hm=$data['result']['data']['preDrawCode'];
$sj=$data['result']['data']['preDrawTime'];

echo '{"sign":true,"message":"获取成功","data":[{"title":"腾讯分分彩","name":"txssc","expect":"'.$rq.'","opencode":"'.$hm.'","opentime":"'.str_replace('/','-',$sj).'","source":"开彩采集","sourcecode":""}]}';

function file_get_contents_by_curl($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_HEADER,0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//禁止调用时就输出获取到的数据
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
	$result = curl_exec($ch);
	curl_close($ch);return $result;
}
?>