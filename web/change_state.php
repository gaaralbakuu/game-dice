<?php
header('Access-Control-Allow-Origin:*');   
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept"); 
$id = $_POST['id'];
//state = 0查询所有商品，state = 1查询竞价中商品，state = 2查询竞价结束商品
date_default_timezone_set("PRC");
$config = require 'app/Common/Conf/db.php';
        $data_arr = array();
   $conn = mysqli_connect("localhost",$config['DB_USER'],$config['DB_PWD'],$config['DB_NAME']);
    if(!$conn){  
        die("connect database fali error = "+mysql_error());  
    }else{  
    	mysqli_query($conn,'SET NAMES utf8');
    	//选择数据库
    	//mysql_fetch_array从返回的结果集中截取第一行，下一次调用则截取下一行，如此循环下去，如果没有更多或者结果集本身为空，则返回false
    		//查询全部
    			$sql="UPDATE caipiao_touzhu SET is_show = '1' WHERE id=" . $id . "";
			if(mysqli_query($conn,$sql)){
	echo 'ok';
}else{
	echo 'no';
}
    	
    }  
    
    mysqli_close($conn);
?>