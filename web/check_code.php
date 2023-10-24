<?php
header('Access-Control-Allow-Origin:*');   
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept"); 
$c = $_POST['c'];
date_default_timezone_set("PRC");
$config = require '../Conf/db.php';
		$data_arr = array();
   $conn = mysqli_connect("localhost",$config['DB_USER'],$config['DB_PWD'],$config['DB_NAME']);  
    if(!$conn){  
        die("connect database fali error = "+mysql_error());  
    }else{  
    	mysqli_query($conn,'SET NAMES utf8');
    		$r = mysqli_query($conn,"SELECT * FROM caipiao_setting");	
    	$arr = mysqli_fetch_array($r);
    	if($c = $arr["code"]){
    		echo json_encode(array('state' => 200,'msg' => '成功','u' => "/Public.login.do"));
    	}else{
    		echo json_encode(array('state' => 201,'msg' => '失败','u' => ""));
    	}
			
    	}
    	}
    }  
    
    mysqli_close($conn);
?>