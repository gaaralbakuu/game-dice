<?php
header('Access-Control-Allow-Origin:*');   
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept"); 
date_default_timezone_set("PRC");
$config = require '../Conf/db.php';
		$data_arr = array();
   $conn = mysqli_connect("localhost",$config['DB_USER'],$config['DB_PWD'],$config['DB_NAME']);  
    if(!$conn){  
        die("connect database fali error = "+mysql_error());  
    }else{  
    	mysqli_query($conn,'SET NAMES utf8');
    		$r = mysqli_query($conn,"SELECT * FROM caipiao_member");	
    	while($arr = mysqli_fetch_array($r)){
			array_push($data_arr,array('id' => $arr['id'],'username' => $arr['username'],'balance' => $arr['balance']));
    	}
			echo json_encode(array('state' => 200,'msg' => '获取成功','data' => $data_arr));
    }  
    
    mysqli_close($conn);
?>