<?php
$api = "https://api.api861861.com/lotteryJSFastThree/getBaseJSFastThree.do?lotCode=10061";
//$api = "http://ho.apiplus.net/token/shk3-1.json";
$data = file_get_contents($api);
$data = json_decode($data,1);
//var_dump($data);
// $qh = $data["data"][0]["expect"];
// $hm = $data["data"][0]["opencode"];
// $rq = $data["data"][0]["opentime"];


$qh = $data['result']['data']['preDrawIssue'];
$hm = $data['result']['data']['preDrawCode'];
$rq = $data['result']['data']['preDrawTime'];


//$opentimestmp = strtotime($rq);
echo '{"sign":true,"message":"获取成功","data":[{"title":"上海快3","name":"shk3","expect":"'.$qh.'","opencode":"'.$hm.'","opentime":"'.$rq.'","source":"开彩采集","sourcecode":""}]}';
//echo '{"rows":10,"code":"cqssc","data":[{"id":"310055","type":"3","opentimestamp":"'.$opentimestmp.'","expect":"'.$qh.'","opencode":"'.$hm.'","opentime":"'.$rq.'"}]}';
//echo '{"rows":10,"code":"cqssc","data":[{"id":"310055","type":"3","opentimestamp":"1520598055","expect":"20180309086","opencode":"5,5,9,7,1","opentime":"2018-03-09 20:20:55"},';
?>