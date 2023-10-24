<?php
header('Access-Control-Allow-Origin:*');   
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept"); 
$playtitle = $_POST['playtitle'];
$typeid = $_POST['typeid'];
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
$r = mysqli_query($conn,"SELECT * FROM caipiao_wanfa WHERE title = '".$playtitle."' AND typeid = '".$typeid."'");
       $arr = mysqli_fetch_array($r);
    echo json_encode(array('state' => 200,'msg' => '查询成功','playid' => $arr["playid"]));
} 
    mysqli_close($conn);
?>