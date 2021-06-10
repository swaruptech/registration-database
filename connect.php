<?php
	$firstName = $_POST['firstName'];

	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];


	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, email, password, number) values(?, ?, ?, ?)");
		$stmt->bind_param("sssi", $firstName, $email, $password, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>