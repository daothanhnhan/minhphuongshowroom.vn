<?php

    $db_host = 'localhost';
	$db_user_vn = 'mpshowroom_db';
	$db_pass = '7wkGTuqtCRV7GRUs';
	$db_name_vn = 'mpshowroom_db';
	
	 $conn_vn = NULL;
	 $result_vn = NULL;
		
	
	$sql = "SET NAMES 'utf8'";		
	$conn_vn =  mysqli_connect($db_host, $db_user_vn, $db_pass);
	if ($conn_vn){
		$select_db = mysqli_select_db($conn_vn,$db_name_vn);
		if(!$select_db){
			echo 'Not found database';
		}
	}
	else{
		echo 'Can not connect to database!';
	}
	mysqli_query($conn_vn,$sql);