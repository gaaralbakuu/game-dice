<?php
$api = "http://www.off0.com/list";
$data = file_get_contents($api);
$data = json_decode($data,1);
$qh = "20".$data[0]['issue'];
//$qh = str_split($qh);
//$qh1 = $qh[0].$qh[1].$qh[2].$qh[3].$qh[4].$qh[5].$qh[6].$qh[7].'0'.$qh[8].$qh[9];
//var_dump($qh);
//echo $qh1;
$hm = $data[0]['result'];

$rq = $data[0]['time'];
//$opentimestmp = strtotime($rq);
echo '{"sign":true,"message":"获取成功","data":[{"title":"腾讯分分彩","name":"xtxssc","expect":"'.$qh.'","opencode":"'.$hm.'","opentime":"'.$rq.'","source":"开彩采集","sourcecode":""}]}';
?>