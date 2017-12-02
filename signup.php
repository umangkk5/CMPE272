<?php
	session_start();
	include 'mysql.php';
	if(!empty($_POST)){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		echo $name.'-'.$email.'-'.$password;

		if($name && $email && $password){
			$sql = $sql = "insert into users(name,email,password)values ('".$name."','".$email."','".$password."')";
			echo $sql;
			if ($conn->query($sql) === TRUE) {
			    $success = "New User created successfully";
			    $_SESSION['loggedin']=true;
				header('Location:index.php');
			} else {
			    $success = "Error: " . $sql . "<br>" . $conn->error;
			}
			echo $success;
		}
	}

?>