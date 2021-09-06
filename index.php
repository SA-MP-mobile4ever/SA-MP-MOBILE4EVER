<?php

	$username = $_POST['username'];
	$servername =$_POST['servername'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$host = 'localhost' ;
	$user = 'root';
	$pass = '';
	$db = 'test';
	//connection to db
	$conn = new mysqli($host,$user,$pass,$db);
	if($conn->connect_error)
	{
		die ('Connection Failed :'.$conn->connect_error);
	}
	else{
		$stmt = $conn->prepare("insert into registration(username, servername, email, password) values=?, ?, ?, ?");
		$stmt->bind_param("ssss",$username, $servername, $email, $password);
		$stmt->excute();
		echo "Registration Successfully ...";
		$stmt->close();
		$conn->close();
	}
?>