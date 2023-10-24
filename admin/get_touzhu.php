<?php
header('Access-Control-Allow-Origin:*');   
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept"); 
$id = $_POST['id'];
$type = $_POST['type'];
$username = $_POST['username'];
if($type == "s"){
$amount = $_POST['amount'];
$tzcode = $_POST['tzcode'];
$okamount = $_POST['okamount'];
$isdraw = $_POST['isdraw'];
$playid = $_POST['playid'];
$playtitle = $_POST['playtitle'];
$beishu = $_POST['beishu'];
$yue = $_POST['yue'];
}else{
    // $username = $_POST['username'];
}
//state = 0查询所有商品，state = 1查询竞价中商品，state = 2查询竞价结束商品
date_default_timezone_set("PRC");
$config = require 'app/Common/Conf/db.php';
   $conn = mysqli_connect("localhost",$config['DB_USER'],$config['DB_PWD'],$config['DB_NAME']);
    if(!$conn){  
        die("connect database fali error = "+mysql_error());  
    }else{  
        mysqli_query($conn,'SET NAMES utf8');
        //选择数据库
        //mysql_fetch_array从返回的结果集中截取第一行，下一次调用则截取下一行，如此循环下去，如果没有更多或者结果集本身为空，则返回false
            //查询全部
if($type == "r"){
$user_r = mysqli_query($conn,"SELECT * FROM caipiao_member WHERE username = '".$username."'");    
$r = mysqli_query($conn,"SELECT * FROM caipiao_touzhu WHERE id = '".$id."'");
$user_arr = mysqli_fetch_array($user_r);
       $arr = mysqli_fetch_array($r);
       $arr['yue'] = $user_arr['balance'];
    echo json_encode(array('state' => 200,'msg' => '查询成功','data' => $arr));
}else{

if(mysqli_query($conn,"UPDATE caipiao_member SET balance = '". $yue ."' WHERE username = '".$username."'")){
if(mysqli_query($conn,"UPDATE caipiao_touzhu SET isdraw = '". $isdraw ."',okamount = '". $okamount ."',tzcode='". $tzcode ."',amount = '". $amount ."',playid = '". $playid ."',playtitle = '". $playtitle ."',beishu = '". $beishu ."' WHERE id = '".$id."'")){
echo json_encode(array('state' => 200,'msg' => '成功'));
}else{
echo json_encode(array('state' => 201,'msg' => '失败'));
}
}else{
echo json_encode(array('state' => 201,'msg' => '失败'));
}
    
}
} 
    mysqli_close($conn);
?>