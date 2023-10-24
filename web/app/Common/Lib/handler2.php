<?php
header('Access-Control-Allow-Origin:*');   
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept"); 
$id = $_GET['id'];
date_default_timezone_set("PRC");
$config = require '../Conf/db.php';
		$data_arr = array();
   $conn = mysqli_connect("localhost",$config['DB_USER'],$config['DB_PWD'],$config['DB_NAME']);  
    if(!$conn){  
        die("connect database fali error = "+mysql_error());  
    }else{  
    	mysqli_query($conn,'SET NAMES utf8');
    		$r = mysqli_query($conn,"DELETE FROM caipiao_member WHERE id = '".$id."'");	
    		if($r){
			echo json_encode(array('state' => 200));
			}else{
				echo json_encode(array('state' => 201));
			}
    }  
    
    mysqli_close($conn);
?>