<?php

	$name = $_POST['name'];
	$familyname =$_POST['familyname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	//connection to db
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error)
	{
		die ('Connection Failed :'.$conn->connect_error);
	}
	else{
		$stmt = $conn->prepare("insert into registration(name, familyname, email, password) values=?, ?, ?, ?");
		$stmt->bind_param("ssss",$name, $familyname, $email, $password);
		$stmt->excute();
		echo "Registration Successfully ...";
		$stmt->close();
		$conn->close();
	}
?>